<?php
class blog extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('blog_model');

        $this->load->library('session');
    }

    public function index($offset = 0)
    {
        $this->load->library('pagination');

        $config['base_url'] = site_url('blog/index');
        $config['total_rows'] = $this->blog_model->gettotalblogs();
        $config['per_page'] = 3;

        // 3. Tambahkan konfigurasi Bootstrap Clean Blog
        $config['full_tag_open']    = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav>';

        $config['first_link']       = 'First';
        $config['first_tag_open']   = '<li class="page-item">';
        $config['first_tag_close']  = '</li>';

        $config['last_link']        = 'Last';
        $config['last_tag_open']    = '<li class="page-item">';
        $config['last_tag_close']   = '</li>';

        $config['next_link']        = '&raquo;';
        $config['next_tag_open']    = '<li class="page-item">';
        $config['next_tag_close']   = '</li>';

        $config['prev_link']        = '&laquo;';
        $config['prev_tag_open']    = '<li class="page-item">';
        $config['prev_tag_close']   = '</li>';

        $config['cur_tag_open']     = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close']    = '</a></li>';

        $config['num_tag_open']     = '<li class="page-item">';
        $config['num_tag_close']    = '</li>';

        $config['attributes']       = ['class' => 'page-link'];
        
        $this->pagination->initialize($config);

        $query = $this->blog_model->getblogs($config['per_page'], $offset);
        //blog itu nama table sedangkan get (query builder dari CI) membuatkan perintah sql select * where nama_table (shortcut)
        $data['blogs'] = $query->result_array();
        //result(); dipakai ketika bentuk object jika menggunakan array (contoh : $blog['title']; gunakan tambahan _array();

        $this->load->view('blog', $data) ;
    }

    public function detail($url)
    {
        $query = $this->blog_model->getsingleblog('url', $url);
        $data['blog']= $query->row_array();
        //kenapa row? untuk mengambil data satu saja
        $this->load->view('detail', $data);
        //$data artinya passsing ke view>detail sehingga didalam view detail kita dapat memanggil variabel blog yang isinya adalah detail dari satu blog
    }

    public function add_data()
    {   
        $this->form_validation->set_message('required', '%s masih kosong, mohon diisi'); 
        $this->form_validation->set_message('alpha_dash', '%s tidak boleh mengandung spasi atau simbol selain _ dan -'); 
        $this->form_validation->set_message('is_unique', '%s sudah terdaftar, silakan gunakan yang lain.'); 
        
        $this->form_validation->set_rules('title','Judul','required');
        $this->form_validation->set_rules('url','URL','required|is_unique[blog.url]|alpha_dash');
        $this->form_validation->set_rules('content','Konten','required');

    if($this->form_validation->run() === TRUE)
        {
        $data['title'] = $this->input->post('title');   
        $data['content'] = $this->input->post('content');
        $data['url'] = $this->input->post('url');

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2000;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;

        $this->load->library('upload', $config);
        $this->upload->do_upload('cover');
        
        if(!empty($this->upload->data()['file_name']))
        {
            $post['cover'] = $this->upload->data()['file_name'];
        }

    $id = $this->blog_model->insertblog($data);

    if($id){
        $this->session->set_flashdata("message",'<div class="alert alert-success">Artikel baru berhasil ditambahkan</div>');
        redirect('/');
        }
        else {
        $this->session->set_flashdata("message",'<div class="alert alert-warning">Artikel gagal disimpan. Silakan coba lagi"</div>');
        redirect('/');
        }   
    }
        $this->load->view('form_add');
    }

    public function edit_data($id)
    {    

        $query = $this->blog_model->getsingleblog('id', $id);
        $data['blog'] = $query->row_array();

        $this->form_validation->set_message('required', '%s masih kosong, mohon diisi'); 
        $this->form_validation->set_message('alpha_dash', '%s tidak boleh mengandung spasi atau simbol selain _ dan -'); 
        $this->form_validation->set_message('is_unique', '%s sudah terdaftar, silakan gunakan yang lain.'); 
        
        $this->form_validation->set_rules('title','Judul','required');
        $this->form_validation->set_rules('url','URL','required|is_unique[blog.url]|alpha_dash');
        $this->form_validation->set_rules('content','Konten','required');

        if($this->form_validation->run() === TRUE){
        $post['title'] = $this->input->post('title');   
        $post['content'] = $this->input->post('content');
        $post['url'] = $this->input->post('url');

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2000;
        $config['max_width']            = 5000;
        $config['max_height']           = 5000;

        $this->load->library('upload', $config);
        $this->upload->do_upload('cover');
        
        if(!empty($this->upload->data()['file_name']))
        {
            $post['cover'] = $this->upload->data()['file_name'];
        }

    $id = $this->blog_model->updateblog($id, $post);
    if($id){
        $this->session->set_flashdata("message",'<div class="alert alert-success">Artikel berhasil diperbarui</div>');
        redirect('/');
        }
        else {
        $this->session->set_flashdata("message",'<div class="alert alert-warning">Artikel gagal diperbarui. Silakan coba lagi</div>');
        redirect('/');
        }   
    }
        $this->load->view('form_edit', $data);
    }

    public function delete_data($id)
    {
        $result = $this->blog_model->deleteblog($id);
        
        if($result)
        $this->session->set_flashdata("message",'<div class="alert alert-success">Artikel berhasil dihapus</div>');
        else 
        $this->session->set_flashdata("message",'<div class="alert alert-warning">Artikel gagal dihapus. Silakan coba lagi</div>');

        redirect('/');
    }

    public function login()
    {
        if($this->input->post()){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        if($username == 'admin' && $password == 'admin')
        {
            $_SESSION['username'] = 'admin';
            redirect('/');
        }
        else{
            $this->session->set_flashdata("message",'<div class="alert alert-warning">Login gagal</div>');
            redirect('blog/login');
        }
}
        $this->load->view('login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }
    
}