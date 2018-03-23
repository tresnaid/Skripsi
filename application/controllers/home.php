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
	       
      	}
      	
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
	        $status_finalisasi = $row['finalisasi'];
	        $status_alternatif = $row['alternatif'];
      	}
      	$data['status_finalisasi'] = $status_finalisasi;
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
	        $status_finalisasi = $row['finalisasi'];
	        $status_kriteria = $row['kriteria'];
	        $status_alternatif = $row['alternatif'];
      	}
      	$data['status_finalisasi'] = $status_finalisasi;
		$data['status_alternatif'] = $status_alternatif;
      	$data['informasi'] = $this->User_model->getData('t_kriteria');
      	$data['page'] = 'roadmap';
      	$data['id_user'] = $id;
      	$data['content'] = 'content/nilai_kriteria';
      	$data['status_kriteria'] = $status_kriteria;
		$this->load->view('dashboard.php', $data);
    }

	public function nilaialternatif($kriteria)
	{
		$datauser = $_SESSION['list'];
      	foreach ($datauser as $row) {
	        $id = $row['id_user'];
	        $status_finalisasi = $row['finalisasi'];
	        $status_kriteria = $row['kriteria'];
	        $status_alternatif = $row['alternatif'];
      	}
      	$data['status_finalisasi'] = $status_finalisasi;
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

	public function tunggu()
	{
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
		$data['content'] = "content/tunggu.php";
		$data['page'] = 'roadmap';
		$user = $this->User_model->getData('t_user');
		$total = 0;
		foreach ($user as $row) {
			$statusalternatif = $row->alternatif;
			if ($statusalternatif == 0) {
			}else{
				$total++;
			}
    	}
    	$data['total'] = $total;
    	$data['total_user'] = count($user);
		$this->load->view('dashboard.php', $data);
	}



	public function analisis($perspective)
	{
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
