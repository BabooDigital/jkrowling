<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


// CONFIG BASE URL CI
/*
@@@ PRODUCTION @@@
URL = 'https://www.baboo.id/'

@@@ STAGING @@@
URL = 'https://staging.baboo.id/'

@@@ DEVELOPMENT @@@
URL = 'https://dev-baboo.co.id/'
*/
defined('BASE_URL_WEB')		OR define('BASE_URL_WEB', 'https://www.baboo.id/');
defined('BASE_URL_DEEPLINK')		OR define('BASE_URL_DEEPLINK', 'www.baboo.id/');

// CONFIG DB
/*
@@@ STAGING @@@
'hostname' => 'dbnode0',
'username' => 'baboo_dbusr',
'password' => 'B4booAWs2018',
'database' => 'baboo_dbstg',

@@@ PRODUCTION @@@
'hostname' => '',
'username' => '',
'password' => '',
'database' => '',
*/
defined('DB_HOST')			OR define('DB_HOST', '');
defined('DB_USERNAME')		OR define('DB_USERNAME', '');
defined('DB_USERPASSWORD')	OR define('DB_USERPASSWORD', '');
defined('DB_NAME')			OR define('DB_NAME', '');

// CONFIG API URL
/*
API DEV = 'api.dev-baboo.co.id/v1/'
API STG = 'https://api.staging.baboo.id/v1/'
API PRD = 'https://api.baboo.id/v1/'
*/
defined('API_URL')	OR	define('API_URL', 'https://api.baboo.id/v1/');

// CONFIG APP ID FACEBOOK
/*
APPID DEV = '196429547790304'	|	APPSEC DEV = '51d446946c5024034b06b66a18e70a81'
APPID STG = '1677083049033942'	|	APPSEC STG = '72bfed7ed3b202de2797977e5d1ce09b'
APPID PRD = '2093513617332249'	|	APPSEC PRD = '39ee66409a3d976689d7db1fc48e842f'
*/
defined('APPID_FB')		OR	define('APPID_FB', '2093513617332249');
defined('APPSEC_FB')	OR	define('APPSEC_FB', '39ee66409a3d976689d7db1fc48e842f');

// CONFIG APP ID GOOGLE
/*
APPID DEV = '625200931795-v9j07677ch7drvplu5ohpph4u48b4277.apps.googleusercontent.com'	|	APPSEC DEV = '9a-ThTIiKvuELANSjq-HFn4g'
APPID STG = '347878416490-7era9p9mn379qdod4vbd61s217ubk2co.apps.googleusercontent.com'	|	APPSEC STG = 'TnNCHFjM1d8g44fzBM0cV3eL'
APPID PRD = '87855736095-9bo8c78nojsne31dj3vr3gf694itavoh.apps.googleusercontent.com'	|	APPSEC PRD = 'DHXnd3vSUDQI8C0YOLmLk4YO'
*/
defined('APPID_GOOGLE')		OR	define('APPID_GOOGLE', '87855736095-9bo8c78nojsne31dj3vr3gf694itavoh.apps.googleusercontent.com');
defined('APPSEC_GOOGLE')	OR	define('APPSEC_GOOGLE', 'DHXnd3vSUDQI8C0YOLmLk4YO');

// CONFIG Access Keys Midtrans
/*
@@@ PRODUCTION @@@
Merchant ID = M127372
Client Key	= Mid-client-JGAimn-rG7nf4PpW
Server Key	= Mid-server-OOqHX9vrFCfo5OrmJ7pgrWoQ

@@@ DEV/STG SANDBOX @@@
Merchant ID = M127372
Client Key	= SB-Mid-client-FbaqZneHUk1HWy6m
Server Key	= SB-Mid-server-4bmgeo85fTsjFQccrdZt6T6E
*/
defined('MID_ID')		 OR	define('MID_ID', 'M127372');
defined('MID_CLIENT')	 OR	define('MID_CLIENT', 'Mid-client-JGAimn-rG7nf4PpW');
defined('MID_SERVER')	 OR	define('MID_SERVER', 'Mid-server-OOqHX9vrFCfo5OrmJ7pgrWoQ');
defined('MID_STAT_PROD') OR	define('MID_STAT_PROD', true);

// CONFIG BASE URL MIDTRANS
/*
@@@ PRODUCTION @@@
URL = app.midtrans.com

@@@ DEV/STG @@@
URL = app.sandbox.midtrans.com
*/
defined('MID_BASE_URL')		 OR	define('MID_BASE_URL', 'app.midtrans.com');

// CONFIG ID GOOGLE ADSENSE
/*
@@@ PRODUCTION @@@
data-ad-client	= "ca-pub-3590496162921239"
data-ad-slot	= ""

@@@ DEV/STG @@@
data-ad-client	= "ca-pub-4994852796413443"
data-ad-slot	= "7276054409"
*/
defined('AD_CLIENT')	OR	define('AD_CLIENT', 'ca-pub-4994852796413443');
defined('AD_SLOT')		OR	define('AD_SLOT', '7276054409');
// CONFIG ID GOOGLE ANALYTICS / GOOGLE TAG MANAGER
/*
@@@ PRODUCTION @@@
ANALYTIS ID = 'UA-122661844-1'
GTAGSM ID = 'GTM-WJXMRQ5'
@@@ STAGING @@@
ANALYTIS ID = 'UA-122668478-1'
GTAGSM ID = 'GTM-MFRWL46'
@@@ DEVELOPMENT @@@
ANALYTIS ID = 'UA-122651746-1'
GTAGSM ID = 'GTM-NLSFN85'
*/
defined('ANALYTICS_GID')	OR	define('ANALYTICS_GID', 'UA-122661844-1');
defined('TAGMNG_GID')	OR	define('TAGMNG_GID', 'GTM-WJXMRQ5');
defined('FBPIXEL_ID')	OR	define('FBPIXEL_ID', '1016375711895493');