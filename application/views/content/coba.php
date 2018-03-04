<?php 

foreach ($informasi_alternatif as $row) {
	$hasil = $row['nilai'] / $row['nilai2'];
	$id = $row['id_nilai_alternatif'];
	$dataupdate = array(
				'nilai_akhir' => $hasil	
			);
		
}
 ?>