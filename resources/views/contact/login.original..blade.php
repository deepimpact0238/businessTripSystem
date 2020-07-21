<html>
    <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>出張申請</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/main.css') }}"/>
	
    </head>
    <body>
	<div class="wrapper">
        <div class="container">
			<header>
			   <div class="row">
						<h1>出張申請システム</h1>
                        
				</div>

            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('contact/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif


			</header>
		</div>
	
		<hr>
		
		<div class="container">
         <form action="{{ url('contact/home') }}" method="GET" class="">	
            <div class="form-group">
                <label for="login"><span class="label-danger" style="color: white; background-color: red; border-radius: 1px;">必須</span> ユーザー名</label>
                <br>
                <input type="text" id="userName" name="userName" class="form-control">
            </div>
            <div class="form-group">
                <label for="login"><span class="label-danger" style="color: white; background-color: red; border-radius: 1px;">必須</span> パスワード</label>
                <br>
                <input type="text" id="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="form-control">ログイン</button>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
         </form>
		</div>
	
		<hr>
	
		<div class="container">
			<footer>
			</footer>
		</div>
	</div>
		<script src=""></script>
    </body>
</html>