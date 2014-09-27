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

$route['default_controller'] = "home";
$route['home'] = "home";
$route['home/add_car'] = "home/add_car";
$route['home/delete_car'] = "home/delete_car";
$route['home/update_car'] = "home/update_car";
$route['home/empty_car'] = "home/empty_car";

$route['acerca'] = "about";

$route['compras'] = "shop";
$route['compras/([0-9_-]+)'] = "shop/index";

$route['contacto'] = "contacs";
$route['detalle'] = "detail_contain";

$route['micuenta'] = "myaccount";
$route['micuenta/validar_user'] = "myaccount/validar_user";
$route['checkout'] = "checkout";

$route['([a-z_-]+)'] = "shop/categories/$1"; 
$route['([a-z_-]+)/([0-9_-]+)'] = "shop/categories/$1"; 

$route['([a-z_-]+)/([0-9a-z_-]+)'] = "detail_contain/index/$1"; 

$route['dashboard'] = "dashboard";
$route['dashboard/panel'] = "panel";
$route['dashboard/productos'] = "d_products";
$route['dashboard/productos/([0-9]+)'] = "d_products/index/$1";
$route['dashboard/productos/load'] = "d_products/load";
$route['dashboard/productos/load/([0-9]+)'] = "d_products/load/$1";
$route['dashboard/productos/delete/([0-9]+)'] = "d_products/delete/$1";
$route['dashboard/productos/validate'] = "d_products/validate";

$route['dashboard/categorias'] = "d_categories";
$route['dashboard/categorias/load'] = "d_categories/load";
$route['dashboard/categorias/load/([0-9]+)'] = "d_categories/load/$1";
$route['dashboard/categorias/delete/([0-9]+)'] = "d_categories/delete/$1";
$route['dashboard/categorias/validate'] = "d_categories/validate";

$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */