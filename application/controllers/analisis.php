<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analisis extends CI_Controller {

	public function inputAnalisis()
	{
		$version = $_SESSION['version'];
		$objective = $this->input->post('objective');
		$measure = $this->input->post('measure');
		$action = $this->input->post('action');
		$isneed = $this->input->post('isneed');
		$isneed_desc = $this->input->post('isneed_desc');
		$isneed_strategic = $this->input->post('isneed_strategic');
		if ($isneed == "lainnya") {
			$isneed = $this->input->post('isneed_detail');
			$isneed_detail = NULL;
		}else{
			if($isneed_desc == "Perbaharui"){
				$isneed_detail = $this->input->post('isneed_detail');
			}else{
				$isneed_detail = NULL;
			}
		}
		$jumlah_measure =$this->input->post('jumlah_measure');
		$jumlah_action =$this->input->post('jumlah_action');
		$jumlah_isneed =$this->input->post('jumlah_isneed');
		$jumlah_max = $this->User_model->countmax($jumlah_measure, $jumlah_action, $jumlah_isneed);

		$kategori = $this->input->post('kategori');

		$datauser = $_SESSION['list'];
      	foreach ($datauser as $row) {
	        $id = $row['id_user'];
      	}

		$data_input =  array(
			'version' => $version,
			'id_user' => $id,
			'id_kategori_analisis' => $kategori,
			'objective' => $objective 
		);

		$this->User_model->insertData('t_objective', $data_input);
		$id_objective = $this->User_model->checkidobjective($id);
		
		$data_input_measure = array(
			'version' => $version,
				'measure' => $measure,
				'id_user' => $id,
				'id_kategori_analisis' => $kategori, 
				'id_objective' => $id_objective
		);
		$data_input_action = array(
			'version' => $version,
				'action' => $action,
				'id_user' => $id,
				'id_kategori_analisis' => $kategori, 
				'id_objective' => $id_objective
		);
		$data_input_isneed = array(
			'version' => $version,
				'isneed' => $isneed,
				'id_user' => $id,
				'id_kategori_analisis' => $kategori, 
				'tipe' => $isneed_desc,
				'id_objective' => $id_objective,
				'detail' => $isneed_detail,
				'bagan' => $isneed_strategic
		);

		$this->User_model->insertData('t_measure', $data_input_measure);
		$this->User_model->insertData('t_action', $data_input_action);
		$this->User_model->insertData('t_isneed', $data_input_isneed);

		if ($jumlah_measure>0) {
			$measureadd = $this->input->post('measureadd');
			for ($i=0; $i < $jumlah_measure; $i++) { 
				$data_input_measure = array(
			'version' => $version,
					'measure' => $measureadd[$i],
					'id_user' => $id,
					'id_kategori_analisis' => $kategori, 
					'id_objective' => $id_objective
				);
			$this->User_model->insertData('t_measure', $data_input_measure);
			}
		}
		if ($jumlah_action>0) {
			$actionadd = $this->input->post('actionadd');
			for ($i=0; $i < $jumlah_action; $i++) { 
				$data_input_action = array(
			'version' => $version,
					'action' => $actionadd[$i],
					'id_user' => $id,
					'id_kategori_analisis' => $kategori, 
					'id_objective' => $id_objective
				);
			$this->User_model->insertData('t_action', $data_input_action);
			}
		}
		if ($jumlah_isneed>0) {
			$isneedadd = $this->input->post('isneedadd');
			$isneedadd_desc = $this->input->post('isneedadd_desc');
			$isneedadd_detail = $this->input->post('isneedadd_detail'); 
			$isneedadd_strategic = $this->input->post('isneedadd_strategic'); 
			for ($i=0; $i < $jumlah_isneed; $i++) { 
				if ($isneedadd[$i] == "lainnya") {
					$isneedadd[$i] = $isneedadd_detail[$i];
					$isneedadd_detail[$i] = NULL;
				}else{
					if ($isneedadd_desc[$i] != "Perbaharui") {
						$isneedadd_detail[$i] = NULL;
					}
				}
				$data_input_isneed = array(
			'version' => $version,
					'isneed' => $isneedadd[$i],
					'id_user' => $id,
					'id_kategori_analisis' => $kategori, 
					'tipe' => $isneedadd_desc[$i],
					'id_objective' => $id_objective,
					'detail' => $isneedadd_detail[$i],
					'bagan' => $isneedadd_strategic[$i]
				);
				$this->User_model->insertData('t_isneed', $data_input_isneed);			
			}
		
		}
		if ($kategori == 'FNC') {
			redirect('home/analisis/1','refresh');
		}else if ($kategori == 'CST') {
			redirect('home/analisis/2','refresh');
		}else if ($kategori == 'INT') {
			redirect('home/analisis/3','refresh');
		}else if ($kategori == 'LEA') {
			redirect('home/analisis/4','refresh');
		}else{
			echo $kategori;
		}
	}

	public function deleteAnalisis()
	{
		$id = $this->input->post('id_objective');

		$this->User_model->delete('t_objective', 'id_objective', $id);
		$this->User_model->delete('t_approval', 'id_objective', $id);
		$this->User_model->delete('t_measure', 'id_objective', $id);
		$this->User_model->delete('t_action', 'id_objective', $id);
		$this->User_model->delete('t_isneed', 'id_objective', $id);
		$kategori = $this->input->post('kategori');

		if ($kategori == 'FNC') {
			redirect('home/analisis/1','refresh');
		}else if ($kategori == 'CST') {
			redirect('home/analisis/2','refresh');
		}else if ($kategori == 'INT') {
			redirect('home/analisis/3','refresh');
		}else if ($kategori == 'LEA') {
			redirect('home/analisis/4','refresh');
		}else{
			echo $kategori;
		}	
	}


	public function editAnalisis()
	{
		$version = $_SESSION['version'];
		$datauser = $_SESSION['list'];
      	foreach ($datauser as $row) {
	        $id = $row['id_user'];
      	}
		$id_objective = $this->input->post('id_objective');
		$objective = $this->input->post('objective');
		$measure = $this->input->post('measure');
		$id_measure = $this->input->post('id_measure');
		$action = $this->input->post('action');
		$id_action = $this->input->post('id_action');
		$isneed = $this->input->post('isneed');
		$isneed_desc = $this->input->post('isneed_desc_edit');
		$isneed_strategic = $this->input->post('isneed_strategic');
		$id_isneed = $this->input->post('id_isneed');
		$kategori = $this->input->post('kategori');
	
		$data_update_objective = array(
				'objective' => $objective,
				'id_objective' => $id_objective,
		);
		$this->User_model->updateData('t_objective', 'id_objective', $id_objective, $data_update_objective);
		
		if (!empty($measure)) {
			foreach ($measure as $key=> $value) {
				if ($value=='   ' || $value==NULL) {
					$this->User_model->delete('t_measure', 'id_measure', $id_measure[$key]);
				}else{
					$data_update = array(
						'measure' => $value
					);
				$this->User_model->updateData('t_measure', 'id_measure', $id_measure[$key], $data_update);
				}
			}
		}
		if (!empty($action)) {
		foreach ($action as $key=> $value) {
			if ($value=='   ' || $value==NULL) {
				$this->User_model->delete('t_action', 'id_action', $id_action[$key]);
			}else{
				$data_update = array(
					'action' => $value
				);
			$this->User_model->updateData('t_action', 'id_action', $id_action[$key], $data_update);
			}
		}
		}
		if (!empty($isneed)) {
		foreach ($isneed as $key=> $value) {
			if ($value=='   ') {
				$this->User_model->delete('t_isneed', 'id_isneed', $id_isneed[$key]);
			}else{
				$data_update = array(
					'bagan' => $isneed_strategic,
					'detail' => $value,
					'Tipe' => $isneed_desc[$key]
				);
			$this->User_model->updateData('t_isneed', 'id_isneed', $id_isneed[$key], $data_update);
			}
		}
		}

		if (!empty($this->input->post('moremeasure'))) {
			$moremeasure = $this->input->post('moremeasure');
			foreach ($moremeasure as $key => $value) {
				if (!empty($value)) {
					$data_input = array(
						'measure' => $value,
						'version' => $version,
						'id_objective' => $id_objective,
										'id_kategori_analisis' => $kategori, 
										'id_user' => $id
										 );
					$this->User_model->insertData('t_measure', $data_input);
				}
			}
		}
		if (!empty($this->input->post('moreaction'))) {
			$moreaction = $this->input->post('moreaction');
			foreach ($moreaction as $key => $value) {
				if (!empty($value)) {
					$data_input = array(
						'version' => $version,
						'action' => $value,
										'id_objective' => $id_objective,
										'id_kategori_analisis' => $kategori, 
										'id_user' => $id
										 );
					$this->User_model->insertData('t_action', $data_input);
				}
			}
		}
		$moreisneed = $this->input->post('moreisneed');
		$moreisneed_strategic = $this->input->post('moreisneed_strategic');
		// print_r($moreisneed);
		if (!empty($this->input->post('moreisneed'))) {
			$moreisneed = $this->input->post('moreisneed');
			$moreisneed_desc = $this->input->post('moreisneed_desc');
			$moreisneed_detail = $this->input->post('moreisneed_detail');
			foreach ($moreisneed as $key => $value) {
				if (!empty($value)) {
					if ($value == "lainnya") {
						$value = $moreisneed_detail[$key];
						$moreisneed_detail[$key] = NULL;
					}else{
						if ($moreisneed_desc[$key] != "Perbaharui") {
							$moreisneed_detail[$key] = NULL;
						}
					}
					$data_input = array(
						'version' => $version,
						'isneed' => $value,
										'id_objective' => $id_objective,
										'id_kategori_analisis' => $kategori,
										'Tipe' => $moreisneed_desc[$key],
										'detail' => $moreisneed_detail[$key],
										'id_user' => $id,
										'bagan' => $moreisneed_strategic[$key]
										 );
					$this->User_model->insertData('t_isneed', $data_input);
				}
			}
		}

	  if ($kategori == 'FNC') {
			redirect('home/analisis/1','refresh');
		}else if ($kategori == 'CST') {
			redirect('home/analisis/2','refresh');
		}else if ($kategori == 'INT') {
			redirect('home/analisis/3','refresh');
		}else if ($kategori == 'LEA') {
			redirect('home/analisis/4','refresh');
		}else{
			echo $kategori;
		}
	}
	public function inputkomentar()
	{
		$version = $_SESSION['version'];
		$id = $this->input->post('id');
		$id_objective = $this->input->post('id_objective');
		$komentar = $this->input->post('komentar');
		
		$data_input= array(
			'version' => $version,
			'id_user' => $id,
			'id_objective' => $id_objective,
			'komentar' => $komentar
		);
		$this->User_model->insertData('t_komentar_timeline', $data_input);

		redirect('home/dashboard','refresh');
	}

	public function alasanfinalisasi()
	{
		$version = $_SESSION['version'];
		$id = $this->input->post('id');
		$id_objective = $this->input->post('id_objective');
		$alasan = $this->input->post('komentar');
		$kategori = $this->input->post('kategori');
		$data_input= array(
			'version' => $version,
			'id_user' => $id,
			'id_objective' => $id_objective,
			'alasan' => $alasan
		);
		$this->User_model->insertData('t_finalisasi', $data_input);

		if ($kategori == 'FNC') {
			redirect('home/finalisasi/1','refresh');
		}else if ($kategori == 'CST') {
			redirect('home/finalisasi/2','refresh');
		}else if ($kategori == 'INT') {
			redirect('home/finalisasi/3','refresh');
		}else if ($kategori == 'LEA') {
			redirect('home/finalisasi/4','refresh');
		}else{
			echo $kategori;
		}	
	}
	public function approve()
	{
		$version = $_SESSION['version'];
		$id = $this->input->post('id');
		$kategori = $this->input->post('kategori');
		$id_objective = $this->input->post('id_objective');

		if ($this->User_model->CheckId($id, $id_objective) == TRUE) {
			$data_input=array(
				'version' => $version,
				'id_user' => $id,
				'id_objective' => $id_objective
			);
			$this->User_model->insertData('t_approval', $data_input);
		}
		if ($kategori == 'FNC') {
			redirect('home/finalisasi/1','refresh');
		}else if ($kategori == 'CST') {
			redirect('home/finalisasi/2','refresh');
		}else if ($kategori == 'INT') {
			redirect('home/finalisasi/3','refresh');
		}else if ($kategori == 'LEA') {
			redirect('home/finalisasi/4','refresh');
		}else{
			echo $kategori;
		}	

	}
	public function usulkan_analisis()
	{
		$version = $_SESSION['version'];
		$objective = $this->input->post('objective');
		$measure = $this->input->post('measure');
		$action = $this->input->post('action');
		$isneed = $this->input->post('isneed');
		$isneed_desc = $this->input->post('isneed_desc');
		$isneed_strategic = $this->input->post('isneed_strategic');
		$isneed_detail = $this->input->post('isneed_detail');
		$kategori = $this->input->post('kategori');

		$datauser = $_SESSION['list'];
      	foreach ($datauser as $row) {
	        $id = $row['id_user'];
      	}

		$data_input =  array(
			'version' => $version,
			'id_user' => $id,
			'id_kategori_analisis' => $kategori,
			'objective' => $objective 
		);

		$this->User_model->insertData('t_objective', $data_input);
		$id_objective = $this->User_model->checkidobjective($id);
		foreach ($measure as $key) {
			$data_input_measure = array(
				'version' => $version,
				'measure' => $key,
				'id_user' => $id,
				'id_kategori_analisis' => $kategori, 
				'id_objective' => $id_objective
			);
			$this->User_model->insertData('t_measure', $data_input_measure);
		}
		foreach ($action as $key) {
			$data_input_action = array(
				'version' => $version,
				'action' => $key,
				'id_user' => $id,
				'id_kategori_analisis' => $kategori, 
				'id_objective' => $id_objective
			);
			$this->User_model->insertData('t_action', $data_input_action);
		}
		foreach ($isneed as $key => $value) {
			$data_input_isneed = array(
				'version' => $version,
				'isneed' => $value,
				'id_user' => $id,
				'id_kategori_analisis' => $kategori, 
				'tipe' => $isneed_desc[$key],
				'id_objective' => $id_objective,
				'detail' => $isneed_detail[$key],
				'bagan' => $isneed_strategic[$key]
			);
			$this->User_model->insertData('t_isneed', $data_input_isneed);
		}


		if ($kategori == 'FNC') {
			redirect('home/analisis/1','refresh');
		}else if ($kategori == 'CST') {
			redirect('home/analisis/2','refresh');
		}else if ($kategori == 'INT') {
			redirect('home/analisis/3','refresh');
		}else if ($kategori == 'LEA') {
			redirect('home/analisis/4','refresh');
		}else{
			echo $kategori;
		}	
	}
}
