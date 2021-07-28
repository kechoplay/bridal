@extends('shop.app')
@section('content')
    <div class="page-width page-width--narrow page-content">
        <header class="section-header">
            <h1 class="section-header__title" data-open-accessibility-text-original="29px" style="font-size: 29px;">
                {{ __('Terms of Service') }}</h1>
        </header>

        <div class="rte rte--nomargin">
            <meta charset="utf-8">
            {!! isset($policy->term_of_service) ? $policy->term_of_service : '' !!}
        </div>
    </div>
@endsection
