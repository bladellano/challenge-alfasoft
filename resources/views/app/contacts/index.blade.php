@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Contacts') }}</div>

                <div class="card-body">

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
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->contact }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>[E]</td>
                                    <td>
                                        <form id="form_{{$contact->id}}" method="post" action="{{ route('contacts.destroy',['contact' => $contact->id]) }}">
                                            @method('DELETE')
                                            @csrf
                                            <a
                                                href="#"
                                                class="btn btn-danger btn-sm"
                                                onclick="document.getElementById('form_{{$contact->id}}').submit()">
                                                Excluir
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
