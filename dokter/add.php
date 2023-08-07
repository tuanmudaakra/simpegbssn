<?php
require_once '../auth/cek.php';
require_once 'cekdokter.php';
include_once "../dashboard/header.php"; ?>

<div class="box">
	<h1>Data Pegawai</h1>
	<h4>
		<small>Data Pegawai</small>
		<div class="pull-right">
			<a href="data.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
		</div>
	</h4>
</div>

<div class="row">
	<div class="col-lg-6 col-lg-offset-3">
		<form action="proses.php" method="post">
			<div class="form-group">
				<label for="nama">Nama Pegawai</label>
				<input type="text" name="nama" class="form-control" required id="nama">
			</div>
			<div class="form-group">
				<label for="spesialis">Golongan</label>
				<input type="text" name="spesialis" class="form-control" required id="spesialis">
			</div>
			<div class="form-group">
				<label for="alamat">Jabatan</label><br>
				<textarea name="alamat" id="alamat" cols="86" rows="5"></textarea>
			</div>
			<div class="form-group">
				<label for="no_telp">No.Telepon</label>
				<input type="number" name="no_telp" class="form-control" required id="no_telp">
			</div>
			<div class="form-group pull-right">
				<button type="submit" name="add" class="btn btn-primary">Tambah Pegawai</button>
			</div>
		</form>
	</div>
</div>

<?php include_once "../dashboard/footer.php"; ?>