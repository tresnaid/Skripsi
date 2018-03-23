<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		if (!empty($login)) {
			if ($_SESSION['login'] == TRUE) {
				redirect('home/dashboard','refresh');
			}
			else{	
			$this->load->view('index.php');
			}
		}else{
			$this->load->view('index.php');
		}
	}
	public function dashboard()
	{
		$datauser = $_SESSION['list'];
      	foreach ($datauser as $row) {
	        $id = $row['id_user'];
	        $status_kriteria = $row['kriteria']; 
	        $status_alternatif = $row['alternatif'];
      	}
		$data['status_alternatif'] = $status_alternatif;
      	$data['status_kriteria'] = $status_kriteria;
      	$data['page'] = 'timeline';
      	$data['content'] = 'content/timeline';
      	$data['table'] = $this->User_model->timeline('t_objective', 't_user', 't_objective.id_user=t_user.id_user');

		$this->load->view('dashboard.php', $data);
	}
	public function finalisasi($perspective)
	{
		$datauser = $_SESSION['list'];
      	foreach ($datauser as $row) {
	        $id = $row['id_user'];
	        $status_kriteria = $row['kriteria']; 
	        $status_alternatif = $row['alternatif'];
      	}
		$data['status_alternatif'] = $status_alternatif;
      	$data['status_kriteria'] = $status_kriteria;
      	$data['page'] = 'finalisasi';
      	$data['content'] = 'content/finalisasi';
      	$data['table'] = $this->User_model->getData('t_user');
		if ($perspective == '1') {
      		$data['kategori'] ='FNC';
      	}else if ($perspective == '2') {
      		$data['kategori'] ='CST';
      	}
      	else if ($perspective == '3') {
      		$data['kategori'] ='INT';
      	}else if ($perspective == '4') {
      		$data['kategori'] ='LEA';
      	}
		$this->load->view('dashboard.php', $data);
	}
	
	public function nilaikriteria()
	{
		$datauser = $_SESSION['list'];
      	foreach ($datauser as $row) {
	        $id = $row['id_user'];
	        $status_kriteria = $row['kriteria'];
	        $status_alternatif = $row['alternatif'];
      	}
		$data['status_alternatif'] = $status_alternatif;
      	$data['informasi'] = $this->User_model->getData('t_kriteria');
      	$data['page'] = 'roadmap';
      	$data['id_user'] = $id;
      	$data['content'] = 'content/nilai_kriteria';
      	$data['status_kriteria'] = $status_kriteria;
		$this->load->view('dashboard.php', $data);
    }
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

    	redirect('home/isi_nilai_alternatif','refresh');
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
    	redirect('home/hasilroadmap','refresh');


    }
	public function nilaialternatif($kriteria)
	{
		$datauser = $_SESSION['list'];
      	foreach ($datauser as $row) {
	        $id = $row['id_user'];
	        $status_kriteria = $row['kriteria'];
	        $status_alternatif = $row['alternatif'];
      	}
      	$data['status_kriteria'] = $status_kriteria;
      	$data['status_alternatif'] = $status_alternatif;
      	$data['menu'] = 'content/menu';
      	$data['informasi_kriteria'] = $this->User_model->getData('t_kriteria');
		$data['informasi'] = $this->User_model->getData('t_isneed');
      	$data['page'] = 'roadmap';
      	$data['content'] = 'content/nilai_alternatif';
      	$data['id_kriteria'] = $kriteria;
      	$data['id_user'] = $id;
		$this->load->view('dashboard.php', $data);
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
    		// redirect('home/hasilroadmap','refresh');
    		redirect('home/isi_nilai_kriteria','refresh');


		}

	}
	public function hasilroadmap()
	{
		$user = $this->User_model->getData('t_user');
		foreach ($user as $row) {
			$alternatif = $row->alternatif;
			if ($alternatif == 0) {
				echo "tunggu";
				echo "<br/>";
			}else{
				echo "oke";
				echo "<br/>";
			}
    	}


		// $datauser = $_SESSION['list'];
  //     	foreach ($datauser as $row) {
	 //        $id = $row['id_user'];
	 //        $status_alternatif = $row['alternatif'];
	 //        $status_kriteria = $row['kriteria'];
  //     	}

  //     	$data['status_kriteria'] = $status_kriteria;
  //     	$data['status_alternatif'] = $status_alternatif;
		// $informasi_kriteria = $this->User_model->getData('t_kriteria');
		// $informasi_alternatif = $this->User_model->getData('t_isneed');
		
		// foreach ($informasi_kriteria as $h) {
		// $kriteria[]=array($h->id_kriteria,$h->nama_kriteria);
		// $id_kriteria[]=$h->id_kriteria;
		// }

		// foreach ($informasi_alternatif as $h) {
		// 	$alternatif[]=array($h->id_isneed,$h->isneed);
		// 	$id_alternatif[]=$h->id_isneed;
		// }
		
		// $matrik_kriteria = $this->User_model->ahp_get_matrik_kriteria($id_kriteria);
		// $jumlah_kolom = $this->User_model->ahp_get_jumlah_kolom($matrik_kriteria);
		// $matrik_normalisasi = $this->User_model->ahp_get_normalisasi($matrik_kriteria, $jumlah_kolom);
		// $eigen_kriteria = $this->User_model->ahp_get_eigen($matrik_normalisasi);

		// for($i=0;$i<count($kriteria);$i++){
		// 	$matrik_alternatif = $this->User_model->ahp_get_matrik_alternatif($kriteria[$i][0], $id_alternatif);
		// 	$jumlah_kolom_alternatif = $this->User_model->ahp_get_jumlah_kolom($matrik_alternatif);
		// 	$matrik_normalisasi_alternatif = $this->User_model->ahp_get_normalisasi($matrik_alternatif, $jumlah_kolom_alternatif);
		// 	$eigen_alternatif[$i] = $this->User_model->ahp_get_eigen($matrik_normalisasi_alternatif);
		// }

		// $nilai_to_sort = array();
		// $this->db->query("truncate table nilai_hasil");
		// for($i=0;$i<count($alternatif);$i++){
		// 	$nilai=0;
		// 	for($ii=0;$ii<count($kriteria);$ii++){
		// 		$nilai = $nilai + ( $eigen_alternatif[$ii][$i] * $eigen_kriteria[$ii]);
		// 		$nilaialternatif[$i][] = $eigen_alternatif[$ii][$i];
		// 	}
		// 	$nilai = round( $nilai , 4);
		// 	$nilai_global[$i] = $nilai;
		// 	$nilai_to_sort[] = array($nilai, $alternatif[$i][0]);
		// 	$data_input = array(
		// 		'id_isneed' => $id_alternatif[$i],
		// 		'nilai' => $nilai,
		// 		'nilai_kriteria_1' => $nilaialternatif[$i][0],
		// 		'nilai_kriteria_2' => $nilaialternatif[$i][1],
		// 		'nilai_kriteria_3' => $nilaialternatif[$i][2],
		// 		'nilai_kriteria_4' => $nilaialternatif[$i][3]
		// 	);
		// 	$this->User_model->insertData('nilai_hasil', $data_input);
		// }

		// $data['content'] = "content/rekomendasi.php";
		// $data['page'] = 'roadmap';
		// $data['hasil'] = $this->User_model->hasil('t_isneed','nilai_hasil', 't_isneed.id_isneed=nilai_hasil.id_isneed');
		// $data['kriteria'] = $informasi_kriteria;
		// $this->load->view('dashboard.php', $data);
	}

	public function analisis($perspective)
	{
		$datauser = $_SESSION['list'];
      	foreach ($datauser as $row) {
	        $id = $row['id_user'];
	        $status_alternatif = $row['alternatif'];
	        $status_kriteria = $row['kriteria'];
      	}
      	$data['status_kriteria'] = $status_kriteria;
      	$data['status_alternatif'] = $status_alternatif;
      	$data['page'] = 'analisis';
		$data['content'] = 'content/analisis';
      	if ($perspective == '1') {
      		$data['data_objective'] = $this->User_model->getDataWhere2('t_objective', 'id_user', $id, 'id_kategori_analisis', 'FNC');
      		$data['kategori'] ='FNC';
      	}else if ($perspective == '2') {
      		$data['data_objective'] = $this->User_model->getDataWhere2('t_objective', 'id_user', $id, 'id_kategori_analisis', 'CST');
      		$data['kategori'] ='CST';
      	}
      	else if ($perspective == '3') {
      		$data['data_objective'] = $this->User_model->getDataWhere2('t_objective', 'id_user', $id, 'id_kategori_analisis', 'INT');
      		$data['kategori'] ='INT';
      	}else if ($perspective == '4') {
      		$data['data_objective'] = $this->User_model->getDataWhere2('t_objective', 'id_user', $id, 'id_kategori_analisis', 'LEA');
      		$data['kategori'] ='LEA';
      	}
		$this->load->view('dashboard.php', $data);
	}

	
	public function inputAnalisis()
	{
		$objective = $this->input->post('objective');
		$measure = $this->input->post('measure');
		$action = $this->input->post('action');
		$isneed = $this->input->post('isneed');
		$isneed_desc = $this->input->post('isneed_desc');
		$jumlah_measure =$this->input->post('jumlah_measure');
		$jumlah_action =$this->input->post('jumlah_action');
		$jumlah_isneed =$this->input->post('jumlah_isneed');
		$jumlah_max = $this->User_model->countmax($jumlah_measure, $jumlah_action, $jumlah_isneed);

		$kategori = $this->input->post('kategori');

		$datauser = $_SESSION['list'];
      	foreach ($datauser as $row) {
	        $id = $row['id_user'];
	        $status_kriteria = $row['kriteria'];
      	}

		$data_input =  array(
			'id_user' => $id,
			'id_kategori_analisis' => $kategori,
			'objective' => $objective 
		);

		$this->User_model->insertData('t_objective', $data_input);
		$id_objective = $this->User_model->checkidobjective($id);
		
		$data_input_measure = array(
				'measure' => $measure,
				'id_user' => $id,
				'id_kategori_analisis' => $kategori, 
				'id_objective' => $id_objective
		);
		$data_input_action = array(
				'action' => $action,
				'id_user' => $id,
				'id_kategori_analisis' => $kategori, 
				'id_objective' => $id_objective
		);
		$data_input_isneed = array(
				'isneed' => $isneed,
				'id_user' => $id,
				'id_kategori_analisis' => $kategori, 
				'tipe' => $isneed_desc,
				'id_objective' => $id_objective
		);

		$this->User_model->insertData('t_measure', $data_input_measure);
		$this->User_model->insertData('t_action', $data_input_action);
		$this->User_model->insertData('t_isneed', $data_input_isneed);

		if ($jumlah_measure>0) {
			$measureadd = $this->input->post('measureadd');
			for ($i=0; $i < $jumlah_measure; $i++) { 
				$data_input_measure = array(
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
			for ($i=0; $i < $jumlah_isneed; $i++) { 
				$data_input_isneed = array(
					'isneed' => $isneedadd[$i],
					'id_user' => $id,
					'id_kategori_analisis' => $kategori, 
					'tipe' => $isneedadd_desc[$i],
					'id_objective' => $id_objective
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
		$datauser = $_SESSION['list'];
      	foreach ($datauser as $row) {
	        $id = $row['id_user'];
	        $status_kriteria = $row['kriteria'];
      	}
		$id_objective = $this->input->post('id_objective');
		$objective = $this->input->post('objective');
		$measure = $this->input->post('measure');
		$id_measure = $this->input->post('id_measure');
		$action = $this->input->post('action');
		$id_action = $this->input->post('id_action');
		$isneed = $this->input->post('isneed');
		$isneed_desc = $this->input->post('isneed_desc_edit');
		$id_isneed = $this->input->post('id_isneed');
		$kategori = $this->input->post('kategori');
	
		$data_update_objective = array(
				'objective' => $objective,
				'id_objective' => $id_objective,
		);
		$this->User_model->updateData('t_objective', 'id_objective', $id_objective, $data_update_objective);
		
		if (!empty($measure)) {
			foreach ($measure as $key=> $value) {
				if ($value==' ' || $value==NULL) {
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
			if ($value==' ' || $value==NULL) {
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
			if ($value==' ' || $value==NULL) {
				$this->User_model->delete('t_isneed', 'id_isneed', $id_isneed[$key]);
			}else{
				$data_update = array(
					'isneed' => $value,
					'Tipe' => $isneed_desc[$key]
				);
			$this->User_model->updateData('t_isneed', 'id_isneed', $id_isneed[$key], $data_update);
			}
		}
		}

		if (!empty($this->input->post('moremeasure'))) {
			$moremeasure = $this->input->post('moremeasure');
			$data_input = array('measure' => $moremeasure,
								'id_objective' => $id_objective,
								'id_kategori_analisis' => $kategori, 
								'id_user' => $id
								 );
			$this->User_model->insertData('t_measure', $data_input);
		}
		if (!empty($this->input->post('moreaction'))) {
			$moreaction = $this->input->post('moreaction');
			$data_input = array('action' => $moreaction,
								'id_objective' => $id_objective,
								'id_kategori_analisis' => $kategori, 
								'id_user' => $id
								 );
			$this->User_model->insertData('t_action', $data_input);
		}
		if (!empty($this->input->post('moreisneed'))) {
			$moreisneed = $this->input->post('moreisneed');
			$moreisneed_desc = $this->input->post('moreisneed_desc');
			$data_input = array('isneed' => $moreisneed,
								'id_objective' => $id_objective,
								'id_kategori_analisis' => $kategori,
								'Tipe' => $moreisneed_desc,
								'id_user' => $id
								 );
			$this->User_model->insertData('t_isneed', $data_input);
		}
		// if (!empty($moremeasurearray)) {
		// 	$moremeasurearray = $this->input->post('moremeasurearray');
		// 	foreach ($moremeasurearray as $key) {
		// 		$data_insert = array(
		// 			'id_objective' => $id_objective,
		// 			'measure' => $key
		// 		);
		// 		$this->User_model->insertData('t_measure', $data_insert);
		// 	}
		// }
		// if (!empty($moremeasurearray)) {
		// 	$moreactionarray = $this->input->post('moreactionrray');
		// 	foreach ($moreactionrray as $key) {
		// 		$data_insert = array(
		// 			'id_objective' => $id_objective,
		// 			'action' => $key
		// 		);
		// 		$this->User_model->insertData('t_action', $data_insert);
		// 	}
		// }
		// if (!empty($moremeasurearray)) {
		// 	$moreisneedarray = $this->input->post('moreisneedarray');
		// 	foreach ($moreisneedarray as $key) {
		// 		$data_insert = array(
		// 			'id_objective' => $id_objective,
		// 			'isneed' => $key
		// 		);
		// 		$this->User_model->insertData('t_isneed', $data_insert);
		// 	}
		// }
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
		$id = $this->input->post('id');
		$id_objective = $this->input->post('id_objective');
		$komentar = $this->input->post('komentar');
		
		$data_input= array(
			'id_user' => $id,
			'id_objective' => $id_objective,
			'komentar' => $komentar
		);
		$this->User_model->insertData('t_komentar_timeline', $data_input);

		redirect('home/dashboard','refresh');
	}

	public function alasanfinalisasi()
	{
		$id = $this->input->post('id');
		$id_objective = $this->input->post('id_objective');
		$alasan = $this->input->post('komentar');
		$kategori = $this->input->post('kategori');
		$data_input= array(
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

	public function logout()
	{
		$data = array('login' => FALSE);
		$this->session->set_userdata($data);
		redirect('Home','refresh');
	}
	
	public function check_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

			if($this->User_model->CheckLogin($username, $password)==TRUE){
				$data = array(
					'login' => TRUE,
					'list' => $this->User_model->getOneData('t_user','username',$username)
				);
				$this->session->set_userdata($data);
				redirect('home/dashboard');
			}else{
				$this->session->set_flashdata('message', 'username atau password yang anda masukkan salah');
				redirect('home','refresh');
			}
		
	}
}
