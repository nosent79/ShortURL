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

    if ($db->deleteURLByID($id) > 0) {
        $code   = "00";
        $status = "success";
        $msg    = "delete success";

    } else {
        $code   = "94";
        $status = "error";
        $msg    = "delete error";
    }

    $result = [
        "code"      => $code,
        "status"    => $status,
        "msg"       => $msg,
    ];

    echo json_encode($result);
