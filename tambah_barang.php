
<!-- tambah_barang.php -->
<?php include 'includes/cek_session.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang - SellManage</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #dbeafe, #fce7f3);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 100%;
            max-width: 550px;
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
        }

        td {
            padding: 9px 5px;
        }

        td:first-child {
            font-weight: bold;
            color: #374151;
            width: 40%;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            outline: none;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus {
            border-color: #2563eb;
        }

        input[type="submit"] {
            width: 100%;
            padding: 11px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(90deg, #2563eb, #ec4899);
            color: white;
            font-weight: bold;
            cursor: pointer;
            font-size: 15px;
        }

        input[type="submit"]:hover {
            opacity: 0.9;
        }

        .kembali {
            display: block;
            text-align: center;
            margin-top: 18px;
            color: #2563eb;
            text-decoration: none;
            font-weight: bold;
        }

        .kembali:hover {
            color: #db2777;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Tambah Barang</h1>

    <form action="proses_tambah_barang.php" method="POST">
        <table>

            <tr>
                <td>Kode Barang</td>
                <td>:</td>
                <td>
                    <input type="text" name="kode_barang" required>
                </td>
            </tr>

            <tr>
                <td>Nama Barang</td>
                <td>:</td>
                <td>
                    <input type="text" name="nama_barang" required>
                </td>
            </tr>

            <tr>
                <td>Harga Satuan</td>
                <td>:</td>
                <td>
                    <input type="number" name="harga_satuan" step="0.01" required>
                </td>
            </tr>

            <tr>
                <td>Stok</td>
                <td>:</td>
                <td>
                    <input type="number" name="stok" min="0" required>
                </td>
            </tr>

            <tr>
                <td>Tanggal Kadaluarsa</td>
                <td>:</td>
                <td>
                    <input type="date" name="tanggal_kadaluarsa">
                </td>
            </tr>

            <tr>
                <td colspan="3">
                    <input type="submit" value="Simpan">
                </td>
            </tr>

        </table>
    </form>

    <a href="data_barang.php" class="kembali">← Kembali ke Data Barang</a>

</div>

</body>
</html>

