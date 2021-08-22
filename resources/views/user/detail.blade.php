@extends('shop.app')
@section('content')
        <div class="page-width page-content">
            <header class="section-header">
                <h1 class="section-header__title">{{ __('My account') }}</h1>
                <a href="{{ route('userLogout') }}" class="btn btn--secondary btn--small section-header__link">{{ __('Log out') }}</a>
            </header>
            @if(session()->has('success'))
                <div class="alert alert-success" style="background-color: #24c212;padding: 10px;margin-bottom: 20px;text-align: center">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="grid">
                <div class="grid__item medium-up--one-third">
                    <h3>{{ __('Account details') }}</h3>

                    <p class="h5">{{ auth()->guard('customers')->user()->name }}</p>
                    <hr>
                    @if(!empty($address))
                    <p>{{ __('Email order') }}: {{ $address->email }}</p>
                    <p>{{ __('Name') }}: {{ $address->name }}</p>
                    <p>{{ __('Phone') }}: {{ $address->phone }}</p>
                    <p>{{ __('Address') }}: {{ $address->address }}</p>
                        <div class="row">
                            <div class="col-sm-5" style="width: 150px">
                                <p><a href="{{ route('userAddress') }}" class="text-link"><button style="background-color: black;color: white;padding: 5px 15px 5px 15px">{{ __('Edit address') }}</button></a></p>
                            </div>
                        </div>
                    @endif
                    @if(empty($address))
                    <p><a href="{{ route('userAddress') }}" class="text-link"><button style="background-color: black;color: white;padding: 5px">{{ __('Add Address') }}</button></a></p>
                    @endif
                </div>

            </div></div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
    <script type='text/javascript' src='/js/jquery-migrate.min.js' id='jquery-migrate-js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                setTimeout(function(){
                    $("div.alert").remove();
                }, 3000 ); // 3 secs

            });
        </script>
@endsection
