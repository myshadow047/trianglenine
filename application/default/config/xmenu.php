<?php

$config = array();
// $config['xmenu_source'] = 'model:menu:find_admin_panel';

$config['xmenu_source'] = 'inline';

$config['xmenu_items'][0]['title'] = 'Home';
$config['xmenu_items'][0]['uri'] = '/';

$config['xmenu_items'][1]['title'] = 'System';

$config['xmenu_items'][1]['children'][0]['title'] = 'User';
$config['xmenu_items'][1]['children'][0]['uri'] = 'user/listing';
$config['xmenu_items'][1]['children'][1]['title'] = 'Role';
$config['xmenu_items'][1]['children'][1]['uri'] = 'role/listing';
$config['xmenu_items'][1]['children'][2]['title'] = 'Organization';
$config['xmenu_items'][1]['children'][2]['uri']   = 'organization/listing';
$config['xmenu_items'][1]['children'][3]['title'] = 'Parameter';
$config['xmenu_items'][1]['children'][3]['uri']   = 'sysparam/listing';
$config['xmenu_items'][1]['children'][4]['title'] = 'Module';
$config['xmenu_items'][1]['children'][4]['uri']   = 'module/listing';

