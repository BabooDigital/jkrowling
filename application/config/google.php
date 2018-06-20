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

$config['google']['client_id']        = APPID_GOOGLE;
$config['google']['client_secret']    = APPSEC_GOOGLE;
$config['google']['redirect_uri']     = base_url().'auth/C_Login/google_login';
$config['google']['application_name'] = 'BabooLoginApp ';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();