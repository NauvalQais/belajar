<?php
$conn = mysqli_connect("localhost", "root", "", "");
// include "koneksi.php";

// read
function index($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// read

// create
function store($data)
{
    global $conn;

    $nama = ($data[""]);
    $serie = ($data[""]);
    $harga = ($data[""]);
    $jenis = ($data[""]);

    // upload gambar
    $gambar = uploads();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO products ()
				VALUES
			  ( '$nama', '$serie', '$harga', '$jenis', '$gambar')
			";
    mysqli_query($conn, $query);
    // var_dump(mysqli_affected_rows($conn));
    // die;
    return mysqli_affected_rows($conn);
}
// create

// uploads
function uploads()
{

    $namaF = $_FILES['gambar']['name'];
    $sizeF = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];


    if ($error === 4) {
        echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
        return false;
    }

    $ekstensi = ['jpg', 'jpeg', 'png'];
    $getEks = explode('.', $namaF);
    $getEks = strtolower(end($getEks));
    if (!in_array($getEks, $ekstensi)) {
        echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
        return false;
    }


    if ($sizeF > 1000000) {
        echo "<script>
    			alert('ukuran gambar terlalu besar!');
    		  </script>";
        return false;
    }


    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $getEks;

    move_uploaded_file($tmpName, '../gambar/' . $namaFileBaru);

    return $namaFileBaru;
}
// uploads


// delete
function destroy($id)
{
    global $conn;
    $file = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM "));
    unlink('../gambar/' . $file["gambar"]);
    $delete = "DELETE FROM ";
    mysqli_query($conn, $delete);
    return mysqli_affected_rows($conn);
    // mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    // return mysqli_affected_rows($conn);
}
// delete

// update
function update($data)
{
    global $conn;

    $id = $data["id"];
    $nama = ($data[""]);
    $serie = ($data[""]);
    $harga = ($data[""]);
    $jenis = ($data[""]);
    $gambarLama = ($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambarLama = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM "));
        unlink('../gambar/' . $gambarLama["gambar"]);

        $gambar = uploads();
    }


    $query = "UPDATE products SET
				
			  WHERE id = $id
			";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// update

// search


// search
