<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Banner_model');
        $this->load->helper('menu_helper'); // call helpers fucntion
    }


    public function getbannerbyid()
    {
        $id = $this->input->post('id');

        $this->db->select('*');
        $this->db->from('banner');
        $this->db->where('id =', $id ,'status',1);
        $result = $this->db->get()->row();

        $response = json_encode($result);

        echo $response;
    }
}
