<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Pengumuman</title>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#3B82F6",
                        "background-light": "#60A5FA",
                        "background-dark": "#1E3A8A",
                        "card-light": "#FFFFFF",
                        "card-dark": "#1F2937",
                        "text-light": "#111827",
                        "text-dark": "#F3F4F6",
                    },
                    fontFamily: {
                        display: ["Poppins", "sans-serif"],
                    },
                    borderRadius: {
                        DEFAULT: "1rem",
                    },
                },
            },
        };
    </script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark min-h-screen flex items-center justify-center p-10">

    <div class="w-full max-w-[1600px] mx-auto">

        <header class="mb-12">
            <div class="bg-[#0D244D] rounded-2xl shadow-lg py-8 px-6 text-center">
                <h1 class="text-white text-6xl font-extrabold tracking-widest">
                    PENGUMUMAN
                </h1>
            </div>
        </header>

        <main class="grid grid-cols-1 lg:grid-cols-2 gap-12">

            <div class="space-y-10">

                <div class="bg-[#FBBF24] rounded-2xl shadow-lg p-10 text-center">
                    <h2 class="text-[#854D0E] font-bold text-3xl tracking-wider mb-4">HARI, TANGGAL</h2>
                    <p class="text-[#422006] font-semibold text-4xl">
                        Rabu, 22 Oktober 2025
                    </p>
                </div>

                <div class="bg-[#FBBF24] rounded-2xl shadow-lg p-10 text-center">
                    <h2 class="text-[#854D0E] font-bold text-3xl tracking-wider mb-4">WAKTU</h2>
                    <p class="text-[#422006] font-semibold text-4xl">
                        Pukul 09.00 - selesai
                    </p>
                </div>

                <div class="bg-[#FBBF24] rounded-2xl shadow-lg p-10 text-center">
                    <h2 class="text-[#854D0E] font-bold text-3xl tracking-wider mb-4">TEMPAT</h2>
                    <p class="text-[#422006] font-semibold text-4xl">
                        Ruang rapat BPKAD
                    </p>
                </div>

            </div>

            <div class="space-y-10">

                <div class="bg-card-light dark:bg-card-dark rounded-2xl shadow-lg overflow-hidden">
                    <div class="bg-[#FBBF24] p-6">
                        <h2 class="text-[#854D0E] font-bold text-3xl tracking-wider text-center">
                            AGENDA
                        </h2>
                    </div>
                    <div class="p-10">
                        <ol class="list-decimal text-3xl space-y-4 text-text-light dark:text-text-dark">
                            <li>Evaluasi Kinerja Triwulan III</li>
                            <li>Pembahasan Prioritas Program Renja 2026</li>
                            <li>Penetapan Anggaran Awal</li>
                        </ol>
                    </div>
                </div>

                <div class="bg-card-light dark:bg-card-dark rounded-2xl shadow-lg overflow-hidden">
                    <div class="bg-[#FBBF24] p-6">
                        <h2 class="text-[#854D0E] font-bold text-3xl tracking-wider text-center">
                            KETERANGAN
                        </h2>
                    </div>
                    <div class="p-10">
                        <p class="text-3xl text-text-light dark:text-text-dark">
                            Dimohon membawa laptop dan dokumen pendukung.
                        </p>
                    </div>
                </div>

            </div>

        </main>

    </div>

</body>

</html>
