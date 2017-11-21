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
$route['default_controller'] = 'timeline/C_home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'auth/C_Login';
$route['logout'] = 'timeline/C_timeline/signout';

/*Timeline*/
$route['home'] = 'timeline/C_home';
$route['timeline'] = 'timeline/C_timeline';

// Explore
$route['notification'] = 'notification/C_notification';

// library
$route['library'] = 'library/C_library';

// Book
$route['book'] = 'book/C_book';
$route['my_book/:num/chapter/:num'] = 'book/C_createbook/mybook';
$route['create_book'] = 'book/C_createbook';
$route['create_book/save'] = 'book/C_createbook/save';


// Cover
$route['create_cover'] = 'cover/C_cover';
$route['send_cover'] = 'cover/C_cover/sendCover';

// Profile
$route['profile'] = 'profile/C_profile';
$route['awsd'] = 'book/C_createbook/awasd';
