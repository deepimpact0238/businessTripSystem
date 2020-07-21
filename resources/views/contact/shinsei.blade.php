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
						<button onclick="location.href='./home'">ホームへ</button>
						<input type="text" name="busyo" id="busyo" form="shinsei_form" value="{{ Auth::user()->busyo }}" readonly>
						<input type="text" name="name" id="name" form="shinsei_form" value="{{ Auth::user()->name }}" readonly>
				</div>
			</header>
		</div>
	
		<hr>

		
		<div class="container">
			<form action="{{route('shinsei.store')}}" method="POST" class="row" id = "shinsei_form" onsubmit="return submitCheck()">
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
						<input type="date" id="kikan1" name="kikan1" onchange="" class="form-control" placeholder="例：2020/04/01" autofocus required>〜
						<input type="date" id="kikan2" name="kikan2" onchange="" class="form-control" placeholder="例：2020/04/02" autofocus required>
						<input type="text" id="nissu" name="nissu" class="form-control" placeholder="例：1" autofocus required>
					</div>
					<div class="form-group">
						<label for="mokuteki"><span class="label-danger" style="color: white; background-color: red; border-radius: 1px;">必須</span> 目的</label>
						<br>
						<input type="text" id="mokuteki" name="mokuteki" class="form-control" placeholder="例：端末展開作業のため" required>
					</div>
					<div class="form-group">
						<label for="date"><span class="label-danger" style="color: white; background-color: red; border-radius: 1px;">必須</span> 精算予定日</label>
						<br>
						<input type="date" id="seisan" name="seisan" class="form-control" placeholder="例：2020/04/01" autofocus required>
					</div>
					<div class="form-group">
						<label for="textarea"><span class="label-danger" style="color: white; background-color: red; border-radius: 1px;">必須</span> 備考</label>
						<br>
						<input type="textarea" id="biko" name="biko" class="form-control" placeholder="例：端末展開作業のため" autofocus required>
					</div>
					<div class="form-group" id="kotsukikan">
						<label for="text"> 交通費</label>
						<br>
						<template id="kotsukikanTemplate">
						<input type="text" id="kotukikan" name="kotukikan[]" class="form-control" placeholder="例：JR">
						<input type="text" id="kukan_from" name="kukan_from[]" class="form-control" placeholder="例：三ノ宮">
						<select name="example01">
							<option value="→">
								→
							</option>
							<option value="⇔">
								⇔
							</option>
						</select> 
						<input type="text" id="kukan_to[]" name="kukan_to[]" class="form-control" placeholder="例：大阪">
						<input type="text" id="kukan_money[]" name="kukan_money[]" class="form-control" placeholder="例：410">
						</template>
						<input type="text" id="kotukikan[]" name="kotukikan[]" class="form-control" placeholder="例：JR">
						<input type="text" id="kukan_from[]" name="kukan_from[]" class="form-control" placeholder="例：三ノ宮"d>
						<select name="example[]">
							<option value="→">
								→
							</option>
							<option value="⇔">
								⇔
							</option>
						</select> 
						<input type="text" id="kukan_to[]" name="kukan_to[]" class="form-control" placeholder="例：大阪">
						<input type="text" id="kukan_money[]" name="kukan_money[]" class="form-control" placeholder="例：410">
						<br>
						<input type="text" id="kotukikan[]" name="kotukikan[]" class="form-control" placeholder="例：JR">
						<input type="text" id="kukan_from[]" name="kukan_from[]" class="form-control" placeholder="例：三ノ宮">
						<select name="example[]">
							<option value="→">
								→
							</option>
							<option value="⇔">
								⇔
							</option>
						</select> 
						<input type="text" id="kukan_to[]" name="kukan_to[]" class="form-control" placeholder="例：大阪">
						<input type="text" id="kukan_money[]" name="kukan_money[]" class="form-control" placeholder="例：410">
						<br>
						<input type="text" id="kotukikan[]" name="kotukikan[]" class="form-control" placeholder="例：JR">
						<input type="text" id="kukan_from[]" name="kukan_from[]" class="form-control" placeholder="例：三ノ宮">
						<select name="example[]">
							<option value="→">
								→
							</option>
							<option value="⇔">
								⇔
							</option>
						</select> 
						<input type="text" id="kukan_to[]" name="kukan_to[]" class="form-control" placeholder="例：大阪">
						<input type="text" id="kukan_money[]" name="kukan_money[]" class="form-control" placeholder="例：410">
						<br>
						<input type="text" id="kotukikan[]" name="kotukikan[]" class="form-control" placeholder="例：JR">
						<input type="text" id="kukan_from[]" name="kukan_from[]" class="form-control" placeholder="例：三ノ宮">
						<select name="example[]">
							<option value="→">
								→
							</option>
							<option value="⇔">
								⇔
							</option>
						</select> 
						<input type="text" id="kukan_to[]" name="kukan_to[]" class="form-control" placeholder="例：大阪">
						<input type="text" id="kukan_money[]" name="kukan_money[]" class="form-control" placeholder="例：410">
						<br>
						<input type="text" id="kotukikan[]" name="kotukikan[]" class="form-control" placeholder="例：JR">
						<input type="text" id="kukan_from[]" name="kukan_from[]" class="form-control" placeholder="例：三ノ宮">
						<select name="example[]">
							<option value="→">
								→
							</option>
							<option value="⇔">
								⇔
							</option>
						</select> 
						<input type="text" id="kukan_to[]" name="kukan_to[]" class="form-control" placeholder="例：大阪">
						<input type="text" id="kukan_money[]" name="kukan_money[]" class="form-control" placeholder="例：410">
						<br>
						<input type="text" id="kotukikan[]" name="kotukikan[]" class="form-control" placeholder="例：JR">
						<input type="text" id="kukan_from[]" name="kukan_from[]" class="form-control" placeholder="例：三ノ宮" >
						<select name="example[]">
							<option value="→">
								→
							</option>
							<option value="⇔">
								⇔
							</option>
						</select> 
						<input type="text" id="kukan_to[]" name="kukan_to[]" class="form-control" placeholder="例：大阪">
						<input type="text" id="kukan_money[]" name="kukan_money[]" class="form-control" placeholder="例：410">
						<br>
						<input type="text" id="kotukikan[]" name="kotukikan[]" class="form-control" placeholder="例：JR">
						<input type="text" id="kukan_from[]" name="kukan_from[]" class="form-control" placeholder="例：三ノ宮">
						<select name="example[]">
							<option value="→">
								→
							</option>
							<option value="⇔">
								⇔
							</option>
						</select> 
						<input type="text" id="kukan_to[]" name="kukan_to[]" class="form-control" placeholder="例：大阪">
						<input type="text" id="kukan_money[]" name="kukan_money[]" class="form-control" placeholder="例：410">
						<br>
						<template id="kotsuhiPlusButtonTemplate">
						<button type="button" onclick="moneyKeisan()" name="kotsuhiPlusButton" id="kotsuhi_Plus">+</button>
					    </template>
					    <button type="button" onclick="moneyKeisan()" name="kotsuhiPlusButton" id="kotsuhi_Plus">+</button>
					</div>

					<div class="form-group">
						<label for="nitto"><span class="label-danger" style="color: white; background-color: red; border-radius: 1px;">必須</span> 日当</label>
						<br>
						<input type="text" id="nitto" name="nitto" class="form-control" value="{{ Auth::user()->nitto}}" placeholder="" autofocus required>
					</div>
					<div class="form-group">
						<label for="syukuhaku"><span class="label-danger" style="color: white; background-color: red; border-radius: 1px;">必須</span> 宿泊費</label>
						<br>
						<input type="text" id="syukuhaku" name="syukuhaku" class="form-control" value="{{ Auth::user()->syukuhakuhi}}" placeholder="" autofocus required>
					</div>
					<div class="form-group">
						<label for="karibarai"><span class="label-danger" style="color: white; background-color: red; border-radius: 1px;">必須</span>仮払金</label>
						<br>
						<input type="text" id="karibarai" name="karibarai" class="form-control" placeholder="" autofocus required>
					</div>
					
					<button type="submit" class="btn btn-primary" onsubmit="return submitCheck()" >送信する</button>
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