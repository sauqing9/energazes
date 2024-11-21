<!-- resources/views/navbar.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EnerGaze - Sign Up</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/images/logo_energaze.png">
    <link rel="stylesheet" href="css/sign-up.css">
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
        <form action="{{ route('register.submit') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col">
                        <label for="firstname" class="form-label">FIRST NAME</label>
                        <input id="firstname" name="firstname" type="text" class="form-control" placeholder="First name" required>
                    </div>
                    <div class="col">
                        <label for="lastname" class="form-label">LAST NAME</label>
                        <input id="lastname" name="lastname" type="text" class="form-control" placeholder="Last name" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="formusername" class="form-label">USERNAME</label>
                    <input id="formusername" name="username" type="text" class="form-control" placeholder="Username" required>
                </div>
                <div class="row g-3">
                    <div class="col">
                        <label for="password" class="form-label">PASSWORD</label>
                        <input id="password" name="password" type="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="col">
                        <label for="password_confirmation" class="form-label">CONFIRM PASSWORD</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputemail" class="form-label">EMAIL ADDRESS</label>
                    <input id="inputemail" name="email" type="email" class="form-control" placeholder="Email address" required>
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">DATE OF BIRTH</label>
                    <input type="date" id="dob" name="date_of_birth" required>
                </div>
                <div class="mb-3">
                    <label for="phone-number" class="form-label">PHONE NUMBER</label>
                    <input type="tel" id="phone-number" name="phone_number" placeholder="Phone number" required>
                </div>
                <button type="submit" class="submit-btn">Sign Up</button>
            </form>
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