<?php
function json_success($data = true)
{
    $CI = &get_instance();

    $CI->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($data));
}

function json_created($data = true)
{
    $CI = &get_instance();

    $CI->output
        ->set_status_header(201)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($data));
}

function json_unauthorized($data = false)
{
    $CI = &get_instance();

    $CI->output
        ->set_status_header(401)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($data));
}

function json_bad_request($data = false)
{
    $CI = &get_instance();

    $CI->output
        ->set_status_header(400)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($data));
}

function json_unprocessable_entity($data = false)
{
    $CI = &get_instance();

    $CI->output
        ->set_status_header(422)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($data));
}

function json_internal_server_error($data = false)
{
    $CI = &get_instance();

    $CI->output
        ->set_status_header(500)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($data));
}
