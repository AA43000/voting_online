<?php
error_reporting(null);
?>

<section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Bordered Table</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Data</th>
                  <th style="width: 400px">Progress</th>
                  <th style="width: 40px">Label</th>
                </tr>
                <?php
                $row = mysqli_query($db, "SELECT b.nis, b.nama, b.kelas, b.email FROM tb_hasil a, tb_siswa b WHERE a.nis=b.nis") or die($db->error);
                $baris1 = mysqli_num_rows($row);

                $rows = mysqli_query($db, "select * from tb_siswa a where not exists(select * from tb_hasil b where a.nis=b.nis)") or die($db->error);
                $baris2 = mysqli_num_rows($rows);

                $count1 = mysqli_query($db, "SELECT * FROM tb_siswa");
                  $num1 = mysqli_num_rows($count1);

                  $bar1 = $baris1 / $num1 * 100;
                  $bar2 = $baris2 / $num1 * 100;
                ?>
                <tr>
                  <td>1.</td>
                  <td>Data yang telah memilih</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-success" style="width: <?php echo $bar1; ?>%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-green"><?php echo (int)$bar1; ?>%</span></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Data yang belum memilih</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-danger" style="width: <?php echo $bar2; ?>%"></div>
                    </div>
                  </td>
                  <td><span class="badge bg-red"><?php echo (int)$bar2; ?>%</span></td>
                </tr>
              </table>
            </div>
          </div>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Tabel siswa yang telah memilih</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->

            <?php

            ?>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>email</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $count=0;
                    while($data = mysqli_fetch_array($row)) {
                      $count++;
                  ?>
                <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $data['nis']; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['kelas']; ?></td>
                  <td><?php echo $data['email']; ?></td>
                </tr>
              <?php 
                }
                mysqli_free_result($row);
               ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>email</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Tabel siswa yang telah memilih</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->

            <?php
            
            ?>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>email</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $count=0;
                    while($dat = mysqli_fetch_array($rows)) {
                      $count++;
                  ?>
                <tr>
                  <td><?php echo $count; ?></td>
                  <td><?php echo $dat['nis']; ?></td>
                  <td><?php echo $dat['nama']; ?></td>
                  <td><?php echo $dat['kelas']; ?></td>
                  <td><?php echo $dat['email']; ?></td>
                </tr>
              <?php 
                }
            mysqli_close($db);
               ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>email</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>


    </section>