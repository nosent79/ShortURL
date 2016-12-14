<?php
/**
 * Created by PhpStorm.
 * User: 최진욱
 * Date: 2016-12-14
 * Time: 오전 11:22
 */
    require_once "../../Database.php";

    $conn = (new Database())->getConnection();

    var_dump($_GET) or die();