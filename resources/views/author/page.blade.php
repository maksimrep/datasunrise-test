@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">All {{$author->name }}'s books</div>

                    <div class="panel-body">
                        @if(!is_null($author) && !$author->books->isEmpty())
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
                                @foreach($author->books as $book)
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
@endsection