<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Bayar Pinjaman
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard')?>"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Data Edit Pinjaman</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo site_url('pembayaran/actionbayar');?>">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Pelanggan</label>
                                            <input type="text" class="form-control" name="peminjam_id" value="<?= $data['nama_pelanggan'] ?>" readonly>
                                            <input type="hidden" name="pelanggan_id" value="<?= $data['peminjam_id'] ?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="jenis">Jenis Pinjaman</label>
                                          <input type="text" class="form-control" name="jenis_pinjaman" value="<?= $data['jenis_pinjaman'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="tipe">Cara Pembayaran</label>
                                          <input type="text" class="form-control" name="tipe_pinjaman" value="<?= $data['tipe_pinjaman'] ?>" readonly>
                                        </div>
                                        <div class="form-group" id="bayar_show">
                                          <label for="bayar">Pembayaran Pinjaman</label>
                                          <input class="form-control" type="text" name="cicilan_pinjaman" id="bayar" value="Rp. <?= number_format($data['cicilan_pinjaman']) ?>" readonly>
                                        </div>
                                        <div class="form-group" id="bayar_show">
                                          <label for="jumlah">Jumlah Cicilan</label>
                                          <input class="form-control" type="text" name="banyak_cicilan" id="jumlah" value="<?= $data['durasi_pinjaman'] ?>" readonly>
                                          <input class="form-control" type="hidden" name="b" id="jumlah" value="<?= $data['durasi_pinjaman'] ." >sisa cicilan > ". $data['sisa_cicilan'] ?>" readonly>
                                          <input class="form-control" type="hidden" name="cicilan_ke" id="cicilan_ke" value="<?= $data['cicilan_ke'] ?>" readonly>
                                          <input class="form-control" type="hidden" name="sisa_cicilan" id="sisa_cicilan" value="<?= $data['sisa_cicilan'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="durasi">Telat?</label>
                                          <select class="form-control" id="telat" name="telat">
                                            <option value="tidak">Tidak</option>
                                            <option value="ya">Ya</option>
                                          </select>
                                        </div>
                                        <div class="form-group" id="biaya_telat" style="display: none;">
                                          <label for="biaya_telat">Total Biaya Telat</label>
                                          <input class="form-control" type="text" name="biaya_telat" id="biaya_telat" value="15000" readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="biaya_telat">Total Bayar</label>
                                          <input class="form-control" type="text" name="total_bayar" id="total_bayar" value="Rp. <?= number_format($data['cicilan_pinjaman'])?>" readonly>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <input type="hidden" name="pinjaman_id" value="<?= $data['id_pinjaman'] ?>">
                                        <input type="hidden" name="nomor_pinjaman" value="<?= $data['nomor_pinjaman'] ?>">
                                        <input type="hidden" name="id_cicilan" value="<?= $data['id_cicilan'] ?>">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section>
    <!-- /.content -->
  </div>

<?php include_once dirname(__FILE__).'/../layouts/footer.php';?>
<script type="text/javascript">
$('#telat').change(function(){
    if($('#telat').val() == 'ya') {
      var cicilan = <?= $data['cicilan_pinjaman'] ?>;
      var total   = cicilan + 15000;
      var totalnya= (total/1000).toFixed(3);
      $('#biaya_telat').show();
      $('#total_bayar').val('Rp. '+totalnya);
    }else{
      $('#biaya_telat').hide();
    }
});
</script>
