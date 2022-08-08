<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gallery_model');
        $this->load->helper('menu_helper'); // call helpers fucntion
    }

    public function index()
    {
        $this->load->view('includes/header');
        $this->load->view('includes/navbar');
        $this->load->view('includes/script');
        $this->load->view('gallery/index.php');
        $this->load->view('includes/search');
        $this->load->view('includes/footer');
    }
    public function singlegallery($gallery_id = NULL)
    {

        $data['gallery'] = $this->Gallery_model->get_gallery_single($gallery_id);
        $url_title = $data['gallery'][0]['name'];

        $url_slug = url_title($url_title, 'dash', TRUE);
        redirect(base_url('Gallery/Result/' . $gallery_id . '/' . $url_slug));
    }


    public function Result($id)
    {
        $data['gallery'] = $this->Gallery_model->get_gallery_single($id);
        $url_title['title'] = $data['gallery'][0]['name'];
        $url_title['img'] = $data['gallery'][0]['image'];

        $this->load->view('includes/header', $url_title);
        $this->load->view('includes/navbar');
        $this->load->view('includes/script');
        $this->load->view('gallery/detail.php', $data);
        $this->load->view('includes/search');
        $this->load->view('includes/footer');
    }

    public function get_gallery()
    {
        $data = $this->Gallery_model->get_gallery();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }




    public function get_gallery_bymonth()
    {
        $data = $this->Gallery_model->get_gallery_bymonth();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function get_gallery_bymonthlist()
    {
        $getData = $this->input->post('m_list');
        $month = DatetoInt($getData);
        $data = $this->Gallery_model->get_gallery_bymonthlist($month);

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}
