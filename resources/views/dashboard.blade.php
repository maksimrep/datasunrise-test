@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">

                        <div class="col-md-12 ">
                            @if(!is_null($authorBooks))
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Sub Title</th>
                                        <th>Author(s)</th>
                                        <th>Added on</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($authorBooks as $book)
                                        <tr>
                                            <th scope="row">{{ $book->id }}</th>
                                            <td>{{ $book->title }}</td>
                                            <td>{{ $book->subtitle }}</td>
                                            <td>
                                                @foreach ($book->author as $author)
                                                    {{ $author->name.', ' }}
                                                @endforeach
                                            </td>
                                            <td>{{ $book->created_at }}</td>
                                            <td>
                                                <a href="{{ route('book.edit', $book->id) }}">
                                                    <button type="button" class="btn btn-default btn-sm btn-warning">
                                                        Edit
                                                    </button>
                                                </a>
                                            </td>
                                            <td>
                                                {{--<a href="{{ route('book.remove', $book->id) }}">
                                                    <button type="button" class="btn btn-default btn-danger btn-sm">
                                                        Remove
                                                    </button>
                                                </a>--}}
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-info">There are no books</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
