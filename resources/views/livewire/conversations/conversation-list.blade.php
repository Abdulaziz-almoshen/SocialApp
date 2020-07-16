    <div>
        @if($conversations->count())
            @foreach($conversations as $conversation)
                <div class="px-3 pt-1 mt-1 flex justify-between">
                    <a href="{{ route("converations.show",$conversation ) }}"><img
                            src="https://s3.amazonaws.com/uifaces/faces/twitter/derekebradley/128.jpg"
                            class="w-12 h-12 rounded-full"
                            alt="dp"
                        />
                        <div class="flex flex-wrap ml-4 pb-4 w-full">

                            <div class="flex">
                                @foreach($conversation->users as $user)
                                    <div
                                        class="inline-flex justify-between font-bold text-gray-300"> {{ $user->present()->name() }} {{ $loop->last ? null : ',' }}
                                    </div>
                                @endforeach</div>
                            <div class="inline-flex justify-between w-full  text-gray-300">last message</div>
                            <div class="inline-flex w-full text-sm text-gray-500">
              <span class="pr-2">
                <svg
                    class="h-4"
                    role="img"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512"
                    style="transform: rotate(225deg); color: #128C7E;"
                >
                  <path
                      fill="currentColor"
                      d="M413.1 222.5l22.2 22.2c9.4 9.4 9.4 24.6 0 33.9L241 473c-9.4 9.4-24.6 9.4-33.9 0L12.7 278.6c-9.4-9.4-9.4-24.6 0-33.9l22.2-22.2c9.5-9.5 25-9.3 34.3.4L184 343.4V56c0-13.3 10.7-24 24-24h32c13.3 0 24 10.7 24 24v287.4l114.8-120.5c9.3-9.8 24.8-10 34.3-.4z"
                  ></path>
                </svg>
              </span>
                                Today, 10:30
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <p class="text-gray-500">no list available</p>
        @endif
    </div>
