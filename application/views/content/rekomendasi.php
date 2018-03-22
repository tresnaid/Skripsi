<?php  
	foreach ($informasi_kriteria as $h) {
		$kriteria[]=array($h['id_kriteria'],$h['nama_kriteria']);
	}

	foreach ($informasi_alternatif as $h) {
		$alternatif[]=array($h['id_isneed'],$h['isneed']);
	}
	
	for($i=0;$i<count($kriteria);$i++){
		$id_kriteria[]=$kriteria[$i][0];
	}
	$matrik_kriteria = $this->User_model->ahp_get_matrik_kriteria($id_kriteria);
	$jumlah_kolom = $this->User_model->ahp_get_jumlah_kolom($matrik_kriteria);
	$matrik_normalisasi = $this->User_model->ahp_get_normalisasi($matrik_kriteria, $jumlah_kolom);
	$eigen_kriteria = $this->User_model->ahp_get_eigen($matrik_normalisasi);


	for($i=0;$i<count($alternatif);$i++){
		$id_alternatif[]=$alternatif[$i][0];
	}
	for($i=0;$i<count($kriteria);$i++){
		$matrik_alternatif = $this->User_model->ahp_get_matrik_alternatif($kriteria[$i][0], $id_alternatif);
		$jumlah_kolom_alternatif = $this->User_model->ahp_get_jumlah_kolom($matrik_alternatif);
		$matrik_normalisasi_alternatif = $this->User_model->ahp_get_normalisasi($matrik_alternatif, $jumlah_kolom_alternatif);
		$eigen_alternatif[$i] = $this->User_model->ahp_get_eigen($matrik_normalisasi_alternatif);
	}

	$nilai_to_sort = array();
	$this->db->query("truncate table nilai_hasil");
	for($i=0;$i<count($alternatif);$i++){
	$nilai=0;
	for($ii=0;$ii<count($kriteria);$ii++){
		$nilai = $nilai + ( $eigen_alternatif[$ii][$i] * $eigen_kriteria[$ii]);
	}
	$idalternatif = $alternatif[$i][0];
	$nilai = round( $nilai , 4);
	$nilai_global[$i] = $nilai;
	$nilai_to_sort[] = array($nilai, $alternatif[$i][0]);
	$this->db->query("INSERT INTO nilai_hasil(
			      id_isneed,nilai) 
	        VALUES(
				'$idalternatif','$nilai')");
}
sort($nilai_to_sort);
for($i=0;$i<count($nilai_to_sort);$i++){
	$ranking[$nilai_to_sort[$i][1]]=(count($nilai_to_sort) - $i);
}

?>
<section id="rekomendasi" class="section-gray">
  	<div class="container clearfix">
    	<div class="row services">
      		<div class="col-md-12">
        		<h2 class="heading">Rekomendasi</h2>
        		<div class="row">
          			<div class="container" style="margin-top:50px">
              			<div class="panel-body" style="padding:0px">
                			<table class="table table-striped table-bordered" style="margin:0px">
                  				<thead>
									<tr>
										<th style="text-align:center;" width="20">NO</th>
										<th>Alternatif</th>
										<?php
										for($i=0;$i<count($kriteria);$i++){
											echo '<th style="text-align:center;">'.strtoupper($kriteria[$i][1]).'</th>';
										}
										?>
										<th style="text-align:center;">Nilai</th>
										<th style="text-align:center;">Rekomendasi</th>
									</tr>
									</thead>
									<tbody>
										<?php
										$counter = 1;
										for($i=0;$i<count($alternatif);$i++){
											echo '
												<tr>
													<td style="text-align:center;">'.($i+1).'</td>
													<td>'.$alternatif[$i][1].'</td>
											';
											for($ii=0;$ii<count($kriteria);$ii++){
												echo '
														<td style="text-align:center;">'.$eigen_alternatif[$ii][$i].'</td>
												';
												
											}
											echo '
													<td style="text-align:center;"><strong>'.$nilai_global[$i].'</strong></td>
													<td style="text-align:center;">'.$ranking[$alternatif[$i][0]].'</td>
												</tr>
											';
											$counter++;
										}
										?>
									</tbody>
								</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>