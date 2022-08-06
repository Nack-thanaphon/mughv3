<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News_model extends CI_Model
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
        $query = $this->db->from('tbl_news');
        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $row) { //การปั้น array

            $date = DateThai($row->n_date);
            // strMonthThai;
            $result[] = array(
                "n_id" => $row->n_id,
                "n_name" => $row->n_name,
                "n_date" => $date,
                "n_image" => $row->n_image,
            );
        }


        return $result;
    }

    public function get_newest()
    {
        $this->db->order_by("n_id", "desc");
        $this->db->limit(2);
        $this->db->join('tbl_news_type', 'tbl_news.n_type = tbl_news_type.n_type_id');
        $query = $this->db->get('tbl_news');
        return $query->result();
    }


    public function get_news_bymonth()
    {


        // $query = $this->db->query('SELECT * FROM `tbl_news` GROUP BY create_at ASC');
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_news');
        $query = $this->db->group_by('create_at');
        $query = $this->db->order_by("create_at", "desc");

        $this->db->limit(12);
        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $row) { //การปั้น array

            $date = Year($row->create_at);
              $items = new stdClass();
            $id = $row['n_id'];
            $items->name = $row['n_name'];
            $items->type = 'ข่าวสาร';
            $items->table = "./single_news.php?id=$id";

            array_push($arr, $items);
            $result[] = array(
                "n_id" => $row->n_id,
                "create_at" => $date,
            );
        }

        return $result;
    }

    public function get_news_bymonthlist($month)
    {
        $this->db->select('*');
        $this->db->from('tbl_news');
        $data = $this->db->like("DATE_FORMAT(create_at,'%Y-%m')=", $month);
        $data = $this->db->get();
        return $data->result();
        // $query = $this->db->get();

        // $result = [];

        // foreach ($query->result() as $row) { //การปั้น array

        //     $date = DateThai($row->create_at);
        //     // strMonthThai;
        //     $result[] = array(
        //         "n_id" => $row->n_id,
        //         "create_at" => $date,
        //     );
        // }

        // return $result;
    }




    public function get_news_single($id)
    {

        $this->db->select('*')
            ->from('tbl_news')
            ->join('tbl_news_type', 'tbl_news.n_type = tbl_news_type.n_type_id')
            ->where('n_id =', $id);

        $query = $this->db->get();
        return $query->result();
    }
}
