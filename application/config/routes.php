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
$route['home/:num'] = 'timeline/C_home';
$route['timeline'] = 'timeline/C_timeline';
$route['timeline/:any'] = 'timeline/C_timeline';
$route['message'] = 'message/C_message';
$route['createidbook'] = 'timeline/C_timeline/createbook_id';

$route['writter'] = 'timeline/C_timeline/getWritter';
$route['writters'] = 'timeline/C_home/getWritter';

// Follow
$route['follows'] = 'timeline/C_timeline/postFollowUser';

// Like
$route['like'] = 'timeline/C_timeline/postLike';

// Explore
$route['notification'] = 'notification/C_notification';
$route['more'] = 'more/C_more';

// library
$route['library'] = 'library/C_library';

// Book
$route['img_book'] = 'book/C_createbook/img_book';
$route['book/:any'] = 'book/C_book';
// $route['book/:any/:any'] = 'book/C_book';
$route['getmenuchapter'] = 'book/C_book/chapter';
$route['book/:any/read'] = 'book/C_book/readingMode';
$route['my_book/:num/chapter/:num'] = 'book/C_createbook/mybook';
$route['my_book/:num'] = 'book/C_createbook';
$route['my_book/editor_upload'] = 'book/C_createbook/editor_upload';
$route['create_book'] = 'book/C_createbook';
$route['my_book/create_book/save'] = 'book/C_createbook/save';
$route['my_book/create_book/publish'] = 'book/C_createbook/publishBook';

$route['getdetailchapter'] = 'book/C_book/chapter';

$route['getcommentbook'] = 'book/C_book/getCommentBook';
$route['commentbook'] = 'book/C_book/postCommentBook';

// Cover
$route['create_cover'] = 'cover/C_cover';
$route['send_cover'] = 'cover/C_cover/sendCover';

// Profile
$route['profile/(:any)'] = 'profile/C_profile';
$route['profile'] = 'profile/C_profile';
$route['getpublishbook'] = 'profile/C_profile/getPublishBook';
$route['getdraftbook'] = 'profile/C_profile/getDraftBook';
$route['getlatestread'] = 'profile/C_profile/getLatestRead';
$route['awsd'] = 'book/C_createbook/awasd';

$route['awsd'] = 'book/C_createbook/awasd';
