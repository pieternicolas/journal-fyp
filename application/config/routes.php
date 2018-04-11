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
/* Admin routers */
$route['journal/admin/(:any)/(:any)'] = 'admin_journal/view/$1/$2';
$route['admin_signup'] = 'admin_user/create_user';
$route['admin_home/logout'] = 'admin_home/logout';
$route['admin_home/switch_version'] = 'admin_home/switch_version';
$route['admin_home/(:any)/(:any)'] = 'admin_home/index/$1/$2';

/* Student journal routers */
$route['journal/search'] = 'journal/search';
$route['journal/edit'] = 'journal/edit';
$route['journal/fetch'] = 'journal/fetch';
$route['journal/fetch/(:any)'] = 'journal/fetch/$1';
$route['journal/create'] = 'journal/create';
$route['journal/(:any)'] = 'journal/view/$1';

/* Placeholder */
$route['user_loggedin/change_password3'] = 'user_loggedin/ver3';
$route['user_loggedin/change_password2'] = 'user_loggedin/ver2';
$route['signup3'] = 'user/ver3';
$route['signup2'] = 'user/ver2';
/* Placeholder */


/* Base routers */
$route['home/logout'] = 'home/logout';
$route['home/(:any)'] = 'home/index/$1';
$route['signup'] = 'user/create_user';
$route['default_controller'] = 'login';