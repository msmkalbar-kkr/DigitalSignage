@extends('template.app')
@section('title', 'Dashboard')
@section('content')
<style>
   .btn-tolak {
        color: red !important;
        font-weight: bold;
        cursor: pointer;
    }


</style>
<div class="row mb-4">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{asset('template/src/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Surat Tugas<i class="mdi mdi-file mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5">{{$suratTugas}}</h2>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{asset('template/src/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">SPPD <i class="mdi mdi-file-multiple mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5">{{$sppd}}</h2>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="{{asset('template/src/assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">SPPD Cair <i class="mdi mdi-file-check mdi-24px float-end"></i>
                    </h4>
                    <h2 class="mb-5">{{$sppdCair}}</h2>
                  </div>
                </div>
              </div>
            </div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Status Verifikasi</h5>

            </div>
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="type" id="type">

            <div class="card-body">
                <div class="table-responsive mb-0" data-pattern="priority-columns">
                    <table class="table table-striped" id="sppd">
                        <thead>
                            <tr>
                                <th rowspan="2">No.</th>
                                <th rowspan="2">No. SPPD</th>
                                <th rowspan="2">No. Surat</th>
                                <th rowspan="2">Nama Pegawai</th>
                                <th colspan="3" class="text-center">Status</th>
                            </tr>
                            <tr>
                                <th class="text-center">Verifikator</th>
                                <th class="text-center">PPK</th>
                                <th class="text-center">BP</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
    <div class="modal fade" id="modalHistory">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">History Tolak</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">


                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                <table class="table table-striped" id="detailHistory">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal Tolak</th>
                                            <th>Alasan Tolak</th>

                                        </tr>
                                    </thead>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="d-flex justify-content-center">
        <img src="{{ asset('template/dist/assets/images/logo/LOGO KOPER DINAS OK.png') }}" alt="Logo"height="250px">

    </div> --}}
    {{-- <div class="d-flex justify-content-center">
    <h3>Selamat Datang</h3>
</div>
<div class="d-flex justify-content-center">
    <h4>DI KOPER DINAS</h4>
</div>
<div class="d-flex justify-content-center">
    (Kolaborasi Verifikasi Perjalanan Dinas)
</div> --}}
@endsection
@push('js')
    <style>
        .right-gap {
            margin-right: 10px
        }
    </style>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

            });

            let tabelSPPD = $('#sppd').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('dashboard.load') }}",
                    type: "POST",
                    data: function(d) {
                        d.status = $('#status').val(); // kirim filter status
                    }
                },
                pageLength: 10,
                searching: true,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    },

                    {
                        data: 'nomorSPPD'
                    },
                    {
                        data: 'nomorSurat'
                    },

                    {
                        data: 'namaPegawai'
                    },
                    {
                        data: 'statusVerifikator',
                        className: "text-center"
                    },
                    {
                        data: 'statusPPK',
                        className: "text-center"
                    },
                    {
                        data: 'statusBP',
                        className: "text-center"
                    },

                ]
            });

            // reload data ketika status berubah
            $('#status').on('change', function() {
                tabelSPPD.ajax.reload();
            });
        });

        let detailHistory = $('#detailHistory').DataTable({

            processing: true,
            serverSide: true,
            deferLoading: 0, // jangan load awal
            ajax: {
                url: "{{ route('dashboard.detail') }}",
                type: "POST",
                data: function(d) {
                    d.id = $('#id').val();
                    d.type = $('#type').val();
                }
            },
            pageLength: 10,
            searching: false,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    className: "text-center"
                },
                {
                    data: 'tanggalTolak',
                    name: 'tanggalTolak',
                    className: "text-center",
                    render: function(data) {
                        if (!data) return '-';
                        let tanggal = new Date(data);
                        let bulan = [
                            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                        ];
                        return `${tanggal.getDate()} ${bulan[tanggal.getMonth()]} ${tanggal.getFullYear()}`;
                    }
                },
                {
                    data: 'alasan',
                    name: 'alasan',
                    className: "text-center"
                }
            ]
        });

        // klik tombol X
        $(document).on('click', '.btn-tolak', function() {
            let id = $(this).data('id');
            let type = $(this).data('type');

            // buka modal
            $('#modalHistory').modal('show');

            // set hidden field
            $('#id').val(id);
            $('#type').val(type);

            // reload datatable dengan param baru
            detailHistory.ajax.reload();
        });
        $(document).on('click', '.btn-terimaBerkas', function() {
            let val = $(this).data('val');
            Swal.fire({
                icon: 'info',
                title: 'Berkas diterima',
                html: 'Berkas sudah diterima verifikator <br> pada tanggal '+val,
                confirmButtonText: 'Tutup'
            });
            
        });
    </script>
@endpush
