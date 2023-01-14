<?php
class Migrate extends CI_Controller
{

    public function index()
    {
        $this->load->library('migration');

        if ($this->migration->current() == false) {
            return show_error($this->migration->error_string());
        }
        
        echo "Now use last migration";

    }
}
