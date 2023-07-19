@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Contact New') }}</div>

                <div class="card-body">

                    @include('app.contacts.menu')

                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contacts.store') }}">
                        @include('app.contacts.form')
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
