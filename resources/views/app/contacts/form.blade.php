
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

<button type="submit" class="btn btn-primary btn-sm"> {{ $isUpdate ? 'Update' : 'Register' }}</button>
