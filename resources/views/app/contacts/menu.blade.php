<div class="row">
    <div class="col-md-12 mb-3">
        @auth
            <a href="{{ route('contacts.index') }}" class="btn btn-secondary btn-sm">List</a>
        @endauth
        @auth
            <a href="{{ route('contacts.create') }}" class="btn btn-primary btn-sm">Create New Contact</a>
        @endauth
    </div>
</div>
