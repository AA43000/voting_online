<?php
include 'dist/inc/_koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Voting online</title>
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body id="page-top">
      <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-primary navbar-dark text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">VOTING ONLINE</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
                <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#pilih">Pilih Sekarang</a>
              </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="dist/login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <header class="masthead" style="background-image: url('assets/img/background.png');">
        <div class="container">
            <div class="masthead-subheading">Selamat datang di voting online!</div>
            <div class="masthead-heading text-uppercase">Pilihanmu menentukan masa depan</div>
            <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#pilih">Pilih Sekarang</a>
        </div>
    </header>

        <section class="page-section" id="pilih">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Pasangan Calon</h2>
                    <h3 class="section-subheading text-muted">Pilihlah dengan bijak.</h3>
                </div>
                <div class="row text-center">
                    <?php
                    $row = show("tb_paslon");
                    foreach($row as $data) :
                    ?>
                    <div class="col">
                        <h4 class="my-3">PASLON <?php echo $data['no_urut']; ?></h4>
                        <img src="dist/dist/img/<?php echo $data['foto']; ?>" width="300px" height="300px">
                        <h6>Nama: <?php echo $data['nama']; ?></h6>
                        <p class="text-muted">
                            <b>Visi</b><br>
                            <?php echo $data['visi']; ?><br>
                            <b>misi</b><br>
                            <?php echo $data['misi']; ?>
                        </p>
                    </div>
                    <?php
                endforeach;
                    ?>
                </div>
                <center><a href="input_kode.php"><button class="btn btn-warning mb-3">Pilih sekarang!!</button></a></center> 
            </div>
        </section>
        
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">Copyright © Ahmad Zaeni Mubarok 2020</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="https://t.me/AA43000"><i class="fab fa-telegram"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://web.facebook.com/profile.php?id=100029022232924"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://github.com/AA43000"><i class="fab fa-github"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-right">
                        <a class="mr-3" href="#!">Privacy Policy</a>
                        <a href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>


</body>
</html>

<script type="text/javascript" src="assets/js/bootstrap.js"></script>
<script type="text/javascript" src="assets/js/scripts.js"></script>
