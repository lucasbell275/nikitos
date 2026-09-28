<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">

        {{-- CONDICIONAL PARA VENTAS --}}
        @if ($contacto->razon_social)
            <h2>Nueva Consulta de Ventas</h2>
            <ul>
                <li><strong>Razón Social:</strong> {{ $contacto->razon_social }}</li>
                <li><strong>CUIT:</strong> {{ $contacto->cuit }}</li>
                <li><strong>Tipo de Negocio:</strong> {{ $contacto->tipo_negocio }}</li>
                <li><strong>Trayectoria en el mercado:</strong>
                    {{ $contacto->trayectoria_mercado ?? 'No especificada' }}</li>
                <li><strong>Dirección:</strong> {{ $contacto->direccion }}</li>
                <li><strong>Localidad:</strong> {{ $contacto->localidad }}</li>
                <li><strong>Teléfono:</strong> {{ $contacto->telefono }}</li>
                <li><strong>Celular:</strong> {{ $contacto->celular }}</li>
                <li><strong>Horario de atención:</strong> {{ $contacto->horario_atencion }}</li>
                <li><strong>Correo Electrónico:</strong> {{ $contacto->email }}</li>
                <li><strong>Observaciones:</strong> <br>{{ $contacto->observaciones }}</li>
            </ul>

            {{-- CONDICIONAL PARA RRHH --}}
        @else
            <h2>Nueva Postulación de RRHH (CV)</h2>
            <ul>
                <li><strong>Nombre y Apellido:</strong> {{ $contacto->nombre }}</li>
                <li><strong>Género:</strong> {{ $contacto->genero }}</li>
                <li><strong>Localidad:</strong> {{ $contacto->localidad }}</li>
                <li><strong>Celular:</strong> {{ $contacto->celular }}</li>
                <li><strong>Correo Electrónico:</strong> {{ $contacto->email }}</li>
                <li><strong>Currículum:</strong>
                    @if ($contacto->curriculum)
                        Archivo adjunto en el sistema.
                    @else
                        No se adjuntó archivo.
                    @endif
                </li>
            </ul>
        @endif

    </div>
</body>

</html>
