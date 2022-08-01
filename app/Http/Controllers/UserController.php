<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        // $users =  User::all();
        // cha con cùng bảng
        // $room = Room::find(1);
        // $roomcon = $room->oneparent->children;
        $users = User::select('*')
            ->where('id','>',3)
            ->with('room')
            ->paginate(5); // truy vấn thêm qan hệ trc khi trả jeets quả qua view
        return view('admin.users.list', [
            'list_user' => $users,
        ]);
    }
    public function delete($id)
    {
        User::find($id)->delete();
        return back()->with('thongbao', 'xoa thanh cong');
        // User::destroy($id);
        // return back()->with('thongbao', 'xoa thanh cong');
    }
    public function create()
    {
        $rooms = Room::select('id', 'name')->get();
        return view('admin.users.create', [
            'rooms' => $rooms
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'require|min:6|max:32',
            'email' => 'require|min:6|max:32|email',
            'avatar' => 'file',
            'birthday' => 'require|date'
        ]);
        // nếu k pass các điều kiện trên thì quay lại form {error}
        //1.khởi tạo đối tượng user mới
        $user = new User();
        //2.Cập nhật gias trị cho các thuộc tính của $user
        //$user->name = $request->name;
        $user->fill($request->all()); // đặt name ở form 
        //3. Sử lý file avatar gửi lên 
        if ($request->hasFile('avatar')) {
            # Nếu trường avatar có file thì trả về true
            $avatar = $request->avatar;
            $avatarName = $avatar->hashName();
            $avatarName = $request->username . '_' . $avatarName;
            $user->avatar = $avatar->storeAs('images/users', $avatarName);
        } else {
            $user->avatar = '';
        }
        //4. Lưu
        $user->save();
        return redirect()->route('users.list');
    }
    public function search(Request $request)
    {
        $search = $request->search;
        if (empty($search)) {
            return  Room::orderby('name', 'asc')
                ->select('id', 'name')
                ->limit(5)
                ->get();
        } else {
            $employees = Room::orderby('name', 'asc')
                ->select('id', 'name')
                ->where('name', 'like', '%' . $search . '%')
                ->limit(5)
                ->get();
        }
        $response = array();
        foreach ($employees as $item) {
            $response[] = array(
                'id' => $item->id,
                'name' => $item->name
            );
        }
        return response()->json($response);
    }
    public function edit($id)
    {
        $rooms = Room::select('id', 'name')->get();
        $user = User::where('id', $id)->first();
        $user->birthday = date('Y-m-d', strtotime($user->birthday));
        return view('admin.users.edit', [
            'fisrt_user' => $user,
            'rooms' => $rooms
        ]);
    }
    public function update(Request $request, User $user)
    {
        $user->fill($request->all());
        if ($request->hasFile('avatar_moi')) {
            $avatar = $request->avatar_before;
            $avatarName = $avatar->hashName();
            $avatarName = $user->username . '_' . $avatarName;
            $user->avatar = $avatar->storeAs('images/users', $avatarName);
        }
        $user->save();
        // );
        return redirect()->route('users.list')->with('thongbao', 'sua thanh cong');
    }
}
