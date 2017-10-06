<?php
class News extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model('news_model');
        $this->load->helper('url_helper');
    }
 
    public function index()
    {

        if (!isset($_SESSION['logged_in'])) {

            redirect('login');
        }

        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'News archive';
 
        $this->load->view('header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('footer');
    }
 
    public function view($slug = NULL)
    {

        if (!isset($_SESSION['logged_in'])) {

            redirect('login');
        }

        $data['news_item'] = $this->news_model->get_news($slug);
        
        if (empty($data['news_item']))
        {
            show_404();
        }
 
        $data['title'] = $data['news_item']['title'];
 
        $this->load->view('header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('footer');
    }
    
    public function create()
    {

        if (!isset($_SESSION['logged_in'])) {

            redirect('login');
        }

        $this->load->helper('form');
        $this->load->library('form_validation');
 
        $data['title'] = 'Create a news item';
 
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');
 
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('header', $data);
            $this->load->view('news/create');
            $this->load->view('footer');
 
        }
        else
        {
            $this->news_model->set_news();
            $this->load->view('header', $data);
            $this->load->view('news/success');
            $this->load->view('footer');
        }
    }
    
    public function edit()
    {
        if (!isset($_SESSION['logged_in'])) {

            redirect('login');
        }

        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['title'] = 'Edit a news item';        
        $data['news_item'] = $this->news_model->get_news_by_id($id);
        
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'Text', 'required');
 
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('header', $data);
            $this->load->view('news/edit', $data);
            $this->load->view('footer');
 
        }
        else
        {
            $this->news_model->set_news($id);
            //$this->load->view('news/success');
            redirect( base_url() . 'news');
        }
    }
    
    public function delete()
    {

        if (!isset($_SESSION['logged_in'])) {

            redirect('login');
        }

        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
                
        $news_item = $this->news_model->get_news_by_id($id);
        
        $this->news_model->delete_news($id);        
        redirect( base_url() . 'news');        
    }
}