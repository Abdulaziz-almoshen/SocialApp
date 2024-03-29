@extends('layouts.app')

@section('content')
    <div class="flex">
        <div class="w-3/12 text-center">
            <app-sidebar></app-sidebar>
        </div>
        <div class="w-3/12 border border-gray-700 border-t-0 border-b-0">
            <livewire:conversations.conversation-list :conversations="$conversations"/>
{{--            <livewire:conversations.conversation-list :conversations="$conversations"/>--}}
        </div>
        <div class="w-7/12 text-center w-full h-full flex flex-col bg-white">
            <!-- Chat content -->
                <!-- Chat messages -->
            <div class="py-2 px-3 bg-grey-lighter flex flex-row justify-between items-center">
{{--                <livewire:conversations.conversation-users conversation="$conversation" :users="$conversation" />--}}
                <app-users-panel :users="{{$conversation}}"></app-users-panel>

            </div>
            <!-- Messages -->
            <div class="flex-1 overflow-scroll" style="background-color: #DAD3CC">
                <app-messages :messages="{{ $messages }}" :auth="{{auth()->user()}}" :conversations="{{$uuid}}"></app-messages>
{{--                <livewire:conversations.conversation-messages :conversation="$conversation"  :messages="$conversation->messages" />--}}
                <!-- Input -->
            </div>

{{--            <livewire:conversations.conversation-reply :conversation="$conversation" />--}}

        </div>
    </div>
    </div>
@endsection
