<div>
    <div class="flex items-center">
        <div>
            <img class="w-10 h-10 rounded-full" src="https://darrenjameseeley.files.wordpress.com/2014/09/expendables3.jpeg"/>
        </div>
        <div class="">
            <p class="text-grey-darkest">
                Private chat
            </p>
            <p class="text-grey-darker text-xs mt-1 ml-2 float-left">
                    @foreach($users as $user)
                        {{ $user->present()->name() }} {{ $loop->last ? null : ',' }}
                    @endforeach
            </p>
        </div>
    </div>
</div>
