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
                {!! Form::open(array('route'=>'admin.blog.article.store','method'=>'post','class'=>'form-horizontal','role'=>'form')) !!}
                    <div class="form-group">
                        {!! Form::label('title',trans('labels.blog.article.title'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                        <div class="col-sm-9">
                            {!! Form::text('title',old('title'),['class'=>'col-xs-10 col-sm-5','id'=>'title','placeholder'=>trans('labels.blog.article.title')]) !!}
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
                                <div class="wysiwyg-editor" id="editor1" contenteditable="true"><div style="text-align: justify;"><br></div></div>
                                <div class="hr hr-double dotted"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('sort',trans('labels.blog.article.sort'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                        <div class="col-sm-9">
                            {!! Form::number('sort',old('sort'),['class'=>'col-xs-10 col-sm-5','id'=>'sort','placeholder'=>trans('labels.blog.article.sort')]) !!}
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
        jQuery(function($){
            $('#id-input-file-1 , #id-input-file-2').ace_file_input({
                no_file:'No File ...',
                btn_choose:'Choose',
                btn_change:'Change',
                droppable:false,
                onchange:null,
                thumbnail:false //| true | large
                //whitelist:'gif|png|jpg|jpeg'
                //blacklist:'exe|php'
                //onchange:''
                //
            });
            function showErrorAlert (reason, detail) {
                var msg='';
                if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
                else {
                    console.log("error uploading file", reason, detail);
                }
                $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+
                        '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
            }
            $('#editor1').ace_wysiwyg({
                toolbar:
                        [
                            'font',
                            null,
                            'fontSize',
                            null,
                            {name:'bold', className:'btn-info'},
                            {name:'italic', className:'btn-info'},
                            {name:'strikethrough', className:'btn-info'},
                            {name:'underline', className:'btn-info'},
                            null,
                            {name:'insertunorderedlist', className:'btn-success'},
                            {name:'insertorderedlist', className:'btn-success'},
                            {name:'outdent', className:'btn-purple'},
                            {name:'indent', className:'btn-purple'},
                            null,
                            {name:'justifyleft', className:'btn-primary'},
                            {name:'justifycenter', className:'btn-primary'},
                            {name:'justifyright', className:'btn-primary'},
                            {name:'justifyfull', className:'btn-inverse'},
                            null,
                            {name:'createLink', className:'btn-pink'},
                            {name:'unlink', className:'btn-pink'},
                            null,
                            {name:'insertImage', className:'btn-success'},
                            null,
                            'foreColor',
                            null,
                            {name:'undo', className:'btn-grey'},
                            {name:'redo', className:'btn-grey'}
                        ],
                'wysiwyg': {
                    fileUploadError: showErrorAlert
                }
            }).prev().addClass('wysiwyg-style2');
            $('[data-toggle="buttons"] .btn').on('click', function(e){
                var target = $(this).find('input[type=radio]');
                var which = parseInt(target.val());
                var toolbar = $('#editor1').prev().get(0);
                if(which == 1 || which == 2 || which == 3) {
                    toolbar.className = toolbar.className.replace(/wysiwyg\-style(1|2)/g , '');
                    if(which == 1) $(toolbar).addClass('wysiwyg-style1');
                    else if(which == 2) $(toolbar).addClass('wysiwyg-style2');
                }
            });
            if ( typeof jQuery.ui !== 'undefined' && /applewebkit/.test(navigator.userAgent.toLowerCase()) ) {
                var lastResizableImg = null;
                function destroyResizable() {
                    if(lastResizableImg == null) return;
                    lastResizableImg.resizable( "destroy" );
                    lastResizableImg.removeData('resizable');
                    lastResizableImg = null;
                }
                var enableImageResize = function() {
                    $('.wysiwyg-editor')
                            .on('mousedown', function(e) {
                                var target = $(e.target);
                                if( e.target instanceof HTMLImageElement ) {
                                    if( !target.data('resizable') ) {
                                        target.resizable({
                                            aspectRatio: e.target.width / e.target.height,
                                        });
                                        target.data('resizable', true);

                                        if( lastResizableImg != null ) {//disable previous resizable image
                                            lastResizableImg.resizable( "destroy" );
                                            lastResizableImg.removeData('resizable');
                                        }
                                        lastResizableImg = target;
                                    }
                                }
                            })
                            .on('click', function(e) {
                                if( lastResizableImg != null && !(e.target instanceof HTMLImageElement) ) {
                                    destroyResizable();
                                }
                            })
                            .on('keydown', function() {
                                destroyResizable();
                            });
                }
                enableImageResize();
            }
        });
    </script>
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