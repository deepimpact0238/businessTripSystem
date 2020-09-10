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
				<button onclick="location.href=''">管理画面へ</button>

				</div>
			</header>
		</div>
	    
		<hr>
		
		<div class="container">	

			<table>
				<thead>
					<tr>
						<th scope="col">社員ID</th>
						<th scope="col">部署名</th>
						<th scope="col">氏名</th>
						<th scope="col">日当</th>
						<th scope="col">宿泊費</th>
					</tr>
				</thead>
				<tbody>
				@foreach($userLists as $userList)
					
					<tr>
						<td data-label="社員ID" class="txt">{{$userList->syainID}}</td>
						<td data-label="部署" class="txt">{{ $userList->busyo}}</td>
						<td data-label="氏名" class="txt">{{ $userList->name}}</td>
						<td data-label="日当" class="price"><input type="text" value="{{ $userList->nitto}}"></td>
						<td data-label="宿泊費" class="price"><input type="text" style="border:none" value="{{ $userList->syukuhakuhi}}"></td> 
					</tr>
					
				@endforeach
				</tbody>
			</table>
			
		</div>
	
		<hr>

		<script src=""></script>
    </body>
</html>
@endsection