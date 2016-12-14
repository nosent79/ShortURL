
<!doctype html>
<html>
<head>
    <title>긴주소를 짧게</title>
    <meta charset="UTF-8" />
    <meta name="keyword" content="단축URL,URL단순화,shortUrl,surl,surl.kr" />
    <meta name="description" content="Surl은 긴 웹사이트주소를 짧게 줄여주는 서비스를 제공합니다." />

    <link rel="stylesheet" href="/api/common/css/common.css" type="text/css" />
    <link rel="stylesheet" href="/api/common/css/index.css" type="text/css" />

    <script>
        var global_ismobile=false;
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="/api/common/js/common.js"></script>
</head>

<body>

<div id="wrap" class='mainBackground'>
    <div id="urlConvertForm">

        <div class="InputLongUrl clear_box">
            <h3>긴 주소 짧게 변환하기</h3>
            <form name="convertForm" id="convertForm" action="/api/v1/createShortURL.php" method="post" onsubmit="return submitConvertForm(this)">
                <input type="hidden" name="mode" value="normal" />
                <input type="text" class="inputLongUrlBox" name="longUrl" value="" size="60" maxlength="255" />
                <input type="submit" class="inputLongUrlBtn" value="변환" />
            </form>
        </div>

        <hr />

        <div class="OutputShortUrl clear_box">
            <h3>짧은주소</h3>
            <input type="text" class="outputShortUrlBox" name="shortUrl" value="" size="50" maxlength="30" />
        </div>

    </div>
</div>
</body>

</html>
