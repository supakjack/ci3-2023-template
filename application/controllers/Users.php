<?php
require_once APPPATH . "controllers/Cruds_Controller.php";
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends Cruds_Controller
{

    public function __construct($type_user = 'User')
    {
        parent::__construct($type_user);
        authorized_role(['admin', 'moderator']);
    }

    public function show($id)
    {
        authorized_resource($id);
        parent::show($id);
    }

    public function me()
    {
        if (empty($this->session->userdata('id'))) {
            return json_unauthorized();
        }

        $this->load->view('json/Users/me', [
            'data' => $this->session->userdata(),
        ]);
    }

    public function create()
    {
        if ($this->validate() != false) {
            return parent::create();
        }
        json_unprocessable_entity(
            strip_tags(validation_errors())
        );
    }

    public function destroy($id)
    {
        authorized_resource($id);
        parent::destroy($id);
    }

    public function update($id)
    {
        authorized_resource($id);
        parent::update($id);
    }

    public function validate()
    {
        $this->form_validation->set_rules('username', 'username', 'required|is_unique[users.username]',
            ['required' => 'required username.']
        );
        $this->form_validation->set_rules('password', 'password', 'required',
            ['required' => 'required password.']
        );
        $this->form_validation->set_rules('created_by', 'createdBy', 'required',
            ['required' => 'required %s.']
        );
        $this->form_validation->set_rules('updated_by', 'updatedBy', 'required',
            ['required' => 'required %s.']
        );

        return $this->form_validation->run();
    }

    public function params_permit()
    {
        return input_post_only(['username', 'password', 'created_by', 'updated_by', 'role']);
    }
}
