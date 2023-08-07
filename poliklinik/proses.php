<?php
require_once '../auth/cek.php';
require_once "../config/koneksi.php";
require_once "../assets/libs/vendor/autoload.php";
require_once 'cekpoli.php';

use Ramsey\Uuid\Uuid;

if (isset($_POST['add'])) {
    $total = $_POST['total'];
    try {
        $stmt = $conn->prepare("INSERT INTO tb_poliklinik (id_kantor, nama_kantor, jumlah_pegawai) VALUES (:id_kantor, :nama_kantor, :jumlah_pegawai)");

        for ($i = 1; $i <= $total; $i++) {
            $uuid = htmlspecialchars(Uuid::uuid4()->toString());
            $nama = trim(htmlspecialchars($_POST['nama-' . $i]));
            $gedung = trim(htmlspecialchars($_POST['jumlah_pegawai-' . $i]));

            $stmt->bindParam(':id_kantor', $uuid);
            $stmt->bindParam(':nama_kantor', $nama);
            $stmt->execute();
        }

        echo "<script>alert('" . htmlspecialchars($total) . " data berhasil ditambahkan.');window.location='data.php';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Gagal menambahkan data.');window.location='generate.php';</script>";
    }
} else if (isset($_POST['edit'])) {
    try {
        $stmt = $conn->prepare("UPDATE tb_poliklinik SET nama_kantor = :nama_kantor, jumlah_pegawai = :jumlah_pegawai WHERE id_kantor = :id_kantor");

        for ($i = 0; $i < count($_POST['id']); $i++) {
            $id = htmlspecialchars($_POST['id'][$i]);
            $nama = htmlspecialchars($_POST['nama_pegawai'][$i]);
            $gedung = htmlspecialchars($_POST['jumlah_pegawai'][$i]);

            $stmt->bindParam(':id_kantor', $id);
            $stmt->bindParam(':nama_kantor', $nama);
            $stmt->bindParam(':jumlah_pegawai', $gedung);

            $stmt->execute();
        }

        echo "<script>alert('Data berhasil diubah.');window.location='data.php';</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Data gagal diubah.');window.location='data.php';</script>";
    }
}
