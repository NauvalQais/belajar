<?php
session_start();

include("../proseslog.php");

if (!isset($_SESSION["username"])) {
    echo '<script>
                alert("Mohon login dahulu !");
                window.location="../login.php";
             </script>';
    return false;
}
// GET USERNAME
$username = $_SESSION["username"];
$data = mysqli_query($mysqli, "SELECT * FROM pengguna WHERE");
$pengguna = mysqli_fetch_assoc($data);




?>
<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="icon" type="image/x-icon" href="../asset/img/icon.jpg">
    <link rel="stylesheet" href="../asset/css/dashboards.css">
</head>

<body>
    <main>
        <input type="checkbox" id="check">
        <label for="check">

            <span id="btn">X</span>
            <span id="open">OPEN</span>

        </label>
        <div class="sidebar">
            <div class="top">
                shoes society
            </div>
            <ul>
                <li><a class="#" href="index.php"> Dashboard</a></li>
                <li> <a href="add.php">+Product</a></li>
                <li><a href="data.php">data </a></li>
                <li><a href="../logout.php">logout</a></li>
            </ul>
        </div>
        <section>
            <div class="box2">

                <marquee behavior="" direction="right">
                    <p> Selamat datang <?= $pengguna["username"]; ?></p>
                </marquee>
            </div>
        </section>
    </main>


</body>


</html>
