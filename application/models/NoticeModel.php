<?php
class NoticeModel extends CI_Model {

    public $builder;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->setNoticeTable();
    }

    public function setNoticeTable(){
        $this->builder = $this->db->select("*");
    }

    public function button(){
        $closureFun = function($row){
            return "
                <button class='btn btn-outline-info' onclick='openInfo(\"{$row["body"]}\")'  data-toggle='modal' data-target='#exampleModal'>info{$row['id']}</button>
            ";
        };
        return $closureFun;
    }

    public function initTable(){
        $setting = [
            "setTable" => [$this->builder,"news"],
            "setDefaultOrder" => [
                ["id","DESC"],
                ["body","DESC"]
            ],
            "setSearch" => ["title","date"],
            "setOrder"  => [null,null,"date"],
            "setOutput" => [
                function($row){
                    return "
                        <button class='btn btn-outline-info' onclick='openInfo(\"{$row["body"]}\")'  data-toggle='modal' data-target='#exampleModal'>info{$row['id']}</button>
                    ";
                },
                "title",
                "date"
            ]
        ];
        return $setting;
    } 
    
    
}

?>