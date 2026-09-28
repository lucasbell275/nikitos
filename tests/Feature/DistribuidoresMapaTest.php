<?php

namespace Tests\Feature;

use App\Models\Distribuidor;
use App\Models\User;
use Database\Seeders\DistribuidorSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class DistribuidoresMapaTest extends TestCase
{
    use RefreshDatabase;

    public function test_seeder_carga_seis_ubicaciones_y_la_vista_las_entrega_al_mapa(): void
    {
        $this->seed(DistribuidorSeeder::class);
        $this->seed(DistribuidorSeeder::class);

        $this->assertDatabaseCount('distribuidores', 6);

        $response = $this->get(route('mapa.index'));

        $response->assertOk()
            ->assertSee('Distribuidor de prueba - La Plata')
            ->assertSee('Distribuidor de prueba - Rosario')
            ->assertSee('filtro-provincia')
            ->assertSee('filtro-ciudad')
            ->assertSee('buscar-direccion')
            ->assertSee('datos-distribuidores');

        $this->assertNotNull(Distribuidor::firstOrFail()->latitud);
        $this->assertNotNull(Distribuidor::firstOrFail()->longitud);
    }

    public function test_admin_agrega_distribuidor_y_se_geocodifica_una_sola_vez(): void
    {
        Http::preventStrayRequests();
        Http::fake(['nominatim.openstreetmap.org/*' => Http::response([
            ['lat' => '-34.60817', 'lon' => '-58.37027'],
        ])]);

        $admin = User::factory()->create(['is_admin' => true]);
        $datos = [
            'nombre' => 'Distribuidor nuevo',
            'provincia' => 'Ciudad Autónoma de Buenos Aires',
            'ciudad' => 'Buenos Aires',
            'direccion' => 'Balcarce 50',
        ];

        $this->actingAs($admin)->post(route('admin.mapa.store'), $datos)
            ->assertRedirect(route('admin.mapa.index'));

        $distribuidor = Distribuidor::where('nombre', 'Distribuidor nuevo')->firstOrFail();
        $this->assertEqualsWithDelta(-34.60817, $distribuidor->latitud, 0.00001);
        $this->assertEqualsWithDelta(-58.37027, $distribuidor->longitud, 0.00001);

        $this->put(route('admin.mapa.update', $distribuidor), $datos)
            ->assertRedirect(route('admin.mapa.index'));

        Http::assertSentCount(1);
    }

    public function test_admin_recibe_error_si_no_se_encuentra_la_direccion_y_puede_ingresar_coordenadas(): void
    {
        Http::preventStrayRequests();
        Http::fake(['nominatim.openstreetmap.org/*' => Http::response([])]);

        $admin = User::factory()->create(['is_admin' => true]);
        $datos = [
            'nombre' => 'Distribuidor nuevo',
            'provincia' => 'Buenos Aires',
            'ciudad' => 'La Plata',
            'direccion' => 'Dirección sin resultados',
        ];

        $this->actingAs($admin)->post(route('admin.mapa.store'), $datos)
            ->assertSessionHasErrors('direccion');

        $this->assertDatabaseCount('distribuidores', 0);

        $this->post(route('admin.mapa.store'), $datos + [
            'latitud' => '-34.92135',
            'longitud' => '-57.95451',
        ])->assertRedirect(route('admin.mapa.index'));

        $this->assertDatabaseCount('distribuidores', 1);
        Http::assertSentCount(1);
    }
}
