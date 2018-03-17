<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class duatabel extends CI_Controller {

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
		if (!empty($_SESSION)) {
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
		$this->load->view('dashboard.php');
	}
	
	public function youranalisis()
	{
		$datauser = $_SESSION['list'];
      	foreach ($datauser as $row) {
	        $id = $row['id_user'];
      	}
      	$data['data_objective'] = $this->User_model->joingetwhere('t_objective', 't_t', 't_objective.id_objective=t_t.id_objective', 'id_user', $id);
		$data['content'] = 'content/youranalisis';
		$this->load->view('dashboard.php', $data);
	}

	public function input()
	{      	
		$objective = $this->input->post('objective');
		$measure = $this->input->post('measure');
		$action = $this->input->post('action');
		$isneed = $this->input->post('isneed');

		$jumlah_measure =$this->input->post('jumlah_measure');
		$jumlah_action =$this->input->post('jumlah_action');
		$jumlah_isneed =$this->input->post('jumlah_isneed');
		$jumlah_max = $jumlah_measure;

		if($jumlah_max<$jumlah_action) {
			$jumlah_max = $jumlah_action;
			if ($jumlah_max<$jumlah_isneed) {
				$jumlah_max = $jumlah_isneed;
			}
		}elseif ($jumlah_max<$jumlah_isneed) {
			$jumlah_max = $jumlah_isneed;
		}	
		
		$datauser = $_SESSION['list'];
      	foreach ($datauser as $row) {
	        $id = $row['id_user'];
      	}

		$data_input =  array(
			'id_user' => $id, 
			'objective' => $objective 
		);

		$this->User_model->insertData('t_objective', $data_input);
		$id_objective = $this->User_model->checkidobjective($id);
		$data_input = array(
				'measure' => $measure,
				'id_objective' => $id_objective,
				'action' => $action,
				'isneed' => $isneed
		);

		$this->User_model->insertData('t_t', $data_input);

		
		
		if ($jumlah_measure>0) {
			$measureadd = $this->input->post('measureadd');
			if ($jumlah_measure<$jumlah_max) {
				for ($i=$jumlah_measure; $i < $jumlah_max; $i++) { 
					$measureadd[$i] = ' ';
				}
			}
		}
		else{
			for ($i=0; $i < $jumlah_max; $i++) { 
				$measureadd[$i] = ' ';
			}
		}
		if ($jumlah_action>0) {
			$actionadd = $this->input->post('actionadd');
			if ($jumlah_action<$jumlah_max) {
				for ($i=$jumlah_action; $i < $jumlah_max; $i++) { 
					$actionadd[$i] = ' ';
				}
			}
		}else{
			for ($i=0; $i < $jumlah_max; $i++) { 
			$actionadd[$i] = ' ';
			}
		}
		if ($jumlah_isneed>0) {
			$isneedadd = $this->input->post('isneedadd');
			if ($jumlah_isneed<$jumlah_max) {
				for ($i=$jumlah_isneed; $i < $jumlah_max; $i++) { 
					$isneedadd[$i] = ' ';
				}
			}
		}else{
			for ($i=0; $i < $jumlah_max; $i++) { 
			$isneedadd[$i] = ' ';
			}
		}


		for ($i=0; $i < $jumlah_max; $i++) { 
			$data_input = array(
				'measure' => $measureadd[$i],
				'action' => $actionadd[$i],
				'isneed' => $isneedadd[$i],
				'id_objective' => $id_objective
			);
			
			$this->User_model->insertData('t_t', $data_input);
		}
		
		redirect('home/youranalisis','refresh');

	}

	public function input1()
	{      	
		$objective = $this->input->post('objective');
		$measure = $this->input->post('measure');
		$action = $this->input->post('action');
		$isneed = $this->input->post('isneed');
		$id_objective = $this->input->post('id_objective');
		$id_analisis = $this->input->post('id_analisis');

		// $jumlah_measure =$this->input->post('jumlah_measure'.$id_analisis);
		// $jumlah_action =$this->input->post('jumlah_action'.$id_analisis);
		// $jumlah_isneed =$this->input->post('jumlah_isneed'.$id_analisis);
		// $jumlah_max = $jumlah_measure;
			
		// if($jumlah_max<$jumlah_action) {
		// 	$jumlah_max = $jumlah_action;
		// 	if ($jumlah_max<$jumlah_isneed) {
		// 		$jumlah_max = $jumlah_isneed;
		// 	}
		// }elseif ($jumlah_max<$jumlah_isneed) {
		// 	$jumlah_max = $jumlah_isneed;
		// }	
		
		
		$data_input = array(
				'measure' => $measure,
				'id_objective' => $id_objective,
				'action' => $action,
				'isneed' => $isneed
		);

		$this->User_model->insertData('t_t', $data_input);

		
		// if ($jumlah_measure>0) {
		// 	$measureadd = $this->input->post('measure1');
		// 	if ($jumlah_measure<$jumlah_max) {
		// 		for ($i=$jumlah_measure; $i < $jumlah_max; $i++) { 
		// 			$measureadd[$i] = ' ';
		// 		}
		// 	}
		// }
		// else{
		// 	for ($i=0; $i < $jumlah_max; $i++) { 
		// 		$measureadd[$i] = ' ';
		// 	}
		// }
		// if ($jumlah_action>0) {
		// 	$actionadd = $this->input->post('action1');
		// 	if ($jumlah_action<$jumlah_max) {
		// 		for ($i=$jumlah_action; $i < $jumlah_max; $i++) { 
		// 			$actionadd[$i] = ' ';
		// 		}
		// 	}
		// }else{
		// 	for ($i=0; $i < $jumlah_max; $i++) { 
		// 	$actionadd[$i] = ' ';
		// 	}
		// }
		// if ($jumlah_isneed>0) {
		// 	$isneedadd = $this->input->post('isneed1');
		// 	if ($jumlah_isneed<$jumlah_max) {
		// 		for ($i=$jumlah_isneed; $i < $jumlah_max; $i++) { 
		// 			$isneedadd[$i] = ' ';
		// 		}
		// 	}
		// }else{
		// 	for ($i=0; $i < $jumlah_max; $i++) { 
		// 	$isneedadd[$i] = ' ';
		// 	}
		// }


		// for ($i=0; $i < $jumlah_max; $i++) { 
		// 	$data_input = array(
		// 		'measure' => $measureadd[$i],
		// 		'action' => $actionadd[$i],
		// 		'isneed' => $isneedadd[$i],
		// 		'id_objective' => $id_objective
		// 	);
			
		// 	$this->User_model->insertData('t_t', $data_input);
		// }
		
		redirect('home/youranalisis','refresh');

	}

	public function edit()
	{
		$id_objective = $this->input->post('id_objective');
		$id_analisis = $this->input->post('id_analisis');
		$objective = $this->input->post('objective');
		$measure = $this->input->post('measure');
		$action = $this->input->post('action');
		$isneed = $this->input->post('isneed');

		$data_update_objective = array(
				'objective' => $objective,
				'id_objective' => $id_objective,
				'tanggal' => 'CURRENT_TIMESTAMP'
		);

		$data_update_analisis = array(
				'id_analisis' => $id_analisis,
				'measure' => $measure,
				'action' => $action,
				'isneed' => $isneed,
			);

		$this->User_model->updateData('t_objective', 'id_objective', $id_objective, $data_update_objective);
		$this->User_model->updateDataAnalisis('t_t', 'id_analisis', $id_analisis, $data_update_analisis);

		redirect('home/youranalisis','refresh');
	}
	public function hapus()
	{
		$hapuschoice = $this->input->post('hapuschoice');
		$id_objective = $this->input->post('id_objective');
		$id_analisis = $this->input->post('id_analisis');

		if ($hapuschoice == 'all') {
			$this->User_model->delete('t_objective', 'id_objective', $id_objective);
			$this->User_model->delete('t_t', 'id_objective', $id_objective);
		}elseif ($hapuschoice == 'analisis') {
			$this->User_model->delete('t_t', 'id_analisis', $id_analisis);
		}	

		redirect('home/youranalisis','refresh');	
	}

	
}
