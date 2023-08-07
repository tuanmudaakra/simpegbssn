<?php
require_once '../auth/cek.php';
require_once "../config/koneksi.php";
require_once 'cekrekam.php';
include_once "../dashboard/header.php";


use Ramsey\Uuid\Uuid;
?>

<div class="box">
	<h1>Data Rekam Medis</h1>
	<h4>
		<small>Data Rekam Medis</small>
		<div class="pull-right">
			<a href="data.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
		</div>
	</h4>
</div>

<div class="row">
	<div class="col-lg-6 col-lg-offset-3">
		<form action="add.php" method="post">
			<input type="hidden" name="golongan" id="golongan" value="">
			<div class="form-group">
				<label for="dokter">Pegawai</label>
				<select name="dokter" id="dokter" class="form-control" required>
					<option value="">-- Pilih --</option>
					<?php
					$stmt_dokter = $conn->prepare("SELECT * FROM tb_dokter");
					$stmt_dokter->execute();
					$result_dokter = $stmt_dokter->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result_dokter as $data_dokter) {
						echo '<option value="' . $data_dokter['id_pegawai'] . '" data-golongan="' . $data_dokter['golongan'] . '">' . $data_dokter['nama_pegawai'] . '</option>';
					}
					?>
					<script>
						// Script untuk menambahkan nilai golongan ke hidden field saat memilih pegawai
						document.getElementById('dokter').addEventListener('change', function() {
							var selectedOption = this.options[this.selectedIndex];
							var golongan = selectedOption.getAttribute('data-ygolongan');
							document.getElementById('golongan').value = golongan;
						});
					</script>
				</select>
			</div>

			<div class="form-group">
				<label for="poli">Kantor</label>
				<select name="poli" id="poli" class="form-control" required>
					<option value="">-- Pilih --</option>
					<?php
					$stmt_poli = $conn->prepare("SELECT * FROM tb_poliklinik ORDER BY nama_kantor DESC");
					$stmt_poli->execute();
					$result_poli = $stmt_poli->fetchAll(PDO::FETCH_ASSOC);
					foreach ($result_poli as $data_poli) {
						echo '<option value="' . $data_poli['id_kantor'] . '">' . $data_poli['nama_kantor'] . '</option>';
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="diagnosa">Gaji</label><br>
				<input type="text" name="obat" class="form-control" required id="obat">
			</div>

			<div class="form-group pull-right">
				<button type="submit" name="add" class="btn btn-primary">Tambah Data</button>
				<button type="reset" name="reset" class="btn btn-secondary">Reset</button>
			</div>
		</form>
	</div>
</div>

<?php include_once "../dashboard/footer.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$dokter = $_POST['dokter'];
	$diagnosa = $_POST['golongan'];
	$poli = $_POST['poli'];
	$obat = $_POST['obat'];

	try {
		$stmt = $conn->prepare("INSERT INTO tb_rekammedis (id_rm, id_dokter, diagnosa, id_poli, obat) VALUES (:id_rm, :id_dokter, :diagnosa, :id_poli, :obat)");
		$uuid = Uuid::uuid4()->toString();
		$stmt->bindParam(':id_rm', $uuid);
		$stmt->bindParam(':id_dokter', $dokter);
		$stmt->bindParam(':diagnosa', $diagnosa);
		$stmt->bindParam(':id_poli', $poli);
		$stmt->bindParam(':obat', $obat);
		if ($stmt->execute()) {
			echo "<script>alert('Data Berhasil Ditambahkan.');window.location='data.php';</script>";
		} else {
			echo "<script>alert('Gagal menambahkan data.');</script>";
		}
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
}
?>?>