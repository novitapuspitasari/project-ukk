<?php

// data_barang.php

include 'includes/cek_session.php';
include 'config/koneksi.php';

$sql = "SELECT * FROM tbl_barang ORDER BY nama_barang ASC";
$hasil = mysqli_query($koneksi, $sql);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Barang - SellManage</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #dbeafe, #fce7f3);
            min-height: 100vh;
            padding: 40px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .header {
            background: white;
            padding: 25px 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(37, 99, 235, 0.15);
            border-top: 5px solid #ec4899;
            margin-bottom: 20px;
        }

        h1 {
            color: #2563eb;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .menu {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .menu a {
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 7px;
            font-weight: bold;
            font-size: 14px;
        }

        .dashboard {
            background: #eff6ff;
            color: #2563eb;
            border: 1px solid #bfdbfe;
        }

        .dashboard:hover {
            background: #dbeafe;
        }

        .tambah {
            background: #fce7f3;
            color: #db2777;
            border: 1px solid #f9a8d4;
        }

        .tambah:hover {
            background: #fbcfe8;
        }

        .table-container {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(37, 99, 235, 0.15);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: linear-gradient(90deg, #2563eb, #ec4899);
            color: white;
            padding: 13px 10px;
            text-align: center;
        }

        td {
            padding: 12px 10px;
            border-bottom: 1px solid #e5e7eb;
            color: #333;
            text-align: center;
        }

        tr:hover td {
            background: #fdf2f8;
        }

        .harga {
            color: #2563eb;
            font-weight: bold;
        }

        .stok {
            font-weight: bold;
        }

        .aksi {
            white-space: nowrap;
        }

        .aksi a {
            text-decoration: none;
            font-weight: bold;
            padding: 6px 10px;
            border-radius: 5px;
            font-size: 13px;
        }

        .edit {
            background: #dbeafe;
            color: #2563eb;
        }

        .edit:hover {
            background: #bfdbfe;
        }

        .hapus {
            background: #fce7f3;
            color: #db2777;
        }

        .hapus:hover {
            background: #fbcfe8;
        }

        @media (max-width: 600px) {
            body {
                padding: 20px;
            }

            h1 {
                font-size: 24px;
            }

            .table-container {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="header">

            <h1>Data Barang</h1>

            <div class="menu">

                <a href="dashboard.php" class="dashboard">
                    Kembali ke Dashboard
                </a>

                <a href="tambah_barang.php" class="tambah">
                    + Tambah Barang
                </a>

            </div>

        </div>


        <div class="table-container">

            <table border="1" cellpadding="6">

                <tr>
                    <th>Kode</th>
                    <th>Nama Barang</th>
                    <th>Harga Satuan</th>
                    <th>Stok</th>
                    <th>Kadaluarsa</th>
                    <th>Aksi</th>
                </tr>

                <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>

                <tr>

                    <td>
                        <?php echo $row['kode_barang']; ?>
                    </td>

                    <td>
                        <?php echo $row['nama_barang']; ?>
                    </td>

                    <td class="harga">
                        Rp <?php echo number_format($row['harga_satuan'], 0, ',', '.'); ?>
                    </td>

                    <td class="stok">
                        <?php echo $row['stok']; ?>
                    </td>

                    <td>
                        <?php echo $row['tanggal_kadaluarsa']; ?>
                    </td>

                    <td class="aksi">

                        <a
                            href="edit_barang.php?id=<?php echo $row['id_barang']; ?>"
                            class="edit">
                            Edit
                        </a>

                        <a
                            href="hapus_barang.php?id=<?php echo $row['id_barang']; ?>"
                            class="hapus"
                            onclick="return confirm('Yakin hapus barang ini?');">
                            Hapus
                        </a>

                    </td>

                </tr>

                <?php } ?>

            </table>

        </div>

    </div>

</body>

</html>