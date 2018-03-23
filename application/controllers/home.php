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
    	$informasi = $this->User_model->getData('t_kriteria');
    	foreach($informasi as $row){
			$kriteria[]=array($row->id_kriteria,$row->nama_kriteria);
		}
			if(isset($_POST['save'])){
				$this->db->query("truncate table t_nilai_kriteria");
				for($i=0;$i<count($kriteria);$i++){
					for($ii=0;$ii<count($kriteria);$ii++){
						if($i < $ii){
							echo $this->input->post('nilai_'.$kriteria[$i][0].'_'.$kriteria[$ii][0]);
							$data_input = array(
							'id_kriteria_1' => $kriteria[$i][0],
							'id_kriteria_2' => $kriteria[$ii][0],
							'nilai' => $this->input->post('nilai_'.$kriteria[$i][0].'_'.$kriteria[$ii][0])
						);
						$this->User_model->insertData('t_nilai_kriteria', $data_input);

						}
					}
				}
    			redirect('home/nilaikriteria','refresh');
    		}
    		if(isset($_POST['reset'])){
				$this->db->query("truncate table t_nilai_alternatif");
    			redirect('home/nilaikriteria','refresh');
			
			}
			if(isset($_POST['next'])){
				$this->db->query("truncate table t_nilai_kriteria");
				for($i=0;$i<count($kriteria);$i++){
					for($ii=0;$ii<count($kriteria);$ii++){
						if($i < $ii){
							$data_input = array(
							'id_kriteria_1' => $kriteria[$i][0],
							'id_kriteria_2' => $kriteria[$ii][0],
							'nilai' => $this->input->post('nilai_'.$kriteria[$i][0].'_'.$kriteria[$ii][0])
						);
						$this->User_model->insertData('t_nilai_kriteria', $data_input);

						}
					}
				}
				$datauser = $_SESSION['list'];
		      	foreach ($datauser as $row) {
	        		$status_kriteria = $row['kriteria'];
	       			 $status_alternatif = $row['alternatif'];
			        $id = $row['id_user'];
		      	}
		      	$data_update = array(
		      		'kriteria' => 1
		      	);
		      	$this->User_model->updateData('t_user', 'id_user', $id, $data_update);
	    		redirect('home/nilaialternatif/1','refresh');
    		}
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
		$this->load->view('dashboard.php', $data);
	}
	public function insertBobotalternatif($id_kriteria)
	{
		$informasi = $this->User_model->getData('t_isneed');
		
		foreach($informasi as $row){
			$alternatif[]=array($row->id_isneed,$row->isneed);
		}

		if(isset($_POST['save'])){
			$this->User_model->delete('t_nilai_alternatif', 'id_kriteria', $id_kriteria);
			for($i=0;$i<count($alternatif);$i++){
				for($ii=0;$ii<count($alternatif);$ii++){
					if($i < $ii){
						$data_input = array(
							'id_kriteria' => $id_kriteria,
							'id_alternatif_1' => $alternatif[$i][0],
							'id_alternatif_2' => $alternatif[$ii][0],
							'nilai' => $this->input->post('nilai_'.$alternatif[$i][0].'_'.$alternatif[$ii][0])
						);
						$this->User_model->insertData('t_nilai_alternatif', $data_input);
					}
				}
			}
		redirect('home/nilaialternatif/'.$id_kriteria,'refresh');
		}
		if(isset($_POST['reset'])){
			$this->User_model->delete('t_nilai_alternatif', 'id_kriteria', $id_kriteria);
			for($i=0;$i<count($alternatif);$i++){
				for($ii=0;$ii<count($alternatif);$ii++){
					if($i < $ii){
						$data_input = array(
						'id_kriteria' => $id_kriteria,
						'id_alternatif_1' => $alternatif[$i][0],
						'id_alternatif_2' => $alternatif[$ii][0],
						'nilai' => 1
					);
					$this->User_model->insertData('t_nilai_alternatif', $data_input);
					}
				}
			}
		redirect('home/nilaialternatif/'.$id_kriteria,'refresh');
		}
		if(isset($_POST['resetall'])){
			$this->db->query("truncate table t_nilai_alternatif");
			redirect('home/nilaialternatif/'.$id_kriteria,'refresh');
		}
		if (isset($_POST['next'])) {
			$this->User_model->delete('t_nilai_alternatif', 'id_kriteria', $id_kriteria);
			for($i=0;$i<count($alternatif);$i++){
				for($ii=0;$ii<count($alternatif);$ii++){
					if($i < $ii){
						$data_input = array(
							'id_kriteria' => $id_kriteria,
							'id_alternatif_1' => $alternatif[$i][0],
							'id_alternatif_2' => $alternatif[$ii][0],
							'nilai' => $this->input->post('nilai_'.$alternatif[$i][0].'_'.$alternatif[$ii][0])
						);
						$this->User_model->insertData('t_nilai_alternatif', $data_input);
					}
				}
			}
			$id_kriteria = $id_kriteria+1;
			redirect('home/nilaialternatif/'.$id_kriteria,'refresh');
		}
		if (isset($_POST['selesai'])) {
			$this->User_model->delete('t_nilai_alternatif', 'id_kriteria', $id_kriteria);
			for($i=0;$i<count($alternatif);$i++){
				for($ii=0;$ii<count($alternatif);$ii++){
					if($i < $ii){
						$data_input = array(
							'id_kriteria' => $id_kriteria,
							'id_alternatif_1' => $alternatif[$i][0],
							'id_alternatif_2' => $alternatif[$ii][0],
							'nilai' => $this->input->post('nilai_'.$alternatif[$i][0].'_'.$alternatif[$ii][0])
						);
						$this->User_model->insertData('t_nilai_alternatif', $data_input);
					}
				}
			}
			$datauser = $_SESSION['list'];
			foreach ($datauser as $row) {
        		$status_kriteria = $row['kriteria'];
		        $id = $row['id_user'];
		    }
			$data_update = array(
	      		'alternatif' => 1
	      	);
	      	$this->User_model->updateData('t_user', 'id_user', $id, $data_update);
    		redirect('home/hasilroadmap','refresh');

		}

	}
	public function hasilroadmap()
	{
		$datauser = $_SESSION['list'];
      	foreach ($datauser as $row) {
	        $id = $row['id_user'];
	        $status_alternatif = $row['alternatif'];
	        $status_kriteria = $row['kriteria'];
      	}
      	$data['status_kriteria'] = $status_kriteria;
      	$data['status_alternatif'] = $status_alternatif;
		$data['informasi_kriteria'] = $this->User_model->getDataarray('t_kriteria');
		$data['informasi_alternatif'] = $this->User_model->getDataarray('t_isneed');
		$data['content'] = "content/rekomendasi.php";$data['page'] = 'roadmap';
		$this->load->view('dashboard.php', $data);
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
