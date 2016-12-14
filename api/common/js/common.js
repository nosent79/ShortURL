/**
 * Created by 최진욱 on 2016-12-14.
 */
function submitConvertForm(frm){

    frm.mode.value='ajax';

    if(frm.longUrl.value.length<'4' || frm.longUrl.value == $('.inputLongUrlBox').data('defaultValue')) return false;

    var requestData		= $(frm).serialize();
    var requestUrl		= frm.action;
    var requestMethod	= frm.method;

    $.ajax({
        type: requestMethod,
        url: requestUrl,
        data: requestData,
        dataType: 'json',
        success: function(res){
            $('div.OutputShortUrl').show();
            if(res.status=='success'){
                $('input.outputShortUrlBox').removeClass('error').attr('value',res.shortUrl).focus().select();

                var newFbDiv = '<div id="fbbutton"><fb:like id="fb" href="' + res.shortUrl + '" send="true" show_faces="true" font=""></fb:like></div>';

                $.when( $('#fbbutton').replaceWith(newFbDiv) ).done(function() {
                    FB.XFBML.parse(document.getElementById('fbbutton'));
                });

            }
            else{
                $('input.outputShortUrlBox').addClass('error').attr('value',res.msg);
            }
        }
    });

    return false;
}

$(document).ready(function(){
    alert('a');
    $('.inputLongUrlBox').each(function(){
        if(global_ismobile){
            $(this).data('defaultValue','긴 주소를 입력하세요');
        }else{
            $(this).data('defaultValue','긴 주소를 입력하세요 예) www.abcd.kr 또는 http://www.abcd.kr');
        }
        $(this).attr('value',$(this).data('defaultValue'));
        $(this)
            .bind('focus click keydown',function(){
                if($(this).attr('value')==$(this).data('defaultValue')) $(this).attr('value','');
                $(this).addClass('focusIn');
            })
            .focusout(function(){
                if($(this).attr('value')=='') $(this).attr('value',$(this).data('defaultValue'));
                $(this).removeClass('focusIn');
            })
    });

});