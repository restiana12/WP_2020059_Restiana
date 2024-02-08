<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->user_id == null) redirect('/');

        $this->load->model('user_model');
    }

    public function index()
    {
        $data['konten'] = "user/index";
        $data['daftar_user'] = $this->user_model->get()->result();
        $this->load->view('layout/master', $data);
    }

    public function tambah()
    {
        $data['konten'] = "user/tambah";
        $data['judul'] = 'Tambah User';
        $this->load->view('layout/master', $data); 
    }

    public function simpan()
    {
        $data['name'] = $this->input->post('name');
        $data['username'] = $this->input->post('username');
        $data['email'] = $this->input->post('email');
        $data['avatar'] = date('dmYHis').'.jpg';
        //proses upload
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name'] = $data['avatar'];
        $this->load->library('upload');
        $this->upload->initialize($config);

        if(! $this->upload->do_upload('avatar')){
            var_dump($this->upload->display_errors());
        }else{
            $this->session->set_flashdata('simpan', 'Berhasil menambah user');
            $this->user_model->insert($data);
            redirect('user');
        }
    }

    public function edit($id)
    {
        $user = $this->user_model->get_by_id($id)->result()[0];
        $data['konten'] = "user/edit";
        $data['user'] = $user;
        $this->load->view('layout/master', $data);
    }

    public function simpan_edit()
    {
        $id = $this->input->post('id');
        $data['name'] = $this->input->post('name');
        $data['username'] = $this->input->post('username');
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

        if($this->user_model->update($id, $data)){
            return redirect('user');
        }
    }

    public function hapus($id)
    {
        $this->user_model->delete($id);
        redirect('user');
    }
}