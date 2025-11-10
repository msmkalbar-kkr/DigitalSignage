<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime Usulan Pemindahtanganan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
</head>

<body class="bg-gray-100 p-10">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-2xl font-bold mb-4 text-blue-700">
            Data Realtime
            <span id="lastUpdate" class="text-sm font-normal text-gray-600"></span>
        </h1>





        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left">ID</th>
                        <th class="py-3 px-4 text-left">Nama Barang</th>
                        <th class="py-3 px-4 text-left">Merek</th>
                        <th class="py-3 px-4 text-left">Lokasi</th>
                        <th class="py-3 px-4 text-left">Tahun</th>
                        <th class="py-3 px-4 text-left">Updated At</th>
                    </tr>
                </thead>
                <tbody id="usulanBody">
                    @foreach ($data as $row)
                        <tr class="border-b hover:bg-gray-50 transition-colors">
                            <td class="py-3 px-4">{{ $row->id }}</td>
                            <td class="py-3 px-4 font-semibold">{{ $row->nm_barang }}</td>
                            <td class="py-3 px-4">{{ $row->merek }}</td>
                            <td class="py-3 px-4">{{ $row->lokasi }}</td>
                            <td class="py-3 px-4">{{ $row->tahun }}</td>
                            <td class="py-3 px-4 text-sm text-gray-600">{{ $row->updated_at->format('d/m/Y H:i:s') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        const pusher = new Pusher('local', {
            wsHost: window.location.hostname,
            wsPort: 6001,
            wssPort: 6001,
            forceTLS: false,
            encrypted: false,
            disableStats: true,
            enabledTransports: ['ws', 'wss'],
            cluster: 'mt1'
        });

        const statusDot = document.getElementById('statusDot');
        const statusText = document.getElementById('statusText');
        const totalRecords = document.getElementById('totalRecords');
        const lastUpdate = document.getElementById('lastUpdate');
        const connectionInfo = document.getElementById('connectionInfo');

        console.log('🔌 Pusher initialized with config:', {
            host: window.location.hostname,
            port: 6001,
            key: 'local'
        });

        pusher.connection.bind('connecting', () => {
            console.log('🔄 Connecting to WebSocket...');
            updateStatus('connecting', 'Connecting...', 'bg-yellow-500');
        });

        pusher.connection.bind('connected', () => {
            console.log('WebSocket connected! Socket ID:', pusher.connection.socket_id);
            updateStatus('connected', 'Connected', 'bg-green-500');
            if (connectionInfo) {
                connectionInfo.textContent = `Socket ID: ${pusher.connection.socket_id}`;
            }
        });

        pusher.connection.bind('disconnected', () => {
            console.log('disconnected');
            updateStatus('disconnected', 'Disconnected', 'bg-red-500');
        });

        pusher.connection.bind('error', (err) => {
            console.error('Connection error:', err);
            updateStatus('error', 'Connection Error', 'bg-red-500');
        });

        const channel = pusher.subscribe('usulan-channel');

        channel.bind('pusher:subscription_succeeded', () => {
            console.log('Channel subscription succeeded!');
            updateStatus('subscribed', 'Subscribed & Ready', 'bg-green-500 animate-pulse');
        });

        channel.bind('pusher:subscription_error', (err) => {
            console.error('Subscription error:', err);
        });

        // ✅ Handler event realtime dari Laravel
        channel.bind('usulan.updated', function(event) {
            console.log('📡 Event "usulan.updated" received:', event);

            if (Array.isArray(event.data)) {
                // Jika backend kirim array data
                renderTable(event.data);
                updateUI(event.data.length);
            } else if (event.data) {
                // Jika backend kirim single item
                renderSingleRow(event.data);
                updateUI(1);
            } else {
                console.warn('⚠️ Format data tidak dikenali:', event);
            }
        });

        function updateStatus(state, text, dotClass) {
            if (statusDot) statusDot.className = `w-3 h-3 rounded-full ${dotClass}`;
            if (statusText) {
                statusText.textContent = text;
                statusText.className = `text-sm font-medium ${
                state === 'connected' || state === 'subscribed' ? 'text-green-600' :
                state === 'connecting' ? 'text-yellow-600' :
                state === 'error' ? 'text-red-600' : 'text-gray-600'
            }`;
            }
        }

        function renderSingleRow(row) {
            const tbody = document.getElementById('usulanBody');
            if (!tbody) return;

            const existingRow = tbody.querySelector(`tr[data-id="${row.id}"]`);
            const updatedAt = row.updated_at ? new Date(row.updated_at).toLocaleString('id-ID') : '-';

            const tr = document.createElement('tr');
            tr.setAttribute('data-id', row.id);
            tr.className = 'border-b hover:bg-gray-50 transition-colors';
            tr.innerHTML = `
            <td class="py-3 px-4">${row.id || '-'}</td>
            <td class="py-3 px-4 font-semibold text-gray-900">${row.nm_barang || '-'}</td>
            <td class="py-3 px-4">${row.merek || '-'}</td>
            <td class="py-3 px-4">${row.lokasi || '-'}</td>
            <td class="py-3 px-4">${row.tahun || '-'}</td>
            <td class="py-3 px-4 text-sm text-gray-600">${updatedAt}</td>
        `;

            if (existingRow) {
                tbody.replaceChild(tr, existingRow);
            } else {
                tbody.prepend(tr);
            }

            tr.style.backgroundColor = '#d1fae5';
            setTimeout(() => (tr.style.backgroundColor = 'transparent'), 1000);
        }

        function renderTable(data) {
            const tbody = document.getElementById('usulanBody');
            if (!tbody) return;

            tbody.innerHTML = ''; // bersihkan tabel
            data.forEach(row => {
                const tr = document.createElement('tr');
                tr.className = 'border-b hover:bg-gray-50 transition-colors';
                tr.setAttribute('data-id', row.id);
                const updatedAt = row.updated_at ? new Date(row.updated_at).toLocaleString('id-ID') : '-';

                tr.innerHTML = `
                <td class="py-3 px-4">${row.id}</td>
                <td class="py-3 px-4 font-semibold">${row.nm_barang}</td>
                <td class="py-3 px-4">${row.merek}</td>
                <td class="py-3 px-4">${row.lokasi}</td>
                <td class="py-3 px-4">${row.tahun}</td>
                <td class="py-3 px-4 text-sm text-gray-600">${updatedAt}</td>
            `;
                tbody.appendChild(tr);
            });
        }

        function updateUI(total) {
            if (totalRecords) totalRecords.textContent = total;
            if (lastUpdate) {
                lastUpdate.textContent = 'Terakhir update: ' + new Date().toLocaleTimeString('id-ID');
            }

            const title = document.querySelector('h1');
            if (title) {
                title.style.transition = 'color 0.3s';
                title.style.color = '#10b981';
                setTimeout(() => {
                    title.style.color = '#1e40af';
                }, 2000);
            }
        }

        window.testBroadcast = function() {
            console.log('Manual test triggered');

            const testData = [{
                    id: 999,
                    nm_barang: 'BARANG TEST 1',
                    merek: 'TEST MERK',
                    lokasi: 'TEST LOKASI',
                    tahun: '2024',
                    updated_at: new Date().toISOString()
                },
                {
                    id: 998,
                    nm_barang: 'BARANG TEST 2',
                    merek: 'TEST MERK 2',
                    lokasi: 'TEST LOKASI 2',
                    tahun: '2024',
                    updated_at: new Date().toISOString()
                }
            ];

            renderTable(testData);
            updateUI(testData.length);
            console.log('Test data rendered');
        };

        window.checkConnection = function() {
            console.log('Checking connection status:');
            console.log('Pusher connection state:', pusher.connection.state);
            console.log('Socket ID:', pusher.connection.socket_id);
            console.log('Channel subscription state:', channel.subscribed);
        };

        updateUI({{ $data->count() }});
        console.log('Setup complete - waiting for broadcasts...');
    </script>

</body>

</html>
