<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recibo de Pago #{{ $pago->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        .header { text-align: center; margin-bottom: 20px; }
        .content { margin: 0 20px; }
        .footer { position: fixed; bottom: 20px; width: 100%; text-align: center; font-size: 12px; color: gray; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
        th, td { padding: 8px; border: 1px solid #ddd; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Recibo de Pago</h2>
        <p>ID: {{ $pago->id }}</p>
        <p>Fecha: {{ $pago->fecha->format('d/m/Y') }}</p>
    </div>

    <div class="content">
        <table>
            <tr>
                <th>Cliente</th>
                <td>{{ $pago->cliente->nombre }}</td>
            </tr>
            <tr>
                <th>Concepto</th>
                <td>{{ $pago->concepto }}</td>
            </tr>
            <tr>
                <th>Monto</th>
                <td>${{ number_format($pago->monto, 2) }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <p>Gracias por su pago.</p>
    </div>
</body>
</html>
