@extends('layouts.app')

@section('content')
    <div class="flex">

            <div class="w-3/12 border border-gray-700 text-center">
                <app-sidebar></app-sidebar>
        </div>

        <div class="w-7/12 border border-gray-700 border-t-0 border-b-0">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
            <notifications/>
        </div>

    </div>
@endsection
