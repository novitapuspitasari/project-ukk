<?php
include 'includes/cek_session.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - SellManage</title>

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
            max-width: 900px;
            margin: auto;
        }

        .header {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(37, 99, 235, 0.15);
            border-top: 5px solid #ec4899;
            margin-bottom: 25px;
        }

        h1 {
            color: #2563eb;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .header p {
            color: #555;
            font-size: 15px;
        }

        .role {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 15px;
            border-radius: 20px;
            background: #fce7f3;
            color: #db2777;
            font-weight: bold;
        }

        .menu {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(37, 99, 235, 0.15);
        }

        .menu h2 {
            color: #2563eb;
            margin-bottom: 20px;
            font-size: 22px;
        }

        ul {
            list-style: none;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        li a {
            display: block;
            padding: 18px;
            text-decoration: none;
            color: #2563eb;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            border-radius: 10px;
            font-weight: bold;
            text-align: center;
            transition: 0.3s;
        }

        li a:hover {
            background: #fce7f3;
            color: #db2777;
            border-color: #f9a8d4;
            transform: translateY(-2px);
        }

        .logout {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 25px;
            background: linear-gradient(90deg, #2563eb, #ec4899);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }

        .logout:hover {
            background: linear-gradient(90deg, #1d4ed8, #db2777);
        }

        @media (max-width: 600px) {
            body {
                padding: 20px;
            }

            ul {
                grid-template-columns: 1fr;
            }

            h1 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="header">
            <h1>
                Selamat datang,
                <?php echo $_SESSION['nama_lengkap']; ?>
            </h1>

            <p>Anda login sebagai:</p>

            <span class="role">
                <?php echo $_SESSION['role']; ?>
            </span>
        </div>

        <div class="menu">

            <h2>Menu SellManage</h2>

            <ul>

                <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'gudang') { ?>

                    <li>
                        <a href="data_barang.php">
                            Data Barang
                        </a>
                    </li>

                    <li>
                        <a href="data_pelanggan.php">
                            Data Pelanggan
                        </a>
                    </li>

                <?php } ?>


                <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'kasir') { ?>

                    <li>
                        <a href="transaksi.php">
                            Transaksi Kasir
                        </a>
                    </li>

                    <li>
                        <a href="riwayat_transaksi.php">
                            Riwayat Transaksi
                        </a>
                    </li>

                <?php } ?>

            </ul>

            <a href="logout.php" class="logout">
                Logout
            </a>

        </div>

    </div>

</body>
</html>