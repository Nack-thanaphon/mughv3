<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Helper_model extends CI_Model
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
        $query = $this->db->from('posts');
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
            $query = $this->db->from('file');
            $query = $this->db->like('f_name', $data);
            $query = $this->db->get();


            $result = $query->result();

            foreach ($result as $row) {
                $items[] = new stdClass();
                $items['name'] = $row->f_name;
                $items['type'] = 'เอกสาร';
                $items['table'] = base_url('download/singlefile/' . $row->id);

                array_push($arr, $items);
            }

            $query = $this->db->select('*');
            $query = $this->db->from('events');
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
    public function getfile()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('file');
        $query = $this->db->join('file_group', 'file.filegroup = file_group.g_id');
        $query = $this->db->where('status =', '1');
        $query = $this->db->limit(4);
        $query = $this->db->order_by('id', 'desc');

        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $row) { //การปั้น array

            // strMonthThai;
            $date = Datethai($row->createdat);


            $result[] = array(
                "id" => $row->id,
                "name" => $row->name,
                "file" => $row->file,
                "group" => $row->g_name,
                "date" => $date,
            );
        }


        return $result;
    }


    public function renderImg($file = null)
    {

        $website = 'https://info.MUGH.or.th/' . $file;
        return $website;
    }



    public function getContact()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('contact');
        $query = $this->db->get();

        return $query->result();
    }
}
