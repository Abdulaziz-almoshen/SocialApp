<div>
    @if($conversations->count())
        @foreach ($conversations as $conversation)
            <a href="{{ route("converations.show",$conversation ) }}" class="block bg-white p-4 mb-2">
                <div class="font-bold text-muted">
                    @foreach($conversation->users as $user)

                        {{ $user->present()->name() }}@if($conversation->users->last() != $user), @endif
                    @endforeach
                </div>

                <p class="text-muted mb-0 text-truncate flex-1 items-center">
                    @if(!auth()->user()->hasRead($conversation))
                        <span class="bg-blue-400 mr-2 rounded-full" style="width: 10px; height: 10px;"></span>
                    @endif
                    <span>{{ $conversation->messages->first()->body}}</span>
                </p>
            </a>
        @endforeach
    @else
        <p class="text-muted">No conversations</p>
    @endif
</div>
