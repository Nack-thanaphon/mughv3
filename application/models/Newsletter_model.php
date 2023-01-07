<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Newsletter_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $ci = get_instance();
        $ci->load->helper('menu_helper'); // call helpers fucntion
    }

    public function get_news()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('postsletter');
        $query = $this->db->order_by("id", 'DESC');

        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $row) { //การปั้น array

            $date = DateThai($row->n_create);
            // strMonthThai;
            $result[] = array(
                "id" => $row->id,
                "title" => $row->n_title,
                "date" => $date,
                "file" => $row->n_file,
            );
        }


        return $result;
    }



    public function get_news_bymonth()
    {
        $query = $this->db->select('n_create,id,CONCAT(MONTH(n_create),YEAR(n_create)) as monthyear,YEAR(n_create) as year');
        // $query = $this->db->select('*');
        $query = $this->db->from('postsletter');
        $query = $this->db->group_by(array("n_create"));
        $query = $this->db->order_by("n_create", "desc");
        $this->db->limit(12);

        $query = $this->db->get();
        foreach ($query->result() as $row) { //การปั้น array


            $date = Year($row->n_create);
            $Yearmonth = Yearmonth($row->n_create);
            $month = $this->get_news_bymonthlist($Yearmonth);
    
            $result[] = array(
                "id" => $row->id,
                "n_create" => $date,
                "month" => $month,
            );
        }

        return $result;
    }

    public function get_news_bymonthlist($month)
    {
        $this->db->select('*');
        $this->db->from('postsletter');
        $this->db->like('n_create', $month);

        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $row) { //การปั้น array
            $datelist = DateThai($row->n_create);

            $result[] = array(
                "id" => $row->id,
                "datelist" => $datelist,
            );
        }
        return $result;
    }



  


    public function counter()
    {
        $id = $this->input->post('id');
        $this->db->set('n_views', '`n_views`+ 1', FALSE);
        $this->db->where('n_id', $id);
        $this->db->update('posts');
    }
}
