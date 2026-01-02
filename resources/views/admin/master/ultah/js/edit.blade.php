<script>
    $(document).ready(function() {


        $('#tambah').on('click', function() {
            let nama = document.getElementById('nama').value;
            let nip = document.getElementById('nip').value;
            let tgl = document.getElementById('tgl').value;
            let id = document.getElementById('id').value;


            if (!nip) {
                alert('NIP Belum di isi!')
                return
            }

            if (!nama) {
                alert('Nama Belum di isi!')
                return
            }
            if (!tgl) {
                alert('Tanggal belum di isi!')
                return
            }

            let data = {
                nip,

                nama,
                tgl,
                id

            }

            $.ajax({
                url: "{{ route('admin.ultah.update') }}",
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
                            text: "Tanggal ulang tahun berhasil diubah",
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.href = "{{ route('admin.ultah') }}"
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
