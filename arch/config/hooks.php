<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/

$hook['pre_controller'] = array(
    'class'    => 'System_hook',
    'function' => 'pre_controller',
    'filename' => 'System_hook.php',
    'filepath' => 'hooks',
    );

$hook['post_controller_constructor'] = array(
    'class'    => 'System_hook',
    'function' => 'post_controller_constructor',
    'filename' => 'System_hook.php',
    'filepath' => 'hooks',
    );

$hook['post_controller'] = array(
    'class'    => 'System_hook',
    'function' => 'post_controller',
    'filename' => 'System_hook.php',
    'filepath' => 'hooks',
    );

$hook['display_override'] = array(
    'class'    => 'System_hook',
    'function' => 'display_override',
    'filename' => 'System_hook.php',
    'filepath' => 'hooks',
    );



/* End of file hooks.php */
/* Location: ./application/config/hooks.php */