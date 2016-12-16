<?php
/**
 * Created by PhpStorm.
 * User: 최진욱
 * Date: 2016-12-16
 * Time: 오전 11:03
 */
    require_once "../../Database.php";
    require_once "../../config/config.php";

    $db = new Database();

    $info = [
        "id"    => $_REQUEST['admin_id'],
        "pwd"   => $_REQUEST['admin_pwd'],
    ];

    $admin = $db->getAdminInfo($info);

    if ($admin === null) {
        header("Location: ". SITE_URL, true, 301);
    }

    $_SESSION['admin_id'] = $admin['admin_id'];
    $_SESSION['admin_nm'] = $admin['admin_nm'];

    header("Location: ../surl_list.php", true, 301);

