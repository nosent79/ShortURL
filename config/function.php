<?php
/**
 * Created by PhpStorm.
 * User: 최진욱
 * Date: 2016-12-15
 * Time: 오전 10:34
 */
    function addURLScheme($url)
    {
        if (!preg_match("/^(" . URL_PROTOCOLS . ")\:\/\//i", $url)) {
            $prefix = explode(":", $url);

            if (!($prefix[0] == 'mailto')) {
                $url = "//{$url}";
            }
        }

        return $url;
    }

    function isAdmin()
    {
        if (isset($_SESSION['admin_id'])) {
            return true;
        }

        return false;
    }

    function redirectSiteURL($url)
    {
        header("Location: ". $url, true, 301);
    }