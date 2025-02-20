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
            color: #333;
        }
        h1, h2, h3 {
            color: #4A5568; /* Color gris oscuro */
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .image-container {
            display: flex;
            flex-wrap: wrap; /* Permite que las imágenes se envuelvan */
            gap: 10px; /* Espacio entre las imágenes */
            justify-content: center; /* Centrar las imágenes */
        }
        .image-item {
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
            width: 150px; /* Ajusta el tamaño según sea necesario */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra sutil */
            margin-bottom: 15px
        }
        .image-item:hover {
            transform: scale(1.05); /* Efecto de zoom al pasar el ratón */
        }
        .image-item img {
            width: 100%;
            height: auto;
        }
        .text-gray {
            color: #666;
        }
        .section {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff; /* Fondo blanco para las secciones */
        }
        .section h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Muestra: {{ $muestra->codigo }}</h1>
        <h2>ID: {{ $muestra->id }}</h2>
        <h2>Fecha: {{ $muestra->fecha }}</h2>
        <h3>Usuario ID: {{ $muestra->user_id }}</h3>
    </div>

    <div class="section">
        <h3>Sede: {{ $sede->nombre }}</h3> <!-- Nombre de la sede -->
        <h3>Formato: {{ $formato->nombre }}</h3> <!-- Nombre del formato -->
        
    </div>

    <div class="section">
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
                        <p style="margin-left: 15px">{{ $imagen['zoom'] }}</p>
                    </div>
                @endforeach
            @else
                <p>No hay imágenes disponibles.</p>
            @endif
        </div>
    </div>

    <div class="section">
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
    </div>
</body>
</html>