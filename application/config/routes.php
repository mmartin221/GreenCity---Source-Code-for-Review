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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['login'] = 'welcome/login';
$route['register'] = 'welcome/register';
$route['register-post'] = 'welcome/registerPost';

$route['login-post'] = 'welcome/loginPost';
$route['logout'] = 'welcome/logout';

$route['shop-products'] = 'shop/products';
$route['product-details/(:any)'] = 'shop/productDetails/$1';

$route['check-email'] = 'welcome/checkEmail';
$route['check-phone'] = 'welcome/checkPhone';


$route['add-remove-cart/(:any)/(:any)'] = 'shop/addRemoveCart/$1/$2';
$route['cart'] = 'shop/userCart';
$route['checkout'] = 'shop/checkout';
$route['OrderPlace'] = 'shop/OrderPlace';
$route['my-order'] = 'shop/myOrderList';
$route['myorder-details/(:any)'] = 'shop/myorderDetails/$1';
$route['timetable'] = 'shop/timetable';
$route['Upcycling-Session-Details/(:any)'] = 'shop/UpcyclingSessionDetails/$1';
$route['Upcycling-Session-Details/(:any)/(:any)'] = 'shop/UpcyclingSessionDetails/$1/$1';
$route['UpcyclingList'] = 'shop/SaveUpcycling';
$route['View-location-map'] = 'shop/Viewlocationmap';
$route['tips-and-tricks'] = 'welcome/tipsandtricks';




$route['admin-login'] = 'admin/login';
$route['admin-login-post'] = 'admin/loginPost';
$route['admin-dashboard'] = 'admin/dashboard';
$route['order'] = 'admin/orderList';
$route['order-details/(:any)'] = 'admin/orderDetails/$1';
$route['admin-timetable'] = 'admin/addtimetablt';
$route['add-timetable'] = 'admin/saveTimetablt';
$route['timetable-List'] = 'admin/timetableList';
$route['edit-timetable/(:num)'] = 'admin/editTimetable/$1';
$route['update-timetable/(:num)'] = 'admin/updateTimetable/$1';
$route['end-user'] = 'admin/registerUser';
$route['admin-logout'] = 'admin/logout';


$route['admin-products'] 		 = 'admin/products';
$route['add-product'] 			 = 'admin/addProduct';
$route['edit-product/(:any)']	 = "admin/editProduct/$1";
$route['admin-setting'] 		 = 'admin/adminSetting';
$route['addsetting'] 		 	 = 'admin/addsetting';

$route['delete-product-image']   = 'admin/deleteProductImage';

$route['admin-category'] 		= 'admin/category';
$route['add-category'] 			= 'admin/addCategory';
$route['edit-category/(:any)']  = "admin/editCategory/$1";
$route['user-details/(:any)']   = "admin/userDetails/$1";


$route['admin-staff'] 			= 'admin/users';
$route['add-staff'] 			= 'admin/addUser';
$route['edit-staff/(:any)'] 	= "admin/editUser/$1";

$route['check-user-email'] 		= 'admin/checkEmail';