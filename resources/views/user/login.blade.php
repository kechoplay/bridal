@extends('shop.app')
@section('content')
<main class="main-content" id="MainContent">
    <div class="page-width page-width--tiny page-content">
        @if(session()->has('success'))
            <div class="alert alert-success" style="background-color: #24c212;padding: 10px;margin-bottom: 20px">
                {{ session()->get('success') }}
            </div>
        @endif
            @if(session()->has('error'))
                <div class="alert alert-danger" style="background-color: #ec1515;padding: 10px;margin-bottom: 20px">
                    {{ session()->get('error') }}
                </div>
            @endif
        <header class="section-header">
            <h1 class="section-header__title">Login</h1>
        </header>

        <div class="note note--success hide" id="ResetSuccess">
            We&#39;ve sent you an email with a link to update your password.
        </div>

        <div id="CustomerLoginForm" class="form-vertical">
            <form method="POST" action="{{ route('checkLogin') }}" id="customer_login" >
                @csrf
                <label for="CustomerEmail">Email</label>
                <input type="email" name="email_user" id="CustomerEmail" class="input-full" autocorrect="off" autocapitalize="off" autofocus>
                <div class="grid">
                    <div class="grid__item one-half">
                        <label for="CustomerPassword">Password</label>
                    </div>
                    <div class="grid__item one-half text-right">
                        <small class="label-info">
                            <a href="#recover" id="RecoverPassword">
                                Forgot password?
                            </a>
                        </small>
                    </div>
                </div>
                <input type="password" value="" name="pass_user" id="CustomerPassword" class="input-full"><p>
                    <button type="submit" class="btn btn--full">
                        Sign In
                    </button>
                </p>
                <p><a href="{{ route('userRegister') }}" id="customer_register_link">Create account</a></p><input type="hidden" name="return_url" value="/account" />
            </form></div>

            <div id="RecoverPasswordForm" hidden>
            <div class="form-vertical">
                <h2>Reset your password</h2>
                <p>We will send you an email to reset your password.</p>
                <form method="post" action="/account/recover" accept-charset="UTF-8">
                    @csrf
                    <label for="RecoverEmail">Email</label>
                    <input type="email" value="" name="email_reset" id="RecoverEmail" class="input-full" autocorrect="off" autocapitalize="off">

                    <p>
                        <button type="submit" class="btn">
                            Submit
                        </button>
                    </p>
                    <button type="button" id="HideRecoverPasswordLink">Cancel</button>
                </form>
            </div>
        </div>
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
<script type='text/javascript' src='/js/jquery-migrate.min.js' id='jquery-migrate-js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        setTimeout(function(){
            $("div.alert").remove();
        }, 7000 ); // 7 secs

    });
</script>
@endsection
