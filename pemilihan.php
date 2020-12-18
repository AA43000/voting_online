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
    <link type="text/css" rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body id="page-top">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Aplikasi Voting</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ml-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="dist/login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron">
        <form method="post" action="">
            <?php
            $row = show("tb_paslon");
            foreach ($row as $data) :
            ?>
                    <img width="200px" height="200px" src="dist/dist/img/<?php echo $data['foto']; ?>"><input type="radio" name="no_urut" value="<?php echo $data['no_urut']; ?>">
            
            <?php
        endforeach;
            ?>
            <div class="form-group">
                <input type="submit" name="pilih" value="pilih" class="btn btn-success">
            </div>
        </form>

        <?php
        $pilih = @$_POST['pilih'];
        $nis = @$_GET['nis'];
        $no_urut = @$_POST['no_urut'];

        if($pilih) {
            mysqli_query($db, "insert into tb_hasil(nis, no_urut) value('$nis', '$no_urut')") or die ($db->error);
            ?>
            <script type="text/javascript">
                window.location.href="berhasil.php";
            </script>
            <?php
        }
        ?>
    </div>
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">Copyright © Ahmad Zaeni Mubarok 2020</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-telegram"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-github"></i></a>
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