<?php

class users_model extends CI_Model{

    private $table="users";

    public function new($user="",$password=""){
        $this->db->set("user",$user);
        $this->db->set("password",$password);
        $this->db->insert($this->table);
        return $this->db->insert_id();
    }

    public function delete($id_user=""){
        $this->db->where("id_user",$id_user);
        $this->db->limit(1);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    public function list(){
        $this->db->order_by("user","desc");
        $res = $this->db->get($this->table);
        return $res->result_array();
    }

    public function verify($user="",$password=""){
        $this->db->select("id_user");
        $this->db->where("user",$user);
        $this->db->where("password",$password);
        $this->db->limit(1);

        $res=$this->db->get($this->table);      
        if($res->num_rows()){
            $temp=$res->row_array();
            $this->update_last_login($temp["id_user"]);
            return $temp["id_user"];

        }else{
            return false;
        }
    }

    public function get_by_id($id_user=""){
        $this->db->where("id_user",$id_user);
        $this->db->limit(1);
        $res=$this->db->get($this->table);
        return $res->row_array();
    }

    public function update_last_login($id_user=""){
        $this->db->where("id_user",$id_user);
        $this->db->set("lastlogin","NOW()",false);
        $this->db->update($this->table);
    }

    public function changepassword($id_user="",$newpassword=""){
        $this->db->where("id_user",$id_user);
        $this->db->set("password",$newpassword, true);
        $this->db->update($this->table);
    }
}
?>