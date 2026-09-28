<?php

namespace Tests\Feature;

use App\Models\Cliente;
use App\Models\ListaPrecio;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ListaPreciosTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_publica_un_pdf_y_todos_los_clientes_pueden_verlo_y_descargarlo(): void
    {
        Storage::fake('local');

        $this->get(route('zona.listas-precios.index'))->assertRedirect(route('clientes.login'));

        $admin = User::factory()->create(['is_admin' => true]);
        $this->actingAs($admin, 'web')->post(route('admin.listas-precios.store'), [
            'titulo' => 'Lista de precios - Septiembre 2024',
            'archivo' => UploadedFile::fake()->create('precios.pdf', 340, 'application/pdf'),
        ])->assertRedirect(route('admin.listas-precios.index'));

        $lista = ListaPrecio::firstOrFail();
        Storage::disk('local')->assertExists($lista->archivo_path);
        $this->assertSame('Lista de precios - Septiembre 2024', $lista->titulo);
        $this->get(route('admin.listas-precios.index'))->assertOk()->assertSee($lista->titulo);

        foreach (Cliente::factory()->count(2)->create() as $cliente) {
            $this->actingAs($cliente, 'cliente')
                ->get(route('zona.listas-precios.index'))
                ->assertOk()
                ->assertSee($lista->titulo)
                ->assertSee('PDF')
                ->assertSee('Ver online')
                ->assertSee('Descargar');

            $this->get(route('zona.listas-precios.ver', $lista))
                ->assertOk()
                ->assertHeader('content-type', 'application/pdf');

            $this->get(route('zona.listas-precios.descargar', $lista))
                ->assertOk()
                ->assertHeader('content-type', 'application/pdf');
        }

        $this->post(route('clientes.logout'));
        $this->get(route('zona.listas-precios.descargar', $lista))
            ->assertRedirect(route('clientes.login'));
    }

    public function test_admin_solo_acepta_pdfs_y_puede_eliminarlos(): void
    {
        Storage::fake('local');
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin, 'web')->post(route('admin.listas-precios.store'), [
            'titulo' => 'Archivo no válido',
            'archivo' => UploadedFile::fake()->create('archivo.txt', 10, 'text/plain'),
        ])->assertSessionHasErrors('archivo');

        $this->assertDatabaseCount('listas_precios', 0);

        $lista = ListaPrecio::factory()->create();
        Storage::disk('local')->put($lista->archivo_path, '%PDF-1.4 test');
        $this->delete(route('admin.listas-precios.destroy', $lista))
            ->assertRedirect(route('admin.listas-precios.index'));

        $this->assertDatabaseCount('listas_precios', 0);
        Storage::disk('local')->assertMissing($lista->archivo_path);
    }
}
