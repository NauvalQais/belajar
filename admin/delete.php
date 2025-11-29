<?php
require '../func.php';

$id = $_GET["id"];

if (destroy($id) > 0) {
	echo "
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'data.php';
		</script>
	";
} else {
	echo "
		<script>
			alert('data gagal dihapus!');
			document.location.href = 'data.php';
		</script>
	";
}
