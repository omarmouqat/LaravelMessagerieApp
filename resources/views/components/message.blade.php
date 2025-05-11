<div>
    <a href={{($type=="sent")? "showSentMessage/$id_message" : "showReceivedMessage/$id_message" }}>
        <li class="flex justify-between gap-x-6 mt-6 border border-gray-900 rounded-md truncate" style="border-width: 2px">
            <div class="flex min-w-0 gap-x-4 ">
                <div class="min-w-0 flex-auto p-2">
                    <h1 class="text-xl font-bold leading-6 text-gray-900">{{$sender_name}}</h1>
                    <p class="text-sm font-semibold leading-6 text-gray-400">{{$sender_email}}</p>
                    <p class="mt-1 truncate text-xl leading-5 font-extrabold text-gray-1000">{{$objective}}</p>
                </div>

            </div>
            {{$slot}}

        </li>
    </a>


</div>
