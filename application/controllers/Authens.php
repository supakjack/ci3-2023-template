<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authens extends CI_Controller
{

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required',
            ['required' => 'fill your %s.']
        );
        $this->form_validation->set_rules('password', 'Password', 'required',
            ['required' => 'fill your %s.']
        );

        if ($this->form_validation->run() == false) {
            return json_unprocessable_entity(
                strip_tags(validation_errors())
            );
        }

        $this->load->model('User');
        $user = $this->User->login(
            $this->input->post('username'),
            $this->input->post('password')
        );

        if ($user == false) {
            return json_unauthorized();
        }

        $this->session->set_userdata($user);

        $this->load->view('json/Authens/login', [
            'data' => $user,
        ]);

    }

    public function logout()
    {
        $this->session->sess_destroy();
        json_success();
    }

}
