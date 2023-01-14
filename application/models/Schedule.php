<?php
require_once APPPATH . "models/Application_Model.php";
defined('BASEPATH') or exit('No direct script access allowed');

class Schedule extends Application_Model
{
  public function __construct()
  {
    parent::__construct('schedules');
  }
  
}

/* End of file User.php */
