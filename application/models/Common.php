<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function paginateResults($baseUrl, $totalRows, $perPage)
    {
        $this->load->library('pagination');
        //pagination settings
        $config['base_url'] = $baseUrl;
        $config['total_rows'] = $totalRows;
        $config['per_page'] = $perPage;
        $config["uri_segment"] = 4;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open'] = '<div id="pagination"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div>';
        $config['first_link'] = true;
        $config['last_link'] = true;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';


        $this->pagination->initialize($config);



        return $this->pagination->create_links();
    }



}