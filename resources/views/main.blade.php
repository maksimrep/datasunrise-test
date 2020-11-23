@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#books"><h4>Books</h4></a></li>
                    <li><a data-toggle="tab" href="#authors"><h4>Authors</h4></a></li>
                </ul>
                <div class="tab-content">
                    <div id="books" class="tab-pane fade in active">
                        @if(!is_null($books))
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>Author(s)</th>
                                    <th>Added on</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($books as $book)
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
                    <div id="authors" class="tab-pane fade">

                        @if(!is_null($authors))
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Added on</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($authors as $author)
                                    <tr>
                                        <th scope="row">{{ $author->id }}</th>
                                        <td>{{ $author->name }}</td>
                                        <td>{{ $author->created_at }}</td>
                                        <td>
                                            <a href="{{ route('author.page', $author->id) }}">
                                                <button type="button" class="btn btn-default btn-sm btn-success">
                                                    View Page
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info">There are no authors</div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
