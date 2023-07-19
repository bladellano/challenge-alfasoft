@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Contact Edit') }}</div>

                <div class="card-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contacts.update', $contact) }}">

                        @method('PUT')

                        {{-- @include('app.contacts.form') --}}

                        @php $isUpdate = isset($contact) @endphp
                        @csrf

                        <div class="mb-3">
                          <label for="name" class="form-label">Name</label>
                          <input value="{{ $contact->name ?? old('name') }}" type="text" class="form-control" name="name" aria-describedby="nameHelp">
                          @error('name') <div id="namelHelp" class="form-text text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact</label>
                            <input value="{{ $contact->contact ?? old('contact') }}" type="text" class="form-control" name="contact" aria-describedby="contactHelp">
                            @error('contact') <div id="contactHelp" class="form-text text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input value="{{ $contact->email ?? old('email') }}" type="email" class="form-control" name="email" aria-describedby="emailHelp">
                            @error('email') <div id="emailHelp" class="form-text text-danger">{{ $message }}</div> @enderror
                        </div>

                        <button type="submit" class="btn btn-success"> {{ $isUpdate ? 'Update' : 'Register' }}</button>

                      </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
