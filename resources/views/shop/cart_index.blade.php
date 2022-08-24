@extends('shop.app')
@section('content')
    <div class="page-width page-content" id="vue-cart">
        <header class="section-header text-center">
            <h1 class="section-header__title">{{ __('Cart') }}</h1>
            <div class="rte text-spacing"><p><a href='{{ route('shop.listProducts') }}'>{{ __('Back to shop') }}</a>
                </p>
            </div>
        </header>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <div class="cart__page" id="cart-index">
            <div class="cart__page-col">
                @if(empty($arrayCart))
                    <p>{{ __('Your cart is empty!') }}</p>
                @endif
                @if(!empty($arrayCart))
                    @foreach($arrayCart as $key => $item)
                        <div id="cart_{{@$item['id_dress']}}" class="cart__item">
                            <input type="checkbox" class="singleLocalProductCheckbox" data-key="{{$key}}"
                                   name="buyList">
                            <div class="cart__image">
                                <a href="/shop/product-details/{{$item['slug']}}"
                                   style="height: 0; padding-bottom: 150.0%;">
                                    <img id="image_{{@$item['id_dress']}}" class="lazyload"
                                         data-src="{{@$item['image']}}"
                                         data-widths="[180, 360, 540]"
                                         data-aspectratio=""
                                         data-sizes="auto"
                                         alt="Alondra T-Length Dress">
                                </a>
                            </div>
                            <div class="cart__item-details">
                                <div class="cart__item-title">
                                    <div id="name_{{@$item['id_dress']}}">{{ @$item['name'] }}</div>
                                    <div id="name_{{@$item['id_dress']}}">{{ __('Size') . ': ' . $item['size'] }}</div>
                                    <div id="name_{{@$item['id_dress']}}" style="display: flex">
                                        {{ __('Fabric Color') }}:
                                        <label style="font-weight: normal" class="variant__button-label"> {{ $item['color_name1'] }}</label>
                                    </div>
                                    <div id="name_{{@$item['id_dress']}}" style="display: flex">
                                        {{ __('Flower Color') }}:
                                        <label style="font-weight: normal" class="variant__button-label"> {{ $item['color_name2'] }}</label>
                                    </div>

                                </div>
                                <div class="cart__item-sub">
                                    <div>
                                        <div class="js-qty__wrapper">
                                            <label
                                                for="cart_updates_39724991643836:6a640714358ddd884a337230f47bc2da-page"
                                                class="hidden-label">Quantity</label>
                                            <input type="text"
                                                   id="number_{{ @$item['id_dress'] }}"
                                                   name="updates[]"
                                                   class="js-qty__num"
                                                   value="{{ @$item['number'] }}"
                                                   min="0"
                                                   pattern="[0-9]*"
                                                   data-id="39724991643836:6a640714358ddd884a337230f47bc2da" disabled
                                                   style="background-color: whitesmoke">
                                            <button type="button"
                                                    class="js-qty__adjust js-qty__adjust--minus"
                                                    aria-label="Reduce item quantity by one"
                                                    onclick="SubProduct({{ $key }})">
                                                <svg aria-hidden="true" focusable="false" role="presentation"
                                                     class="icon icon-minus" viewBox="0 0 20 20">
                                                    <path fill="#444"
                                                          d="M17.543 11.029H2.1A1.032 1.032 0 0 1 1.071 10c0-.566.463-1.029 1.029-1.029h15.443c.566 0 1.029.463 1.029 1.029 0 .566-.463 1.029-1.029 1.029z"/>
                                                </svg>
                                                <span class="icon__fallback-text" aria-hidden="true">&minus;</span>
                                            </button>
                                            <button type="button"
                                                    class="js-qty__adjust js-qty__adjust--plus"
                                                    aria-label="Increase item quantity by one"
                                                    onclick="AddProduct({{ $key }})">
                                                <svg aria-hidden="true" focusable="false" role="presentation"
                                                     class="icon icon-plus" viewBox="0 0 20 20">
                                                    <path fill="#444"
                                                          d="M17.409 8.929h-6.695V2.258c0-.566-.506-1.029-1.071-1.029s-1.071.463-1.071 1.029v6.671H1.967C1.401 8.929.938 9.435.938 10s.463 1.071 1.029 1.071h6.605V17.7c0 .566.506 1.029 1.071 1.029s1.071-.463 1.071-1.029v-6.629h6.695c.566 0 1.029-.506 1.029-1.071s-.463-1.071-1.029-1.071z"/>
                                                </svg>
                                                <span class="icon__fallback-text" aria-hidden="true">+</span>
                                            </button>
                                        </div>
                                        <br>
                                        <div style="cursor: pointer" class="cart__remove text-link"
                                             onclick="RemoveProduct({{ $key }})">
                                            {{ __('Xóa') }}
                                        </div>
                                    </div>

                                    <div class="cart__item-price-col text-right">
                                     <span class="cart__price" id="price_{{@$item['id_dress']}}">
                                        {{ __(':price$', ['price' => @number_format($item['price'] * @$item['number'])]) }}
                                      </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="cart__page-col" style="padding-top: 2%">
                <div data-discounts>
                </div>
                <div class="cart__item-sub cart__item-row">
                    <div>{{ __('Total') }}</div>
                    <div id="total_{{@$item['id_dress']}}"
                         style="float: right">{{ __(':price$', ['price' => @number_format($total)]) }}</div>
                </div>
                <div class="cart__item-row cart__checkout-wrapper">
                    <button type="button" id="buy_product" name="checkout" class="btn cart__checkout"
                            @if(@$total == 0)disabled="disable" @endif onclick="BuyCart()">
                        {{ __('Proceed to checkout') }}
                    </button>
                    <div class="additional-checkout-buttons">
                        <div class="dynamic-checkout__content" id="dynamic-checkout-cart"
                             data-shopify="dynamic-checkout-cart"></div>
                    </div>
                </div>

                <div class="cart__item-row text-center">
                    <small>
                    </small>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
    <script type='text/javascript' src='/js/jquery-migrate.min.js' id='jquery-migrate-js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {{--    <script type='text/javascript' src='/js/cart.js'></script>--}}
    <script>
        var checkedLocalProductIdList = [];
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function SubProduct(id_sub) {
            ajaxCart(id_add = null, id_sub, id_remove = null);
        }

        function AddProduct(id_add) {
            ajaxCart(id_add, id_sub = null, id_remove = null);
        }

        function RemoveProduct(id_remove) {
            ajaxCart(id_add = null, id_sub = null, id_remove);
        }

        function ajaxCart(id_add, id_sub, id_remove) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/shop/ajax-cart',
                type: 'post',
                data: {id_add: id_add, id_sub: id_sub, id_remove: id_remove},
                success: function (data) {
                    location.reload()
                }, error: function (e) {
                    console.log('Error');
                }
            })

        }

        $(document).on('click', 'input.singleLocalProductCheckbox', function () {
            var key = $(this).data('key');
            var index = checkedLocalProductIdList.indexOf(key);

            if ($(this).is(':checked')) {
                if (index < 0)
                    checkedLocalProductIdList.push(key);
            } else {
                if (index >= 0)
                    checkedLocalProductIdList.splice(index, 1);
            }
        });

        function BuyCart() {
            if (checkedLocalProductIdList.length == 0) {
                alert('Choose product to buy');
                return;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/shop/ajax-buy-cart',
                type: 'post',
                data: {productBuy: checkedLocalProductIdList},
                success: function (data) {
                    window.location.href = '/shop/cart-info';
                }, error: function (e) {
                    console.log('Error');
                }
            })

        }

        function number_format(number, decimals, dec_point, thousands_sep) {
            number = number * 1;//makes sure `number` is numeric value
            var str = number.toFixed(decimals ? decimals : 0).toString().split('.');
            var parts = [];
            for (var i = str[0].length; i > 0; i -= 3) {
                parts.unshift(str[0].substring(Math.max(0, i - 3), i));
            }
            str[0] = parts.join(thousands_sep ? thousands_sep : ',');
            return str.join(dec_point ? dec_point : '.');
        }

    </script>
@endsection
