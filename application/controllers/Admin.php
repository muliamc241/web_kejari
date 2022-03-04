<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this -> load -> library('form_validation');
		$this->load->model('M_data');
		date_default_timezone_set("ASIA/JAKARTA");

	}


	public function index()
	{	
		$this->cek();
		$jumlah_data = $this->M_data->jumlah_data();
		// pagenation data tamu di admin
		$from = $this->uri->segment(3);
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'admin/index';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
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
		$data['title'] = 'Dashboard Admin';
		$data['user'] = $this->db->get_where('t_user', ['u_nip' => $this->session->userdata('u_nip')])->row_array();
		$data['data_pengaduan'] = $this->M_data->get_pengaduan($config['per_page'], $from);
		$this->load->view('layout/admin/header',$data);
		$this->load->view('layout/admin/nav');
		$this->load->view('admin/index');
		$this->load->view('layout/admin/foter');
	}

	public function login()
	{
		if ($this->session->userdata('u_nip')) {
			redirect('user');
		} else 
		$this->form_validation->set_rules('nip', 'Nip', 'required|trim', [
			'required' => 'Nip Tidak Boleh Kosong',
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required' => 'Password Tidak Boleh Kosong'
		]);
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Silahkan Login';
			$this->load->view('layout/admin/header',$data);
			$this->load->view('admin/login');
			$this->load->view('layout/admin/foter');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$nip = $this->input->post('nip');
		$password = $this->input->post('password');

		$user = $this->db->get_where('t_user', ['u_nip' => $nip])->row_array();

		//jika user ada
		if ($user) {
				//cek password
			if (password_verify($password, $user['u_password'])) {
				$data = [
					'u_id'  =>  $user['u_id'],
					'u_nama' => $user['u_nama'],
					'u_nip' => $user['u_nip'],
				];
				$this->session->set_userdata($data);
				redirect('admin');
			} else {
				$this->session->set_flashdata('message', '<div class="col-lg-12 text-center text-lg-left"><div class="alert alert-danger" role="alert">
					Password salah!
					</div></div>');
				redirect('admin/login', 'refresh');
			}
		} else {
			//jika user tidak ada
			$this->session->set_flashdata('message', '<div class="col-lg-12 text-center text-lg-left"><div class="alert alert-danger" role="alert">
				Nip Tidak terdaftar
				</div></div>');
			redirect('admin/login', 'refresh');
		}
	}

	public function hubungikami()
	{
		$this->cek();
		$jumlah_data = $this->M_data->jumlah_data();
		// pagenation data tamu di admin
		$from = $this->uri->segment(3);
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'admin/hubungikami';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
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
		$data['title'] = 'Table Hubungi Kami';
		$data['user'] = $this->db->get_where('t_user', ['u_nip' => $this->session->userdata('u_nip')])->row_array();
		$data['data_hubungikami'] = $this->M_data->get_hubungikami($config['per_page'], $from);
		$this->load->view('layout/admin/header',$data);
		$this->load->view('layout/admin/nav');
		$this->load->view('admin/hubungikami');
		$this->load->view('layout/admin/foter');
	}

	public function berita()
	{
		$this->cek();
		$jumlah_data = $this->M_data->jumlah_databerita();
		// pagenation data berita di admin
		$from = $this->uri->segment(3);
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'admin/berita';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
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
		$data['title'] = 'Table Berita';
		$data['user'] = $this->db->get_where('t_user', ['u_nip' => $this->session->userdata('u_nip')])->row_array();
		$data['data_berita'] = $this->M_data->get_berita($config['per_page'], $from);
		$this->load->view('layout/admin/header',$data);
		$this->load->view('layout/admin/nav');
		$this->load->view('admin/tambah_berita');
		$this->load->view('layout/admin/foter');
	}

	public function tambah_berita()
	{
		$judul = $this->input->post('b_judul');
		$pdf = $_FILES['b_file'];
		if($pdf = '') {} else {
			$nmfile = "Berita ".time();
			$config['upload_path']          = './file/berita/';
			$config['allowed_types']        = 'pdf';
			$config['overwrite']            = true;
        $config['max_size']             = 2048; // 2MB
        $config['file_name'] = $nmfile;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('b_file')) {
        	redirect('admin/berita');
        } else{
        	$file = $this->upload->data("file_name");
        }
    }
    $data = [
    	'b_judul' => $judul,
    	'b_file' => $file,
    	'b_tanggal' => time(),

    ];
    $this-> db ->insert('t_berita', $data);
    $this-> session->set_flashdata('message', '<div class="col-lg-12 text-center text-lg-left"><div class="alert alert-success" role="alert">
    	Selamat Berhasil berhasil di Tambah!
    	</div></div>');
    redirect('admin/berita','refresh');
}

public function hapus_pesan($id)
{
	$this->db->delete('t_contact_us', ['c_id' => $id]);
	$this->session->set_flashdata('message', '<div class="col-lg-12 text-center text-lg-left"><div class="alert alert-success" role="alert">Pesan Telah dihapus</div></div>');
	redirect('admin/hubungikami');
}

public function hapus_pengaduan($id)
{
	$this->db->delete('t_pengaduan', ['p_id' => $id]);
	$this->session->set_flashdata('message', '<div class="col-lg-12 text-center text-lg-left"><div class="alert alert-success" role="alert">Pengduan Telah dihapus</div></div>');
	redirect('admin');
}


	// >*]6%Vb@3QZUKX5C password admin
public function daftar()
{
	$data = array(
		'u_nama' => 'admin',
		'u_nip' => htmlspecialchars($this->input->post('nip')),
		'u_password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
	);
	$this->db->insert('t_user', $data);
}

public function cek()
{
	$cek_role = $this->db->get_where('t_user', ['u_nip' => $this->session->userdata('u_nip')])->row_array();
	if (empty($this->session->userdata('u_nip'))) {
		redirect('auth');
	} 
}

}
