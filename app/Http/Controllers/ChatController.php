<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\Statistical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    protected $statis;
    public function __construct(Statistical $statistical)
    {
        $this->statis = $statistical;
    }
     public function index()
    {
        return view('index');
    }

    public function broadcast(Request $request)
    {
        broadcast(new MessageSent($request->get('message')))->toOthers();

        return view('broadcast', ['message' => $request->get('message')]);
    }

    public function receive(Request $request)
    {
        return view('receive', ['message' => $request->get('message')]);
    }
    // Lấy tất cả tin nhắn giữa user và admin
    // public function fetchMessages($user_id)
    // {
    //     $auth_id = Auth::id();

    //     $messages = Message::where(function($q) use ($auth_id, $user_id){
    //         $q->where('from_user_id', $auth_id)->where('to_user_id', $user_id);
    //     })->orWhere(function($q) use ($auth_id, $user_id){
    //         $q->where('from_user_id', $user_id)->where('to_user_id', $auth_id);
    //     })->orderBy('created_at', 'asc')->get();

    //     return response()->json($messages);
    // }

    // // Gửi tin nhắn và lưu vào DB
    // public function sendMessage(Request $request)
    // {
    //     $request->validate([
    //         'to_user_id' => 'required|exists:users,id',
    //         'message' => 'required|string',
    //     ]);

    //     // Lưu vào CSDL
    //     $message = Message::create([
    //         'from_user_id' => Auth::id(),
    //         'to_user_id' => $request->to_user_id,
    //         'message' => $request->message,
    //     ]);

    //     // Phát event real-time
    //     broadcast(new MessageSent($message))->toOthers();

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => $message,
    //     ]);
    // }

    // public function list()
    // {
    //     $adminId = 1;
    //     $users = DB::table('messages')
    //         ->join('users', 'users.id', '=', 'messages.from_user_id')
    //         ->where('messages.from_user_id', '<>', $adminId)
    //         ->whereExists(function ($query) use ($adminId) {
    //             $query->select(DB::raw(1))
    //                 ->from('messages as m2')
    //                 ->where(function($q) use ($adminId) {
    //                     $q->whereColumn('m2.from_user_id', 'messages.from_user_id')
    //                         ->where('m2.to_user_id', $adminId);
    //                 });
    //         })
    //         ->select('users.id', 'users.name')
    //         ->distinct()
    //         ->get();

    //     return view('admin.messenger.main', compact('users'), [
    //         'thongbaos' => $this->statis->thongbao()
    //     ]);
    // }

}
