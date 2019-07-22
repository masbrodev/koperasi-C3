<?php include_once dirname(__FILE__).'/../layouts/header.php';?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DATA PASIEN INAP
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">DATA PASIEN INAP</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">PASIEN INAP</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div style='padding-bottom:10px'>
                    <a onclick="print()"><button type="button" class="btn btn-info"><i title="download excel" class="fa fa-print"></i></button></a>
                    <a href="<?php echo site_url('inap/add');?>"><button type="button" class="btn btn-info">Add</button></a>
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
                  <th>Ruang</th>
                  <th>Tgl Masuk</th>
                  <th>Tgl Keluar</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($data as $a) {?>
                    <td><?php echo $i ?></td>
                    <td><?php echo $a['nama_pasien'] ?></td>
                    <td><?php echo $a['alamat_pasien'] ?></td>
                    <td><?php echo $a['umur_pasien'] ?> tahun</td>
                    <td><?php echo $a['id_ktp_pasien'] ?></td>
                    <td><?php echo $a['sakit_pasien'] ?></td>
                    <td>Ruang <?php echo $a['tujuan'] ?></td>
                    <td><?php echo date("d-m-Y", strtotime($a['tgl_masuk']) ) ?></td>
                    <?php if($a['tgl_keluar'] == '0000-00-00 00:00:00'){?>
                      <td></td>
                    <?php }else{ ?>
                      <td><?php echo date("d-m-Y", strtotime($a['tgl_keluar']) ) ?></td>
                  <?php } ?>
                    <td>
                      <a href="<?php echo site_url('inap/edit/'.$a['id_pasien']);?>"><i title="edit" class="fa fa-edit"></i></a>
                      <a data-href="<?php echo site_url('inap/actiondelete/'.$a['id_pasien']);?>" data-toggle="modal" data-target="#confirm-delete<?php echo $i;?>" href="#"><i title="delete" class="fa fa-trash"></i></a>

                      <div class="modal fade" id="confirm-delete<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">

                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                      <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                                  </div>

                                  <div class="modal-body">
                                      <p>You are about to delete this data.</p>
                                      <p>Do you want to proceed?</p>
                                      <p class="debug-url"></p>
                                  </div>

                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                      <a href="<?php echo site_url('inap/actiondelete/'.$a['id_pasien'].'/'.$a['tujuan']);?>" class="btn btn-danger danger">Delete</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </td>
                  <?php }$i++ ?>
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
