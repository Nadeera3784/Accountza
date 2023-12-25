<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function hooks(){
    global $hooks;

    return $hooks;
}

$hook['pre_system'][] = [
    'class'    => 'BadUserAgentBlock',
    'function' => 'init',
    'filename' => 'BadUserAgentBlock.php',
    'filepath' => 'hooks',
    'params'   => [],
];

