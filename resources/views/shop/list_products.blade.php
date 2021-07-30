@extends('shop.app')
@section('content')
    <div id="shopify-section-collection-header" class="shopify-section">
        <div class="page-width page-content page-content--top">
            <header class="section-header section-header--flush">
                <h1 class="section-header__title">
                    {{ $isStyle ? $styleDress->name : __('Shop') }}
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
                        <div id="shopify-section-collection-sidebar" class="shopify-section">
                            <div id="CollectionSidebar" data-section-id="collection-sidebar"
                                 data-section-type="collection-sidebar" data-combine-tags="true" data-style="sidebar">
                                <div id="FilterDrawer" class="drawer drawer--left">
                                    <div class="drawer__contents">
                                        <div class="drawer__fixed-header">
                                            <div class="drawer__header appear-animation appear-delay-1">
                                                <div class="h2 drawer__title">
                                                    Filter
                                                </div>
                                                <div class="drawer__close">
                                                    <button type="button" class="drawer__close-button js-drawer-close">
                                                        <svg aria-hidden="true" focusable="false" role="presentation"
                                                             class="icon icon-close" viewBox="0 0 64 64">
                                                            <path d="M19 17.61l27.12 27.13m0-27.12L19 44.74"/>
                                                        </svg>
                                                        <span class="icon__fallback-text">Close menu</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="drawer__scrollable appear-animation appear-delay-2">
                                            <ul class="no-bullets tag-list tag-list--active-tags"></ul>
                                            <div class="collection-sidebar__group--1524772785241">

                                                <div class="collection-sidebar__group">
                                                    <button type="button"
                                                            class="collapsible-trigger collapsible-trigger-btn collapsible--auto-height tag-list__header"
                                                            aria-controls="SidebarDrawer-1">
                                                        {{ $isStyle ? $styleDress->name : __('Shop') }}
                                                        <span
                                                            class="collapsible-trigger__icon collapsible-trigger__icon--open"
                                                            role="presentation">
                                                        <svg aria-hidden="true" focusable="false" role="presentation"
                                                             class="icon icon--wide icon-chevron-down"
                                                             viewBox="0 0 28 16">
                                                            <path d="M1.57 1.59l12.76 12.77L27.1 1.59" stroke-width="2"
                                                                  stroke="#000" fill="none" fill-rule="evenodd"/>
                                                        </svg>
                                                    </span>
                                                    </button>
                                                    <div id="SidebarDrawer-1"
                                                         class="collapsible-content collapsible-content--sidebar">
                                                        <div class="collapsible-content__inner">
                                                            <ul class="no-bullets tag-list">
                                                                <li class="tag--active">
                                                                    <a href="{{ route('shop.listProducts') }}"
                                                                       class="no-ajax">
                                                                        {{ __('Shop All Styles') }}
                                                                    </a>
                                                                </li>
                                                                @foreach($styles as $style)
                                                                    <li>
                                                                        <a href="{{ route('shop.listProductsStyle', ['style' => $style->slug]) }}"
                                                                           class="no-ajax">
                                                                            {{ $style->name }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="collection-sidebar small--hide">
                                    <ul class="no-bullets tag-list tag-list--active-tags"></ul>
                                    <div class="collection-sidebar__group--1524772785241">

                                        <div class="collection-sidebar__group">
                                            <button type="button"
                                                    class="collapsible-trigger collapsible-trigger-btn collapsible--auto-height tag-list__header"
                                                    aria-controls="CollectionSidebar-1" style="padding-top: unset">
                                                {{ $isStyle ? $styleDress->name : __('Shop') }}
                                                <span class="collapsible-trigger__icon collapsible-trigger__icon--open"
                                                      role="presentation">
                                                <svg aria-hidden="true" focusable="false" role="presentation"
                                                     class="icon icon--wide icon-chevron-down" viewBox="0 0 28 16">
                                                    <path d="M1.57 1.59l12.76 12.77L27.1 1.59" stroke-width="2"
                                                          stroke="#000" fill="none" fill-rule="evenodd"/>
                                                </svg>
                                            </span>
                                            </button>
                                            <div id="CollectionSidebar-1"
                                                 class="collapsible-content collapsible-content--sidebar">
                                                <div class="collapsible-content__inner">
                                                    <ul class="no-bullets tag-list">
                                                        <li class="tag--active">
                                                            <a href="{{ route('shop.listProducts') }}" class="no-ajax">
                                                                {{ __('Shop All Styles') }}
                                                            </a>
                                                        </li>
                                                        @foreach($styles as $style)
                                                            <li>
                                                                <a href="{{ route('shop.listProductsStyle', ['style' => $style->slug]) }}" class="no-ajax">
                                                                    {{ $style->name }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <style data-shopify>
                                @media screen and (min-width: 769px) {
                                    .collection-filter__item--drawer {
                                        display: none;
                                    }

                                    .collection-filter__item--count {
                                        text-align: left;
                                    }

                                    html[dir="rtl"] .collection-filter__item--count {
                                        text-align: right;
                                    }
                                }
                            </style>
                            <style data-shopify>
                                .collection-filter__sort-container {
                                    display: none;
                                }
                            </style>
                        </div>
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
                                        <div class="collection-filter__item collection-filter__item--drawer">
                                            <button type="button"
                                                    class="js-drawer-open-collection-filters btn btn--tertiary"
                                                    aria-controls="FilterDrawer">
                                                <svg aria-hidden="true" focusable="false" role="presentation"
                                                     class="icon icon-filter" viewBox="0 0 64 64">
                                                    <path
                                                        d="M48 42h10M48 42a5 5 0 1 1-5-5 5 5 0 0 1 5 5zM7 42h31M16 22H6M16 22a5 5 0 1 1 5 5 5 5 0 0 1-5-5zM57 22H26"/>
                                                </svg>
                                                Filter
                                            </button>
                                        </div>
                                        <div class="collection-filter__item collection-filter__item--count small--hide ">
                                            {{ $dress->count() }} {{ __('sản phẩm') }}
                                        </div>
                                        <form class="col-sm-4" action="" method="GET" style="margin-bottom: 10px">
                                            <div class="search">
                                                <div class="form-group has-feedback">
                                                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                                    <input name="keySearch" type="text" class="form-control" value="{{@$search}}"
                                                           placeholder="{{ __('Tìm kiếm sản phẩm') }}" aria-controls="table-question">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <p class="medium-up--hide text-center" data-scroll-to>{{ $dress->count() }} {{ __('sản phẩm') }}</p>
                                    <div class="grid grid--uniform">
                                        @foreach($dress as $dr)
                                            <div class="grid__item grid-product small--one-half medium-up--one-quarter grid-product__has-quick-shop"
                                                data-aos="row-of-4" data-product-handle="theia-marley-jumpsuit-gold"
                                                data-product-id="6715933458620">
                                                <div class="grid-product__content">
                                                    <a href="{{ route('shop.productDetails', ['nameProduct' => $dr->slug]) }}" class="grid-product__link">
                                                        <div class="grid-product__image-mask">
                                                            <div class="image-wrap"
                                                                 style="height: 0; padding-bottom: 150.037509377%;">
                                                                <img class="grid-product__image lazyload"
                                                                     data-src="{{ json_decode($dr->img_path)[0] }}"
                                                                     data-widths="[360, 540, 720, 900, 1080]"
                                                                     data-aspectratio="0.6665" data-sizes="auto" alt="">
                                                            </div>
                                                            @if(!empty(json_decode($dr->img_path)[1]))
                                                            <div class="grid-product__secondary-image small--hide">
                                                                <img class="lazyautosizes lazyloaded"
                                                                     data-widths="[360, 540, 720, 1000]"
                                                                     data-aspectratio="0.6665"
                                                                     data-sizes="auto"
                                                                     srcset="{{ json_decode($dr->img_path)[1] }}">
                                                            </div>
                                                            @endif
                                                        </div>

                                                        <div class="grid-product__meta">
                                                            <div class="grid-product__title grid-product__title--body">
                                                                {{ $dr->name }}
                                                            </div>
                                                            <div class="grid-product__price"><span class="visually-hidden" data-open-accessibility-text-original="13.6px" style="font-size: 13.6px;">Regular price</span>
                                                                @if($dr->sale_price != 0)
                                                                <span class="grid-product__price--original" data-open-accessibility-text-original="13.6px" style="font-size: 13.6px;">{{ @number_format($dr->price) . __('VNĐ') }}</span>
                                                                <span class="visually-hidden" data-open-accessibility-text-original="13.6px" style="font-size: 13.6px;"></span>{{ @number_format($dr->sale_price) . __('VNĐ') }}
                                                                @endif
                                                                @if($dr->sale_price == 0)
                                                                    {{ @number_format($dr->price) . __('VNĐ') }}
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </a>
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
