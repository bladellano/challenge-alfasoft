@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Contact Show') }}</div>

                <div class="card-body">

                    @include('app.contacts.menu')

                    <h5 class="card-title"> {{ $contact->name }} </h5>
                    <p class="card-text"> {{ $contact->contact }} </p>
                    <p class="card-text"> {{ $contact->email }} </p>

                    @auth
                        <div class="row">
                            <div class="col-md-6">
                                <a class="btn btn-outline-warning btn-sm" href="{{ route('contacts.edit', $contact) }}">Edit</a>
                            </div>
                            <div class="col-md-6">
                                <form style="float: right;" id="form_{{$contact->id}}" method="post" action="{{ route('contacts.destroy', $contact) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a
                                        href="#"
                                        class="btn btn-outline-danger btn-sm"
                                        onclick="document.getElementById('form_{{$contact->id}}').submit()">
                                        Delete
                                    </a>
                                </form>
                            </div>
                        </div>
                    @endauth

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
