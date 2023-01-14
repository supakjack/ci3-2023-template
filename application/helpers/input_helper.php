<?php
function input_post_only($expect_params)
{
    $CI = &get_instance();

    $params = $CI->input->post();
    $result_params = [];
    foreach ($params as $key => $value) {
        if (in_array($key, $expect_params)) {
            $result_params[$key] = $value;
        }
    }
    return $result_params;
}
