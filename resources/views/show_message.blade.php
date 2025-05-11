@php
    use App\Models\User;
    use App\Models\Message;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('This is the content of the message!') }}
        </h2>

    </x-slot>
    @if ($type=="sent")
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="width: 60%">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="font-bold tracking-tight text-gray-900" style="font-size: 1.5rem">{{$message->objective}}</h1>
                        <p class="text-xsm font-semibold leading-6 text-gray-400">{{User::find($message->receiver_id)->email}}</p>
                        <br>
                        <br>
                        <p class="text-xl font-semibold leading-6 text-gray-600">{{$message->message}}</p>
                    </div>
                </div>

            </div>
            <hr>


        </div>
    @elseif ($type=="received")
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="width: 60%">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="font-bold tracking-tight text-gray-900" style="font-size: 1.5rem">{{$message->objective}}</h1>
                        <p class="text-xs font-semibold leading-6 text-gray-400">{{User::find($message->sender_id)->email}}</p>
                        <br>
                        <br>
                        <p class="text-xl font-semibold leading-6 text-gray-600">{{$message->message}}</p>
                    </div>
                    <div class="m-6 flex items-center justify-end gap-x-2">
                        <a href="/send_message/{{$message->sender_id}}" class="rounded-md px-3 py-2 text-sm font-semibold text-white shadow-sm" style="background-color: rgb(78 69 228); margin: 10px">Answer {{User::find($message->sender_id)->name}}</a>
                    </div>
                </div>

            </div>

        </div>
    @endif


</x-app-layout>
