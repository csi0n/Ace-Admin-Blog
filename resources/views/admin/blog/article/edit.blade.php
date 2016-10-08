@extends('layouts.admin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                {{trans('labels.blog.article.blogManage')}}
                <small>
                    <i class="icon-double-angle-right"></i>
                    {{trans('labels.blog.article.articleManage')}}
                </small>
            </h1>
        </div><!-- /.page-header -->
        <div class="row">
            <div class="col-xs-12">
                @include('common.errors')
                <!-- PAGE CONTENT BEGINS -->
                {!! Form::open(['route'=>['admin.blog.article.update',$article->id],'method'=>'patch','class'=>'form-horizontal','role'=>'form','files'=>true]) !!}
                    <div class="form-group">
                        {!! Form::label('title',trans('labels.blog.article.title'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('title',$article->title,['class'=>'col-xs-10 col-sm-5','id'=>'title','placeholder'=>trans('labels.blog.article.title')]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('thumb',trans('labels.blog.article.thumb'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                        <div class="col-sm-9">
                            <div class="col-xs-10 col-sm-5">
                                {!! Form::file('thumb',['id'=>'id-input-file-2','accept'=>'image/png,image/jpg']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('content',trans('labels.blog.article.content'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                        <div class="col-sm-9">
                                {{--<div class="wysiwyg-editor" id="editor1" contenteditable="true"><div style="text-align: justify;"><br></div></div>--}}
                                {{--<div class="hr hr-double dotted"></div>--}}
                            <div class="widget-box">
                                <div class="widget-header widget-header-small header-color-blue">  </div>
                                <div class="widget-body">
                                    <div class="widget-main no-padding">
                                        <div class="md-editor active">
                                            {!! Form::textarea('content',$article->content,['class'=>'span12 md-input','data-provide'=>'markdown','rows'=>10,'style'=>'resize: none; display: block;']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('sort',trans('labels.blog.article.sort'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                        <div class="col-sm-9">
                            {!! Form::number('sort',$article->sort,['class'=>'col-xs-10 col-sm-5','id'=>'sort','placeholder'=>trans('labels.blog.article.sort')]) !!}
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
    <script src="{{asset('backend/plugin/js/markdown/markdown.min.js')}}"></script>
    <script src="{{asset('backend/plugin/js/markdown/bootstrap-markdown.min.js')}}"></script>
    <script src="{{asset('backend/plugin/js/jquery.hotkeys.min.js')}}"></script>
    <script src="{{asset('backend/plugin/js/bootstrap-wysiwyg.min.js')}}"></script>
    <script src="{{asset('backend/plugin/js/bootbox.min.js')}}"></script>
    <script type="text/javascript">
        jQuery(function($) {
            $('#id-input-file-2').ace_file_input({
                no_file: 'No File ...',
                btn_choose: 'Choose',
                btn_change: 'Change',
                droppable: false,
                onchange: null,
                thumbnail: false //| true | large
                //whitelist:'gif|png|jpg|jpeg'
                //blacklist:'exe|php'
                //onchange:''
                //
            });

        });
    </script>
@endsection