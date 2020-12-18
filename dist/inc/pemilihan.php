<section class="content-header">
      <h1>
        Data Pemilihan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">data pemilihan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
                <div class="box box-default box-solid">
                  <div class="box-header">
                    <h3 class="box-title">Data Tabel Hasil Pemilihan</h3>
                    <form action="" method="post">
                      <input type="submit" name="reset" value="reset data" class="btn btn-danger">
                    </form>
                    <?php
                      $reset = @$_POST['reset'];
                      if ($reset) {
                        mysqli_query($db, "delete from tb_hasil") or die ($db->error);
                      }
                    ?>

                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <?php
                  $count1 = mysqli_query($db, "SELECT COUNT(no_urut) AS nourut1 FROM tb_hasil WHERE no_urut=1");
                  $var1 = mysqli_fetch_array($count1, MYSQLI_BOTH);
                  $num1 = (int)$var1['nourut1'];
                  $count2 = mysqli_query($db, "SELECT COUNT(no_urut) AS nourut2 FROM tb_hasil WHERE no_urut=2");
                  $var2 = mysqli_fetch_array($count2, MYSQLI_BOTH);
                  $num2 =  (int)$var2['nourut2'];
                  $total = $num1 + $num2;
                  ?>

                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>#</th>
                        <th>Paslon</th>
                        <th>Jumlah suara</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>1</td>
                        <td>1</td>
                        <td><?php echo $var1['nourut1']; ?></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>2</td>
                        <td><?php echo $var2['nourut2']; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2">TOTAL</td>
                        <td><?php echo $total; ?></td>
                      </tr>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Paslon</th>
                        <th>Jumlah suara</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
            </div>

    </section>
    