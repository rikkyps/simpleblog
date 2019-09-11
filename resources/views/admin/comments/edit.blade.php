@extends('layouts.admin.app')

@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Comments</a>
            </li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white bg-primary">
                        Edit Comment : {{ $comments->post->title }}
                    </div>
                    {!! Form::model($comments, ['route' => ['admin.comments.update', $comments->id], 'method' => 'PUT']) !!}
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Full Name</label>
                            <input type="text" value="{{ $comments->name }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" value="{{ $comments->email }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">FUll Name</label>
                            <input type="text" value="{{ $comments->name }}"  class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Comment</label>
                            <textarea name="" cols="30" rows="10" class="form-control" readonly>{{ $comments->body }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            {!! Form::select('status', [0 => 'Hide', 1 => 'Publish'], null, ['class' => 'form-control', 'required']) !!}
                        </div>
                        <div class="card-foot">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection