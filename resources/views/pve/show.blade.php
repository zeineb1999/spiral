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
                @if($requisition->NoReq)
                    <table>
                        <tr>
                            <td>{!! nl2br(e($requisition->NoReq)) !!}</td>
                        </tr>
                    </table>
                @endif

                <table>
                    <tr>
                        <td colspan="6" class="title center">CARACTÉRISTIQUES DU VÉHICULE</td>
                    </tr>
                    
                    <!-- Continuez avec les autres champs -->
                </table>

                <!-- Constat -->
                <table>
                    <tr>
                        <td class="title">CONSTAT</td>
                    </tr>
                    
                </table>

               

                <p><button class="button" onClick="window.print();">Imprimer</button></p>
            </td>
        </tr>
    </table>
</body>
</html>
