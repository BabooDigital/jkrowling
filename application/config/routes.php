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

$route['booRegis'] = 'auth/C_Login/postregisteruser';
$route['google_event'] = 'auth/C_Login/google_event';
$route['facebook_event'] = 'auth/C_Login/facebook_event';

/*Timeline*/
$route['home'] = 'timeline/C_home';
// $route['event'] = 'timeline/C_home';
$route['event'] = 'event/C_event';
$route['follow_event'] = 'event/C_event/followEvent';

$route['home/:num'] = 'timeline/C_home';
$route['timeline'] = 'timeline/C_timeline';
$route['timeline/:any'] = 'timeline/C_timeline';
$route['message'] = 'message/C_message';
$route['message/:any'] = 'message/C_message/detailMessage';
$route['detail_message/:num'] = 'message/C_message/detailMessage';
$route['send_message'] = 'message/C_message/send_message';
$route['search'] = 'search/C_search';
$route['search/:any'] = 'search/C_search';
$route['searching'] = 'search/C_search/search';
$route['createidbook'] = 'timeline/C_timeline/createbook_id';

// See All / Lihat Semua
$route['popular_writers'] = 'timeline/C_timeline/AllPopularWriters';


// Draft
$route['yourdraft'] = 'timeline/C_timeline/draftListView';
$route['deldraft'] = 'book/C_book/deleteDraftBook';

$route['writter'] = 'timeline/C_timeline/getWritter';
$route['writters'] = 'timeline/C_home/getWritter';
$route['bestBook'] = 'timeline/C_timeline/getBestBook';
// $route['bestBookHome'] = 'timeline/C_home/getBestBookEvent';
$route['slide'] = 'timeline/C_home/getSlide';

// Follow
$route['follows'] = 'timeline/C_timeline/postFollowUser';

// Share Book Social Media
$route['shares'] = 'timeline/C_timeline/postShareSocmed';

// Like
$route['like'] = 'timeline/C_timeline/postLike';

// Bookmark
$route['sendbookmark'] = 'timeline/C_timeline/postBookmark';

$route['activity'] = 'notification/C_notification/activity';

// Explore
$route['notification'] = 'notification/C_notification';
$route['more'] = 'more/C_more';
$route['updatentf'] = 'notification/C_notification/updateNtf';

// library
$route['library'] = 'library/C_library';
$route['bookmark'] = 'library/C_library/bookmark';
$route['lastread'] = 'library/C_library/lastRead';

// Book
$route['img_book'] = 'book/C_createbook/img_book';
$route['video_book'] = 'book/C_createbook/video_book';

$route['book/:any'] = 'book/C_book';
$route['book/:any/:num'] = 'book/C_book/getChapterResponsive';
$route['book/:any/chapter/:num'] = 'book/C_book/chapterBook';
$route['getmenuchapter'] = 'book/C_book/chapter';
$route['getChapter'] = 'book/C_createbook/getChapter';
$route['book/:any/read'] = 'book/C_book/readingMode';
$route['my_book/:num/chapter/:num'] = 'book/C_createbook/mybook';
$route['my_book/:num'] = 'book/C_createbook';
$route['create_mybook'] = 'book/C_createbook';
$route['chapter'] = 'book/C_createbook/chapter';
$route['chapter/:num'] = 'book/C_createbook/editChapter';
$route['savechapter'] = 'book/C_createbook/saveChapter';
$route['saveeditchapter'] = 'book/C_createbook/saveEditChapter';
$route['delchapter'] = 'book/C_createbook/deleteChapter';
$route['delpublish'] = 'book/C_createbook/deletePublishBook';
$route['listchapter/:num'] = 'book/C_createbook/listChapter';
$route['cover'] = 'book/C_createbook/cover';
$route['cover/:num'] = 'book/C_createbook/cover_v';
$route['detaileditchapt'] = 'book/C_createbook/getDataChapter';

$route['book/:any/preview'] = 'book/C_book_out';


$route['my_book/editor_upload'] = 'book/C_createbook/editor_upload';
$route['create_book'] = 'book/C_createbook';
$route['my_book/create_book/save'] = 'book/C_createbook/save';
$route['my_book/create_book/publish'] = 'book/C_createbook/publishBook';
$route['getCategory'] = 'book/C_book/getCategory';
$route['updatechapter'] = 'book/C_createbook/updateChapter';

$route['publishbook'] = 'book/C_createbook/publishBookMr';

$route['getdetailchapter'] = 'book/C_book/chapter';

$route['getcommentbook'] = 'book/C_book/getCommentBook';
$route['commentbook'] = 'book/C_book/postCommentBook';
$route['notification'] = 'notification/C_notification/getNotification';
$route['example'] = 'notification/C_notification/example';
$route['example/trigger_event'] = 'notification/C_notification/trigger_event';
// Cover
$route['create_cover'] = 'cover/C_cover';
$route['send_cover'] = 'cover/C_cover/sendCover';
$route['post_cover'] = 'book/C_createbook/postUploadCover';

// Profile
$route['profile/(:any)'] = 'profile/C_profile/otherProfile';
$route['profile'] = 'profile/C_profile';
$route['firstedit'] = 'profile/C_edit_profile/firstEditProfile';
$route['account/edit'] = 'profile/C_edit_profile';
$route['account/edit_profile'] = 'profile/C_edit_profile/postEditProfile';
$route['account/setting'] = 'profile/C_profile/settingProfile';
$route['getpublishbook'] = 'profile/C_profile/getPublishBook';
$route['getdraftbook'] = 'profile/C_profile/getDraftBook';
$route['getlatestread'] = 'profile/C_profile/getLatestRead';

$route['upload_pict'] = 'profile/C_edit_profile/postUploadProfPict';

$route['firstlogin'] = 'profile/C_edit_profile/completeProfile';

$route['complete_profile'] = 'profile/C_edit_profile/completeProfile';

$route['selectcategory'] = 'profile/C_edit_profile/selectCategory';
$route['postselectcat'] = 'profile/C_edit_profile/firstSelectCategory';

$route['first_follow'] = 'profile/C_edit_profile/firstFollowUser';
$route['edit_profile'] = 'profile/C_edit_profile/postEditProfile';

// TERMS
$route['tnc'] = 'terms/C_terms';


//event

$route['event/follow_event'] = 'event/C_event/followEvent';
$route['event/sea_all'] = 'event/C_event/seeAll';

$route['bestBookEventSeeAll'] = 'event/C_event/bestBookEventSeeAll';
$route['bestBookEvent'] = 'event/C_event/getBestBookEvent';