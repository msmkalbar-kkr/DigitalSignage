<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Keuangan Daerah Kubu Raya</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100vw;
            height: 100vh;
            overflow: hidden;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            flex-direction: column;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 30px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            flex-shrink: 0;
        }

        .header h1 {
            font-size: 22px;
            color: #1f2937;
        }

        .header .year {
            font-size: 16px;
            font-weight: 600;
            color: #374151;
        }

        .content-wrapper {
            flex: 1;
            overflow-y: auto;
            padding: 20px 30px;
        }

        .content-wrapper::-webkit-scrollbar {
            width: 8px;
        }

        .content-wrapper::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        .content-wrapper::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        .cards-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 18px;
            flex-shrink: 0;
        }

        .card-amount {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 6px;
            color: #1f2937;
        }

        .card-realisasi {
            font-size: 11px;
            color: #6b7280;
            margin-bottom: 12px;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .card-label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .badge {
            padding: 2px 8px;
            border-radius: 4px;
            color: white;
            font-size: 11px;
            font-weight: 600;
        }

        .progress-bar {
            height: 3px;
            border-radius: 2px;
            margin-top: 6px;
        }

        .blue {
            background-color: #2563eb;
        }

        .pink {
            background-color: #ec4899;
        }

        .dark {
            background-color: #1f2937;
        }

        .orange {
            background-color: #f97316;
        }

        .main-content {
            display: grid;
            grid-template-columns: 1.8fr 1fr;
            gap: 20px;
            margin-bottom: 24px;
            height: 400px;
        }

        .table-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 20px;
            overflow: auto;
        }

        .table-container h2 {
            font-size: 16px;
            margin-bottom: 12px;
            color: #1f2937;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
        }

        th {
            text-align: left;
            padding: 10px 6px;
            border-bottom: 1px solid #e5e7eb;
            font-weight: 600;
            color: #374151;
            background-color: #f9fafb;
        }

        th:nth-child(2),
        th:nth-child(3),
        th:nth-child(4),
        td:nth-child(2),
        td:nth-child(3),
        td:nth-child(4) {
            text-align: right;
        }

        td {
            padding: 10px 6px;
            border-bottom: 1px solid #e5e7eb;
            color: #374151;
        }

        tr:hover {
            background-color: #f9fafb;
        }

        .account-name {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .small-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .chart-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: auto;
        }

        .chart-title {
            font-size: 14px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 12px;
            text-align: center;
        }

        .svg-wrapper {
            width: 200px;
            height: 200px;
        }

        .belanja-section {
            display: grid;
            grid-template-columns: 1fr 1.8fr;
            gap: 20px;
            height: 400px;
        }

        @media (max-width: 1920px) {
            .cards-container {
                grid-template-columns: repeat(4, 1fr);
            }

            .main-content {
                grid-template-columns: 1.8fr 1fr;
            }

            .belanja-section {
                grid-template-columns: 1fr 1.8fr;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Dashboard Keuangan Daerah Pemerintah Daerah Kabupaten Kubu Raya</h1>
        <div class="year">Tahun anggaran 2025</div>
    </div>

    <div class="content-wrapper">
        <div class="cards-container">
            <div class="card">
                <div class="card-amount">Rp 1.874.864.452.470,00</div>
                <div class="card-realisasi">Realisasi Rp 966.001.121.892,15</div>
                <div class="card-footer">
                    <div class="card-label">
                        <span class="dot blue"></span>
                        <span>Pendapatan daerah</span>
                    </div>
                    <span class="badge blue">85%</span>
                </div>
                <div class="progress-bar blue"></div>
            </div>

            <div class="card">
                <div class="card-amount">Rp 2.048.151.597.242,00</div>
                <div class="card-realisasi">Realisasi Rp 876.813.653.635,81</div>
                <div class="card-footer">
                    <div class="card-label">
                        <span class="dot pink"></span>
                        <span>Belanja daerah</span>
                    </div>
                    <span class="badge pink">88%</span>
                </div>
                <div class="progress-bar pink"></div>
            </div>

            <div class="card">
                <div class="card-amount">Rp 183.287.144.772,00</div>
                <div class="card-realisasi">Realisasi Rp 803.923.982,00</div>
                <div class="card-footer">
                    <div class="card-label">
                        <span class="dot dark"></span>
                        <span>Penerimaan pembiayaan</span>
                    </div>
                    <span class="badge dark">90%</span>
                </div>
                <div class="progress-bar dark"></div>
            </div>

            <div class="card">
                <div class="card-amount">Rp 183.287.144.772,00</div>
                <div class="card-realisasi">Realisasi Rp 803.923.982,00</div>
                <div class="card-footer">
                    <div class="card-label">
                        <span class="dot orange"></span>
                        <span>pengeluaran pembiayaan</span>
                    </div>
                    <span class="badge orange">80%</span>
                </div>
                <div class="progress-bar orange"></div>
            </div>
        </div>

        <div class="main-content">
            <div class="table-container">
                <h2>Pendapatan Daerah</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nama Akun</th>
                            <th>Pagu Anggaran</th>
                            <th>Realisasi</th>
                            <th>Persentase</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="account-name">
                                    <span class="small-dot blue"></span>
                                    <span>Pajak Daerah</span>
                                </div>
                            </td>
                            <td>Rp 109.227.495.420,00</td>
                            <td>Rp 89.227.495.420,00</td>
                            <td>60,98%</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="account-name">
                                    <span class="small-dot blue"></span>
                                    <span>Retribusi Daerah</span>
                                </div>
                            </td>
                            <td>Rp 109.227.495.420,00</td>
                            <td>Rp 89.227.495.420,00</td>
                            <td>45,76%</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="account-name">
                                    <span class="small-dot blue"></span>
                                    <span>Hasil Pengelolaan Kekayaan Daerah</span>
                                </div>
                            </td>
                            <td>Rp 109.227.495.420,00</td>
                            <td>Rp 89.227.495.420,00</td>
                            <td>35,67%</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="account-name">
                                    <span class="small-dot blue"></span>
                                    <span>Lain-lain PAD yang Sah</span>
                                </div>
                            </td>
                            <td>Rp 109.227.495.420,00</td>
                            <td>Rp 89.227.495.420,00</td>
                            <td>78,00%</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="account-name">
                                    <span class="small-dot blue"></span>
                                    <span>Pendapatan Transfer Pusat</span>
                                </div>
                            </td>
                            <td>Rp 109.227.495.420,00</td>
                            <td>Rp 89.227.495.420,00</td>
                            <td>54,47%</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="account-name">
                                    <span class="small-dot blue"></span>
                                    <span>Pendapatan Transfer Antar Daerah</span>
                                </div>
                            </td>
                            <td>Rp 109.227.495.420,00</td>
                            <td>Rp 89.227.495.420,00</td>
                            <td>79,06%</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="chart-container">
                <div class="chart-title">Distribusi Pendapatan Daerah</div>
                <svg class="svg-wrapper" viewBox="0 0 300 300">
                    <defs>
                        <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#1e3a8a" />
                            <stop offset="100%" stop-color="#3b82f6" />
                        </linearGradient>
                        <linearGradient id="grad2" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#2563eb" />
                            <stop offset="100%" stop-color="#60a5fa" />
                        </linearGradient>
                        <linearGradient id="grad3" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#0ea5e9" />
                            <stop offset="100%" stop-color="#38bdf8" />
                        </linearGradient>
                        <linearGradient id="grad4" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#0284c7" />
                            <stop offset="100%" stop-color="#7dd3fc" />
                        </linearGradient>
                    </defs>
                    <path d="M150 150 L150 20 A130 130 0 0 1 265 210 Z" fill="url(#grad1)" stroke="#fff"
                        stroke-width="3" />
                    <path d="M150 150 L265 210 A130 130 0 0 1 65 230 Z" fill="url(#grad2)" stroke="#fff"
                        stroke-width="3" />
                    <path d="M150 150 L65 230 A130 130 0 0 1 115 40 Z" fill="url(#grad3)" stroke="#fff"
                        stroke-width="3" />
                    <path d="M150 150 L115 40 A130 130 0 0 1 150 20 Z" fill="url(#grad4)" stroke="#fff"
                        stroke-width="3" />
                    <text x="205" y="120" text-anchor="middle" fill="white" font-size="14"
                        font-weight="bold">45%</text>
                    <text x="205" y="135" text-anchor="middle" fill="white" font-size="8">Lain-lain PAD</text>
                    <text x="210" y="210" text-anchor="middle" fill="white" font-size="14"
                        font-weight="bold">35%</text>
                    <text x="210" y="225" text-anchor="middle" fill="white" font-size="8">Transfer Pusat</text>
                    <text x="90" y="210" text-anchor="middle" fill="white" font-size="14"
                        font-weight="bold">15%</text>
                    <text x="90" y="225" text-anchor="middle" fill="white" font-size="8">Pajak Daerah</text>
                    <text x="135" y="70" text-anchor="middle" fill="white" font-size="14"
                        font-weight="bold">5%</text>
                    <text x="135" y="85" text-anchor="middle" fill="white" font-size="8">Retribusi</text>
                </svg>
            </div>
        </div>

        <div class="belanja-section">
            <div class="chart-container">
                <div class="chart-title">Distribusi Belanja Daerah</div>
                <svg class="svg-wrapper" viewBox="0 0 300 300">
                    <defs>
                        <linearGradient id="grad5" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#7f1d1d" />
                            <stop offset="100%" stop-color="#dc2626" />
                        </linearGradient>
                        <linearGradient id="grad6" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#b91c1c" />
                            <stop offset="100%" stop-color="#ef4444" />
                        </linearGradient>
                        <linearGradient id="grad7" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#dc2626" />
                            <stop offset="100%" stop-color="#fca5a5" />
                        </linearGradient>
                        <linearGradient id="grad8" x1="0%" y1="0%" x2="100%" y2="100%">
                            <stop offset="0%" stop-color="#991b1b" />
                            <stop offset="100%" stop-color="#f87171" />
                        </linearGradient>
                    </defs>
                    <path d="M150 150 L150 20 A130 130 0 0 1 265 210 Z" fill="url(#grad5)" stroke="#fff"
                        stroke-width="3" />
                    <path d="M150 150 L265 210 A130 130 0 0 1 65 230 Z" fill="url(#grad6)" stroke="#fff"
                        stroke-width="3" />
                    <path d="M150 150 L65 230 A130 130 0 0 1 115 40 Z" fill="url(#grad7)" stroke="#fff"
                        stroke-width="3" />
                    <path d="M150 150 L115 40 A130 130 0 0 1 150 20 Z" fill="url(#grad8)" stroke="#fff"
                        stroke-width="3" />
                    <text x="205" y="120" text-anchor="middle" fill="white" font-size="14"
                        font-weight="bold">45%</text>
                    <text x="205" y="135" text-anchor="middle" fill="white" font-size="8">Pegawai</text>
                    <text x="210" y="210" text-anchor="middle" fill="white" font-size="14"
                        font-weight="bold">30%</text>
                    <text x="210" y="225" text-anchor="middle" fill="white" font-size="8">Barang & Jasa</text>
                    <text x="90" y="210" text-anchor="middle" fill="white" font-size="14"
                        font-weight="bold">15%</text>
                    <text x="90" y="225" text-anchor="middle" fill="white" font-size="8">Modal</text>
                    <text x="135" y="70" text-anchor="middle" fill="white" font-size="14"
                        font-weight="bold">10%</text>
                    <text x="135" y="85" text-anchor="middle" fill="white" font-size="8">Lainnya</text>
                </svg>
            </div>

            <div class="table-container">
                <h2>Belanja Daerah</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nama Akun</th>
                            <th>Pagu Anggaran</th>
                            <th>Realisasi</th>
                            <th>Realisasi %</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="account-name">
                                    <span class="small-dot" style="background-color: #7f1d1d;"></span>
                                    <span>Belanja Pegawai</span>
                                </div>
                            </td>
                            <td>Rp 109.227.495.420,00</td>
                            <td>Rp 89.227.495.420,00</td>
                            <td>80,98%</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="account-name">
                                    <span class="small-dot" style="background-color: #dc2626;"></span>
                                    <span>Belanja Barang dan Jasa</span>
                                </div>
                            </td>
                            <td>Rp 109.227.495.420,00</td>
                            <td>Rp 89.227.495.420,00</td>
                            <td>45,66%</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="account-name">
                                    <span class="small-dot" style="background-color: #b91c1c;"></span>
                                    <span>Belanja Hibah</span>
                                </div>
                            </td>
                            <td>Rp 109.227.495.420,00</td>
                            <td>Rp 89.227.495.420,00</td>
                            <td>34,89%</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="account-name">
                                    <span class="small-dot" style="background-color: #dc2626;"></span>
                                    <span>Belanja Modal Peralatan</span>
                                </div>
                            </td>
                            <td>Rp 109.227.495.420,00</td>
                            <td>Rp 89.227.495.420,00</td>
                            <td>49,88%</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="account-name">
                                    <span class="small-dot" style="background-color: #ef4444;"></span>
                                    <span>Belanja Modal Gedung</span>
                                </div>
                            </td>
                            <td>Rp 109.227.495.420,00</td>
                            <td>Rp 89.227.495.420,00</td>
                            <td>27,98%</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="account-name">
                                    <span class="small-dot" style="background-color: #dc2626;"></span>
                                    <span>Belanja Modal Jalan</span>
                                </div>
                            </td>
                            <td>Rp 109.227.495.420,00</td>
                            <td>Rp 89.227.495.420,00</td>
                            <td>89,88%</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="account-name">
                                    <span class="small-dot" style="background-color: #dc2626;"></span>
                                    <span>Belanja Bagi Hasil</span>
                                </div>
                            </td>
                            <td>Rp 109.227.495.420,00</td>
                            <td>Rp 89.227.495.420,00</td>
                            <td>43,87%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
