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
if (isset($_POST["submit"])) {

    // cek true or false
    // var_dump($_POST);
    // var_dump($_FILES);
    // die;
    if (store($_POST) > 0) {
        echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'data.php';
			</script>
		";
    } else {
        echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'add.php';
			</script>
		";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Products</title>
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

            <div class="box1">
                <div class="panel">
                    <div class="mx">
                        <form action="" method="post" enctype="multipart/form-data">
                            <ul>
                                <li>
                                    <label for="nama_b">Nama Brand : </label>
                                    <input class="input" type="text" name="nama_brand" id="nama_b">
                                </li>
                                <li>
                                    <label for="serie">Serie Sepatu : </label>
                                    <input class="input" type="text" name="series_sepatu" id="serie">
                                </li>
                                <li>
                                    <label for="harga">Harga :</label>
                                    <input class="input" type="number" name="harga" id="harga">
                                </li>
                                <li>
                                    <label for="jenis">Jenis :</label>
                                    <select class="input-s" name="jenis_sepatu" id="jenis">
                                        <option value="Casual">Casual</option>
                                        <option value="Sneakers">Sneakers</option>
                                        <option value="Sport">Sport</option>
                                    </select>
                                </li>
                                <li>
                                    <label for="gambar">Gambar :</label>
                                    <input type="file" name="gambar" class="input-f" id="gambar">
                                </li>
                                <li>
                                    <button type="submit" class="btn-submit" onclick="return confirm('APAKAH DATA SUDAH BENAR?');" name="submit">submit</button>
                                </li>
                            </ul>

                        </form>

                    </div>

                </div>


            </div>
        </section>
    </main>





</body>

</html>