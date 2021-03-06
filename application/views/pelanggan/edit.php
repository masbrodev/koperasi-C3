<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Data Anggota
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
                                    <h3 class="box-title">Data Anggota</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo site_url('pelanggan/actionedit');?>">
                                  <div class="box-body">
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Nama</label>
                                          <input type="text" name="nama_pelanggan" class="form-control" placeholder="Enter Nama Pelanggan" value="<?= $data['nama_pelanggan'] ?>">
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">NIK</label>
                                          <input type="text" name="nik_pelanggan" class="form-control" placeholder="Enter NIK Pelanggan" value="<?= $data['nik_pelanggan'] ?>">
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Alamat</label>
                                          <textarea name="alamat_pelanggan" id="editor1"><?= $data['alamat_pelanggan'] ?></textarea>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Pekerjaan</label>
                                        <input type="text" name="pekerjaan_pelanggan" class="form-control" placeholder="Enter Pekerjaan Pelanggan" value="<?= $data['pekerjaan_pelanggan'] ?>">
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Status</label>
                                        <select class="form-control" name="status_pelanggan">
                                          <option value="0" <?php if ($data['status_pelanggan'] == '0'){ echo "selected"; }?>>BERSIH</option>
                                          <option value="1" <?php if ($data['status_pelanggan'] == '1'){ echo "selected"; }?>>BLOCK</option>
                                        </select>
                                      </div>
                                  </div><!-- /.box-body -->

                                  <div class="box-footer">
                                      <input type="hidden" name="id" value="<?php echo $data['id_pelanggan'];?>">
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
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
