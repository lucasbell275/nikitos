<?php

namespace App\Http\Controllers;

use App\Models\Distribuidor;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class DistribuidorController extends Controller
{
    public function index(): View
    {
        $distribuidores = Distribuidor::query()->orderBy('nombre')->get();

        return view('vistas.mapa.index', [
            'distribuidores' => $distribuidores,
            'mapLocations' => $distribuidores->map->only(['id', 'nombre', 'provincia', 'ciudad', 'direccion', 'latitud', 'longitud'])->values(),
        ]);
    }

    public function AdminIndex(): View
    {
        return view('admin.mapa.index', [
            'distribuidor' => Distribuidor::query()->orderBy('nombre')->get(),
        ]);
    }

    public function edit(Distribuidor $distribuidor): View
    {
        return view('admin.mapa.edit', compact('distribuidor'));
    }

    public function create(): View
    {
        return view('admin.mapa.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateDistributor($request);
        [$validated['latitud'], $validated['longitud']] = $this->coordinatesFor($validated);

        Distribuidor::create($validated);

        return redirect()->route('admin.mapa.index')->with('success', 'Distribuidor creado correctamente');
    }

    public function update(Request $request, Distribuidor $distribuidor): RedirectResponse
    {
        $validated = $this->validateDistributor($request);

        if (! isset($validated['latitud'], $validated['longitud'])
            && $distribuidor->direccion === $validated['direccion']
            && $distribuidor->ciudad === $validated['ciudad']
            && $distribuidor->provincia === $validated['provincia']
            && $distribuidor->latitud !== null
            && $distribuidor->longitud !== null) {
            $validated['latitud'] = $distribuidor->latitud;
            $validated['longitud'] = $distribuidor->longitud;
        } else {
            [$validated['latitud'], $validated['longitud']] = $this->coordinatesFor($validated);
        }

        $distribuidor->update($validated);

        return redirect()->route('admin.mapa.index')->with('success', 'Distribuidor editado correctamente');
    }

    public function destroy(Distribuidor $distribuidor): RedirectResponse
    {
        $distribuidor->delete();

        return redirect()->route('admin.mapa.index')->with('success', 'Registro eliminado correctamente.');
    }

    /** @return array{nombre: string, provincia: string, ciudad: string, direccion: string, latitud?: float, longitud?: float} */
    private function validateDistributor(Request $request): array
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'provincia' => ['required', 'string', 'max:255'],
            'ciudad' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
            'latitud' => ['nullable', 'required_with:longitud', 'numeric', 'between:-90,90'],
            'longitud' => ['nullable', 'required_with:latitud', 'numeric', 'between:-180,180'],
        ]);

        return array_filter($validated, static fn ($value) => $value !== null && $value !== '');
    }

    /** @param array{provincia: string, ciudad: string, direccion: string, latitud?: float, longitud?: float} $data
     * @return array{0: float, 1: float}
     */
    private function coordinatesFor(array $data): array
    {
        if (isset($data['latitud'], $data['longitud'])) {
            return [(float) $data['latitud'], (float) $data['longitud']];
        }

        $address = implode(', ', [$data['direccion'], $data['ciudad'], $data['provincia'], 'Argentina']);
        $cacheKey = 'distribuidor-geocode:'.sha1(mb_strtolower($address));

        try {
            $coordinates = Cache::rememberForever($cacheKey, function () use ($address): ?array {
                $response = Http::withUserAgent('NikitosDistribuidores/1.0 (ventas@nikitos.com.ar)')
                    ->connectTimeout(3)
                    ->timeout(6)
                    ->get('https://nominatim.openstreetmap.org/search', [
                        'q' => $address,
                        'format' => 'jsonv2',
                        'countrycodes' => 'ar',
                        'limit' => 1,
                    ]);

                if (! $response->successful()) {
                    return null;
                }

                $match = $response->json('0');

                if (! is_array($match) || ! isset($match['lat'], $match['lon'])) {
                    return null;
                }

                return [(float) $match['lat'], (float) $match['lon']];
            });
        } catch (ConnectionException) {
            $coordinates = null;
        }

        if ($coordinates === null) {
            throw ValidationException::withMessages([
                'direccion' => 'No pudimos ubicar esta dirección. Revisala o ingresá la latitud y longitud manualmente.',
            ]);
        }

        return $coordinates;
    }
}
