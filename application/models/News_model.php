<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News_model extends CI_Model
{

    public function get_news()
    {
        $query = $this->db->query('SELECT * FROM tbl_news');
        return $query->result();
    }
    public function get_news_bymonth()
    {
        $query = $this->db->query('SELECT * FROM `tbl_news` GROUP BY create_at ASC');
        return $query->result();
    }
    public function get_news_bymonthlist($month)
    {
        $this->db->select('*');
        $this->db->from('tbl_news');
        $this->db->like('create_at', $month);
        $this->db->group_by('n_date');
        return $this->db->get()->result();
    }
}
