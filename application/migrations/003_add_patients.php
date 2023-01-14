<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_add_patients extends CI_Migration
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
            'field_1' => [
                'type' => 'text',
                'default' => NULL,
                'null' => TRUE
            ],
            'field_2' => [
                'type' => 'text',
                'default' => NULL,
                'null' => TRUE
            ],
            'field_3' => [
                'type' => 'text',
                'default' => NULL,
                'null' => TRUE
            ],
            'field_4' => [
                'type' => 'text',
                'default' => NULL,
                'null' => TRUE
            ],
            'field_5' => [
                'type' => 'text',
                'default' => NULL,
                'null' => TRUE
            ],
            'field_6' => [
                'type' => 'text',
                'default' => NULL,
                'null' => TRUE
            ],
            'field_7' => [
                'type' => 'text',
                'default' => NULL,
                'null' => TRUE
            ],
            'field_8' => [
                'type' => 'text',
                'default' => NULL,
                'null' => TRUE
            ],
            'field_9' => [
                'type' => 'text',
                'default' => NULL,
                'null' => TRUE
            ],
            'field_10' => [
                'type' => 'text',
                'default' => NULL,
                'null' => TRUE
            ],
            'status' => [
                'type' => 'ENUM("pending","success","cancel")',
                'default' => 'pending',
                'null' => FALSE
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
        $this->dbforge->create_table('patients');
    }

    public function down()
    {
        $this->dbforge->drop_table('patients');
    }
}
