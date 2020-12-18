<section class="content-header">
      <h1>
        Edit Data Siswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">edit data siswa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit Data siswa</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <?php
            $id = @$_GET['id'];
            $data = show("tb_siswa", "id = '$id'");
            ?>
            <!-- /.box-header -->
            <div class="box-body">
              <form method="post" action="">
                <input type="hidden" name="id" value="<?php echo $data[0]['id']; ?>">
                <div class="form-group">
                  <label>NIS</label>
                  <input type="text" name="nis" class="form-control" value="<?php echo $data[0]['nis'] ?>">
                </div>

                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="Nama" class="form-control" value="<?php echo $data[0]['nama']; ?>">
                </div>

                <div class="form-group">
                  <label>Kelas</label>
                  <input type="text" name="kelas" class="form-control" value="<?php echo $data[0]['kelas']; ?>">
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" value="<?php echo $data[0]['email']; ?>">
                </div>

                <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
              </form>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
<?php
$simpan = @$_POST['simpan'];
$nis = @$_POST['nis'];
$nama = @$_POST['nama'];
$kelas = @$_POST['kelas'];
$email = @$_POST['email'];

if($simpan) {
  mysqli_query($db, "update tb_siswa set nis = '$nis', nama = '$nama', kelas = '$kelas', email = '$email' where id = '$id'") or die ($db->error);
  ?>
  <script type="text/javascript">
    window.location.href = "dashboard.php?page=siswa";
  </script>
  <?php
}