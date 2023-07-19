@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Contacts') }}</div>

                <div class="card-body">

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
                                    <td>[X]</td>
                                </tr>

                            @endforeach

                        </tbody>
                      </table>

                      {{ $contacts->links() }}
{{--
                    @foreach ($contacts as $contact)
                        {{ $contact->id }}
                    @endforeach

                    @if ($contacts->hasPages())
                        {{ $contacts->links() }}
                    @endif --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
