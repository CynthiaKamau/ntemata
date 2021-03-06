<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class online_exam_user_answer_option_m extends MY_Model {

    protected $_table_name = 'online_exam_user_answer_option';
    protected $_primary_key = 'onlineExamUserAnswerOptionID';
    protected $_primary_filter = 'intval';
    protected $_order_by = "onlineExamUserAnswerOptionID asc";

    public function __construct() 
    {
        parent::__construct();
    }

    public function get_online_exam_user_answer_option($array=NULL, $signal=FALSE) 
    {
        $query = parent::get($array, $signal);
        return $query;
    }

    public function get_single_online_exam_user_answer_option($array) 
    {
        $query = parent::get_single($array);
        return $query;
    }

    public function get_order_by_online_exam_user_answer_option($array=NULL) 
    {
        $query = parent::get_order_by($array);
        return $query;
    }

    function insertRecords($data){       

        $this->db->insert('class_record',$data);
        return $this->db->affected_rows();

    }

    public function insert_online_exam_user_answer_option($array) 
    {
        $id = parent::insert($array);
        return $id;
    }

    public function update_online_exam_user_answer_option($data, $id = NULL) 
    {
        parent::update($data, $id);
        return $id;
    }

    public function delete_online_exam_user_answer_option($id){
        parent::delete($id);
    }
}
