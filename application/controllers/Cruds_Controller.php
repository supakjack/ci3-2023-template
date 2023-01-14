<?php
defined('BASEPATH') or exit('No direct script access allowed');

abstract class Cruds_Controller extends CI_Controller
{

    private $model_name;
    public function __construct($model_name)
    {
        parent::__construct();
        $this->model_name = $model_name;
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
        $created = $this->model->create(
            $this->params_permit(),
        );

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
        $updated = $this->model->update(
            ['id' => $id],
            $this->params_permit()
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
