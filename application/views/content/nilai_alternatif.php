<style type="text/css">
	.subactive{
		background-color: green;
	}
</style>
<div id="navigation" class="collapse navbar-collapse">
  <ul class="nav navbar-nav navbar-right">
   <?php foreach ($informasi_kriteria as $key ): ?>
	<li class="
	<?php if ($key->id_kriteria == $id_kriteria): ?>
		subactive
	<?php endif ?>
	">
		<a href="<?php echo base_url() ?>home/nilaialternatif/<?php echo $key->id_kriteria ?>"><?php echo $key->nama_kriteria ?></a>
	</li>
	<?php endforeach ?>
</div>


<?php
foreach($informasi as $h){
	$alternatif[]=array($h->id_isneed,$h->isneed, $h->Tipe);
}

for($i=1;$i<=9;$i++){
	$selected[$i]='';
}

?>
<script language="javascript">
function ResetConfirm(){
	if (confirm("Anda yakin akan mengatur ulang semua nilai perbandingan alternatif ini ?")){
		return true;
	}else{
		return false;
	}
}
function NextConfirm(){
if (confirm("Anda yakin dengan bobot perbandingan ini ? pastikan anda telah mengisi semua perbandingan bobot di semua kriteria, anda tidak dapat mengganti bobot setelah ini")){
		return true;
	}else{
		return false;
	}
}
</script>

<form action="<?php echo base_url() ?>home/insertBobotalternatif/<?php echo $id_kriteria ?>" name="" method="post" enctype="multipart/form-data">
<section id="" class="section-gray">
  <div class="container clearfix">
    <div class="row services">
      <div class="col-md-12">
        <h2 class="heading">Perhitungan alternatif</h2>
        <div class="row">
          <div class="container" style="margin-top:50px">
              <div class="panel-body" style="padding:0px">
                <table class="table table-striped table-bordered" style="margin:0px">
                  <thead>
                    <tr>
                      	<th>Nama Kebutuhan</th>
                      	<th>Tipe</th>
						<th>Nilai Perbandingan</th>
						<th>Tipe</th>
						<th>Nama Kebutuhan</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php 
					for($i=0;$i<count($alternatif);$i++){
						for($ii=0;$ii<count($alternatif);$ii++){
							if($i < $ii){
								$q = $this->db->query("select nilai from t_nilai_alternatif_".$id_user." where id_alternatif_1='".$alternatif[$i][0]."' and id_alternatif_2='".$alternatif[$ii][0]."' and  id_kriteria='".$id_kriteria."'");
								if($q->num_rows() >0){
									$nilai=$q->row('nilai');
								}else{
									$data_input = array(
										'id_kriteria' => $id_kriteria,
										'id_alternatif_1' => $alternatif[$i][0],
										'id_alternatif_2' => $alternatif[$ii][0],
										'kode' => $id_kriteria.$alternatif[$i][0].$alternatif[$ii][0],
										'nilai' => 1
									);
									$this->User_model->insertData('t_nilai_alternatif_'.$id_user, $data_input);
									$nilai = 1;
								}
								$selected[$nilai]=' selected';
                  				 ?>
								  <tr >
									<td align="right"><?php echo $alternatif[$i][1] ?></td>
									<td><?php echo $alternatif[$i][2] ?></td>
									<td align="center"><select name="nilai_<?php echo $alternatif[$i][0]?>_<?php echo $alternatif[$ii][0]?>">
									<option value="1" <?php echo $selected[1]?> >1. Sama penting dengan</option>
									<option value="2" <?php echo $selected[2]?> >2. Mendekati sedikit lebih penting dari</option>
									<option value="3" <?php echo $selected[3]?> >3. Agak lebih penting dari</option>
									<option value="4" <?php echo $selected[4]?> >4. Mendekati lebih penting dari</option>
									<option value="5" <?php echo $selected[5]?> >5. Cukup penting dari</option>
									<option value="6" <?php echo $selected[6]?> >6. Mendekati sangat penting dari</option>
									<option value="7" <?php echo $selected[7]?> >7. Sangat penting dari</option>
									<option value="8" <?php echo $selected[8]?> >8. Mendekati kepentingan ekstrim dari</option>
									<option value="9" <?php echo $selected[9]?> >9. Kepentingan ekstrim dari</option>
									</select></td>
									<td><?php echo $alternatif[$ii][2] ?></td>
									<td><?php echo $alternatif[$ii][1] ?></td>
								  </tr>
								<?php 
								$selected[$nilai]='';
							}
						}
					}
				 ?>
                  </tbody> 
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <input type="hidden" name="id" value="<?php echo $id_user ?>">
       <button type="submit" name="save" class="btn blue"><i class="icon-ok"></i> Simpan</button>	
		<button type="submit" name="reset" class="btn" onclick="return(ResetConfirm());">Reset Nilai</button>
		<button type="submit" name="resetall" class="btn" onclick="return(ResetConfirm());">Reset Semua</button>
		<?php if ($id_kriteria !=4): ?>
  			<button type="submit" name="next" class="btn pull-right">NEXT</button>
  		<?php else: ?>
  		<button type="submit" name="selesai" class="btn pull-right" onclick="return(NextConfirm());">SELESAI</button>
		<?php endif ?>
    </div>
  </section>
</form>