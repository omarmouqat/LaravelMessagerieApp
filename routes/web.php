<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;
use App\Http\Controllers\MessageController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/received_messages', function () {
    $user = User::find(Auth::user()->id);
    $received_messages = $user->receivedMessages()->orderBy('id', 'desc')->paginate(3);

    return view('received_messages', [
        'messages' => $received_messages
    ]);
})->middleware(['auth', 'verified'])->name('received_messages');


Route::get('/sent_messages', function () {
    $user = User::find(Auth::user()->id);
    $sent_messages = $user->sentMessages()->orderBy('id', 'desc')->paginate(3);

    return view('sent_messages', [
        'messages' => $sent_messages
    ]);
})->middleware(['auth', 'verified'])->name('sent_messages');


Route::get('/send_message', function () {
    return view('send_message',['sender_id'=>""]);
})->middleware(['auth', 'verified'])->name('send_message');

Route::get('/send_message/send',
[
    MessageController::class,'store'
])->middleware(['auth', 'verified'])->name('create_message');


Route::get('/send_message/{id}',
[
    MessageController::class,'sendMessageTo'
])->middleware(['auth', 'verified'])->name('message.sendTo');



Route::delete('delete message/{id}',
[
    MessageController::class,'destroy'
])->middleware(['auth', 'verified'])->name('message.destroy');

Route::get('showSentMessage/{id}',
[
    MessageController::class,'showsent'
])->middleware(['auth', 'verified'])->name('sentmessage.show');

Route::get('showReceivedMessage/{id}',
[
    MessageController::class,'showreceived'
])->middleware(['auth', 'verified'])->name('receivedmessage.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
