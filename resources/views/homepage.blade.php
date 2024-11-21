<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>EnerGaze - Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/home-monitoring.css">
    <link rel="icon" type="image/png" href="assets/images/logo_energaze.png">
</head>
<body>
    @include('navbar')

    <!-- Navbar -->
    <div id="navbar-placeholder"></div>
    <!-- Intro Section -->
    <section id="home" class="text-center py-5 bg-light">
        <div class="container py-5">
            <h2 class="display-4">Welcome to</h2>
            <h1 class="display-2">EnerGaze</h1>
            <img src="assets/images/3d_grove.png" alt="EnerGaze Vehicle" class="img-fluid grove-intro" style="max-width: 650px;">
            <p class="lead mt-5">(One of) GROVE’s website to monitor everything that’s integrated in the system.</p>
            <p class="lead2">Have any questions?</p>
            <a href="#questions" class="btn btn-primary mt-3 btn-ask-freely rounded-pill">Ask freely!</a>
        </div>
        
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container-fluid">
            <div class="row justify-content-center" style="max-width: 100%;">
                <div class="col-4">
                    <img src="assets/images/3d_grove_c.png" alt="EnerGaze Vehicle" class="grove-about-img">
                </div>
                <div class="col-6">
                    <h2 class="about-title display-4 mb-4">About EnerGaze<br>and GROVE</h2>
                    <p class="paragraf-1"><b>EnerGaze</b> merupakan website yang berfokus pada penampilan statistik 
                        komponen alat dan tampilan dari integrasi GPS yang dipasang di pada GROVE.
                        <br><br>
                        <b>GROVE</b> sendiri merupakan alat berbasis sistem gerak roda untuk lahan pertanian kering yang dikendalikan dari jarak jauh, 
                        dirancang untuk memudahkan pengoperasian di medan sulit dan meningkatkan efisiensi kerja petani. 
                        Alat ini menggunakan teknologi skid steering yang memungkinkan manuver fleksibel di medan berat, seperti berputar 
                        hingga 360 derajat, serta dilengkapi pengaturan titik beban optimum (balancing) untuk menjaga stabilitas dan efisiensi 
                        energi selama operasi. GROVE juga merupakan proyek yang dibuat untuk memenuhi tugas akhir mata kuliah Embedded System oleh Kelompok 3.
                        <br><br>
                        <b>GROVE</b> dibuat untuk mengurangi beban kerja fisik, dan meningkatkan efisiensi pengelolaan lahan kering untuk 
                        membantu petani meningkatkan produktivitas.</p>
                    <a href="https://docs.google.com/document/d/1gYPjeRWM2OEuvQbnBazvD-fpaOpGbVaAJXgHllJnfow/edit?usp=sharing" class="paragraf-1 btn-link" target="_blank">Learn more about GROVE.</a>                
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="romusa" class="team py-5 bg-light">
        <div class="container-fluid py-5 text-center">
            <h2 class="team-title display-4">OUR TEAM</h2>
            <h2 class="romusa-title display-2 mt-2 mb-0">ROMUSA</h2>
            <h2 class="romusa-desc mb-5">(Rombongan Muddassir)</h2>
            <div class="row justify-content-center">
                <div class="col-md-2 mb-4">
                    <img src="assets/images/romusa-team/abror.png" alt="Raihan Abrar Baihaki" class="mb-2">
                    <h6 class="romusa-person-name mb-0">RAIHAN ABRAR<br>BAIHAKI</h6>
                    <p class="romusa-person-desc">UI/UX Designer</p>
                </div>
                <div class="col-md-2 mb-4">
                    <img src="assets/images/romusa-team/ilman.png" alt="Muhammad Ilman Safaro" class="mb-2">
                    <h6 class="romusa-person-name mb-0">MUHAMMAD<br>ILMAN SAFARO</h6>
                    <p class="romusa-person-desc">Front-End Developer</p>
                </div>
                <div class="col-md-2 mb-4">
                    <img src="assets/images/romusa-team/vanya.png" alt="Puteri Vanya Salsabila" class="mb-2">
                    <h6 class="romusa-person-name mb-0">PUTERI VANYA<br>SALSABILA</h6>
                    <p class="romusa-person-desc">Project Manager</p>
                </div>
                <div class="col-md-2 mb-4">
                    <img src="assets/images/romusa-team/sauqi.png" alt="Sauqi Muhammad Faiq" class="mb-2">
                    <h6 class="romusa-person-name mb-0">SAUQI<br>MUHAMMAD FAIQ</h6>
                    <p class="romusa-person-desc">Back-End Developer</p>
                </div>
                <div class="col-md-2 mb-4">
                    <img src="assets/images/romusa-team/ojan.png" alt="Naufal Auzan Ramadhan" class="mb-2">
                    <h6 class="romusa-person-name mb-0">NAUFAL AUZAN<br>RAMADHAN</h6>
                    <p class="romusa-person-desc">Data Analyst</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Monitoring Section -->
    <section id="monitoring" class="text-center">
        <div class="container position-relative">
            <h2 class="monitoring-title">Monitoring</h2>
            <h1 class="monitoring-grove">GROVE</h1>
            <a href="{{url('/monitoring')}}" class="btn btn-primary btn-go rounded-pill position-absolute" style="left: 50%; transform: translateX(-50%); z-index: 1;">
                Go!
            </a>
            <img src="assets/images/3d_grove_f.png" alt="EnerGaze Vehicle" class="energaze-monitoring-img mb-0 w-600 mx-0 py-0">
        </div>
    </section>
    

    <section id="questions" class="contact bg-light d-flex align-items-end">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md col-img">
                    <img src="assets/images/3d_grove_sp_t.png" alt="EnerGaze Vehicle" class="energaze-question-img">
                </div>
                <div class="col-md col-form">
                    <!-- Form pertanyaan -->
                    <form action="{{ route('submit-question') }}" method="POST" class="form-style">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control form-subject" placeholder="Subject" required style="height: 10%;">
                        </div>
                        <div class="form-group">
                            <textarea name="question_text" class="form-control form-question-content" rows="4" placeholder="Paragraph of questions..." required style="resize: none; height: 20rem;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

<!-- Jika ada session 'error', tampilkan modal error -->
@if(session('error'))
    @include('popup.question-popup-failed')
    <script>
        $(document).ready(function() {
            // Menampilkan modal failed setelah form gagal (user belum login atau admin)
            $('#questionFailedModal').modal('show');
        });
    </script>
@endif

<!-- Jika ada session 'success', tampilkan modal sukses -->
@if(session('success'))
    @include('popup.question-popup-success')
    <script>
        $(document).ready(function() {
            // Menampilkan modal sukses setelah form berhasil disubmit
            $('#questionSuccessModal').modal('show');
        });
    </script>
@endif

    <!-- Footer -->
    <footer class="footer bg-light d-flex align-items-end">
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
</body>
</html>
