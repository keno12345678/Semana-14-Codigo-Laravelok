<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Mensaje Recibido</title>
</head>
<body>
    <h1>Nuevo Mensaje Recibido</h1>
    <p>Recibiste un correo del sistema automático con los siguientes detalles:</p>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Nombre</th>
            <td>{{ $mensaje['nombre'] }}</td>
        </tr>
        <tr>
            <th>Correo</th>
            <td>{{ $mensaje['email'] }}</td>
        </tr>
        <tr>
            <th>Asunto</th>
            <td>{{ $mensaje['asunto']}}</td>
        </tr>
        <tr>
            <th>Mensaje</th>
            <td>{{ $mensaje['mensaje']}}</td>
        </tr>
    </table>
</body>
</html>
