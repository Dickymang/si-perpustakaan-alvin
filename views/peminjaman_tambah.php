<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Tambah Data Peminjaman</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="perpustakaan" class="col-sm-3 control-label">Perpustakaan</label>
                               <div class="col-sm-2 col-xs-9">
                                <select name="perpustakaan" class="form-control">
                                    <option value="SMK SPP N ASAHAN">SMK SPP N ASAHAN</option>
                                </select>
                            </div>
                        </div>
						 <div class="form-group">
                            <label for="no_rak" class="col-sm-3 control-label">Nomor Rak</label>
                            <div class="col-sm-9">
                                <input type="text" name="no_rak" class="form-control" id="inputEmail3" placeholder="Inputkan Nomor Rak atau Lemari" required>
                            </div>
                        </div>
						 <div class="form-group">
                            <label for="nama_buku" class="col-sm-3 control-label">Nama Buku</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_buku" class="form-control" id="inputEmail3" placeholder="Inputkan Nama Buku" required>
                            </div>
                        </div>
						 <div class="form-group">
                            <label for="tgl_pinjam" class="col-sm-3 control-label">Tanggal Pinjam</label>
                            <div class="col-sm-9">
                                <input type="text" name="tgl_pinjam" class="form-control" id="inputEmail3" placeholder="Inputkan Tanggal Pinjam" required>
                            </div>
                        </div>
						 <div class="form-group">
                            <label for="peminjam" class="col-sm-3 control-label">peminjam</label>
                            <div class="col-sm-9">
                                <input type="text" name="peminjam" class="form-control" id="inputEmail3" placeholder="Inputkan Nama Peminjam" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="petugas_perpus" class="col-sm-3 control-label">Petugas Perpustakaan</label>
                            <div class="col-sm-9">
                                <input type="text" name="petugas_perpus"class="form-control" id="inputEmail3" placeholder="Inputkan Petugas Perpustakaan" required>
                            </div>
                        </div>
                        </div>

                        <!--Status-->

                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-2 col-xs-9">
								<select name="status" class="form-control">
									<option value="Ada">Ada</option>
									<option value="Dipinjam">Dipinjam</option>
									<option value="Penghapusan">Penghapusan</option>
								</select>
                            </div>
                        </div>
                        <!--Akhir Status-->

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Data</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=peminjaman&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Peminjaman
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
if($_POST){
    //Ambil data dari form
  $perpustakaan=$_POST['perpustakaan'];
	$no_rak=$_POST['no_rak'];
	$nama_buku=$_POST['nama_buku'];
	$tgl_Pinjam=$_POST['tgl_pinjam'];
  $peminjam=$_POST['peminjam'];
	$petugas_perpus=$_POST['petugas_perpus'];
  $status=$_POST['status'];
    //buat sql
    $sql="INSERT INTO peminjaman VALUES ('','$perpustakaan','$no_rak','$nama_buku','$tgl_Pinjam','$peminjam','$petugas_perpus','$status')";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan Data Error");
    if ($query){
        echo "<script>window.location.assign('?page=peminjaman&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }

?>
