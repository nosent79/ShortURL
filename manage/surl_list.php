<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shorten URL List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="auth/logout.php"><span class="glyphicon glyphicon-log-in"></span> 로그아웃</a></li>
        </ul>
    </div>
    <h2>Shorten URL List</h2>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>url</th>
            <th>shorten URL</th>
            <th>expire_dt</th>
            <th>hits</th>
            <th>reg_dt</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <tbody>
<?php
/**
 * Created by PhpStorm.
 * User: 최진욱
 * Date: 2016-12-16
 * Time: 오전 11:10
 */

    require_once "../Database.php";
    require_once "../config/config.php";
    require_once "../config/function.php";

    if (!isAdmin()) {
        header("Location: ". SITE_URL, true, 301);
    }

    $db = new Database();

    foreach($db->getShortenUrlList() as $list) {
?>
    <tr id="<?=$list['id']?>">
        <td><?= $list['url'] ?></td>
        <td><?= $list['alias'] ?></td>
        <td class="_expire_dt"><?= $list['expire_dt'] ?></td>
        <td><?= $list['hit'] ?></td>
        <td><?= $list['reg_dt'] ?></td>
        <td><button type="button" class="btn btn-default _fnExtendExpireDate" ids="<?=$list["id"]?>">연장</button></td>
        <td><button type="button" class="btn btn-default _fnDeleteUrl" ids="<?=$list["id"]?>">삭제</button></td>
    </tr>
<?php
    }

    $db->getDisConnection();
?>
    </tbody>
  </table>
</div>
<script>
    $(document).ready(function() {
        $("._fnExtendExpireDate").click(function() {
            var id = $(this).attr('ids');
            $.ajax({
                type: "post",
                url: "<?=SITE_URL?>api/v1/extendExpireShortURL.php",
                data: {'id': id},
                dataType: 'json',
                success: function(res){
                    if(res.status == 'success') {
                        alert("연장되었습니다.");
                        $("tr#"+id+ " ._expire_dt").text(res.expire_dt);
                    } else {
                        alert("실패했습니다.");
                    }
                }
            });
        });

        $("._fnDeleteUrl").click(function() {
            var id = $(this).attr('ids');
            $.ajax({
                type: "post",
                url: "<?=SITE_URL?>api/v1/deleteShortURL.php",
                data: {'id': id},
                dataType: 'json',
                success: function(res){
                    if(res.status == 'success') {
                        alert("정상적으로 삭제되었습니다.");
                        $("tr#"+id).remove();
                    } else {
                        alert("실패했습니다.");
                    }
                }
            });
        });
    });
</script>
</body>
</html>