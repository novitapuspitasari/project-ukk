```php
<?php
// proses_simpan_transaksi.php

session_start();

include 'includes/cek_session.php';
include 'config/koneksi.php';

// Cek apakah keranjang benar-benar ada dan memiliki isi
if (!isset($_SESSION['keranjang']) || !is_array($_SESSION['keranjang']) || count($_SESSION['keranjang']) == 0) {
    $_SESSION['pesan_error'] = 'Keranjang masih kosong!';
    header('Location: transaksi.php');
    exit;
}

$id_kasir = $_SESSION['id_user'];
$no_transaksi = 'TRX-' . date('YmdHis');
$tanggal = date('Y-m-d H:i:s');

$total = 0;

// Hitung total transaksi
foreach ($_SESSION['keranjang'] as $item) {
    $total += $item['subtotal'];
}

// Simpan transaksi utama
$sql = "INSERT INTO tbl_transaksi 
        (no_transaksi, tanggal, id_kasir, id_pelanggan, total_bayar)
        VALUES 
        ('$no_transaksi', '$tanggal', '$id_kasir', NULL, '$total')";

mysqli_query($koneksi, $sql);

// Ambil ID transaksi
$id_transaksi = mysqli_insert_id($koneksi);

// Simpan detail transaksi dan kurangi stok
foreach ($_SESSION['keranjang'] as $id_barang => $item) {

    $jumlah = $item['jumlah'];
    $subtotal = $item['subtotal'];

    // Simpan detail transaksi
    $detail = "INSERT INTO tbl_detail_transaksi 
               (id_transaksi, id_barang, jumlah, subtotal)
               VALUES 
               ('$id_transaksi', '$id_barang', '$jumlah', '$subtotal')";

    mysqli_query($koneksi, $detail);

    // Kurangi stok barang
    $update_stok = "UPDATE tbl_barang 
                    SET stok = stok - $jumlah 
                    WHERE id_barang = '$id_barang'";

    mysqli_query($koneksi, $update_stok);
}

// Simpan aktivitas ke log
$waktu = date('Y-m-d H:i:s');
$aktivitas = "Transaksi: $no_transaksi";

$log = "INSERT INTO tbl_log 
        (id_user, aktivitas, waktu)
        VALUES 
        ('$id_kasir', '$aktivitas', '$waktu')";

mysqli_query($koneksi, $log);

// Kosongkan keranjang setelah transaksi berhasil
unset($_SESSION['keranjang']);

// Kembali ke riwayat transaksi
header('Location: riwayat_transaksi.php');
exit;
?>
