<?php
$id=$_GET['id'];
$ambil=  mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE id ='$id'") or die ("SQL Edit error");
$data= mysqli_fetch_array($ambil);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Update Data Peminjaman</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="perpustakaan" class="col-sm-3 control-label">perpustakaan</label>
                            <div class="col-sm-2 col-xs-9">
                                <select name="perpustakaan" class="form-control">
                                    <option value="SMK SPP N ASAHAN">SMK SPP N ASAHAN</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_rak" class="col-sm-3 control-label">Nomor Rak</label>
                            <div class="col-sm-9">
                                <input type="text" name="no_rak" value="<?=$data['no_rak']?>"class="form-control" id="inputEmail3" placeholder="Nomor Rak">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="nama_buku" class="col-sm-3 control-label">Nama Buku</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_buku" value="<?=$data['nama_buku']?>"class="form-control" id="inputEmail3" placeholder="Nama Buku">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="tgl_pinjam" class="col-sm-3 control-label">Tanggal Pinjam</label>
                            <div class="col-sm-9">
                                <input type="text" name="tgl_pinjam" value="<?=$data['tgl_pinjam']?>"class="form-control" id="inputEmail3" placeholder="Tanggal Pinjam">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="peminjam" class="col-sm-3 control-label">Peminjam</label>
                            <div class="col-sm-9">
                                <input type="text" name="peminjam" value="<?=$data['peminjam']?>"class="form-control" id="inputEmail3" placeholder="Peminjam">
                            </div>
                        </div>
							<div class="form-group">
                            <label for="Petugas_perpus" class="col-sm-3 control-label">Petugas Perpus</label>
                            <div class="col-sm-9">
                                <input type="text" name="petugas_perpus" value="<?=$data['petugas_perpus']?>"class="form-control" id="inputEmail3" placeholder="Petugas Perpus" >
                            </div>
                        </div>
                        <!--untuk tanggal lahir form tahun-bulan-tanggal 1998-10-10-->
                        <div class="form-group">


                            <label class="col-sm-3 control-label">Tanggal pinjam</label>
                            <!--untu tahun-->
                            <div class="col-sm-2 col-xs-9">
                                <select name="tahun" class="form-control">
                                    <?php for($i=2017;$i>1980;$i--) {?>
                                    <option value="<?=$i?>"> <?=$i?> </option>
                                    <?php }?>
                                    
                                </select>

                            </div>
                            <!--Untuk Bulan-->
                            <div class="col-sm-2 col-xs-9">
                                <select name="bulan" class="form-control">
                                    <?php 
                                    $bulan=  array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                    for($j=12;$j>0;$j--) {?>
                                    <option value="<?=$j?>"> <?=$bulan[$j]?> </option>
                                    <?php }?>
                                    
                                </select>

                            </div>
                            <!--Untuk Tanggal-->
                            <div class="col-sm-2 col-xs-9">
                                <select name="tanggal" class="form-control">
                                    <?php for($k=31;$k>0;$k--) {?>
                                    <option value="<?=$k?>"> <?=$k?> </option>
                                    <?php }?>
                                    
                                </select>

                            </div>

                        </div>
                        <!--end tanggal lahir-->           

                        <div class="form-group">
                            <label for="peminjam" class="col-sm-3 control-label">Peminjam Buku</label>
                            <div class="col-sm-9">
                                <input type="text" name="peminjam" value="<?=$data['peminjam']?>" class="form-control" id="inputPassword3" placeholder="Peminjam Buku">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="petugas_perpus" class="col-sm-3 control-label">Petugas Perpus</label>
                            <div class="col-sm-9">
                                <input type="text" name="petugas_perpus" value="<?=$data['petugas_perpus']?>" class="form-control" id="inputPassword3" placeholder="Petugas Perpus">
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
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-edit"></span> Update Data Peminjaman</button>
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
    $tgl_pinjam=$_POST['tahun']."_".$_POST['bulan']."_".$_POST['tanggal'];
    $peminjam=$_POST['peminjam'];
	$petugas_perpus=$_POST['petugas_perpus '];
    $status=$_POST['status'];
    //buat sql
    $sql="UPDATE peminjaman SET perpustakaan='$perpustakaan',no_rak='$no_rak',nama_buku='$nama_buku',
	tgl_pinjam='$tgl_pinjam',peminjam='$peminjam',petugas_perpus='$petugas_perpus',status='$status' WHERE id ='$id'"; 
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Edit MHS Error");
    if ($query){
        echo "<script>window.location.assign('?page=peminjaman&actions=tampil');</script>";
    }else{
        echo "<script>alert('Edit Data Gagal');<script>";
    }
    }

?>



