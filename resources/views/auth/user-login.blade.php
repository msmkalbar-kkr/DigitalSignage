<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-SKRD</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/template/src/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/template/src/assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/template/src/assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/template/src/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <style>
        @media (max-width: 600px) {
            html, body {
                width: 100vw !important;
                min-width: 100vw !important;
                max-width: 100vw !important;
                margin: 0 !important;
                padding: 0 !important;
            }
            .container-scroller,
            .container-fluid.page-body-wrapper.full-page-wrapper,
            .content-wrapper {
                padding: 0 !important;
                margin: 0 !important;
                width: 100vw !important;
                min-width: 100vw !important;
                max-width: 100vw !important;
            }
            .login-box-responsive {
                max-width: 100vw !important;
                width: 100vw !important;
                margin: 0 !important;
                padding: 20px 16px !important;
            }
            .text-center.mb-4 {
                margin-bottom: 25px !important;
            }
            .text-center.mb-4 img {
                width: 70px !important;
                margin-bottom: 15px !important;
            }
            .text-center.mb-4 h1 {
                font-size: 1.8rem !important;
                margin-bottom: 5px !important;
            }
            .text-center.mb-4 h5 {
                font-size: 0.9rem !important;
                margin-bottom: 20px !important;
                font-weight: 400 !important;
                color: #bdbdbd !important;
            }
            .form-group.text-left.mb-3 {
                margin-bottom: 15px !important;
            }
            .form-group.text-left.mb-3 label {
                font-size: 0.85rem !important;
                margin-bottom: 8px !important;
            }
            .form-control {
                font-size: 0.95rem !important;
                padding: 10px 12px !important;
                border-radius: 4px !important;
            }
            .auth-form-btn {
                font-size: 1rem !important;
                padding: 10px 16px !important;
                margin-top: 10px !important;
                border-radius: 4px !important;
            }
            .text-center.mt-5 {
                margin-top: 40px !important;
            }
            .text-center.mt-5 p {
                font-size: 0.75rem !important;
                line-height: 1.4 !important;
                font-weight: bold !important;
                text-transform: uppercase !important;
                margin-bottom: 0 !important;
            }
            .text-center.mt-4 {
                margin-top: 15px !important;
            }
            .text-center.mt-4 small {
                font-size: 0.75rem !important;
                color: #999 !important;
            }
            form {
                margin-bottom: 30px !important;
            }
        }
        @media (max-width: 400px) {
            .login-box-responsive {
                padding: 16px 12px !important;
            }
            .text-center.mb-4 h1 {
                font-size: 1.5rem !important;
            }
            .text-center.mb-4 h5 {
                font-size: 0.8rem !important;
            }
        }
    </style>
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/template/src/assets/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('/template/src/assets/images/favicon.png') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center justify-content-center auth px-0" style="background-color: #28156E; min-height: 100vh;">
                <div class="w-100 login-box-responsive" style="max-width: 450px; margin: auto;">
                    <div class="text-center mb-4">
                        <img src="https://kuburaya.go.id/assets/img/preloader/logo_2.webp" alt="logo" width="90px" style="margin-bottom: 15px;">
                        <h1 style="color: #fff; font-weight: bold; margin-bottom: 5px; font-size: 2rem;">E-SKRD</h1>
                        <h5 style="color: #bdbdbd; font-weight: 400; margin-bottom: 20px; font-size: 0.95rem;">Elektronik Surat Ketetapan Retribusi Daerah</h5>
                    </div>
                    @if (Session::has('error'))
                        <div class="alert alert-danger mt-4">
                            {!! Session::get('error') !!}
                        </div>
                    @endif
                    <form class="pt-5" action="{{ route('user.login') }}" method="POST" style="margin-bottom: 30px;">
                        @csrf
                        <div class="form-group text-left mb-3">
                            <label for="nik" class="form-label" style="color: #fff; font-size: 0.9rem; display: block; margin-bottom: 8px;">NIK</label>
                            <input type="text" class="form-control bg-white" id="nik"
                                placeholder="Enter your id number" required autofocus name="nik" style="font-size: 0.95rem; padding: 10px 12px; border: none; border-radius: 4px;">
                            @error('nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-3 d-grid gap-2">
                            <button type="submit" class="btn btn-lg fw-medium auth-form-btn mt-3 submitBtn" style="background: #FFD233; color: #28156E; font-weight: bold; font-size: 1rem; padding: 10px 16px; border: none; border-radius: 4px;">Submit</button>
                        </div>
                    </form>
                    <div class="footer" style="background-color: #28156E;">
                        <div class="text-center mt-5">
                            <p style="color: #fff; font-size: 1.1rem; font-weight: bold; text-transform: uppercase; margin-bottom: 0;">DINAS PEKERJAAN UMUM DAN PENATAAN RUANG,<br>PERUMAHAN RAKYAT DAN KAWASAN PERMUKIMAN<br>PEMERINTAH KABUPATEN KUBU RAYA</p>
                        </div>
                        <div class="text-center mt-4">
                            <small style="color: #bdbdbd;">© 2025. All right reserved</small>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('/template/src/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('/template/src/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}">
    </script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('/template/src/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('/template/src/assets/js/template.js') }}"></script>
    <script src="{{ asset('/template/src/assets/js/settings.js') }}"></script>
    <script src="{{ asset('/template/src/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('/template/src/assets/js/todolist.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            if (localStorage.getItem('nik')) {
                window.location.href = '{{ route('user.dashboard') }}';
            }

            $('.submitBtn').on('click', function (e) {
                e.preventDefault();

                let nik = $('#nik').val();

                if (!nik) {
                    Swal.fire({
                        title: "Validasi",
                        text: "NIK wajib diisi",
                        icon: "warning",
                        confirmButtonText: "OK"
                    });
                    return;
                }

                $.ajax({
                    url: '{{ route("user.login") }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        nik: nik,
                        _token: '{{ csrf_token() }}'
                    },

                    success: function (response) {

                        // SIMPAN NIK KE LOCAL STORAGE
                        localStorage.setItem('nik', response.nik);

                        Swal.fire({
                            title: "SUKSES",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then(() => {
                            window.location.href = '{{ route('user.dashboard') }}';
                        });
                    },

                    error: function (xhr) {
                        let res = xhr.responseJSON;

                        Swal.fire({
                            title: "Login Gagal",
                            text: res && res.message ? res.message : "NIK tidak ditemukan",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                });
            });
        });
</script>
    <!-- endinject -->
</body>

</html>
