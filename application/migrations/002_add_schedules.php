<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_add_schedules extends CI_Migration
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
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => FALSE
            ],
            'status' => [
                'type' => 'ENUM("draft","open","cancel","close")',
                'default' => 'draft',
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
        $this->dbforge->create_table('schedules');
    }

    public function down()
    {
        $this->dbforge->drop_table('schedules');
    }
}
