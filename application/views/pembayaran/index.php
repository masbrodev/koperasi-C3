<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DATA PEMBAYARAN
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">DATA PEMBAYARAN</li>
      </ol>
    </section>
    <?php
    // print_r($data);
    //echo $data['title'];
?>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">DATA PEMBAYARAN</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nomor Pinjaman</th>
                  <th>Nama</th>
                  <th>Tagihan</th>
                  <th>Cicilan Terbayar</th>
                  <th>Sisa cicilan</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $i = 1;
                    foreach ($data as $a) {
                      ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $a['nomor_pinjaman'] ?></td>
                      <td><?php echo $a['nama_pelanggan'] ?></td>
                      <td>Rp. <?php echo number_format($a['nominal_pinjaman']) ?></td>
                      <?php if(!empty($a['cicilan_ke'])){ ?>
                      <td><?= $a['cicilan_ke'] ?></td>
                      <?php }else{ ?>
                      <td>0</td>
                      <?php } ?>
                      <?php if(!empty($a['sisa_cicilan'])){ ?>
                      <td><?= $a['sisa_cicilan'] ?></td>
                      <?php }else{ ?>
                      <td><?= $a['durasi_pinjaman'] ?></td>
                      <?php } ?>
                      <td>
                        <?php if($a['cicilan_ke'] == $a['durasi_pinjaman']){ ?>
                        <button type="button" class="btn btn-info" disabled>Lunas</button>
                        <?php }else{ ?>
                        <a href="<?php echo site_url('pembayaran/bayar/'.$a['nomor_pinjaman']);?>"><button type="button" class="btn btn-info">Bayar</button></a>
                        <?php } ?>
                      </td>
                    </tr>
                    <?php $i++;} ?>
                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>
