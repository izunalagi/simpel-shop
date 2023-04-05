@extends('layouts.app')

@section('title', 'Post')

@section('content')
    <h1>just test</h1>
    <div class="container">
        <a class="btn btn-primary" href="{{ route('product.create') }}" role="button">Create</a>
        <a class="btn btn-primary" href="{{ route('home.index') }}" role="button">Kembali</a>
        <table id="example" class="table table-striped">
            <thead>
                <th>
                    <tr>
                        <td>No</td>
                        <td>Name</td>
                        <td>Price</td>
                        <td>Stocks</td>
                        <td>Action</td>


                    </tr>
                </th>
            </thead>
            </th>
            <tbody>
                @foreach ($products as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->stocks }}</td>
                        <td class="d-flex">
                            <a href="{{ route('product.edit', $item->id) }}" type="button"
                                class="btn btn-warning
mb-3">Edit</a>


                            <form action="{{ route('product.destroy', $item->id) }}" method="post">

                                @csrf
                                <button type="submit" class="btn btn-danger me-3">Delete</button>

                            </form>

                        </td>
                        {{-- <td>
                <form action="/post/{{ $item->id }}" method="POST">
                <a type="button" class="btn btn-warning" href="/post/{{ $item->id }}/edit">Edit</a>
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td> --}}




                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </section>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
