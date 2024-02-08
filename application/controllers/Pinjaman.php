<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->user_id == null) redirect('/');

        $this->load->model('pinjaman_m');
        date_default_timezone_set('asia/jakarta');
    }

    public function index()
    {
        $data['konten'] = "pinjaman/index";
        $data['daftar_pinjaman'] = $this->pinjaman_m->get()->result();
        $this->load->view('layout/master', $data);
    }

    public function tambah()
    {
        $data['konten'] = "pinjaman/tambah";
        $data['judul'] = 'Tambah pinjaman';
        $this->load->view('layout/master', $data); 
    }

    public function simpan()
    {
        $data['id_buku'] = $this->input->post('id_buku');
        $data['id_user'] = $this->input->post('id_user');
        $data['tanggal_pinjam'] = $this->input->post('tanggal_pinjam');
    
        if(! $this->pinjaman_m->insert($data)){
            var_dump($this->upload->display_errors());
        }else{
            $this->session->set_flashdata('flash', 'Berhasil menambah pinjaman');
            redirect('pinjaman');
        }
    }

    public function edit($id)
    {
        $pinjaman = $this->pinjaman_m->get_by_id($id)->result()[0];
        $data['konten'] = "pinjaman/edit";
        $data['pinjaman'] = $pinjaman;
        $this->load->view('layout/master', $data);
    }

    public function simpan_edit()
    {
        $id = $this->input->post('id');
        $data['name'] = $this->input->post('name');
        $data['pinjamanname'] = $this->input->post('pinjamanname');
        $data['email'] = $this->input->post('email');

        if($this->input->post('password')!=null)
        {
            $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        }

        // if isset avatar
        
        if(!empty($_FILES['avatar']['tmp_name'])){
            $data['avatar'] = date('dmYHis').'.jpg';
            //proses upload
            $config['upload_path']          = './upload/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['file_name'] = $data['avatar'];
            $this->load->library('upload');
            $this->upload->initialize($config);

            if(! $this->upload->do_upload('avatar')){
                var_dump($this->upload->display_errors());
            }
        }

        if($this->pinjaman_m->update($id, $data)){
            return redirect('pinjaman');
        }
    }

    public function hapus($id)
    {
        $this->pinjaman_m->delete($id);
        redirect('pinjaman');
    }

    public function kembalikan($id)
    {
        $this->pinjaman_m->delete($id);
        $this->session->set_flashdata('flashDelete');
        redirect('pinjaman');
    }
}