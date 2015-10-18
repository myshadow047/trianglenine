<?php

require_once 'arch/arch.php';

$app = new ARCH('development', __DIR__);

require_once $app->ROOTPATH.'/'.$app->SYSTEMPATH.'core/CodeIgniter.php';