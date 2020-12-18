<?php
$id = @$_GET['id'];
$data = show("tb_paslon", "id = '$id'");
?>

<section class="content-header">
      <h1>
        Edit Data Paslon
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">edit data paslon</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Data Paslon</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                  <label>No. Urut</label>
                  <input type="text" name="no_urut" class="form-control" value="<?php echo $data[0]['no_urut']; ?>">
                </div>

                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" value="<?php echo $data[0]['nama']; ?>">
                </div>

                <div class="form-group">
                  <label>Visi</label>
                  <textarea name="visi" class="form-control"><?php echo $data[0]['visi']; ?></textarea>
                </div>

                <div class="form-group">
                  <label>Misi</label>
                  <textarea name="misi" class="form-control"><?php echo $data[0]['misi']; ?></textarea>
                </div>

                <div class="form-group">
                  <label>foto 1x1</label>
                  <input type="hidden" name="img" value="<?php echo $data[0]['foto']; ?>">
                  <input type="file" name="foto" class="form-group">
                  <img src="dist/img/<?php echo $data[0]['foto']; ?>" width="200px">
                </div>

                <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                <input name="simpan" value="Simpan" type="submit" class="btn btn-primary">
              </form>
          </div>
    </section>

    <?php

    $simpan = @$_POST['simpan'];
    $no_urut = @$_POST['no_urut'];
    $nama = @$_POST['nama'];
    $visi = @$_POST['visi'];
    $misi = @$_POST['misi'];
    $nama_file = @$_FILES['foto']['name'];
    $source = @$_FILES['foto']['tmp_name'];
    $folder = './dist/img/';

    if ($simpan) {
      if ($nama_file != '') {
        move_uploaded_file($source, $folder.$nama_file);

        mysqli_query($db, "update tb_paslon set no_urut = '$no_urut', nama = '$nama', visi = '$visi', misi ='$misi', foto ='$nama_file' where id = '$id'") or die ($db->error);
        ?>
        <script type="text/javascript">
          window.location.href="dashboard.php?page=paslon";
        </script>
        <?php
      } else {
        mysqli_query($db, "update tb_paslon set no_urut = '$no_urut', nama = '$nama', visi = '$visi', misi ='$misi' where id = '$id'") or die ($db->error);
        ?>
        <script type="text/javascript">
          window.location.href="dashboard.php?page=paslon";
        </script>
        <?php
      }
    }