<script>
    $(document).ready(function() {

        let table = $('#wajib-table').DataTable({
            autoWidth: false,
            scrollX: false,
            ordering: false,
            serverSide: true,
            processing: true,
            lengthMenu: [10, 15],

            responsive: {
                details: {
                    type: 'column',
                    target: 0
                }
            },

            ajax: {
                url: "{{ route('admin.pengumuman.loadData') }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },

            columnDefs: [{
                    targets: "_all",
                    className: "text-left"
                },
                {
                    className: 'control',
                    targets: 0,
                    orderable: false,
                    searchable: false
                },
                {
                    responsivePriority: 1,
                    targets: -1
                },
                {
                    responsivePriority: 2,
                    targets: 2
                }
            ],


            columns: [{
                    data: null,
                    defaultContent: ''
                }, // +
                {
                    data: 'DT_RowIndex',
                    searchable: false,
                    orderable: false
                }, // #
                {
                    data: 'tanggal'

                },
                {
                    data: 'waktu'
                },
                {
                    data: 'tempat'
                },
                {
                    data: 'agenda'
                },
                {
                    data: 'aksi',
                    orderable: false,
                    searchable: false
                }
            ]
        });






    });


    function hapus(id) {
        let tanya = confirm('Apakah anda yakin untuk menghapus data?');
        if (tanya == true) {
            $.ajax({
                url: "{{ route('admin.pengumuman.destroy') }}",
                type: "POST",
                dataType: 'json',
                data: {
                    id: id,
                    nip: nip,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    if (data.message == '1') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: "Berhasil  dihapus",
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.href = "{{ route('admin.pengumuman') }}"
                        })
                    } else {
                        alert('Proses Hapus Gagal...!!!');
                    }
                }
            })
        } else {
            return false;
        }
    }
</script>
