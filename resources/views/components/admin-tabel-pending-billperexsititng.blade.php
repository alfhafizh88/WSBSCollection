<div class="card-body align-items-center">
    <div class="d-flex flex-column">
        <span class="fs-2">Pelanggan Pending</span>
        <span class="text-secondary">
            Tabel pelanggan dengan status pending.
        </span>
    </div>


    {{-- Billper --}}
    <div class="d-flex justify-content-between align-items-center mt-4">
        <span class="text-blue">
            Billper
        </span>
        <a href="{{ route('billper-adminbillper.index') }}" class="">
            <i class="bi bi-three-dots fw-bold fs-4 text-dark"></i>
        </a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">SND</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tabelPendingBillper as $billper)
                <tr>
                    <td>
                        {{ $billper->no_inet }}
                    </td>
                    <td>
                        <span class="badge bg-secondary">
                            {{ $billper->status_pembayaran }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>



    {{-- Existing --}}
    <div class="d-flex justify-content-between align-items-center mt-4">
        <span id="text-secondary">
            Existing
        </span>
        <a href="{{ route('existing-adminbillper.index') }}" class="">
            <i class="bi bi-three-dots fw-bold fs-4 text-dark"></i>
        </a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">SND</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tabelPendingExisting as $existing)
                <tr>
                    <td>
                        {{ $existing->no_inet }}
                    </td>
                    <td>
                        <span class="badge bg-secondary">
                            {{ $existing->status_pembayaran }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
