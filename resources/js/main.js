window.onload = function(){
    let date = new Date;
    let yyyy = date.getFullYear();
    let mm = ("00" + (date.getMonth()+1)).slice(-2);
    let dd = ("00" + date.getDate()).slice(-2);
    console.log(yyyy);
    console.log(mm);
    console.log(dd);
    let todayData = yyyy + "-" +  mm + "-" + dd;
    document.getElementById("today").value = todayData; 
    let date1 = document.getElementById("kikan1").value;
    let date2 = document.getElementById("kikan2").value;
    let date3 = document.getElementById("nissu").value;
}


const btn = document.getElementById('sumMoney');
 
btn.addEventListener("click", function(){
  let date0 = "";
  let date1 = document.getElementById("kikan1").value;
  let date2 = document.getElementById("kikan2").value;
  console.log(date2);
  if(date1!=="" && date2!==""){
        let d1 = new Date(date1);
        let d2 = new Date(date2);
        let d3 = d2.getTime()-d1.getTime();
        date0 = d3/(60*60*24*1000); 
    }
    console.log(date0);
    document.getElementById("nissu").value = date0;
    let nittoInput = document.getElementById("nitto").value;
     nittoInput = nittoInput.replace(/,/g, '');
     console.log(nittoInput);
     nittoInput = parseInt(nittoInput);
     console.log(nittoInput);
     nittoInput = nittoInput * date0;
     let syukuhakuhiInput = document.getElementById("syukuhaku").value;
     syukuhakuhiInput = syukuhakuhiInput.replace(/,/g, '');
     console.log(syukuhakuhiInput); 
     syukuhakuhiInput = parseInt(syukuhakuhiInput);
     console.log(syukuhakuhiInput); 
     syukuhakuhiInput = syukuhakuhiInput * (date0 - 1);
     console.log(syukuhakuhiInput); 
     document.getElementById("syukuhaku").value = syukuhakuhiInput;
     console.log(syukuhakuhiInput); 
     let sum = nittoInput + syukuhakuhiInput;
     document.getElementById("karibarai").value = sum;
     document.getElementById("nissu").value;
}, false);

function submitCheck(){
    /* 確認ダイアログ表示 */
    let flag = confirm ( "送信してもよろしいですか？\n\n送信したくない場合は[キャンセル]ボタンを押して下さい");
    /* send_flg が TRUEなら送信、FALSEなら送信しない */
    return flag;
}