<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Oualid SAOULI" />
  <meta name="copyright" content="Oualid SAOULI" />
  <link rel="icon" type="image/png" href="./img/logomini.png" />
  <title>Exal :: Rapport d'expertise </title>
  <style>
    body{
      font-family: tahoma, arial, sans-serif;
      font-size: 8pt;  
    }

    .noborder {
       border: 0px none white;   
    }
    
    table {
      margin-top: 5px;
      border-collapse: collapse;
      width: 100%;
      font-size: 8pt; 
    }

    table, td, th {
      border: 1px solid gray;
      text-align: left;
      padding: 1px;
    }
    
    .tile {
      background-color: #D4D4D4;
      font-weight: bold;
      color:black;
    }
      
    .title {
      background-color: gray;
      font-size: 8pt;
      font-weight: bold;
      color: white;
      border: 0px;
    }

    .left {
      /*border-top-left-radius: 2em 5em;*/
    }

    .right{
      /*border-top-right-radius: 2em 5em;*/
    }
      
    .decimal {
      text-align: right;
    }
      
    .center{
      text-align: center;
    }

    tr{
      height: 17px;
    }

    td{
      padding-left : 3px;
      padding-right : 3px;
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
      left: 10%;
    }
    </style>
</head>
<body>
        <div class="center">
            <img src="data:image/png;base64,{{ $header }}" title="Entête EXAL" alt="EXAL SPA" />

        </div>
        <table>
        <tr>
            <td class="title center" colspan="6">RAPPORT D'EXPERTISE</td>
        </tr>
        <tr>
            <td class="tile" width="15%">Direction :</td>
            <td width="19%">{{$req->Classe}} {{$req->Localite}}</td>
            <td class="tile" width="15%">Centre :</td>
            <td width="18%">Centre {{$req->localite}}</td>
            <td class="tile" width="15%">Type de rapport :</td>
            <td width="18%">{{$req->Designation}}</td>
        </tr>
        <tr>
            <td class="tile">Rapport n° :</td>
            <td>{{$req->NoPV}}</td>
            <td class="tile">Etabli le :</td>
            <td>{{$req->DateEtabli}}</td>
            <td class="tile">Expert :</td>
            <td>{{$req->Expert}}</td>
        </tr>
        <tr>
            <td class="tile">Lieu d'expertise :</td>
            <td>{{$req->Centre}}</td>
            <td class="tile">Description :</td>
            <td>{{$req->LieuExp}}</td>
            <td class="tile">Nbre. photos :</td>
            <td>{{$req->NbPhotos}}</td>
        </tr>
        </table>
        <table>
        <tr>
            <td class="title center" colspan="6">AFFAIRE</td>
        </tr>
        <tr>
            <td class="tile" width="15%">Assuré :</td>
            <td width="19%">{{$req->Assure}}</td>
            <td class="tile" width="15%">Agence :</td>
            <td width="18%">{{$req->Agence}}</td>
            <td class="tile" width="15%">Police n° :</td>
            <td width="18%">{{$req->NoPolice}}</td>
        </tr>
        <tr>
            <td class="tile">Date du sinistre :</td>
            <td>{{$req->DateSinistre}}</td>
            <td class="tile">Sinistre n° :</td>
            <td>{{$req->NoSinistre}}</td>
            <td class="tile">Lieu du sinistre :</td>
            <td></td>
        </tr>
        <tr>
            <td class="tile">Tiers :</td>
            <td>{{$req->AssureTiers}}</td>
            <td class="tile">Agence tiers :</td>
            <td>{{$req->AgenceTiers}}</td>
            <td class="tile">Police tiers n° :</td>
            <td>{{$req->NoPoliceTiers}}</td>
        </tr>
        </table>
        
        <table>
        <tr>
            <td class="title center" colspan="6">CARACTERISTIQUES DU VEHICULE</td>
        </tr>
        <tr>
            <td class="tile" width="15%">Immatricule :</td>
            <td width="19%">{{$car->NoImmatr}}</td>
            <td class="tile" width="15%">Genre :</td>
            <td width="18%">{{$car->Genre}}</td>
            <td class="tile" width="15%">Carrosserie :</td>
            <td width="18%">{{$car->Carrosserie}}</td>
        </tr>
        <tr>
            <td class="tile">Marque :</td>
            <td>{{$car->Marque}}</td>
            <td class="tile">Modèle :</td>
            <td>{{$car->Modele}}</td>
            <td class="tile">Energie / Puiss. :</td>
            <td>{{$car->Energie}} ({{$car->Puissance}} CV)</td>
        </tr>
        <tr>
            <td class="tile">Type :</td>
            <td>{{$car->Type}}</td>
            <td class="tile">N° de série :</td>
            <td>{{$car->NoSerie}}</td>
            <td class="tile">Teinte :</td>
            <td>{{$car->Couleur}}</td>
        </tr>
        <tr>
            <td class="tile">Etat :</td>
            <td>{{$car->Etat}}</td>
            <td class="tile">Année M.E.C. :</td>
            <td>{{$car->AnneeMEC}}</td>
            <td class="tile">Kilométrage (Km) :</td>
            <td>{{$car->Kilometrage}}</td>
        </tr>
        </table>
        <table>
        <tr>
            <td class="title center">CONSTAT</td>
        </tr>
        <tr>
            <td style="text-align: justify">
            {{$req->Constat}}
            <br>
            </td>
        </tr>
        </table>
       
        @if ($has_reforme)
            <table>
                <tr>
                    <td class="title center" colspan="2">REFORME</td>
                </tr>
                <tr>
                    <td width="50%" style="font-size: 9pt;">Valeur du véhicule à la veille du sinistre :</td>
                    <td width="50%" style="text-align: right; font-size: 9pt;">{{ $req->ValeurVenale }}</td>
                </tr>
                <tr>
                    <td style="font-size: 9pt;">Valeur épave :</td>
                    <td style="text-align: right; font-size: 9pt;">{{ $req->MtEpave }}</td>
                </tr>
                <tr>
                    <td class="tile" style="font-size: 10pt; font-weight: bold">Mt. du préjudice :</td>
                    <td class="tile decimal" style="font-size: 10pt; font-weight: bold">{{ $req->MtIndem }}</td>
                </tr>
            </table>
        @endif

        @if ($has_choc)
            @foreach ($chocs as $choc)
                <p><strong>{{ $choc->CodeChoc }} - {{ $choc->LibelleChoc }}</strong> (Sens du choc : <strong>{{ $choc->SensChoc }}</strong> | trace de peinture : <strong>{{ $choc->TraceChoc }}</strong>)</p>
                @php
                    $nb = 0;
                @endphp
                @if (count($fournitures))
                    @foreach ($fournitures as $fourniture)
                        @if ( $fourniture->CodeChoc == $choc->CodeChoc)
                            @if ($nb == 0)
                                <table>
                                    <tr>
                                        <td class='title' style='text-align: center; font-size: 8pt; font-weight: bold' width='3%'>Qté</td>
                                        <td class='title' style='text-align: center; font-size: 8pt; font-weight: bold' width='23%'>Désignation</td>
                                        <td class='title' style='text-align: center; font-size: 8pt; font-weight: bold' width='8%'>H.T</td>
                                        <td class='title' style='text-align: center; font-size: 8pt; font-weight: bold' width='8%'>T.V.A</td>
                                        <td class='title' style='text-align: center; font-size: 8pt; font-weight: bold' width='8%'>T.T.C</td>
                                    </tr>
                            @endif
                            <tr>
                                <td style='text-align: center'>{{ $fourniture->Qte}}</td>
                                <td>{{ $fourniture->Designation}}</td>
                                <td style='text-align: right' class='decimal'>{{ $fourniture->MtHT}}</td>
                                <td style='text-align: right' class='decimal'>{{ $fourniture->MtTVA}}</td>
                                <td style='text-align: right' class='decimal'>{{ $fourniture->MtTTC}}</td>
                            </tr>
                            @php
                                $nb = 1;
                            @endphp
                        @endif
                    @endforeach
                @endif
                @if ($nb == 1) </table> @endif
            @endforeach
        @endif

        @if ($has_rep)
            <table>
                <tr>
                    <td class="title center" width="16%">Chocs</td>
                    <td class="title center" width="16%">Choc A</td>
                    <td class="title center" width="14%">Choc B</td>
                    <td class="title center" width="14%">Choc C</td>
                    <td class="title center" width="14%">Mt. H.T</td>
                    <td class="title center" width="12%">Mt. T.V.A</td>
                    <td class="title center" width="14%">Mt. T.T.C</td>
                </tr>
                <tr>
                    <td class="tile">Pièces :</td>
                    <td class="decimal">{{ $rowFournitures[0] }}</td>
                    <td class="decimal">{{ $rowFournitures[1] }}</td>
                    <td class="decimal">{{ $rowFournitures[2] }}</td>
                    <td class="decimal">{{ $rowFournitures[3] }}</td>
                    <td class="decimal">{{ $rowFournitures[4] }}</td>
                    <td class="decimal">{{ $rowFournitures[5] }}</td>
                </tr>
                <tr>
                    <td class="tile">Glaces :</td>
                    <td class="decimal">{{ $rowGlaces[0] }}</td>
                    <td class="decimal">{{ $rowGlaces[1] }}</td>
                    <td class="decimal">{{ $rowGlaces[2] }}</td>
                    <td class="decimal">{{ $rowGlaces[3] }}</td>
                    <td class="decimal">{{ $rowGlaces[4] }}</td>
                    <td class="decimal">{{ $rowGlaces[5] }}</td>
                </tr>
                <tr>
                    <td class="tile">Pneumatique :</td>
                    <td class="decimal">{{ $rowPneus[0] }}</td>
                    <td class="decimal">{{ $rowPneus[1] }}</td>
                    <td class="decimal">{{ $rowPneus[2] }}</td>
                    <td class="decimal">{{ $rowPneus[3] }}</td>
                    <td class="decimal">{{ $rowPneus[4] }}</td>
                    <td class="decimal">{{ $rowPneus[5] }}</td>
                </tr>
                <tr>
                    <td class="tile">Peinture :</td>
                    <td class="decimal">{{ $rowPeintures[0] }}</td>
                    <td class="decimal">{{ $rowPeintures[1] }}</td>
                    <td class="decimal">{{ $rowPeintures[2] }}</td>
                    <td class="decimal">{{ $rowPeintures[3] }}</td>
                  
                    <td class="decimal">0.00</td>
                    <td class="decimal">{{ $rowPeintures[3] }}</td>
                </tr>
                <tr>
                    <td class="tile">M. d\'oeuvre :</td>
                    <td class="decimal">{{ $rowMOeuvre[0] }}</td>
                    <td class="decimal">{{ $rowMOeuvre[1] }}</td>
                    <td class="decimal">{{ $rowMOeuvre[2] }}</td>
                    <td class="decimal">{{ $rowMOeuvre[3] }}</td>
                    <td class="decimal">0.00</td>
                    <td class="decimal">{{ $rowMOeuvre[3] }}</td>
                </tr>
                <tr>
                    <td class="tile">Immobilisation :</td>
                    <td style="text-align: right;">{{ $rowImmo[0] }}</td>
                    <td style="text-align: right;">{{ $rowImmo[1] }}</td>
                    <td style="text-align: right;">{{ $rowImmo[2] }}</td>
                    <td style="text-align: right;">{{ $rowImmo[0] }}</td>
                    <td colspan="3" style="text-align: center;"><strong>'.$rowImmo[3].' Jour(s).</strong></td></tr>;
                </tr>
                <!-- Autres lignes ici... -->
            </table>
        @endif

        @if ($has_enlettre)
            <table id="enLettres-area">
                <tr>
                    <td class="title left right">&nbsp;En lettres :</td>
                </tr>
                <tr>
                    <td>&nbsp;<strong></strong></td>
                </tr>
            </table>
        @endif

        @if ($has_obs)
            <table id="obs-area">
                <tr>
                    <td class="title left right">Observation :</td>
                </tr>
                <tr>
                    <td>
                        @if ($req->ValeurVenale == "")
                            @if ($valeurvenale == "") 
                                &nbsp;
                            @else 
                                {{ $valeurvenale }}
                            @endif
                        @else
                            @if ($valeurvenale == "") 
                                {{ $req->ValeurVenale }}
                            @else
                              {{ $valeurvenale }} <strong><span class='decimal'>{{ $req->ValeurVenale }}</span> DA</strong>
                            @endif
                        @endif
                    </td>
                </tr>
            </table>
        @endif

        
        <div>
            <table class="noborder">
            <tr>
                <td class="noborder" style="width: 30%; text-align: left; vertical-align: text-top;"> <strong></strong> </td>
                <td  class="noborder sign" style="width: 50%; text-align: center; vertical-align: text-top; text-decoration: underline; font-weight: bold; font-size: 12pt;">L'EXPERT<br>
               
                </td>
                <td class="noborder" style="width: 20%; text-align: right">
              
                </td>
            </tr>
            </table>
        </div>
</body>
</html>