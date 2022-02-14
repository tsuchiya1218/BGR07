function checkout(){
    // var example = document.getElementById("example").value; 
    var gokei = 10000;

    if(confirm( "合計金額は　"+gokei+"　円です。よろしいですか？")==true){
        location.href="./order_checkout.php";
    }
    else{
        return;
    }
}

function choice(){

    var checked = document.getElementsByName("checkout");

    if(checked[0].checked == true){
        if(confirm( "お支払方法は　クレジットカード決済です。よろしいですか？")==true){
            location.href="./order_comp.php";
        }
        else{
            return;
        }
    }else if(checked[1].checked == true){
        if(confirm( "お支払方法は　コンビニ決済です。よろしいですか？")==true){
            location.href="./order_comp.php";
        }
        else{
            return;
        }
    }else
        alert('支払方法をせんたくしてください。');
}