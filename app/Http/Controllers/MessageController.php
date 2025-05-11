<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function showsent($id){
        $message = Message::findOrFail($id);
        if (Auth::user() == $message->sender){
            return view('show_message', [
                'message'=>$message,
                'type'=>"sent",
            ]);
        }else{
            abort(404, 'The page you are looking for does not exist.');

        }


    }
    public function showreceived($id){
        $message = Message::findOrFail($id);
        if (Auth::user() == $message->receiver){
            return view('show_message', [
                'message'=>$message,
                'type'=>"received",
            ]);
        }else{
            abort(404, 'The page you are looking for does not exist.');
        }
    }
    public function destroy($id)
    {
        // Find the user by ID
        $message = Message::findOrFail($id);

        // Delete the user
        $message->delete();

        // Redirect or respond
        return redirect()->route('sent_messages')->with('success', 'Message deleted successfully.');
    }
    public function sendMessageTo($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Redirect or respond
        return view('send_message',['sender_id'=>$user->id]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'receiver' => ['required', 'integer'],
            'objective' => ['required', 'string'],
            'message' => ['required', 'string'],
        ]);

        Message::create([
            'sender_id' => Auth::user()->id,
            'receiver_id' => $request->receiver,
            'objective' => $request->objective,
            'message' => $request->message,
        ]);

        return redirect(route('sent_messages', absolute: false));
    }

}
