<script>
    $(document).ready(function() {

        $('#jabatan').on('change', function() {
            let selectedOption = $(this).find('option:selected');
            let kode = selectedOption.data('kode');

            $('#kode').val(kode);
        });


        $('#tambah').on('click', function() {
            let nama = document.getElementById('nama').value;
            let nip = document.getElementById('nip').value;
            let jabatan = document.getElementById('jabatan').value;
            let kode = document.getElementById('kode').value;


            if (!nip) {
                alert('NIP Belum di isi!')
                return
            }

            if (!nama) {
                alert('Nama Belum di isi!')
                return
            }
            if (!jabatan) {
                alert('Jabatan belum di isi!')
                return
            }

            let data = {
                nip,
                jabatan,
                kode,

                nama,


            }

            $.ajax({
                url: "{{ route('admin.struktur.store') }}",
                type: "POST",
                dataType: 'json',
                data: {
                    data: data,
                    "_token": "{{ csrf_token() }}",
                },
                beforeSend: function() {
                    $("#overlay").fadeIn(100);
                },
                success: function(response) {
                    if (response.message == '1') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: "Data Pegawai berhasil ditambahkan",
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.href = "{{ route('admin.struktur') }}"
                        })

                    } else if (response.message == '4') {
                        alert('Data telah digunakan!');

                    } else {
                        alert('Data gagal disimpan!');

                    }
                }
            })
        });
    });
</script>
