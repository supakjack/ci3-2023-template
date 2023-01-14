<?php
require_once APPPATH . "controllers/Users.php";
defined('BASEPATH') or exit('No direct script access allowed');

class Admins extends Users
{
    public function __construct()
    {
        parent::__construct('Admin');
        authorized_role('admin');
    }

    public function validate()
    {
        $this->form_validation->set_rules('role', 'role', 'in_list[admin]',
            ['in_list' => '%s must be admin.']
        );
        return parent::validate();
    }
}
