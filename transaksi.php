
<?php
// transaksi.php

include 'includes/cek_session.php';
include 'config/koneksi.php';

if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = array();
}

$daftar_barang = mysqli_query(
    $koneksi,
    "SELECT * FROM tbl_barang WHERE stok > 0"
);

$total = 0;

foreach ($_SESSION['keranjang'] as $item) {
    $total += $item['subtotal'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaksi - SellManage</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #dbeafe, #fce7f3);
            min-height: 100vh;
            padding: 30px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        h1 {
            text-align: center;
            color: #2563eb;
            margin-bottom: 30px;
        }

        h3 {
            color: #db2777;
            margin-top: 25px;
        }

        .pesan-error {
            background: #fee2e2;
            color: #b91c1c;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .form-barang {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
        }

        select,
        input[type="number"] {
            padding: 10px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            outline: none;
        }

        select {
            min-width: 300px;
        }

        select:focus,
        input[type="number"]:focus {
            border-color: #2563eb;
        }

        input[type="submit"] {
            padding: 10px 18px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(90deg, #2563eb, #ec4899);
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            opacity: 0.9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            overflow: hidden;
            border-radius: 10px;
        }

        th {
            background: linear-gradient(90deg, #2563eb, #ec4899);
            color: white;
            padding: 12px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #e5e7eb;
            text-align: center;
        }

        tr:hover {
            background: #fdf2f8;
        }

        .hapus {
            color: #ec4899;
            text-decoration: none;
            font-weight: bold;
        }

        .hapus:hover {
            color: #be185d;
        }

        .total {
            font-weight: bold;
            color: #2563eb;
            background: #eff6ff;
        }

        .simpan {
            margin-top: 20px;
            text-align: right;
        }

        .simpan input {
            padding: 12px 25px;
            font-size: 15px;
        }

        .dashboard {
            display: inline-block;
            margin-top: 20px;
            color: #2563eb;
            text-decoration: none;
            font-weight: bold;
        }

        .dashboard:hover {
            color: #db2777;
        }

        @media (max-width: 700px) {
            body {
                padding: 15px;
            }

            .container {
                padding: 20px;
            }

            .form-barang {
                flex-direction: column;
                align-items: stretch;
            }

            select,
            input[type="number"],
            .form-barang input[type="submit"] {
                width: 100%;
            }

            table {
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Transaksi Penjualan SellManage</h1>

    <?php
    if (isset($_SESSION['pesan_error'])) {
        echo '<div class="pesan-error">' . $_SESSION['pesan_error'] . '</div>';
        unset($_SESSION['pesan_error']);
    }
    ?>

    <h3>Pilih Barang</h3>

    <form action="proses_tambah_keranjang.php" method="POST" class="form-barang">

        <select name="id_barang" required>
            <?php while ($b = mysqli_fetch_assoc($daftar_barang)) { ?>

                <option value="<?php echo $b['id_barang']; ?>">
                    <?php
                    echo $b['nama_barang'] . ' (stok: ' . $b['stok'] . ')';
                    ?>
                </option>

            <?php } ?>
        </select>

        <input
            type="number"
            name="jumlah"
            min="1"
            required
            placeholder="Jumlah"
        >

        <input
            type="submit"
            value="Tambah ke Keranjang"
        >

    </form>

    <h3>Keranjang</h3>

    <table border="1" cellpadding="6">

        <tr>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($_SESSION['keranjang'] as $id_barang => $item) { ?>

            <tr>
                <td>
                    <?php echo $item['nama_barang']; ?>
                </td>

                <td>
                    Rp <?php echo number_format($item['harga'], 0, ',', '.'); ?>
                </td>

                <td>
                    <?php echo $item['jumlah']; ?>
                </td>

                <td>
                    Rp <?php echo number_format($item['subtotal'], 0, ',', '.'); ?>
                </td>

                <td>
                    <a
                        href="hapus_keranjang.php?id=<?php echo $id_barang; ?>"
                        class="hapus"
                        onclick="return confirm('Yakin ingin menghapus barang ini dari keranjang?');"
                    >
                        Hapus
                    </a>
                </td>
            </tr>

        <?php } ?>

        <tr class="total">
            <td colspan="3">Total</td>

            <td colspan="2">
                Rp <?php echo number_format($total, 0, ',', '.'); ?>
            </td>
        </tr>

    </table>

    <div class="simpan">
        <form action="proses_simpan_transaksi.php" method="POST">
            <input type="submit" value="Simpan Transaksi">
        </form>
    </div>

    <a href="dashboard.php" class="dashboard">
        ← Kembali ke Dashboard
    </a>

</div>

</body>
</html>