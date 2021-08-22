$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function checkCode() {
    $('#error_voucher').text('');
    var code = $('#discount_code').val();
    $.ajax({
        url: '/shop/check-discount',
        type: 'post',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {code: code},
        success: function (data) {
            if(data.msg){
                $('#error_voucher').text(data.msg);
            }else if(data.discount){
                $('#voucher_show').show();
                $('#input_voucher').hide();
                $('#show_total_subvoucher').show();
                $('#name_voucher').text(code);
                var discount = '(-'+data.discount+'%)';
                $('#name_discount').text(discount);
                var totalOld = $('#value_total_old').val();
                var subTotal = (totalOld*data.discount)/100;
                $('#sub_voucher').text(number_format(subTotal));
                $('#show_apply_voucher').text(discount);
                $('#total_order').text(number_format(totalOld - subTotal));
                $('#voucher_code').val(code);
            }
        },error: function (e){
            console.log('Lỗi! thay đổi thất bại');
        }
    })

}

function deleteVoucher() {
    $('#voucher_show').hide();
    $('#show_total_subvoucher').hide();
    $('#input_voucher').show();
    var totalOld = $('#value_total_old').val();
    $('#sub_voucher').text(totalOld);
    $('#total_order').text(number_format(totalOld));
    $('#name_voucher').text('');
    $('#name_discount').text('');
    $('#show_apply_voucher').text('');
    $('#discount_code').val('');
    $('#voucher_code').val('');
}

function number_format(number,decimals,dec_point,thousands_sep) {
    number  = number*1;//makes sure `number` is numeric value
    var str = number.toFixed(decimals?decimals:0).toString().split('.');
    var parts = [];
    for ( var i=str[0].length; i>0; i-=3 ) {
        parts.unshift(str[0].substring(Math.max(0,i-3),i));
    }
    str[0] = parts.join(thousands_sep?thousands_sep:',');
    return str.join(dec_point?dec_point:'.');
}
