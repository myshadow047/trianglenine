<?php

$config = array();
// $config['xmenu_source'] = 'model:menu:find_admin_panel';

$config['xmenu_source']                           = 'inline';

$config['xmenu_items'][0]['title']                = 'Home';
$config['xmenu_items'][0]['uri']                  = '/';

$config['xmenu_items'][1]['title']                = 'System';

$config['xmenu_items'][1]['children'][0]['title'] = 'User';
$config['xmenu_items'][1]['children'][0]['uri']   = 'user/listing';

$config['xmenu_items'][1]['children'][1]['title'] = 'Role';
$config['xmenu_items'][1]['children'][1]['uri']   = 'role/listing';

// $config['xmenu_items'][1]['children'][2]['title'] = 'Menu';
// $config['xmenu_items'][1]['children'][2]['uri']   = 'menu/listing';

$config['xmenu_items'][2]['title']                = 'Manage';

$config['xmenu_items'][2]['children'][0]['title'] = 'Country';
$config['xmenu_items'][2]['children'][0]['uri']   = 'country/listing';
