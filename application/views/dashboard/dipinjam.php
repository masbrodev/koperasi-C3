<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      $date = date_create($data[0]['tanggal_pinjaman']);
    ?>
    <h2 align="center">Laporan Pinjaman BUMDes (<?php echo date_format($date,"Y-m"); ?>)</h2>
    <table width="100%" style="border: 1px solid black;">
          <thead>
               <tr>
                    <th style="border: 1px solid black;">No. Pinjaman</th>
                    <th style="border: 1px solid black;">Nama Peminjam</th>
                    <th style="border: 1px solid black;">Jenis Pinjaman</th>
                    <th style="border: 1px solid black;">Pinjaman</th>
                    <th style="border: 1px solid black;">Durasi Pinjaman</th>
                    <th style="border: 1px solid black;">Cicilan Perbulan</th>
                    <th style="border: 1px solid black;">Tanggal Pinjam</th>
               </tr>
          </thead>
          <tbody>
               <?php $i=1; foreach($data as $a) { $pinjam = date_create($a['tanggal_pinjaman']);?>
               <tr style="text-align: center">
                    <td style="border: 1px solid black;">#<?php echo $a['nomor_pinjaman']; ?></td>
                    <td style="border: 1px solid black;"><?php echo $a['nama_pelanggan']; ?></td>
                    <td style="border: 1px solid black;"><?php echo $a['jenis_pinjaman']; ?></td>
                    <?php if(!empty($a['barang_pinjaman'])){ ?>
                    <td style="border: 1px solid black;"><?php echo $a['nama_barang']; ?></td>
                    <?php }else{ ?>
                    <td style="border: 1px solid black;"><?php echo $a['uang_pinjaman']; ?></td>
                    <?php } ?>
                    <td style="border: 1px solid black;"><?php echo $a['durasi_pinjaman']; ?> Bulan</td>
                    <td style="border: 1px solid black;">Rp. <?php echo number_format($a['cicilan_pinjaman']) ?></td>
                    <td style="border: 1px solid black;"><?php echo date_format($pinjam,"d-m-Y"); ?></td>
               </tr>
               <?php $i++; } ?>
          </tbody>
     </table>
  </body>
</html>
