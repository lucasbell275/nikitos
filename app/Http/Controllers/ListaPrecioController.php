<?php

namespace App\Http\Controllers;

use App\Models\ListaPrecio;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ListaPrecioController extends Controller
{
    public function index(): View
    {
        return view('vistas.zona-privada.lista-precios', [
            'listas' => ListaPrecio::latest()->get(),
        ]);
    }

    public function ver(ListaPrecio $listaPrecio): StreamedResponse
    {
        abort_unless(Storage::disk('local')->exists($listaPrecio->archivo_path), 404);

        return Storage::disk('local')->response(
            $listaPrecio->archivo_path,
            Str::slug($listaPrecio->titulo).'.pdf',
            ['Content-Type' => 'application/pdf', 'X-Content-Type-Options' => 'nosniff'],
        );
    }

    public function descargar(ListaPrecio $listaPrecio): StreamedResponse
    {
        abort_unless(Storage::disk('local')->exists($listaPrecio->archivo_path), 404);

        return Storage::disk('local')->download(
            $listaPrecio->archivo_path,
            Str::slug($listaPrecio->titulo).'.pdf',
            ['Content-Type' => 'application/pdf', 'X-Content-Type-Options' => 'nosniff'],
        );
    }
}
