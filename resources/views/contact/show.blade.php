@extends('layouts.app')

@section('content')

<html>
    <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>出張申請</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/main.css') }}"/>
	
    </head>
    <body>
        <div class="container">
			<header>
			   <div class="row">
						<button onclick="location.href='http://127.0.0.1:8000/contact/home'">ホームへ</button>
						<input type="text" name="busyo" id="busyo" form="shinsei_form" value="{{ Auth::user()->busyo }}" readonly>
						<input type="text" name="name" id="name" form="shinsei_form" value="{{ Auth::user()->name }}" readonly>
				</div>
			</header>
		</div>
	
		<hr>

		
		<div class="container">
		{{ $contact->busyo}}
		<br>
		{{ $contact->name}}
		<br>
		{{ $contact->ikisaki}}
		<br>
		{{ $contact->From}}
		<br>
		{{ $contact->To}}
		<br>
		{{ $contact->purchase}}
		<br>
		{{ $contact->seisan}}
		<br>
		{{ $contact->bikou}}
		<br>
		{{ $contact->kotukikan}}
		<br>
		{{ $contact->kukan_from}}
		<br>
		{{ $contact->kukan_to}}
		<br>
		{{ $contact->kukan_money}}
		<br>
		{{ $contact->nitto}}
		<br>
		{{ $contact->syukuhakuhi}}
		<br>
		{{ $contact->kariharai}}
		<br>
			<form action="{{route('contact.edit', ['id'=> $contact->id])}}" method="GET" class="row" id = "shinsei_form" onsubmit="return submitCheck()">
			@csrf
					<button type="submit" class="btn btn-primary" onsubmit="return submitCheck()" >変更する</button>
					<!-- <button type="button" class="btn btn-keisan" id="sumMoney" name="sumMoney">計算する</button> -->
			</form>

			<form method="POST" action="{{route('contact.destroy', ['id'=> $contact->id])}}" class="row" id = "delete_{{ $contact->id}}">
			<a href="#" class = "btn btn-danger" data-id="{{$contact->id}}" onclick="deletePost(this);">削除する</a>
			@csrf
			</form>
		</div>
	
		<hr>
	
		<div class="container">
			<footer>
			</footer>
		</div>
		<script src="{{ asset('/js/main.js') }}"></script>
    </body>
</html>

<!--
/*************************** 
削除前の確認のメッセージ
***************************/
-->
<script>
function deletePost(e) {
	if (confirm('本当に削除してもいいですか？')) {
		document.getElementById('delete_' + e.dataset.id).submit();
	}
}
</script>

@endsection