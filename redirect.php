<?php
/**
 * Created by PhpStorm.
 * User: 최진욱
 * Date: 2016-12-14
 * Time: 오후 12:23
 */

    require_once "Database.php";

    //$conn = (new Database())->getConnection();
    $db = new Database();

    $alias = $_GET['alias'];

    // 단축 URL 조건 검사
    if (!preg_match("/^[a-zA-Z0-9]+$/", $alias)) {
        header("Location: ".SITE_URL, true, 301);
        exit;
    }

    // 단축 URL 조회 후 존재하면 리다이렉트
    if (($url = $db->url_exist($alias))) {
        header("Location: //$url", true, 301);
        exit;
    }

    // 초기화면으로 이동
    header("Location: ".SITE_URL, true, 301);
