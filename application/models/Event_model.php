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
        $query = $this->db->from('events');
        $this->db->join('events_type', 'events.id = events_type.id');
        $query = $this->db->order_by("events.id", 'desc');

        $query = $this->db->get();

        $result = [];

        foreach ($query->result() as $row) { //การปั้น array

            $date = Datethai($row->start);

            $result[] = array(
                "id" => $row->id,
                "title" => $row->title,
                "type" => $row->title,
                "date" => $date,
                "time_start" => $row->time_start,
                "time_end" => $row->time_end,
                "address" => $row->address,
            );
        }


        return $result;
    }

    public function get_eventest()
    {
        $this->db->order_by("events.id", "desc");
        $this->db->limit(3);
        $this->db->join('events_type', 'events.id = events_type.id');
        $query = $this->db->get('events');

        $result = [];

        foreach ($query->result() as $row) { //การปั้น array

            $datelist = DateThai($row->start);
            $result[] = array(
                "id" => $row->id,
                "title" => $row->title,
                "type" => $row->title,
                "date" => $datelist,
                "address" => $row->address,
            );
        }
        return $result;
    }


    public function get_event_bymonth()
    {
        $query = $this->db->select('start,id,CONCAT(MONTH(start),YEAR(start)) as monthyear,YEAR(start) as year');
        // $query = $this->db->select('*');
        $query = $this->db->from('events');
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
        $this->db->from('events');
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
            ->from('events')
            ->join('events_type', 'events.id = events_type.id')
            ->where('id =', $id);

        $query = $this->db->get();
        $data = $query->result();

        $result = [];
        foreach ($data as $row) {

            $date = Datethai($row->start);

            $result[] = array(
                "id" => $row->id,
                "title" => $row->title,
                "type" => $row->title,
                "date" => $date,
                "time_start" => $row->time_start,
                "time_end" => $row->time_end,
                "address" => $row->address,
            );
        }
        return  $result;
    }
}
