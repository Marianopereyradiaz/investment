<?php
class Amounts_model extends CI_Model{

    private $table="amounts";

    function list($id_fund=0){
        $this->db->where("id_fund",$id_fund);
        $this->db->order_by("id_amount","desc");
        return $this->db->get($this->table)->result_array();
    }

    function get_first($id_fund=0){
        $this->db->where("id_fund",$id_fund);
        $this->db->order_by("id_amount","asc");
        $this->db->limit(1);
        return $this->db->get($this->table)->row_array();
    }

    function get_last($id_fund=""){
        $this->db->where("id_fund",$id_fund);
        $this->db->order_by("id_amount","desc");
        $this->db->limit(1);
        return $this->db->get($this->table)->row_array();
    }

    function calculate_accumulated($id_fund=0){
        $this->db->where("id_fund",$id_fund);
        $first=$this->get_first($id_fund);
        $last=$this->get_last($id_fund);
        if($first and $last){
            if($first["id_amount"]==$last["id_amount"]){
                return 0;
            }else{
                return $last["amount"]-$first["amount"];
            }
        }else{
            return 0;
        }
    }

    function add($amount=0,$id_fund=""){
        $this->db->where("id_fund",$id_fund);
        $last=$this->get_last($id_fund);
        if($last){
            if($last["amount"] == $amount){
                $this->db->set("diff",0);
                $this->db->set("perc",0);
            }else{
                $this->db->set("diff",$amount-$last["amount"]);
                $this->db->set("perc",(($amount/$last["amount"]*100)-100));
            }
        }else{
            $this->db->set("diff",'0', false);
        }
        $this->db->set("amount",$amount);
        $this->db->set("id_fund", $id_fund);
        $this->db->insert($this->table);
    }

    function delete($id_amount=0){
        $this->db->where("id_amount",$id_amount);
        $this->db->limit(1);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    function delete_from_fund($id_fund=0){
        $this->db->where("id_fund",$id_fund);
        $this->db->delete($this->table);
        return $this->db->affected_rows();
    }

    function list_by_date($id_fund=0){
        $this->db->where("id_fund",$id_fund);
        $this->db->order_by("date","asc");
        return $this->db->get($this->table)->result_array();
    }
}
?>