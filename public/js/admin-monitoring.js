let distanceInterval, batteryInterval;
let distanceCovered = 0;
let batteryLevel;
let batteryTickCount = 0;
let trialCount = 0;

// Ambil trial terakhir dari server saat halaman dimuat
fetch('/api/get-latest-trial')
    .then(response => response.json())
    .then(data => {
        trialCount = data.latest_trial || 0;
        console.log('Latest Trial Count:', trialCount);
    })
    .catch(error => console.error('Error fetching latest trial:', error));

// Tombol Generate dan Stop
document.getElementById("generateBtn").addEventListener("click", startGeneration);
document.getElementById("stopBtn").addEventListener("click", stopGeneration);

// Fungsi memulai percobaan
function startGeneration() {
    trialCount++; // Increment trial count berdasarkan percobaan baru
    batteryLevel = parseInt(document.getElementById("batteryStart").value) || 100;

    if (batteryLevel > 0 && batteryLevel <= 100) {
        distanceCovered = 0;
        document.getElementById("generateBtn").disabled = true;
        document.getElementById("stopBtn").disabled = false;

        // Kirim status generate aktif ke server
        setSystemStatus(true);

        // Jalankan interval untuk data jarak dan baterai
        distanceInterval = setInterval(generateDistanceData, 5000);
        batteryInterval = setInterval(generateBatteryData, 5000);
    } else {
        alert("Persentase baterai harus di antara 1 dan 100");
    }
}

// Fungsi menghentikan percobaan
function stopGeneration() {
    clearInterval(distanceInterval);
    clearInterval(batteryInterval);
    document.getElementById("generateBtn").disabled = false;
    document.getElementById("stopBtn").disabled = true;

    // Kirim status generate berhenti ke server
    setSystemStatus(false);
}

// Fungsi untuk mengirim status generate ke server
function setSystemStatus(isGenerating) {
    fetch('/api/system-status', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ is_generating: isGenerating })  // Kirim status generate ke server
    })
    .then(response => response.json())
    .then(data => {
        console.log(`Status generate set to: ${isGenerating}`);
    })
    .catch(error => {
        console.error('Error updating system status:', error);
    });
}

// Fungsi untuk menghasilkan data jarak
function generateDistanceData() {
    const randomIncrement = Math.random() * 10 + 20;
    distanceCovered += randomIncrement;

    fetch('/api/get-timestamp') // Ambil timestamp dari server
        .then(response => response.json())
        .then(data => {
            const timestamp = data.timestamp;

            const distanceJson = {
                project_id: 1,
                distance_covered: distanceCovered.toFixed(2),
                timestamp: timestamp,
                percobaan: trialCount,
            };

            // Kirim data jarak ke server
            sendDataToServer('/api/distance-monitoring', distanceJson, 'distanceTable');
        })
        .catch(error => {
            console.error('Error fetching timestamp:', error);
        });
}

// Fungsi untuk menghasilkan data baterai
function generateBatteryData() {
    fetch('/api/get-timestamp') // Ambil timestamp dari server
        .then(response => response.json())
        .then(data => {
            const timestamp = data.timestamp;

            if (batteryTickCount >= 6 && batteryLevel > 0) {
                batteryLevel -= 1;
                batteryTickCount = 0;
            }

            batteryTickCount += 1;

            const batteryData = {
                project_id: 1,
                battery_level: batteryLevel,
                timestamp: timestamp,
                percobaan: trialCount
            };

            // Kirim data baterai ke server
            sendDataToServer('/api/battery-monitoring', batteryData, 'batteryTable');

            if (batteryLevel <= 0) {
                stopGeneration(); // Hentikan jika baterai habis
            }
        })
        .catch(error => {
            console.error('Error fetching timestamp:', error);
        });
}

// Fungsi untuk mengirim data ke server dan memperbarui tabel
function sendDataToServer(apiUrl, jsonData, tableId) {
    fetch(apiUrl, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(jsonData),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Data saved:', data);

        // Tambahkan data ke tabel
        const row = document.createElement('tr');
        row.innerHTML = `<td>${trialCount}</td>
                         <td>${jsonData.distance_covered || jsonData.battery_level}</td>
                         <td>${jsonData.timestamp}</td>`;
        document.getElementById(tableId).querySelector('tbody').appendChild(row);
    })
    .catch(error => {
        console.error('Error saving data:', error);
    });
}
