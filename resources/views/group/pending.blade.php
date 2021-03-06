@extends('layouts.app', ['title' => __('Pending')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Pending requests')
    ])

    <div class="container mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <!-- pending card -->
                @include('group.partials.pendinglist')

                <!--Refused card -->
                @include('group.partials.refuselist')
            </div>
        </div>
        @include('group.subject.modal')
        
        @include('layouts.footers.auth')
    </div>
@endsection
