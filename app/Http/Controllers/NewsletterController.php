<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;


use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suscriptores = Newsletter::latest()->get();
        return view('admin.newsletter.index', compact('suscriptores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:suscriptores_newsletter,email',
        ], [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debe ser un correo electrónico válido.',
            'email.unique' => 'Este correo ya se encuentra suscripto.',
        ]);

        Newsletter::create([
            'email' => $request->email,
        ]);

        return back()->with('newsletter_success', '¡Gracias por suscribirte a nuestro newsletter!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $suscriptor = Newsletter::findOrFail($id);
        $suscriptor->delete();

        return back()->with('success', 'Suscriptor eliminado correctamente.');
    }
}
