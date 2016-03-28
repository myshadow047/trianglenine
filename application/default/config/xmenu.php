<?php

$config = array();
// $config['xmenu_source'] = 'model:menu:find_admin_panel';

$config['xmenu_source'] = 'inline';

$config['xmenu_items'][0]['title'] = 'Home';
$config['xmenu_items'][0]['uri'] = '/dashboard_admin';

$config['xmenu_items'][1]['title'] = 'System';
$config['xmenu_items'][1]['children'][0]['title'] = 'User';
$config['xmenu_items'][1]['children'][0]['uri'] = 'user/listing';
$config['xmenu_items'][1]['children'][1]['title'] = 'Role';
$config['xmenu_items'][1]['children'][1]['uri'] = 'role/listing';
$config['xmenu_items'][1]['children'][2]['title'] = 'Parameter';
$config['xmenu_items'][1]['children'][2]['uri']   = 'sysparam/listing';

$config['xmenu_items'][2]['title'] = 'Data Master';
$config['xmenu_items'][2]['children'][0]['title'] = 'Journal Category';
$config['xmenu_items'][2]['children'][0]['uri'] = '/journal_category';
$config['xmenu_items'][2]['children'][1]['title'] = 'Product Category';
$config['xmenu_items'][2]['children'][1]['uri'] = '/product_category';
$config['xmenu_items'][2]['children'][2]['title'] = 'Printing Type';
$config['xmenu_items'][2]['children'][2]['uri'] = '/printing_type';

$config['xmenu_items'][3]['title'] = 'Home Banner';
$config['xmenu_items'][3]['uri'] = '/home_banner';

$config['xmenu_items'][4]['title'] = 'About';
$config['xmenu_items'][4]['uri'] = '/about';

$config['xmenu_items'][5]['title'] = 'Portfolio';
$config['xmenu_items'][5]['uri'] = '/portfolio';

$config['xmenu_items'][6]['title'] = 'Journal';
$config['xmenu_items'][6]['uri'] = '/journal';

$config['xmenu_items'][7]['title'] = 'Product';
$config['xmenu_items'][7]['uri'] = '/product';

$config['xmenu_items'][8]['title'] = 'Printing';
$config['xmenu_items'][8]['uri'] = '/printing';

$config['xmenu_items'][9]['title'] = 'Order';
$config['xmenu_items'][9]['uri'] = '/order';

$config['xmenu_items'][10]['title'] = 'Location';
$config['xmenu_items'][10]['uri'] = '/location';

