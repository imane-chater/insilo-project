<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Facture {{ $booking->id }}</title>
    <style>
        /* Basic styles for the invoice */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .invoice-header {
            text-align: center;
            font-size: 1.5em;
            font-weight: bold;
        }
        .invoice-section {
            margin: 10px 0;
        }
        .invoice-section h2 {
            margin: 0;
            font-size: 1.2em;
        }
        .invoice-details, .client-details {
            margin: 5px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .invoice-details table, .client-details table {
            width: 100%;
        }
        .invoice-details th, .invoice-details td,
        .client-details th, .client-details td {
            text-align: left;
            padding: 5px;
        }
        .invoice-details th {
            width: 30%;
        }
        h1 {
            text-align: center
        }
    </style>
</head>
<body>
    <h1>Insilo Lazer Quest</h1>

    <div class="invoice-header">
        Facture {{ $booking->id }}
    </div>

    <div class="client-details invoice-section">
        <h2>Information Client</h2>
        <table>
            <tr>
                <th>Nom</th>
                <td>{{ $client->first_name }}</td>
            </tr>
            <tr>
                <th>Prénom</th>
                <td>{{ $client->last_name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $client->email }}</td>
            </tr>
        </table>
    </div>

    <div class="invoice-details invoice-section">
        <h2>Détails Réservation</h2>
        <table>
            <tr>
                <th>Prix</th>
                <td>{{ $booking->price }} EUR</td>
            </tr>
            <tr>
                <th>Nombre de Joueurs</th>
                <td>{{ $booking->number_of_gamers }}</td>
            </tr>
            <tr>
                <th>Date de Jeux</th>
                <td>{{ $booking->booking_date }}</td>
            </tr>
            <tr>
                <th>Date Confirmation</th>
                <td>{{ $booking->updated_at }}</td> <!-- or other relevant date -->
            </tr>
        </table>
    </div>

</body>
</html>
