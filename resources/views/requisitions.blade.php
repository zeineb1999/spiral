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
            @if (session('username') == $requisition->CodeComp . $requisition->CodeClient)
                <i class="bi bi-file-earmark-pdf"></i>
            @else
                <i class="bi bi-dash-lg"></i>
            @endif
        </td>
        <td class="text-center">
            @if (session('username') == $requisition->CodeComp . $requisition->CodeClient)
                <i class="bi bi-file-earmark-pdf"></i>
            @else
                <i class="bi bi-dash-lg"></i>
            @endif
        </td>
    </tr>
@empty
    <tr>
        <td colspan="10" class="text-center">Aucune réquisition trouvée.</td>
    </tr>
@endforelse
