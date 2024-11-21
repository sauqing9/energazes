<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EnerGaze - Log In</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/images/logo_energaze.png">
</head>
<body>

    @include('navbar')

    <div id="judul">
        <h1>Log Into</h1>
        <h2>EnerGaze</h2>
    </div>

    <div class="login-container">
        <div class="left-section">
            <h1>GRO</h1>
            <h1>VE</h1>
            <h2>Don't have</h2>
            <h2>an account?</h2>
            <img src="assets/images/smpng.png" alt="Feedback Image" class="img-fluid">
            <a href="{{route('register')}}" class="btn btn-primary btn-signup">Sign Up</a>
        </div>
        <div class="right-section">
        <form id="loginForm"action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="formusername" class="form-label">USERNAME</label>
                <input id="formusername" type="text" class="form-control"  placeholder="Username" name="username" value="{{ old('username') }}" required>
            </div>
            <div class="mb-3">
                <label for="formpassword" class="form-label">PASSWORD</label>
                <input id="formpassword" type="password" class="form-control"  placeholder="Password" name="password" required>
            </div>
                <button class="submit-btn btn-login">Log In</button>   
            <a href="{{url('/forgot-password-page')}}" class="forgot-password">Forgot Password?</a>
        </form>
        </div>
    </div>
    <p id="penjelasan" >EnerGaze merupakan website yang berfokus pada penampilan statistik komponen alat dan tampilan dari integrasi GPS yang dipasang di pada GROVE.</p>

    @include('popup.success-popup')

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