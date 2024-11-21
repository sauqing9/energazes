<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EnerGaze - Homepage</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'SFProDisplayRegular';
            src: url('../assets/fonts/SFProDisplayRegular.ttf') format('truetype');
        }

        @font-face {
            font-family: 'GothamUltra';
            src: url('../assets/fonts/GothamUltra.ttf') format('truetype');
        }
            
        .navbar {
            font-family: 'SFProDisplayRegular', sans-serif;
            background-color: #313131;
        }

        .navbar .nav-link {
            color: #d3d3d3 !important;
            font-size: 14px; 
            padding-top: 11px;
            transition: color 0.3s ease; 
        }
        .nav-link:hover {
            color: #ffffff !important;
        }
        
        .navbar-toggler {
            border: none;
            outline: none;
            box-shadow: none;
        }

        .navbar-toggler-icon {
            background-image: none !important;
            position: relative;
        }

        /* Style for closed (collapsed) state */
        .navbar-toggler-icon::before, .navbar-toggler-icon::after {
            content: "";
            display: block;
            width: 15px;
            height: 1px;
            background-color: white;
            position: absolute;
            transition: 0.3s;
            left: 12px;
        }

        /* Upper bar */
        .navbar-toggler-icon::before {
            top: 10px;
        }

        /* Lower bar */
        .navbar-toggler-icon::after {
            top: 20px;
        }

        /* Style for opened (not collapsed) state */
        .navbar-toggler:not(.collapsed) .navbar-toggler-icon::before {
            transform: rotate(45deg);
            top: 14px;
        }

        .navbar-toggler:not(.collapsed) .navbar-toggler-icon::after {
            transform: rotate(-45deg);
            top: 14px;
        }

        .energaze-title-nav {
            font-family: 'GothamUltra', sans-serif !important;
            color: #F6ECD3;
            font-size: 20px;
            margin-left: 10px;
            margin-bottom: -10px;
        }

        .energaze-logo-nav {
            width: 12%;
            height: 12%;
        }

        .navbar-mobile {
            max-width: 50%;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container d-flex">
            <!-- Logo for mobile view (always visible) -->
            <a class="navbar-brand d-lg-none d-flex navbar-mobile" href="{{ url('/') }}">
                <img src="assets/images/logo_energaze.png" class="energaze-logo-nav" alt="EnerGaze Logo" width="20">
                <h2 class="energaze-title-nav">EnerGaze</h2>
            </a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Logo for desktop view (only visible on large screens) -->
                    <li class="nav-item d-none d-lg-block">
                        <a class="navbar-brand mx-3" href="{{ url('/') }}">
                            <img src="assets/images/logo_energaze.png" alt="EnerGaze Logo" width="20">
                        </a>
                    </li>
                    <li class="nav-item mx-2"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="{{ url('/monitoring') }}">Monitoring</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="{{ url('/monitoring') }}#gps">GPS</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="{{ url('/') }}#about">About</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="{{ route('login') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                        </svg>
                    </a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
