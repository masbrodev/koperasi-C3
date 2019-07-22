<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DATA PASIEN
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">DATA PASIEN</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">PASIEN</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div style='padding-bottom:10px'>
                    <a href="<?php echo site_url('pasien/add');?>"><button type="button" class="btn btn-info">Add</button></a>
                </div>
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Umur</th>
                  <th>Id Ktp</th>
                  <th>Jenis Sakit</th>
                  <th>Jalan/Inap</th>
                  <th>Tgl Masuk</th>
                  <th>Tgl Keluar</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
                    <td>1</td>
                    <td>Ahmad</td>
                    <td>Gending</td>
                    <td>23 tahun</td>
                    <td>2169162639219199</td>
                    <td>Mual</td>
                    <td>Jalan</td>
                    <td>21 Juli 2019</td>
                    <td>21 Juli 2019</td>
                    <td>
                      <i title="change password" class="fa fa-key"></i>
                      <i title="edit" class="fa fa-edit"></i>
                      <i title="delete" class="fa fa-trash"></i>
                    </td>
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
