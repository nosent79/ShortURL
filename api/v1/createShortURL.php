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

    $db = new Database();

    $url = $_POST['longUrl'];

    //
    if ($alias = $db->url_exist($url)) {

    // 실 URL이 존재하지 않을 경우 단축 URL 생성하고 DB에 등록
    } else {
        $alias = $db->generate_alias_rand();

        $url_info = [
            "url"       => $url,
            "alias"     => $alias,
        ];

        if ($db->insertURL($url_info)) {
            $code   = "00";
            $status = "success";
            $msg    = "success";
            $alias  = "{SITE_URL}{$alias}";

        } else {
            $code   = "99";
            $status = "error";
            $msg    = "error";
        }

        $result = [
            "code"      => $code,
            "status"    => $status,
            "alias"     => $alias,
            "msg"       => $msg,
        ];

        echo json_encode($result);
    }