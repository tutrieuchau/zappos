<?php
class Homepage extends My_Controller {

    function __construct(){
        parent::__construct();
    }

    public function index()
    {
        // Load the subview
        $content = $this->load->view('homepage/homepage',null, true);

        // Pass to the master view
        $this->load->view('master_page', array('content' => $content));
    }
}