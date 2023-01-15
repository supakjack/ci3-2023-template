<?php
defined('BASEPATH') or exit('No direct script access allowed');

abstract class Resources extends CI_Controller
{
    private $model_name;
    public $on_handle_updated_by;
    public $on_handle_created_by;
    public function __construct($model_name)
    {
        parent::__construct();
        $this->model_name = $model_name;
        $this->on_handle_updated_by = true;
        $this->on_handle_created_by = true;
    }

    public function index()
    {
        $this->load->model($this->model_name, 'model');
        json_success($this->model->find());
    }

    public function show($id)
    {
        $this->load->model($this->model_name, 'model');
        json_success($this->model->find_first(['id' => $id]));
    }

    public function create()
    {
        $this->load->model($this->model_name, 'model');

        $params_permit = $this->params_permit();

        if ($this->on_handle_created_by) {
            $params_permit['created_by'] = $this->session->userdata('id');
        }

        if ($this->on_handle_updated_by) {
            $params_permit['updated_by'] = $this->session->userdata('id');
        }

        $created = $this->model->create($params_permit);

        if ($created == false) {
            return json_internal_server_error();
        }

        json_success();
    }

    public function destroy($id)
    {
        $this->load->model($this->model_name, 'model');
        $deleted = $this->model->delete(
            ['id' => $id]
        );

        if ($deleted == false) {
            return json_internal_server_error();
        }

        json_success();
    }

    public function update($id)
    {
        $this->load->model($this->model_name, 'model');

        $params_permit = $this->params_permit();

        if ($this->on_handle_updated_by) {
            $params_permit['updated_by'] = $this->session->userdata('id');
        }

        $updated = $this->model->update(
            ['id' => $id],
            $params_permit
        );

        if ($updated == false) {
            return json_internal_server_error();
        }

        json_success();
    }

    public function params_permit()
    {
        return $this->input->post();
    }
}
