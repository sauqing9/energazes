<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EnerGaze - Admin Profile</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/images/logo_energaze.png">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/monitoring-admin.css">
    <link rel="stylesheet" href="css/user.css">
</head>
<body>
    @include('navbar')

    <!-- User Profile Section -->
    <div class="container-xxl d-flex">
        <div class="left-section">
            <img src="assets/images/logo_energaze.png" alt="logo energaze" class="logo-left">
            <div id="data-user">
                <h3>NAME</h3>
                <h4>{{ Auth::user()->name }}</h4>
                <h3>USERNAME</h3>
                <h4>{{ Auth::user()->username }}</h4>
                <h3>EMAIL</h3>
                <h4>{{ Auth::user()->email }}</h4>
                <h3>DATE OF BIRTH</h3>
                <h4>{{ \Carbon\Carbon::parse(Auth::user()->date_of_birth)->format('d/m/Y') }}</h4>
                <h3>PHONE NUMBER</h3>
                <h4>{{ Auth::user()->phone_number }}</h4>
            </div>
            <a href="{{ route('logout') }}" class="btn btn-outline-light my-1 btn-logout rounded-pill">Log Out</a>
        </div>

        <!-- Right Section -->
        <div class="right-section">
            <h2>Hello,</h2>
            <h1>Admin {{ explode(' ', Auth::user()->name)[0] }}</h1>
            <p>You have ...<br>questions or suggestions to be answered.</p>
            <div class="question-container">
                <div class="question-item" onclick="window.location.href = 'question1-page.html'">
                    <!-- Bagian Profil -->
                    <div class="profile-section">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                    </div>
                    <!-- Bagian Detail -->
                    <div class="details-section">
                        <h3 id="user-name">Udin</h3>
                        <p id="question-highlight">Bang mau nanya kenapa ganteng amat</p>
                    </div>
                    <!-- Dropdown -->
                    <div class="dropdown" onclick="event.stopPropagation();">
                        <span onclick="toggleDropdown(event)">⋮</span>
                        <div class="dropdown-menu">
                            <a href="#" onclick="event.stopPropagation()">Edit</a>
                            <a href="#" onclick="event.stopPropagation()">Hapus</a>
                        </div>
                    </div>
                </div>
                <div class="question-item" onclick="window.location.href = 'question2-page.html'">
                    <!-- Bagian Profil -->
                    <div class="profile-section">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                    </div>
                    <!-- Bagian Detail -->
                    <div class="details-section">
                        <h3 id="user-name">Purnomo</h3>
                        <p id="question-highlight">Bang mau nanya kalo saya mau beli tapi saya ada di luar negeri kumaha pengirimana?</p>
                    </div>
                    <!-- Dropdown -->
                    <div class="dropdown" onclick="event.stopPropagation();">
                        <span onclick="toggleDropdown(event)">⋮</span>
                        <div class="dropdown-menu">
                            <a href="#" onclick="event.stopPropagation()">Edit</a>
                            <a href="#" onclick="event.stopPropagation()">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Monitoring Value Generator -->
            <p>Monitoring Value Generator</p>
            <div class="monitoring-container">

                <label for="batteryStart">Persentase Awal Baterai:</label>
                <input type="number" id="batteryStart" min="1" max="100" placeholder="Misal: 97">
                <button id="generateBtn">Generate</button>
                <button id="stopBtn" disabled>Stop</button>

                <div class="table-container">
                    <!-- Distance Monitoring Table -->
                    <div class="table-responsive">
                        <h3>Distance Monitoring</h3>
                        <table id="distanceTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Percobaan</th>
                                    <th>Distance Covered (m)</th>
                                    <th>Timestamp</th>
                                </tr>
                            </thead>
                            <tbody id="distanceTableBody">
                                @foreach ($distanceData as $distance)
                                    <tr>
                                        <td>{{ $distance->percobaan }}</td>
                                        <td>{{ $distance->distance_covered }}</td>
                                        <td>{{ $distance->timestamp }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Battery Monitoring Table -->
                    <div class="table-responsive">
                        <h3>Battery Monitoring</h3>
                        <table id="batteryTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Percobaan</th>
                                    <th>Battery Level (%)</th>
                                    <th>Timestamp</th>
                                </tr>
                            </thead>
                            <tbody id="batteryTableBody">
                                @foreach ($batteryData as $battery)
                                    <tr>
                                        <td>{{ $battery->percobaan }}</td>
                                        <td>{{ $battery->battery_level }}</td>
                                        <td>{{ $battery->timestamp }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pass Last Trial Count to JavaScript -->
                <input type="hidden" id="lastTrialCount" value="{{ $lastTrialCount }}">
                <script src="{{ asset('js/admin-monitoring.js') }}"></script>
                <scipt>
                    
                </scipt>
             </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer d-flex align-items-end">
        <div class="container footer-container d-flex">
            <div class="footer-logo">
                <img src="assets/images/logo_energaze.png" alt="EnerGaze Logo" class="logo-img">
                <h2 class="footer-title">EnerGaze</h2>
            </div>
            <div class="footer-copyright">
                <small>Copyright © 2024 Romusa. All rights reserved.</small>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
