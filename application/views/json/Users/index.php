<?php

$data = array_map(function ($row) {
    return [
        "id" => $row["id"],
        "username" => $row["username"],
        "role" => $row["role"],
        "status" => $row["status"],
        "description" => $row["description"],
    ];
}, $data);

json_success($data);
