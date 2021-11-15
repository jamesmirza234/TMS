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

$route['default_controller'] = 'login';
$route['404_override'] = '';

/* WEB */
$route['index.html'] = 'login';
$route['dashboard2.html'] = 'web/dashboard2';
$route['create-shipment.html'] = 'web/create_shipment';
$route['view-shipment.html'] = 'web/view_shipment';
$route['customer.html'] = 'web/customer';
$route['services.html'] = 'web/services';
$route['status2.html'] = 'web/status2';
$route['contact.html'] = 'web/contact';
$route['items.html'] = 'web/items';
$route['perusahaan.html'] = 'web/perusahaan';
$route['mobile-user.html'] = 'web/mobile_users';
$route['feedback.html'] = 'web/feedback';
$route['logout.html'] = 'web/logout';

/* ORDER */
$route['sign_up.php'] = 'team/sign_up';
$route['confirmation.php'] = 'team/confirmation';
$route['list_customer.php'] = 'team/list_customer';
$route['list_contact.php'] = 'team/list_contact';
$route['list_service.php'] = 'team/list_service';
$route['list_item.php'] = 'team/list_item';
$route['list_uom.php'] = 'team/list_uom';
$route['get_rate.php'] = 'team/get_rate';
$route['list_add_service.php'] = 'team/list_add_service';
$route['save_order.php'] = 'team/save_order';
$route['save_invoice.php'] = 'team/save_invoice';

/* LOADING */
$route['list_transport_type.php'] = 'team/list_transport_type';
$route['new_transport.php'] = 'team/new_transport';
$route['new_basket.php'] = 'team/new_basket';
$route['list_transport.php'] = 'team/list_transport';
$route['list_basket.php'] = 'team/list_basket';
$route['list_laundry.php'] = 'team/list_laundry';
$route['status_transport.php'] = 'team/status_transport';
$route['status_basket.php'] = 'team/status_basket';
$route['save_laundry_to_basket.php'] = 'team/save_laundry_to_basket';
$route['save_laundry_to_transport.php'] = 'team/save_laundry_to_transport';
$route['save_order_to_basket.php'] = 'team/save_order_to_basket';
$route['save_order_to_transport.php'] = 'team/save_order_to_transport';
$route['save_basket_to_transport.php'] = 'team/save_basket_to_transport';
$route['save_transport_to_transport.php'] = 'team/save_transport_to_transport';

/* POP */
$route['shipment-mobile-pop.json'] = 'team/shipment_mobile_pop';
$route['upload-mobile-pop.json'] = 'team/upload_mobile_pop';

/* POD */
$route['shipment-mobile.json'] = 'team/shipment_mobile_pod';
$route['upload-mobile.json'] = 'team/upload_mobile_pod';

/* TRACK */
$route['register.html'] = 'track/register';
$route['key.html'] = 'track/key';
$route['pairing.html'] = 'track/pairing';
$route['submit.html'] = 'track/submit';
$route['status.html'] = 'track/status';


/* End of file routes.php */
/* Location: ./application/config/routes.php */