<table class="table">

    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Contact</th>
        <th scope="col">Email</th>
        @auth
            <th scope="col"></th>
        @endauth
      </tr>
    </thead>

    <tbody>

        @foreach ($contacts as $contact)

            <tr>
                <th scope="row">{{ $contact->id }}</th>
                <td> <a href="{{ route('contacts.show',$contact) }}"> {{ $contact->name }}</a></td>
                <td>{{ $contact->contact }}</td>
                <td>{{ $contact->email }}</td>
                @auth
                    <td style="display: flex; justify-content: space-around;">
                        <a class="btn btn-outline-warning btn-sm" href="{{ route('contacts.edit', $contact) }}">Edit</a>
                        <br/>
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
                @endauth
            </tr>

        @endforeach

    </tbody>

</table>

<div class="d-flex justify-content-center">
    @if ($contacts->hasPages())
      {{ $contacts->links() }}
    @endif
</div>
