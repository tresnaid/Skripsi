<?php
foreach($informasi as $h){
	$alternatif[]=array($h['id_alternatif'],$h['nama_alternatif']);
}

if(isset($_POST['save'])){
	$this->db->query("delete from nilai_alternatif where id_kriteria='".$id_kriteria."'"); 
	for($i=0;$i<count($alternatif);$i++){
		for($ii=0;$ii<count($alternatif);$ii++){
			if($i < $ii){
				$hasil = $_POST['nilai_'.$alternatif[$i][0].'_'.$alternatif[$ii][0]] / $_POST['nilai2_'.$alternatif[$i][0].'_'.$alternatif[$ii][0]];
				$this->db->query("insert into nilai_alternatif(id_kriteria,id_alternatif_1,id_alternatif_2,nilai,nilai2, nilai_akhir) values('".$id_kriteria."','".$alternatif[$i][0]."','".$alternatif[$ii][0]."','".$_POST['nilai_'.$alternatif[$i][0].'_'.$alternatif[$ii][0]]."','".$_POST['nilai2_'.$alternatif[$i][0].'_'.$alternatif[$ii][0]]."','".$hasil."')");
			}
		}
	}
}

if(isset($_POST['reset'])){
	$this->db->query("delete from nilai_alternatif where id_kriteria='".$id_kriteria."'"); 
	for($i=0;$i<count($alternatif);$i++){
		for($ii=0;$ii<count($alternatif);$ii++){
			if($i < $ii){
				$hasil = 1;
				$this->db->query("insert into nilai_alternatif(id_kriteria,id_alternatif_1,id_alternatif_2,nilai,nilai2, nilai_akhir) values('".$id_kriteria."','".$alternatif[$i][0]."','".$alternatif[$ii][0]."','1','1','".$hasil."')");
			}
		}
	}
}
if(isset($_POST['resetall'])){
	$this->db->query("truncate table nilai_alternatif");
}
for($i=1;$i<=9;$i++){
	$selected[$i]='';
}
for($i=1;$i<=9;$i++){
	$selected2[$i]='';
}
$daftar='';
$counter = 1;
for($i=0;$i<count($alternatif);$i++){
	for($ii=0;$ii<count($alternatif);$ii++){
		if($i < $ii){
			$q = $this->db->query("select nilai,nilai2 from nilai_alternatif where id_alternatif_1='".$alternatif[$i][0]."' and id_alternatif_2='".$alternatif[$ii][0]."' and  id_kriteria='".$id_kriteria."'");
			if($q->num_rows() >0){
				$nilai=$q->row('nilai');
				$nilai2=$q->row('nilai2');
			}else{
				$this->db->query("insert into nilai_alternatif(id_kriteria,id_alternatif_1,id_alternatif_2,nilai,nilai2) values('".$id_kriteria."','".$alternatif[$i][0]."','".$alternatif[$ii][0]."','1','1')");
				$nilai = 1;
				$nilai2 = 1;
			}
			
			$selected[$nilai]=' selected';
			$selected2[$nilai2]=' selected';
			$daftar.='
			  <tr >
				<td align="right">'.$alternatif[$i][1].'</td>
				<td align="center"><select name="nilai_'.$alternatif[$i][0].'_'.$alternatif[$ii][0].'">
				<option value="1"'.$selected[1].'>1. Sama penting dengan</option>
				<option value="2"'.$selected[2].'>2. Mendekati sedikit lebih penting dari</option>
				<option value="3"'.$selected[3].'>3. Agak lebih penting dari</option>
				<option value="4"'.$selected[4].'>4. Mendekati lebih penting dari</option>
				<option value="5"'.$selected[5].'>5. Cukup penting dari</option>
				<option value="6"'.$selected[6].'>6. Mendekati sangat penting dari</option>
				<option value="7"'.$selected[7].'>7. Sangat penting dari</option>
				<option value="8"'.$selected[8].'>8. Mendekati kepentingan ekstrim dari</option>
				<option value="9"'.$selected[9].'>9. Kepentingan ekstrim dari</option>
				</select></td>
				<td align="center"><select name="nilai2_'.$alternatif[$i][0].'_'.$alternatif[$ii][0].'">
				<option value="1"'.$selected2[1].'>1. Sama penting dengan</option>
				<option value="2"'.$selected2[2].'>2. Mendekati sedikit lebih penting dari</option>
				<option value="3"'.$selected2[3].'>3. Agak lebih penting dari</option>
				<option value="4"'.$selected2[4].'>4. Mendekati lebih penting dari</option>
				<option value="5"'.$selected2[5].'>5. Cukup penting dari</option>
				<option value="6"'.$selected2[6].'>6. Mendekati sangat penting dari</option>
				<option value="7"'.$selected2[7].'>7. Sangat penting dari</option>
				<option value="8"'.$selected2[8].'>8. Mendekati kepentingan ekstrim dari</option>
				<option value="9"'.$selected2[9].'>9. Kepentingan ekstrim dari</option>
				</select></td>

				<td>'.$alternatif[$ii][1].'</td>
			  </tr>
			';
			$selected[$nilai]='';
			$selected2[$nilai2]='';
			$counter++;
		}
	}
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
</script>

<form action="" name="" method="post" enctype="multipart/form-data">
<?php
if(!empty($error)){
	echo '
	   <div class="alert alert-error ">
		  '.$error.'
	   </div>
	';
}
if(!empty($success)){
	echo '
	   <div class="alert alert-success ">
		  '.$success.'
	   </div>
	';
}
?>
<section id="palternatif" class="section-gray">
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
                      	<th>Nama alternatif</th>
						<th>Nilai Perbandingan</th>
						<th>Nilai Perbandingan</th>
						<th>Nama alternatif</th>
                    </tr>
                  </thead>
                  <tbody>
					<?php echo $daftar;?>
                  </tbody> 
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
       <button type="submit" name="save" class="btn blue"><i class="icon-ok"></i> Simpan</button>	
		<button type="submit" name="reset" class="btn" onclick="return(ResetConfirm());">Reset Nilai</button>
		<button type="submit" name="resetall" class="btn" onclick="return(ResetConfirm());">Reset Semua</button>
    </div>
  </section>
</form>