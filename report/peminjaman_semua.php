<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Semua Peminjaman</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>  
    <body onload="print()">
        <!--Menampilkan data detail peminjaman-->
        <?php
        include '../config/koneksi.php';
        ?>   

        <div class="container">
            <div class='row'>
                <div class="col-sm-12">
                    <!--dalam tabel--->
                    <div class="text-center">
                        <h2>Sistem Informasi Perpustakaan SMK SPP NEGERI ASAHAN </h2>
                        <h4>Jalan Besar Rawang Pasar 5 <br> Rawang Panca Arga, Kabupaten Asahan, Sumatera Utara, 21264</h4>
                        <hr>
                        <h3>DATA SELURUH PEMINJAMAN</h3>
                        <table class="table table-bordered table-striped table-hover"> 
                        <tbody>
                                <thead>
								<tr>
                                <th>No.</th><th width="18%">Perpustakaan</th><th>Nomor Rak</th><th width="14%"><center>Nomor <br> (Nama Buku)</center></th><th width="15%"><center>Nama Peminjam</center></th><th width="10%">Tgl. Pinjam</th><th><center>Petugas Perpus</center></th>
								</tr>
								</thead>
							<tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = "SELECT * FROM peminjaman";
                            $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                            //Baca hasil query dari databse, gunakan perulangan untuk 
                            //Menampilkan data lebh dari satu. disini akan digunakan
                            //while dan fungdi mysqli_fecth_array
                            //Membuat variabel untuk menampilkan nomor urut
                            $nomor = 0;
                            //Melakukan perulangan u/menampilkan data
                            while ($data = mysqli_fetch_array($query)) {
                                $nomor++; //Penambahan satu untuk nilai var nomor
                                ?>
                                <tr>
                                <td><?= $nomor ?></td>
									<td><?= $data['perpustakaan'] ?></td>
                                    <td><?= $data['no_rak'] ?></td>
                                    <td><?= $data['nama_buku'] ?></td>
                                    <td><?= $data['peminjam'] ?></td>
									<td><?= $data['tgl_pinjam'] ?></td>
									<td><?= $data['petugas_perpus'] ?></td>
                                </tr>
                                <!--Tutup Perulangan data-->
                            <?php } ?>
							</tbody>
                        </tbody>
                            <tfoot> 
                                <tr>
                                    <td colspan="8" class="text-right">
                                        Rawang  <?= date("d-m-Y") ?>
                                        <br><br><br><br>
                                        <u>Kepala Sekolah<strong></u><br>
                                        NIP.102871291416712
									</td>
								</tr>
							</tfoot> 
                        </table>
                    </div>
                </div>
            </div>
    </body>
</html>