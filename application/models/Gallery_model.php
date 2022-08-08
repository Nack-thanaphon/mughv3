<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gallery_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $ci = get_instance();
        $ci->load->helper('menu_helper'); // call helpers fucntion
    }

    public function get_gallery()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_gallery');
        $this->db->join('tbl_images', 'tbl_images.g_id=tbl_gallery.g_id');
        $query = $this->db->group_by("tbl_gallery.g_id");

        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $row) { //การปั้น array

            $date = DateThai($row->g_date);
            // strMonthThai;
            $result[] = array(
                "g_id" => $row->g_id,
                "g_name" => $row->g_name,
                "g_detail" => $row->g_detail,
                "g_image" => $row->i_name,
                "g_date" => $date,
            );
        }


        return $result;
    }


    public function get_gallery_bymonth()
    {
        $query = $this->db->select('create_at,n_id,CONCAT(MONTH(create_at),YEAR(create_at)) as monthyear,YEAR(create_at) as year');
        // $query = $this->db->select('*');
        $query = $this->db->from('tbl_gallery');
        $query = $this->db->group_by(array("monthyear"));
        $query = $this->db->order_by("create_at", "desc");
        $this->db->limit(12);

        $query = $this->db->get();
        foreach ($query->result() as $row) { //การปั้น array


            $date = Year($row->create_at);
            $Yearmonth = Yearmonth($row->create_at);
            $month = $this->get_gallery_bymonthlist($Yearmonth);
            // print_r($Yearmonth);

            $result[] = array(
                "n_id" => $row->n_id,
                "create_at" => $date,
                "month" => $month,
            );
        }

        return $result;
    }

    public function get_gallery_bymonthlist($month)
    {
        $this->db->select('*');
        $this->db->from('tbl_gallery');
        $this->db->like('create_at', $month);

        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $row) { //การปั้น array
            $datelist = DateThai($row->create_at);

            $result[] = array(
                "id" => $row->n_id,
                "datelist" => $datelist,
            );
        }
        return $result;
    }



    public function get_gallery_single($id)
    {

        $this->db->select('*')
            ->from('tbl_gallery')
            ->join('tbl_images', 'tbl_gallery.g_id=tbl_images.g_id')
            ->where('tbl_images.g_id =', $id);

        $query = $this->db->get();
        $data = $query->result();

        $result = [];
        foreach ($data as $row) {

            $date = Datethai($row->g_date);

            $result[] = array(
                "name" => $row->g_name,
                "detail" => $row->g_detail,
                "date" => $date,
                "image" => $row->i_name,
            );
        }
        return  $result;
    }
}
