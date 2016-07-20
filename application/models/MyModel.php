<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/19
 * Time: 19:43
 */
class MyModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->library(array('session', 'pagination'));
        $this->load->helper('url');
        $this->load->database();
    }
    function getData($offset,$page_size){
        $sql = "select * from newsInforms limit $offset,$page_size";
        $res = $this->db->query($sql);
        return $res->result_array();
    }

}
