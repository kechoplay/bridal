    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function SubProduct(id_sub) {
        ajaxCart(id_add=null,id_sub,id_remove=null);
    }
    function AddProduct(id_add) {
        ajaxCart(id_add,id_sub=null,id_remove=null);
    }
    function RemoveProduct(id_remove) {
        ajaxCart(id_add=null,id_sub=null,id_remove);
    }
    function ajaxCart(id_add,id_sub,id_remove) {
        $.ajax({
            url: '/shop/ajax-cart',
            type: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {id_add: id_add, id_sub: id_sub, id_remove: id_remove},
            success: function (data) {
            if(data){
                if(data.flagAction == 1){
                    $('#number_'+data.id).val(data.number);
                    var price= number_format(data.price)+' VNĐ';
                    var total= number_format(data.total)+' VNĐ';
                    $('#price_'+data.id).text(price);
                    $('#total_'+data.id).text(total);

                }
                if(data.flagAction == 2){
                    if(data.number == 0){
                        $('#cart_'+data.id).hide();
                    }
                    console.log('total'+data.total);
                    $('#number_'+data.id).val(data.number);
                    var price2= number_format(data.price)+' VNĐ';
                    var total2= number_format(data.total)+' VNĐ';
                    $('#price_'+data.id).text(price2);
                    $('#total_'+data.id).text(total2);
                    if(data.total == 0){
                        $('#buy_product').attr('disabled', true);;
                    }

                }
                if(data.flagAction == 3){
                    $('#cart_'+data.id).hide();
                    var total3= number_format(data.total)+' VNĐ';
                    $('#total_'+data.id).text(total3);
                    if(data.total == 0){
                        $('#buy_product').attr('disabled', true);;
                    }
                }
            }
            },error: function (e){
                console.log('Lỗi! thay đổi thất bại');
            }
        })

    }

    function BuyCart() {
        $.ajax({
            url: '/shop/ajax-buy-cart',
            type: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {},
            success: function (data) {
                window.location.href = '/shop/cart-info';
            },error: function (e){
                console.log('Lỗi! Mua giỏ hàng');
            }
        })

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
