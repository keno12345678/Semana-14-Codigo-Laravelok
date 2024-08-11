@extends('layout')

@section('title', 'Envio')

@section('content')
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Confirmación de Envío</title>
        <style>

            .confirmation-page {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                padding: 20px;
            }
            .container {
                max-width: 600px;
                margin: 0 auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            h1 {
                color: #333;
                text-align: center;
            }
            p {
                font-size: 16px;
                line-height: 1.6;
            }
        </style>
    </head>
    <body>
        <div class="confirmation-page">
            <div class="container">
                <h1>Mensaje Enviado</h1>
                <p>Tu mensaje ha sido enviado correctamente.</p>

            </div>
        </div>
    </body>
    </html>
@endsection
