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

$route['logout'] = "myaccount/destroy_user";
$route['acerca'] = "about";

$route['compras'] = "shop";
$route['compras/([0-9_-]+)'] = "shop/index";

$route['compras/porprecio'] = "shop/by_price";

$route['contacto'] = "contacs";
$route['contacto/send_email'] = "contacs/send_email";

$route['micuenta'] = "myaccount";
$route['micuenta/validar_user'] = "myaccount/validar_user";

$route['micuenta_backoffice'] = "myaccount/backoffice";
$route['micuenta/validar_user_backoffice'] = "myaccount/validar_user_backoffice";

$route['registro'] = "register";
$route['registro/crear_cliente'] = "register/create_customer";

$route['checkout'] = "checkout";
$route['checkout/pagar'] = "checkout/pay";

$route['backoffice'] = "backoffice";

$route['backoffice/micuenta'] = "b_profile";
$route['backoffice/micuenta/validate'] = "b_profile/validate";

$route['backoffice/comisiones'] = "b_comission";

$route['backoffice/arbol'] = "b_tree";
$route['backoffice/arbol/([0-9_-]+)'] = "b_tree/index";

$route['backoffice/position'] = "b_tree/position";

$route['backoffice/nuevomiembro'] = "b_new_member";
$route['backoffice/nuevomiembro/validate'] = "b_new_member/validate";

$route['backoffice/faq'] = "b_faq";

$route['backoffice/exito'] = "b_success";

$route['backoffice/logout'] = "backoffice/logout";

$route['([a-z_-]+)'] = "shop/categories/$1"; 
$route['([a-z_-]+)/([0-9_-]+)'] = "shop/categories/$1"; 
$route['hombres/([a-z_-]+)'] = "shop/by_gender/$1"; 
$route['hombres/([a-z_-]+)/([0-9a-z_-]+)'] = "shop/by_gender/$1"; 

$route['mujeres/([a-z_-]+)'] = "shop/by_gender/$1"; 
$route['mujeres/([a-z_-]+)/([0-9a-z_-]+)'] = "shop/by_gender/$1"; 

$route['kids/([a-z_-]+)'] = "shop/by_gender/$1"; 
$route['kids/([a-z_-]+)/([0-9a-z_-]+)'] = "shop/by_gender/$1"; 

$route['buscar/([a-z_-]+)'] = "search/index/$1";
$route['tags/([a-z_-]+)'] = "search/tags/$1";
$route['tags/([a-z_-]+)/([0-9_-]+)'] = "search/tags/$1";

$route['buscar'] = "search";
$route['buscar/([a-z_-]+)/([0-9_-]+)'] = "search/index/$1";

$route['detalle'] = "detail_contain";
$route['detail_contain/comments'] = "detail_contain/comments";
$route['([a-z_-]+)/([0-9a-z_-]+)'] = "detail_contain/index/$1";

$route['dashboard'] = "dashboard";
$route['dashboard/validate'] = "dashboard/validate";
$route['dashboard/panel'] = "panel";
$route['dashboard/logout'] = "dashboard/logout";

$route['dashboard/tags'] = "d_tags";
$route['dashboard/tags/([0-9]+)'] = "d_tags/index/$1";
$route['dashboard/tags/load'] = "d_tags/load";
$route['dashboard/tags/add_tag'] = "d_tags/add_tag";
$route['dashboard/tags/delete'] = "d_tags/delete";

$route['dashboard/comentarios'] = "d_comments";
$route['dashboard/comentarios/cambiar_status'] = "d_comments/change_status";
$route['dashboard/comentarios/cambiar_status_no'] = "d_comments/change_status_no";

$route['dashboard/marcas'] = "d_brand";
$route['dashboard/marcas/([0-9]+)'] = "d_brand/index/$1";
$route['dashboard/marcas/load'] = "d_brand/load";
$route['dashboard/marcas/add_brand'] = "d_brand/add_brand";
$route['dashboard/marcas/delete'] = "d_brand/delete";

$route['dashboard/productos'] = "d_products";
$route['dashboard/productos/([0-9]+)'] = "d_products/index/$1";
$route['dashboard/productos/load'] = "d_products/load";
$route['dashboard/productos/load/([0-9]+)'] = "d_products/load/$1";
$route['dashboard/productos/delete/([0-9]+)'] = "d_products/delete/$1";
$route['dashboard/productos/validate'] = "d_products/validate";

$route['dashboard/pedidos'] = "d_orders";
$route['dashboard/pedidos/ver_detalle/([0-9]+)'] = "d_orders/view_detail/$1";
$route['dashboard/pedidos/cambiar_status'] = "d_orders/change_status";

$route['dashboard/categorias'] = "d_categories";
$route['dashboard/categorias/load'] = "d_categories/load";
$route['dashboard/categorias/load/([0-9]+)'] = "d_categories/load/$1";
$route['dashboard/categorias/delete/([0-9]+)'] = "d_categories/delete/$1";
$route['dashboard/categorias/validate'] = "d_categories/validate";




$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */