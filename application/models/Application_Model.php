<?php
defined('BASEPATH') or exit('No direct script access allowed');

abstract class Application_Model extends CI_Model
{
    public $table_name;
    public function __construct($table_name)
    {
        parent::__construct();
        $this->table_name = $table_name;
    }

    public function find(
        $condition = null,
        $limit = null,
        $offset = null
    ) {
        if ($condition) {
            $this->db->where($condition);
        }

        $query = $this->db->get($this->table_name, $limit, $offset);
        return $query->result_array();
    }

    public function find_first(
        $condition = null,
    ) {
        if ($condition) {
            $this->db->where($condition);
        }

        $query = $this->db->get($this->table_name);

        if (empty($query->row_array())) {
            return false;
        }

        return $query->row_array();
    }

    public function create($data)
    {
        $this->db->trans_start();

        $this->db->insert($this->table_name, $data);
        $insert_id = $this->db->insert_id();

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_complete();
            return $insert_id;
        }
    }

    public function delete($condition = null)
    {
        $this->db->trans_start();

        if ($condition) {
            $this->db->where($condition);
        }

        $this->db->delete($this->table_name);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_complete();
            return true;
        }
    }

    public function update($condition, $data)
    {
        if ($condition) {
            $this->db->where($condition);
        }
        return $this->db->update($this->table_name, $data);
    }

}

/* End of file User.php */
