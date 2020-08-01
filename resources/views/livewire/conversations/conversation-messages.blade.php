<div>
    <div class="py-2 px-3 overflow-scroll" style="height: 800px">
        <div class="flex justify-center mb-2">
            <div class="rounded py-2 px-4" style="background-color: #DDECF2">
                <p class="text-sm uppercase">
                    February 20, 2018
                </p>
            </div>
        </div>
        <div class="flex justify-center mb-4">
            <div class="rounded py-2 px-4" style="background-color: #FCF4CB">
                <p class="text-xs">
                    Messages to this chat and calls are now secured with end-to-end encryption. Tap for more info.
                </p>
            </div>
        </div>
        <div>
            @foreach ($messages as $message)
                @if($message->isOwn())
                    <livewire:conversations.conversation-message-own :message="$message" :key="$message->id" />
                @else
                    <livewire:conversations.conversation-message :message="$message" :key="$message->id" />
                @endif
            @endforeach
        </div>

    </div>
</div>
