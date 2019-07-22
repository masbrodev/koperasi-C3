<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Daftar Pasien Rawat Inap
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
                                    <h3 class="box-title">Rawat Inap</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo site_url('inap/actionadd');?>">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Pasien</label>
                                            <input type="text" name="nama_pasien" class="form-control" id="exampleInputUsername1" placeholder="Enter nama pasien">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Alamat Pasien</label><br/>
                                            <textarea class="form-control" name="alamat_pasien" rows="8" cols="80" placeholder="alamat pasien"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Umur Pasien</label>
                                            <input type="number" name="umur_pasien" class="form-control" id="exampleInputEmail1" placeholder="Enter umur pasien">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Id KTP Pasien</label>
                                            <input type="text" name="id_ktp_pasien" class="form-control" id="exampleInputEmail1" onkeypress='validate(event)' placeholder="Enter id KTP pasien">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Sakit Pasien</label>
                                            <input type="text" name="sakit_pasien" class="form-control" id="exampleInputUsername1" placeholder="Enter nama pasien">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Ruang Tujuan</label>
                                            <select class="form-control" name="tujuan">
                                              <?php $ada = count($room);
                                                if($ada != 0){
                                                  foreach ($room as $a) { ?>
                                                    <option value="<?php echo $a['nomor_room'] ?>"><?php echo $a['nomor_room'] ?></option>
                                                <?php ;} }else{ ?>
                                                    <option disabled>no room available</option>
                                                <?php } ?>
                                               ?>
                                            </select>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
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

function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}

function readURL(input) {
if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
        $('#showgambar').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
}
}

$("#inputgambar").change(function () {
readURL(this);
});
</script>
