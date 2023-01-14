<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_add_admin_account extends CI_Migration
{

    public function up()
    {
        $this->load->model('Admin');
        $this->Admin->create([
            'username' => 'admin',
            'password' => 'admin@vaccine_2023',
        ]);

    }

    public function down()
    {
        $this->load->model('Admin');
        $this->Admin->delete([
            'username' => 'admin',
        ]);
    }
}
