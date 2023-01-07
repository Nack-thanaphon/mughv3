<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends MY_Controller
{

    public function index()
    {

        // $this->data['news'] = $this->News_model->get_newsall();
        $this->data['type'] = $this->News_model->get_newstype();
        $this->data['date'] = $this->News_model->get_news_month();

        $this->middle = 'news/index';

        $this->layout();
    }

    function fetch_data()
    {
        sleep(1);

        $storage = $this->input->post('storage');
        // $this->load->library('pagination');
        // $config = array();
        // $config['base_url'] = '#';
        // $config['total_rows'] = $this->Product_filter_model->count_all($minimum_price, $maximum_price, $brand, $ram, $storage);
        // $config['per_page'] = 8;
        // $config['uri_segment'] = 3;
        // $config['use_page_numbers'] = TRUE;
        // $config['full_tag_open'] = '<ul class="pagination">';
        // $config['full_tag_close'] = '</ul>';
        // $config['first_tag_open'] = '<li>';
        // $config['first_tag_close'] = '</li>';
        // $config['last_tag_open'] = '<li>';
        // $config['last_tag_close'] = '</li>';
        // $config['next_link'] = '&gt;';
        // $config['next_tag_open'] = '<li>';
        // $config['next_tag_close'] = '</li>';
        // $config['prev_link'] = '&lt;';
        // $config['prev_tag_open'] = '<li>';
        // $config['prev_tag_close'] = '</li>';
        // $config['cur_tag_open'] = "<li class='active'><a href='#'>";
        // $config['cur_tag_close'] = '</a></li>';
        // $config['num_tag_open'] = '<li>';
        // $config['num_tag_close'] = '</li>';
        // $config['num_links'] = 3;
        // $this->pagination->initialize($config);
        // $page = $this->uri->segment(3);
        // $start = ($page - 1) * $config['per_page'];
        // $output = array(
        //     'pagination_link'  => $this->pagination->create_links(),
        //     'product_list'   => $this->Product_filter_model->fetch_data($config["per_page"], $start, $minimum_price, $maximum_price, $brand, $ram, $storage)
        // );
        // echo json_encode($output);
    }


    public function views($id)
    {
        $this->data['news'] = $this->News_model->getnewssingleImg($id);
        $this->data['title'] = $this->data['news'][0]['title'];
        $this->data['img'] = $this->data['news'][0]['cover'];

        $this->middle = 'news/view';
        $this->layout();
    }

    public function getnews()
    {
        $title =$this->input->post('title');
        $type =$this->input->post('type');
        $month =$this->input->post('month');

        $data = $this->News_model->getnewsData($title,$type,$month);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

   
}
