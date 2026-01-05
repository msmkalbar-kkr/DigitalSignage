<script>
    $(document).ready(function() {


        document.getElementById('foto').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('preview-foto');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    preview.src = event.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
                preview.classList.add('hidden');
            }
        });

        $('#tambah').on('click', function() {

            let nama = $('#nama').val();
            let nip = $('#nip').val();
            let tgl = $('#tgl').val();
            let jabatan = $('#jabatan').val();
            let foto = $('#foto')[0].files[0]; // FILE HARUS DIAMBIL BEGINI

            // VALIDASI
            if (!nip) return alert('NIP Belum di isi!');
            if (!nama) return alert('Nama Belum di isi!');
            if (!tgl) return alert('Tanggal belum di isi!');
            if (!jabatan) return alert('Jabatan belum di isi!');
            if (!foto) return alert('Foto belum di isi!');

            // DATA LAIN
            let data = {
                nip: nip,
                nama: nama,
                tgl: tgl,
                jabatan: jabatan
            };

            // 🔥 WAJIB PAKE FORM DATA UNTUK KIRIM FILE
            let formData = new FormData();
            formData.append('foto', foto); // file
            formData.append('data', JSON.stringify(data)); // data non-file
            formData.append('_token', "{{ csrf_token() }}"); // csrf

            $.ajax({
                url: "{{ route('admin.ultah.store') }}",
                type: "POST",
                data: formData,
                dataType: 'json',
                contentType: false, // WAJIB
                processData: false, // WAJIB

                beforeSend: function() {
                    $("#overlay").fadeIn(100);
                },

                success: function(response) {

                    if (response.message == '1') {

                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: "Tanggal ulang tahun berhasil ditambahkan",
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.href = "{{ route('admin.ultah') }}";
                        });

                    } else if (response.message == '4') {
                        alert('Data telah digunakan!');
                    } else {
                        alert('Data gagal disimpan!');
                    }
                }
            });

        });

    });
</script>
