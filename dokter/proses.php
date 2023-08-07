<?php
require_once('../auth/cek.php');
require_once "../config/koneksi.php";
require_once 'cekdokter.php';
require_once "../assets/libs/vendor/autoload.php";


use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Rfc4122\FieldsInterface;

$uuid = Uuid::uuid4()->toString(); // Mengubah UUID menjadi string

if (isset($_POST['add'])) {
    $uuidObject = Uuid::fromString($uuid);
    $uuidFields = $uuidObject->getFields();
    $uuidVersion = $uuidFields instanceof FieldsInterface ? $uuidFields->getVersion() : null;

    try {
        $stmt = $conn->prepare("INSERT INTO tb_dokter (id_pegawai, nama_pegawai, golongan, Jabatan, no_telp) VALUES (:id_pegawai, :nama_pegawai, :golongan, :Jabatan, :no_telp)");
        $stmt->bindParam(':id_pegawai', $uuid);
        $stmt->bindParam(':nama_pegawai', htmlspecialchars($_POST['nama']));
        $stmt->bindParam(':golongan', htmlspecialchars($_POST['golongan']));
        $stmt->bindParam(':Jabatan', htmlspecialchars($_POST['Jabatan']));
        $stmt->bindParam(':no_telp', htmlspecialchars($_POST['no_telp']));
        $stmt->execute();

        echo "<script>alert('Data Berhasil Ditambahkan!');window.location='data.php';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else if (isset($_POST['edit'])) {
    $id = htmlspecialchars($_POST['id']);
    $nama = trim(htmlspecialchars($_POST['nama']));
    $spesialis = trim(htmlspecialchars($_POST['golongan']));
    $alamat = trim(htmlspecialchars($_POST['Jabatan']));
    $no_telp = trim(htmlspecialchars($_POST['no_telp']));

    try {
        $stmt = $conn->prepare("UPDATE tb_dokter SET nama_pegawai = :nama_pegawai, golongan = :golongan, Jabatan = :Jabatan, no_telp = :no_telp WHERE id_pegawai = :id_pegawai");
        $stmt->bindParam(':nama_pegawai', $nama);
        $stmt->bindParam(':golongan', $spesialis);
        $stmt->bindParam(':Jabatan', $alamat);
        $stmt->bindParam(':no_telp', $no_telp);
        $stmt->bindParam(':id_pegawai', $id);
        $stmt->execute();

        echo "<script>alert('Data Berhasil Diubah!');window.location='data.php';</script>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
