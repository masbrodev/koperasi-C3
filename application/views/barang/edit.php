<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Form Data Barang
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
                                    <h3 class="box-title">Data Barang</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" enctype="multipart/form-data" method="post" action="<?php echo site_url('barang/actionedit');?>">
                                  <div class="box-body">
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Nama</label>
                                          <input type="text" name="nama_barang" class="form-control" placeholder="Enter Nama Barang" value="<?= $data['nama_barang'] ?>">
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Stock</label>
                                          <input type="number" name="stock_barang" class="form-control" placeholder="Enter Stock Barang" value="<?= $data['stock_barang'] ?>">
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Harga Barang</label>
                                          <input type="text" name="harga_barang" id="nominal" class="form-control" placeholder="Enter Harga Barang" value="Rp. <?= $data['nominal_barang'] ?>">
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Harga Sewa</label>
                                          <input type="text" name="sewa_barang" id="sewa" class="form-control" placeholder="Enter Harga Barang" value="Rp. <?= $data['sewa_barang'] ?>">
                                      </div>
                                  </div><!-- /.box-body -->

                                  <div class="box-footer">
                                      <input type="hidden" name="id" value="<?php echo $data['id_barang'];?>">
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
