
<!-- tambah_pelanggan.php -->
<?php include 'includes/cek_session.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pelanggan - SellManage</title>

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

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            outline: none;
        }

        input[type="text"]:focus {
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

    <h1>Tambah Pelanggan</h1>

    <form action="proses_tambah_pelanggan.php" method="POST">
        <table>

            <tr>
                <td>Nama Pelanggan</td>
                <td>:</td>
                <td>
                    <input type="text" name="nama_pelanggan" required>
                </td>
            </tr>

            <tr>
                <td>No. HP</td>
                <td>:</td>
                <td>
                    <input type="text" name="no_hp">
                </td>
            </tr>

            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                    <input type="text" name="alamat">
                </td>
            </tr>

            <tr>
                <td colspan="3">
                    <input type="submit" value="Simpan">
                </td>
            </tr>

        </table>
    </form>

    <a href="data_pelanggan.php" class="kembali">
        ← Kembali ke Data Pelanggan
    </a>

</div>

</body>
</html>

