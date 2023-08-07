<?php
require_once('../auth/cek.php');
require_once 'cekdokter.php';
include_once "../dashboard/header.php";

$id = @$_GET['id'];
$stmt = $conn->prepare("SELECT * FROM tb_dokter WHERE id_pegawai = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="box">
	<h1>Data Pegawai</h1>
	<h4>
		<small>Edit Data Pegawai</small>
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
				<input type="hidden" name="id" value="<?= $data['id_pegawai']; ?>">
				<input type="text" name="nama" class="form-control" required id="nama" value="<?= $data['nama_pegawai']; ?>">
			</div>
			<div class="form-group">
				<label for="golongan">Golongan</label>
				<input type="text" name="golongan" class="form-control" required id="golongan" value="<?= $data['golongan']; ?>">
			</div>
			<div class="form-group">
				<label for="Jabatan">Jabatan</label><br>
				<textarea name="Jabatan" id="Jabatan" cols="86" rows="5"><?= $data['Jabatan']; ?></textarea>
			</div>
			<div class="form-group">
				<label for="no_telp">No.Telepon</label>
				<input type="number" name="no_telp" class="form-control" required id="no_telp" value="<?= $data['no_telp']; ?>">
			</div>
			<div class="form-group pull-right">
				<button type="submit" name="edit" class="btn btn-primary">Edit Pegawai</button>
			</div>
		</form>
	</div>
</div>

<?php include_once "../dashboard/footer.php"; ?>