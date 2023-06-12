<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profil extends CI_Controller {


        public function __construct()
        {
                parent::__construct();
        }

	public function index(){
		$data['user'] = $this->db->get_where('user', ['username' =>$this->session->userdata('username')])->row_array();
		$status = $this->session->userdata('status');

	if ($status == 'admin'){
		$this->load->view('admin/admin_header',$data);
		$this->load->view('admin/admine_sidebar',$data);
		$this->load->view('admin/admin_topbar',$data);
		$this->load->view('profil',$data);
		$this->load->view('admin/admin_footer',$data);
	}
	else if ($status == 'kasir'){
		$this->load->view('kasir/kasir_header',$data);
		$this->load->view('kasir/kasir_sidebar',$data);
		$this->load->view('kasir/kasir_topbar',$data);
		$this->load->view('profil',$data);
		$this->load->view('kasir/kasir_footer',$data);
	}
	else if ($status == 'keuangan'){
		$this->load->view('keuangan/keu_header',$data);
		$this->load->view('keuangan/keu_sidebar',$data);
		$this->load->view('keuangan/keu_topbar',$data);
		$this->load->view('profil',$data);
		$this->load->view('keuangan/keu_footer',$data);
	}
	else if ($status == 'pemilik'){
		$this->load->view('pemilik/pemilik_header',$data);
		$this->load->view('pemilik/pemilik_sidebar',$data);
		$this->load->view('pemilik/pemilik_topbar',$data);
		$this->load->view('profil',$data);
		$this->load->view('pemilik/pemilik_footer',$data);
	}
}
    	 public function do_upload(){
			$config['upload_path']          = 'asset/img/foto/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 100; //set max size allowed in Kilobyte
    $config['max_width']            = 1000; // set max width image allowed
    $config['max_height']           = 1000; // set max height allowed
    $config['file_name']            = round(microtime(true) * 1000);
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('photo')) {
        $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
        redirect('index.php/profile');
    }
    return $this->upload->data('file_name');
}
public function updateProfile()
{
    $username = $this->session->userdata('username');
    $data = array(
        'full_name' => $this->input->post('fullname'),
        'email' => $this->input->post('email'),
    );
        if (!empty($_FILES['photo']['name'])) {
            $upload = $this->do_upload();
            $user = $this->Auth_model->get_by_id($this->session->userdata('id'));
            if (file_exists('asset/img/foto/'.$user->photo) && $user->photo) {
                unlink('asset/img/foto/'.$user->photo);
            }

            $data['photo'] = $upload;
        }
        $result = $this->profil_model->update($data, $username);
        if ($result > 0) {
            $this->updateProfil();
            $this->session->set_flashdata('msg', show_succ_msg('Data Profil Berhasil diubah'));
            redirect('index.php/profil');
        } else {
            $this->session->set_flashdata('msg', show_err_msg('Data Profile Gagal diubah'));
            redirect('index.php/profil');
        }
}
}

