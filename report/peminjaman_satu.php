<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Peminjaman</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>  
    <body onload="print()">
        <!--Menampilkan data detail arsip-->
        <?php
        include '../config/koneksi.php';
        $sql = "SELECT * FROM peminjaman WHERE id='" . $_GET ['id'] . "'";
        //proses query ke database
        $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
        //Merubaha data hasil query kedalam bentuk array
        $data = mysqli_fetch_array($query);
        ?>   

        <div class="container">
            <div class='row'>
                <div class="col-sm-12">
                    <!--dalam tabel--->
                    <div class="text-center">
                        <h2>Sistem Informasi Perpustakaan SMK SPP NEGERI ASAHAN </h2>
                        <h4>Jalan Besar Rawang Pasar 5 <br> Rawang Panca Arga, Kabupaten Asahan, Sumatera Utara, 21264</h4>
                        <hr>
                        <h3>DATA PEMINJAMAN</h3>
                        <table class="table table-bordered table-striped table-hover"> 
                            <tbody>
								<tr>
                                    <td>Perpustakaan</td> <td><?= $data['perpustakaan'] ?></td>
                                </tr>
                                <tr>
                                    <td width="200">Nomor Rak</td> <td><?= $data['no_rak'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor (Nama Buku)</td> <td><strong><?= $data['nama_buku'] ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Peminjam</td> <td><?= $data['peminjam'] ?></td>
                                </tr>
								<tr>
                                    <td>Tanggal Pinjam</td> <td><?= $data['tgl_pinjam'] ?></td>
                                </tr>
								<tr>
                                    <td>Petugas Perpus</td> <td><?= $data['petugas_perpus'] ?></td>
                                </tr>
                            </tbody>
                            <tfoot> 
                                <tr>
                                    <td colspan="2" class="text-right">
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