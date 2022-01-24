<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail Peminjaman</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail peminjaman-->
                    <?php
                    $sql = "SELECT *FROM peminjaman WHERE id ='" . $_GET ['id'] . "'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die("SQL Detail error");
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>   

                    <!--dalam tabel--->
                    <table class="table table-bordered table-striped table-hover"> 
                        <tr>
                            <td width="200">Perpustakaan</td> <td><?= $data['perpustakaan'] ?></td>
                        </tr>
                        <tr>
                            <td>Nomor Rak</td> <td><?= $data['no_rak'] ?></td>
                        </tr>
                        <tr>
                            <td>Nama Buku</td> <td><?= $data['nama_buku'] ?></td>
                        </tr>
						<tr>
                            <td>Tanggal Pinjam</td> <td><?= $data['tgl_pinjam'] ?></td>
                        </tr>
                        <tr>
                            <td>Peminjam</td> <td><?= $data['peminjam'] ?></td>
                        </tr>
                        <tr>
                            <td>Petugas Perpus</td> <td><?= $data['petugas_perpus'] ?></td>
                        </tr>
						<tr>
                            <td>Status</td> <td><?= $data['status'] ?></td>
                        </tr>
                    </table>
				
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=peminjaman&actions=tampil" class="btn btn-success btn-sm">
                        Kembali ke Data Arsip </a>

                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>

