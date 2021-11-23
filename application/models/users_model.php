<?php

class Users_model extends CI_Model{

    private $table="users";

    public function new($user="",$password="",$email=""){
        $this->db->set("user",$user);
        $this->db->set("password",$password);
        $this->db->set("email",$email);
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
        $this->db->where("state",1);
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

    public function verify_email($email=""){
        $this->db->select("user");
        $this->db->where("email",$email);
        $this->db->limit(1);

        $res=$this->db->get($this->table);      
        if($res->num_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function get_by_email($email=""){
        $this->db->select("id_user");
        $this->db->where("email",$email);
        $this->db->limit(1);

        $res=$this->db->get($this->table);      
        if($res->num_rows()){
            $temp=$res->row_array();
            return $this->get_by_id($temp["id_user"]);
        }else{
            return false;
        }
    }

    public function ban_by_id($id_user=""){
        $this->db->where("id_user",$id_user);
        $this->db->set("state",0,false);
        $this->db->update($this->table);
    }

    public function permit_by_id($id_user=""){
        $this->db->where("id_user",$id_user);
        $this->db->set("state",1,false);
        $this->db->update($this->table);
    }

    public function set_admin_by_id($id_user=""){
        $this->db->where("id_user",$id_user);
        $this->db->set("role",'admin',true);
        $this->db->update($this->table);
    }

    public function set_client_by_id($id_user=""){
        $this->db->where("id_user",$id_user);
        $this->db->set("role",'client',true);
        $this->db->update($this->table);
    }
}
?>