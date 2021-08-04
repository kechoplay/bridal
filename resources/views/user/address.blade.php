@extends('shop.app')
@section('content')
        <div class="page-width page-width--narrow page-content">
            <header class="section-header">
                <h1 class="section-header__title">{{ __('Address') }}</h1>
{{--                <button type="button" class="btn btn--secondary btn--small section-header__link address-new-toggle">Add address</button>--}}
            </header>

            <div id="AddressNewForm" class="form-vertical js-address-form text-left">
                @if(empty($address))
                <form method="post" action="{{ route('addressStore') }}" id="address_form_edit" accept-charset="UTF-8">
                    <h2>{{ __('Add address') }}</h2>
                @endif
                @if(!empty($address))
                 <form method="post" action="{{ route('addressSave',['id' => $address->id]) }}" id="address_form_edit" accept-charset="UTF-8">
                     <h2>{{ __('Edit address') }}</h2>
                @endif
                     @csrf
                     <div class="grid grid--small">
                         <div class="grid__item medium-up--one-half">
                             <label for="AddressZipNew">{{ __('Name') }}</label>
                             <input type="text" id="name_order" class="input-full" name="name_order" @if(!empty($address))value="{{ $address->name }}"@endif required>
                         </div>

                         <div class="grid__item medium-up--one-half">
                             <label for="AddressPhoneNew">{{ __('Phone') }}</label>
                             <input type="tel" id="phone_order" class="input-full" name="phone_order" @if(!empty($address))value="{{ $address->phone }}"@endif required>
                         </div>
                     </div>
                    <label for="AddressAddress1New">Email order</label>
                    <input type="text" id="email_order" class="input-full" name="email_order"  @if(!empty($address))value="{{ $address->email }}"@endif autocapitalize="words" required>

                    <label for="AddressAddress2New">Address</label>
                    <input type="text" id="address_order" class="input-full" name="address_order"  @if(!empty($address))value="{{ $address->address }}"@endif autocapitalize="words" required>


{{--                    <p>--}}
{{--                        <input type="checkbox" id="address_default_address_new" name="address[default]" value="1" />--}}
{{--                        <label for="address_default_address_new" class="inline">Set as default address</label>--}}
{{--                    </p>--}}

                    <p>
                        @if(empty($address))
                        <button type="submit" class="btn">
                            Add address
                        </button>
                        @endif
                        @if(!empty($address))
                            <button type="submit" class="btn">
                                 Save address
                            </button>
                        @endif
                    </p>
                    <p>
                        <a href="{{ route('userDetail') }}"><button type="button" class="text-link address-new-toggle">Back</button></a>
                    </p>
                 </form>
           </div>
        </div>
@endsection
