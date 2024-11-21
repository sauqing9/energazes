<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EnerGaze - Sign Up Success</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/images/logo_energaze.png">
   <link rel="stylesheet" href="css/sign-up-success.css">
</head>
<body style="background-color: #f4e4c4;">
    @include('navbar')

    <div id="judul">
        <h1>New here?</h1>
        <h2>Make an account!</h2>
    </div>

    <div class="signup-container">
        <div class="left-section">
            <h1>GRO</h1>
            <h1>VE</h1>
            <img src="assets/images/3d_grove_b.png" alt="Robot Image">
        </div>
        <div class="right-section">
            <img src="assets/images/check_grove.png" alt="ACC Image">
            <h1>Account created</h1>
            <h1>successfully!</h1>
            <a href="{{route('login')}}">
                <button class="submit-btn">Continue to Log In</button>   
            </a>
        </div>
        
    </div>

    <p id="penjelasan" >EnerGaze merupakan website yang berfokus pada penampilan statistik komponen alat dan tampilan dari integrasi GPS yang dipasang di pada GROVE.</p>
    
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
            </div>
            
        </div>
    </footer>
    
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>     
</body>
</html>