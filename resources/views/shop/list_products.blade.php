@extends('shop.app')
@section('content')
    <div id="shopify-section-collection-header" class="shopify-section">
        <div class="page-width page-content page-content--top">
            <header class="section-header section-header--flush">
                <h1 class="section-header__title">
                    Shop
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
                            <div id="CollectionSidebar" data-section-id="collection-sidebar" data-section-type="collection-sidebar" data-combine-tags="true" data-style="sidebar">
                                <div id="FilterDrawer" class="drawer drawer--left">
                                    <div class="drawer__contents">
                                        <div class="drawer__fixed-header">
                                            <div class="drawer__header appear-animation appear-delay-1">
                                                <div class="h2 drawer__title">
                                                    Filter
                                                </div>
                                                <div class="drawer__close">
                                                    <button type="button" class="drawer__close-button js-drawer-close">
                                                        <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-close" viewBox="0 0 64 64">
                                                            <path d="M19 17.61l27.12 27.13m0-27.12L19 44.74" />
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
                                                    <button type="button" class="collapsible-trigger collapsible-trigger-btn collapsible--auto-height tag-list__header" aria-controls="SidebarDrawer-1">
                                                        Shop
                                                        <span class="collapsible-trigger__icon collapsible-trigger__icon--open" role="presentation">
                                                        <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon--wide icon-chevron-down" viewBox="0 0 28 16">
                                                            <path d="M1.57 1.59l12.76 12.77L27.1 1.59" stroke-width="2" stroke="#000" fill="none" fill-rule="evenodd" />
                                                        </svg>
                                                    </span>
                                                    </button>
                                                    <div id="SidebarDrawer-1" class="collapsible-content collapsible-content--sidebar">
                                                        <div class="collapsible-content__inner">
                                                            <ul class="no-bullets tag-list">
                                                                <li class="tag--active">
                                                                    <a href="/collections/shop" class="no-ajax">
                                                                        Shop All Styles
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="/collections/new-arrivals" class="no-ajax">
                                                                        New Arrivals
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="/collections/sale" class="no-ajax">
                                                                        Sale
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="/collections/bridal-shop" class="no-ajax">
                                                                        Wedding Shop
                                                                    </a>
                                                                </li>
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
                                            <button type="button" class="collapsible-trigger collapsible-trigger-btn collapsible--auto-height tag-list__header" aria-controls="CollectionSidebar-1" style="padding-top: unset">
                                                Shop
                                                <span class="collapsible-trigger__icon collapsible-trigger__icon--open" role="presentation">
                                                <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon--wide icon-chevron-down" viewBox="0 0 28 16">
                                                    <path d="M1.57 1.59l12.76 12.77L27.1 1.59" stroke-width="2" stroke="#000" fill="none" fill-rule="evenodd" />
                                                </svg>
                                            </span>
                                            </button>
                                            <div id="CollectionSidebar-1" class="collapsible-content collapsible-content--sidebar" >
                                                <div class="collapsible-content__inner">
                                                    <ul class="no-bullets tag-list">
                                                        <li class="tag--active">
                                                            <a href="/collections/shop" class="no-ajax">
                                                                Shop All Styles
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="/collections/new-arrivals" class="no-ajax">
                                                                New Arrivals
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="/collections/sale" class="no-ajax">
                                                                Sale
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="/collections/bridal-shop" class="no-ajax">
                                                                Wedding Shop
                                                            </a>
                                                        </li>
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
                                <div id="CollectionSection" data-section-id="collection-template" data-section-type="collection-template">
                                    <div class="collection-filter">
                                        <div class="collection-filter__item collection-filter__item--drawer">
                                            <button type="button" class="js-drawer-open-collection-filters btn btn--tertiary" aria-controls="FilterDrawer">
                                                <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-filter" viewBox="0 0 64 64">
                                                    <path d="M48 42h10M48 42a5 5 0 1 1-5-5 5 5 0 0 1 5 5zM7 42h31M16 22H6M16 22a5 5 0 1 1 5 5 5 5 0 0 1-5-5zM57 22H26" />
                                                </svg>
                                                Filter
                                            </button>
                                        </div>

                                        <div class="collection-filter__item collection-filter__item--count small--hide">
                                            98 products
                                        </div>
                                    </div>
                                    <p class="medium-up--hide text-center" data-scroll-to>98 products</p>
                                    <div class="grid grid--uniform">
                                        <div class="grid__item grid-product small--one-half medium-up--one-quarter grid-product__has-quick-shop" data-aos="row-of-4" data-product-handle="theia-marley-jumpsuit-gold" data-product-id="6715933458620">
                                            <div class="grid-product__content">
                                                <!--Ryan commenting out the sale tag--><a href="/shop/product-details/" class="grid-product__link">
                                                    <div class="grid-product__image-mask">
                                                        <div class="image-wrap" style="height: 0; padding-bottom: 150.037509377%;">
                                                            <img class="grid-product__image lazyload" data-src="//cdn.shopify.com/s/files/1/0546/6033/products/8844181_2589_3_{width}x.jpg?v=1620315348" data-widths="[360, 540, 720, 900, 1080]" data-aspectratio="0.6665" data-sizes="auto" alt="">
                                                            <noscript>
                                                                <img class="grid-product__image lazyloaded" src="//cdn.shopify.com/s/files/1/0546/6033/products/8844181_2589_3_400x.jpg?v=1620315348" alt="">
                                                            </noscript>
                                                        </div>
                                                        <div class="grid-product__secondary-image small--hide"><img class="lazyload" data-src="//cdn.shopify.com/s/files/1/0546/6033/products/8844181_2589_2_{width}x.jpg?v=1620315347" data-widths="[360, 540, 720, 1000]" data-aspectratio="0.6665" data-sizes="auto" alt="">
                                                        </div>


                                                    </div>

                                                    <div class="grid-product__meta">

                                                        <div class="grid-product__title grid-product__title--body">
                                                            Marley Jumpsuit
                                                        </div>
                                                        <div class="grid-product__price">$748.00
                                                        </div>

                                                    </div>
                                                </a>
                                            </div>
                                            <div class="grid-product__colors grid-product__colors--6715933458620">
                                                <a href="/collections/shop/products/theia-marley-jumpsuit-gold?variant=39762920997052" class="color-swatch color-swatch--small color-swatch--gold" style="background-image: url(https://cdn.shopify.com/s/files/1/0546/6033/t/32/assets/gold_50x.png); background-color: gold;">
                                                    <span class="visually-hidden">Gold</span>
                                                </a>


                                            </div>
                                            <style data-shopify>
                                                .grid-product__colors--6715933458620 {
                                                    display: none;
                                                }
                                            </style>
                                        </div>
                                        <div class="grid__item grid-product small--one-half medium-up--one-quarter grid-product__has-quick-shop" data-aos="row-of-4" data-product-handle="theia-maika-cascading-ruffle-dress-white" data-product-id="6694898139324">
                                            <div class="grid-product__content">
                                                <!--Ryan hiding labels for now <div class="grid-product__tag grid-product__tag--custom">
                                             Sustainable
                   </div>-->        <a href="/shop/product-details/" class="grid-product__link">
                                                    <div class="grid-product__image-mask">
                                                        <div class="image-wrap" style="height: 0; padding-bottom: 150.0%;">
                                                            <img class="grid-product__image lazyload" data-src="//cdn.shopify.com/s/files/1/0546/6033/products/8814954_2295_1_{width}x.jpg?v=1620055699" data-widths="[360, 540, 720, 900, 1080]" data-aspectratio="0.6666666666666666" data-sizes="auto" alt="">
                                                            <noscript>
                                                                <img class="grid-product__image lazyloaded" src="//cdn.shopify.com/s/files/1/0546/6033/products/8814954_2295_1_400x.jpg?v=1620055699" alt="">
                                                            </noscript>
                                                        </div>
                                                        <div class="grid-product__secondary-image small--hide"><img class="lazyload" data-src="//cdn.shopify.com/s/files/1/0546/6033/products/8814954_2295_3_{width}x.jpg?v=1620055699" data-widths="[360, 540, 720, 1000]" data-aspectratio="0.6666666666666666" data-sizes="auto" alt="">
                                                        </div>


                                                    </div>

                                                    <div class="grid-product__meta">

                                                        <div class="grid-product__title grid-product__title--body">Maika
                                                            Cascading Ruffle Dress
                                                        </div>
                                                        <div class="grid-product__price">$795.00
                                                        </div>

                                                        <div class="grid-product__vendor">Sustainable</div>

                                                    </div>
                                                </a>
                                            </div>
                                            <div class="grid-product__colors grid-product__colors--6694898139324">
                                                <a href="/collections/shop/products/theia-maika-cascading-ruffle-dress-white?variant=39724995412156" class="color-swatch color-swatch--small color-swatch--white" style="background-image: url(https://cdn.shopify.com/s/files/1/0546/6033/t/32/assets/white_50x.png); background-color: white;">
                                                    <span class="visually-hidden">White</span>
                                                </a>


                                            </div>
                                            <style data-shopify>
                                                .grid-product__colors--6694898139324 {
                                                    display: none;
                                                }
                                            </style>
                                        </div>

                                    </div>
                                    <div class="pagination">
                                        <span class="page current">1</span>
                                        <span class="page">
                                        <a href="/collections/shop?page=2">2</a>
                                    </span>

                                        <span class="next">
                                        <a href="/collections/shop?page=2" title="Next">
                                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-chevron-right" viewBox="0 0 284.49 498.98">
                                                <path d="M35 498.98a35 35 0 0 1-24.75-59.75l189.74-189.74L10.25 59.75a35.002 35.002 0 0 1 49.5-49.5l214.49 214.49a35 35 0 0 1 0 49.5L59.75 488.73A34.89 34.89 0 0 1 35 498.98z" />
                                            </svg>
                                            <span class="icon__fallback-text">Next</span>
                                        </a>
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="application/ld+json">
    {
        "@context": "http://schema.org",
        "@type": "CollectionPage",



        "image": {
            "@type": "ImageObject",
            "height": 961,
            "url": "https:\/\/cdn.shopify.com\/s\/files\/1\/0546\/6033\/collections\/resort-2016-collection-grid_53abf468-9d1d-406e-bcb1-9f5662adb754_1440x.jpg?v=1620139942",
            "width": 1440
        },

        "name": "Shop"
    }
</script>
@endsection
