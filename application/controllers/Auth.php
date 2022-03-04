<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

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

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_data');
		date_default_timezone_set("ASIA/JAKARTA");
	}


	public function index()
	{
		$data['title'] = 'Home';
		$this->load->view('layout/header',$data);
		$this->load->view('layout/navbar');
		$this->load->view('auth/index');
		$this->load->view('layout/footer');

	}

	public function struktural()
	{
		$data['title'] = 'Struktural';
		$this->load->view('layout/header',$data);
		$this->load->view('layout/navbar');
		$this->load->view('auth/struktural');
		$this->load->view('layout/footer');

	}

	public function visimisi()
	{
		$data['title'] = 'Visi Misi';
		$this->load->view('layout/header',$data);
		$this->load->view('layout/navbar');
		$this->load->view('auth/visimisi');
		$this->load->view('layout/footer');

	}

	public function trikramaadhyaksa()
	{
		$data['title'] = 'Tri Krama Adhyaksa';
		$this->load->view('layout/header',$data);
		$this->load->view('layout/navbar');
		$this->load->view('auth/trikramaadhyaksa');
		$this->load->view('layout/footer');

	}

	public function profil()
	{
		$data['title'] = 'Profil';
		$this->load->view('layout/header',$data);
		$this->load->view('layout/navbar');
		$this->load->view('auth/profil');
		$this->load->view('layout/footer');

	}

	public function berita()
	{	
		
		$data['title'] = 'Berita';
		$limit =  $this->input->get('limit');
		// var_dump($id);
		// die();
		if (empty($limit)) {
			$data['lmt'] = 10;
		} else{
			$data['lmt'] = 10 + $limit;
		}
		$this->session->unset_userdata('limit');
		$this->load->view('layout/header',$data);
		$this->load->view('layout/navbar');
		$this->load->view('auth/berita');
		$this->load->view('layout/footer');

	}

	public function beritaweb()
	{
		$jumlah_data = $this->M_data->jumlah_databerita();
		// pagenation data berita di admin
		$from = $this->uri->segment(3);
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'auth/beritaweb';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 1;
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$this->pagination->initialize($config);
		$data['user'] = $this->db->get_where('t_user', ['u_nip' => $this->session->userdata('u_nip')])->row_array();
		$data['data_berita'] = $this->M_data->get_berita($config['per_page'], $from);
		$data['title'] = 'Berita';
		$this->load->view('layout/header',$data);
		$this->load->view('layout/navbar');
		$this->load->view('auth/beritapdf');
		$this->load->view('layout/footer');
		
	}

	

	public function jadwalsidang()
	{
		$data['title'] = 'Jadwal Sidang';
		$this->load->view('layout/header',$data);
		$this->load->view('layout/navbar');
		$this->load->view('auth/jadwalsidang');
		$this->load->view('layout/footer');

	}

	public function pengaduanmasyarakat()
	{
		$this-> form_validation -> set_rules('nama', 'Nama', 'required|trim',[
			'required' =>'Nama Tidak Boleh Kosong',
		]);
		$this-> form_validation -> set_rules('nik', 'Nik', 'required|trim|is_numeric',[
			'required' =>'Nik Tidak Boleh Kosong',
			'is_numeric' => 'Nik Tidak Benar'
		]);
		$this-> form_validation -> set_rules('email', 'email', 'required|trim|valid_email',[
			'required' =>'Nik Tidak Boleh Kosong',
			'valid_email' => 'Input email Dengan Benar'
		]);
		$this-> form_validation -> set_rules('alamat', 'Alamat', 'required|trim',[
			'required' =>'Alamat Tidak Boleh Kosong',
		]);
		$this-> form_validation -> set_rules('nohp', 'Nohp', 'required|trim|is_numeric',[
			'required' =>'No hp Tidak Boleh Kosong',
			'is_numeric' => 'No hp Tidak Benar'
		]);
		$this-> form_validation -> set_rules('subjek', 'Subjek', 'required|trim|in_list[1,2,3,4]',[
			'required' =>'Subjek Tidak Boleh Kosong',
			'in_list' => 'Subjek Tidak Boleh Kosong'
		]);
		$this-> form_validation -> set_rules('detail', 'Detail', 'required|trim',[
			'required' =>'Detail Tidak Boleh Kosong',
		]);
		if($this-> form_validation-> run() == false) {
			$data['title'] = 'Pengaduan Masyarakat';
			$this->load->view('layout/header',$data);
			$this->load->view('layout/navbar');
			$this->load->view('auth/pengaduanmasyarakat');
			$this->load->view('layout/footer');
		} else {
			$nama = $this->input->post('nama');
			$nik = $this->input->post('nik');
			$email = $this->input->post('email');
			$alamat = $this->input->post('alamat');
			$nohp = $this->input->post('nohp');
			$subjek = $this->input->post('subjek');
			$detail = $this->input->post('detail');
			$image = $_FILES['image'];
				if($image = '') {
					$this->form_validation->set_rules('image', 'Document', 'required',[
						'required' =>'Gambar Tidak Boleh Kosong',
					]);
				} else {
					$nmfile = time();
					$config['upload_path']          = './assets/img/foto_bukti/';
					$config['allowed_types']        = 'jpg|png';
					$config['overwrite']            = true;
		        $config['max_size']             = 2048; // 2MB
		        $config['width']            = 680;
		        $config['height']           = 383;
		        $config['file_name'] = $nmfile;
		        $this->load->library('upload', $config);
		        if (!$this->upload->do_upload('image')) {
		        	redirect('auth/pengaduanmasyarakat');
		        } else{
		        	$image = $this->upload->data("file_name");
		        }
		    }

		    if ($subjek == 1) {
		    	$subjek = "Pos Pelayanan Hukum";
		    } elseif ($subjek == 2) {
		    	$subjek = "Pengaduan Masyarakat";
		    } elseif ($subjek == 3) {
		    	$subjek = "Pelayanan Informasi Publik";
		    } elseif ($subjek == 4) {
		    	$subjek = "Pengawasan Aliran Kepercayaan Masyarakat";
		    }

		    $data = [
		    	'p_nama' => $nama,
		    	'p_nik' => $nik,
		    	'p_email' => $email,
		    	'p_alamat'=> $alamat,
		    	'p_nohp' => $nohp,
		    	'p_subjek' => $subjek,
		    	'p_detail' => $detail,
		    	'p_bukti' => $image,
		    	'p_tanggal' => date('Y-m-d'),
		    	'p_datecreated' => time()

		    ];
		    $this-> db ->insert('t_pengaduan', $data);
		    $this-> session->set_flashdata('messagepengaduan', '<div class="col-lg-12 text-center text-lg-left"><div class="alert alert-success" role="alert">
		    	Pengaduan Telah Kami Terima, Terima Kasih Telah Melapor!
		    	</div></div>');
		    redirect('auth/pengaduanmasyarakat/','refresh');
		}
	}

	public function hubungikami()
	{
		$this-> form_validation -> set_rules('nama', 'Nama', 'required|trim',[
			'required' =>'Nama Tidak Boleh Kosong',
		]);
		$this-> form_validation -> set_rules('email', 'email', 'required|trim|valid_email',[
			'required' =>'Nik Tidak Boleh Kosong',
			'valid_email' => 'Input email Dengan Benar'
		]);
		$this-> form_validation -> set_rules('nohp', 'Nohp', 'required|trim|is_numeric',[
			'required' =>'No hp Tidak Boleh Kosong',
			'is_numeric' => 'No hp Tidak Benar'
		]);
		$this-> form_validation -> set_rules('pesan', 'Pesan', 'required|trim',[
			'required' =>'Message Tidak Boleh Kosong',
		]);
		if($this-> form_validation-> run() == false) {
		$data['title'] = 'Hubungi Kami';
		$this->load->view('layout/header',$data);
		$this->load->view('layout/navbar');
		$this->load->view('auth/hubungikami');
		$this->load->view('layout/footer');
		} else {
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$nohp = $this->input->post('nohp');
			$pesan = $this->input->post('pesan');

		    $data = [
		    	'c_nama' => $nama,
		    	'c_email' => $email,
		    	'c_nohp' => $nohp,
		    	'c_pesan' => $pesan,
		    	'c_tanggal' => date('Y-m-d'),
		    	'c_datecreated' => time()

		    ];
		    $this-> db ->insert('t_contact_us', $data);
		    $this-> session->set_flashdata('messagecontact', '<div class="col-lg-12 text-center text-lg-left"><div class="alert alert-success" role="alert">
		    	Pesan Telah Kami Terima, Terima Kasih Telah Menghubungi!
		    	</div></div>');
		    redirect('auth/hubungikami/','refresh');
		}

	}

	public function logout()
	{
		$this->session->unset_userdata('u_nip');
		$this->session->unset_userdata('u_id');
		$this->session->unset_userdata('u_nama');
		$this->session->set_flashdata('message', '<div class="col-lg-12 text-center text-lg-left"><div class="alert alert-success" role="alert">
			Selamat anda berhasil Logout!
			</div></div>');
		redirect('auth', 'refresh');
	}


}
