<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muestra PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h1, h2, h3 {
            color: #333;
        }
        .image-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .image-item {
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
            width: 150px; /* Ajusta el tamaño según sea necesario */
        }
        .image-item img {
            width: 100%;
            height: auto;
        }
        .text-gray {
            color: #666;
        }
    </style>
</head>
<body>
    <h1>Muestra: {{ $muestra->codigo }}</h1>
    <h2>ID: {{ $muestra->id }}</h2>
    <h2>Fecha: {{ $muestra->fecha }}</h2>
    <h3>Usuario ID: {{ $muestra->user_id }}</h3>

    <h3>Sede: {{ $sede->nombre }}</h3> <!-- Nombre de la sede -->
    <h3>Formato: {{ $formato->nombre }}</h3> <!-- Nombre del formato -->
    
    <h2>Imágenes</h2>
    <div class="image-container">
        @if (count($imagenes) > 0)
            @foreach ($imagenes as $imagen)
                <div class="image-item">
                    @if ($imagen['base64'])
                        <img src="data:image/jpeg;base64,{{ $imagen['base64'] }}" alt="URL: {{ $imagen['path'] }}">
                    @else
                        <p>Error al cargar la imagen</p>
                    @endif
                    <p>{{ $imagen['zoom'] }}</p>
                </div>
            @endforeach
        @else
            <p>No hay imágenes disponibles.</p>
        @endif
    </div>

    <h2>Interpretaciones</h2>
    @if (count($interpretaciones) > 0)
        <ul>
            @foreach ($interpretaciones as $interpretacion)
                <li>{{ $interpretacion->texto }}</li> <!-- Mostrar el texto de la interpretación -->
            @endforeach
        </ul>
    @else
        <p>No hay interpretaciones disponibles.</p>
    @endif
</body>
</html>