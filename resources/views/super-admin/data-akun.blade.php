@extends('layouts.app-super-admin')

@section('content')
    <div class="px-4 py-4 card shadow shadow-sm border border-0 rounded-4">
        <div class="mb-4 d-block d-md-none">
            <span class="fw-bold fs-2">
                Data Akun
            </span>
        </div>
        <table class="table table-hover table-bordered datatable shadow" id="tabelakun" style="width: 100%">
            <thead class="fw-bold">
                <tr>
                    <th id="th" class="align-middle w-25">Nama</th>
                    <th id="th" class="align-middle text-center">Nomor Karyawan</th>
                    <th id="th" class="align-middle text-center">Nomor Telfon</th>
                    <th id="th" class="align-middle text-center w-25">Jenis Akun</th>
                    <th id="th" class="align-middle text-center w-25">Status</th>
                    <th id="th" class="align-middle text-center w-25">Email</th>
                    <th id="th" class="align-middle text-center">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr data-id="{{ $user->id }}">
                        <th class="align-middle">
                            <span class="fw-normal">{{ $user->name }}</span>
                        </th>
                        <th class="align-middle text-center">
                            <span class="fw-normal">{{ $user->nik }}</span>
                        </th>
                        <th class="align-middle text-center">
                            <span class="fw-normal">{{ $user->no_hp }}</span>
                        </th>
                        <th class="align-middle text-center">
                            @if ($user->level == 'Sales')
                                <span class="badge text-bg-secondary">User</span>
                            @elseif($user->level == 'Admin Billper')
                                <span class="badge text-bg-success">Admin Billper</span>
                            @elseif($user->level == 'Admin Pranpc')
                                <span class="badge text-bg-primary">Admin Pranpc</span>
                            @else
                                <span class="fw-normal">{{ $user->level }}</span>
                            @endif
                        </th>

                        <th>
                            <select class="form-select form-select-sm user-status border border-0"
                                aria-label="Small select example">
                                <option value="Aktif" class="text-success fw-bold"
                                    {{ $user->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Belum Aktif" class="text-danger fw-bold"
                                    {{ $user->status == 'Belum Aktif' ? 'selected' : '' }}>Belum Aktif</option>
                            </select>
                        </th>
                        <th class="align-middle text-center">
                            @if ($user->email_verified_at)
                                <span class="badge text-bg-success">Verified</span>
                            @else
                                <span class="badge text-bg-danger">Not Verified</span>
                            @endif

                        </th>
                        <th class="align-middle text-center">
                            <form action="{{ route('destroy-akun', ['id' => $user->id]) }}" method="POST"
                                class="delete-form">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn border border-0 btn-delete text-red">
                                    <div class="d-flex align-items-center text-red">
                                        <i class="bi bi-trash-fill fs-5 "></i>
                                </button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            new DataTable('#tabelakun', {
                responsive: true,
                pageLength: 50,
                "bLengthChange": false,
                language: {
                    search: "Cari",
                    lengthMenu: "Tampilkan _MENU_ data",
                    zeroRecords: "Tidak ada data ditemukan",
                    info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
                    infoEmpty: "Menampilkan 0 hingga 0 dari 0 data",
                    infoFiltered: "(disaring dari _MAX_ total data)",
                    paginate: {
                        first: "Pertama",
                        last: "Terakhir",
                        next: "Selanjutnya",
                        previous: "Sebelumnya"
                    },
                },
            });
            $('.form-select').change(function() {
                var status = $(this).val();
                var userId = $(this).closest('tr').data('id');

                $.ajax({
                    url: '{{ route('updatestatus') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: userId,
                        status: status
                    },
                    success: function(response) {
                        Swal.fire({
                            title: 'Berhasil!',
                            text: 'Status Memperbaharui',
                            icon: 'success',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#831a16',
                            cancelButtonColor: '#727375'
                        });
                    },
                    error: function(response) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Failed to update status',
                            icon: 'error',
                            confirmButtonText: 'OK',
                            cancelButtonColor: '#727375',
                            cancelButtonColor: '#727375'
                        });
                    }
                });

            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            var selects = document.querySelectorAll('.user-status');
            selects.forEach(function(select) {
                setSelectColor(select);
                select.addEventListener('change', function() {
                    setSelectColor(select);
                });
            });

            function setSelectColor(select) {
                select.classList.add('fw-bold');
                if (select.value === 'Aktif') {
                    select.classList.add('text-success');
                    select.classList.remove('text-danger');
                } else if (select.value === 'Belum Aktif') {
                    select.classList.add('text-danger');
                    select.classList.remove('text-success');
                }
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-delete').forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();

                    const form = this.closest('form');

                    Swal.fire({
                        title: "Apakah Anda Yakin Menghapus Data?",
                        text: "Anda tidak akan dapat mengembalikannya!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Ya, hapus!",
                        cancelButtonText: "Batal",
                        reverseButtons: true,
                        confirmButtonColor: '#831a16',
                        cancelButtonColor: '#727375'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endpush
