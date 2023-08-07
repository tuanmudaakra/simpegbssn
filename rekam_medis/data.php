<?php
require_once '../auth/cek.php';
require_once "../dashboard/header.php";
require_once "../config/koneksi.php";
require_once 'cekrekam.php';
?>

<div class="box">
	<h1>Rekam Medis</h1>
	<h4>
		<div class="pull-right">
			<a href="" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i></a>
			<a href="add.php" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>Tambah Rekam Medis</a>
		</div>
	</h4>
	<div class="table-responsive" style="margin-top: 70px;">
		<table class="table table-hover table-striped table-bordered" id="rekammedis">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Pegawai</th>
					<th>Kantor</th>
					<th>Gaji</th>
					<th><i class="glyphicon glyphicon-cog"></i></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				$query = "SELECT * FROM tb_rekammedis
		INNER JOIN tb_dokter ON tb_rekammedis.id_dokter = tb_dokter.id_pegawai
		INNER JOIN tb_poliklinik ON tb_rekammedis.id_poli = tb_poliklinik.id_kantor
	";

				try {
					$stmt = $conn->prepare($query);
					$stmt->execute();
					$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

					foreach ($result as $data) {
				?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $data['nama_pegawai']; ?></td>
							<td><?= $data['nama_kantor']; ?></td>
							<td>Rp<?= $data['obat']; ?></td>
							<td>
								<form action="del.php" method="post">
									<input type="hidden" name="id" value="<?= $data['id_rm']; ?>">
									<button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Yakin?')">
										<i class="glyphicon glyphicon-trash"></i>
									</button>
								</form>
							</td>
						</tr>
				<?php
					}
				} catch (PDOException $e) {
					echo "Error: " . $e->getMessage();
				}
				?>
			</tbody>
		</table>
	</div>
	<script src="<?= base_url(); ?>assets/js/jquery.js"></script>
	<script>
		$(document).ready(function() {
			$('#rekammedis').DataTable({
				columnDefs: [{
					"searchable": false,
					"orderable": false,
					"targets": 8
				}],
				"order": [1, "desc"]

			});
		});
	</script>
</div>
<?php include_once "../dashboard/footer.php"; ?>