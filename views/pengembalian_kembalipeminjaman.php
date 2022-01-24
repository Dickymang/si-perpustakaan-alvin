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
                    <h3 class="panel-title">Tanggal Kembali Pinjaman Buku</h3>
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
                                <input type="text" name="peminjam" value="<?=$data['peminjam']?>" class="form-control" id="inputEmail3" placeholder="Nama Peminjam" readonly="true">
                            </div>
                        </div>
						
						<div class="form-group">
                            <label for="tgl_pinjam" class="col-sm-3 control-label">Tanggal Pinjam</label>
                            <div class="col-sm-9">
                                <input type="text" name="tgl_pinjam" value="<?=$data['tgl_pinjam']?>" class="form-control" id="inputEmail3" placeholder="Tanggal Pinjam" readonly="true">
                            </div>
                        </div> 
						
						<div class="form-group">
                            <label for="tgl_kembali" class="col-sm-3 control-label">Tanggal Kembali</label>
                            <div class="col-sm-3">
                                <input type="date" name="tgl_kembali" class="form-control" id="inputEmail3" placeholder="Tanggal Kembali">
                            </div>
                        </div> 
						
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Tanggal</button>
								<a href="?page=pengembalian&actions=tampil" class="btn btn-danger"><span class="fa fa-ban"></span> Batal</a>
                            </div>
                        </div>
                    </form>


                </div>
            </div>

        </div>
    </div>
</div>

<?php 
if($_POST){
    //Ambil data dari form
	$tglPinjam =$_POST['tgl_pinjam'];
		$potTgl = substr($tgl_pinjam,8,2);
		$potBln = substr($tgl_pinjam,5,2);
		$potThn = substr($tgl_pinjam,0,4);
	$tglKembali=$_POST['tgl_kembali'];
		$potTglKem = substr($tgl_kembali,8,2);
		$potBlnKem = substr($tgl_kembali,5,2);
		$potThnKem = substr($tgl_kembali,0,4);
	$lamapinjam = (($potThnKem - $potThn)*360)+(($potBlnKem - $potBln)*30)+($potTglKem - $potTgl);
    //buat sql
    $sql="UPDATE pengembalian SET tgl_pinjam='$tgl_pinjam', tgl_kembali='$tgl_kembali', lama_pinjam='$lama_pinjam' WHERE nama_buku='$nope'";
	$sqlpengembalian="UPDATE pengembalian SET status='Ada' WHERE nama_buku='$nope'";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan pengembalian Error");
	$querypengembalian=  mysqli_query($koneksi, $sqlpengembalian) or die ("SQL Simpan pengembalian Error");
    if ($query){
        echo "<script>window.location.assign('?page=pengembalian&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }

?>