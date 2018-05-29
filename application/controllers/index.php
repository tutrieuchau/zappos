<?php
class Index extends My_Controller {

    function __construct(){
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('index',null);
    }
}