@extends('layouts.app-super-admin')

@section('content')
    <div class="px-4 py-4 card shadow shadow-sm border border-0 rounded-4">
        <div class="d-flex flex-column flex-md-row align-items-center justify-content-between mb-3">
            <span class="fw-bold fs-2 mb-3 mb-md-0 d-block d-md-none">
                Edit Data Billper
            </span>
            <span class="d-none d-md-block">
                {{-- Diver --}}
            </span>
            <a href="{{ route('view-pdf-report-billpersuperadmin', ['id' => $billper->id]) }}"
                class="btn btn-green fw-bold d-none">
                <i class="bi bi-file-earmark-arrow-down-fill"></i> View
            </a>
            <a href="{{ route('download-pdf-report-billpersuperadmin', ['id' => $billper->id]) }}"
                class="btn btn-yellow fw-bold">
                <i class="bi bi-file-earmark-arrow-down-fill"></i> Download
            </a>
        </div>

        <div class="px-0 px-md-5">
            <form action="{{ route('update-billpers', ['id' => $billper->id]) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card px-3 py-4 shadow ">
                            <div class="card-body">
                                <div class="contain-header mb-3">
                                    <h5 class="card-title">{{ $billper->nama }}</h5>
                                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ $billper->no_inet }}</h6>
                                </div>
                                <hr class="border border-dark border-3 opacity-75 my-4">
                                <div class="contain-form">
                                    <div class="mb-3 d-none">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama"
                                            value="{{ $billper->nama }}">
                                    </div>
                                    <div class="mb-3 d-none">
                                        <label for="no_inet" class="form-label">No. Inet</label>
                                        <input type="text" class="form-control" id="no_inet" name="no_inet"
                                            value="{{ $billper->no_inet }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="status_pembayaran" class="form-label fw-bold">Status Pembayaran</label>
                                        <select class="form-select" id="status_pembayaran" name="status_pembayaran">
                                            <option value="Paid"
                                                {{ $billper->status_pembayaran == 'Paid' ? 'selected' : '' }}>
                                                Paid
                                            </option>
                                            <option value="Pending"
                                                {{ $billper->status_pembayaran == 'Pending' ? 'selected' : '' }}>
                                                Pending
                                            </option>
                                            <option value="Unpaid"
                                                {{ $billper->status_pembayaran == 'Unpaid' ? 'selected' : '' }}>
                                                Unpaid</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_tlf" class="form-label fw-bold">Nomor Telfon</label>
                                        <input type="text" class="form-control" id="no_tlf" name="no_tlf"
                                            value="{{ $billper->no_tlf }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label fw-bold">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="{{ $billper->email }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label fw-bold">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat"
                                            value="{{ $billper->alamat }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="saldo" class="form-label fw-bold">Saldo</label>
                                        <input type="text" class="form-control bg-secondary text-dark bg-opacity-25"
                                            readonly id="saldo" name="saldo" value="{{ $billper->saldo }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="sto" class="form-label fw-bold">STO</label>
                                        <input type="text" class="form-control bg-secondary text-dark bg-opacity-25"
                                            readonly id="sto" name="sto" value="{{ $billper->sto }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="umur_customer" class="form-label fw-bold">Umur Customer</label>
                                        <input type="text" class="form-control bg-secondary text-dark bg-opacity-25"
                                            readonly id="umur_customer" name="umur_customer"
                                            value="{{ $billper->umur_customer }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="produk" class="form-label fw-bold">Produk</label>
                                        <input type="text" class="form-control bg-secondary text-dark bg-opacity-25"
                                            readonly id="produk" name="produk" value="{{ $billper->produk }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nper" class="form-label fw-bold">NPER</label>
                                        <input type="text" class="form-control bg-secondary text-dark bg-opacity-25"
                                            readonly id="nper" name="nper" value="{{ $billper->nper }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card px-3 py-4 shadow mt-3 mt-md-0">
                            <div class="card-body">
                                <div class="contain-header mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="card-title">
                                                {{ $billper->user ? $billper->user->name : 'Tidak ada' }}</h5>
                                            <h6 class="card-subtitle mb-2 text-body-secondary">
                                                {{ $billper->user ? $billper->user->nik : 'Tidak ada' }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>

                                <hr class="border border-dark border-3 opacity-75 my-4">
                                <div class="contain-form">
                                    <div class="mb-3">
                                        <label for="email_sales" class="form-label fw-bold">Email</label>
                                        <input type="text" class="form-control bg-secondary text-dark bg-opacity-25"
                                            readonly id="email_sales" name="email_sales"
                                            value="{{ $billper->user ? $billper->user->email : 'Tidak ada' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label fw-bold">No Telfon</label>
                                        <input type="text" class="form-control bg-secondary text-dark bg-opacity-25"
                                            readonly id="no_hp" name="no_hp"
                                            value="{{ $billper->user ? $billper->user->no_hp : 'Tidak ada' }}">
                                    </div>

                                    {{-- Report --}}
                                    <div class="mb-3">
                                        <label for="waktu_visit" class="form-label fw-bold">Waktu Visit</label>
                                        <input type="datetime-local" class="form-control" id="waktu_visit"
                                            name="waktu_visit"
                                            value="{{ $sales_report->waktu_visit ? \Carbon\Carbon::parse($sales_report->waktu_visit)->format('Y-m-d\TH:i:s') : '' }}"
                                            required readonly>
                                    </div>


                                    <div class="mb-3">
                                        <label for="voc_kendalas_id" class="form-label fw-bold">Voc Kendala</label>
                                        <select class="form-select" id="voc_kendalas_id" name="voc_kendalas_id" required
                                            disabled>
                                            <option value="" disabled selected>Pilih Kendala</option>
                                            @foreach ($voc_kendala as $kendala)
                                                <option value="{{ $kendala->id }}"
                                                    {{ $sales_report->voc_kendalas_id == $kendala->id ? 'selected' : '' }}>
                                                    {{ $kendala->voc_kendala }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="follow_up" class="form-label fw-bold">Follow Up</label>
                                        <input type="text" class="form-control" id="follow_up" name="follow_up"
                                            value="{{ $sales_report->follow_up }}" required readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="evidence_sales" class="form-label fw-bold">Evidence Sales</label>
                                        <div class="mt-2">
                                            @if ($sales_report && $sales_report->evidence_sales)
                                                <a href="{{ asset('storage/file_evidence/' . $sales_report->evidence_sales) }}"
                                                    target="_blank">
                                                    <img id="preview_sales"
                                                        src="{{ asset('storage/file_evidence/' . $sales_report->evidence_sales) }}"
                                                        alt="Preview Sales" class="img-preview">
                                                </a>
                                            @else
                                                <span class="badge text-bg-danger">Report belum ada</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="evidence_pembayaran" class="form-label fw-bold">Evidence
                                            Pembayaran</label>
                                        <div class="mt-2">
                                            @if ($sales_report && $sales_report->evidence_pembayaran)
                                                <a href="{{ asset('storage/file_evidence/' . $sales_report->evidence_pembayaran) }}"
                                                    target="_blank">
                                                    <img id="preview_pembayaran"
                                                        src="{{ asset('storage/file_evidence/' . $sales_report->evidence_pembayaran) }}"
                                                        alt="Preview Pembayaran" class="img-preview">
                                                </a>
                                            @else
                                                <span class="badge text-bg-danger">Report belum ada</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <a href="{{ route('billper.index') }}" class="btn btn-grey me-2 px-5">Batal</a>
                    <button type="submit" class="btn btn-secondary px-5">Edit</button>
                </div>

            </form>
        </div>

    </div>
@endsection
@push('scripts')
    <script type="module">
        //
    </script>
@endpush
