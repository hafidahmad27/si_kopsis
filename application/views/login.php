<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Koperasi Siswa "Pangestu Pambudi"</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">

    <!-- <div class="login-box">
        <div class="row">
            <div class="jumbotron jumbotron-fluid bg-primary">
                <div class="container">
                    <h1 class="display-4">Fluid jumbotron</h1>
                    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                </div>
            </div>

            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Login untuk masuk</p>
                    <div class="alert alert-danger d-none"></div>
                    <form>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-9 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-primary">
                                <div class="jumbotron jumbotron-fluid bg-primary">
                                    <div class="container">
                                        <div class="text-center">
                                            <h2>Sistem Informasi Penjualan</h2>
                                            <p class="lead">Koperasi Siswa "Pangestu Pambudi"</p>
                                            <img src="<?= base_url() ?>assets/dist/img/logo_kopsis.png" style="width: 50%;" class="rounded-circle">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center mt-3">
                                        <h2>Form Login</h2>
                                        <hr>
                                        <p class="mt-4">Silahkan masukkan username dan password anda untuk menggunakan aplikasi ini</p>
                                    </div>
                                    <div class="alert alert-danger d-none"></div>
                                    <form>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="username" placeholder="Username" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-lock"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-block btn-primary">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- jQuery -->
        <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
        <script src="<?php echo base_url('assets/plugins/jquery-validation/jquery.validate.min.js') ?>"></script>
        <script>
            $('form').validate({
                errorElement: 'span',
                errorPlacement: (error, element) => {
                    error.addClass('invalid-feedback')
                    element.closest('.input-group').append(error)
                },
                submitHandler: () => {
                    $.ajax({
                        url: '<?php echo site_url('login') ?>',
                        type: 'post',
                        dataType: 'json',
                        data: $('form').serialize(),
                        success: res => {
                            if (res == 'tidakada') {
                                $('.alert').html('Username tidak terdaftar')
                                $('.alert').removeClass('d-none')
                            } else if (res == 'passwordsalah') {
                                $('.alert').html('Password Salah')
                                $('.alert').removeClass('d-none')
                            } else {
                                $('.alert').html('Sukses')
                                $('.alert').addClass('alert-success')
                                $('.alert').removeClass('d-none alert-danger')
                                setTimeout(function() {
                                    window.location.reload()
                                }, 1000);
                            }
                        },
                        error: err => {
                            console.log(err);
                        }
                    })
                }
            })
        </script>
</body>

</html>