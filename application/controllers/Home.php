<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
        $this->load->helper('url');
        $this->load->view("homeView");
    }
    
    public function firstTable(){
        $this->load->model("NoticeModel","model");
        $this->load->library("TablesIgniterCI3",NULL,"table");
        $this->table
            ->setTable($this->model->builder,"news")
            ->setOutput(["id","title","date"]);
        echo $this->table->getDatatable();
    }

    public function fullTable(){
		$this->load->model("NoticeModel","model");
        $this->load->library("TablesIgniterCI3",NULL,"table");
        $this->table
            ->setTable($this->model->builder,"news")
			->setDefaultOrder("id","DESC")
			->setSearch(["title","date"])
			->setOrder([null,null,"date"])
			->setOutput([$this->model->button(),"title","date"]);
		echo $this->table->getDatatable();
    }
    
    public function tableSecPattern(){
		$this->load->model("NoticeModel","model");
        $this->load->library(
            "TablesIgniterCI3",
            $this->model->initTable(),
            "table"
        );
        echo $this->table->getDatatable();
    }

}
