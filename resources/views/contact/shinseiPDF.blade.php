<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">

				<!--日本語は文字化け-->    
				laravel よね


                </div>
            </div>
        </div>
    </body>
</html>



<!-- <html>
</head>
<body>
<form action="" method="post" onsubmit="">
<header>

  <h1 align="center">出&nbsp;張&nbsp;申&nbsp;請&nbsp;書</h1>
  <table  width="925px" height="250px" align="center" >
  <tr style="height:32px;">
  <td>
  <div class="todayDate" style="text-align:right;" name="TODAY">
    <input id="today" type="date" name="TODAY">
  </div>
  </td>
  </tr>
  <div>
  <tr>
    <td>
    <div text-align="center" id="information" class="Left" >部署名 
      <select class="mainselect" id="list" name="DEPARTMENT_NAME" onchange="addElement(this);resetdata()" required="">
        <option value=""></option>
      </select>
    </div>
    </td>
    </tr>
    <br>
    <tr>
    <td>
    <div text-align="center" id="information!" class="Left" >氏&emsp;名 
      <select class="subbox" id="list2" name="FULL_NAME" onchange="addElements(this);" required="" onblur="priceChange(this)">
        <option value=""></option>
      </select>
    </div>
    <div class="inkan">印</div>
    </td>
    </tr>
  </div>
  </table>
</header> -->
<!--------------------------------------------------------------------------------------------------
　表のレイアウト
---------------------------------------------------------------------------------------------------->	
		<!-- <table align="center" frame="border" rules="all" width="500px"　height="px" class="table01">        
            <caption class="CAPTION-SIZE">
				出張について、下記のとおり申請いたします。
			</caption>
			<tr>
				<th style="font-size:18px" height="10" class="thIkiski">行&emsp;先</th>
				<td colspan="3"　class="thIkisaki2">
					<div id="information1">
						&ensp;<select id="DESTINATION" name="DESTINATION" onchange="addElement1(this);"  class="ikisakiA"　required="">
							<option value="">
								行先を選択
							</option>
						</select>
					</div>
				</td>
			</tr>
			<tr>
				<th class="kikanDaimei" style="font-size:18px">期&emsp;間</th>
				 <td colspan="3">
                   &ensp;<input id="dateA" name="DEADLINE01" type="date" value=''> 
                     ～
                   <input id="dateB" name="DEADLINE02" type="date" value=''>
                   <b style="font-size:18px" class="NISU">日数</b> 
                    <input id="date3" size="10"name="DEADLINE03"type="text"autocomplete="off">
                </td>
			</tr>
			<tr>
				<th style="font-size:18px">目&emsp;的</th>
				<td colspan="3"> &ensp;<input name="PURPOSE" size="75" type="text"　class="MOKUTEKIS"autocomplete="off"> </td>
			</tr>
			<tr>
				<th class="example" style="font-size:18px">精算予定日</th>
				<td colspan="3">&ensp;<input class="sesanyotei" name="SCHEDULED_SETTLEMENT_DETA" type="date"></td>
			</tr>
			<tr>
				<th style="font-size:18px">備&emsp;考</th>
				<td colspan="3">
                 <div class="bikouran">
                  <textarea id="date5" name="REMARKS" rows="5" cols="82" maxlength="215"　style="font-size:15px;"　 class="BIKOU"></textarea>
                 </div>
                </td>
			</tr>
			<tr>
				<th></th>
				<th class="thkotukikan" style="font-size:18px" width="">交通機関</th>
				<th class="thKukan" style="font-size:18px" width="">区&emsp;間</th>
				<th class="" style="font-size:18px" width="">&ensp;&ensp;金&emsp;額</th>
			</tr>
			<tr>
				<th rowspan="7" style="font-size:18px">交通費</th>
				<td width=""><input class="kotuKikan1" name="TRANSPORTATION_FACILITIES01" size="13" style="text-align:center;" type="text"autocomplete="off"></td>
				<td><input class="kotuKikan" name="SECTION01" size="18" style="text-align:center;" type="text"autocomplete="off"> 
                <select name="example01">
					<option value="→">
						→
					</option>
					<option value="⇔">
						⇔
					</option>
				</select> 
                <input class="kotuKikan" name="SECTION02" size="18" style="text-align:center;" type="text"autocomplete="off"></td>
				<td> &ensp;\ <input class="money" id="kotuhi01" name="AMOUNT_OF_MONEY01" size="11" style="text-align:center;" type="text" value="0"autocomplete="off"></td>
			</tr>
			<tr>
				<td><input class="kotuKikan1" name="TRANSPORTATION_FACILITIES02" size="13" style="text-align:center;" type="text"autocomplete="off"></td>
				<td><input class="kotuKikan" name="SECTION03" size="18" style="text-align:center;" type="text"autocomplete="off"> 
                <select name="example02">
					<option value="→">
						→
					</option>
					<option value="⇔">
						⇔
					</option>
				</select> <input class="kotuKikan" name="SECTION04" size="18" style="text-align:center;" type="text"autocomplete="off"></td>
				<td> &ensp;\ <input class="money" id="kotuhi02" name="AMOUNT_OF_MONEY02" size="11" style="text-align:center;" type="text" value="0"autocomplete="off"></td>
			</tr>
			<tr>
				<td><input class="kotuKikan1" name="TRANSPORTATION_FACILITIES03" size="13" style="text-align:center;" type="text"autocomplete="off"></td>
				<td><input class="kotuKikan" name="SECTION05" size="18" style="text-align:center;" type="text"autocomplete="off"> 
                <select name="example03">
					<option value="→">
						→
					</option>
					<option value="⇔">
						⇔
					</option>
				</select> 
                <input class="kotuKikan" name="SECTION06" size="18" style="text-align:center;" type="text"autocomplete="off"></td>
				<td> &ensp;\ <input class="money" id="kotuhi03" name="AMOUNT_OF_MONEY03" size="11" style="text-align:center;" type="text" value="0"autocomplete="off"></td>
			</tr>
			<tr>
				<td><input class="kotuKikan1" name="TRANSPORTATION_FACILITIES04" size="13" style="text-align:center;" type="text"autocomplete="off"></td>
				<td><input class="kotuKikan" name="SECTION07" size="18" style="text-align:center;" type="text"autocomplete="off"> 
                <select name="example04">
					<option value="→">
						→
					</option>
					<option value="⇔">
						⇔
					</option>
				</select> 
                <input class="kotuKikan" name="SECTION08" size="18" style="text-align:center;" type="text"autocomplete="off"></td>
				<td> &ensp;\ <input class="money" id="kotuhi04" name="AMOUNT_OF_MONEY04" size="11" style="text-align:center;" type="text" value="0"autocomplete="off"></td>
			</tr>
			<tr>
				<td><input class="kotuKikan1" name="TRANSPORTATION_FACILITIES05" size="13" style="text-align:center;" type="text"autocomplete="off"></td>
				<td><input class="kotuKikan" name="SECTION09" size="18" style="text-align:center;" type="text"autocomplete="off"> 
                <select name="example05">
					<option value="→">
						→
					</option>
					<option value="⇔">
						⇔
					</option>
				</select> 
                <input class="kotuKikan" name="SECTION10" size="18" style="text-align:center;" type="text"autocomplete="off"></td>
				<td> &ensp;\ <input class="money" id="kotuhi05" name="AMOUNT_OF_MONEY05" size="11" style="text-align:center;" type="text" value="0"autocomplete="off"></td>
			</tr>
			<tr>
				<td><input class="kotuKikan1" name="TRANSPORTATION_FACILITIES06" size="13" style="text-align:center;" type="text"autocomplete="off"></td>
				<td><input class="kotuKikan" name="SECTION11" size="18" style="text-align:center;" type="text"autocomplete="off"> 
                <select name="example06">
					<option value="→">
						→
					</option>
					<option value="⇔">
						⇔
					</option>
				</select> 
                <input class="kotuKikan" name="SECTION12" size="18" style="text-align:center;" type="text"autocomplete="off"></td>
				<td> &ensp;\ <input class="money" id="kotuhi06" name="AMOUNT_OF_MONEY06" size="11" style="text-align:center;" type="text" value="0"autocomplete="off"></td>
			</tr>
			<tr>
				<td><input class="kotuKikan1" name="TRANSPORTATION_FACILITIES07" size="13" style="text-align:center;" type="text"autocomplete="off"></td>
				<td><input class="kotuKikan" name="SECTION13" size="18" style="text-align:center" type="text"autocomplete="off"> 
                <select name="example07">
					<option value="→">
						→
					</option>
					<option value="⇔">
						⇔
					</option>
				</select> 
                <input class="kotuKikan" name="SECTION14" size="18" style="text-align:center;" type="text"autocomplete="off"></td>
				<td> &ensp;\ <input class="money" id="kotuhi07" name="AMOUNT_OF_MONEY07" size="11" style="text-align:center;" type="text" value="0"autocomplete="off"></td>
			</tr>
			<tr>
				<th style="font-size:18px">日&emsp;当</th>
				<td> &ensp;\ <input id="date7" name="DAILY_ALLOWANCE" onblur="dateMath" size="10" style="text-align:center;" type="text" value=""autocomplete="off"></td>
				<td style="font-size:17px" align="right"><b>宿泊費&ensp;</b></td>
				<td> &ensp;\ <input class="money" id="date6" name="ACCOMMODATION_EXPENSES" size="11" style="text-align:center;" type="text" value=""autocomplete="off"></td>
			</tr>
			<tr>
				<th style="font-size:18px" class="PD">仮払い金額</th>
				<td> &ensp;\ <input id="date8" name="TEMPORARY_ADVANCE" required="" size="10" style="text-align:center;" type="text"autocomplete="off"></td>
				<td><span style="float:left;"><b style="font-size:17px">&ensp;出納&emsp;&emsp;&emsp;年&emsp;&emsp;月&emsp;&emsp;日</b></span> <span style="float:right;"><b style="font-size:17px">受領印&ensp;</b></span></td>
                <input class="kotuKikan" name="HIDDEN_DATE" size="18" style="text-align:center;"type="hidden"value="〇"autocomplete="off">
				<td></td>
			</tr>
		</table>
        <table width="925px" align="center" cellspacing="collapse" class="tableButton">
         <tr>
        <div style="text-align:left;" class="button01">
		    <th style="text-align:left;" class=buttonTd width="20px"><input type="submit" value="送信" name="送信" id="mailer" onclick="Mail1()" onsubmit="check()" class="button"></th>
            <th style="text-align:left;" class=buttonTd width="20px"><input type="button" value="計算" name="計算" id="clickDate"  onclick="dateKeisan" class="button"></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
	    </div>
        </tr>
        </table>
    </form>
	</body>
</html> -->

