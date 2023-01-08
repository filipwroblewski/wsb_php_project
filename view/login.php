<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Oto sadzonki | Logowanie</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./vendor/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./vendor/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./vendor/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<?php

    if (isset($_SESSION['error'])){
      echo <<< INFO
        <div class="col-md-3">
          <div class="card card-outline card-danger">
            <div class="card-header">
              <h3 class="card-title">Mamy problem.</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              $_SESSION[error]
            </div>
          </div>
        </div>
      INFO;

      unset($_SESSION['error']);
    }

    if (isset($_SESSION['warning'])){
      echo <<< INFO
        <div class="col-md-3">
          <div class="card card-outline card-warning">
            <div class="card-header">
              <h3 class="card-title">Coś poszło nie tak.</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              $_SESSION[warning]
            </div>
          </div>
        </div>
      INFO;

      unset($_SESSION['warning']);
    }
  ?>
 
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="./" class="h1"><b>Oto</b>sadzonki</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Zaloguj się aby rozpocząć swoją sesję</p>

        

        <form action="./scripts/login.php" method="post">
          <div class="input-group mb-3">
            <?php
                if (isset($_SESSION['remember'])){
                  $email = $_SESSION['remember']['email'];
                  echo <<< EMAIL
                    <input type="email" class="form-control" placeholder="Email" name="email" value="$email">
                  EMAIL;
                }else{
                  echo <<< EMAIL
                    <input type="email" class="form-control" placeholder="Email" name="email">
                  EMAIL;
                }
            ?>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          

          <div class="input-group mb-3">
            <?php
                if (isset($_SESSION['remember'])){
                  $pass = $_SESSION['remember']['pass'];
                  echo <<< PASSWORD
                    <input type="password" class="form-control" placeholder="Hasło" name="pass" value="$pass">
                  PASSWORD;

                  unset($_SESSION['remember']);
                }else{
                  echo <<< PASSWORD
                    <input type="password" class="form-control" placeholder="Hasło" name="pass">
                  PASSWORD;
                }
            ?>
            
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">
                  Zapamiętaj mnie
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Zaloguj</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="mb-0">
          <a href="./view/register.php" class="text-center">Zarejestruj się</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

<!-- jQuery -->
<script src="./vendor/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./vendor/dist/js/adminlte.min.js"></script>
</body>
</html>
