@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit book</div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="panel-body">
                        <?php $selectedAuthors = $booksModel->author->pluck('id')->toArray();?>

                        {{ Form::model($booksModel, array('route' => array('book.update', $booksModel->id))) }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            {{ Form::label('bookTitle', 'Book title')}}
                            {{ Form::text('title', $booksModel->title, array('placeholder'=>'. . .', 'id'=>'bookTitle', 'class'=>'form-control'))}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('bookSubTitle', 'Book subtitle')}}
                            {{ Form::text('subtitle', $booksModel->subtitle, array('placeholder'=>'. . .', 'id'=>'bookSubTitle', 'class'=>'form-control'))}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('bookIsbn', 'Book ISBN')}}
                            {{ Form::text('isbn', $booksModel->isbn, array('placeholder'=>'. . .', 'id'=>'bookIsbn', 'class'=>'form-control'))}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('selectAuthors', 'Select Author(s)')}}
                            {{ Form::select('authors[]', $authors, $selectedAuthors, ['multiple','class' => 'col-md-12', 'id'=> 'selectAuthors']) }}
                        </div>
                        {{--<div class="form-group">
                            {{ Form::label('bookCoverImage', 'Cover Image')}}
                            {{ Form::file('bookCoverImage', array('id'=>'bookCoverImage', 'class'=>'form-control-file'))}}
                        </div>--}}
                        <div class="form-group">

                            {{ Form::submit('Update Book', array('class' => 'btn btn-primary', 'type' => 'submit')) }}
                        </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection