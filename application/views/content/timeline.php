
<!------ Include the above in your HEAD tag ---------->
<?php 
$datauser = $_SESSION['list'];
      	foreach ($datauser as $row) {
	        $id = $row['id_user'];
      	}
 ?>
<section class="section-gray">
	<div class="container clearfix">
		<div class="row services">
		  <div class="col-md-12">
		    <h2 class="heading">TIMELINE</h2>
				<div class="container">

				    <div class="qa-message-list" id="wallmessages">
						<?php foreach ($table as $row): ?>
							<?php 
				            	$data_measure = $this->User_model->getDataWhere('t_measure', 'id_objective', $row->id_objective);
				            	$data_action = $this->User_model->getDataWhere('t_action', 'id_objective', $row->id_objective);
				            	$data_isneed = $this->User_model->getDataWhere('t_isneed', 'id_objective', $row->id_objective);
				            	$data_komentar = $this->User_model->joingetwhere('t_komentar_timeline', 't_user', 't_komentar_timeline.id_user=t_user.id_user','id_objective', $row->id_objective);
							 ?>
						<div class="message-item" id="m16">
							<div class="message-inner">
								<div class="message-head clearfix">
									<div class="avatar pull-left"><a href="./index.php?qa=user&qa_1=Oleg+Kolesnichenko"><img src="https://ssl.gstatic.com/accounts/ui/avatar_2x.png"></a></div>
									<div class="user-detail">
										<h5 class="handle">
											Bidang: 
											<?php if ($row->id_kategori_analisis == 'FNC'): ?>
												Finance
											<?php elseif ($row->id_kategori_analisis == 'LEA'): ?>
												Learning and Growth
											<?php elseif ($row->id_kategori_analisis == 'INT'): ?>
												Internal Business
											<?php elseif ($row->id_kategori_analisis == 'CST'): ?>					Customer
											<?php endif ?>
										</h5>
										<h5 class="handle">Tujuan: <?php echo $row->objective; ?></h5>
										<div class="post-meta">
											<div class="asker-meta">
												<span class="qa-message-what"></span>
												<span class="qa-message-when">
													<span class="qa-message-when-data"><?php echo $row->tanggal ?></span>
												</span>
												<span class="qa-message-who">
													<span class="qa-message-who-pad">by </span>
													<span class="qa-message-who-data"><a href="./index.php?qa=user&qa_1=Oleg+Kolesnichenko"><?php echo $row->nama_user ?></a></span>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="qa-message-content">
									Ukuran : <br>
									<ul>
										<?php foreach ($data_measure as $key): ?>
											<li>
												<?php echo $key['measure'] ?>	
											</li>
										<?php endforeach ?>
									</ul>
									<br>
									Dilakukan dengan : <br>
									<ul>						
										<?php foreach ($data_action as $key): ?>
											<li>
												<?php echo $key['action'] ?>	
											</li>
										<?php endforeach ?>
									</ul>
									<br>
									Kebutuhan Sistem Informasi : <br>
									<ul>
										<?php foreach ($data_isneed as $key): ?>
											<li>
												<?php echo $key['isneed'] ?>
											</li>
										<?php endforeach ?>
									</ul>
								</div>
								<div class="qa-message-content">
									<hr>
									komentar
									<hr>
									<ul>
										
									<?php foreach ($data_komentar as $key): ?>
									<?php echo $key->nama_user; ?> <?php echo " "; ?> <?php echo $key->waktu; ?>
									<li><?php echo $key->komentar; ?></li>
									<?php endforeach ?>
									</ul>
								</div>
							</div>
								<form action="<?php echo base_url(); ?>home/inputkomentar" method="POST">	
									<input type="text" name="komentar" style="width: 89%;">
									<input type="hidden" name="id" value="<?php echo $id ?>">
									<input type="hidden" name="id_objective" value="<?php echo $row->id_objective ?>">
									<button class="btn btn-default" type="submit">Komentari</button>
								</form>
						</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
