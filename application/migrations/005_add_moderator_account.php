<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_add_moderator_account extends CI_Migration
{

    public function up()
    {
        $this->load->model('Moderator');
        $this->Moderator->create([
            'username' => 'moderator',
            'password' => 'moderator@vaccine_2023',
        ]);

    }

    public function down()
    {
        $this->load->model('Moderator');
        $this->Moderator->delete([
            'username' => 'Moderator',
        ]);
    }
}
