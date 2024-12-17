<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
$route['admin'] = 'admin/home';
$route['sepetim'] = 'sepet/index';
// $route['urunler/urundetay/(:any)'] = 'sepet/index';
$route['sepet/sepet_sil/(:any)'] = 'sepet/sepet_sil/$1/';
 

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
