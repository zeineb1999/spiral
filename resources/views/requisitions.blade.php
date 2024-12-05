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
                
                <a href="javascript:void(0)" onclick="openPopup('{{url('pve', ['id' => $requisition->NoReq]) }}')">
                    <i class="bi bi-clipboard2-check-fill"></i>
                </a><br>

                <script>
                    function openPopup(url) {
                        window.open(url, '_blank', 'width=800,height=600,scrollbars=yes,resizable=yes');
                    }
                </script>

            @else
                <i class="bi bi-dash-lg"></i><br>
            @endif

            @if (file_exists(public_path("files/{$requisition->NoReq}/pdf/rapport_expertise.pdf")))
                <a href="{{ asset("files/{$requisition->NoReq}/pdf/rapport_expertise.pdf") }}" target="_blank">
                    <i class="bi bi-file-earmark-pdf"></i>
                </a>
            @else
                <i class="bi bi-dash-lg"></i>
            @endif
        </td>
        <td class="text-center">
            @if ($requisition->DateEtabli && session('username') == $requisition->CodeComp . $requisition->CodeClient) <!-- Remplacez avec la colonne de votre base -->
                <a href="javascript:void(0)" onclick="popup('facture_g_imp.php?q={{ $requisition->NoReq }}')">
                    <i class="bi bi-clipboard2-check-fill"></i>
                </a><br>
            @else
                <i class="bi bi-dash-lg"></i><br>
            @endif

            @if (file_exists(public_path("files/{$requisition->NoReq}/pdf/facture.pdf")))
                <a href="{{ asset("files/{$requisition->NoReq}/pdf/facture.pdf") }}" target="_blank">
                    <i class="bi bi-file-earmark-pdf"></i>
                </a>
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
