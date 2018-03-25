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
				// redirect('home/dashboard','refresh');
				redirect('home/analisis/1','refresh');
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
      	$data['page'] = 'timeline';
      	$data['content'] = 'content/timeline';
      	// $data['table'] = $this->User_model->timeline('t_objective', 't_user', 't_objective.id_user=t_user.id_user');

		$this->load->view('dashboard.php', $data);
	}
	public function finalisasi($perspective)
	{
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
	       
      	}
      	
      	$data['informasi'] = $this->User_model->getData('t_kriteria');
      	$data['page'] = 'roadmap';
      	$data['id_user'] = $id;
      	$data['content'] = 'content/nilai_kriteria';
		$this->load->view('dashboard.php', $data);
    }

	public function nilaialternatif($kriteria)
	{
		$datauser = $_SESSION['list'];
      	foreach ($datauser as $row) {
	        $id = $row['id_user'];
	       
      	}
      	
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
	        
      	}
      	
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
				// redirect('home/dashboard');
				redirect('home/analisis/1','refresh');
			}else{
				$this->session->set_flashdata('message', 'username atau password yang anda masukkan salah');
				redirect('home','refresh');
			}
		
	}
	public function register()
	{
		$this->load->view('register.php');
		
	}
	public function new_account()
	{
		$nama = $this->input->post('name');
		$department = $this->input->post('department');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ($this->User_model->CheckUser($username) == FALSE) {
			$data_input=array(
				'nama_user' => $nama,
				'departemen' => $department,
				'username' => $username,
				'password' => $password
			);
			$this->User_model->insertData('t_user', $data_input);
			$id = $this->User_model->checkidbaru($username);

			$this->db->query("CREATE TABLE `t_nilai_kriteria_".$id."` (
							  `id_nilai_kriteria` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
							  `id_kriteria_1` int(11) NOT NULL,
							  `id_kriteria_2` int(11) NOT NULL,
							  `kode` int(11) NOT NULL,
							  `nilai` double(11,4) NOT NULL
							)");
			$this->db->query("CREATE TABLE `t_nilai_alternatif_".$id."` (
							  `id_nilai_alternatif` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
							  `id_kriteria` int(11) NOT NULL,
							  `id_alternatif_1` int(11) NOT NULL,
							  `id_alternatif_2` int(11) NOT NULL,
							  `kode` int(11) NOT NULL,
							  `nilai` double(11,4) NOT NULL
							)");

			$user = $this->User_model->getData('t_user');
			foreach ($user as $key) {
				$data_update = array(
					'alternatif' => 0
				);
				$this->User_model->updateData('t_user', 'id_user', $key->id_user, $data_update);
			}
			$this->session->set_flashdata('message', 'anda telah terdaftar, silakan login menggunakan username dan password yang telah anda daftarkan');
			redirect('home','refresh');
		}else{
			$this->session->set_flashdata('message', 'username telah tersedia');
			redirect('home/register','refresh');
		}
	}
}
