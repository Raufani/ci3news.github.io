<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class News_model extends CI_Model
{

    public  $lang = "en";

    function __construct() {
        parent::__construct();
        $this->lang = $this->session->userdata("lang");

    }
    // get all news
    function get_all($id=null)
    {
        $this->db->where('ne_lang', $this->lang);
        if (isset($id)) {
            $this->db->where('ne_id', $id);
        }
        $result = $this->db->get('ci_news');
        return $result->result_array();
    }
    // get one news article by its id
    function get_one($ne_id) {
        $this->db->where('ne_lang', $this->lang);
        $this->db->where('ne_id', $ne_id);
        $result = $this->db->get('ci_news');
        return $result->row();
    }


    function create($file)
    {
        $this->db->set('ne_img',$file);
        $this->db->set('ne_title', $this->input->post('ne_title'));
        $this->db->set('ne_desc', $this->input->post('ne_desc'));
        $this->db->set('ne_lang', $this->input->post('ne_lang'));
        $this->db->set('ne_created', time());
        $this->db->insert('ci_news');
        $id = $this->db->insert_id();
        return $id;
    }

    function update($ne_id,$file)
    {
        $this->db->where('ne_id', $ne_id);
        if(!empty($file)){
            $this->db->set('ne_img',$file);
        }
        $this->db->set('ne_title', $this->input->post('ne_title'));
        $this->db->set('ne_desc', $this->input->post('ne_desc'));
        $this->db->set('ne_lang', $this->input->post('ne_lang'));
        $this->db->update('ci_news');
        return TRUE;
    }

    function delete($id) {
        $this->db->where('ne_id', $id);
        $query = $this->db->delete('ci_news');
        return $query;
    }
    /*
    function get_tables_news($search) {
        // $query='';
        if ($search!='') {
            $this->db->like('ne_title',$search);
        } 
        $sql_count = $this->db->count_all('ci_news');
        // if ($_POST['order'][0]['column'] && $_POST['order'][0]['dir']) {
        //     $order_field = $_POST['order'][0]['column'];
        //     $order_ascdesc = $_POST['order'][0]['dir']; 
        //     $query->order_by($_POST['columns'][$order_field]['data'], $order_ascdesc);
        $this->db->where('ne_lang', $this->lang);
        // }
        $sql_filter_count = $this->db->count_all_results('ci_news');
        $callback = array(    
            'draw' => isset($_POST['draw']) ? $_POST['draw'] : '', // Ini dari datatablenya    
            'recordsTotal' => $sql_count,    
            'recordsFiltered'=>$sql_filter_count,    
            'data'=>$this->db->get('ci_news')->result_array()
        );
        return $callback;
    }
    */

    function get_tables_news($search) {
        // $query='';
        if (isset($search['value']) && $search['value'] != '') {
            $this->db->like('ne_title', $search['value']);
        } 
        $sql_count = $this->db->count_all('ci_news');
        // if ($_POST['order'][0]['column'] && $_POST['order'][0]['dir']) {
        //     $order_field = $_POST['order'][0]['column'];
        //     $order_ascdesc = $_POST['order'][0]['dir']; 
        //     $query->order_by($_POST['columns'][$order_field]['data'], $order_ascdesc);
        $this->db->where('ne_lang', $this->lang);
        // }
        $sql_filter_count = $this->db->count_all_results('ci_news');
        $data = $this->db->get('ci_news')->result_array();
        // print_r($data);
        foreach($data as $key => $value) {
            $data[$key]['option'] = 
                "<a href=" . base_url() . "news/edit/" . $value['ne_id'] . "
                    data-toggle='" . "tooltip" ."' class='"."btn btn-primary" . "' data-original-title='"."edit". "'>
                    edit
                </a>

                <a href=" . base_url() . "news/remove/" . $value['ne_id'] ."
                    data-toggle='"."tooltip"."' title='' class='"."btn btn-danger"."'
                    onclick='"."return confirm('Do you want Delete?');"."'
                    data-original-title='"."remove"."'>delete
                </a>";
            $w=80;
            $h=50;
            if ($value['ne_img'] != '' && file_exists(PUBPATH . 'global/uploads/' . $value['ne_img'])) {
                $data[$key]['ne_img'] = "<img src='".base_url() . "global/uploads/".$value['ne_img']."' width='".$w."' height='".$h."' />";
            } else {
                $data[$key]['ne_img'] = "<img src='".base_url() . "global/uploads/noImage.jpg' width='".$w."' height='".$h."' />";
            }
            $data[$key]['checkbox'] = "<input type='"."checkbox"."' name='"."checkAll[]"."' value=". $value['ne_id'].">";
        }
        $callback = array(    
            'draw' => isset($_POST['draw']) ? $_POST['draw'] : '', // Ini dari datatablenya    
            'recordsTotal' => $sql_count,    
            'recordsFiltered'=>$sql_filter_count,    
            'data'=>$data
        );
        return $callback;
    }

    function get_news_by_title($title) {
        return $this->db->where('ne_title', $title)->get('ci_news')->result_array();
    }



    

    //login
    function get_table($table,$where){		
		return $this->db->get_where($table,$where);
	}	

    public function insert_table($table, $data) {
        return $this->db->insert($table, $data);

    }
  
}

/* End of file news_model.php */
    /* Location: ./application/models/news_model.php */