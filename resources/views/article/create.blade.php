@extends('layouts.article')

@section('title')
     创建小文章
@stop

@section('content')

<div class="container">
    <div class="col-md-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    添加小文章
                </h3>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    {!! Form::open(['method' => 'POST', 'route' => 'article.store', 'class' => 'form-horizontal','enctype'=>"multipart/form-data"]) !!}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        {!! Form::label('title', '文章标题') !!}
                    {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">
                            {{ $errors->first('title') }}
                        </small>
                    </div>


                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                        {!! Form::label('category_id', '分类选择') !!}
                        {!! Form::select('category_id', $categorys, null, ['id' => 'category_id', 'class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('category_id') }}</small>
                    </div>

                    {{-- 获取创建用户的名字和id --}}
                    <input type="hidden" name="author" value="{{ Auth::user()->name }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >

                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                        {!! Form::label('content', '文章内容') !!}
                    {!! Form::textarea('content', null, ['class' => 'form-control', 'required' => 'required','id'=>'editor']) !!}
                        <small class="text-danger">
                            {{ $errors->first('content') }}
                        </small>
                    </div>


                    <div class="btn-group pull-right">
                    {!! Form::submit("提交", ['class' => 'btn btn-success']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/simditor.css') }}">
@stop

@stop

@push('scripts')
  @include('parts.edit_js')
@endpush
