<?php
class test extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('test_model');
    }
 
    function index(){
        $this->load->view('kasir/test');
    }
 
      function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->test_model->search_blog($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->nama_bar;
                echo json_encode($arr_result); 
            }
        }
    }
}