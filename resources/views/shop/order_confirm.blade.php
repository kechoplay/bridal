<!DOCTYPE html>
<html lang="en" dir="ltr"
      class="no-js windows chrome desktop page--no-banner page--logo-main page--show page--show card-fields">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, height=device-height, minimum-scale=1.0, user-scalable=0">
    <meta name="referrer" content="origin">

    <title> Shipping - THEIA - Checkout</title>

    <meta data-browser="chrome" data-browser-major="91">
    <meta
        data-body-font-family="-apple-system, BlinkMacSystemFont, &#39;Segoe UI&#39;, Roboto, Helvetica, Arial, sans-serif, &#39;Apple Color Emoji&#39;, &#39;Segoe UI Emoji&#39;, &#39;Segoe UI Symbol&#39;"
        data-body-font-type="system">

    <meta id="shopify-digital-wallet" name="shopify-digital-wallet" content="/5466033/digital_wallets/dialog">

    <meta name="shopify-checkout-api-token" content="7b2241810495641f0e2a45472fe65e51">

    <meta name="shopify-checkout-authorization-token" content="503472f5cf7bfe5c12eaf41128aab083"/>

    <meta id="shopify-regional-checkout-config" name="shopify-regional-checkout-config"
          content="{&quot;bugsnag&quot;:{&quot;checkoutJSApiKey&quot;:&quot;717bcb19cf4dd1ab6465afcec8a8de02&quot;,&quot;endpoint&quot;:&quot;https:\/\/notify.bugsnag.com&quot;}}"/>
    <meta id="autocomplete-service-sandbox-url" name="autocomplete-service-sandbox-url"
          content="https://checkout.shopify.com/5466033/sandbox/autocomplete_service?locale=en"/>
    <meta property="og:title" content="Purchase Allison Dress and 1 other item"/>
    <meta property="og:image"
          content="https://cdn.shopify.com/s/files/1/0546/6033/products/8814495_2518_1_1024x1024.jpg?v=1621350913"/>


    <!--[if lt IE 9]>
    <link rel="stylesheet" media="all"
          href="//cdn.shopify.com/app/services/5466033/assets/122321436860/checkout_stylesheet/v2-ltr-edge-1861300a509749f47020b0e786604d3f-2145/oldie"/>
    <![endif]-->

    <!--[if gte IE 9]><!-->
    <link rel="stylesheet"
          href="//cdn.shopify.com/app/services/5466033/assets/122321436860/checkout_stylesheet/v2-ltr-edge-1861300a509749f47020b0e786604d3f-2145"
          media="all"/>

    <!--<![endif]-->


    <script type="text/javascript">
        Shopify = window.Shopify || {};
        ShopifyExperiments = window.ShopifyExperiments || {};
        ShopifyPay = window.ShopifyPay || {};

        if (window.opener) {
            window.opener.postMessage(JSON.stringify({"current_checkout_page": "\/checkout\/shipping"}), "*");
        }

        Shopify.Checkout = Shopify.Checkout || {};
        Shopify.Checkout.Autocomplete = true;
        Shopify.Checkout.apiHost = "theia.myshopify.com";
        Shopify.Checkout.assetsPath = "\/\/cdn.shopify.com\/shopifycloud\/shopify";
        Shopify.Checkout.DefaultAddressFormat = "{firstName}{lastName}_{company}_{address1}_{address2}_{city}_{country}{province}{zip}_{phone}";
        Shopify.Checkout.geolocatedAddress = {"lat": 21.031299999999987, "lng": 105.85160000000002};
        Shopify.Checkout.i18n = {
            "orders": {
                "order_updates": {"title": "Order updates"},
                "complete_order": "Complete order",
                "pay_now": "Pay now"
            },
            "shipping_line": {
                "pickup_in_store_label": "Pickup",
                "no_pickup_location": "Your order isn't available for pickup. Enter a shipping address.",
                "shipping_label": "Shipping",
                "shipping_default_value": "Calculated at next step",
                "shipping_free_value": "Free"
            },
            "continue_button": {
                "continue_to_shipping_method": "Continue to shipping",
                "continue_to_payment_method": "Continue to payment"
            },
            "qr_code": {
                "title": "Track on your phone",
                "subtitle": "Scan the code with your phone’s camera to track with Shop.",
                "send_link_to_phone": "Or send a link to your phone"
            }
        };
        Shopify.Checkout.locale = "en";
        Shopify.Checkout.normalizedLocale = "en";
        Shopify.Checkout.page = "show";
        Shopify.Checkout.releaseStage = "production";
        Shopify.Checkout.deployStage = "production";
        Shopify.Checkout.requiresShipping = true;
        Shopify.Checkout.step = "shipping_method";
        Shopify.Checkout.token = "5464259f51d525a1ff3fd42462ff4067";
        Shopify.Checkout.currency = "USD";
        Shopify.Checkout.estimatedPrice = 5268.00;
        Shopify.Checkout.dynamicCheckoutPaymentInstrumentsConfig = {
            "paymentInstruments": {
                "accessToken": "7b2241810495641f0e2a45472fe65e51",
                "amazonPayConfig": null,
                "applePayConfig": {
                    "shopId": 5466033,
                    "countryCode": "US",
                    "currencyCode": "USD",
                    "merchantCapabilities": ["supports3DS"],
                    "merchantId": "gid:\/\/shopify\/Shop\/5466033",
                    "merchantName": "THEIA",
                    "requiredBillingContactFields": ["postalAddress", "email", "phone"],
                    "requiredShippingContactFields": ["postalAddress", "email", "phone"],
                    "shippingType": "shipping",
                    "supportedNetworks": ["visa", "masterCard", "amex", "discover", "jcb", "elo"],
                    "total": {"type": "pending", "label": "THEIA", "amount": "1.00"}
                },
                "checkoutConfig": {"domain": "theiacouture.com", "shopId": 5466033},
                "shopifyPayConfig": {
                    "domain": "theiacouture.com",
                    "shopId": 5466033,
                    "accelerated": false,
                    "supportsLogin": true,
                    "experimentTestGroup": false,
                    "merchantId": "gid:\/\/shopify\/Shop\/5466033"
                },
                "currency": "USD",
                "googlePayConfig": {
                    "dynamicBuyFlow": true,
                    "iframeSrc": "https:\/\/checkout.shopify.com\/5466033\/sandbox\/costanza_google_pay_iframe",
                    "currency": "USD",
                    "countryCode": "US",
                    "capabilities": {
                        "environment": "PRODUCTION",
                        "allowedPaymentMethods": [{
                            "type": "CARD",
                            "parameters": {
                                "allowedAuthMethods": ["PAN_ONLY", "CRYPTOGRAM_3DS"],
                                "allowedCardNetworks": ["VISA", "MASTERCARD", "AMEX", "DISCOVER", "JCB"],
                                "allowPrepaidCards": false,
                                "billingAddressRequired": true,
                                "billingAddressParameters": {"format": "FULL", "phoneNumberRequired": true}
                            },
                            "tokenizationSpecification": {
                                "type": "PAYMENT_GATEWAY",
                                "parameters": {"gateway": "shopify", "gatewayMerchantId": "5466033"}
                            }
                        }],
                        "existingPaymentMethodRequired": true,
                        "merchantInfo": {
                            "merchantId": "16708973830884969730",
                            "merchantName": "THEIA",
                            "merchantOrigin": "theiacouture.com",
                            "authJwt": "eyJ0eXAiOiJKV1QiLCJhbGciOiJFUzI1NiJ9.eyJtZXJjaGFudElkIjoiMTY3MDg5NzM4MzA4ODQ5Njk3MzAiLCJtZXJjaGFudE9yaWdpbiI6InRoZWlhY291dHVyZS5jb20iLCJpYXQiOjE2MjMyNTkxNTR9.5zNxeWPU0iufdOg3O0LHV2X7OWxo3RbCUIlhxNiLRZjX_rdXMHU50W5F4rFTknjyaU6vX9V1kGLrFSdXR1xiXQ"
                        },
                        "emailRequired": true,
                        "shippingAddressRequired": true,
                        "shippingAddressParameters": {"phoneNumberRequired": true, "allowedCountryCodes": ["CA", "US"]}
                    }
                },
                "locale": "en",
                "paypalConfig": {
                    "domain": "theiacouture.com",
                    "environment": "production",
                    "merchantId": "W666G7KDF5YHN",
                    "buttonVersion": "v3",
                    "venmoSupported": true,
                    "locale": "en_US",
                    "shopId": 5466033
                },
                "offsiteConfigs": null,
                "supportsDiscounts": true,
                "supportsGiftCards": false,
                "checkoutDisabled": false
            }
        };
        Shopify.Checkout.applePayConfig = null;
        Shopify.Checkout.hasSellingPlan = false;
        Shopify.Checkout.customer = {
            "customer_id": 5275849294012,
            "email": "linhfd@gmail.com",
            "first_name": "Duy",
            "last_name": "Nguyen"
        };
        Shopify.Checkout.requiresConfirmationStep = false;
        ShopifyExperiments.AutocompleteServiceApiHost = "https:\/\/autocomplete-service.shopifycloud.com";
        ShopifyExperiments.googleAutocompleteAllCountries = false;

        ShopifyPay.enabled = true;
        ShopifyPay.apiHost = "shop.app\/pay";
        ShopifyPay.apiToken = "c1dJV05ta1VNM2Y0Z1p5d1d5bG4zcjh0akxhSXRhKzdJa2JSenNGektOendlSzZMbktmWHZBeEV6ZVM3QXJzei0tZG11SXI4bWtTdUJCWHlpZGU1ZS9jQT09--4dab7559deb3bcb9f884a30ba58434b0faf15b1b";
        ShopifyPay.transactionParams = "checkout_secret=503472f5cf7bfe5c12eaf41128aab083\u0026encrypted_params=bTh5Wlg4Tm05clNoTVZRQkdBNWY0LzdsbEJpcmw0Yk5NTXhVd2FLZjdoL0RlaHBneVVQZmd1bnNvZ092bVZTUERyRTNzNDJBK01CejNIYWJWMU5CNW4rcEJ5bERuMkNKUXZ0aWU1b093MzFaUzZyMGR6bDVua3VyVW1LcG1hSzBMUWc4eTRlS3JpbjR6V1hIT2U4ZzFwclZSNWNNQTYybkkrMFNqTXZ2WDRJSmVkZURrRjdoMFlQVVNlbERCbHA4dmczZ0piNzZheEt3d2t2QnJrMUdSK0F6MDVWeDFUK2J3RnlhcWlVbCtzRkN3eld3MWJsUnkyK2RMODIxN3YyYi90Mng0eFd0a2Ryc2M5VVlPN0phQnZZVkFOODQwMHlQMXduVmJtYWx1TnhlMC8vR2tuRXYrMFJ0Y1U4NzhZeHBERDh2Qys3UWgycXdHNzJHTTl0azJ2dXVzK2ZyYUNoQ3Jsa0NkMlFhaEQ4T3VRVlQ0S3A4RnRzUytyOEYxMUF5MkRjalRDdWQ3Qlp5MHdtc1NVZ2grNEl1MEV4RXJXUWdHOUw2REdQNEhOaGJ5ZHJUa3g0YzFFNjFOZE16aUpoSzhNRG5sUiszTnlIcUd6UGtsUW1Ka2RqN2txS0pMcFNKVHp6N0FkcllHVmpUa3ZVdXM3WW1oTEtCMHFReU00UU9VS3VzWS9BakQ2RE01ZWJnclQ1eVJWUGdsVG5TR1ZXT0lPa0dsS1ZXSFprYmtib0RPRnp6emNjZEZRSklvZGU2YjBoUDNFMUtMcHpaUUN0dWVNTTEvc3U1ZTFod1ppTlh2OGdjQ1huRURGOExOZkNzTXlZaTQzcFdsR0NxYlU1czNEWHQ3Mno0Uy9EcDZpRUtONzNpcm5wSENQOUpTcWU2VDhMVklhQVJ0aHlHTVpvemllbDVoYlBlNXVPbE43TmkrWmxIaThFR3R5aGM1ckY4cS9MODN2QXU1MXlLUjNWTmNybTBlUmRNQXNqaTFjRmtvN0JrR0VPUy9PK3pHZENGV1lLZHBZemljeXk0NVJYczlHTzJXRjkwTWdOSTY0LzFreXJzVGU2RndJYmhhc3Y1Y3dIaVRLbHRvRGk1Nm1MUHA3eDdBM2MxWmkvMWYwaGs1ZkNMdTA3dnlJNC9vWTZ2N24rVkdkMTgxRml4M0xNRDhWc0V3TGJXWU9zcHlrR0I2ZG1mMXNxME55UVdTZDI2MS9odFdRPT0tLWtNL0YwVDFmQk5JNitNUlpYdnRBWnc9PQ%3D%3D--cc95dd1368d4fb80cd6f73f78d442bcc25166cbb\u0026locale=en";

        Shopify.houseNumberNudgeCountries = ["AT", "BR", "DE", "IT", "MX", "NL", "ES", "CH"];
        Shopify.autocompleteEnabledCountries = ["AU", "AT", "BE", "BR", "CA", "DK", "FR", "DE", "HK", "IN", "IT", "JP", "LU", "NL", "NZ", "SG", "ES", "CH", "US"];
        Shopify.checkoutEnablePerformanceEvents = false;
    </script>


    <script
        src="//cdn.shopify.com/app/services/5466033/javascripts/checkout_countries/122321436860/en/countries-0dad70fdb0537c8f0df1b18a5e7654ef600c2dd8-0dad70fdb0537c8f0df1b18a5e7654ef600c2dd8-1619810820-e1413a830127c0c2806dff1ce9313204d837ef12.js?version=edge"
        crossorigin="anonymous"></script>

    <script
        src="//cdn.shopify.com/shopifycloud/shopify/assets/checkout-f6c50eb7542d508f24cf9642bbe36d0f7e66d873622781b27c406c64c1d74622.js"
        crossorigin="anonymous"></script>


    <script
        src="//cdn.shopify.com/shopifycloud/shopify/assets/shopify_pay-41f946fc7a5e408efc881b69d3e544adcaa2b7ee02b092b587318a5a1d03e001.js"
        crossorigin="anonymous"></script>


    <script>window.ShopifyPaypalV4VisibilityTracking = true;</script>


    <script type="text/javascript">
        Shopify.clientAttributesCollectionEventName =
            "client_attributes_checkout";
        var DF_CHECKOUT_TOKEN = "5464259f51d525a1ff3fd42462ff4067";
    </script>


    <script id="__st">var __st = {
            "a": 5466033,
            "offset": -14400,
            "reqid": "0a053861-f177-46b5-9860-b8fb4377415d",
            "pageurl": "theiacouture.com\/5466033\/checkouts\/5464259f51d525a1ff3fd42462ff4067?previous_step=contact_information\u0026step=shipping_method",
            "u": "5819e4aa6ad4",
            "t": "checkout",
            "offsite": 1
        };</script>


</head>
<body>
<a href="#main-header" class="skip-to-content">
    Skip to content
</a>


<header class="banner" data-header role="banner" style="padding-top: 1em !important;">
    <div class="wrap">

        <a class="logo logo--left" href="{{ route('shop.index') }}"><span class="logo__text heading-1">THEIA</span></a>

        <h1 class="visually-hidden">
            Shipping
        </h1>


    </div>
</header>

<aside role="complementary">
    <button class="order-summary-toggle order-summary-toggle--show shown-if-js" aria-expanded="false"
            aria-controls="order-summary" data-drawer-toggle="[data-order-summary]">
    <span class="wrap">
      <span class="order-summary-toggle__inner">
        <span class="order-summary-toggle__icon-wrapper">
          <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__icon">
            <path
                d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z"/>
          </svg>
        </span>
        <span class="order-summary-toggle__text order-summary-toggle__text--show">
          <span>Hiện sản phẩm đặt hàng</span>
          <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown"
               fill="#000"><path
                  d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z"/></svg>
        </span>
        <span class="order-summary-toggle__text order-summary-toggle__text--hide">
          <span>Ârn sản phẩm đặt hàng</span>
          <svg width="11" height="7" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle__dropdown"
               fill="#000"><path
                  d="M6.138.876L5.642.438l-.496.438L.504 4.972l.992 1.124L6.138 2l-.496.436 3.862 3.408.992-1.122L6.138.876z"/></svg>
        </span>
        <dl class="order-summary-toggle__total-recap total-recap" data-order-summary-section="toggle-total-recap">
          <dt class="visually-hidden"><span>Sale price</span></dt>
          <dd>
            <span class="order-summary__emphasis total-recap__final-price skeleton-while-loading"
                  data-checkout-payment-due-target="573553">$5,735.53</span>
            </dd>
        </dl>
      </span>
      </span>
    </button>
</aside>


<div class="content" data-content>
    <div class="wrap">
        <div class="main" style="padding-top: 0.8em !important;">
            <header class="main__header" role="banner" style="padding-top: 1em !important;">

                <a class="logo logo--left" href="{{ route('shop.index') }}"><span
                        class="logo__text heading-1">THEIA</span></a>

                <div class="shown-if-js" data-alternative-payments>
                </div>


            </header>
            <main class="main__content" role="main" style="padding-top: 0.8em !important;">

                <iframe srcdoc="&lt;script&gt;(function() {
  Shopify = window.Shopify || {};
  Shopify.Checkout = window.Shopify.Checkout || {};
  Shopify.Checkout.whitelistedUrls = [&quot;https:\/\/theia.myshopify.com&quot;,&quot;https:\/\/www.theiacouture.com&quot;,&quot;https:\/\/theiacouture.com&quot;,&quot;https:\/\/checkout.shopify.com&quot;];
  Shopify.Checkout.whitelistedHostSuffixes = [&quot;.shopifypreview.com&quot;];
})();
&lt;/script&gt;
&lt;script&gt;!function(){var e=function(e){var t={exports:{}};return e.call(t.exports,t,t.exports),t.exports},o=function(){function n(e,t){for(var i=0;i&lt;t.length;i++){var n=t[i];n.enumerable=n.enumerable||!1,n.configurable=!0,&quot;value&quot;in n&amp;&amp;(n.writable=!0),Object.defineProperty(e,n.key,n)}}return function(e,t,i){return t&amp;&amp;n(e.prototype,t),i&amp;&amp;n(e,i),e}}(),s=function(e,t){if(!(e instanceof t))throw new TypeError(&quot;Cannot call a class as a function&quot;)},t=function(e){return e&amp;&amp;e.__esModule?e:{&quot;default&quot;:e}},a=e(function(e,t){&quot;use strict&quot;;function i(e){if(&quot;string&quot;!=typeof e)return!1;var t=e.indexOf(s);if(e.substring(0,t)!==o)return!1;var i=e.substring(t+1);return JSON.parse(i)}function n(e){return&quot;&quot;+o+s+JSON.stringify(e)}function r(t){if(!t||void 0===t)return!1;try{return Shopify.Checkout.whitelistedUrls&amp;&amp;-1!==Shopify.Checkout.whitelistedUrls.indexOf(t)||Shopify.Checkout.whitelistedHostSuffixes&amp;&amp;0&lt;Shopify.Checkout.whitelistedHostSuffixes.filter(function(e){return new RegExp(&quot;(.*)&quot;+e+&quot;$&quot;).test(t)}).length}catch(e){return window.ErrorReporter&amp;&amp;window.ErrorReporter.notify(new Error(e.message),&quot;sandboxed_messages.js - verifiedOrigin&quot;),!1}}Object.defineProperty(t,&quot;__esModule&quot;,{value:!0}),t.parseMessage=i,t.buildMessage=n,t.verifiedOrigin=r;var o=&quot;shopify_sandboxed_message&quot;,s=&quot;:&quot;}),i=e(function(e,t){&quot;use strict&quot;;Object.defineProperty(t,&quot;__esModule&quot;,{value:!0});var i=function(){function e(){var n=this;s(this,e),this.calls=[],window.ga=function(){for(var e=arguments.length,t=Array(e),i=0;i&lt;e;i++)t[i]=arguments[i];return n.gaCall(t)}}return o(e,[{key:&quot;gaCall&quot;,value:function i(e){var t=this;this.calls.push(e),clearTimeout(this.timeout),this.timeout=setTimeout(function(){0&lt;t.calls.length&amp;&amp;t.sendMessage()},0)}},{key:&quot;listen&quot;,value:function n(){var t=this;window.addEventListener(&quot;message&quot;,function(e){return t.receiveMessage(e)},!1)}},{key:&quot;sendMessage&quot;,value:function t(){window.parent.postMessage({type:&quot;analytics&quot;,calls:this.calls},this.origin),this.calls=[]}},{key:&quot;receiveMessage&quot;,value:function r(e){if((0,a.verifiedOrigin)(e.origin)&amp;&amp;e.source===window.parent&amp;&amp;e.data&amp;&amp;&quot;checkout_context&quot;===e.data.type){this.origin=e.origin,window.Shopify=e.data.Shopify,window.__st=e.data.__st;try{window.additionalScripts()}catch(t){console.error(&quot;User script error: &quot;,t)}}}}]),e}();t[&quot;default&quot;]=i});e(function(){&quot;use strict&quot;;(new(t(i)[&quot;default&quot;])).listen()})}(&quot;undefined&quot;!=typeof global?global:&quot;undefined&quot;!=typeof window&amp;&amp;window);
window.additionalScripts = function () {

};
&lt;/script&gt;
" src="https://checkout.shopify.com/5466033/sandbox/google_analytics_iframe"
                        onload="this.setAttribute(&#39;data-loaded&#39;, true)"
                        sandbox="allow-scripts allow-same-origin" id="google-analytics-sandbox" tabIndex="-1"
                        class="visually-hidden" style="display:none" aria-hidden="true"></iframe>


                <div class="step" data-step="shipping_method" data-last-step="false">
                    <form class="edit_checkout" data-shipping-method-form="true" data-ignore-floating-label="true"
                          action="/5466033/checkouts/5464259f51d525a1ff3fd42462ff4067" accept-charset="UTF-8"
                          method="post"><input type="hidden" name="_method" value="patch"/><input type="hidden"
                                                                                                  name="authenticity_token"
                                                                                                  value="GrpCDcVh795gKuALyXCC7c5lfhGNLNmvby7JAPsDdaa-HmjolKy8wWCbV4Ke3Oo2ZULsUHqp-hdirfd-qMte8A"/>

                        <input type="hidden" name="previous_step" id="previous_step" value="shipping_method"/>
                        <input type="hidden" name="step" value="payment_method"/>


                        <div class="step__sections">
                            <div class="section">
                                <div class="content-box">
                                    <div role="table" class="content-box__row content-box__row--tight-spacing-vertical">
                                        <div role="row" class="review-block">
                                            <div class="review-block__inner">
                                                <div role="rowheader" class="review-block__label">
                                                    Tên:
                                                </div>
                                                <div role="cell" class="review-block__content">
                                                    <bdo dir="ltr">Phạm Duy Linh</bdo>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="row" class="review-block">
                                            <div class="review-block__inner">
                                                <div role="rowheader" class="review-block__label">
                                                    Email đặt:
                                                </div>
                                                <div role="cell" class="review-block__content">
                                                    <bdo dir="ltr">linhfd@gmail.com</bdo>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="row" class="review-block">
                                            <div class="review-block__inner">
                                                <div role="rowheader" class="review-block__label">
                                                    Địa chỉ:
                                                </div>
                                                <div role="cell" class="review-block__content">
                                                    <address class="address address--tight">
                                                        448 9th Street, #105, fdvfdv dfvf dscsd fdvfdvfdBrooklyn NY 11215, United States
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="row" class="review-block">
                                            <div class="review-block__inner">
                                                <div role="rowheader" class="review-block__label">
                                                   SĐT:
                                                </div>
                                                <div role="cell" class="review-block__content">
                                                    <bdo dir="ltr">036877272727</bdo>
                                                </div>
                                            </div>
                                        </div>
                                        <div role="row" class="review-block">
                                            <div class="review-block__inner">
                                                <div role="rowheader" class="review-block__label">
                                                    Ghi chú:
                                                </div>
                                                <div role="cell" class="review-block__content">
                                                    <address class="address address--tight">
                                                        448 9th Street, #105, fdvfdv dfvf dscsd fdvfdvfdBrooklyn NY 11215, United States
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <div class="step__footer row" data-step-footer style="text-align: center">
                                <a class="step__footer__previous-link" href="{{route('shop.listProducts')}}"><svg focusable="false" aria-hidden="true" class="icon-svg icon-svg--color-accent icon-svg--size-10 previous-link__icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10"><path d="M8 1L7 0 3 4 2 5l1 1 4 4 1-1-4-4"/></svg><span class="step__footer__previous-link-content"><button class="btn btn-primary" style="background-color: #a7a7a1;color: black; padding: 5px !important;">Quay lại mua sắm</button></span></a>
                            </div>
                    </form>
                </div>
            </main>
            <footer class="main__footer" role="contentinfo">
{{--                <ul class="policy-list" role="list">--}}
{{--                    <li class="policy-list__item ">--}}
{{--                        <a aria-haspopup="dialog" data-modal="policy-refund-policy" data-title-text="Refund policy"--}}
{{--                           data-close-text="Close" data-iframe="true"--}}
{{--                           href="/5466033/policies/refund-policy.html?locale=en">Refund policy</a>--}}
{{--                    </li>--}}
{{--                    <li class="policy-list__item ">--}}
{{--                        <a aria-haspopup="dialog" data-modal="policy-privacy-policy" data-title-text="Privacy policy"--}}
{{--                           data-close-text="Close" data-iframe="true"--}}
{{--                           href="/5466033/policies/privacy-policy.html?locale=en">Privacy policy</a>--}}
{{--                    </li>--}}
{{--                    <li class="policy-list__item ">--}}
{{--                        <a aria-haspopup="dialog" data-modal="policy-terms-of-service"--}}
{{--                           data-title-text="Terms of service" data-close-text="Close" data-iframe="true"--}}
{{--                           href="/5466033/policies/terms-of-service.html?locale=en">Terms of service</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}


            </footer>
        </div>
        <aside class="sidebar" role="complementary" style="padding-top: 1em !important;">
            <div class="sidebar__header">

                <a class="logo logo--left" href="{{ route('shop.index') }}"><span
                        class="logo__text heading-1">THEIA</span></a>

                <h1 class="visually-hidden">
                    Shipping
                </h1>


            </div>
            <div class="sidebar__content">
                <div id="order-summary" class="order-summary order-summary--is-collapsed" data-order-summary>
                    <h2 class="visually-hidden-if-js">Tổng đơn đặt hàng</h2>

                    <div class="order-summary__sections">
                        <div class="order-summary__section order-summary__section--product-list">
                            <div class="order-summary__section__content">
                                <table class="product-table">
                                    <caption class="visually-hidden">Giỏ hàng</caption>
                                    <thead class="product-table__header">
                                    <tr>
                                        <th scope="col"><span class="visually-hidden">Product image</span></th>
                                        <th scope="col"><span class="visually-hidden">Description</span></th>
                                        <th scope="col"><span class="visually-hidden">Quantity</span></th>
                                        <th scope="col"><span class="visually-hidden">Price</span></th>
                                    </tr>
                                    </thead>
                                    <tbody data-order-summary-section="line-items">
                                    @if(!empty($arrayCart))
                                    @foreach($arrayCart as $item)
                                    <tr class="product" data-product-id="6694897647804" data-variant-id="39724991643836"
                                        data-product-type="Cocktail" data-customer-ready-visible>
                                        <td class="product__image">
                                            <div class="product-thumbnail ">
                                                <div class="product-thumbnail__wrapper">
                                                    <img alt="" class="product-thumbnail__image" data-src="{{ @$item['image'] }}"/>
                                                </div>
                                                <span class="product-thumbnail__quantity" aria-hidden="true">{{ @$item['number'] }}</span>
                                            </div>

                                        </td>
                                        <th class="product__description" scope="row">
                                            <span class="product__description__name order-summary__emphasis">{{ @$item['name'] }}</span>
{{--                                            <span class="product__description__variant order-summary__small-text">4 / Sky Blue</span>--}}

                                        </th>
                                        <td class="product__quantity">
                                         <span class="visually-hidden">{{ @$item['number'] }}</span>
                                        </td>
                                        <td class="product__price">
                                            <span
                                                class="order-summary__emphasis skeleton-while-loading">{{ @$item['price'] }} đ</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    @if(empty($arrayCart))
                                        <p>Chưa có sản phẩm nào trong giỏ hàng<p>
                                    @endif
                                    </tbody>
                                </table>

                                <div class="order-summary__scroll-indicator" aria-hidden="true" tabindex="-1">
                                    Cuộn để xen sản phẩm
                                    <svg aria-hidden="true" focusable="false" class="icon-svg icon-svg--size-12">
                                        <use xlink:href="#down-arrow"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="order-summary__section order-summary__section--total-lines"
                             data-order-summary-section="payment-lines">
                            <table class="total-line-table">
                                <tfoot class="total-line-table__footer">
                                <tr class="total-line">
                                    <th class="total-line__name payment-due-label" scope="row">
                                        <span class="payment-due-label__total">Tổng</span>
                                    </th>
                                    <td class="total-line__price payment-due" data-presentment-currency="USD">
                                        <span class="payment-due__price skeleton-while-loading--lg"
                                                          data-checkout-payment-due-target="573553">
                                         {{@$total}}
                                        </span>
                                        <span class="payment-due__currency remove-while-loading">VNĐ</span>
                                    </td>
                                </tr>

                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>

                <div class="visually-hidden" data-order-summary-section="accessibility-live-region">
                    <div aria-live="polite" aria-atomic="true" role="status">
                        Updated total price:
                        <span data-checkout-payment-due-target="573553">
                        $5,735.53
                     </span>
                    </div>
                </div>


                <div id="partial-icon-symbols" class="icon-symbols" data-tg-refresh="partial-icon-symbols"
                     data-tg-refresh-always="true">
                    <svg xmlns="http://www.w3.org/2000/svg">
                        <symbol id="spinner-button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M20 10c0 5.523-4.477 10-10 10S0 15.523 0 10 4.477 0 10 0v2c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8h2z"/>
                            </svg>
                        </symbol>
                        <symbol id="chevron-right">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10">
                                <path d="M2 1l1-1 4 4 1 1-1 1-4 4-1-1 4-4"/>
                            </svg>
                        </symbol>
                        <symbol id="down-arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12">
                                <path
                                    d="M10.817 7.624l-4.375 4.2c-.245.235-.64.235-.884 0l-4.375-4.2c-.244-.234-.244-.614 0-.848.245-.235.64-.235.884 0L5.375 9.95V.6c0-.332.28-.6.625-.6s.625.268.625.6v9.35l3.308-3.174c.122-.117.282-.176.442-.176.16 0 .32.06.442.176.244.234.244.614 0 .848"/>
                            </svg>
                        </symbol>
                        <symbol id="arrow">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                <path d="M16 8.1l-8.1 8.1-1.1-1.1L13 8.9H0V7.3h13L6.8 1.1 7.9 0 16 8.1z"/>
                            </svg>
                        </symbol>
                        <symbol id="mobile-phone">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path
                                    d="M5 2.99C5 1.34 6.342 0 8.003 0h7.994C17.655 0 19 1.342 19 2.99v18.02c0 1.65-1.342 2.99-3.003 2.99H8.003C6.345 24 5 22.658 5 21.01V2.99zM7 5c0-.552.456-1 .995-1h8.01c.55 0 .995.445.995 1v14c0 .552-.456 1-.995 1h-8.01C7.445 20 7 19.555 7 19V5zm5 18c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1z"
                                    fill-rule="evenodd"/>
                            </svg>
                        </symbol>
                        <symbol id="close">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
                                <path
                                    d="M15.1 2.3L13.7.9 8 6.6 2.3.9.9 2.3 6.6 8 .9 13.7l1.4 1.4L8 9.4l5.7 5.7 1.4-1.4L9.4 8"/>
                            </svg>
                        </symbol>
                        <symbol id="spinner-small">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                <path
                                    d="M32 16c0 8.837-7.163 16-16 16S0 24.837 0 16 7.163 0 16 0v2C8.268 2 2 8.268 2 16s6.268 14 14 14 14-6.268 14-14h2z"/>
                            </svg>
                        </symbol>
                    </svg>
                </div>


            </div>
        </aside>
    </div>
</div>

<link href="https://monorail-edge.shopifysvc.com" rel="dns-prefetch">
<script>window.ShopifyAnalytics = window.ShopifyAnalytics || {};
    window.ShopifyAnalytics.meta = window.ShopifyAnalytics.meta || {};
    window.ShopifyAnalytics.meta.currency = 'USD';
    var meta = {
        "page": {
            "path": "\/checkout\/shipping",
            "search": "",
            "url": "https:\/\/theiacouture.com\/5466033\/checkouts\/5464259f51d525a1ff3fd42462ff4067?previous_step=contact_information\u0026step=shipping_method"
        },
        "page_view_event_id": "02be97543df4d10d89fb3e6822effdf04ea1aaf86b21039b8aa5a159ca8d2e7d",
        "cart_event_id": "f2c633931a69c4c3257f265fcf3526e1b51acaecb10d11b7e2df8086a7b9825b"
    };
    for (var attr in meta) {
        window.ShopifyAnalytics.meta[attr] = meta[attr];
    }</script>
<script>window.ShopifyAnalytics.merchantGoogleAnalytics = function () {
        document.body.addEventListener("GoogleAnalyticsEvent", function () {
            window.GoogleAnalyticsAdditionalScripts.executeAdditionalScripts()
        });
        if (window.GoogleAnalyticsAdditionalScripts) {
            window.GoogleAnalyticsAdditionalScripts.executeAdditionalScripts()
        }

    };
</script>
<script class="analytics">(window.gaDevIds = window.gaDevIds || []).push('BwiEti');


    (function () {
        var customDocumentWrite = function (content) {
            var jquery = null;

            if (window.jQuery) {
                jquery = window.jQuery;
            } else if (window.Checkout && window.Checkout.$) {
                jquery = window.Checkout.$;
            }

            if (jquery) {
                jquery('body').append(content);
            }
        };

        var hasLoggedConversion = function (token) {
            if (token) {
                return document.cookie.indexOf('loggedConversion=' + token) !== -1;
            }
            return false;
        }

        var setCookieIfConversion = function (token) {
            if (token) {
                var twoMonthsFromNow = new Date(Date.now());
                twoMonthsFromNow.setMonth(twoMonthsFromNow.getMonth() + 2);

                document.cookie = 'loggedConversion=' + token + '; expires=' + twoMonthsFromNow;
            }
        }

        var trekkie = window.ShopifyAnalytics.lib = window.trekkie = window.trekkie || [];
        if (trekkie.integrations) {
            return;
        }
        trekkie.methods = [
            'identify',
            'page',
            'ready',
            'track',
            'trackForm',
            'trackLink'
        ];
        trekkie.factory = function (method) {
            return function () {
                var args = Array.prototype.slice.call(arguments);
                args.unshift(method);
                trekkie.push(args);
                return trekkie;
            };
        };
        for (var i = 0; i < trekkie.methods.length; i++) {
            var key = trekkie.methods[i];
            trekkie[key] = trekkie.factory(key);
        }
        trekkie.load = function (config) {
            trekkie.config = config;
            var first = document.getElementsByTagName('script')[0];
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.onerror = function (e) {
                var scriptFallback = document.createElement('script');
                scriptFallback.type = 'text/javascript';
                scriptFallback.onerror = function (error) {
                    var Monorail = {
                        produce: function produce(monorailDomain, schemaId, payload) {
                            var currentMs = new Date().getTime();
                            var event = {
                                schema_id: schemaId,
                                payload: payload,
                                metadata: {
                                    event_created_at_ms: currentMs,
                                    event_sent_at_ms: currentMs
                                }
                            };
                            return Monorail.sendRequest("https://" + monorailDomain + "/v1/produce", JSON.stringify(event));
                        },
                        sendRequest: function sendRequest(endpointUrl, payload) {
                            // Try the sendBeacon API
                            if (window && window.navigator && typeof window.navigator.sendBeacon === 'function' && typeof window.Blob === 'function' && !Monorail.isIos12()) {
                                var blobData = new window.Blob([payload], {
                                    type: 'text/plain'
                                });

                                if (window.navigator.sendBeacon(endpointUrl, blobData)) {
                                    return true;
                                } // sendBeacon was not successful

                            } // XHR beacon

                            var xhr = new XMLHttpRequest();

                            try {
                                xhr.open('POST', endpointUrl);
                                xhr.setRequestHeader('Content-Type', 'text/plain');
                                xhr.send(payload);
                            } catch (e) {
                                console.log(e);
                            }

                            return false;
                        },
                        isIos12: function isIos12() {
                            return window.navigator.userAgent.lastIndexOf('iPhone; CPU iPhone OS 12_') !== -1 || window.navigator.userAgent.lastIndexOf('iPad; CPU OS 12_') !== -1;
                        }
                    };
                    Monorail.produce('monorail-edge.shopifysvc.com',
                        'trekkie_checkout_load_errors/1.1',
                        {
                            shop_id: 5466033,
                            theme_id: 122321436860,
                            app_name: "checkout",
                            context_url: window.location.href,
                            source_url: "https://cdn.shopify.com/s/trekkie.storefront.7c2f650aee5fa8abb6eb24f360aebca034622443.min.js"
                        });

                };
                scriptFallback.async = true;
                scriptFallback.src = 'https://cdn.shopify.com/s/trekkie.storefront.7c2f650aee5fa8abb6eb24f360aebca034622443.min.js';
                first.parentNode.insertBefore(scriptFallback, first);
            };
            script.async = true;
            script.src = 'https://cdn.shopify.com/s/trekkie.storefront.7c2f650aee5fa8abb6eb24f360aebca034622443.min.js';
            first.parentNode.insertBefore(script, first);
        };
        trekkie.load(
            {
                "Trekkie": {
                    "appName": "checkout",
                    "development": false,
                    "defaultAttributes": {
                        "shopId": 5466033,
                        "isMerchantRequest": null,
                        "themeId": 122321436860,
                        "themeCityHash": "17738564921051747868",
                        "contentLanguage": "en",
                        "currency": "USD",
                        "checkoutToken": "5464259f51d525a1ff3fd42462ff4067"
                    },
                    "isServerSideCookieWritingEnabled": true
                },
                "Performance": {
                    "navigationTimingApiMeasurementsEnabled": true,
                    "navigationTimingApiMeasurementsSampleRate": 1
                },
                "Google Analytics": {
                    "trackingId": "UA-12670143-2",
                    "domain": "auto",
                    "siteSpeedSampleRate": "10",
                    "enhancedEcommerce": true,
                    "doubleClick": true,
                    "includeSearch": true
                },
                "Facebook Pixel": {
                    "pixelIds": ["741171925983598"],
                    "agent": "plshopify1.2",
                    "conversionsAPIEnabled": true
                },
                "Session Attribution": {}
            }
        );

        var loaded = false;
        trekkie.ready(function () {
            if (loaded) return;
            loaded = true;

            window.ShopifyAnalytics.lib = window.trekkie;

            ga('require', 'linker');

            function addListener(element, type, callback) {
                if (element.addEventListener) {
                    element.addEventListener(type, callback);
                } else if (element.attachEvent) {
                    element.attachEvent('on' + type, callback);
                }
            }

            function decorate(event) {
                event = event || window.event;
                var target = event.target || event.srcElement;
                if (target && (target.getAttribute('action') || target.getAttribute('href'))) {
                    ga(function (tracker) {
                        var linkerParam = tracker.get('linkerParam');
                        document.cookie = '_shopify_ga=' + linkerParam + '; ' + 'path=/';
                    });
                }
            }

            addListener(window, 'load', function () {
                for (var i = 0; i < document.forms.length; i++) {
                    var action = document.forms[i].getAttribute('action');
                    if (action && action.indexOf('/cart') >= 0) {
                        addListener(document.forms[i], 'submit', decorate);
                    }
                }
                for (var i = 0; i < document.links.length; i++) {
                    var href = document.links[i].getAttribute('href');
                    if (href && href.indexOf('/checkout') >= 0) {
                        addListener(document.links[i], 'click', decorate);
                    }
                }
            });


            var originalDocumentWrite = document.write;
            document.write = customDocumentWrite;
            try {
                window.ShopifyAnalytics.merchantGoogleAnalytics.call(this);
            } catch (error) {
            }
            ;
            document.write = originalDocumentWrite;
            (function () {
                if (window.BOOMR && (window.BOOMR.version || window.BOOMR.snippetExecuted)) {
                    return;
                }
                window.BOOMR = window.BOOMR || {};
                window.BOOMR.snippetStart = new Date().getTime();
                window.BOOMR.snippetExecuted = true;
                window.BOOMR.snippetVersion = 12;
                window.BOOMR.application = "core";
                window.BOOMR.shopId = 5466033;
                window.BOOMR.themeId = 122321436860;
                window.BOOMR.themeName = "Impulse";
                window.BOOMR.themeVersion = "4.1.1";
                window.BOOMR.url =
                    "https://cdn.shopify.com/shopifycloud/boomerang/shopify-boomerang-1.0.0.min.js";
                var where = document.currentScript || document.getElementsByTagName("script")[0];
                var parentNode = where.parentNode;
                var promoted = false;
                var LOADER_TIMEOUT = 3000;

                function promote() {
                    if (promoted) {
                        return;
                    }
                    var script = document.createElement("script");
                    script.id = "boomr-scr-as";
                    script.src = window.BOOMR.url;
                    script.async = true;
                    parentNode.appendChild(script);
                    promoted = true;
                }

                function iframeLoader(wasFallback) {
                    promoted = true;
                    var dom, bootstrap, iframe, iframeStyle;
                    var doc = document;
                    var win = window;
                    window.BOOMR.snippetMethod = wasFallback ? "if" : "i";
                    bootstrap = function (parent, scriptId) {
                        var script = doc.createElement("script");
                        script.id = scriptId || "boomr-if-as";
                        script.src = window.BOOMR.url;
                        BOOMR_lstart = new Date().getTime();
                        parent = parent || doc.body;
                        parent.appendChild(script);
                    };
                    if (!window.addEventListener && window.attachEvent && navigator.userAgent.match(/MSIE [67]./)) {
                        window.BOOMR.snippetMethod = "s";
                        bootstrap(parentNode, "boomr-async");
                        return;
                    }
                    iframe = document.createElement("IFRAME");
                    iframe.src = "about:blank";
                    iframe.title = "";
                    iframe.role = "presentation";
                    iframe.loading = "eager";
                    iframeStyle = (iframe.frameElement || iframe).style;
                    iframeStyle.width = 0;
                    iframeStyle.height = 0;
                    iframeStyle.border = 0;
                    iframeStyle.display = "none";
                    parentNode.appendChild(iframe);
                    try {
                        win = iframe.contentWindow;
                        doc = win.document.open();
                    } catch (e) {
                        dom = document.domain;
                        iframe.src = "javascript:var d=document.open();d.domain='" + dom + "';void(0);";
                        win = iframe.contentWindow;
                        doc = win.document.open();
                    }
                    if (dom) {
                        doc._boomrl = function () {
                            this.domain = dom;
                            bootstrap();
                        };
                        doc.write("<body onload='document._boomrl();'>");
                    } else {
                        win._boomrl = function () {
                            bootstrap();
                        };
                        if (win.addEventListener) {
                            win.addEventListener("load", win._boomrl, false);
                        } else if (win.attachEvent) {
                            win.attachEvent("onload", win._boomrl);
                        }
                    }
                    doc.close();
                }

                var link = document.createElement("link");
                if (link.relList &&
                    typeof link.relList.supports === "function" &&
                    link.relList.supports("preload") &&
                    ("as" in link)) {
                    window.BOOMR.snippetMethod = "p";
                    link.href = window.BOOMR.url;
                    link.rel = "preload";
                    link.as = "script";
                    link.addEventListener("load", promote);
                    link.addEventListener("error", function () {
                        iframeLoader(true);
                    });
                    setTimeout(function () {
                        if (!promoted) {
                            iframeLoader(true);
                        }
                    }, LOADER_TIMEOUT);
                    BOOMR_lstart = new Date().getTime();
                    parentNode.appendChild(link);
                } else {
                    iframeLoader(false);
                }

                function boomerangSaveLoadTime(e) {
                    window.BOOMR_onload = (e && e.timeStamp) || new Date().getTime();
                }

                if (window.addEventListener) {
                    window.addEventListener("load", boomerangSaveLoadTime, false);
                } else if (window.attachEvent) {
                    window.attachEvent("onload", boomerangSaveLoadTime);
                }
                if (document.addEventListener) {
                    document.addEventListener("onBoomerangLoaded", function (e) {
                        e.detail.BOOMR.init({
                            producer_url: "https://monorail-edge.shopifysvc.com/v1/produce",
                            ResourceTiming: {
                                enabled: true,
                                trackedResourceTypes: ["script", "img", "css"]
                            },
                        });
                        e.detail.BOOMR.t_end = new Date().getTime();
                    });
                } else if (document.attachEvent) {
                    document.attachEvent("onpropertychange", function (e) {
                        if (!e) e = event;
                        if (e.propertyName === "onBoomerangLoaded") {
                            e.detail.BOOMR.init({
                                producer_url: "https://monorail-edge.shopifysvc.com/v1/produce",
                                ResourceTiming: {
                                    enabled: true,
                                    trackedResourceTypes: ["script", "img", "css"]
                                },
                            });
                            e.detail.BOOMR.t_end = new Date().getTime();
                        }
                    });
                }
            })();


            window.ShopifyAnalytics.lib.page("Checkout - Shipping", {
                "path": "\/checkout\/shipping",
                "search": "",
                "url": "https:\/\/theiacouture.com\/5466033\/checkouts\/5464259f51d525a1ff3fd42462ff4067?previous_step=contact_information\u0026step=shipping_method"
            }, "02be97543df4d10d89fb3e6822effdf04ea1aaf86b21039b8aa5a159ca8d2e7d");

            var match = window.location.pathname.match(/checkouts\/(.+)\/(thank_you|post_purchase)/)
            var token = match ? match[1] : undefined;
            if (!hasLoggedConversion(token)) {
                setCookieIfConversion(token);

            }
        });


        var eventsListenerScript = document.createElement('script');
        eventsListenerScript.async = true;
        eventsListenerScript.src = "//cdn.shopify.com/shopifycloud/shopify/assets/shop_events_listener-698cd52ffea9f9987d9c389e5aa8fdeeba2073f72a5addbbfa7893f4bb5125ef.js";
        document.getElementsByTagName('head')[0].appendChild(eventsListenerScript);

    })();</script>
</body>
</html>
