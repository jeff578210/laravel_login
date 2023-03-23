<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            padding: 0;
            margin:0;
            overflow-x: hidden;
        }
        .formDiv{
            width: 100vw;
            height: 100vh;
            display:flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <form action="/createUser" class="formDiv" method="post">
        {{csrf_field()}}
        <p>帳號(email)</p>
        <input type="email" name="account" id="account" onchange="checkAcc()">
        <span id="msg" style="color:red"></span>
        <p>密碼(請使用大小寫英文字母與數字的混和,最少8個字)</p>
        <input type="text" name="passWord" id="password" onchange="checkPW()">
        <span id="msgPW"></span>
        <p>姓名(最大字數20)</p>
        <input type="text" style="margin-bottom:10px" name="userName" maxlength="20">
        <input type="submit">
    </form>
    <script>
        const xhttp = new XMLHttpRequest();
        function checkAcc(){
            let account = document.getElementById('account').value;
            // 抓到account的值
            xhttp.onreadystatechange = afterCheck;
            // 儲存函式,每當readyState 屬性改變時,就執行該函式
            xhttp.open("GET","/memberCheck?account="+account,true);
            // 傳送資料到/memberCheck
            // true 非同步 false 同步
            xhttp.send();
        }
        function afterCheck(){
            // 判斷帳號是否重複回傳的值0,1
            if(xhttp.readyState == 4 && xhttp.status == 200){
                let msg = document.getElementById('msg');
                // console.log(xhttp.responseText);
                if(xhttp.responseText == 1){
                    msg.innerHTML = '帳號重複';
                }else{
                    msg.innerHTML = '帳號可以使用';
                    msg.style.color = "green";
                }
            }
        }
        function checkPW(){
            // 判斷密碼是否符合正規表達式
            let pwd = document.getElementById('password').value;
            let check = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d]{8,}$/;
            let msgPW = document.getElementById('msgPW');
            if(check.test(pwd)){
                msgPW.innerHTML = '密碼可以使用';
                msgPW.style.color = "green";
            }else{
                msgPW.innerHTML = '密碼格式錯誤';
                msgPW.style.color = "red";
            }
        }
    </script>
</body>
</html>