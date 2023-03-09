<form action="{{ route('Search') }}" method="GET">
    <div class="form-group">
        <label for="search">Search:</label>
        <input type="text" name="search" class="form-control" placeholder="Search...">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Search</button>
</form>


<table class="table">
    <thead>
    <tr>
        <th>Name</th>

        <th>date</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($data as $item)
        <tr>
            <td>{{ $item->name }}</td>

            <td>{{ $item->date }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $data->links() }}






