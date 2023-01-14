<?php
require_once APPPATH . "controllers/Users.php";
defined('BASEPATH') or exit('No direct script access allowed');

class Moderators extends Users
{
    public function __construct()
    {
        parent::__construct('Moderator');
        authorized_role(['admin', 'moderator']);
    }

    public function validate()
    {
        $this->form_validation->set_rules('role', 'role', 'in_list[moderator]',
            ['in_list' => '%s must be moderator.']
        );
        return parent::validate();
    }

}
