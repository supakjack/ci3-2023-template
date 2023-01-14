<?php
class Authorize
{
    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    }

    public function handle()
    {
        $CI = &get_instance();

        if (strtolower($CI->router->class) == 'authens' or
            strtolower($CI->router->class) == 'migrate') {
            return;
        }

        if (empty($CI->session->userdata('id'))) {
            http_response_code(401);
            header('Content-Type: application/json');
            echo json_encode(['message' => 'unauthorized']);
            die;
        }

    }
}
