<?php
function authorized_role($access_roles, $admin_ability = true)
{
    $CI = &get_instance();

    $role = $CI->session->userdata('role');

    $is_admin = ($admin_ability and ($CI->session->userdata('role') == 'admin'));

    if ($is_admin) {
        return true;
    }

    if (is_string($access_roles) and $role == $access_roles) {
        return true;
    }

    if (is_array($access_roles)) {
        foreach ($access_roles as $row) {
            if ($row == $role) {
                return true;
            }
        }
    }

    http_response_code(401);
    header('Content-Type: application/json');
    echo json_encode(['message' => 'unauthorized role']);
    die;
}

function authorized_resource($resource_owner_id, $admin_ability = true)
{
    $CI = &get_instance();

    $is_admin = ($admin_ability and ($CI->session->userdata('role') == 'admin'));
    $is_owner = $resource_owner_id == $CI->session->userdata('id');

    if ($is_admin or $is_owner) {
        return true;
    }

    http_response_code(401);
    header('Content-Type: application/json');
    echo json_encode(['message' => 'unauthorized resource']);
    die;
}
