@extends('layouts.app')

@section('content')
    <div class="flex">

        <div class="w-3/12 text-center">
            <app-sidebar></app-sidebar>
        </div>

        <div class="w-7/12 border border-gray-700 border-t-0 border-b-0">

            <app-timeline></app-timeline>


        </div>

    </div>
@endsection
<script>

</script>
