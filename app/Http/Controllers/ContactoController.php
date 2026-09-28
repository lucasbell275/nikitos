<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;


use App\Mail\ContactoMailable;
use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactoController extends Controller
{
    public function AdminIndex(Contacto $contacto)
    {
        $contacto = Contacto::all();
        return view('admin.contacto.index', compact('contacto'));
    }
    public function show($id){
        $contacto = Contacto::findOrFail($id);

        return view('admin.contacto.show', compact('contacto'));
    }


    public function create()
    {
        return view('vistas.contacto.create');
    }

    public function store(Request $request)
    {
        if ($request->tipo_formulario === 'ventas') {

            $validatedData = $request->validate([
                'razon_social' => 'required|string',
                'cuit' => 'required|string',
                'tipo_negocio' => 'required|string',
                'trayectoria_mercado' => 'nullable|string',
                'direccion' => 'required|string',
                'localidad' => 'required|string',
                'telefono' => 'required|string',
                'celular' => 'required|string',
                'horario_atencion' => 'required|string',
                'email' => 'required|email',
                'observaciones' => 'required|string',
            ]);


            $contacto = Contacto::create($validatedData);


            $correoDestino = env('MAIL_TO_ADDRESS');
            Mail::to($correoDestino)->send(new ContactoMailable($contacto));


            return redirect()->back()->with('success', 'Consulta enviada exitosamente.');
        } elseif ($request->tipo_formulario === 'rrhh') {

            $validatedData = $request->validate([
                'nombre' => 'required|string',
                'genero' => 'required|string',
                'localidad' => 'required|string',
                'celular' => 'required|string',
                'email' => 'required|email',
                'curriculum' => 'required|file|mimes:pdf,doc,docx|max:5120', // máximo 5MB
            ]);

            $curriculumPath = null;
            if ($request->hasFile('curriculum')) {
                $curriculumPath = $request->file('curriculum')->store('curriculums', 'public');
            }


            $contacto = Contacto::create(array_merge($validatedData, [
                'curriculum' => $curriculumPath,
            ]));


            $correoDestino = env('MAIL_TO_ADDRESS');
            Mail::to($correoDestino)->send(new ContactoMailable($contacto));


            return redirect()->back()->with('success', 'CV enviado exitosamente.');
        }
    }

    public function destroy($id)
    {
        $contacto = Contacto::findOrFail($id);
        if ($contacto->curriculum) {
            if (Storage::disk('public')->exists($contacto->curriculum)) {
                Storage::disk('public')->delete($contacto->curriculum);
            }
        }

        $contacto->delete();
        return redirect()->route('admin.contacto.index')->with('success', 'Registro eliminado correctamente.');
    }
}
