<?php  
	foreach ($informasi_kriteria as $h) {
		$kriteria[]=array($h['id_kriteria'],$h['nama_kriteria']);
		$id_kriteria[]=$h['id_kriteria'];
	}

	foreach ($informasi_alternatif as $h) {
		$alternatif[]=array($h['id_isneed'],$h['isneed']);
		$id_alternatif[]=$h['id_isneed'];
	}
	
	$matrik_kriteria = $this->User_model->ahp_get_matrik_kriteria($id_kriteria);
	$jumlah_kolom = $this->User_model->ahp_get_jumlah_kolom($matrik_kriteria);
	$matrik_normalisasi = $this->User_model->ahp_get_normalisasi($matrik_kriteria, $jumlah_kolom);
	$eigen_kriteria = $this->User_model->ahp_get_eigen($matrik_normalisasi);

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
			$nilaialternatif[$i][] = $eigen_alternatif[$ii][$i];
		}
		$nilai = round( $nilai , 4);
		$nilai_global[$i] = $nilai;
		$nilai_to_sort[] = array($nilai, $alternatif[$i][0]);
		$data_input = array(
			'id_isneed' => $id_alternatif[$i],
			'nilai' => $nilai,
			'nilai_kriteria_1' => $nilaialternatif[$i][0],
			'nilai_kriteria_2' => $nilaialternatif[$i][1],
			'nilai_kriteria_3' => $nilaialternatif[$i][2],
			'nilai_kriteria_4' => $nilaialternatif[$i][3]
		);
		$this->User_model->insertData('nilai_hasil', $data_input);
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
										<?php foreach ($kriteria as $row): ?>
											<th style="text-align:center;"><?php echo $row['1'] ?></th>
										<?php endforeach ?>
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