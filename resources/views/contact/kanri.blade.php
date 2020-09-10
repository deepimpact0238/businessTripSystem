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
				<button onclick="location.href=''">CSV出力</button>
				<button onclick="location.href='./master'">マスタ金額変更</button>

				</div>
			</header>
		</div>
	    
		<hr>
		
		<div class="container">	

			<table>
				<thead>
					<tr>
						<td class="non"></td>
						<th scope="col">部署</th>
						<th scope="col">名前</th>
						<th scope="col">都道府県</th>
						<th scope="col">開始日</th>
						<th scope="col">終了日</th>
						<th scope="col">仮払金</th>
						<th scope="col">詳細</th>
						<th scope="col">状態</th>
					</tr>
				</thead>
				<tbody>
				@foreach($kanriLists as $kanriList)
					@if($kanriList->checkFlg == false)
					<tr>
						<th>{{$kanriList->id}}</th>
						<td data-label="部署" class="txt">{{$kanriList->busyo}}</td>
						<td data-label="名前" class="txt">{{$kanriList->name}}</td>
						<td data-label="都道府県" class="txt">{{$kanriList->ikisaki}}</td>
						<td data-label="開始日" class="txt">{{ $kanriList->From}}</td>
						<td data-label="終了日" class="txt">{{ $kanriList->To}}</td>
						<td data-label="仮払金" class="price">{{ $kanriList->kariharai}}</td>
						<td data-label="仮払金" class="price"><a href="{{ route('contact.show',['id' => $kanriList->id ]) }}">詳細</a></td> 
						<td data-label="仮払金" class="price">申請済</td> 
					</tr>
					@elseif($kanriList->checkFlg == true)
					<tr>
						<th>{{$kanriList->id}}</th>
						<td data-label="部署" class="txt">{{$kanriList->busyo}}</td>
						<td data-label="名前" class="txt">{{$kanriList->name}}</td>
						<td data-label="都道府県" class="txt">{{$kanriList->ikisaki}}</td>
						<td data-label="開始日" class="txt">{{ $kanriList->From}}</td>
						<td data-label="終了日" class="txt">{{ $kanriList->To}}</td>
						<td data-label="仮払金" class="price">{{ $kanriList->kariharai}}</td>
						<td data-label="仮払金" class="price"><a href="{{ route('contact.show',['id' => $kanriList->id ]) }}">詳細</a></td>  
						<td data-label="仮払金" class="price">報告済</td> 
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