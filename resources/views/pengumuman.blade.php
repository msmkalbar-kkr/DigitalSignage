<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Pengumuman</title>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&amp;display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
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

<body
    class="bg-background-light dark:bg-background-dark font-display flex items-center justify-center min-h-screen p-4 sm:p-6 lg:p-8">
    <div class="w-full max-w-5xl mx-auto">
        <header class="mb-8">
            <div class="bg-[#0D244D] rounded-lg shadow-lg py-4 px-6 text-center">
                <h1 class="text-white text-2xl sm:text-3xl font-bold tracking-widest">PENGUMUMAN</h1>
            </div>
        </header>
        <main class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8">
            <div class="space-y-6 sm:space-y-8">
                <div class="bg-[#FBBF24] rounded-lg shadow-md p-6 text-center">
                    <h2 class="text-[#854D0E] font-bold text-sm tracking-wider mb-1">HARI, TANGGAL</h2>
                    <p class="text-[#422006] font-semibold text-lg">Rabu, 22 Oktober 2025</p>
                </div>
                <div class="bg-[#FBBF24] rounded-lg shadow-md p-6 text-center">
                    <h2 class="text-[#854D0E] font-bold text-sm tracking-wider mb-1">WAKTU</h2>
                    <p class="text-[#422006] font-semibold text-lg">Pukul 09.00 - selesai</p>
                </div>
                <div class="bg-[#FBBF24] rounded-lg shadow-md p-6 text-center">
                    <h2 class="text-[#854D0E] font-bold text-sm tracking-wider mb-1">TEMPAT</h2>
                    <p class="text-[#422006] font-semibold text-lg">Ruang rapat BPKAD</p>
                </div>
            </div>
            <div class="space-y-6 sm:space-y-8">
                <div class="bg-card-light dark:bg-card-dark rounded-lg shadow-md">
                    <div class="bg-[#FBBF24] rounded-t-lg p-3">
                        <h2 class="text-[#854D0E] font-bold text-sm tracking-wider text-center">AGENDA</h2>
                    </div>
                    <div class="p-6">
                        <ol class="list-decimal list-inside space-y-2 text-text-light dark:text-text-dark">
                            <li>Evaluasi Kinerja Triwulan III</li>
                            <li>Pembahasan Prioritas Program Renja 2026</li>
                            <li>Penetapan Anggaran Awal</li>
                        </ol>
                    </div>
                </div>
                <div class="bg-card-light dark:bg-card-dark rounded-lg shadow-md">
                    <div class="bg-[#FBBF24] rounded-t-lg p-3">
                        <h2 class="text-[#854D0E] font-bold text-sm tracking-wider text-center">KETERANGAN</h2>
                    </div>
                    <div class="p-6">
                        <p class="text-text-light dark:text-text-dark">Dimohon membawa laptop dan dokumen pendukung</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

</html>
