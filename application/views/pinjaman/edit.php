<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Edit Pinjaman
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
                                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo site_url('pinjaman/actionedit');?>">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Pelanggan</label>
                                            <input type="text" class="form-control" name="peminjam_id" value="<?= $data['nama_pelanggan'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="jenis">Jenis Pinjaman</label>
                                          <select class="form-control" id="jenis" name="jenis_pinjaman">
                                            <option>-- Pilih Jenis Pinjaman --</option>
                                            <option value="barang" <?php if($data['jenis_pinjaman'] == 'barang'){ echo "selected"; } ?>>Barang</option>
                                            <option value="uang" <?php if($data['jenis_pinjaman'] == 'uang'){ echo "selected"; } ?>>Uang</option>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <label for="tipe">Cara Pembayaran</label>
                                          <select class="form-control" id="tipe" name="tipe_pinjaman">
                                            <option>-- Pilih cara pembayaran --</option>
                                            <option value="cicil" <?php if($data['tipe_pinjaman'] == 'cicil'){ echo "selected"; } ?>>Cicilan</option>
                                            <option value="tunai" <?php if($data['tipe_pinjaman'] == 'tunai'){ echo "selected"; } ?>>Tunai setelah 6 bulan</option>
                                          </select>
                                        </div>
                                        <div class="form-group" id="barang_show">
                                          <label for="barang">Barang Pinjaman</label>
                                          <select class="form-control select2" id="barang" name="barang_pinjaman" style="width: 100%;">
                                            <option>-- Pilih barang --</option>
                                          <?php foreach($barang as $a){ ?>
                                            <option value="<?= $a['id_barang'] ?>" <?php if($data['barang_pinjaman'] == $a['id_barang']){ echo "selected"; } ?>><?= $a['nama_barang'] ?></option>
                                          <?php } ?>
                                          </select>
                                        </div>
                                        <div class="form-group" id="uang_show">
                                          <label for="uang">Uang Pinjaman</label>
                                          <input class="form-control" type="text" name="uang_pinjaman" id="uang" placeholder="masukkan nominal pinjaman" value="<?= $data['uang_pinjaman'] ?>">
                                        </div>
                                        <div class="form-group">
                                          <label for="jumlah">Jumlah Pinjaman</label>
                                          <input class="form-control" type="text" name="nominal_pinjaman" id="jumlah" value="<?= $data['nominal_pinjaman'] ?>" readonly>
                                        </div>
                                        <div class="form-group" id="bayar_show">
                                          <label for="bayar">Pembayaran Pinjaman</label>
                                          <input class="form-control" type="text" name="cicilan_pinjaman" id="bayar" value="<?= $data['cicilan_pinjaman'] ?>" readonly>
                                        </div>
                                        <div class="form-group" id="durasi_show">
                                          <label for="durasi">Durasi Pinjaman (dalam bulan)</label>
                                          <select class="form-control" id="durasi" name="durasi_pinjaman">
                                            <option value="10" <?php if($data['durasi_pinjaman'] == '6'){ echo "selected"; } ?>>10</option>
                                            <option value="9" <?php if($data['durasi_pinjaman'] == '9'){ echo "selected"; } ?>>9</option>
                                            <option value="8" <?php if($data['durasi_pinjaman'] == '8'){ echo "selected"; } ?>>8</option>
                                            <option value="7" <?php if($data['durasi_pinjaman'] == '7'){ echo "selected"; } ?>>7</option>
                                            <option value="6" <?php if($data['durasi_pinjaman'] == '6'){ echo "selected"; } ?>>6</option>
                                            <option value="5" <?php if($data['durasi_pinjaman'] == '5'){ echo "selected"; } ?>>5</option>
                                            <option value="4" <?php if($data['durasi_pinjaman'] == '4'){ echo "selected"; } ?>>4</option>
                                            <option value="3" <?php if($data['durasi_pinjaman'] == '3'){ echo "selected"; } ?>>3</option>
                                            <option value="2" <?php if($data['durasi_pinjaman'] == '2'){ echo "selected"; } ?>>2</option>
                                            <option value="1" <?php if($data['durasi_pinjaman'] == '1'){ echo "selected"; } ?>>1</option>
                                          </select>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <input type="hidden" name="id_pinjaman" value="<?= $data['id_pinjaman'] ?>">
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
if($('#jenis').val() == 'barang') {
   $('#barang_show').show();
   $('#uang_show').hide();
} else {
  $('#barang_show').hide();
  $('#uang_show').show();
}
$(function(){
  $('#jenis').on('change',function(){
    if($('#jenis').val() == 'barang') {
       $('#barang_show').show();
       $('#uang_show').hide();
    } else {
      $('#barang_show').hide();
      $('#uang_show').show();
    }
  });
  $('#durasi_show').on('change',function(){
    let jumlah  = $('#jumlah').val();
    let durasi  = $('#durasi').val();
    let cicilan = Math.round(jumlah/durasi);
    $('#bayar').val(cicilan);
  });
  $('#tipe').on('change',function(){
    if($('#tipe').val() == 'cicil') {
       $('#durasi_show').show();
       $('#bayar_show').show();
       let jumlah  = $('#jumlah').val();
       let durasi  = $('#durasi').val();
       let cicilan = Math.round(jumlah/durasi);
       $('#bayar').val(cicilan);
    } else {
      $('#durasi_show').hide();
      $('#bayar_show').hide();
    }
  });
});
$('#barang').change(function(){
    $.ajax({
        url: "<?php echo site_url('pinjaman/harga_barang');?>",
        data: { "id": $("#barang").val() },
        dataType:"json",
        type: "post",
        success: function(data){
         if($('#tipe').val() == 'cicil') {
           let durasi  = $('#durasi').val();
           let cicilan = Math.round(data/durasi);
           $('#jumlah').val(data);
           $('#bayar').val(cicilan);
         }else{
           $('#jumlah').val(data);
         }
        }
    });
});
$('#uang').change(function(){
    var uang    = $('#uang').val();
    var hapusrp = uang.substr(4);
    var hapustitik = hapusrp.split('.').join("");
    var bunga = (15/100)*hapustitik;
    var jumlah = parseInt(hapustitik)+parseInt(bunga);
    if($('#tipe').val() == 'cicil') {
      let durasi  = $('#durasi').val();
      let cicilan = Math.round(jumlah/durasi);
      $('#jumlah').val(jumlah);
      $('#bayar').val(cicilan);
    }else{
      $('#jumlah').val(jumlah);
    }
});

var nominal  = document.getElementById("uang");
nominal.addEventListener("keyup", function(e) {
  // tambahkan 'Rp.' pada saat form di ketik
  // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
  nominal.value = formatRupiah(this.value, "Rp. ");
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}
</script>
