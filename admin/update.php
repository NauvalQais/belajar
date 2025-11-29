<?php

session_start();

include("../proseslog.php");
// CEK JIKA BELUM LOGIN
if (!isset($_SESSION["username"])) {
	echo '<script>
                alert("Mohon login dahulu !");
                window.location="../login.php";
             </script>';
	return false;
}
require '../func.php';

// get data berdasarkan id
$id = $_GET["id"];

$item = index("SELECT * FROM products WHERE id = $id")[0];


if (isset($_POST["submit"])) {

	// cek TRUE or FALSE
	if (update($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'data.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'data.php';
			</script>
		";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Update Products</title>
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
							<input type="hidden" name="id" value="<?= $item["id"]; ?>">
							<input type="hidden" name="gambarLama" value="<?= $item["gambar"]; ?>">
							<ul>
								<li>
									<label for="nama_b">Nama Brand : </label>
									<input type="text" class="input" name="nama_brand" id="nama_b" required value="<?= $item["nama_b"]; ?>">
								</li>
								<li>
									<label for="series">Nama : </label>
									<input type="text" class="input" name="series_sepatu" id="series" value="<?= $item["series_sepatu"]; ?>">
								</li>
								<li>
									<label for="harga">Harga :</label>
									<input type="number" class="input" name="harga" id="harga" value="<?= $item["harga"]; ?>">
								</li>
								<li>
									<label for="jenis">Jenis :</label>
									<select name="jenis_sepatu" class="input-s" id="jenis">
										<option value="<?= $item["jenis"]; ?>"><?= $item["jenis"]; ?></option>
										<option value="Casual">Casual</option>
										<option value="Sneakers">Sneakers</option>
										<option value="Sport">Sport</option>
									</select>

								</li>
								<li>
									<label for="gambar">Gambar :</label>
									<input type="file" name="gambar" class="input-f" id="gambar">
									<img src="../gambar/<?= $item['gambar']; ?>" class="img-u">
								</li>
								<li>
									<button type="submit" name="submit" class="btn-submit" onclick="return confirm('APAKAH DATA BARU SUDAH BENAR?');">Submit</button>
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