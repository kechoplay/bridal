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
            data: {id_add: id_add, id_sub: id_sub, id_remove: id_remove},
            success: function (data) {
            if(data){
                if(data.flagAction == 1){
                    $('#number_'+data.id).val(data.number);
                    $('#price_'+data.id).text(data.price);
                    $('#total_'+data.id).text(data.total);

                }
                if(data.flagAction == 2){
                    var number = $('#number_'+data.id).val();
                    $('#number_'+data.id).val(data.number);
                    $('#price_'+data.id).text(data.price);
                    $('#total_'+data.id).text(data.total);
                }
                if(data.flagAction == 3){
                    $('#cart_'+data.id).hide();
                    $('#total_'+data.id).text(data.total);
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
            data: {},
            success: function (data) {
                window.location.href = '/shop/cart-info';
            },error: function (e){
                console.log('Lỗi! Mua giỏ hàng');
            }
        })

    }
