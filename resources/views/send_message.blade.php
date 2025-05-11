@php
use App\Models\User;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Send Your Message') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route("create_message") }}">
                        <div class="space-y-12">
                        <div class="border-b border-gray-900/10 pb-12">

                            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-6">
                                <div class="sm:col-span-3 mt-4">
                                    <label for="receiver" class="block text-sm font-medium leading-6 text-gray-900">The Receiver</label>
                                    <div class="mt-2">
                                        <select id="receiver" name="receiver" autocomplete="receiver" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6 " required>
                                            <option value="">Select The Receiver!</option>
                                            @php
                                                $users =User::where('id', '<>', Auth::user()->id)
                                                ->orderBy('name', 'asc')
                                                ->get();
                                            @endphp
                                            @foreach ($users as $user)
                                                <option value="{{$user->id}}" {{($sender_id==$user->id)?"selected" : ""}}>{{$user->email}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="sm:col-span-4 mt-4">
                                    <label for="objective" class="block text-sm font-medium leading-6 text-gray-900">Object Of The Message</label>
                                    <div class="mt-2">
                                    <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                        <input type="text" name="objective" id="objective" autocomplete="objective" class="w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="The Objective" required>
                                    </div>
                                    </div>
                                </div>

                                <div class="col-span-full mt-4">
                                    <label for="message" class="block text-sm font-medium leading-6 text-gray-900">The Message</label>
                                    <div class="mt-2">
                                    <textarea id="message" name="message" rows="6" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required></textarea>
                                    </div>
                                    <p class="mt-3 text-sm leading-6 text-gray-600">Write The Content Of Your Message</p>
                                </div>


                            </div>

                        </div>
                        <div class="mt-6 flex items-center justify-end gap-x-2">
                            <a href="/sent_messages" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                            <span style="width: 1rem"></span>
                            <button type="submit" value="Save" class="rounded-md px-3 py-2 text-sm font-semibold text-white shadow-sm" style="background-color: rgb(78 69 228);">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
