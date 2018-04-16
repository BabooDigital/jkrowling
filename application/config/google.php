<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/

$clientid = '87855736095-9bo8c78nojsne31dj3vr3gf694itavoh.apps.googleusercontent.com';
$clientsecret = 'DHXnd3vSUDQI8C0YOLmLk4YO';

$config['google']['client_id']        = $clientid;
$config['google']['client_secret']    = $clientsecret;
$config['google']['redirect_uri']     = base_url().'auth/C_Login/google_login';
$config['google']['application_name'] = 'BabooLoginApp ';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();