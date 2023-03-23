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
    }
    .indexDiv{
        width: 100vw;
        height:100vh;
        background-color:black;
        display:flex;
        justify-content: center;
        align-items: center;
    }
    .loginDive{
        background-color: black;
        border: 1px solid white;
        box-sizing: border-box;
        width: 700px;
        height: 500px;
        display:flex;
        justify-content: center;
        align-items: center;
    }
    .loginDive:hover{
        background-color: #4cc9f0;
        box-shadow: 10px 10px 99px 6px rgba(76,201,240,1);
        border:0
    }
    .loginDive:hover .accInput,
    .loginDive:hover .PWInput,
    .loginDive:hover .submit,
    .loginDive:hover .createUser
    {
        background-color:white;
    }
    .formDiv{
        display:flex;
        flex-direction: column;
    }
    .getAccPW{
        display:flex;
        flex-direction: column;
    }
    .accInput{
        background-color:black;
        outline: none;
        border: 0;
        width: 400px;
        height: 30px;
        border-radius: 10px;
        padding: 5px 10px 5px 10px ;
        margin-bottom:30px
    }
    .PWInput{
        background-color:black;
        outline: none;
        border: 0;
        width: 400px;
        height: 30px;
        border-radius: 10px;
        padding: 5px 10px 5px 10px ;
        margin-bottom:30px
    }
    .submit{
        width: 100%;
        height: 30px;
        border-radius: 10px;
        background-color:black;
        border:0;
        font-weight:bold;
        font-style:normal;
        font-size:1rem;
        cursor: pointer;
        margin-bottom:10px
    }
    .createUser{
        width: 100%;
        height: 30px;
        background-color:black;
        border-radius: 10px;
        border:0;
        cursor: pointer;
        color:black;
        display:flex;
        justify-content: center;
    }
    .createUser >a{
        width: 100%;
        height: 100%;
        color:black;
        text-decoration:none;
        outline:none;
        color:#000;
        display:flex;
        justify-content: center;
        align-items: center;
    }
    </style>
</head>
<body>
    <div class="indexDiv">
        <div class="loginDive">
            <div class="getAccPW">
                <form action="/login" class="formDiv" method="post">
                    {{ csrf_field() }}
                    <b style="margin-bottom:5px ;cursor:default">帳號</b>
                    <input type="email" class="accInput" name="account" required>
                    <b style="margin-bottom:5px ;cursor:default">密碼</b>
                    <input type="password" id="password" class="PWInput" name="password" required onchange='check()'>
                    <input type="submit" value="登入" class="submit" id="submit" disabled>
                </form>
                <div class="createUser">
                    <a href="/register"><b>註冊</b></a>
                </div>
            </div>
        </div>
    </div>
    <script>
        function check(){
            // 判斷密碼是否符合正規表達式
            let pwd = document.getElementById('password').value;
            let check = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d]{8,}$/;
            let submit = document.getElementById('submit');
            if(check.test(pwd)){
                submit.removeAttribute('disabled');
            }else{
                submit.setAttribute('disabled',true);
            }
        }
    </script>
</body>
</html>