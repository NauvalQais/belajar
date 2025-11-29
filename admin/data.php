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


require '../func.php';
// pagination
$jmlperpage = 4;
$jumlahData = count(index("SELECT * FROM products"));
$jumlahHalaman = ceil($jumlahData / $jmlperpage);
$pageactv = (isset($_GET["page"])) ? $_GET["page"] : 1;
$DAwal = ($jmlperpage * $pageactv) - $jmlperpage;


$product = index("SELECT * FROM products LIMIT $DAwal, $jmlperpage");


if (isset($_POST["cari"])) {
    $product = search($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/x-icon" href="../asset/img/icon.jpg">
    <title>Data Products</title>
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
            <div class="box">
                <center>
                    <form action="" method="post">
                        <input type="text" name="keyword" autofocus placeholder="Search" class="search">
                        <button type="submit" name="cari" class="button-s">Search</button>
                    </form>
                </center>
                <table border="1">
                    <tr>
                        <th>No</th>
                        <th>nama brand</th>
                        <th>series </th>
                        <th>jenis </th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                    <?php $no = 1; ?>
                    <?php foreach ($product as $row) : ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $row["nama_b"]; ?></td>
                            <td><?= $row["series_sepatu"]; ?></td>
                            <td><?= $row["jenis"]; ?></td>
                            <td>Rp<?= $row["harga"]; ?></td>
                            <td><img src="../gambar/<?= $row["gambar"]; ?>" width="50"></td>
                            <td>
                                <a href="update.php?id=<?= $row["id"]; ?>" class="btn-update">Update</a> |
                                <a href="delete.php?id=<?= $row["id"]; ?>" class="btn-del" onclick="return confirm('yakin?');">DELETE</a>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    <?php endforeach; ?>
                </table>
                <div class="box3">
                    <ul class="pagination">
                        <li class="list"><?php if ($pageactv > 1) : ?>
                                <a href="?page=<?= $pageactv - 1; ?>">&laquo;</a>
                            <?php endif; ?>
                        </li>
                        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                            <?php if ($i == $pageactv) : ?>
                                <li class="list">
                                    <a href="?page=<?= $i; ?>" style="font-weight: bold;   background-color: #1975ff; color: white;"><?= $i; ?></a>
                                </li> <?php else : ?>
                                <li class="list">
                                    <a href="?page=<?= $i; ?>"><?= $i; ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <li class="list">
                            <?php if ($pageactv < $jumlahHalaman) : ?>
                                <a href="?page=<?= $pageactv + 1; ?>">&raquo;</a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </main>


</body>

</html>