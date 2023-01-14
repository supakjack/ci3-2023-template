<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_add_users extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 12,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE,
                'unique' => TRUE
            ],
            'password' => [
                'type' => 'TEXT',
                'null' => FALSE
            ],
            'role' => [
                'type' => 'ENUM("admin","moderator")',
                'default' => 'moderator',
                'unsigned' => TRUE,
                'null' => FALSE
            ],
            'status' => [
                'type' => 'ENUM("active","inactive")',
                'default' => 'active',
                'null' => FALSE
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
            'created_by' => [
                'type' => 'INT',
                'constraint' => 12,
                'unsigned' => TRUE,
                'null' => TRUE
            ],
            'updated_by' => [
                'type' => 'INT',
                'constraint' => 12,
                'unsigned' => TRUE,
                'null' => TRUE
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}
