<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">
    <style>
        .bg-blue-dark {
            background-color: #007bff !important;
        }
        .text-blue-dark {
            color: #007bff !important;
        }
        .btn-yellow {
            background-color: #ffc107;
            color: #212529;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <h3 class="pb-md-5 text-center text-blue-dark">
            Portal Keuangan Mahasiswa <br>
            <small>Universitas Muhammadiyah Semarang</small>
        </h3>
        <div class="row my-5 d-flex justify-content-around">
            <div class="col-lg-5 my-auto d-none d-lg-block">
                <img src="images/mobile_pay.svg" class="img-fluid" alt="Mobile Payment">
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 bg-blue-dark shadow">
                    <div class="card-body">
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $remember = isset($_POST['remember']);

                                if ($username === 'admin' && $password === 'admin1') {
                                    session_start();
                                    $_SESSION['username'] = $username;

                                    if ($remember) {
                                        setcookie('username', $username, time() + (86400 * 30), "/");
                                    }

                                    header('Location: beranda.html');
                                    exit();
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">Login gagal. Silakan coba lagi.</div>';
                                }
                            }
                        ?>
                        <form method="post">
                            <h3 class="text-light">Login</h3>
                            <p>
                                <small class="text-light">* Gunakan NIM dan Password mahasiswa</small>
                            </p>
                            <hr>
                            <div class="form-group">
                                <label class="text-light" for="username">NIM *</label>
                                <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp" autofocus required>
                            </div>
                            <div class="form-group">
                                <label class="text-light" for="password">Password *</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label text-light" for="remember">Remember Me</label>
                            </div>
                            <button type="submit" class="btn btn-block btn-yellow">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="assets/jquery/dist/jquery.min.js"></script>
    <script src="assets/popperjs/dist/umd/popper.min.js"></script>
    <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
