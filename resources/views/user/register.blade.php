@extends('shop.app')
@section('content')
    <main class="main-content" id="MainContent">
        <div class="page-width page-width--tiny page-content">
            <header class="section-header">
                <h1 class="section-header__title">Create Account</h1>
            </header>
            @if(session()->has('error'))
                <div class="alert alert-danger" style="background-color: #ec1515;padding: 10px;margin-bottom: 20px">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="form-vertical"><form method="post" action="{{ route('registerSave') }}" id="create_customer" accept-charset="UTF-8">
                    <input type="hidden" name="utf8" value="✓" />
                    @csrf
                    <label for="FirstName">Name</label>
                    <input type="text" name="name_user" id="name_user" class="input-full" autocapitalize="words" autofocus required>

                    <label for="Email">Email</label>
                    <input type="email" name="email_user" id="email_user" class="input-full" autocorrect="off" autocapitalize="off" required>

                    <label for="CreatePassword">Password</label>
                    <input type="password" name="pass_user" id="pass_user" class="input-full" required>

                    <p>
                        <input type="submit" value="Create" class="btn btn--full">
                    </p></form></div>
        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
    <script type='text/javascript' src='/js/jquery-migrate.min.js' id='jquery-migrate-js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function(){
                $("div.alert").remove();
            }, 5000 ); // 5 secs

        });
    </script>
@endsection
