<?php


class CreateAccountModel extends CI_Model
{
      function saveSchool($data)
      {
                    
                    
                    
                    
           $this->db->insert('schoolaccounts',$data);
          
          $id = $this->db->insert_id();
		return $id;	
      }
      
      
        function savesystemadmin($data2)
      {
                    
                    
                    
                    
          return  $this->db->insert('systemadmin',$data2);
          
         
      }
}