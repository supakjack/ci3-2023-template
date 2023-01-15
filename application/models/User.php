<?php
require_once APPPATH . "models/Application_Model.php";
defined('BASEPATH') or exit('No direct script access allowed');

class User extends Application_Model
{
    public function __construct()
    {
        parent::__construct('users');
    }

    public function create($data)
    {
        $data["password"] = password_hash($data["password"], PASSWORD_BCRYPT);
        return parent::create($data);
    }

    public function login($username, $password)
    {
        $find_user = $this->find_first([
            'username' => $username,
        ]);

        if ($find_user and password_verify($password, $find_user['password'])) {
            return $find_user;
        }

        return false;
    }

}
