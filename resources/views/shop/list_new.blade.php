@extends('shop.app')
@section('content')
    <div id="shopify-section-collection-header" class="shopify-section">
        <div class="page-width page-content page-content--top">
            <header class="section-header section-header--flush">
                <h1 class="section-header__title">
                    {{ $isStyle ? $styleDress->name : __('News') }}
                </h1>
            </header>
        </div>
        <div id="CollectionHeaderSection" data-section-id="collection-header" data-section-type="collection-header">
        </div>
    </div>

    <div id="CollectionAjaxResult" class="collection-content">
        <div id="CollectionAjaxContent">
            <div class="page-width">
                <div class="grid">
                    <div class="grid__item medium-up--one-fifth grid__item--sidebar">

                    </div>
                    <div class="grid__item medium-up--four-fifths grid__item--content">
                        <div id="shopify-section-collection-promotions" class="shopify-section">
                            <div data-section-id="collection-promotions" data-section-type="promo-grid"></div>
                        </div>
                        <div class="collection-grid__wrapper">
                            <div id="shopify-section-collection-template" class="shopify-section">
                                <div id="CollectionSection" data-section-id="collection-template"
                                     data-section-type="collection-template">
                                    <div class="collection-filter">
                                        <div class="collection-filter__item collection-filter__item--count small--hide" style="text-align: left">
                                            {{ $listNew->count() }} {{ __('News') }}
                                        </div>
                                    </div>
                                    <div class="grid grid--uniform">

                                        @foreach($listNew as $item)
                                            <div class="grid__item grid-product small--one-half medium-up--one-quarter grid-product__has-quick-shop"
                                                 data-aos="row-of-4" data-product-handle="theia-marley-jumpsuit-gold"
                                                 data-product-id="6715933458620">
                                                <div class="grid-product__content">
                                                    <a href="{{ route('newDetail', ['nameProduct' => $item->name]) }}" class="grid-product__link">
                                                        <div class="grid-product__image-mask">
                                                            <div class="image-wrap">
                                                                <img class="grid-product__image lazyload"
                                                                     data-src="{{ $item->img_path }}"
                                                                     data-widths="[360, 540, 720, 900, 1080]"
                                                                     data-aspectratio="0.6665" data-sizes="auto" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="grid-product__meta">
                                                            <div class="grid-product__title grid-product__title--body">
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="grid-product__meta">
                                                        <div class="grid-product__title grid-product__title--body">
                                                            {{ $item->name }}
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
