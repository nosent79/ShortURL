<?php
/**
 * Created by PhpStorm.
 * User: 최진욱
 * Date: 2016-12-16
 * Time: 오후 1:50
 */

    require_once "../../config/config.php";

    session_destroy();

    header("Location: ". SITE_URL, true, 301);