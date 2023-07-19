@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Contacts') }}</div>

                <div class="card-body">

                    @include('app.contacts.menu')

                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    <table class="table">

                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Email</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>

                        <tbody>

                            @foreach ($contacts as $contact)

                                <tr>
                                    <th scope="row">{{ $contact->id }}</th>
                                    <td> <a href="{{ route('contacts.show',$contact) }}"> {{ $contact->name }}</a></td>
                                    <td>{{ $contact->contact }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td> <a class="btn btn-outline-warning btn-sm" href="{{ route('contacts.edit', $contact) }}">Edit</a> </td>
                                    <td>
                                        <form id="form_{{$contact->id}}" method="post" action="{{ route('contacts.destroy', $contact) }}">
                                            @method('DELETE')
                                            @csrf
                                            <a
                                                href="#"
                                                class="btn btn-outline-danger btn-sm"
                                                onclick="document.getElementById('form_{{$contact->id}}').submit()">
                                                Delete
                                            </a>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach

                        </tbody>
                      </table>

                      <div class="d-flex justify-content-center">
                          @if ($contacts->hasPages())
                            {{ $contacts->links() }}
                          @endif
                      </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
