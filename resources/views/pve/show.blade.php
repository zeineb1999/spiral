<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PVE Report</title>
    <style>
        .title {
            font-weight: bold;
            text-align: center;
            border-bottom: 1px solid black;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
        }

    </style>
</head>
<body>
    <table>
        <tr>
            <td>
                @if($requisition->has_intro)
                    <table>
                        <tr>
                            <td>{!! nl2br(e($requisition->intro)) !!}</td>
                        </tr>
                    </table>
                @endif

                <table>
                    <tr>
                        <td colspan="6" class="title center">CARACTÉRISTIQUES DU VÉHICULE</td>
                    </tr>
                    <tr>
                        <td>Immatricule :</td>
                        <td>{{ $car['immatricule'] }}</td>
                        <td>Genre :</td>
                        <td>{{ $car['genre'] }}</td>
                        <td>Carrosserie :</td>
                        <td>{{ $car['carrosserie'] }}</td>
                    </tr>
                    <tr>
                        <td>Marque :</td>
                        <td>{{ $car['marque'] }}</td>
                        <td>Modèle :</td>
                        <td>{{ $car['modele'] }}</td>
                        <td>Énergie :</td>
                        <td>{{ $car['energie'] }} ({{ $car['puissance'] }} CV)</td>
                    </tr>
                    <!-- Continuez avec les autres champs -->
                </table>

                <!-- Constat -->
                <table>
                    <tr>
                        <td class="title">CONSTAT</td>
                    </tr>
                    <tr>
                        <td>{!! nl2br(e($requisition->constat)) !!}</td>
                    </tr>
                </table>

                <!-- Réforme -->
                @if($requisition->has_reforme)
                    <table>
                        <tr>
                            <td>Valeur du véhicule :</td>
                            <td>{{ number_format($requisition->valeur_vehicule, 2) }}</td>
                        </tr>
                        <tr>
                            <td>Valeur épave :</td>
                            <td>{{ number_format($requisition->valeur_epave, 2) }}</td>
                        </tr>
                        <tr>
                            <td>Montant préjudice :</td>
                            <td>{{ number_format($requisition->montant_prejudice, 2) }}</td>
                        </tr>
                    </table>
                @endif

                <!-- QR Code -->
                @if(isset($requisition->qrcode))
                    <img src="data:image/png;base64,{{ $requisition->qrcode }}" alt="QR Code" width="80" height="80">
                @endif

                <p><button class="button" onClick="window.print();">Imprimer</button></p>
            </td>
        </tr>
    </table>
</body>
</html>
