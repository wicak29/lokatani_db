<?php
	//predifined fetch constants
	define('MYSQL_BOTH',MYSQLI_BOTH);
	define('MYSQL_NUM',MYSQLI_NUM);
	define('MYSQL_ASSOC',MYSQLI_ASSOC);
	
	include('connection.php');
	$respon = array();

	if(isset($_POST['id_gudang']) && isset($_POST['id_tanaman']) && isset($_POST['jumlah'])) 
	{
		$id_gudang = $_POST['id_gudang'];
		$id_tanaman = $_POST['id_tanaman'];
		$jumlah = $_POST['jumlah'];

		if($result = $mysqli->query(" UPDATE gudang_has_tanaman 
			 SET jumlah = '$jumlah'
			 WHERE gudang_id_gudang = '$id_gudang'
			 AND tanaman_id_tanaman='$id_tanaman';")) {
			$respon["sukses"] = 1;
			$respon["pesan"] = "Berhasil merubah data ke gudang";

			echo json_encode($respon);
		}
		else {
			$respon["sukses"] = 0;
			$respon["pesan"] = "Gagal Menambah Data";

			echo json_encode($respon);
		}
	}
	else {
		$respon["sukses"] = 0;
		$respon["pesan"] = "Ada data yang kosong";

		echo json_encode($respon);
	}
?>