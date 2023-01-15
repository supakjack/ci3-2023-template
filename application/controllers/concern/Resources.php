<?php
defined('BASEPATH') or exit('No direct script access allowed');

abstract class Resources extends CI_Controller
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

        $params_permit = $this->params_permit();
        $params_permit['created_by'] = $this->session->userdata('id');
        $params_permit['updated_by'] = $this->session->userdata('id');
        $params = $this->hook_params_before_action_model($params_permit);

        $created = $this->model->create($params);

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
        $params_permit['updated_by'] = $this->session->userdata('id');
        $params = $this->hook_params_before_action_model($params_permit);

        $updated = $this->model->update(
            ['id' => $id],
            $params
        );

        if ($updated == false) {
            return json_internal_server_error();
        }

        json_success();
    }

    public function hook_params_before_action_model($params = null)
    {
        if (empty($params)) {
            return $this->params_permit();
        }
        return $params;
    }

    public function params_permit()
    {
        return $this->input->post();
    }
}
