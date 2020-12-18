<section class="content-header">
      <h1>
        Data Siswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">data siswa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data siswa</h3>
              <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahsiswa"><i class="fa fa-plus"></i>Tambah Data</button>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped text-center">
                <thead>
                <tr>
                  <th>#</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>email</th>
                  <th colspan="2">aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $count = 0;
                  $row = show("tb_siswa");
                    foreach ($row as $data) :
                      $count++;
                   ?>
                <tr>
                  <td><?php echo $count ?></td>
                  <td><?php echo $data['nis']; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['kelas']; ?></td>
                  <td><?php echo $data['email']; ?></td>
                  <td><a href="?page=hapus_siswa&id=<?php echo $data['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                  <td><a href="?page=edit_siswa&id=<?php echo $data['id']; ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a></td>
                </tr>
                <?php
              endforeach;
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>email</th>
                  <th colspan="2">aksi</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </section>

    <!-- Modal -->
<div class="modal fade" id="tambahsiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">FORM INPUT DATA SISWA</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="">
          <div class="form-group">
            <label>NIS</label>
            <input type="text" name="nis" class="form-control">
          </div>

          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control">
          </div>

          <div class="form-group">
            <label>Kelas</label>
            <input type="text" name="kelas" class="form-control">
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
          </div>

          <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
          <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>
</div>

<?php
  $simpan = @$_POST['simpan'];
  $nis = @$_POST['nis'];
  $nama = @$_POST['nama'];
  $kelas = @$_POST['kelas'];
  $email = @$_POST['email'];
  if ($simpan){
  mysqli_query($db, "insert into tb_siswa(nis, nama, kelas, email) value('$nis', '$nama', '$kelas', '$email')") or die ($db->error);
  ?>
    <script type="text/javascript">
      window.location.href="dashboard.php?page=siswa";
    </script>
    <?php
}


?>