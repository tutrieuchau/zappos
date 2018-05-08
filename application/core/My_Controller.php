<?php
class My_Controller extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->library('migration');
        $this->load->helper('url');
        if ($this->migration->current() === FALSE)
        {
            show_error($this->migration->error_string());
        }
    }
}