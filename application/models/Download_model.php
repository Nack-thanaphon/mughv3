<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Download_model extends CI_Model
{

    public function get_newest()
    {

        $this->db->select(['p.id as id', 'p.p_title as title', 'pt.pt_name as type', 'p.p_views as view', 'i.name as image', 'p.p_created_at as date']);
        $this->db->from('posts as p');
        $this->db->join('posts_type as pt', 'p.p_type_id = pt.pt_id');
        $this->db->join('image as i', 'p.id = i.post_id');
        $this->db->where('i.cover', 1);
        $this->db->limit(3);
        $this->db->order_by("p.id", "desc");
        $query = $this->db->get();

        return $query->result();
    }


    public function getdownloadData($titleData = Null, $type = Null, $month = Null)
    {

        $this->db->select('*');
        $this->db->from('file');
        $this->db->join('file_group', 'file.filegroup = file_group.g_id');
        $this->db->where('i.status', 1);


        if (!empty($titleData)) {
            $this->db->like('file.name', $titleData);
        }
        if (!empty($type)) {
            $this->db->where('file.filegroup', $type);
        }
        if (!empty($month)) {
            $this->db->like('file.createdat', $month);
        }

        $this->db->order_by("filegroup.id", "desc");
        $query = $this->db->get();

        return $query->result();
    }


    public function get_news_month()
    {

        $query = $this->db->from('posts');
        $query = $this->db->select('p_created_at,id,CONCAT(MONTH(p_created_at),YEAR(p_created_at)) as monthyear,YEAR(p_created_at) as year');
        $query = $this->db->group_by(array("monthyear"));
        $query = $this->db->order_by("p_created_at", "desc");
        $this->db->limit(12);

        $query = $this->db->get();

        $result = [];
        foreach ($query->result() as $row) { //การปั้น array

            $Yearmonth = Yearmonth($row->p_created_at);
            $month = Year($row->p_created_at);
            $monthData = $this->get_news_bymonthlist($Yearmonth);
            // print_r($Yearmonth);
            // print_r($month);

            $result[] = array(
                "month" => $month,
                "monthData" => $monthData,
                "id" => $row->id,
            );
        }

        return $result;
    }


    public function get_news_bymonthlist($month)
    {
        $this->db->select('*');
        $this->db->from('posts');
        $this->db->like('p_created_at', $month);

        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $row) {
            // $datelist = DateThai($row->p_created_at);

            $result[] = array(
                "id" => $row->id,
                "datelist" => $row->p_created_at,
            );
        }
        return $result;
    }



    public function get_news_single($id)
    {
        $this->db->select('*,posts.id as id,image.id as imageId');
        $this->db->from('posts');
        $this->db->join('posts_type', 'posts.p_type_id = posts_type.pt_id');
        $this->db->join('image', 'posts.id = image.post_id');
        $this->db->where('posts.id =', $id);

        $query = $this->db->get();

        return $query->result();
    }

    public function get_newstype()
    {
        $this->db->select('p_type_id,pt_name, COUNT(id) as total ');
        $this->db->from('posts');
        $this->db->join('posts_type', 'posts.p_type_id = posts_type.pt_id');
        $this->db->group_by('posts.p_type_id');

        $query = $this->db->get()->result();

        return $query;
    }


   
}
