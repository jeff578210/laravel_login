<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function checkLogin(){
        $account = $_POST['account'];
        $password = $_POST['password'];
        $users = DB::select('select * from utable where uAcc = ?',[$account]);
        if($users!=[]){
            // 判斷是否有找到帳號
            if(password_verify($password,$users[0]->uPw)){
                // 判斷密碼是否正確
                return view('home')->with('userData',$users);
            }else{
                return "帳號密碼錯誤";
            }
        }else{
            return "帳號密碼錯誤";
        }
        
    }
    public function accCheck(Request $request){
        $account = $request->input('account');
        $users =DB::select('select uAcc from utable where uAcc=?',[$account]);
        // 如果有找到回傳1沒找到回傳0
        if($users == []){
            return 0;
        }else{
            return 1;
        }
    }
    public function createUser(){
        $account = $_POST['account'];
        $password =password_hash( $_POST['passWord'],PASSWORD_DEFAULT);
        $username =$_POST['userName'];
        DB::insert('insert into utable (uName,uAcc,uPW) values(?,?,?)',[$username,$account,$password]);
        return view('index');
    }
}
