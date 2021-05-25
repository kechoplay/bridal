@extends('layout.app')
@section('content')
        <div class="breadcrumbs">
            <div class="breadcrumbs-container">
                <div class="breadcrumbs-row">
                    <div class="breadcrumbs-col">
                        <div class="breadcrumbs-content">
                            <a href="/">Home</a>
                            <span class="separator">/</span>
                            <span class="current">Contact</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sections">
            <div class="section-form">
                <div class="section-form-container">
                    <div class="section-form-row">
                        <div class="section-form-col">
                            <div class="section-form-content">
                                <div class="form-wrapper">
                                    <div class="form-container">
                                        <div class="form-row" data-form-id="1">

                                            <div class="gf_browser_chrome gform_wrapper" id="gform_wrapper_1">
                                                @if(session()->has('message'))
                                                    <div class="alert alert-success" id="alert_success">
                                                        {{ session()->get('message') }}
                                                    </div>
                                                @endif
                                                <form method="post" enctype="multipart/form-data" id="form_contact" action="{{route('contactPost')}}">
                                                    {{csrf_field()}}
                                                    <div class="gform_heading">
                                                        <h3 class="gform_title">Get in touch.</h3>
                                                    </div>
                                                    <div class="gform_body">
                                                        <ul id="gform_fields_1" class="gform_fields top_label form_sublabel_below description_below">
                                                            <li id="field_1_1" class="gfield field_sublabel_below field_description_below gfield_visibility_visible field-type-select">
                                                                <label class="gfield_label" for="input_1_1">Style</label>
                                                                <div class="ginput_container ginput_container_select">
                                                                    <select name="style_dress" id="style_dress" class="medium gfield_select" aria-invalid="false">
                                                                        <option value="" selected="selected" class="gf_placeholder" disabled>Style (Optional)</option>
                                                                        <option value="890047 ">890047 (Elsa Overskirt)</option>
                                                                    </select>
                                                                </div>
                                                            </li>
                                                            <li id="field_1_2" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible placeholder-false field-type-text">
                                                                <label class="gfield_label" for="input_1_2">Name<span class="gfield_required">*</span></label>
                                                                <div class="ginput_container ginput_container_text">
                                                                    <input name="name" id="name" type="text" value="" class="medium" aria-required="true" aria-invalid="false"></div>
                                                            </li>
                                                            <li id="field_1_3" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible placeholder-false field-type-email">
                                                                <label class="gfield_label" for="input_1_3">Email<span class="gfield_required">*</span></label>
                                                                <div class="ginput_container ginput_container_email">
                                                                    <input name=email" id="email" type="email" value="" class="medium" aria-required="true" aria-invalid="false">
                                                                </div>
                                                            </li>
                                                            <li id="field_1_8" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible placeholder-false field-type-text">
                                                                <label class="gfield_label" for="input_1_8">Contact Phone Number<span class="gfield_required">*</span></label>
                                                                <div class="ginput_container ginput_container_text">
                                                                    <input name="phone" id="phone" type="text" value="" class="medium" aria-required="true" aria-invalid="false">
                                                                </div>
                                                            </li>
                                                            <li id="field_1_6" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible placeholder-false field-type-text">
                                                                <label class="gfield_label" for="input_1_6">Address<span class="gfield_required">*</span></label>
                                                                <div class="ginput_container ginput_container_text">
                                                                    <input name="address" id="address" type="text" value="" class="medium" aria-required="true" aria-invalid="false"></div>
                                                            </li>
                                                            <li id="field_1_7" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible placeholder-false field-type-textarea">
                                                                <label class="gfield_label" for="input_1_7">Notes<span class="gfield_required">*</span></label>
                                                                <div class="ginput_container ginput_container_textarea">
                                                                    <textarea name="note" id="note" class="textarea medium" aria-required="true" aria-invalid="false" rows="10" cols="50"></textarea>
                                                                </div>
                                                            </li>
                                                        </ul></div>
                                                    <div class="gform_footer top_label">
                                                        <input type="submit" id="gform_submit_button_1" class="gform_button button" value="Submit" style="margin-left: 35%">
                                                        <input type="hidden" class="gform_hidden" name="is_submit_1" value="1">
                                                        <input type="hidden" class="gform_hidden" name="gform_submit" value="1">

                                                        <input type="hidden" class="gform_hidden" name="gform_unique_id" value="">
                                                        <input type="hidden" class="gform_hidden" name="state_1" value="WyJbXSIsIjJlOTYyNGMzYzk3NmM4YmY1NmQxMWZmOGFjZDFlNjhhIl0=">
                                                        <input type="hidden" class="gform_hidden" name="gform_target_page_number_1" id="gform_target_page_number_1" value="0">
                                                        <input type="hidden" class="gform_hidden" name="gform_source_page_number_1" id="gform_source_page_number_1" value="1">
                                                        <input type="hidden" name="gform_field_values" value="">

                                                    </div>
                                                </form>
                                            </div><script type="text/javascript"> if(typeof gf_global == 'undefined') var gf_global = {"gf_currency_config":{"name":"U.S. Dollar","symbol_left":"$","symbol_right":"","symbol_padding":"","thousand_separator":",","decimal_separator":".","decimals":2},"base_url":"https:\/\/bridal.theiacouture.com\/wp-content\/plugins\/gravityforms","number_formats":[],"spinnerUrl":"https:\/\/bridal.theiacouture.com\/wp-content\/plugins\/gravityforms\/images\/spinner.gif"};jQuery(document).bind('gform_post_render', function(event, formId, currentPage){if(formId == 1) {if(typeof Placeholders != 'undefined'){
                                                    Placeholders.enable();
                                                }} } );jQuery(document).bind('gform_post_conditional_logic', function(event, formId, fields, isInit){} );</script><script type="text/javascript"> jQuery(document).ready(function(){jQuery(document).trigger('gform_post_render', [1, 1]) } ); </script>            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-text">
                <div class="section-text-container">
                    <div class="section-text-row">
                        <div class="section-text-col">
                            <div class="section-text-content">
                                <h3 style="text-align: center;">Press Inquiries.</h3>
                                <p style="text-align: center;">For all media and press inquiries, please contact <a href="mailto:press@theiacouture.com">press@theiacouture.com</a>.</p>
                                <p>&nbsp;</p>
                                <h3 style="text-align: center;">Wholesale Inquiries.</h3>
                                <p style="text-align: center;">For wholesale inquiries, please contact <a href="mailto:sales@theiacouture.com">sales@theiacouture.com</a>.</p>
                                <p>&nbsp;</p>
                                <h3 style="text-align: center;">Real Wedding Submission.</h3>
                                <p style="text-align: center;">If you were a THEIA bride and would like to be featured on our Real Weddings Blog and on social media, please contact <a href="mailto:realweddings@theiacouture.com">realweddings@theiacouture.com</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script async>(function(s,u,m,o,j,v){j=u.createElement(m);v=u.getElementsByTagName(m)[0];j.async=1;j.src=o;j.dataset.sumoSiteId='f8d6f30045e32700d4ffc000da60ae007ad08300b384e600f1dafa0002cab300';j.dataset.sumoPlatform='wordpress';v.parentNode.insertBefore(j,v)})(window,document,'script','//load.sumo.com/');</script>		<script type="text/javascript">
    var gfRecaptchaPoller = setInterval( function() {
        if( ! window.grecaptcha ) {
            return;
        }
        renderRecaptcha();
        clearInterval( gfRecaptchaPoller );
    }, 100 );
</script>
<script>
        setTimeout(function () {
            var element = document.getElementById('alert_success');
            element.remove();
        }, 3000); // 3 secs
</script>
<script type='text/javascript' src='https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/themes/theiabridal/dist/scripts/main-fd5b61c6d1.js' id='sage/js-js'></script>
<script type='text/javascript' src='https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-includes/js/wp-embed.min.js?ver=5.7.1' id='wp-embed-js'></script>
<script type='text/javascript' src='https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/plugins/gravityforms/js/jquery.json.min.js?ver=2.2.3' id='gform_json-js'></script>
<script type='text/javascript' src='https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/plugins/gravityforms/js/gravityforms.min.js?ver=2.2.3' id='gform_gravityforms-js'></script>
<script type='text/javascript' src='https://413qut3s1ajtpgjzf1ekop6h-wpengine.netdna-ssl.com/wp-content/plugins/gravityforms/js/placeholders.jquery.min.js?ver=2.2.3' id='gform_placeholder-js'></script>
<script type='text/javascript' src='https://www.google.com/recaptcha/api.js?hl=en&#038;render=explicit&#038;ver=5.7.1' id='gform_recaptcha-js'></script>

@endsection
