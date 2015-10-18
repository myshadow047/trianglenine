<?php

$config = array(
    'install_ftp_username' => 'root',
    'install_ftp_password' => 'password',
    'install_ftp_hostname' => 'localhost',
    'install_ftp_base_dir' => '/public_html/',
    'install_excluded' => array(
        '-X .*',
        '-x ^index.php',
        '-x ^.git',
        '-x ^nbproject',
        '-x ^error_log',
        '-x ^application/cache',
        '-x ^application/logs',
        '-x ^application/third_party',
        '-x ^data',
        '-x ^demo',
        '-x ^design',
        '-x ^sources',
        '-x ^install',

    ),
);


