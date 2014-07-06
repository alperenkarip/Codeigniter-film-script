<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "anasayfa";
$route['404_override'] = '';
$route['izle/(:any)'] = 'anasayfa/izle/$1';
$route['s/(:any)'] = 'anasayfa/index/$1';
$route['(:any)/filmleri/(:num)'] = 'anasayfa/filmleri/$1/$2';
$route['(:any)/filmleri'] = 'anasayfa/filmleri/$1';
$route['iletisim'] = 'anasayfa/iletisim';
$route['sayfa/(:num)/(:any)'] = 'anasayfa/sayfa/$1/$2';
$route['ara/(:any)'] = 'anasayfa/ara/$1';
$route['etiket/(:any)'] = 'anasayfa/etiket/$1';
$route['rss.xml'] = 'anasayfa/rss';
$route['sitemap.xml'] = 'anasayfa/sitemap';
$route['mobil/izle/(:any)'] = 'mobil/anasayfa/izle/$1';
$route['mobil/anasayfa/(:num)'] = 'mobil/anasayfa/index/$1';
// $route['ci/(:num)'] = 'ci/index/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */