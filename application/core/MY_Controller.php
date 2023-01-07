<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('menu_helper');
        $this->load->model('News_model');
		$this->load->model('Event_model');
		$this->load->model('Gallery_model');
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


    public function renderImg($file = null)
    {

        $website = 'https://info.aun-hpn.or.th/' . $file;
        return $website;
    }




}
