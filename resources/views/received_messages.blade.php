@php
    use App\Models\User;
    use App\Models\Message;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Received Messages') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul role="list" class="divide-y divide-gray-100">
                        {{ __("Those are all the recieved messages !") }}
                        @foreach ($messages as $message)
                            @php
                                $message_writer = User::find($message->sender_id);
                            @endphp
                            <x-message>
                                <x-slot name="sender_name">
                                    {{$message_writer->name}}
                                </x-slot>
                                <x-slot name="sender_email">
                                    {{$message_writer->email}}
                                </x-slot>
                                <x-slot name="objective">
                                    {{$message->objective}}
                                </x-slot>
                                <x-slot name="type">
                                    {{"received"}}
                                </x-slot>
                                <x-slot name="id_message">
                                    {{$message->id}}
                                </x-slot>

                            </x-message>
                        @endforeach


                    </ul>

                </div>
                <br>
                <div class="p-2">{{ $messages->links() }}</div>

            </div>

        </div>

    </div>

</x-app-layout>
