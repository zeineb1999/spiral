{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requisition</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .content {
            margin: 20px;
        }
    </style>
</head>
<body>
    <div class="header">Requisition Details</div>
    <div class="content">
        <p><strong>No Requisition:</strong> {{ $requisition->NoReq }}</p>
        <p><strong>Date Etabli:</strong> {{ $requisition->DateEtabli }}</p>
        <p><strong>Code Client:</strong> {{ $requisition->CodeClient }}</p>
        <!-- Ajoute d'autres informations nécessaires -->
    </div>
</body>
</html>

--}}









<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Oualid SAOULI" />
  <meta name="copyright" content="Oualid SAOULI" />
  <link rel="icon" type="image/png" href="./img/logomini.png" />
  <title>Exal :: Facture d'honoraire</title>
  <style>
    body {
      font-family: tahoma, arial, sans-serif;
      font-size: 9pt; 
    }
    
    .noborder {
       border: 0px none white;   
    }
    
    table {
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid gray;
      text-align: left;
      padding: 4px;
    }
    
    .fisc {
      background-color: gray;
      font-weight: bold;
      text-align: center;
      color: white;
      border-top-left-radius: 2em 5em;
      border-top-right-radius: 2em 5em;
      border-bottom-left-radius: 2em 5em;
      border-bottom-right-radius: 2em 5em;
      border: 0px;
    }
      
    .tile {
      background-color: #D4D4D4;
      font-weight: bold;
      color:black;
    }
      
    .title {
      background-color: gray;
      font-size: 11pt;
      font-weight: bold;
      color: white;
      border: 0px;
    }
    
    .left{
      border-top-left-radius: 2em 5em;    
    }
      
    .right{
      border-top-right-radius: 2em 5em;   
    }
      
    .decimal {
      text-align: right;
    }
      
    .center{
      text-align: center;
    }

    tr{
      height: 20px;
    }

    .sign {
      position: relative;
    }

    .sign .cachet, .sign .signature {
      position: absolute;
      top: 50%;
      left: 50%;
    }

    .sign .cachet_rond {
      position: absolute;
      top: 35%;
      left: 20%;
    }
  </style>
</head>
<body>
  <div>
    <div>          
      <table>
        
       
        <tr>
            <td class="noborder center" colspan="4">
                <img src="data:image/png;base64,{{ $header }}" title="Entête EXAL" alt="EXAL SPA" />
            </td>
        </tr>

        
        <tr>
          <td class="fisc" colspan="4" style="font-size: 8pt;">  R.C. : {{ $entete->RC }} - Matr. Fisc. : {{ $entete->MatrFisc }} - N° Art. : {{ $entete->NArt }} - R.I.B. {{ $entete->Banque }} : {{ $entete->RIB }}
          </td>  
        </tr>
        <tr>
          <td class="noborder" colspan="4">&nbsp;</td>
        </tr>
          <tr>
            <td class="title center left right" colspan="4">FACTURE</td>
          </tr>
          <tr>
            <td class="tile" width="20%">Direction :</td>
            <td width="30%">{{$entete->Direction}}</td>
            <td class="tile" width="20%">Structure :</td>
            <td width="30%">{{$fact->Classe}} {{$fact->Localite}} </td>
          </tr>
          <tr>
            <td class="tile">Facture n° :</td>
            <td>{{$fact->Structure}}/{{$fact->Exercice}}/{{$fact->Branche}}/{{$fact->noFact}}</td>
            <td class="tile">du :</td>
            <td>{{$fact->Date}}</td>
          </tr>
      </table>
    </div><br>
    <div>
      <table>
          <tr>
            <td class="title center left right" colspan="4">CLIENT</td>
          </tr>
          <tr>
            <td class="tile" width="20%">Compagnie :</td>
            <td width="30%">{{$fact->CodeComp}}</td>
            <td class="tile" width="20%"></td>
            <td width="30%">{{$fact->ClientInfo}}</td>
          </tr>
          <tr>
            <td class="tile">Registre de comm. :</td>
            <td>-</td>
            <td class="tile">Matricule fiscale :</td>
            <td>-</td>
          </tr>
          <tr>
            <td class="tile">N° article :</td>
            <td>-</td>
            <td class="tile">R.I.B. :</td>
            <td>-</td>
          </tr>
      </table>
    </div><br>
    <div>
      <table>
          <tr>
            <td class="title center left right" colspan="4">AFFAIRE</td>
          </tr>
          <tr>
            <td class="tile" width="20%">Rapport d'exp. n° :</td>
            <td width="30%">{{$fact->Structure}}/{{$fact->Exercice}}/{{$fact->Branche}}/{{$fact->noReq}}/{{$fact->Objet}}</td>
            <td class="tile" width="20%">Etabli le :</td>
            <td width="30%">{{$fact->Date}}</td>
          </tr>
          <tr>
            <td class="tile">Assuré :</td>
            <td>{{$fact->Assure}}</td>
            <td class="tile">Tiers :</td>
            <td>{{$fact->AssureTiers}}</td>
          </tr>
          <tr>
            <td class="tile">Police n° :</td>
            <td>{{$fact->NoPolice}}</td>
            <td class="tile">Sinistre n° :</td>
            <td>{{$fact->NoSinistre}}</td>
          </tr>
          <tr>
            <td class="tile">Accident du :</td>
            <td>{{$fact->DateSinistre}}</td>
            <td class="tile">Mt. des dommages :</td>
            <td class="decimal" style="text-align: left">{{$fact->MtDommages}}</td>
          </tr>
      </table>
    </div><br>
    <div>
      <table>
          <tr  style="height: 30px;">
            <td class="title center left" width="20%">Désignation</td>
            <td class="title center" width="30%">Montant H.T.</td>
            <td class="title center" width="20%">T.V.A. (19%)</td>
            <td class="title center right" width="30%">Montant T.T.C. (DA)</td>
          </tr>
          <tr  style="height: 30px;">
            <td class="tile">Honoraires</td>
            <td class="decimal">{{$fact->Honoraires}}</td>
            <td class="decimal">{{$fact->MtTVA}}</td>

            <td class="decimal"> 
            @php
                $totalMHT = $fact->Honoraires +$fact->MtTVA;
            @endphp
             {{ $totalMHT}}</td>
          </tr>
          <tr  style="height: 30px;">
            <td class="tile">Frais de dossier</td>
            <td class="decimal">{{$fact->MtFD}}</td>
            <td style="text-align: right">-</td>
            <td class="decimal">{{$fact->MtFD}}</td>
          </tr>
          <tr  style="height: 30px;">
            <td class="tile">Frais de déplacement</td>
            <td class="decimal">{{$fact->MtDeplacement}}</td>
            <td style="text-align: right">-</td>
            <td class="decimal">{{$fact->MtDeplacement}}</td>
          </tr>
          <tr  style="height: 30px;">
            <td class="tile">Photos</td>
            <td class="decimal">{{$fact->MtPhotos}}</td>
            <td style="text-align: right">-</td>
            <td class="decimal">{{$fact->MtPhotos}}</td>
          </tr>
          <tr  style="height: 30px;">
            <td class="tile">Séjour</td>
            <td class="decimal">{{$fact->MtRepasNuitee}}</td>
            <td style="text-align: right">-</td>
            <td class="decimal">{{$fact->MtRepasNuitee}}</td>
          </tr>
          <tr  style="height: 30px;">
            <td class="tile">Total</td>
            <td class="decimal tile">
            @php
                $totalTT1= $fact->Honoraires + $fact->MtFD + $fact->MtDeplacement + $fact->MtPhotos + $fact->MtRepasNuitee  ;
            @endphp
            {{$totalTT1}}</td>
            <td class="decimal tile">{{$fact->MtTVA}}</td>
            <td class="decimal tile">
     
            @php
                $totalTT2 = $fact->Honoraires + $fact->MtTVA+$fact->MtFD + $fact->MtDeplacement + $fact->MtPhotos + $fact->MtRepasNuitee  ;
            @endphp
            {{$totalTT2}}
            </td>
          </tr>
      </table><br>
    </div>
    <div>
      <table>
          <tr style="height: 30px;">
            <td width="20%" style="border-color: white"></td>
            <td width="30%" style="border-top-color: white; border-bottom-color: white; border-left-color: white"></td>
            <td class="tile" width="20%">Honoraires H.T.</td>
            <td class="decimal" width="30%">{{$fact->Honoraires}}</td>
          </tr>
          <tr  style="height: 30px;">
            <td style="border-color: white"></td>
            <td style="border-top-color: white; border-bottom-color: white; border-left-color: white"></td>
            <td class="tile">T.V.A. (19%)</td>
            <td class="decimal">{{$fact->MtTVA}}</td>
          </tr>
          <tr  style="height: 30px;">
            <td style="border-color: white"></td>
            <td style="border-top-color: white; border-bottom-color: white; border-left-color: white"></td>
            <td class="tile">Frais annexes</td>
            @php
                $totalTT3=  $fact->MtFD + $fact->MtDeplacement + $fact->MtPhotos + $fact->MtRepasNuitee ;
            @endphp
            <td class="decimal">{{$totalTT3}}</td>
          </tr>
          <tr  style="height: 30px;">
            <td style="border-color: white"></td>
            <td style="border-top-color: white; border-bottom-color: white; border-left-color: white"></td>
            <td class="tile">Total facture T.T.C.</td>
            @php
                $totalTTC = $fact->Honoraires + $fact->MtFD + $fact->MtDeplacement + $fact->MtPhotos + $fact->MtRepasNuitee  + $fact->MtTVA;
            @endphp
            <td class="decimal tile" id="totalTTC">{{$totalTTC}}</td>
          </tr>
      </table>
    </div><br>
    <div>
      <table>
          <tr>
            <td class="title left right">En lettres :</td>
          </tr>
          <tr>
            <td style="font-size: 10pt;"><strong>{{ $totalTTCEnLettre }}</strong></td>
          </tr>
      </table>
    </div>
    <div>
      <table>
          <tr>
          <td  class="noborder" style="width: 20%; font-size: 8pt;">
            <p style="text-decoration: underline; font-weight: bold; ">Observations :</p>
            @foreach($liste as $index => $valeur)
                <br>{{ $index + 1 }}) {{ $valeur->facture }}
            @endforeach
            </td> 
            <td  class="noborder sign" style="width: 60%; text-align: center; vertical-align: text-top; text-decoration: underline; font-weight: bold; font-size: 12pt;">
              <p>L'EXPERT</p>
              @php
                  // Encodage du Cachet rond
                  $cachet = base64_encode(file_get_contents("images/signatures/cachet_rond_without_bg.png"));
                  $griffe = base64_encode(file_get_contents("images/signatures/{$expert->IdEmploye}.png"));
                  $sign = base64_encode(file_get_contents("images/signatures/{$expert->Signature}.png"));
              @endphp

              <img style="z-index:1;" class="cachet_rond" src="data:image/png;base64,{{ $cachet }}" alt="Cachet rond" width="150" height="150">
              <img style="z-index:0;" class="cachet" src="data:image/png;base64,{{ $griffe }}" alt="Cachet de l'expert" width="200" height="100">
              <img style="z-index:2;" class="cachet" src="data:image/png;base64,{{ $sign }}" alt="Signature" width="250" height="130">

            </td>
            <td  class="noborder" style="width: 20%; text-align: right;">
           
            @if(isset($fact->noFact))
              @php
                  $qrLink = "https://api.qrserver.com/v1/create-qr-code/?data=www.exal.dz/spiral/facture_g_imp.php?q=" . $fact->noFact . "&size=80x80";
                  $qr = base64_encode(file_get_contents($qrLink));
              @endphp
              <img id="qrcode" src="data:image/png;base64,{{ $qr }}" alt="QR Code" width="80" height="80">
            @endif
            </td>  
          </tr>
      </table>
    </div>
  </div>
</body>
</html>