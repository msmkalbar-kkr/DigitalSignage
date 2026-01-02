<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex flex-col md:flex-row min-h-screen w-screen">
        <!-- Left Side -->
        <div class="bg-[#28156E] md:w-1/2 w-full flex flex-col justify-between items-center text-center p-6">
            <!-- Konten utama -->
            <div class="flex flex-col items-center justify-center flex-1">
                <img class="md:w-40  mb-4 md:h-auto w-20 h-10/12"
                    src="{{ asset('images/Lambang_Kabupaten_Kubu_Raya2.png') }}" alt="Logo">
                <div class="sm:text-xl text-white font-bold md:mt-4 leading-relaxed">
                    <p>
                        PEMERINTAH KABUPATEN KUBU RAYA</p>
                </div>
            </div>

            <!-- Copyright -->
            <div class="text-[#89868D] text-sm mt-4">
                © 2026. All right reserved
            </div>
        </div>

        <!-- Right Side -->
        <div class="md:w-1/2 w-full flex items-center justify-center p-6">
            <div class="w-full max-w-md">
                <h1 class="text-3xl font-bold mb-4 text-center">Digital Signage</h1>
                <p class="mb-6 text-gray-600 text-center text-sm md:text-base">
                    Mohon masukkan informasi akun anda untuk mulai menggunakan Digital Signage
                </p>

                <form action="{{ route('admin.login') }}" method="POST" class="space-y-4">
                    @csrf
                    <!-- Username -->
                    <div>
                        <label class="block mb-1 font-semibold">Username *</label>
                        <input type="text" name="username"
                            class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('username') border-red-500 @enderror"
                            value="{{ old('username') }}" placeholder="Username">
                        @error('username')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block mb-1 font-semibold">Password *</label>
                        <div class="relative">
                            <input type="password" id="password" name="password"
                                class="w-full border rounded-lg px-4 py-2 pr-12 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') border-red-500 @enderror"
                                placeholder="Password">
                            <!-- Icon show/hide -->
                            <button type="button" onclick="togglePassword()"
                                class="absolute right-3 top-2.5 text-gray-500">
                                <svg id="show_icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg id="hide_icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.956 9.956 0 012.33-3.968M9.88 9.88a3 3 0 104.24 4.24" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3l18 18" />
                                </svg>
                            </button>
                        </div>
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full bg-[#28156E] text-white py-2 rounded-lg font-semibold hover:bg-[#1f1158] transition mb-8">
                        Sign In
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            let input = document.getElementById("password");
            let show = document.getElementById("show_icon");
            let hide = document.getElementById("hide_icon");

            if (input.type === "password") {
                input.type = "text";
                show.classList.add("hidden");
                hide.classList.remove("hidden");
            } else {
                input.type = "password";
                show.classList.remove("hidden");
                hide.classList.add("hidden");
            }
        }
    </script>
</body>

</html>
