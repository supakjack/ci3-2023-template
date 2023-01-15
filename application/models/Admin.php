<?php
require_once APPPATH . "models/User.php";
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends User
{
    public function find(
        $condition = null,
        $limit = null,
        $offset = null
    ) {

        $this->db->where(['role' => 'admin']);
        return parent::find($condition, $limit, $offset);

    }

    public function find_first(
        $condition = null,
    ) {
        $this->db->where(['role' => 'admin']);
        return parent::find_first($condition);
    }

    public function create($data)
    {
        $data['role'] = 'admin';
        return parent::create($data);
    }
}
