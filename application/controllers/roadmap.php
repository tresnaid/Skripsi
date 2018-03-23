<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roadmap extends CI_Controller {

    public function insertBobotKriteria()
    {
    	$id = $this->input->post('id');
    	$informasi = $this->User_model->getData('t_kriteria');
    	foreach($informasi as $row){
			$kriteria[]=array($row->id_kriteria,$row->nama_kriteria);
		}
			if(isset($_POST['save'])){
				$this->db->query("truncate table t_nilai_kriteria_".$id);
				for($i=0;$i<count($kriteria);$i++){
					for($ii=0;$ii<count($kriteria);$ii++){
						if($i < $ii){
							$data_input = array(
							'id_kriteria_1' => $kriteria[$i][0],
							'id_kriteria_2' => $kriteria[$ii][0],
							'kode' => $kriteria[$i][0].$kriteria[$ii][0],
							'nilai' => $this->input->post('nilai_'.$kriteria[$i][0].'_'.$kriteria[$ii][0])
						);
						$this->User_model->insertData('t_nilai_kriteria_'.$id, $data_input);

						}
					}
				}
    			redirect('home/nilaikriteria','refresh');
    		}
    		if(isset($_POST['reset'])){
				$this->db->query("truncate table t_nilai_kriteria_".$id);
    			redirect('home/nilaikriteria','refresh');
			
			}
			if(isset($_POST['next'])){
				$this->db->query("truncate table t_nilai_kriteria_".$id);
				for($i=0;$i<count($kriteria);$i++){
					for($ii=0;$ii<count($kriteria);$ii++){
						if($i < $ii){
							$data_input = array(
							'id_kriteria_1' => $kriteria[$i][0],
							'id_kriteria_2' => $kriteria[$ii][0],
							'kode' => $kriteria[$i][0].$kriteria[$ii][0],
							'nilai' => $this->input->post('nilai_'.$kriteria[$i][0].'_'.$kriteria[$ii][0])
						);
						$this->User_model->insertData('t_nilai_kriteria_'.$id, $data_input);

						}
					}
				}
		      	$data_update = array(
		      		'kriteria' => 1
		      	);
		      	$this->User_model->updateData('t_user', 'id_user', $id, $data_update);
		      	$data = array(
					'login' => TRUE,
					'list' => $this->User_model->getOneData('t_user','id_user',$id)
				);
				$this->session->set_userdata($data);
	    		redirect('home/nilaialternatif/1','refresh');
    		}
    }

    public function isi_nilai_kriteria()
    {

		$this->db->query("truncate table t_nilai_kriteria");
    	$user = $this->User_model->getData('t_user');
    	$jumlah_user = count($user);
    	$datauser = $_SESSION['list'];
      	
      	foreach ($datauser as $row) {
	        $id_user = $row['id_user']; 
      	}

    	foreach ($user as $row) {
    		$id = $row->id_user;
    		$alternatif[$id] = $this->User_model->getDatakumulatif('t_nilai_kriteria_'.$id);
    	}

    	foreach ($alternatif[$id_user] as $key => $value) {
    		$nilai = 0;
	    	foreach ($user as $row) {
    			$id = $row->id_user;
    			$nilaisaatini = $this->User_model->checknilaikriteria($value->kode, $id);
    			$nilai = $nilai + $nilaisaatini;
    		}
    		$nilai = $nilai/$jumlah_user;

    		$data_input = array(
    			'id_kriteria_1' => $value->id_kriteria_1,
    			'id_kriteria_2' => $value->id_kriteria_2,
    			'kode' => $value->kode,
    			'nilai' => $nilai
    		);
    		$this->User_model->insertData('t_nilai_kriteria', $data_input);
    	}

    	redirect('roadmap/isi_nilai_alternatif','refresh');
    }


    public function isi_nilai_alternatif()
    {

		$this->db->query("truncate table t_nilai_alternatif");
    	$user = $this->User_model->getData('t_user');
    	$jumlah_user = count($user);
    	$datauser = $_SESSION['list'];
      	
      	foreach ($datauser as $row) {
	        $id_user = $row['id_user']; 
      	}

    	foreach ($user as $row) {
    		$id = $row->id_user;
    		$alternatif[$id] = $this->User_model->getDatakumulatif('t_nilai_alternatif_'.$id);
    	}

    	foreach ($alternatif[$id_user] as $key => $value) {
    		$nilai = 0;
	    	foreach ($user as $row) {
    			$id = $row->id_user;
    			$nilaisaatini = $this->User_model->checknilaialternatif($value->kode, $id);
    			$nilai = $nilai + $nilaisaatini;
    		}
    		$nilai = $nilai/$jumlah_user;

    		$data_input = array(
    			'id_kriteria' => $value->id_kriteria,
    			'id_alternatif_1' => $value->id_alternatif_1,
    			'id_alternatif_2' => $value->id_alternatif_2,
    			'kode' => $value->kode,
    			'nilai' => $nilai
    		);
    		$this->User_model->insertData('t_nilai_alternatif', $data_input);
    	}
    	redirect('roadmap/hasilroadmap','refresh');


    }
	
	public function insertBobotalternatif($id_kriteria)
	{
		$informasi = $this->User_model->getData('t_isneed');
		$id = $this->input->post('id');
		foreach($informasi as $row){
			$alternatif[]=array($row->id_isneed,$row->isneed);
		}

		if(isset($_POST['save'])){
			$this->User_model->delete('t_nilai_alternatif_'.$id, 'id_kriteria', $id_kriteria);
			for($i=0;$i<count($alternatif);$i++){
				for($ii=0;$ii<count($alternatif);$ii++){
					if($i < $ii){
						$data_input = array(
							'id_kriteria' => $id_kriteria,
							'id_alternatif_1' => $alternatif[$i][0],
							'id_alternatif_2' => $alternatif[$ii][0],
							'kode' => $id_kriteria.$alternatif[$i][0].$alternatif[$ii][0],
							'nilai' => $this->input->post('nilai_'.$alternatif[$i][0].'_'.$alternatif[$ii][0])
						);
						$this->User_model->insertData('t_nilai_alternatif_'.$id, $data_input);
					}
				}
			}
		redirect('home/nilaialternatif/'.$id_kriteria,'refresh');
		}
		if(isset($_POST['reset'])){
			$this->User_model->delete('t_nilai_alternatif_'.$id, 'id_kriteria', $id_kriteria);
			for($i=0;$i<count($alternatif);$i++){
				for($ii=0;$ii<count($alternatif);$ii++){
					if($i < $ii){
						$data_input = array(
						'id_kriteria' => $id_kriteria,
						'id_alternatif_1' => $alternatif[$i][0],
						'id_alternatif_2' => $alternatif[$ii][0],
						'kode' => $id_kriteria.$alternatif[$i][0].$alternatif[$ii][0],
						'nilai' => 1
					);
					$this->User_model->insertData('t_nilai_alternatif_'.$id, $data_input);
					}
				}
			}
		redirect('home/nilaialternatif/'.$id_kriteria,'refresh');
		}
		if(isset($_POST['resetall'])){
			$this->db->query("truncate table t_nilai_alternatif_".$id);
			redirect('home/nilaialternatif/'.$id_kriteria,'refresh');
		}
		if (isset($_POST['next'])) {
			$this->User_model->delete('t_nilai_alternatif_'.$id, 'id_kriteria', $id_kriteria);
			for($i=0;$i<count($alternatif);$i++){
				for($ii=0;$ii<count($alternatif);$ii++){
					if($i < $ii){
						$data_input = array(
							'id_kriteria' => $id_kriteria,
							'id_alternatif_1' => $alternatif[$i][0],
							'id_alternatif_2' => $alternatif[$ii][0],
							'kode' => $id_kriteria.$alternatif[$i][0].$alternatif[$ii][0],
							'nilai' => $this->input->post('nilai_'.$alternatif[$i][0].'_'.$alternatif[$ii][0])
						);
						$this->User_model->insertData('t_nilai_alternatif_'.$id, $data_input);
					}
				}
			}
			$id_kriteria = $id_kriteria+1;
			redirect('home/nilaialternatif/'.$id_kriteria,'refresh');
		}
		if (isset($_POST['selesai'])) {
			$this->User_model->delete('t_nilai_alternatif_'.$id, 'id_kriteria', $id_kriteria);
			for($i=0;$i<count($alternatif);$i++){
				for($ii=0;$ii<count($alternatif);$ii++){
					if($i < $ii){
						$data_input = array(
							'id_kriteria' => $id_kriteria,
							'id_alternatif_1' => $alternatif[$i][0],
							'id_alternatif_2' => $alternatif[$ii][0],
							'kode' => $id_kriteria.$alternatif[$i][0].$alternatif[$ii][0],
							'nilai' => $this->input->post('nilai_'.$alternatif[$i][0].'_'.$alternatif[$ii][0])
						);
						$this->User_model->insertData('t_nilai_alternatif_'.$id, $data_input);
					}
				}
			}

			$data_update = array(
	      		'alternatif' => 1
	      	);
	      	$this->User_model->updateData('t_user', 'id_user', $id, $data_update);
	      	$data = array(
					'login' => TRUE,
					'list' => $this->User_model->getOneData('t_user','id_user',$id)
				);
			$this->session->set_userdata($data);

	      
    		redirect('roadmap/isi_nilai_kriteria','refresh');

		}

	}
	

	public function hasilroadmap()
	{
		$user = $this->User_model->getData('t_user');
		$total = 0;
		foreach ($user as $row) {
			$statusalternatif = $row->alternatif;
			if ($statusalternatif == 0) {
				redirect('home/tunggu','refresh');
			}else{
				$total++;
			}
    	}
    	if ($total == count($user)) {    		
			$datauser = $_SESSION['list'];
	      	foreach ($datauser as $row) {
		        $id = $row['id_user'];
		        $status_alternatif = $row['alternatif'];
		        $status_kriteria = $row['kriteria'];
	      	}

	      	$data['status_kriteria'] = $status_kriteria;
	      	$data['status_alternatif'] = $status_alternatif;
			$informasi_kriteria = $this->User_model->getData('t_kriteria');
			$informasi_alternatif = $this->User_model->getData('t_isneed');
			
			foreach ($informasi_kriteria as $h) {
			$kriteria[]=array($h->id_kriteria,$h->nama_kriteria);
			$id_kriteria[]=$h->id_kriteria;
			}

			foreach ($informasi_alternatif as $h) {
				$alternatif[]=array($h->id_isneed,$h->isneed);
				$id_alternatif[]=$h->id_isneed;
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

			$data['content'] = "content/rekomendasi.php";
      		$datauser = $_SESSION['list'];
	      	foreach ($datauser as $row) {
		        $id = $row['id_user'];
		        $status_finalisasi = $row['finalisasi'];
		        $status_alternatif = $row['alternatif'];
		        $status_kriteria = $row['kriteria'];
	      	}
	      	$data['status_finalisasi'] = $status_finalisasi;
	      	$data['status_kriteria'] = $status_kriteria;
	      	$data['status_alternatif'] = $status_alternatif;
			$data['page'] = 'roadmap';
			$data['hasil'] = $this->User_model->hasil('t_isneed','nilai_hasil', 't_isneed.id_isneed=nilai_hasil.id_isneed');
			$data['kriteria'] = $informasi_kriteria;
			$this->load->view('dashboard.php', $data);

    	}else{
    		echo $total;
    	}

	}

	
}
