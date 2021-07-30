@extends('shop.app')
@section('content')
    <div id="shopify-section-page-contact-template" class="shopify-section">
        <div class="page-width page-width--narrow page-content page-content--with-blocks">
            <header class="section-header">
                <h1 class="section-header__title" data-open-accessibility-text-original="29px" style="font-size: 29px;">
                    {{ __('Contact us') }}</h1>
            </header>
            <div class="rte text-spacing">
                {{ __('Contact') }}
            </div>
        </div>
        <div class="page-blocks">
            <div>
                <div class="index-section">
                    <div class="page-width page-width--narrow">
                        <div class="form-vertical">
                            <form method="post" action="{{ route('pages.contactPost') }}"
                                  id="contact-page-contact-template-0" accept-charset="UTF-8" class="contact-form">
                                {{ csrf_field() }}
                                @if(session()->has('message'))
                                    <p class="note note--success" data-open-accessibility-text-original="16px" style="font-size: 16px;">
                                        {{ session()->get('message') }}
                                    </p>
                                @endif
                                <div class="grid grid--small">
                                    <div class="grid__item medium-up--one-half">
                                        <label for="ContactFormName-page-contact-template-0">{{ __('Họ và tên') }}</label>
                                        <input type="text" id="ContactFormName-page-contact-template-0" required
                                               class="input-full" name="contact[name]" autocapitalize="words" value="">
                                    </div>

                                    <div class="grid__item medium-up--one-half">
                                        <label for="ContactFormEmail-page-contact-template-0">Email</label>
                                        <input type="email" id="ContactFormEmail-page-contact-template-0" required
                                               class="input-full" name="contact[email]" autocorrect="off"
                                               autocapitalize="off" value="">
                                    </div>
                                </div>
                                <label for="ContactFormMessage-page-contact-template-0">{{ __('Nội dung') }}</label>
                                <textarea rows="5" id="ContactFormMessage-page-contact-template-0" class="input-full"
                                          name="contact[body]" required></textarea>

                                <button type="submit" class="btn navigable">
                                    {{ __('Gửi') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
