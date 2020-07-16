@extends('layouts.app')

@section('content')
    <div class="flex">

        <div class="w-3/12">
            nav
        </div>

        <div class="w-7/12 border border-gray-700 border-t-0 border-b-0">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
            <app-conversation
            id="{{$tweet->id}}"
            />
        </div>

    </div>
@endsection
