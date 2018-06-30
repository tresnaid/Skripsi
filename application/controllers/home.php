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
      	$version = $_SESSION['version'];
      	$data['page'] = 'finalisasi';
      	$data['content'] = 'content/finalisasi';
      	$data['table'] = $this->User_model->getDatakumulatif2('t_user', 'status', 1);
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

	/*public function nilaialternatif($kriteria)
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
	}*/

		public function nilaialternatif($kriteria)
	{
		$datauser = $_SESSION['list'];
      	foreach ($datauser as $row) {
	        $id = $row['id_user'];     
      	}
      	$version = $_SESSION['version'];
      	$data['menu'] = 'content/menu';
      	$data['informasi_kriteria'] = $this->User_model->getData('t_kriteria');
      	if ($kriteria == 1) {
			$data['informasi'] = $this->User_model->getDataSubkriteria2('t_isneed', 'id_kategori_analisis', 'FNC', 'version', $version);
      	}elseif ($kriteria == 2) {
			$data['informasi'] = $this->User_model->getDataSubkriteria2('t_isneed', 'id_kategori_analisis', 'CST', 'version', $version);
      	}elseif ($kriteria == 3) {
			$data['informasi'] = $this->User_model->getDataSubkriteria2('t_isneed', 'id_kategori_analisis', 'INT', 'version', $version);
      	}elseif ($kriteria == 4) {
			$data['informasi'] = $this->User_model->getDataSubkriteria2('t_isneed', 'id_kategori_analisis', 'LEA', 'version', $version);
      	}
      	$data['page'] = 'roadmap';
      	$data['content'] = 'content/nilai_alternatif';
      	$data['id_kriteria'] = $kriteria;
      	$data['id_user'] = $id;
		$this->load->view('dashboard.php', $data);
	}
	
	public function tunggu()
	{
		$version = $_SESSION['version'];
		$data['content'] = "content/tunggu.php";
		$data['page'] = 'roadmap';
		$user = $this->User_model->getDatakumulatif2('t_user', 'status', 1);
		$total = 0;
		foreach ($user as $row) {
			$statusalternatif = $row->alternatif;
			if ($statusalternatif == 0) {
			}else{
				$total++;
			}
    	}
    	$data['status_hardware'] = $this->User_model->checkstatus('hardware', 'version', $version);
		$data['jenis_hardware'] = $this->User_model->getData('t_jenis_hardware');
    	$data['teknologi_informasi'] = $this->User_model->getData('t_pilihan_hardware');
    	$data['total'] = $total;
    	$data['total_user'] = count($user);
		$datauser = $_SESSION['list'];
      	foreach ($datauser as $row) {
	        $id = $row['id_user'];
	        $departement = $row['departemen'];
      	}
      	$data['departement'] = $departement;
      	$data['perbandingan_kriteria'] = $this->User_model->hasil_fuzzy_perkriteria2('t_fuzzy_nilai_hasil', 't_kriteria', 't_fuzzy_nilai_hasil.id_kriteria = t_kriteria.id_kriteria', 't_fuzzy_nilai_hasil.tipe', 'KRITERIA', 't_fuzzy_nilai_hasil.id_user', $id, 't_fuzzy_nilai_hasil.version', $version);
      	$data['perbandingan_finance'] = $this->User_model->hasil_fuzzy_perkriteria2('t_fuzzy_nilai_hasil', 't_isneed', 't_fuzzy_nilai_hasil.id_kriteria = t_isneed.id_isneed', 't_fuzzy_nilai_hasil.tipe', 'FNC', 't_fuzzy_nilai_hasil.id_user', $id, 't_fuzzy_nilai_hasil.version', $version);
      	$data['perbandingan_customer'] = $this->User_model->hasil_fuzzy_perkriteria2('t_fuzzy_nilai_hasil', 't_isneed', 't_fuzzy_nilai_hasil.id_kriteria = t_isneed.id_isneed', 't_fuzzy_nilai_hasil.tipe', 'CST', 't_fuzzy_nilai_hasil.id_user', $id, 't_fuzzy_nilai_hasil.version', $version);
      	$data['perbandingan_internal'] = $this->User_model->hasil_fuzzy_perkriteria2('t_fuzzy_nilai_hasil', 't_isneed', 't_fuzzy_nilai_hasil.id_kriteria = t_isneed.id_isneed', 't_fuzzy_nilai_hasil.tipe', 'INT', 't_fuzzy_nilai_hasil.id_user', $id, 't_fuzzy_nilai_hasil.version', $version);
      	$data['perbandingan_learning'] = $this->User_model->hasil_fuzzy_perkriteria2('t_fuzzy_nilai_hasil', 't_isneed', 't_fuzzy_nilai_hasil.id_kriteria = t_isneed.id_isneed', 't_fuzzy_nilai_hasil.tipe', 'LEA', 't_fuzzy_nilai_hasil.id_user', $id, 't_fuzzy_nilai_hasil.version', $version);
      	$data['perbandingan_semua'] = $this->User_model->hasil_fuzzy3('t_fuzzy_perbandingan_semua', 't_isneed', 't_fuzzy_perbandingan_semua.id_isneed = t_isneed.id_isneed', 't_fuzzy_perbandingan_semua.id_user', $id, 't_fuzzy_perbandingan_semua.version', $version);

		$this->load->view('dashboard.php', $data);
	}
	public function rekomendasi()
	{
		$version = $_SESSION['version'];
		$this->User_model->delete('t_roadmap', 'version', $version);
		// $this->db->query("truncate table t_roadmap");
		$user = $this->User_model->getDatakumulatif2('t_user', 'status', 1);
		$jumlah_user = count($user);
		$datauser = $_SESSION['list'];
      	
      	foreach ($datauser as $row) {
	        $id_user = $row['id_user']; 
      	}
		foreach ($user as $key) {
			$id = $key->id_user;
			$data_hasil[$id] = $this->User_model->getDataSubkriteria2('t_fuzzy_perbandingan_semua', 'id_user', $id, 'version', $version);
		}
    	foreach ($data_hasil[$id_user] as $key => $value) {
    		$nilai = 0;
	    	foreach ($user as $row) {
    			$id = $row->id_user;
    			$nilaisaatini = $this->User_model->checknilaihasilfuzzy2($value->id_isneed, $id, $version);
    			$nilai = $nilai + $nilaisaatini;
    		}
    		$nilai = $nilai/$jumlah_user;

    		$data_input = array(
    			'version' => $version,
    			'id_isneed' => $value->id_isneed,
    			'tipe' => $value->tipe,
    			'nilai_hasil' => $nilai
    		);
    		$this->User_model->insertData('t_roadmap', $data_input);
    	}
    		$data['KO'] = $this->User_model->getDataWhere2('t_isneed', 'bagan', 'KO', 'version', $version);
    		$data['SP'] = $this->User_model->getDataWhere2('t_isneed', 'bagan', 'SP', 'version', $version);
    		$data['HP'] = $this->User_model->getDataWhere2('t_isneed', 'bagan', 'HP', 'version', $version);
    		$data['ST'] = $this->User_model->getDataWhere2('t_isneed', 'bagan', 'ST', 'version', $version);
			$data['content'] = "content/rekomendasi.php";
			$data['page'] = 'roadmap';
			$data['hasil'] = $this->User_model->hasil_fuzzy2('t_isneed','t_roadmap', 't_isneed.id_isneed=t_roadmap.id_isneed', 't_isneed.version', $version);
			$this->load->view('dashboard.php', $data);
	}


	public function analisis($perspective)
	{
		$datauser = $_SESSION['list'];
      	foreach ($datauser as $row) {
	        $id = $row['id_user'];
	        
      	}
      	$version = $_SESSION['version'];
      	$data['data_version'] = $this->User_model->getDataWhere('t_version', 'status', 0);
      	$data['key_operational'] = $this->User_model->getDataWhere('t_portofolio', 'kolom2', 1);
      	$data['strategic'] = $this->User_model->getDataWhere('t_portofolio', 'kolom2', 2);
      	$data['high_potential'] = $this->User_model->getDataWhere('t_portofolio', 'kolom2', 3);
      	$data['support'] = $this->User_model->getDataWhere('t_portofolio', 'kolom2', 4);
      	$data['page'] = 'analisis';
		$data['content'] = 'content/analisis';
		$data['id'] = $id;
      	if ($perspective == '1') {
      		$data['data_objective'] = $this->User_model->getDataWhere3('t_objective', 'id_user', $id, 'id_kategori_analisis', 'FNC','version', $version);
      		$data['kategori'] ='FNC';
      		$data['nama_kategori'] = 'Finansial';
      	}else if ($perspective == '2') {
      		$data['data_objective'] = $this->User_model->getDataWhere3('t_objective', 'id_user', $id, 'id_kategori_analisis', 'CST','version', $version);
      		$data['kategori'] ='CST';
      		$data['nama_kategori'] = 'Kustomer';
      	}
      	else if ($perspective == '3') {
      		$data['data_objective'] = $this->User_model->getDataWhere3('t_objective', 'id_user', $id, 'id_kategori_analisis', 'INT','version', $version);
      		$data['kategori'] ='INT';
      		$data['nama_kategori'] = 'Bisnis Internal';
      	}else if ($perspective == '4') {
      		$data['data_objective'] = $this->User_model->getDataWhere3('t_objective', 'id_user', $id, 'id_kategori_analisis', 'LEA','version', $version);
      		$data['kategori'] ='LEA';
      		$data['nama_kategori'] = 'Pembelajaran dan Pertumbuhan';
      	}
		$this->load->view('dashboard.php', $data);
	}


	
	public function check_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$version = $this->User_model->checkversion();


			if($this->User_model->CheckLogin($username, $password)==TRUE){
				$data = array(
					'login' => TRUE,
					'version' => $version,
					'list' => $this->User_model->getDataWhere('t_user','username',$username)
				);
				$this->session->set_userdata($data);
				// redirect('home/dashboard');
				redirect('home/analisis/1','refresh');
			}else if ($this->User_model->CheckLogin_admin($username, $password)==TRUE) {
				$data = array(
					'login' => TRUE,
					'admin' => TRUE,
					'version' => $version,
					'list' => $this->User_model->getDataWhere('t_user','username',$username)
				);
				$this->session->set_userdata($data);
				// redirect('home/dashboard');
				redirect('home/dashboard_admin','refresh');
			}else{
				$this->session->set_flashdata('message', 'username atau password yang anda masukkan salah');
				redirect('home','refresh');
			}
		
	}
	public function dashboard_admin()
	{
		$data['versi'] = $this->User_model->getData('t_version');
		$data['user'] = $this->User_model->getData('t_user');
		$this->load->view('dashboard_admin.php', $data);
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
							  `nilaimin` double(11,4) NOT NULL,
							  `nilai` double(11,4) NOT NULL,
							  `nilaimax` double(11,4) NOT NULL
							)");
			$this->db->query("CREATE TABLE `t_nilai_alternatif_".$id."` (
							  `id_nilai_alternatif` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
							  `id_kriteria` int(11) NOT NULL,
							  `id_alternatif_1` int(11) NOT NULL,
							  `id_alternatif_2` int(11) NOT NULL,
							  `kode` int(11) NOT NULL,
							  `nilaimin` double(11,4) NOT NULL,
							  `nilai` double(11,4) NOT NULL,
							  `nilaimax` double(11,4) NOT NULL
							)");

			$user = $this->User_model->getData('t_user');
			foreach ($user as $key) {
				$data_update = array(
					'alternatif' => 0
				);
				$this->User_model->updateData('t_user', 'id_user', $key->id_user, $data_update);
			}
			$this->session->set_flashdata('message', 'anda telah terdaftar, silakan login menggunakan username dan password yang telah anda daftarkan');
			redirect('home/dashboard_admin','refresh');
		}else{
			$this->session->set_flashdata('message', 'username telah digunakan sebelumnya');
			redirect('home/dashboard_admin','refresh');
		}
	}

	public function logout()
	{
		$data = array('login' => FALSE);
		$this->session->set_userdata($data);
		redirect('Home','refresh');
	}
	public function download()
		{
		// As PDF creation takes a bit of memory, we're saving the created file in /downloads/reports/

		}
	public function new_version()
	{
		$detail = $this->User_model->detailversion();

		if (!empty($detail)) {
			foreach ($detail as $row) {
				$versi = $row->versi;
				$tahun = $row->tahun;
			}
			if ($tahun == date("Y")) {
				$versi_sekarang = $versi +1;
			}else{
				$versi_sekarang = 1;
			}
		}else{
			$versi_sekarang = 1;
		}
		
		
		$versi_baru = "ver".$versi_sekarang.".".date("Y");
		$data_input = array(
						'version' => $versi_baru,
						'versi' => $versi_sekarang,
						'tahun' => date("Y"),
						'status' => 1
		);
		$data_update = array('status' => 0);
		$data_versi = $this->User_model->getData('t_version');
		foreach ($data_versi as $key) {
			$id = $key->id;
			$this->User_model->updateData('t_version', 'id', $id, $data_update);
		}
		$this->User_model->insertData('t_version', $data_input);
		$data_input_status = array('nama' => 'hardware', 'version' => $versi_baru, 'status' => 0);
		$this->User_model->insertData('t_status', $data_input_status);
		redirect('home/dashboard_admin','refresh');
	}
	public function delete_version()
	{
		$id=$this->input->post('id');
		$version=$this->input->post('version');
		
		$this->User_model->delete('t_version', 'id', $id);

		$this->User_model->delete('t_action', 'version', $version);
		$this->User_model->delete('t_approval', 'version', $version);
		$this->User_model->delete('t_finalisasi', 'version', $version);
		$this->User_model->delete('t_fuzzy_hasil_kriteria', 'version', $version);
		$this->User_model->delete('t_fuzzy_kriteria', 'version', $version);
		$this->User_model->delete('t_fuzzy_nilai_hasil', 'version', $version);
		$this->User_model->delete('t_fuzzy_perbandingan_semua', 'version', $version);
		$this->User_model->delete('t_fuzzy_sintetic', 'version', $version);
		$this->User_model->delete('t_fuzzy_vektor_minimal', 'version', $version);
		$this->User_model->delete('t_isneed', 'version', $version);
		$this->User_model->delete('t_kebutuhan_hardware', 'version', $version);
		$this->User_model->delete('t_measure', 'version', $version);
		$this->User_model->delete('t_objective', 'version', $version);
		$this->User_model->delete('t_roadmap', 'version', $version);
		$this->User_model->delete('t_status', 'version', $version);
		$user = $this->User_model->getData('t_user');
		foreach ($user as $key) {
			$user_id = $key->id_user;
			$this->User_model->delete('t_nilai_alternatif_'.$user_id, 'version', $version);
			$this->User_model->delete('t_nilai_kriteria_'.$user_id, 'version', $version);
		}
		redirect('home/dashboard_admin','refresh');
	}

	public function past_analysis()
	{
		// $data['KO'] = $this->User_model->getDataWhere2('t_isneed', 'bagan', 'KO', 'version', $version);
		// $data['SP'] = $this->User_model->getDataWhere2('t_isneed', 'bagan', 'SP', 'version', $version);
		// $data['HP'] = $this->User_model->getDataWhere2('t_isneed', 'bagan', 'HP', 'version', $version);
		// $data['ST'] = $this->User_model->getDataWhere2('t_isneed', 'bagan', 'ST', 'version', $version);
		$data['content'] = "content/past_analysis.php";
		$data['page'] = 'past_analysis';
		$data['data_version'] = $this->User_model->getDataVersi();
		$this->load->view('dashboard.php', $data);
	}
}
