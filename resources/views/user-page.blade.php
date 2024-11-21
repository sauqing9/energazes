<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EnerGaze - User Profile</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/images/logo_energaze.png">
    <link rel="stylesheet" href="css/user.css">

</head>
<body style="background-color: #f4e4c4;">

    @include('navbar')

    <!-- User -->
    <div class="container-xxl">
        <div class="left-section">
            <img src="assets/images/logo_energaze.png" alt="logo energaze" class="logo-left">
            <div id="data-user">
                <h3>NAME</h3>
                <h4>{{ Auth::user()->name }}</h4>
                <h3>USERNAME</h3>
                <h4>{{Auth::user()->username}}</h4>
                <h3>EMAIL</h3>
                <h4>{{Auth::user()->email}}</h4>
                <h3>DATE OF BIRTH</h3>
                <h4>{{ \Carbon\Carbon::parse(Auth::user()->date_of_birth)->format('d/m/Y') }}</h4>
                <h3>PHONE NUMBER</h3>
                <h4>{{Auth::user()->phone_number}}</h4>
            </div>
            <a href="{{route('logout')}}" class="btn btn-outline-light my-1 btn-logout rounded-pill">Log Out</a>
        </div>
        <div class="right-section">
            <h2>Hello,</h2>
            <h1>User {{ explode(' ', Auth::user()->name)[0] }}</h1>
            <p>Curious about GROVE?</p>
            <a href="{{url('/')}}#questions" class="btn btn-primary my-1 btn-ask-away rounded-pill">Ask away!</a>
            <p2>Question and/or suggestions that you have already submitted will be listed below.</p2>
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
        </div>
    </div>
    
    @if(session()->has('success-login'))
    <script>
        $(document).ready(function() {
            console.log("Triggering modal for session: {{ session('success-login') }}");
            $('#successModal').modal('show');
        });
    </script>
    @endif

    <?php session()->reflash(); ?>


    <!-- Footer -->
    <footer class="footer d-flex align-items-end">
        <div class="container footer-container d-flex">
            <!-- Logo and Title -->
            <div class="footer-logo">
                <img src="assets/images/logo_energaze.png" alt="EnerGaze Logo" class="logo-img">
                <h2 class="footer-title">EnerGaze</h2>
            </div>
            <!-- Copyright Text -->
            <div class="footer-copyright">
                <small>Copyright © 2024 Romusa. All rights reserved.</small>
                {{ dd(session()->all()) }}

            </div>
            
        </div>
    </footer>
    
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  
</body>
</html>
