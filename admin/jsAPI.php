<?php

$array = array();
$user['uid'] = 121;
$user['username'] = "adidac";
$user['password'] = "adidacpass";
$array['users'][] = $user;
$user['uid'] = 122;
$user['username'] = "biswarup";
$user['password'] = "biswaruppass";
$array['users'][] = $user;
$user['uid'] = 123;
$user['username'] = "gopal";
$user['password'] = "gopalpass";
$array['users'][] = $user;
echo json_encode($array);




