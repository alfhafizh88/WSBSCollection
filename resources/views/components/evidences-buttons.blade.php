<div class="d-flex justify-content-left">
    @if ($row->evidence_sales)
        <a href="{{ asset('storage/file_evidence/' . $row->evidence_sales) }}" target="_blank" class="btn border border-0">
            <span class="badge" id="bg-secondary">
                <i class="bi bi-image fs-5 me-1"></i> Sales
            </span>
        </a>
    @endif
    @if ($row->evidence_pembayaran)
        <a href="{{ asset('storage/file_evidence/' . $row->evidence_pembayaran) }}" target="_blank"
            class="btn border border-0">
            <span class="badge bg-blue">
                <i class="bi bi-image fs-5 me-1"></i> Pembayaran
            </span>
        </a>
    @endif
</div>
