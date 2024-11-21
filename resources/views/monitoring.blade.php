<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EnerGaze - Monitoring</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/images/logo_energaze.png">
    <link rel="stylesheet" href="css/home-monitoring.css">
    <!-- Tambahkan Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>


</head>
<body>
    
    @include('navbar')

    <section id="monitoring-monitoringpage" class="text-center">
        <div class="container position-relative">
            <h2 class="monitoring-title-monitoringpage">Monitoring</h2>
            <h1 class="monitoring-grove-monitoringpage">GROVE</h1>
            <a href="#status-section" class="btn btn-primary btn-go rounded-pill position-absolute btn-status-section">
                Status
            </a>
            <a href="#gps" class="btn btn-primary btn-go rounded-pill position-absolute btn-gps-section">
                Location
            </a>
            <a href="#camera" class="btn btn-primary btn-go rounded-pill position-absolute btn-camera-section">
                Camera
            </a>
            <img src="assets/images/3d_grove_f.png" alt="EnerGaze Vehicle" class="energaze-monitoring-img-monitoringpage mb-0 w-600 ">
        </div>
    </section>

    <!-- GROVE's Status Section -->
    <section id="status-section" class="py-5">
        <div class="container-fluid text-center">
            <h2 class="status-title">GROVE's Status</h2>
            <div class="row justify-content-center">
                <div class="col-md-2 order-1 mb-4">
                    <div class="battery-percentage-container p-4 bg-primary text-white d-flex flex-column align-items-center justify-content-center">
                        <h4 class="battery-percentage-title" >Battery<br>Percentage</h4>
                        <h2 class="battery-percentage" id="batteryPercentage">100%</h2>
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-battery-charging" viewBox="0 0 16 16">
                            <path d="M9.585 2.568a.5.5 0 0 1 .226.58L8.677 6.832h1.99a.5.5 0 0 1 .364.843l-5.334 5.667a.5.5 0 0 1-.842-.49L5.99 9.167H4a.5.5 0 0 1-.364-.843l5.333-5.667a.5.5 0 0 1 .616-.09z"/>
                            <path d="M2 4h4.332l-.94 1H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h2.38l-.308 1H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2"/>
                            <path d="M2 6h2.45L2.908 7.639A1.5 1.5 0 0 0 3.313 10H2zm8.595-2-.308 1H12a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1H9.276l-.942 1H12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2z"/>
                            <path d="M12 10h-1.783l1.542-1.639q.146-.156.241-.34zm0-3.354V6h-.646a1.5 1.5 0 0 1 .646.646M16 8a1.5 1.5 0 0 1-1.5 1.5v-3A1.5 1.5 0 0 1 16 8"/>
                        </svg>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="dist-traveled-container p-4 border justify-content-center">
                        <h4 class="distance-traveled-title">Distance Traveled</h4>
                        <h2 id="distanceTraveled" class="distance-traveled">000 KM</h2>
                        <img src="assets/images/road.png" alt="Road" class="road-status mb-0">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mt-5 mb-4 text-center">
                    <h5 class="battery-percentage-graph-title">Battery Percentage</h5>
                    <canvas id="batteryGraph" width="400" height="200"></canvas>
                </div>
                <div class="col-md-6 mt-5 mb-4 text-center">
                    <h5 class="distance-traveled-graph-title">Distance Traveled</h5>
                    <canvas id="distanceGraph" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </section>

    <!-- Location Section -->
    <section id="gps" class="location py-5">
        <div class="container text-center">
            <h2 class="location-title">GROVE's Location</h2>
            <div class="map-container my-3">
                <!-- isi buat integrasi gps -->
            </div>
        </div>
    </section>

    <!-- Camera Section -->
    <section id="camera" class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="camera-title">GROVE's Camera</h2>
            <div class="camera-container my-3">
                <!-- isi buat integrasi kamera -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer d-flex align-items-end">
        <div class="container d-flex">
            <!-- Logo and Title -->
            <div class="footer-logo">
                <img src="assets/images/logo_energaze.png" alt="EnerGaze Logo" class="logo-img">
                <h2 class="footer-title">EnerGaze</h2>
            </div>
            <!-- Copyright Text -->
            <div class="footer-copyright">
                <small>Copyright © 2024 Romusa. All rights reserved.</small>
            </div>
            
        </div>
    </footer>

    

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        let isGenerating = false;  // Menyimpan status generating
        let pollingStarted = false;  // Untuk memastikan polling dimulai setelah is_generating true

        // Fungsi untuk memperbarui data monitoring
        function updateMonitoringData() {
            // Fetch status system dari /api/system-status untuk is_generating
            fetch('/api/system-status')
                .then(response => response.json())  // Mendapatkan status generasi dalam format JSON
                .then(systemStatus => {
                    console.log('System Status:', systemStatus);  // Log status generating

                    // Jika is_generating true dan polling belum dimulai, mulai polling setiap 5 detik
                    if (systemStatus.is_generating && !pollingStarted) {
                        console.log("Polling dimulai karena is_generating = true");
                        pollingStarted = true;  // Mulai polling untuk data monitoring
                        setInterval(fetchMonitoringData, 5000); // Polling setiap 5 detik untuk data monitoring
                    }

                    // Ambil data monitoring (battery dan distance) hanya jika generating aktif
                    if (systemStatus.is_generating) {
                        fetchMonitoringData();  // Ambil data monitoring sekali lagi untuk memperbarui tampilan
                    } else {
                        // Jika tidak generating, tampilkan data default
                        document.getElementById('batteryPercentage').innerText = '0%';
                        document.getElementById('distanceTraveled').innerText = '000 KM';
                    }
                })
                .catch(error => console.error('Error fetching system status:', error)); // Jika ada error, tampilkan di console
        }

        // Fungsi untuk mengambil data monitoring
        function fetchMonitoringData() {
            fetch('/api/monitoring-data')
                .then(response => response.json())  // Mendapatkan data monitoring dalam format JSON
                .then(data => {
                    console.log('Data Monitoring:', data);  // Log data monitoring

                    // Update tampilan dengan data terbaru
                    document.getElementById('batteryPercentage').innerText = `${data.battery_level}%`;
                    document.getElementById('distanceTraveled').innerText = `${(data.distance_covered / 1000).toFixed(3)} KM`;
                })
                .catch(error => console.error('Error fetching monitoring data:', error)); // Jika ada error, tampilkan di console
        }

        // Jalankan polling pertama kali saat halaman dimuat
        updateMonitoringData();


        //==============================================================================================================================================================
        // Untuk menampilkan grafik battery dan distance
        let batteryChart = null;
        let distanceChart = null;

        // Fungsi menggambar grafik
        function drawGraph(data, graphType) {
        const ctx = document.getElementById(graphType + 'Graph').getContext('2d');

        // Hancurkan grafik sebelumnya jika ada
        if (graphType === 'battery' && batteryChart !== null) {
            batteryChart.destroy();
        } else if (graphType === 'distance' && distanceChart !== null) {
            distanceChart.destroy();
        }

        // Menyiapkan data untuk grafik
        const labels = data.map(item => item.timestamp); // Menggunakan timestamp sebagai label
        const chartData = data.map(item => graphType === 'battery' ? item.battery_level : item.distance_covered);

        const chartLabel = graphType === 'battery' ? 'Battery Level (%)' : 'Distance Covered (M)';

        // Membuat grafik baru
        const chartConfig = {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: chartLabel,
                    data: chartData,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: false
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        type: 'time', // Tipe sumbu X adalah waktu
                        time: {
                            unit: 'second', // Atur unit waktu (detik, menit, jam, dsb.)
                            tooltipFormat: 'yyyy-MM-dd HH:mm:ss', // Format tooltip
                            displayFormats: {
                                second: 'HH:mm:ss', // Format tampilan
                            }
                        },
                        title: {
                            display: true,
                            text: 'Timestamp'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: chartLabel
                        }
                    }
                }
            }
        };

        // Menggambar grafik baru
        if (graphType === 'battery') {
            batteryChart = new Chart(ctx, chartConfig);
        } else if (graphType === 'distance') {
            distanceChart = new Chart(ctx, chartConfig);
        }
    }


        // Ambil data statistik dari API dan gambar grafik
        function fetchStatisticsData() {
            fetch('/api/get-statistics')
                .then(response => response.json())
                .then(data => {
                    // Ambil data dan gambar grafik untuk battery dan distance
                    if (data.trials && data.trials.length > 0) {
                        drawGraph(data.trials, 'battery'); // Gambar grafik battery
                        drawGraph(data.trials, 'distance'); // Gambar grafik distance
                    } else {
                        console.warn('No data available for statistics');
                    }
                })
                .catch(error => {
                    console.error('Error fetching statistics data:', error);
                });
        }

        // Panggil fungsi untuk mengambil data statistik dan menggambar grafik
        fetchStatisticsData();

        // Refresh data setiap beberapa detik (opsional jika perlu real-time)
        setInterval(fetchStatisticsData, 5000);


    </script>

</body>
</html>
