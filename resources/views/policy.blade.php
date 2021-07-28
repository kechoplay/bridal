@extends('shop.app')
@section('content')
    <div class="page-width page-width--narrow page-content">
        <header class="section-header">
            <h1 class="section-header__title" data-open-accessibility-text-original="29px" style="font-size: 29px;">
                {{ __('Privacy Policy') }}
            </h1>
        </header>

        <div class="rte rte--nomargin">
            <meta charset="utf-8">
            {!! isset($policy->privacy_policy) ? $policy->privacy_policy : '' !!}
        </div>
    </div>
@endsection
