<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Online_exam_m extends MY_Model {

    protected $_table_name = 'online_exam';
    protected $_primary_key = 'onlineExamID';
    protected $_primary_filter = 'intval';
    protected $_order_by = "onlineExamID desc";

    public function __construct() 
    {
        parent::__construct();
    }

    public function get_online_exam($array=NULL, $signal=FALSE) 
    {
        $query = parent::get($array, $signal);
        return $query;
    }

    public function get_single_online_exam($array) 
    {
        $query = parent::get_single($array);
        return $query;
    }

    public function get_order_by_online_exam($array=NULL) 
    {
        $query = parent::get_order_by($array);
        return $query;
    }

    public function get_order_by_online_exam_specific_group($array=NULL,$groupID) 
    {
        $this->db->select('online_exam.onlineExamID');
        $this->db->from('online_exam');              
        $this->db->join('online_exam_question', 'online_exam_question.onlineExamID = online_exam.onlineExamID', 'inner');
        $this->db->join('question_bank', 'question_bank.questionBankID = online_exam_question.questionID', 'inner');
        $this->db->where('groupID',$groupID);
        $this->db->group_by('online_exam.onlineExamID');
        $query = $this->db->get();
        $getIds = array();
        if($query->result_array()){
            foreach($query->result_array() as $val){
                $getIds[] = $val['onlineExamID'];
            }
            $query = parent::get_where_in($getIds,'onlineExamID');
            return $query;
        }
       
    }

    //to be reviewed
    public function get_answered_online_exam($id)
    {
        $this->db->select ('online_exam.*,online_exam_user_status.*,online_exam_user_answer_option.*'); 
		$this->db->from('online_exam');
		$this->db->join('online_exam_user_status', 'online_exam_user_status.onlineExamID = online_exam.onlineExamID' , 'left');
		$this->db->join('online_exam_user_answer_option', 'online_exam_user_answer_option.onlineExamID = online_exam.onlineExamID' , 'left');
        $this->db->join('online_exam_question', 'online_exam_question.onlineExamID = online_exam.onlineExamID' , 'left');
        $this->db->join('question_bank', 'question_bank.questionBankID = online_exam_question.questionID', 'left' );
        $this->db->where('online_exam.published', 1);
        $this->db->where('question_bank.groupID',$id);
        $query = $this->db->get ();
		return $query->result ();

    }
    

    public function insert_online_exam($array) 
    {
        $id = parent::insert($array);
        return $id;
    }

    public function update_online_exam($data, $id = NULL) 
    {
        parent::update($data, $id);
        return $id;
    }

    public function delete_online_exam($id)
    {
        parent::delete($id);
    }

    public function get_online_exam_by_student($array) 
    {   
        $query = "SELECT * FROM online_exam WHERE (classID='".$array['classesID']."' || classID='0') && (sectionID='".$array['sectionID']."' || sectionID='0') && (studentgroupID='".$array['studentgroupID']."' || studentgroupID='0') && published='1' && onlineExamID='".$array['onlineExamID']."'";
        $result = $this->db->query($query);
        return $result->row();
    }

}
