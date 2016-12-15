/**
 * Created by 최진욱 on 2016-12-14.
 */
function submitConvertForm(frm){
    if(frm.longUrl.value.length < 12 || frm.longUrl.value == $('.inputLongUrlBox').data('defaultValue')) return false;

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

            if(res.status == 'success') {
                $('input.outputShortUrlBox').removeClass('error').attr('value', res.alias).focus().select();
            } else {
                $('input.outputShortUrlBox').addClass('error').attr('value',res.msg);
            }
        }
    });

    return false;
}

$(document).ready(function() {
    $('.inputLongUrlBox').each(function() {
        $(this).data('defaultValue', '긴 주소를 입력하세요');
        $(this).attr('value', $(this).data('defaultValue'));
        $(this)
            .bind('focus click keydown', function() {
                if ($(this).attr('value') == $(this).data('defaultValue')) {
                    $(this).attr('value','');
                }
                $(this).addClass('focusIn');
            })
            .focusout(function() {
                if ($(this).attr('value') == '') {
                    $(this).attr('value',$(this).data('defaultValue'));
                }
                $(this).removeClass('focusIn');
            })
    });

});