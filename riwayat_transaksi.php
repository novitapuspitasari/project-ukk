
<?php
// riwayat_transaksi.php

include 'includes/cek_session.php';
include 'config/koneksi.php';

$sql = "SELECT 
            t.id_transaksi,
            t.no_transaksi,
            t.tanggal,
            t.total_bayar,
            u.nama_lengkap AS nama_kasir
        FROM tbl_transaksi t
        JOIN tbl_user u ON t.id_kasir = u.id_user
        ORDER BY t.tanggal DESC";

$hasil = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Riwayat Transaksi - SellManage</title>

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
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 10px;
            overflow: hidden;
        }

        th {
            background: linear-gradient(90deg, #2563eb, #ec4899);
            color: white;
            padding: 12px;
        }

        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #e5e7eb;
        }

        tr:hover {
            background: #fdf2f8;
        }

        .cetak {
            color: #2563eb;
            text-decoration: none;
            font-weight: bold;
        }

        .cetak:hover {
            color: #db2777;
        }

        .kembali {
            display: inline-block;
            margin-top: 20px;
            color: #2563eb;
            text-decoration: none;
            font-weight: bold;
        }

        .kembali:hover {
            color: #db2777;
        }

        .kosong {
            text-align: center;
            color: #6b7280;
            padding: 20px;
        }

        @media (max-width: 700px) {
            body {
                padding: 15px;
            }

            .container {
                padding: 20px;
                overflow-x: auto;
            }

            table {
                min-width: 700px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Riwayat Transaksi</h1>

    <table border="1" cellpadding="6">

        <tr>
            <th>No. Transaksi</th>
            <th>Tanggal</th>
            <th>Kasir</th>
            <th>Total Bayar</th>
            <th>Aksi</th>
        </tr>

        <?php if (mysqli_num_rows($hasil) > 0) { ?>

            <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>

                <tr>

                    <td>
                        <?php echo $row['no_transaksi']; ?>
                    </td>

                    <td>
                        <?php echo $row['tanggal']; ?>
                    </td>

                    <td>
                        <?php echo $row['nama_kasir']; ?>
                    </td>

                    <td>
                        Rp <?php echo number_format($row['total_bayar'], 0, ',', '.'); ?>
                    </td>

                    <td>
                        <a
                            href="struk.php?id=<?php echo $row['id_transaksi']; ?>"
                            class="cetak"
                        >
                            Cetak
                        </a>
                    </td>

                </tr>

            <?php } ?>

        <?php } else { ?>

            <tr>
                <td colspan="5" class="kosong">
                    Belum ada transaksi.
                </td>
            </tr>

        <?php } ?>

    </table>

    <a href="dashboard.php" class="kembali">
        ← Kembali ke Dashboard
    </a>

</div>

</body>

</html>