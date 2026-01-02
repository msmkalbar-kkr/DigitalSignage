<script>
    $(document).ready(function() {


        $('#tambah').on('click', function() {
            let tgl = document.getElementById('tgl').value;
            let waktu = document.getElementById('waktu').value;
            let tempat = document.getElementById('tempat').value;
            let agenda = document.getElementById('agenda').value;
            let id = document.getElementById('id').value;
            let keterangan = document.getElementById('keterangan').value;


            if (!waktu) {
                alert('waktu Belum di isi!')
                return
            }

            if (!tempat) {
                alert('tempat Belum di isi!')
                return
            }
            if (!agenda) {
                alert('agenda belum di isi!')
                return
            }
            if (!tgl) {
                alert('Tanggal belum di isi!')
                return
            }
            if (!keterangan) {
                alert('Keterangan belum di isi!')
                return
            }

            let data = {
                waktu,
                tempat,
                agenda,
                keterangan,
                tgl,
                id

            }

            $.ajax({
                url: "{{ route('admin.pengumuman.update') }}",
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
                            text: "Pengumuman berhasil diubah",
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.href = "{{ route('admin.pengumuman') }}"
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
