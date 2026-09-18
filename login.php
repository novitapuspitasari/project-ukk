<!-- login.php -->
<!DOCTYPE html>
<html>
<head>
     <title>Login - SellManage</title>

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
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h1 {
            position: absolute;
            top: 80px;
            text-align: center;
            color: #2563eb;
            font-size: 28px;
            width: 100%;
        }

        form {
            background: white;
            padding: 35px 40px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(37, 99, 235, 0.15);
            width: 400px;
            border-top: 5px solid #ec4899;
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px 5px;
            color: #333;
        }

        td:first-child {
            width: 100px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            outline: none;
            font-size: 14px;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #ec4899;
            box-shadow: 0 0 5px rgba(236, 72, 153, 0.25);
        }

        input[type="submit"] {
            width: 100%;
            padding: 11px;
            margin-top: 10px;
            border: none;
            border-radius: 7px;
            background: linear-gradient(90deg, #2563eb, #ec4899);
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: linear-gradient(90deg, #1d4ed8, #db2777);
        }

        p {
            position: absolute;
            top: 125px;
            color: #db2777;
            font-size: 14px;
            background: #fce7f3;
            padding: 8px 15px;
            border-radius: 5px;
        }
     </style>
</head>

<body>

      <h1>Login Aplikasi SellManage</h1>

      <?php
      session_start();

      if (isset($_SESSION['pesan_error'])) {
        echo '<p>' . $_SESSION['pesan_error'] . '</p>';
        unset($_SESSION['pesan_error']);
      }
      ?>

      <form action="proses_login.php" method="POST">

        <table>

            <tr>
                <td>Username</td>
                <td>:</td>
                <td>
                    <input type="text" name="username" required>
                </td>
            </tr>

            <tr>
                <td>Password</td>
                <td>:</td>
                <td>
                    <input type="password" name="password" required>
                </td>
            </tr>

            <tr>
                <td colspan="3">
                    <input type="submit" value="Login">
                </td>
            </tr>

        </table>

      </form>

</body>
</html>