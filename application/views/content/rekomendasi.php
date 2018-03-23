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
										<th>Tipe</th>
										<?php foreach ($kriteria as $row): ?>
											<th style="text-align:center;"><?php echo $row->nama_kriteria ?></th>
										<?php endforeach ?>
										<th style="text-align:center;">Nilai</th>
									</tr>
									</thead>
									<tbody>
										<?php
										$counter = 1;
										?>
										<?php foreach ($hasil as $key): ?>
												<tr>
													<td style="text-align:center;"><?php echo $counter ?></td>
													<td><?php echo $key->isneed ?></td>
													<td><?php echo $key->Tipe ?></td>
													<td><?php echo $key->nilai_kriteria_1 ?></td>
													<td><?php echo $key->nilai_kriteria_2 ?></td>
													<td><?php echo $key->nilai_kriteria_3 ?></td>
													<td><?php echo $key->nilai_kriteria_4 ?></td>
													<td><?php echo $key->nilai ?></td>
												</tr>
											<?php $counter++; ?>
										<?php endforeach ?>
									</tbody>
								</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>