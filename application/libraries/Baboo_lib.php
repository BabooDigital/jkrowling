<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class Baboo_lib
{

    function __construct()
    {

    }

    function ConvertToK($num)
    {
        $x = round($num);
        $x_number_format = number_format($x);
        $x_array = explode(',', $x_number_format);
        $x_parts = array('k', 'm', 'b', 't');
        $x_count_parts = count($x_array) - 1;
        $x_display = $x;
        $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
        $x_display .= $x_parts[$x_count_parts - 1];
        return $x_display;
    }

    function urlToBook($userdata, $bookdata ="")
    {
        $url = site_url('penulis/'.$userdata.'/'.$bookdata);
        return $url;
    }

    function urlToUser($userdata)
    {
        $url = site_url('penulis/'.$userdata);
        return $url;
    }

    function urlToCategory($catdata)
    {
        $url = site_url('kategori/'.$catdata);
        return $url;
    }

}
