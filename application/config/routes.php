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
$route['404_override'] = '';

$route['home'] = 'home';
$route['login'] = 'login';

$route['backoffice'] = "b_home";
$route['backoffice/profile'] = "b_data";
$route['backoffice/upgrade'] = "b_upgrade";
$route['backoffice/binario'] = "b_binario";
$route['backoffice/binario/([0-9a-z_-]+)'] = "b_binario/index/$1";

$route['backoffice/unilevel'] = "b_unilevel";
$route['backoffice/unilevel/([0-9a-z_-]+)'] = "b_unilevel/index/$1";

$route['backoffice/comisiones'] = "b_comissions";
//$route['backoffice/comisiones/consultar'] = "b_comissions/consultar";
$route['backoffice/comisiones/pay_dialy'] = "b_comissions/index/$1";
$route['backoffice/comisiones/binary'] = "b_comissions/index/$1";
$route['backoffice/comisiones/referred'] = "b_comissions/index/$1";

$route['backoffice/billetera'] = "b_wallet";
$route['backoffice/cobros'] = "b_pay";
$route['backoffice/pagos/validar'] = "b_pay/validate";

$route['logout'] = "b_home/logout";
$route['backoffice/misdatos'] = "b_data";

$route['register/afiliate/([0-9a-z_-]+)'] = "register/index/$1";

$route['referred'] = "plan";
$route['binary'] = "plan";
$route['bets'] = "plan";

$route['dashboard'] = "dashboard";
$route['dashboard/panel'] = "panel";
$route['dashboard/panel/guardar_btc'] = "panel/guardar_btc";
$route['dashboard/panel/masive_messages'] = "panel/masive_messages";

$route['dashboard/clientes'] = "d_customer";
$route['dashboard/financiados'] = "d_customer/financiados";
$route['dashboard/clientes/active_customer'] = "d_customer/active_customer";
$route['dashboard/clientes/no_active_customer'] = "d_customer/no_active_customer";
$route['dashboard/clientes/load/([0-9]+)'] = "d_customer/load/$1";
$route['dashboard/clientes/validate'] = "d_customer/validate";

$route['dashboard/pagos_diarios'] = "d_pay_dialy";
$route['dashboard/pagos_diarios/hacer_pago'] = "d_pay_dialy/hacer_pago";

$route['dashboard/comentarios'] = "d_comments";
$route['dashboard/comentarios/cambiar_status'] = "d_comments/change_status";
$route['dashboard/comentarios/cambiar_status_no'] = "d_comments/change_status_no";

$route['dashboard/usuarios'] = "d_users";
$route['dashboard/usuarios'] = "d_users";
$route['dashboard/usuarios/load'] = "d_users/load";
$route['dashboard/usuarios/load/([0-9]+)'] = "d_users/load/$1";
$route['dashboard/usuarios/validate'] = "d_users/validate";

$route['dashboard/activaciones'] = "d_activate";
$route['dashboard/activaciones/active_customer'] = "d_activate/active_customer";
$route['dashboard/activaciones/active_financy'] = "d_activate/active_financy";
$route['dashboard/activaciones/active'] = "d_activate/active";

$route['dashboard/cobros'] = "d_pays";
$route['dashboard/cobros_details/([0-9]+)'] = "d_pays/details/$1";
$route['dashboard/cobros/pagado'] = "d_pays/pagado";
$route['dashboard/cobros/devolver'] = "d_pays/devolver";

$route['dashboard/comentarios'] = "d_comments";
$route['dashboard/comentarios/cambiar_status'] = "d_comments/change_status";
$route['dashboard/comentarios/cambiar_status_no'] = "d_comments/change_status_no";

$route['dashboard/usuarios'] = "d_users";
$route['dashboard/usuarios'] = "d_users";
$route['dashboard/usuarios/load'] = "d_users/load";
$route['dashboard/usuarios/load/([0-9]+)'] = "d_users/load/$1";
$route['dashboard/usuarios/validate'] = "d_users/validate";


/* End of file routes.php */
/* Location: ./application/config/routes.php */