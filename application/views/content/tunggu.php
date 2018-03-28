<section id="rekomendasi" class="section-gray">
  	<div class="container clearfix">
  		<?php if ($total == $total_user): ?>
  			<a class="button" href="<?php echo base_url(); ?>home/rekomendasi">hasil roadmap</a>
  		<?php else: ?>
			<center><?php echo "mohon tunggu, yang telah mengisi pembobotan sekitar ".$total." orang dari ".$total_user." orang"; ?></center>
  		<?php endif ?>
    	<div class="row services">
      		<div class="col-md-12">

      			<div class="row">
          			<div class="container" style="margin-top:50px">
      				<h3>tabel roadmap kebutuhan</h3>
              			<div class="panel-body" style="padding:0px">
                			<table class="table table-striped table-bordered" style="margin:0px">
                  				<thead>
									<tr>
										<th style="text-align:center;" width="20">NO</th>
										<th>Kebutuhan Sistem Informasi</th>
										<th>Tipe</th>
										<th style="text-align:center;">Nilai</th>
									</tr>
									</thead>
									<tbody>
										<?php
										$counter = 1;
										?>
										<?php foreach ($perbandingan_semua as $key): ?>
												<tr>
													<td style="text-align:center;"><?php echo $counter ?></td>
													<td><?php echo $key->isneed ?></td>
													<td><?php echo $key->Tipe ?></td>
													<td><?php echo $key->nilai_hasil ?></td>
												</tr>
											<?php $counter++; ?>
										<?php endforeach ?>
									</tbody>
								</table>
						</div>
					</div>
				</div>

        		<div class="row">
          			<div class="container" style="margin-top:50px">
      				<h3>tabel hasil perbandingan kriteria</h3>
              			<div class="panel-body" style="padding:0px">
                			<table class="table table-striped table-bordered" style="margin:0px">
                  				<thead>
									<tr>
										<th style="text-align:center;" width="20">NO</th>
										<th>Kriteria</th>
										<th style="text-align:center;">Nilai</th>
									</tr>
									</thead>
									<tbody>
										<?php
										$counter = 1;
										?>
										<?php foreach ($perbandingan_kriteria as $key): ?>
												<tr>
													<td style="text-align:center;"><?php echo $counter ?></td>
													<td><?php echo $key->nama_kriteria ?></td>
													<td><?php echo $key->nilai_hasil ?></td>
												</tr>
											<?php $counter++; ?>
										<?php endforeach ?>
									</tbody>
								</table>
						</div>
					</div>
				</div>
				
          			<div class="container" style="margin-top:50px">
      				<h3>tabel hasil per kriteria Finance</h3>
              			<div class="panel-body" style="padding:0px">
                			<table class="table table-striped table-bordered" style="margin:0px">
                  				<thead>
									<tr>
										<th style="text-align:center;" width="20">NO</th>
										<th>Kriteria</th>
										<th style="text-align:center;">Nilai</th>
									</tr>
									</thead>
									<tbody>
										<?php
										$counter = 1;
										?>
										<?php foreach ($perbandingan_finance as $key): ?>
												<tr>
													<td style="text-align:center;"><?php echo $counter ?></td>
													<td><?php echo $key->isneed ?></td>
													<td><?php echo $key->nilai_hasil ?></td>
												</tr>
											<?php $counter++; ?>
										<?php endforeach ?>
									</tbody>
								</table>
						</div>
					</div>
				
				
          			<div class="container" style="margin-top:50px">
      				<h3>tabel hasil per kriteria Customer</h3>
              			<div class="panel-body" style="padding:0px">
                			<table class="table table-striped table-bordered" style="margin:0px">
                  				<thead>
									<tr>
										<th style="text-align:center;" width="20">NO</th>
										<th>Kriteria</th>
										<th style="text-align:center;">Nilai</th>
									</tr>
									</thead>
									<tbody>
										<?php
										$counter = 1;
										?>
										<?php foreach ($perbandingan_customer as $key): ?>
												<tr>
													<td style="text-align:center;"><?php echo $counter ?></td>
													<td><?php echo $key->isneed ?></td>
													<td><?php echo $key->nilai_hasil ?></td>
												</tr>
											<?php $counter++; ?>
										<?php endforeach ?>
									</tbody>
								</table>
						</div>
					</div>
				
				
          			<div class="container" style="margin-top:50px">
      				<h3>tabel hasil per kriteria Internal Business</h3>
              			<div class="panel-body" style="padding:0px">
                			<table class="table table-striped table-bordered" style="margin:0px">
                  				<thead>
									<tr>
										<th style="text-align:center;" width="20">NO</th>
										<th>Kriteria</th>
										<th style="text-align:center;">Nilai</th>
									</tr>
									</thead>
									<tbody>
										<?php
										$counter = 1;
										?>
										<?php foreach ($perbandingan_internal as $key): ?>
												<tr>
													<td style="text-align:center;"><?php echo $counter ?></td>
													<td><?php echo $key->isneed ?></td>
													<td><?php echo $key->nilai_hasil ?></td>
												</tr>
											<?php $counter++; ?>
										<?php endforeach ?>
									</tbody>
								</table>
						</div>
					</div>

				
          			<div class="container" style="margin-top:50px">
      				<h3>tabel hasil per kriteria Learning and Growth</h3>
              			<div class="panel-body" style="padding:0px">
                			<table class="table table-striped table-bordered" style="margin:0px">
                  				<thead>
									<tr>
										<th style="text-align:center;" width="20">NO</th>
										<th>Kriteria</th>
										<th style="text-align:center;">Nilai</th>
									</tr>
									</thead>
									<tbody>
										<?php
										$counter = 1;
										?>
										<?php foreach ($perbandingan_learning as $key): ?>
												<tr>
													<td style="text-align:center;"><?php echo $counter ?></td>
													<td><?php echo $key->isneed ?></td>
													<td><?php echo $key->nilai_hasil ?></td>
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
</section>