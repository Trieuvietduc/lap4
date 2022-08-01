<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function list(){
        $room = Room::with('users')->paginate(9);
        return view('admin.room.list',[
            'room'=>$room
        ]);
    }
}
