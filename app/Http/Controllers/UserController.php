<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index() // ユーザ一覧を返します
    {
        $users = User::paginate(1);
        if($users->getCollection()->isEmpty()){
            return response()->json(['error' => 'Record Not Found'],404);
        }
        return $users;
    }
    public function show($id) // ユーザIDをキーにユーザ情報詳細を返します
    {
        $user = User::findOrFail($id);
        return $user;
    }
    public function update(Request $request, $id) // ユーザIDをキーにユーザ情報を更新します
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return $user;
    }
    public function store(Request $request) // ユーザを追加します
    {
        $user = new User;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->save();
        return $user;
    }
    public function destroy($id) // ユーザIDをキーにユーザ情報を削除します
    {
        $user = User::findOrFail($id);
        $user->delete();
        return '';
    }
}