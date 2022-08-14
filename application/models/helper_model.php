<?php

defined('BASEPATH') or exit('No direct script access allowed');

class helper_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $ci = get_instance();
        $ci->load->helper('menu_helper'); // call helpers fucntion
    }
    public function search()
    {
        $arr = array();
        $allresult = 0;

        $data = $this->input->post('search');
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_news');
        $query = $this->db->like('n_name', $data);
        $query = $this->db->get();


        $result = $query->result();
        $allresult += $query->num_rows();;

        if (true) {
            foreach ($result as $row) {
                $items[] = new stdClass();
                $items['name'] = $row->n_name;
                $items['type'] = 'ข่าวสาร';
                $items['table'] = base_url('news/singlenews/' . $row->n_id);

                array_push($arr, $items);
            }
            $query = $this->db->select('*');
            $query = $this->db->from('tbl_file');
            $query = $this->db->like('f_name', $data);
            $query = $this->db->get();


            $result = $query->result();

            foreach ($result as $row) {
                $items[] = new stdClass();
                $items['name'] = $row->f_name;
                $items['type'] = 'เอกสาร';
                $items['table'] = base_url('download/singlefile/' . $row->f_id);

                array_push($arr, $items);
            }

            $query = $this->db->select('*');
            $query = $this->db->from('tbl_events');
            $query = $this->db->like('title', $data);
            $query = $this->db->get();


            $result = $query->result();

            foreach ($result as $row) {
                $items[] = new stdClass();
                $items['name'] = $row->title;
                $items['type'] = 'กิจกรรม';
                $items['table'] = base_url('events/singleEvent/' . $row->id);

                array_push($arr, $items);
            }
            return $arr;
        }
    }
}
