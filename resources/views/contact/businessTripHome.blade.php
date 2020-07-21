@extends('layouts.app')

@section('content')

<html>
    <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>出張申請</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/main.css') }}"/>
	
    </head>
    <body>
	
        <div class="container">
			<header>
			   <div class="row">
			   <button onclick="location.href='./home'">ホームへ</button>
				<button onclick="location.href='./shinsei'">申請する</button>

				</div>
			</header>
		</div>
	    
		<hr>
		
		<div class="container">	

			<table>
				<thead>
					<tr>
						<td class="non"></td>
						<th scope="col">都道府県</th>
						<th scope="col">開始日</th>
						<th scope="col">終了日</th>
						<th scope="col">仮払金</th>
						<th scope="col">詳細</th>
						<th scope="col">報告ページ</th>
					</tr>
				</thead>
				<tbody>
				@foreach($homeLists as $homeList)
					@if($homeList->checkFlg == false)
					<tr>
						<th>{{$homeList->id}}</th>
						<td data-label="都道府県" class="txt">{{$homeList->ikisaki}}</td>
						<td data-label="開始日" class="txt">{{ $homeList->From}}</td>
						<td data-label="終了日" class="txt">{{ $homeList->To}}</td>
						<td data-label="仮払金" class="price">{{ $homeList->kariharai}}</td>
						<td data-label="仮払金" class="price"><a href="{{ route('contact.show',['id' => $homeList->id ]) }}">詳細</a></td> 
						<td data-label="仮払金" class="price"><a href="{{ route('hokoku.create',['id' => $homeList->id ]) }}">報告する</a></td> 
					</tr>
					@endif
				@endforeach
				</tbody>
			</table>
			
		</div>
	
		<hr>

		<script src=""></script>
    </body>
</html>
@endsection