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
						if ($i == $ii) {
							$data_input = array(
							'id_kriteria_1' => $kriteria[$i][0],
							'id_kriteria_2' => $kriteria[$ii][0],
							'kode' => $kriteria[$i][0].$kriteria[$ii][0],
							'nilai' => 1,
							'nilaimin' => 1,
							'nilaimax' => 1
						);
						$this->User_model->insertData('t_nilai_kriteria_'.$id, $data_input);
						}elseif($i < $ii){
							$nilai = $this->input->post('nilai_'.$kriteria[$i][0].'_'.$kriteria[$ii][0]);
							if ($nilai == 9 || $nilai == 1 || $nilai == 0.1111) {
								$nilaimin = $nilai;
								$nilaimax = $nilai;
							}elseif($nilai == 8 || $nilai == 7 || $nilai == 6 ||$nilai == 5 || $nilai == 4 || $nilai == 3 || $nilai == 2){
								$nilaimin = $nilai-1;
								$nilaimax = $nilai+1;
							}elseif ($nilai == 0.125) {
								$nilaimin = 0.1111;
								$nilaimax = 0.1428;
							}elseif ($nilai == 0.1428) {
								$nilaimin = 0.125;
								$nilaimax = 0.1667;
							}elseif ($nilai == 0.1667) {
								$nilaimin = 0.1428;
								$nilaimax = 0.2;
							}elseif ($nilai == 0.2) {
								$nilaimin = 0.1667;
								$nilaimax = 0.25;
							}elseif ($nilai == 0.25) {
								$nilaimin = 0.2;
								$nilaimax = 0.3333;
							}elseif ($nilai == 0.3333) {
								$nilaimin = 0.25;
								$nilaimax = 0.5;
							}elseif ($nilai == 0.5) {
								$nilaimin = 0.3333;
								$nilaimax = 1;
							}
							$data_input = array(
							'id_kriteria_1' => $kriteria[$i][0],
							'id_kriteria_2' => $kriteria[$ii][0],
							'kode' => $kriteria[$i][0].$kriteria[$ii][0],
							'nilai' => $nilai,
							'nilaimin' => $nilaimin,
							'nilaimax' => $nilaimax
							);
							$this->User_model->insertData('t_nilai_kriteria_'.$id, $data_input);

							$data_input = array(
							'id_kriteria_1' => $kriteria[$ii][0],
							'id_kriteria_2' => $kriteria[$i][0],
							'kode' => $kriteria[$ii][0].$kriteria[$i][0],
							'nilai' => round((1/$nilai),4),
							'nilaimin' => round((1/$nilaimax),4),
							'nilaimax' => round((1/$nilaimin),4)
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
						if ($i == $ii) {
							$data_input = array(
							'id_kriteria_1' => $kriteria[$i][0],
							'id_kriteria_2' => $kriteria[$ii][0],
							'kode' => $kriteria[$i][0].$kriteria[$ii][0],
							'nilai' => 1,
							'nilaimin' => 1,
							'nilaimax' => 1
						);
						$this->User_model->insertData('t_nilai_kriteria_'.$id, $data_input);
						}elseif($i < $ii){
							$nilai = $this->input->post('nilai_'.$kriteria[$i][0].'_'.$kriteria[$ii][0]);
							if ($nilai == 9 || $nilai == 1 || $nilai == 0.1111) {
								$nilaimin = $nilai;
								$nilaimax = $nilai;
							}elseif($nilai == 8 || $nilai == 7 || $nilai == 6 ||$nilai == 5 || $nilai == 4 || $nilai == 3 || $nilai == 2){
								$nilaimin = $nilai-1;
								$nilaimax = $nilai+1;
							}elseif ($nilai == 0.125) {
								$nilaimin = 0.1111;
								$nilaimax = 0.1428;
							}elseif ($nilai == 0.1428) {
								$nilaimin = 0.125;
								$nilaimax = 0.1667;
							}elseif ($nilai == 0.1667) {
								$nilaimin = 0.1428;
								$nilaimax = 0.2;
							}elseif ($nilai == 0.2) {
								$nilaimin = 0.1667;
								$nilaimax = 0.25;
							}elseif ($nilai == 0.25) {
								$nilaimin = 0.2;
								$nilaimax = 0.3333;
							}elseif ($nilai == 0.3333) {
								$nilaimin = 0.25;
								$nilaimax = 0.5;
							}elseif ($nilai == 0.5) {
								$nilaimin = 0.3333;
								$nilaimax = 1;
							}
							$data_input = array(
							'id_kriteria_1' => $kriteria[$i][0],
							'id_kriteria_2' => $kriteria[$ii][0],
							'kode' => $kriteria[$i][0].$kriteria[$ii][0],
							'nilai' => $nilai,
							'nilaimin' => $nilaimin,
							'nilaimax' => $nilaimax
							);
							$this->User_model->insertData('t_nilai_kriteria_'.$id, $data_input);
							
							$data_input = array(
							'id_kriteria_1' => $kriteria[$ii][0],
							'id_kriteria_2' => $kriteria[$i][0],
							'kode' => $kriteria[$ii][0].$kriteria[$i][0],
							'nilai' => round((1/$nilai),4),
							'nilaimin' => round((1/$nilaimax),4),
							'nilaimax' => round((1/$nilaimin),4)
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
				redirect('roadmap/isi_fuzzy_kriteria/'.$id.'/KRITERIA','refresh');
	    		// redirect('home/nilaialternatif/1','refresh');
    		}
    }

    
	public function insertBobotalternatif($id_kriteria)
	{
		if ($id_kriteria == 1) {
			$informasi = $this->User_model->getDataSubkriteria('t_isneed', 'id_kategori_analisis', 'FNC');
      	}elseif ($id_kriteria == 2) {
			$informasi = $this->User_model->getDataSubkriteria('t_isneed', 'id_kategori_analisis', 'CST');
      	}elseif ($id_kriteria == 3) {
			$informasi = $this->User_model->getDataSubkriteria('t_isneed', 'id_kategori_analisis', 'INT');
      	}elseif ($id_kriteria == 4) {
			$informasi = $this->User_model->getDataSubkriteria('t_isneed', 'id_kategori_analisis', 'LEA');
      	}
      	// $informasi = $this->User_model->getData('t_isneed');
		$id = $this->input->post('id');
		foreach($informasi as $row){
			$alternatif[]=array($row->id_isneed,$row->isneed);
		}

		if(isset($_POST['save'])){
			$this->User_model->delete('t_nilai_alternatif_'.$id, 'id_kriteria', $id_kriteria);
			for($i=0;$i<count($alternatif);$i++){
				for($ii=0;$ii<count($alternatif);$ii++){
					if ($i == $ii) {
							$data_input = array(
							'id_kriteria' => $id_kriteria,
							'id_alternatif_1' => $alternatif[$i][0],
							'id_alternatif_2' => $alternatif[$ii][0],
							'kode' => $id_kriteria.$alternatif[$i][0].$alternatif[$ii][0],
							'nilai' => 1,
							'nilaimin' => 1,
							'nilaimax' => 1
						);
						$this->User_model->insertData('t_nilai_alternatif_'.$id, $data_input);
					}elseif($i < $ii){
						$nilai = $this->input->post('nilai_'.$alternatif[$i][0].'_'.$alternatif[$ii][0]);
						if ($nilai == 9 || $nilai == 1 || $nilai == 0.1111) {
							$nilaimin = $nilai;
							$nilaimax = $nilai;
						}elseif($nilai == 8 || $nilai == 7 || $nilai == 6 ||$nilai == 5 || $nilai == 4 || $nilai == 3 || $nilai == 2){
							$nilaimin = $nilai-1;
							$nilaimax = $nilai+1;
						}elseif ($nilai == 0.125) {
							$nilaimin = 0.1111;
							$nilaimax = 0.1428;
						}elseif ($nilai == 0.1428) {
							$nilaimin = 0.125;
							$nilaimax = 0.1667;
						}elseif ($nilai == 0.1667) {
							$nilaimin = 0.1428;
							$nilaimax = 0.2;
						}elseif ($nilai == 0.2) {
							$nilaimin = 0.1667;
							$nilaimax = 0.25;
						}elseif ($nilai == 0.25) {
							$nilaimin = 0.2;
							$nilaimax = 0.3333;
						}elseif ($nilai == 0.3333) {
							$nilaimin = 0.25;
							$nilaimax = 0.5;
						}elseif ($nilai == 0.5) {
							$nilaimin = 0.3333;
							$nilaimax = 1;
						}

						$data_input = array(
							'id_kriteria' => $id_kriteria,
							'id_alternatif_1' => $alternatif[$i][0],
							'id_alternatif_2' => $alternatif[$ii][0],
							'kode' => $id_kriteria.$alternatif[$i][0].$alternatif[$ii][0],
							'nilai' => $nilai,
							'nilaimin' => $nilaimin,
							'nilaimax' => $nilaimax
						);
						$this->User_model->insertData('t_nilai_alternatif_'.$id, $data_input);

						$data_input = array(
							'id_kriteria' => $id_kriteria,
							'id_alternatif_1' => $alternatif[$ii][0],
							'id_alternatif_2' => $alternatif[$i][0],
							'kode' => $id_kriteria.$alternatif[$ii][0].$alternatif[$i][0],
							'nilai' => round((1/$nilai),4),
							'nilaimin' => round((1/$nilaimax),4),
							'nilaimax' => round((1/$nilaimin),4)
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
						'nilai' => 1,
						'nilaimin' => 1,
						'nilaimax' => 1
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
					if ($i == $ii) {
							$data_input = array(
							'id_kriteria' => $id_kriteria,
							'id_alternatif_1' => $alternatif[$i][0],
							'id_alternatif_2' => $alternatif[$ii][0],
							'kode' => $id_kriteria.$alternatif[$i][0].$alternatif[$ii][0],
							'nilai' => 1,
							'nilaimin' => 1,
							'nilaimax' => 1
						);
						$this->User_model->insertData('t_nilai_alternatif_'.$id, $data_input);
					}elseif($i < $ii){
						$nilai = $this->input->post('nilai_'.$alternatif[$i][0].'_'.$alternatif[$ii][0]);
						if ($nilai == 9 || $nilai == 1 || $nilai == 0.1111) {
							$nilaimin = $nilai;
							$nilaimax = $nilai;
						}elseif($nilai == 8 || $nilai == 7 || $nilai == 6 ||$nilai == 5 || $nilai == 4 || $nilai == 3 || $nilai == 2){
							$nilaimin = $nilai-1;
							$nilaimax = $nilai+1;
						}elseif ($nilai == 0.125) {
							$nilaimin = 0.1111;
							$nilaimax = 0.1428;
						}elseif ($nilai == 0.1428) {
							$nilaimin = 0.125;
							$nilaimax = 0.1667;
						}elseif ($nilai == 0.1667) {
							$nilaimin = 0.1428;
							$nilaimax = 0.2;
						}elseif ($nilai == 0.2) {
							$nilaimin = 0.1667;
							$nilaimax = 0.25;
						}elseif ($nilai == 0.25) {
							$nilaimin = 0.2;
							$nilaimax = 0.3333;
						}elseif ($nilai == 0.3333) {
							$nilaimin = 0.25;
							$nilaimax = 0.5;
						}elseif ($nilai == 0.5) {
							$nilaimin = 0.3333;
							$nilaimax = 1;
						}
						$data_input = array(
							'id_kriteria' => $id_kriteria,
							'id_alternatif_1' => $alternatif[$i][0],
							'id_alternatif_2' => $alternatif[$ii][0],
							'kode' => $id_kriteria.$alternatif[$i][0].$alternatif[$ii][0],
							'nilai' => $nilai,
							'nilaimin' => $nilaimin,
							'nilaimax' => $nilaimax
						);
						$this->User_model->insertData('t_nilai_alternatif_'.$id, $data_input);

						$data_input = array(
							'id_kriteria' => $id_kriteria,
							'id_alternatif_1' => $alternatif[$ii][0],
							'id_alternatif_2' => $alternatif[$i][0],
							'kode' => $id_kriteria.$alternatif[$ii][0].$alternatif[$i][0],
							'nilai' => round((1/$nilai),4),
							'nilaimin' => round((1/$nilaimax),4),
							'nilaimax' => round((1/$nilaimin),4)
						);
						$this->User_model->insertData('t_nilai_alternatif_'.$id, $data_input);
					}
				}
			}
			if ($id_kriteria == 1) {
				redirect('roadmap/isi_fuzzy_alternatif/'.$id.'/FNC','refresh');
	      	}elseif ($id_kriteria == 2) {
				redirect('roadmap/isi_fuzzy_alternatif/'.$id.'/CST','refresh');
	      	}elseif ($id_kriteria == 3) {
				redirect('roadmap/isi_fuzzy_alternatif/'.$id.'/INT','refresh');
	      	}elseif ($id_kriteria == 4) {
				redirect('roadmap/isi_fuzzy_alternatif/'.$id.'/LEA','refresh');
	      	}
			// $id_kriteria = $id_kriteria+1;
			// redirect('home/nilaialternatif/'.$id_kriteria,'refresh');
		}
		if (isset($_POST['selesai'])) {
			$this->User_model->delete('t_nilai_alternatif_'.$id, 'id_kriteria', $id_kriteria);
			for($i=0;$i<count($alternatif);$i++){
				for($ii=0;$ii<count($alternatif);$ii++){
					if ($i == $ii) {
							$data_input = array(
							'id_kriteria' => $id_kriteria,
							'id_alternatif_1' => $alternatif[$i][0],
							'id_alternatif_2' => $alternatif[$ii][0],
							'kode' => $id_kriteria.$alternatif[$i][0].$alternatif[$ii][0],
							'nilai' => 1,
							'nilaimin' => 1,
							'nilaimax' => 1
						);
						$this->User_model->insertData('t_nilai_alternatif_'.$id, $data_input);
					}elseif($i < $ii){
						$nilai = $this->input->post('nilai_'.$alternatif[$i][0].'_'.$alternatif[$ii][0]);
						if ($nilai == 9 || $nilai == 1 || $nilai == 0.1111) {
							$nilaimin = $nilai;
							$nilaimax = $nilai;
						}elseif($nilai == 8 || $nilai == 7 || $nilai == 6 ||$nilai == 5 || $nilai == 4 || $nilai == 3 || $nilai == 2){
							$nilaimin = $nilai-1;
							$nilaimax = $nilai+1;
						}elseif ($nilai == 0.125) {
							$nilaimin = 0.1111;
							$nilaimax = 0.1428;
						}elseif ($nilai == 0.1428) {
							$nilaimin = 0.125;
							$nilaimax = 0.1667;
						}elseif ($nilai == 0.1667) {
							$nilaimin = 0.1428;
							$nilaimax = 0.2;
						}elseif ($nilai == 0.2) {
							$nilaimin = 0.1667;
							$nilaimax = 0.25;
						}elseif ($nilai == 0.25) {
							$nilaimin = 0.2;
							$nilaimax = 0.3333;
						}elseif ($nilai == 0.3333) {
							$nilaimin = 0.25;
							$nilaimax = 0.5;
						}elseif ($nilai == 0.5) {
							$nilaimin = 0.3333;
							$nilaimax = 1;
						}
						$data_input = array(
							'id_kriteria' => $id_kriteria,
							'id_alternatif_1' => $alternatif[$i][0],
							'id_alternatif_2' => $alternatif[$ii][0],
							'kode' => $id_kriteria.$alternatif[$i][0].$alternatif[$ii][0],
							'nilai' => $nilai,
							'nilaimin' => $nilaimin,
							'nilaimax' => $nilaimax
						);
						$this->User_model->insertData('t_nilai_alternatif_'.$id, $data_input);

						$data_input = array(
							'id_kriteria' => $id_kriteria,
							'id_alternatif_1' => $alternatif[$ii][0],
							'id_alternatif_2' => $alternatif[$i][0],
							'kode' => $id_kriteria.$alternatif[$ii][0].$alternatif[$i][0],
							'nilai' => round((1/$nilai),4),
							'nilaimin' => round((1/$nilaimax),4),
							'nilaimax' => round((1/$nilaimin),4)
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
			redirect('roadmap/isi_fuzzy_alternatif/'.$id.'/LEA','refresh');
    		// redirect('roadmap/isi_nilai_kriteria','refresh');

		}

	}
	
  public function isi_fuzzy_kriteria($id, $tipe)
    {
    	$this->User_model->delete('t_fuzzy_hasil_kriteria_'.$id, 'tipe', $tipe);
    	$this->User_model->delete('t_fuzzy_kriteria_'.$id, 'tipe', $tipe);
		$jumlah_total = 0;
		$jumlah_total_max = 0;
		$jumlah_total_min = 0;
			$data = $this->User_model->getData('t_nilai_kriteria_'.$id);
			$kriteria = $this->User_model->getData('t_kriteria');
    	

		foreach ($kriteria as $row) {
			$jumlah_baris =0;
			$jumlah_baris_min =0;
			$jumlah_baris_max =0;
			foreach ($data as $key) {
				if ($row->id_kriteria == $key->id_kriteria_1) {
					$jumlah_baris = $jumlah_baris + $key->nilai;
					$jumlah_baris_min = $jumlah_baris_min + $key->nilaimin;
					$jumlah_baris_max = $jumlah_baris_max + $key->nilaimax;
				}
			}
			$data_input=array(
				'tipe' => $tipe,
				'id_kriteria' => $row->id_kriteria,
				'jumlah_baris' => $jumlah_baris,
				'jumlah_baris_min' => $jumlah_baris_min,
				'jumlah_baris_max' => $jumlah_baris_max,
				
			);
			$this->User_model->insertData('t_fuzzy_kriteria_'.$id, $data_input);
			$jumlah_total = $jumlah_total + $jumlah_baris;
			$jumlah_total_min = $jumlah_total_min + $jumlah_baris_min;
			$jumlah_total_max = $jumlah_total_max + $jumlah_baris_max;
		}
		$data_input=array(
			'tipe' => $tipe,
			'jumlah_total' => $jumlah_total, 
			'jumlah_total_min' => $jumlah_total_min, 
			'jumlah_total_max' => $jumlah_total_max
		);
		$this->User_model->insertData('t_fuzzy_hasil_kriteria_'.$id, $data_input);
		redirect('roadmap/fuzzy_sintetic/'.$id.'/'.$tipe,'refresh');
		// redirect('roadmap/fuzzy_sintetic','refresh');
    }
     public function isi_fuzzy_alternatif($id, $tipe)
    {
    	$this->User_model->delete('t_fuzzy_hasil_kriteria_'.$id, 'tipe', $tipe);
    	$this->User_model->delete('t_fuzzy_kriteria_'.$id, 'tipe', $tipe);
		$jumlah_total = 0;
		$jumlah_total_max = 0;
		$jumlah_total_min = 0;
		$kriteria = $this->User_model->getDataSubkriteria('t_isneed', 'id_kategori_analisis', $tipe);
		if ($tipe == "FNC") {
			$data = $this->User_model->getDataSubkriteria('t_nilai_alternatif_'.$id, 'id_kriteria', 1);
		}elseif ($tipe == "CST") {
			$data = $this->User_model->getDataSubkriteria('t_nilai_alternatif_'.$id, 'id_kriteria', 2);
		}elseif ($tipe == "INT") {
			$data = $this->User_model->getDataSubkriteria('t_nilai_alternatif_'.$id, 'id_kriteria', 3);
		}elseif ($tipe == "LEA") {
			$data = $this->User_model->getDataSubkriteria('t_nilai_alternatif_'.$id, 'id_kriteria', 4);
		}
    	

		foreach ($kriteria as $row) {
			$jumlah_baris =0;
			$jumlah_baris_min =0;
			$jumlah_baris_max =0;
			foreach ($data as $key) {
				if ($row->id_isneed == $key->id_alternatif_1) {
					$jumlah_baris = $jumlah_baris + $key->nilai;
					$jumlah_baris_min = $jumlah_baris_min + $key->nilaimin;
					$jumlah_baris_max = $jumlah_baris_max + $key->nilaimax;
				}
				
			}
			$data_input=array(
				'tipe' => $tipe,
				'id_kriteria' => $row->id_isneed,
				'jumlah_baris' => $jumlah_baris,
				'jumlah_baris_min' => $jumlah_baris_min,
				'jumlah_baris_max' => $jumlah_baris_max,
				
			);
			$this->User_model->insertData('t_fuzzy_kriteria_'.$id, $data_input);
			$jumlah_total = $jumlah_total + $jumlah_baris;
			$jumlah_total_min = $jumlah_total_min + $jumlah_baris_min;
			$jumlah_total_max = $jumlah_total_max + $jumlah_baris_max;
		}
		$data_input=array(
			'tipe' => $tipe,
			'jumlah_total' => $jumlah_total, 
			'jumlah_total_min' => $jumlah_total_min, 
			'jumlah_total_max' => $jumlah_total_max
		);
		$this->User_model->insertData('t_fuzzy_hasil_kriteria_'.$id, $data_input);
		redirect('roadmap/fuzzy_sintetic/'.$id.'/'.$tipe,'refresh');
    }

    public function fuzzy_sintetic($id, $tipe)
    {
    	$this->User_model->delete('t_fuzzy_sintetic_'.$id, 'tipe', $tipe);

       	$data = $this->User_model->getDataSubkriteria('t_fuzzy_kriteria_'.$id, 'tipe', $tipe);
    	$jumlah_kali = $this->User_model->getDataSubkriteria('t_fuzzy_hasil_kriteria_'.$id, 'tipe', $tipe);

    	foreach ($jumlah_kali as $key) {
    		$jumlahkalimin = round((1/$key->jumlah_total_min),4);
    		$jumlahkali = round((1/$key->jumlah_total),4);
    		$jumlahkalimax = round((1/$key->jumlah_total_max),4);
    	}

    	foreach ($data as $key) {
    		$fsmin = $key->jumlah_baris_min * $jumlahkalimax;
    		$fs = $key->jumlah_baris * $jumlahkali;
    		$fsmax = $key->jumlah_baris_max * $jumlahkalimin;
    		$id_kriteria = $key->id_kriteria;
    		$data_input=array(
    			'id_kriteria' => $id_kriteria, 
    			'tipe' => $tipe, 
    			'fuzzy_sintetic_min' => $fsmin, 
    			'fuzzy_sintetic' => $fs, 
    			'fuzzy_sintetic_max' => $fsmax, 
    		);
    		$this->User_model->insertData('t_fuzzy_sintetic_'.$id, $data_input);
    	}
    	redirect('roadmap/fuzzy_vektor/'.$id.'/'.$tipe,'refresh');
    }
    public function fuzzy_vektor($id, $tipe)
    {
    	$this->User_model->delete('t_fuzzy_vektor_minimal_'.$id, 'tipe', $tipe);
    	$data = $this->User_model->getDataSubkriteria('t_fuzzy_sintetic_'.$id, 'tipe', $tipe);
    	$jumlahdata = count($data);
    	$nilaitotal = 0;
    	for ($i=0; $i < $jumlahdata; $i++) {
    		$nilaimin[$i] = 9999; 
    		for ($j=0; $j < $jumlahdata; $j++) { 
    			if ($i != $j) {
    				if($data[$i]->fuzzy_sintetic >= $data[$j]->fuzzy_sintetic) {
    					$nilai[$i][$j] = 1;
    				}elseif($data[$j]->fuzzy_sintetic_min >= $data[$i]->fuzzy_sintetic_max ) {
						$nilai[$i][$j] = 0;
					}else{
						$nilai[$i][$j] = (($data[$j]->fuzzy_sintetic_min - $data[$i]->fuzzy_sintetic_max)/(($data[$i]->fuzzy_sintetic - $data[$i]->fuzzy_sintetic_max)-($data[$j]->fuzzy_sintetic - $data[$j]->fuzzy_sintetic_min)));
					}
    				
    				if ($nilai[$i][$j] < $nilaimin[$i]) {
    					$nilaimin[$i] = $nilai[$i][$j];
    				}
    			// echo $nilai[$i][$j]." ";
    			}
    		}
		// echo "nilai min :".$nilaimin[$i];
    	$data_input = array(
    		'tipe' => $tipe,
    		'id_kriteria' => $data[$i]->id_kriteria,
    		'nilai_minimal' => $nilaimin[$i]
    	);
    	$this->User_model->insertData('t_fuzzy_vektor_minimal_'.$id, $data_input);
		$nilaitotal = $nilaitotal + $nilaimin[$i];
    	// echo "<br/>";
    	}
    	// echo $nilaitotal;
    	redirect('roadmap/fuzzy_normalisasi/'.$id.'/'.$tipe,'refresh');
    }
    public function fuzzy_normalisasi($id, $tipe)
    {
    	$this->User_model->delete('t_fuzzy_nilai_hasil_'.$id, 'tipe', $tipe);
    	// $this->db->query("truncate table t_fuzzy_nilai_hasil");
    	$data_normalisasi = $this->User_model->getDataSubkriteria('t_fuzzy_vektor_minimal_'.$id, 'tipe', $tipe);
    	$total = 0;
    	foreach ($data_normalisasi as $row) {
    		$total = $total + $row->nilai_minimal;
    	}
    	foreach ($data_normalisasi as $row) {
    		$normalisasi = $row->nilai_minimal / $total;
    		$data_input= array(
    			'tipe' => $tipe,
    			'id_kriteria' => $row->id_kriteria,
    			'nilai_hasil' => $normalisasi
    		);
    		$this->User_model->insertData('t_fuzzy_nilai_hasil_'.$id, $data_input);
    	}
    	if ($tipe == 'KRITERIA') {
	    	redirect('home/nilaialternatif/1','refresh');
    	}elseif ($tipe == 'FNC') {
	    	redirect('home/nilaialternatif/2','refresh');
    	}elseif ($tipe == 'CST') {
	    	redirect('home/nilaialternatif/3','refresh');
    	}elseif ($tipe == 'INT') {
	    	redirect('home/nilaialternatif/4','refresh');
    	}elseif ($tipe == 'LEA') {
	    	redirect('roadmap/hasilkeseluruhanfuzzy/'.$id,'refresh');
    	}
    }

    public function hasilkeseluruhanfuzzy($id)
    {
		$this->db->query("truncate table t_fuzzy_perbandingan_semua_".$id);
    	$hasil_fuzzy = $this->User_model->getData('t_fuzzy_nilai_hasil_'.$id);
    	foreach ($hasil_fuzzy as $key => $value){
			if ($value->tipe == 'KRITERIA'){
			$data[$value->id_kriteria] = array(
				'id_kriteria' => $value->id_kriteria,
				'nilai_hasil' => $value->nilai_hasil
			);
			}
		}
	
		foreach ($hasil_fuzzy as $key => $value){
			if ($value->tipe != 'KRITERIA') {
				if ($value->tipe == 'FNC'){
					$nilai_akhir = $value->nilai_hasil * $data[1]['nilai_hasil'];
				}elseif ($value->tipe == 'CST') {
					$nilai_akhir = $value->nilai_hasil * $data[2]['nilai_hasil'];
				}elseif ($value->tipe == 'INT') {
					$nilai_akhir = $value->nilai_hasil * $data[3]['nilai_hasil'];
				}elseif ($value->tipe == 'LEA') {
					$nilai_akhir = $value->nilai_hasil * $data[4]['nilai_hasil'];
				}

				$data_input = array(
					'id_isneed' => $value->id_kriteria,
					'tipe' => $value->tipe,
					'nilai_hasil' => $nilai_akhir 
				);
				$this->User_model->insertData('t_fuzzy_perbandingan_semua_'.$id, $data_input);
			}
		}
		redirect('home/tunggu','refresh');
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
      	$total_sudah_isi_bobot_alternatif = 0;
    	foreach ($user as $row) {
    		$id = $row->id_user;
    		$alternatif[$id] = $this->User_model->getDatakumulatif('t_nilai_kriteria_'.$id);
    		if ($row->alternatif == 1) {
    			$total_sudah_isi_bobot_alternatif++;
    		}
    	}
    	if ($total_sudah_isi_bobot_alternatif == $jumlah_user) {
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
    	}else{
    		redirect('home/tunggu','refresh');
    	}

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

      		$datauser = $_SESSION['list'];
	      	foreach ($datauser as $row) {
		        $id = $row['id_user'];
	      	}
			$data['content'] = "content/rekomendasi.php";
			$data['page'] = 'roadmap';
			$data['hasil'] = $this->User_model->hasil('t_isneed','nilai_hasil', 't_isneed.id_isneed=nilai_hasil.id_isneed');
			$data['kriteria'] = $informasi_kriteria;
			$this->load->view('dashboard.php', $data);

    	}else{
    		echo $total;
    	}
	}

	
}
