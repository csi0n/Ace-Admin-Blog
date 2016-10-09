@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{asset('backend/plugin/css/jquery-ui-1.10.3.custom.min.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/plugin/css/chosen.css')}}" />
@endsection
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                {{trans('labels.blog.cate.blogManage')}}
                <small>
                    <i class="icon-double-angle-right"></i>
                    {{trans('labels.blog.cate.cateManage')}}
                </small>
            </h1>
        </div><!-- /.page-header -->
        <div class="row">
            <div class="col-xs-12">
                @include('common.errors')
                <!-- PAGE CONTENT BEGINS -->
                {!! Form::open(['route'=>['admin.blog.cate.update','id'=>$cate->id],'method'=>'patch','class'=>'form-horizontal','role'=>'form']) !!}
                    <div class="form-group">
                        {!! Form::label('name',trans('labels.blog.cate.name'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('name',$cate->name,['class'=>'col-xs-10 col-sm-5','id'=>'name','placeholder'=>trans('labels.blog.cate.name')]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('pid',trans('labels.blog.cate.pid'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                        <div class="col-sm-9">
                            {!! Form::select('pid',$cates,$cate->pid,['class'=>'col-xs-10 col-sm-5 chosen-select','data-placeholder'=>trans('labels.blog.cate.pid')]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('sort',trans('labels.blog.cate.sort'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                        <div class="col-sm-9">
                            {!! Form::number('sort',$cate->sort,['class'=>'col-xs-10 col-sm-5','id'=>'sort','placeholder'=>trans('labels.blog.cate.sort')]) !!}
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
@section('js')
    <script src="{{asset('backend/plugin/js/chosen.jquery.min.js')}}"></script>

    <script type="text/javascript">
        jQuery(function($) {
            $(".chosen-select").chosen();
        });
    </script>
@endsection