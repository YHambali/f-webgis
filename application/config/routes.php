<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Front_home';

// FRONTEND
$route['peta-sebaran-daerah-rawan-bencana']     = 'Front_peta_rawan_bencana';
$route['data-wilayah-karawang']                 = 'Front_data_wilayah_karawang';
$route['data-bencana']                          = 'Front_data_bencana';

// BACKEND
$route['login'] 			            = 'Back_login';
$route['login/proses'] 		            = 'Back_login/proses';
$route['logout']			                    = 'Back_logout/logout';
$route['dashboard'] 		                    = 'Back_dashboard';

$route['konten/data-bencana']                   = 'Back_bencana';
$route['konten/data-kecamatan']                 = 'Back_kecamatan';
$route['konten/data-desa']                      = 'Back_desa';
$route['konten/data-rekam-bencana']             = 'Back_rekam_bencana';
$route['konten/data-rekam-bencana/add']         = 'Back_rekam_bencana/tambah_data';
$route['konten/data-rekam-bencana/edit']        = 'Back_rekam_bencana/edit_data';
$route['konten/data-daerah-rawan-bencana']      = 'Back_rawan_bencana';
$route['konten/data-daerah-rawan-bencana/add']  = 'Back_rawan_bencana/tambah_data';
$route['konten/data-daerah-rawan-bencana/edit'] = 'Back_rawan_bencana/edit_data';
$route['data-user'] 				= 'Back_user';

$route['sitemap'] 					= 'Sitemap';
$route['sitemap.xml'] 				= 'Sitemap';
$route['page404'] 					= 'Errors/page_not_found';
$route['404_override'] 		 = '';
$route['translate_uri_dashes'] = FALSE;
