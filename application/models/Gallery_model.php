<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gallery_model extends CI_Model
{

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


    public function getbanner()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('banner');
        $query = $this->db->where('status =', '1');
        $query = $this->db->order_by('id', 'desc');
        // $this->db->join('tbl_images', 'tbl_images.g_id=tbl_gallery.g_id');
        // $query = $this->db->group_by("tbl_gallery.g_id");

        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $row) { //การปั้น array

            // strMonthThai;
            $result[] = array(
                "id" => $row->id,
                "name" => $row->title,
                "image" => $row->img
            );
        }


        return $result;
    }


    public function getbannerbyId()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('banner');
        $query = $this->db->where('status =', '1');
        $query = $this->db->order_by('id', 'desc');
        // $this->db->join('tbl_images', 'tbl_images.g_id=tbl_gallery.g_id');
        // $query = $this->db->group_by("tbl_gallery.g_id");

        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $row) { //การปั้น array

            // strMonthThai;
            $result[] = array(
                "id" => $row->id,
                "name" => $row->title,
                "image" => $row->img
            );
        }


        return $result;
    }

    public function getImageData($titleData = Null, $type = Null, $month = Null)
    {

        $this->db->select('*');
        $this->db->from('newsletter');
        $this->db->join('image', 'image.gallery_id = gallery.id');
        $this->db->where('newsletter.status', 1);


        if (!empty($titleData)) {
            $this->db->like('newsletter.title', $titleData);
        }
        if (!empty($month)) {
            $this->db->like('newsletter.date', $month);
        }
        $this->db->order_by("newsletter.id", "desc");
        $query = $this->db->get();

        return $query->result();
    }


    // // public function get_type($table,$join,$query)
    // public function get_type()
    // {
    //     $this->db->select('*');
    //     $this->db->from('newsletter_group');

    //     $query = $this->db->get()->result();

    //     $result = [];
    //     foreach ($query as $row) { //การปั้น array

    //         $result[] = array(
    //             "type" => $row->g_name,
    //             "typeId" => $row->g_id,
    //         );
    //     }

    //     return $result;
    // }

    public function get_month()
    {

        $query = $this->db->from('newsletter');
        // $query = $this->db->select('create,id,CONCAT(MONTH(create),YEAR(create)) as monthyear,YEAR(create) as year');
        // $query = $this->db->group_by(array("monthyear"));
        $query = $this->db->order_by("create", "desc");
        $this->db->limit(12);

        $query = $this->db->get();

        $result = [];
        foreach ($query->result() as $row) { //การปั้น array

            $Yearmonth = Yearmonth($row->create);
            $month = Year($row->create);
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
        $this->db->from('newsletter');
        $this->db->like('create', $month);

        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $row) {
            // $datelist = DateThai($row->create);

            $result[] = array(
                "id" => $row->id,
                "datelist" => $row->create,
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
}
