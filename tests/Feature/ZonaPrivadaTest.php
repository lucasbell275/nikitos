<?php

namespace Tests\Feature;

use App\Models\Categorias;
use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Productos;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ZonaPrivadaTest extends TestCase
{
    use RefreshDatabase;

    public function test_cliente_entra_a_su_zona_sin_acceso_al_admin(): void
    {
        $cliente = Cliente::factory()->create([
            'username' => 'cliente_test',
            'password' => 'clientecliente',
        ]);

        $this->post(route('clientes.login.submit'), [
            'username' => 'cliente_test',
            'password' => 'clientecliente',
        ])->assertRedirect(route('zona.productos'));

        $this->get(route('zona.productos'))->assertOk();
        $this->get(route('admin.clientes.index'))->assertRedirect(route('login'));
        $this->assertAuthenticatedAs($cliente, 'cliente');
        $this->assertGuest('web');
    }

    public function test_un_usuario_comun_no_puede_entrar_al_admin(): void
    {
        $usuario = User::factory()->create(['is_admin' => false]);

        $this->post(route('login.submit'), [
            'email' => $usuario->email,
            'password' => 'password',
        ])->assertSessionHasErrors('email');

        $this->actingAs($usuario)->get(route('admin.clientes.index'))->assertForbidden();
    }

    public function test_admin_puede_registrar_un_cliente_sin_crear_un_usuario_admin(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)->post(route('admin.clientes.store'), [
            'username' => 'nuevo_cliente',
            'nombre' => 'Mariano',
            'razon_social' => 'Comercio Mariano',
            'codigo_cliente' => 'CLI-007',
            'localidad' => 'Merlo',
            'horario' => '9 a 17',
            'condiciones_pago' => 'Cuenta corriente',
            'email' => 'mariano@example.com',
            'password' => 'clavecliente',
            'activo' => '1',
        ])->assertRedirect(route('admin.clientes.index'));

        $this->assertDatabaseHas('clientes', ['username' => 'nuevo_cliente', 'codigo_cliente' => 'CLI-007']);
        $this->assertDatabaseMissing('users', ['email' => 'mariano@example.com']);
        $this->get(route('admin.clientes.index'))->assertOk()->assertSee('nuevo_cliente');
        $this->get(route('admin.clientes.edit', Cliente::where('username', 'nuevo_cliente')->firstOrFail()))->assertOk();
    }

    public function test_cliente_puede_crear_un_pedido_y_ver_solo_el_suyo(): void
    {
        $cliente = Cliente::factory()->create();
        $otroCliente = Cliente::factory()->create();
        $categoria = Categorias::create(['nombre_categoria' => 'Línea escolar']);
        $producto = Productos::create([
            'nombre' => 'Palitos Salados',
            'codigo' => 'NK-0100',
            'cajas' => 8,
            'unidades' => 20,
            'peso' => 20,
            'vida_util' => 6,
            'categoria_id' => $categoria->id,
        ]);

        $this->actingAs($cliente, 'cliente')->get(route('zona.productos'))->assertOk()->assertSee('Palitos Salados');

        $this->post(route('zona.pedidos.store'), [
            'fecha' => '2026-09-27',
            'razon_social' => $cliente->razon_social,
            'localidad' => $cliente->localidad,
            'horario' => $cliente->horario,
            'condiciones_pago' => $cliente->condiciones_pago,
            'items' => [$producto->id => 3],
        ])->assertRedirect();

        $pedido = Pedido::firstOrFail();
        $this->assertSame($cliente->id, $pedido->cliente_id);
        $this->assertDatabaseHas('pedido_items', ['pedido_id' => $pedido->id, 'codigo' => 'NK-0100', 'cantidad' => 3]);
        $this->get(route('zona.pedidos.show', $pedido))->assertOk();
        $this->get(route('zona.pedidos.index'))
            ->assertOk()
            ->assertSee('Clientes')
            ->assertSee('Razón social cliente')
            ->assertSee('N° de Pedido')
            ->assertSee('Fecha del pedido')
            ->assertSee($cliente->codigo_cliente)
            ->assertSee($cliente->razon_social);

        $this->post(route('zona.pedidos.repetir', $pedido))->assertRedirect();
        $pedidoRepetido = Pedido::latest('id')->firstOrFail();
        $this->assertNotEquals($pedido->id, $pedidoRepetido->id);
        $this->assertSame($cliente->id, $pedidoRepetido->cliente_id);
        $this->assertDatabaseHas('pedido_items', ['pedido_id' => $pedidoRepetido->id, 'codigo' => 'NK-0100', 'cantidad' => 3]);
        $this->actingAs($otroCliente, 'cliente')->get(route('zona.pedidos.show', $pedido))->assertNotFound();
        $this->post(route('zona.pedidos.repetir', $pedido))->assertNotFound();
        $this->actingAs(User::factory()->create(['is_admin' => true]), 'web')
            ->get(route('admin.pedidos.show', $pedido))->assertOk()->assertSee('Palitos Salados');
    }

    public function test_admin_puede_actualizar_codigo_del_producto(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $categoria = Categorias::create(['nombre_categoria' => 'Línea escolar']);
        $producto = Productos::create([
            'nombre' => 'Palitos Salados',
            'cajas' => 8,
            'unidades' => 20,
            'peso' => 20,
            'vida_util' => 6,
            'categoria_id' => $categoria->id,
        ]);

        $this->actingAs($admin)->put(route('admin.productos.update', $producto), [
            'nombre' => 'Palitos Salados',
            'cajas' => 8,
            'unidades' => 20,
            'peso' => 20,
            'vida_util' => 6,
            'categoria_id' => $categoria->id,
            'codigo' => 'NK-0100',
        ])->assertRedirect(route('admin.productos.index'));

        $this->assertDatabaseHas('productos', ['id' => $producto->id, 'codigo' => 'NK-0100']);
    }

    public function test_cliente_desactivado_no_puede_seguir_usando_su_sesion(): void
    {
        $cliente = Cliente::factory()->create(['activo' => false]);

        $this->actingAs($cliente, 'cliente')
            ->get(route('zona.productos'))
            ->assertRedirect(route('clientes.login'));

        $this->assertGuest('cliente');
    }
}
