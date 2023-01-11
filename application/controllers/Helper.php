<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Helper extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
        $this->load->model('Helper_model');
        $ci = get_instance();
        $ci->load->helper('menu_helper'); // call helpers fucntion
    }


    public function counter()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $table = $this->input->post('table');

        $this->db->where('id', $id);
        $this->db->set($name, $name . '+ 1', FALSE);
        $this->db->update($table);

        return http_response_code(200);
    }

    public function countervisiter()
    {
        $ip = $this->input->post('ip');

        $res = file_get_contents('https://www.iplocate.io/api/lookup/' . $ip . '');
        // $res = file_get_contents('https://www.iplocate.io/api/lookup/45.130.83.9');
        // $response = json_decode($res);
        // echo $response;
        if (!empty($res)) {
            $res = json_decode($res);
            $country = $res->country; // United States
            // $continent = $res->continent; // North America
            $org = $res->org; // North America
            $latitude = $res->latitude; // 37.751
            $longitude = $res->longitude; // -97.822

            $data = array(
                'ip' => $ip,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'org' => $org,
                'nation' => $country
            );
            if ($this->db->insert('webstat', $data)) {
                $response = http_response_code(200);
                echo json_encode($response);
            } else {
                $response = http_response_code(500);
                echo json_encode($response);
            }
        }
    }
}
