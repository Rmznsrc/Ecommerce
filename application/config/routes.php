<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
$route['admin'] = 'admin/home';
$route['sepetim'] = 'sepet/index';
// $route['urunler/urundetay/(:any)'] = 'sepet/index';
$route['sepet/sepet_sil/(:any)'] = 'sepet/sepet_sil/$1/';

$route['admin/api/sss'] = 'admin/ApiSssController/index';
$route['admin/api/insertsss'] = 'admin/ApiSssController/insertsss'; 
$route['admin/api/findsss/(:any)'] = 'admin/ApiSssController/findsss/$1';
$route['admin/api/updateSSS/(:any)'] = 'admin/ApiSssController/updateSSS/$1';
$route['admin/api/removeSSS/(:any)'] = 'admin/ApiSssController/removeSSS/$1';

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
