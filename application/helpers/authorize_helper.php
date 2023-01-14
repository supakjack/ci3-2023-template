<?php
function authorized_role($roles)
{
    $CI = &get_instance();

    $role = $CI->session->userdata('role');

    $authorized = false;

    if (is_string($roles) and $role == $roles) {
        $authorized = true;
    } else if (is_array($roles)) {
        foreach ($roles as $row) {
            if ($row == $role) {
                $authorized = true;
                break;
            }
        }
    }

    if ($authorized == false) {
        http_response_code(401);
        header('Content-Type: application/json');
        echo json_encode(['message' => 'unauthorized role']);
        die;
    }

    return $authorized;
}

function authorized_resource($resource_owner_id, $admin_ability = true)
{
    $CI = &get_instance();

    $is_admin = ($admin_ability and ($CI->session->userdata('role') == 'admin'));
    $is_owner = $resource_owner_id == $CI->session->userdata('id');

    if (!$is_admin and !$is_owner) {
        http_response_code(401);
        header('Content-Type: application/json');
        echo json_encode(['message' => 'unauthorized resource']);
        die;
    }

    return true;
}
