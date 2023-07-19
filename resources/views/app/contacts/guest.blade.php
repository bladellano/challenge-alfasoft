@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Displaying contact list for Guest') }}</div>

                <div class="card-body">

                    @include('app.contacts.menu')

                    @include('app.contacts.list')

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
