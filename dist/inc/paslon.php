<section class="content-header">
      <h1>
        Data Paslon
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">data paslon</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Paslon</h3>
              <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahpaslon"><i class="fa fa-plus"></i>Tambah Data</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php
              $row = show('tb_paslon');
              foreach($row as $data) :
              ?>
              <div class="col-md-4">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active">
                  <h3 class="widget-user-username"><?php echo $data['nama']; ?></h3>
                  <h5 class="widget-user-desc">Pasangan calon <?php echo $data['no_urut']; ?></h5>
                </div>
                <div class="widget-user-image">
                  <img class="img-circle" src="dist/img/<?php echo $data['foto']; ?>" alt="User Avatar">
                </div>
                <div class="box-footer">
                  <div class="row">
                    <h4>Visi</h4>
                    <p><?php echo $data['visi']; ?></p>
                    <h4>Misi</h4>
                    <p><?php echo $data['misi']; ?></p>
                  </div>
                  <div class="col text-center">
                    <a href="?page=edit_paslon&id=<?php echo $data['id']; ?>" href="#" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger" href="?page=hapus_paslon&id=<?php echo $data['id']; ?>"><i class="fa fa-trash"></i></a>  
                  </div>
                  <!-- /.row -->
                </div>
              </div>
              <!-- /.widget-user -->
            </div>
            <?php
          endforeach;
            ?>
          </div>
    </section>

        <!-- Modal -->
<div class="modal fade" id="tambahpaslon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">FORM INPUT DATA PASLON</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="" enctype="multipart/form-data">
          <div class="form-group">
            <label>No. Urut</label>
            <input type="text" name="no_urut" class="form-control">
          </div>

          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control">
          </div>

          <div class="form-group">
            <label>Visi</label>
            <textarea name="visi" class="form-control"></textarea>
          </div>

          <div class="form-group">
            <label>Misi</label>
            <textarea name="misi" class="form-control"></textarea>
          </div>

          <div class="form-group">
            <label>foto 1x1</label>
            <input type="file" name="foto" class="form-group">
          </div>

          <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
          <input type="submit" class="btn btn-primary" value="simpan" name="simpan">
        </form>
      </div>
    </div>
  </div>
</div>

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
move_uploaded_file($source, $folder.$nama_file);

mysqli_query($db, "insert into tb_paslon(no_urut, nama, visi, misi, foto) value('$no_urut', '$nama', '$visi', '$misi', '$nama_file')") or die ($db->error);
?>
<script type="text/javascript">
  window.location.href="dashboard.php?page=paslon";
</script>
<?php
}
?>