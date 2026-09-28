<?php

namespace Tests\Feature;

use App\Models\Categorias;
use App\Models\Productos;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductosCreacionTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_puede_crear_un_producto_con_imagen_y_abrir_su_ficha(): void
    {
        Storage::fake('public');
        $admin = User::factory()->create(['is_admin' => true]);
        $categoria = Categorias::create(['nombre_categoria' => 'Snacks', 'color' => '#FFA221']);
        $png = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAusB9WlMWawAAAAASUVORK5CYII=');

        $this->actingAs($admin)->post(route('admin.productos.store'), [
            'nombre' => 'Papas de prueba',
            'descripcion' => 'Producto para prueba',
            'imagen' => UploadedFile::fake()->createWithContent('producto.png', $png),
            'codigo' => 'NK-TEST-1',
            'cajas' => 8,
            'unidades' => 20,
            'peso' => 30,
            'vida_util' => 6,
            'categoria_id' => $categoria->id,
        ])->assertRedirect(route('admin.productos.index'));

        $producto = Productos::where('codigo', 'NK-TEST-1')->firstOrFail();
        Storage::disk('public')->assertExists($producto->imagen);
        $this->assertDatabaseHas('productos', ['id' => $producto->id, 'nombre' => 'Papas de prueba']);

        $this->get(route('productos.show', $producto))
            ->assertOk()
            ->assertSee('x-teleport="body"', false)
            ->assertSee('Cerrar imagen ampliada');
    }

    public function test_el_alta_invalida_muestra_errores_y_conserva_los_datos(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)->from(route('admin.productos.create'))->followingRedirects()
            ->post(route('admin.productos.store'), [
                'nombre' => 'Papas incompletas',
                'cajas' => 0,
            ])
            ->assertOk()
            ->assertSee('No se pudo guardar el producto')
            ->assertSee('Papas incompletas')
            ->assertSee('La imagen')
            ->assertSee('El campo cajas');

        $this->assertDatabaseCount('productos', 0);
    }

    public function test_el_alta_rechaza_imagenes_mayores_a_dos_megabytes_con_un_mensaje_claro(): void
    {
        Storage::fake('public');
        $admin = User::factory()->create(['is_admin' => true]);
        $categoria = Categorias::create(['nombre_categoria' => 'Snacks']);
        $png = base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAusB9WlMWawAAAAASUVORK5CYII=');

        $this->actingAs($admin)->from(route('admin.productos.create'))->followingRedirects()
            ->post(route('admin.productos.store'), [
                'nombre' => 'Producto grande',
                'imagen' => UploadedFile::fake()->createWithContent('grande.png', $png.str_repeat(' ', 2097152)),
                'cajas' => 8,
                'unidades' => 20,
                'peso' => 30,
                'vida_util' => 6,
                'categoria_id' => $categoria->id,
            ])
            ->assertOk()
            ->assertSee('La imagen no puede superar los 2 MB.');

        $this->assertDatabaseCount('productos', 0);
    }
}
