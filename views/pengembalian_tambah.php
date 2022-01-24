<?php
$nope=$_GET['nope'];
$ambil=  mysqli_query($koneksi, "SELECT * FROM pengembalian WHERE nama_buku ='$nope'") or die ("SQL Edit error");
$data= mysqli_fetch_array($ambil);
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Data Pengembalian</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="nama_buku" class="col-sm-3 control-label">Nama Buku</label>
                            <div class="col-sm-9">
								<input type="text" name="nama_buku" value="<?=$data['nama_buku']?>" class="form-control" id="inputEmail3" placeholder="Nama Buku" readonly="true">
                            </div>
                        </div>

						<div class="form-group">
                            <label for="peminjam" class="col-sm-3 control-label">Nama Peminjam</label>
                            <div class="col-sm-9">
                                <input type="text" name="peminjam" class="form-control" id="inputEmail3" placeholder="Peminjam">
                            </div>
                        </div>

						<div class="form-group">
                            <label for="tgl_pinjam" class="col-sm-3 control-label">Tanggal Pinjam</label>
                            <div class="col-sm-3">
                                <input type="date" name="tgl_pinjam" class="form-control" id="inputEmail3" placeholder="Tanggal Pinjam">
                            </div>
                        </div>

						 <div class="form-group">
                            <label for="tgl_kembali" class="col-sm-3 control-label">Tanggal Kembali</label>
                            <div class="col-sm-9">
                                <input type="text" name="tgl_kembali" class="form-control" id="inputEmail3" placeholder="Keterangan">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Pengembalian</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=pengembalian&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Pengembalian
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
if($_POST){
    //Ambil data dari form
    $nama_buku=$_POST['nama_buku'];
	$peminjam=$_POST['peminjam'];
	$tgl_pinjam=$_POST['tgl_pinjam'];
    //buat sql
    $sql="INSERT INTO pengembalian VALUES ('$nama_buku','$peminjam','$tgl_pinjam','Belum Kembali','','')";
	$sqlArsip="UPDATE pengembalian SET status='Dipinjam' WHERE no_perkara='$nope'";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan Pengembalian Error");
	$queryArsip=  mysqli_query($koneksi, $sqlArsip) or die ("SQL Simpan Data Error");
    if ($query){
        echo "<script>window.location.assign('?page=pengembalian&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }

?>
