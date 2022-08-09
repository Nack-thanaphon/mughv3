<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Event_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $ci = get_instance();
        $ci->load->helper('menu_helper'); // call helpers fucntion
    }

    public function get_events()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_events');
        $this->db->join('tbl_events_type', 'tbl_events.et_id = tbl_events_type.et_id');
        $query = $this->db->order_by("id", 'desc');

        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $row) { //การปั้น array

            $date = Datethai($row->start);

            $result[] = array(
                "id" => $row->id,
                "title" => $row->title,
                "type" => $row->et_name,
                "date" => $date,
                "time_start" => $row->time_start,
                "time_end" => $row->time_end,
                "address" => $row->e_address,
            );
        }


        return $result;
    }

    public function get_eventest()
    {
        $this->db->order_by("id", "desc");
        $this->db->limit(4);
        $this->db->join('tbl_events_type', 'tbl_events.et_id = tbl_events_type.et_id');
        $query = $this->db->get('tbl_events');

        $result = [];

        foreach ($query->result() as $row) { //การปั้น array

            $datelist = DateThai($row->start);
            $result[] = array(
                "id" => $row->id,
                "title" => $row->title,
                "type" => $row->et_name,
                "date" => $datelist,
                "address" => $row->e_address,
            );
        }
        return $result;
    }


    public function get_event_bymonth()
    {
        $query = $this->db->select('start,id,CONCAT(MONTH(start),YEAR(start)) as monthyear,YEAR(start) as year');
        // $query = $this->db->select('*');
        $query = $this->db->from('tbl_events');
        $query = $this->db->group_by(array("monthyear"));
        $query = $this->db->order_by("id", "desc");
        $this->db->limit(12);

        $query = $this->db->get();
        foreach ($query->result() as $row) { //การปั้น array


            $date = Year($row->start);
            $Yearmonth = Yearmonth($row->start);
            $month = $this->get_events_bymonthlist($Yearmonth);
            // print_r($Yearmonth);

            $result[] = array(
                "id" => $row->id,
                "date" => $date,
                "month" => $month,
            );
        }

        return $result;
    }

    public function get_events_bymonthlist($month)
    {
        $this->db->select('*');
        $this->db->from('tbl_events');
        $this->db->like('start', $month);

        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $row) { //การปั้น array
            $datelist = DateThai($row->start);

            $result[] = array(
                "id" => $row->id,
                "datelist" => $datelist,
            );
        }
        return $result;
    }



    public function get_event_single($id)
    {

        $this->db->select('*')
            ->from('tbl_events')
            ->join('tbl_events_type', 'tbl_events.et_id = tbl_events_type.et_id')
            ->where('id =', $id);

        $query = $this->db->get();
        $data = $query->result();

        $result = [];
        foreach ($data as $row) {

            $date = Datethai($row->start);

            $result[] = array(
                "id" => $row->id,
                "title" => $row->title,
                "type" => $row->et_name,
                "date" => $date,
                "time_start" => $row->time_start,
                "time_end" => $row->time_end,
                "address" => $row->e_address,
            );
        }
        return  $result;
    }
}
