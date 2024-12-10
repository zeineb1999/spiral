@forelse ($requisitions as $requisition)
    <tr class="{{ $requisition->Annulation ? 'text-decoration-line-through' : '' }}">
        <td>
            <span data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $requisition->Abreviation }}">
                {{ $requisition->Structure }}
            </span>
        </td>
        <td>{{ $requisition->Structure }}/{{ $requisition->Exercice }}/{{ $requisition->Branche }}/{{ $requisition->NoReq }}/{{ $requisition->Objet }}</td>
        <td>{{ \Carbon\Carbon::parse($requisition->DateEnreg)->format('d/m/Y') }}</td>
        <td class="text-truncate" style="max-width: 150px; overflow: hidden; white-space: nowrap;">{{ $requisition->Assure }}</td>
        <td>{{ $requisition->NoPolice }}</td>
        <td>{{ $requisition->NoSinistre }}</td>
        <td>{{ \Carbon\Carbon::parse($requisition->DateSinistre)->format('d/m/Y') }}</td>
        <td class="text-truncate" style="max-width: 150px; overflow: hidden; white-space: nowrap;">{{ $requisition->Nom }} {{ $requisition->Prenom }}</td>
        <td class="text-center">
            @if ($requisition->DateEtabli && session('username') == $requisition->CodeComp . $requisition->CodeClient)<!-- Remplacez avec la colonne de votre base -->
                
            <a href="{{ route('rapport', ['id' => $requisition->NoReq, 'structure' => $requisition->Structure, 'exercice' => $requisition->Exercice, 'branche' => $requisition->Branche]) }}" target="_blank">
                <i class="bi bi-clipboard2-check-fill"></i>
            </a>


                

            @else
                <i class="bi bi-dash-lg"></i><br>
            @endif

           
        </td>
        <td class="text-center">
            @if ($requisition->DateEtabli && session('username') == $requisition->CodeComp . $requisition->CodeClient) <!-- Remplacez avec la colonne de votre base -->
                <a href="{{ route('pve', ['id' => $requisition->NoReq, 'structure' => $requisition->Structure, 'exercice' => $requisition->Exercice, 'branche' => $requisition->Branche]) }}" target="_blank">
                    <i class="bi bi-clipboard2-check-fill"></i>
                </a>
            @else
                <i class="bi bi-dash-lg"></i><br>
            @endif

            
        </td>

    </tr>
@empty
    <tr>
        <td colspan="10" class="text-center">Aucune réquisition trouvée.</td>
    </tr>
@endforelse
