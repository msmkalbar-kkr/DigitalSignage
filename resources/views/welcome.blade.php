<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Dashboard Keuangan Daerah</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#3B82F6", // Blue
                        "background-light": "#F7FAFC",
                        "background-dark": "#1A202C",
                    },
                    fontFamily: {
                        display: ["Poppins", "sans-serif"],
                    },
                    borderRadius: {
                        DEFAULT: "0.75rem", // 12px
                    },
                },
            },
        };
    </script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .scrollbar-thin::-webkit-scrollbar {
            width: 6px;
        }

        .scrollbar-thin::-webkit-scrollbar-track {
            background: transparent;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 3px;
        }

        .dark .scrollbar-thin::-webkit-scrollbar-thumb {
            background: #4a5568;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-gray-700 dark:text-gray-300">
    <div class="p-4 sm:p-6 lg:p-8">
        <header class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
            <div class="flex items-center space-x-4">
                <img alt="Kubu Raya Regency Government logo" class="h-12 w-12 sm:h-16 sm:w-16"
                    src="{{ asset('logo.png') }}" />
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold text-gray-800 dark:text-white">Dashboard Keuangan Daerah
                    </h1>
                    <p class="text-sm sm:text-base text-gray-600 dark:text-gray-400">Pemerintah Daerah Kabupaten Kubu
                        Raya</p>
                </div>
            </div>
            <div class="mt-4 sm:mt-0">
                <div
                    class="bg-white dark:bg-gray-800 p-2 px-4 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                    <span class="text-sm font-semibold text-gray-800 dark:text-white">Tahun anggaran 2025</span>
                </div>
            </div>
        </header>
        <main>
            <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div
                    class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                    <p class="text-2xl font-semibold text-gray-900 dark:text-white">Rp 1.874.864.452.470,00</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Realisasi Rp 966.001.121.892,15</p>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 mb-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: 85%"></div>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <div class="flex items-center space-x-2">
                            <span class="w-3 h-3 bg-blue-500 rounded-full"></span>
                            <span class="text-gray-600 dark:text-gray-300">Pendapatan daerah</span>
                        </div>
                        <span
                            class="bg-blue-100 dark:bg-blue-900/50 text-blue-800 dark:text-blue-200 text-xs font-semibold px-2.5 py-0.5 rounded-full">85%</span>
                    </div>
                </div>
                <div
                    class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                    <p class="text-2xl font-semibold text-gray-900 dark:text-white">Rp 2.048.151.597.242,00</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Realisasi Rp 876.813.653.635,81</p>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 mb-2">
                        <div class="bg-pink-500 h-2 rounded-full" style="width: 68%"></div>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <div class="flex items-center space-x-2">
                            <span class="w-3 h-3 bg-pink-500 rounded-full"></span>
                            <span class="text-gray-600 dark:text-gray-300">Belanja daerah</span>
                        </div>
                        <span
                            class="bg-pink-100 dark:bg-pink-900/50 text-pink-800 dark:text-pink-200 text-xs font-semibold px-2.5 py-0.5 rounded-full">68%</span>
                    </div>
                </div>
                <div
                    class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                    <p class="text-2xl font-semibold text-gray-900 dark:text-white">Rp 183.287.144.772,00</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Realisasi Rp 803.923.982,00</p>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 mb-2">
                        <div class="bg-indigo-900 h-2 rounded-full" style="width: 90%"></div>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <div class="flex items-center space-x-2">
                            <span class="w-3 h-3 bg-indigo-900 rounded-full"></span>
                            <span class="text-gray-600 dark:text-gray-300">Penerimaan pembiayaan</span>
                        </div>
                        <span
                            class="bg-indigo-100 dark:bg-indigo-900/50 text-indigo-800 dark:text-indigo-200 text-xs font-semibold px-2.5 py-0.5 rounded-full">90%</span>
                    </div>
                </div>
                <div
                    class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                    <p class="text-2xl font-semibold text-gray-900 dark:text-white">Rp 183.287.144.772,00</p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">Realisasi Rp 803.923.982,00</p>
                    <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2 mb-2">
                        <div class="bg-orange-500 h-2 rounded-full" style="width: 80%"></div>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <div class="flex items-center space-x-2">
                            <span class="w-3 h-3 bg-orange-500 rounded-full"></span>
                            <span class="text-gray-600 dark:text-gray-300">Pengeluaran pembiayaan</span>
                        </div>
                        <span
                            class="bg-orange-100 dark:bg-orange-900/50 text-orange-800 dark:text-orange-200 text-xs font-semibold px-2.5 py-0.5 rounded-full">80%</span>
                    </div>
                </div>
            </section>
            <section class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div
                    class="lg:col-span-2 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Pendapatan Daerah</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs text-gray-500 dark:text-gray-400 uppercase">
                                <tr>
                                    <th class="py-3 pr-6" scope="col">Nama Akun</th>
                                    <th class="py-3 px-6 text-right" scope="col">Pagu Anggaran</th>
                                    <th class="py-3 px-6 text-right" scope="col">Realisasi</th>
                                    <th class="py-3 pl-6 text-right" scope="col">Persentase</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="py-4 pr-6 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <div class="flex items-center"><span
                                                class="w-2.5 h-2.5 bg-blue-600 rounded-full mr-3"></span>Pajak Daerah
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-right">Rp 109.227.495.420,00</td>
                                    <td class="py-4 px-6 text-right">Rp 89.227.495.420,00</td>
                                    <td class="py-4 pl-6 text-right font-medium">60,98%</td>
                                </tr>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="py-4 pr-6 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <div class="flex items-center"><span
                                                class="w-2.5 h-2.5 bg-blue-600 rounded-full mr-3"></span>Retribusi
                                            Daerah</div>
                                    </td>
                                    <td class="py-4 px-6 text-right">Rp 109.227.495.420,00</td>
                                    <td class="py-4 px-6 text-right">Rp 89.227.495.420,00</td>
                                    <td class="py-4 pl-6 text-right font-medium">45,76%</td>
                                </tr>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="py-4 pr-6 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <div class="flex items-center"><span
                                                class="w-2.5 h-2.5 bg-blue-600 rounded-full mr-3"></span>Hasil
                                            Pengelolaan Kekayaan Daerah yang Dipisahkan</div>
                                    </td>
                                    <td class="py-4 px-6 text-right">Rp 109.227.495.420,00</td>
                                    <td class="py-4 px-6 text-right">Rp 89.227.495.420,00</td>
                                    <td class="py-4 pl-6 text-right font-medium">35,67%</td>
                                </tr>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="py-4 pr-6 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <div class="flex items-center"><span
                                                class="w-2.5 h-2.5 bg-blue-600 rounded-full mr-3"></span>Lain-lain PAD
                                            yang Sah</div>
                                    </td>
                                    <td class="py-4 px-6 text-right">Rp 109.227.495.420,00</td>
                                    <td class="py-4 px-6 text-right">Rp 89.227.495.420,00</td>
                                    <td class="py-4 pl-6 text-right font-medium">78,00%</td>
                                </tr>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="py-4 pr-6 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <div class="flex items-center"><span
                                                class="w-2.5 h-2.5 bg-blue-600 rounded-full mr-3"></span>Pendapatan
                                            Transfer Pemerintah Pusat</div>
                                    </td>
                                    <td class="py-4 px-6 text-right">Rp 109.227.495.420,00</td>
                                    <td class="py-4 px-6 text-right">Rp 89.227.495.420,00</td>
                                    <td class="py-4 pl-6 text-right font-medium">54,47%</td>
                                </tr>
                                <tr>
                                    <td class="py-4 pr-6 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <div class="flex items-center"><span
                                                class="w-2.5 h-2.5 bg-blue-600 rounded-full mr-3"></span>Pendapatan
                                            Transfer Antar Daerah</div>
                                    </td>
                                    <td class="py-4 px-6 text-right">Rp 109.227.495.420,00</td>
                                    <td class="py-4 px-6 text-right">Rp 89.227.495.420,00</td>
                                    <td class="py-4 pl-6 text-right font-medium">79,06%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div
                    class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 flex items-center justify-center">
                    <img alt="Pie chart showing distribution of Pendapatan Daerah" class="max-w-xs w-full"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCA1c8S4Q0_ymIL4JXObrMZIkgtTl-6ckMnrfs4d7gn_EHFG5F5kE3CVLBEtCEUb_hBRuKO25580e5LpELJGJN32x6zvHrylJT6nKpqDIceWVeLwe45-ASBCe1ma19lWl3jUD7NJeoQIli4zZ0AW5c505a8KDxtt9a2uvcZZKAhBRs2Gp3IDgUMS0bituP-BcQa3SVDbe2ChrMx71ZcATndrtAHYSQzconvfbYhEUBgyXIX4WM3w1iaDka4-PJotkAnS_4JqFK-BSE_" />
                </div>
            </section>
            <section class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-8">
                <div
                    class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 flex items-center justify-center">
                    <img alt="Pie chart showing distribution of Belanja Daerah" class="max-w-xs w-full"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDu66b930wnqLiw3gOdsn3zewlJQ7W3Gqp0nUsE4WN9971_Gr58Rdrv3P_9UyY3KFe4CuX_DiooppM8lQuNGUXRKlquwcsIbweESJDZy6JKUMFrbtwhLP2bWZWQvdbbDe5kqtmylZGwa7C9GqjhJjscWPoglFcSrO-7-Gpo_g4HdvaU-cLYCl0vYC7wo50b_ZYmABFZZ2iXq5w34E7dSfxoLxPVSnSHe7jayd83Tw8I0Nv03BylEstebXEWsHVuAjABl4HJkdswKLZ8" />
                </div>
                <div
                    class="lg:col-span-2 bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700">
                    <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-white">Belanja Daerah</h2>
                    <div class="overflow-y-auto max-h-[29rem] scrollbar-thin">
                        <table class="w-full text-sm text-left">
                            <thead
                                class="text-xs text-gray-500 dark:text-gray-400 uppercase sticky top-0 bg-white dark:bg-gray-800">
                                <tr>
                                    <th class="py-3 pr-6" scope="col">Nama Akun</th>
                                    <th class="py-3 px-6 text-right" scope="col">Pagu Anggaran</th>
                                    <th class="py-3 px-6 text-right" scope="col">Realisasi</th>
                                    <th class="py-3 pl-6 text-right" scope="col">Persentase</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="py-4 pr-6 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <div class="flex items-center"><span
                                                class="w-2.5 h-2.5 bg-red-800 rounded-full mr-3"></span>Belanja Pegawai
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-right">Rp 109.227.495.420,00</td>
                                    <td class="py-4 px-6 text-right">Rp 89.227.495.420,00</td>
                                    <td class="py-4 pl-6 text-right font-medium">80,98%</td>
                                </tr>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="py-4 pr-6 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <div class="flex items-center"><span
                                                class="w-2.5 h-2.5 bg-red-600 rounded-full mr-3"></span>Belanja Barang
                                            dan Jasa</div>
                                    </td>
                                    <td class="py-4 px-6 text-right">Rp 109.227.495.420,00</td>
                                    <td class="py-4 px-6 text-right">Rp 89.227.495.420,00</td>
                                    <td class="py-4 pl-6 text-right font-medium">45,66%</td>
                                </tr>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="py-4 pr-6 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <div class="flex items-center"><span
                                                class="w-2.5 h-2.5 bg-red-500 rounded-full mr-3"></span>Belanja Hibah
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-right">Rp 109.227.495.420,00</td>
                                    <td class="py-4 px-6 text-right">Rp 89.227.495.420,00</td>
                                    <td class="py-4 pl-6 text-right font-medium">34,89%</td>
                                </tr>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="py-4 pr-6 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <div class="flex items-center"><span
                                                class="w-2.5 h-2.5 bg-red-400 rounded-full mr-3"></span>Belanja Modal
                                            Peralatan dan Mesin</div>
                                    </td>
                                    <td class="py-4 px-6 text-right">Rp 109.227.495.420,00</td>
                                    <td class="py-4 px-6 text-right">Rp 89.227.495.420,00</td>
                                    <td class="py-4 pl-6 text-right font-medium">49,88%</td>
                                </tr>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="py-4 pr-6 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <div class="flex items-center"><span
                                                class="w-2.5 h-2.5 bg-red-300 rounded-full mr-3"></span>Belanja Modal
                                            Gedung dan Bangunan</div>
                                    </td>
                                    <td class="py-4 px-6 text-right">Rp 109.227.495.420,00</td>
                                    <td class="py-4 px-6 text-right">Rp 89.227.495.420,00</td>
                                    <td class="py-4 pl-6 text-right font-medium">27,98%</td>
                                </tr>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="py-4 pr-6 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <div class="flex items-center"><span
                                                class="w-2.5 h-2.5 bg-red-600 rounded-full mr-3"></span>Belanja Modal
                                            Jalan, Jaringan, dan Irigasi</div>
                                    </td>
                                    <td class="py-4 px-6 text-right">Rp 109.227.495.420,00</td>
                                    <td class="py-4 px-6 text-right">Rp 89.227.495.420,00</td>
                                    <td class="py-4 pl-6 text-right font-medium">89,88%</td>
                                </tr>
                                <tr>
                                    <td class="py-4 pr-6 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                        <div class="flex items-center"><span
                                                class="w-2.5 h-2.5 bg-red-800 rounded-full mr-3"></span>Belanja Bagi
                                            Hasil</div>
                                    </td>
                                    <td class="py-4 px-6 text-right">Rp 109.227.495.420,00</td>
                                    <td class="py-4 px-6 text-right">Rp 89.227.495.420,00</td>
                                    <td class="py-4 pl-6 text-right font-medium">43,87%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </main>
    </div>

</body>

</html>
