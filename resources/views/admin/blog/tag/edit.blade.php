@extends('layouts.admin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                {{trans('labels.blog.tag.blogManage')}}
                <small>
                    <i class="icon-double-angle-right"></i>
                    {{trans('labels.blog.tag.tagManage')}}
                </small>
            </h1>
        </div><!-- /.page-header -->
        <div class="row">
            <div class="col-xs-12">
                @include('common.errors')
                <!-- PAGE CONTENT BEGINS -->
                {!! Form::open(['route'=>['admin.blog.tag.update','id'=>$tag->id],'method'=>'patch','class'=>'form-horizontal','role'=>'form']) !!}
                    <div class="form-group">
                        {!! Form::label('name',trans('labels.blog.tag.name'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('name',$tag->name,['class'=>'col-xs-10 col-sm-5','id'=>'name','placeholder'=>trans('labels.blog.tag.name')]) !!}
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="icon-ok bigger-110"></i>
                                {{trans('labels.submit')}}
                            </button>
                            <button class="btn" type="reset">
                                <i class="icon-undo bigger-110"></i>
                                {{trans('labels.reset')}}
                            </button>
                        </div>
                    </div>
                {!! Form::close() !!}
                {{--</form>--}}
            </div><!-- /.col -->
        </div>
    </div><!-- /.page-content -->
@endsection