<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('menu_helper');
        $this->load->model('News_model');
        $this->load->model('Newsletter_model');
        $this->load->model('Event_model');
        $this->load->model('Gallery_model');
        $this->load->model('Download_model');
        $this->load->model('Helper_model');
    }
    //set the class variable.
    var $template  = array();
    var $data      = array();
    //Load layout    
    public function layout()
    {
        $this->template['header'] = $this->load->view('layout/header', $this->data, true);
        $this->template['navbar'] = $this->load->view('layout/navbar', $this->data, true);
        $this->template['middle'] = $this->load->view($this->middle, $this->data, true);
        $this->template['script'] = $this->load->view('layout/script', $this->data, true);
        $this->template['footer'] = $this->load->view('layout/footer', $this->data, true);
        $this->load->view('layout/index', $this->template);
    }


    // public function renderImg($file = null)
    // {
    //     $website = 'https://info.mugh.or.th/' . $file;
    //     return $website;
    // }

    public function counter($id, $name, $table)
    {
        $this->db->where('id', $id);
        $this->db->set($name, $name . '+ 1', FALSE);
        $this->db->update($table);

        return  http_response_code(200);
    }
}
