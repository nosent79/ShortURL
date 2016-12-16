<?php
/**
 * Created by PhpStorm.
 * User: 최진욱
 * Date: 2016-12-14
 * Time: 오전 11:22
 */
    require_once "../../Database.php";
    require_once "../../config/config.php";
    require_once "../../config/function.php";

    if (!isAdmin()) {
        redirectSiteURL(SITE_URL);
    }

    $db = new Database();

    $id = $_POST['id'];

    if (!isset($id)) {
        redirectSiteURL(SITE_URL);
    }

    if ($db->extendExpireURLByID($id) > 0) {
        $expire_dt = $db->getExpireDT($id);
        $code   = "00";
        $status = "success";
        $msg    = "update success";

    } else {
        $code   = "93";
        $status = "error";
        $msg    = "update error";
    }

    $result = [
        "code"      => $code,
        "status"    => $status,
        "msg"       => $msg,
        "expire_dt" => $expire_dt,
    ];

    echo json_encode($result);
