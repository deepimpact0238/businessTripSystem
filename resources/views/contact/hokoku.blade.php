@extends('layouts.app')

@section('content')

<html>
    <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>出張報告</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/main.css') }}"/>
	
    </head>
    <body>
        <div class="container">
			<header>
			   <div class="row">
						<button onclick="location.href='http://127.0.0.1:8000/contact/home'">ホームへ</button>
						<input type="text" name="busyo" id="busyo" form="hokoku_form" value="{{ Auth::user()->busyo }}" readonly>
						<input type="text" name="name" id="name" form="hokoku_form" value="{{ Auth::user()->name }}" readonly>
						<input type="text" name="id" id="id" form="hokoku_form" value="{{ $contact->id }}" readonly>
				</div>
			</header>
		</div>
	
		<hr>
				
		
		<div class="container">
			<form method="POST" action="{{ route('hokoku.store', ['id' => $contact->id])}}" class="row" id = "hokoku_form" onsubmit="return submitCheck()">
			@csrf
				<div class="col-sm-8 col-sm-offset-2">
					<div class="form-group">
						<label for="date"><span class="label-danger" style="color: white; background-color: red; border-radius: 1px;">必須</span> 日付</label>
						<br>
						<input type="date" id="today" name="date" class="form-control">
					</div>
					<div class="form-group">
						<label for="ikisaki"><span class="label-danger" style="color: white; background-color: red; border-radius: 1px;">必須</span> 行先</label>
						<br>
						<select id="ikisaki" name="ikisaki" class="form-control" placeholder="例：東京" autofocus required>
						@foreach($prefectures as $prefecture)
						<option value="{{ $prefecture -> name}}" > {{ $prefecture -> name}}</option>
						@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="date"><span class="label-danger" style="color: white; background-color: red; border-radius: 1px;">必須</span> 期間</label>
						<br>
						<input type="date" id="kikan1" name="kikan1" onchange="" class="form-control" placeholder="例：2020/04/01" value="{{ $contact->From}}" autofocus required>〜
						<input type="date" id="kikan2" name="kikan2" onchange="" class="form-control" placeholder="例：2020/04/02" value="{{ $contact->To}}" autofocus required>
						<input type="text" id="nissu" name="nissu" class="form-control" placeholder="例：1" autofocus required>
					</div>
					<div class="form-group">
						<label for="mokuteki"><span class="label-danger" style="color: white; background-color: red; border-radius: 1px;">必須</span> 目的</label>
						<br>
						<input type="text" id="mokuteki" name="mokuteki" class="form-control" placeholder="例：端末展開作業のため" value="{{ $contact->purchase}}" required>
					</div>
					<div class="form-group">
						<label for="date"><span class="label-danger" style="color: white; background-color: red; border-radius: 1px;">必須</span> 精算予定日</label>
						<br>
						<input type="date" id="seisan" name="seisan" class="form-control" placeholder="例：2020/04/01" value="{{ $contact->seisan}}" autofocus required>
					</div>
					<div class="form-group">
						<label for="textarea"><span class="label-danger" style="color: white; background-color: red; border-radius: 1px;">必須</span> 備考</label>
						<br>
						<input type="textarea" id="biko" name="biko" class="form-control" placeholder="例：端末展開作業のため" value="{{ $contact->bikou}}" autofocus required>
					</div>
					<div class="form-group" id="kotsukikan">
						<label for="text"> 交通費</label>
						@foreach(array_map(NULL,$kotukikanLists,$kukan_fromLists,$kukan_toLists,$kukan_moneyLists) as [$kotukikanList,$kukan_fromList,$kukan_toList,$kukan_moneyList])
						<br>
						<input type="text" id="kotukikan" name="kotukikan[]" class="form-control"  value="{{ $kotukikanList}}">
						<input type="text" id="kukan_from" name="kukan_from[]" class="form-control" value="{{ $kukan_fromList}}">
						<select name="example01">
							<option value="→">
								→
							</option>
							<option value="⇔">
								⇔
							</option>
						</select> 
						<input type="text" id="kukan_to[]" name="kukan_to[]" class="form-control" value="{{$kukan_toList}}">
						<input type="text" id="kukan_money[]" name="kukan_money[]" class="form-control" value="{{$kukan_moneyList}}">
						@endforeach

					<div class="form-group">
						<label for="nitto"><span class="label-danger" style="color: white; background-color: red; border-radius: 1px;">必須</span> 日当</label>
						<br>
						<input type="text" id="nitto" name="nitto" class="form-control" value="{{ Auth::user()->nitto}}" placeholder="{{ $contact->nitto}}" autofocus required>
					</div>
					<div class="form-group">
						<label for="syukuhaku"><span class="label-danger" style="color: white; background-color: red; border-radius: 1px;">必須</span> 宿泊費</label>
						<br>
						<input type="text" id="syukuhaku" name="syukuhaku" class="form-control" value="{{ $contact->syukuhakuhi}}" placeholder="{{ $contact->syukuhakuhi}}" autofocus required>
					</div>
					<div class="form-group">
						<label for="karibarai"><span class="label-danger" style="color: white; background-color: red; border-radius: 1px;">必須</span>仮払金</label>
						<br>
						<input type="text" id="karibarai" name="karibarai" class="form-control" placeholder="" value="{{ $contact->kariharai}}" autofocus required>
					</div>
					
					<button type="submit" class="btn btn-primary" onsubmit="return submitCheck()">報告する</button>
					<button type="button" class="btn btn-keisan" id="sumMoney" name="sumMoney">計算する</button>
				</div>
			</form>
		</div>
	</div>
	
		<hr>
	
		<div class="container">
			<footer>
			</footer>
		</div>
		<script src="{{ asset('/js/main.js') }}"></script>
    </body>
</html>

@endsection