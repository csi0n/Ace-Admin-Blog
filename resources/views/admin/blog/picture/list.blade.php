@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{asset('backend/plugin/css/jquery-ui-1.10.3.full.min.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/plugin/css/dropzone.css')}}" />
@endsection
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                {{trans('labels.blog.picture.blogManage')}}
                <small>
                    <i class="icon-double-angle-right"></i>
                    {{trans('labels.blog.picture.pictureManage')}}
                </small>
            </h1>
        </div><!-- /.page-header -->
        <div class="row">
            <!-- PAGE CONTENT BEGINS -->
            <div class="col-xs-12">
                @include('flash::message')
                <h3 class="header smaller lighter blue">
                    {{trans('labels.blog.picture.list')}}
                    @permission(config('admin.permissions.blog.cate.create.name'))
                    {!! Form::open(['route'=>config('admin.module.blog.picture').'.store','class'=>'dropzone dz-clickable']) !!}
                    {!! Form::close() !!}
                    @endpermission
                </h3>
                <div class="row-fluid">
                    <ul class="ace-thumbnails">
                        @if(!empty($pictures))
                            @foreach($pictures as $k=>$v)
                                @if(is_array($v))

                                        @foreach($v as $val)
                                        @if(!in_array($val,['.','..']))
                                            <li>
                                                <a href="{{config('blog.img_prefix')}}/{{$k.'/'.$val}}" data-rel="colorbox" class="cboxElement">
                                                    <img width="150" height="150" alt="150x150" src="{{config('blog.img_prefix')}}/{{$k.'/'.$val}}">
                                                    <div class="text">
                                                        <div class="inner">{{$val}}</div>
                                                    </div>
                                                </a>

                                                <div class="tools tools-bottom">
                                                    <a href="javascript:;" class="cp" onclick="return false" data-url="{{config('blog.img_prefix')}}/{{$k.'/'.$val}}">
                                                        <i class="icon-link"></i>
                                                    </a>

                                                    {{--<a href="#">--}}
                                                        {{--<i class="icon-paper-clip"></i>--}}
                                                    {{--</a>--}}

                                                    {{--<a href="#">--}}
                                                        {{--<i class="icon-pencil"></i>--}}
                                                    {{--</a>--}}

                                                    <a id="destroy" href="javascript:;" onclick="return false">
                                                        <i class="icon-remove red"></i>
                                                        {!! Form::open(array('route'=>[config('admin.module.blog.picture').'.destroy',$k.'||'.$val],'method'=>'delete','name'=>'delete_item')).Form::close() !!}
                                                    </a>
                                                </div>
                                            </li>
                                        @endif
                                        @endforeach

                                @endif
                            @endforeach
                        @endif

                    </ul>
                </div>
            </div>
            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->


    <div id="dialog-confirm" class="hide">
        <div class="alert alert-info bigger-110">
            {{trans('alerts.delete.info')}}
        </div>

        <div class="space-6"></div>

        <p class="bigger-110 bolder center grey">
            <i class="icon-hand-right blue bigger-120"></i>
            {{trans('alerts.delete.sure')}}
        </p>
    </div><!-- #dialog-confirm -->


@endsection

@section('js')
    <script  src="{{asset('backend/plugin/js/dropzone.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/plugin/js/jquery-ui-1.10.3.full.min.js')}}"></script>
    <script src="{{asset('backend/plugin/js/jquery.ui.touch-punch.min.js')}}"></script>
    <script src="{{asset('backend/plugin/js/zeroclipboard/ZeroClipboard.js')}}"></script>
    {{--destroy--}}
    <script type="text/javascript">
        ZeroClipboard.config( { swfPath: "{{url('backend/plugin/js/zeroclipboard/ZeroClipboard.swf')}}" } );
        var client = new ZeroClipboard( $('.cp') );
        client.on( 'ready', function(event) {
            // console.log( 'movie is loaded' );

            client.on( 'copy', function(event) {
                event.clipboardData.setData('text/plain', $(event.target).attr('data-url'));
                layer.msg("{{trans('alerts.blog.picture.copyUrlSuccess')}}");
            } );

            client.on( 'aftercopy', function(event) {
                console.log('Copied text to clipboard: ' + event.data['text/plain']);
            } );
        } );

        client.on( 'error', function(event) {
            // console.log( 'ZeroClipboard error of type "' + event.name + '": ' + event.message );
            ZeroClipboard.destroy();
        } );
        function cp(url) {

        }

        $(document).on('click', '#destroy', function () {
            var destroy = $(this);
            $( "#dialog-confirm" ).removeClass('hide').dialog({
                resizable: false,
                modal: true,
                title: "123",
                title_html: false,
                buttons: [
                    {
                        html: "<i class='icon-trash bigger-110'></i>&nbsp; {{trans('alerts.delete.submit')}}",
                        "class" : "btn btn-danger btn-xs",
                        click: function() {
                            $( this ).dialog( "close" );
                            destroy.find('form[name="delete_item"]').submit();
                        }
                    }
                    ,
                    {
                        html: "<i class='icon-remove bigger-110'></i>&nbsp; {{trans('alerts.delete.cancel')}}",
                        "class" : "btn btn-xs",
                        click: function() {
                            $( this ).dialog( "close" );
                        }
                    }
                ]
            });

        });
        jQuery(function($){

            try {
                $(".dropzone").dropzone({
                    paramName: "file", // The name that will be used to transfer the file
                    maxFilesize: 5, // MB

                    addRemoveLinks : true,
                    dictDefaultMessage :
                            '<span class="bigger-150 bolder"><i class="icon-caret-right red"></i> 选择图片</span> 上传\
                            <span class="smaller-80 grey">(单击)</span> <br /> \
                            <i class="upload-icon icon-cloud-upload blue icon-3x"></i>'
                    ,
                    dictResponseError: 'Error while uploading file!',

                    //change the previewTemplate to use Bootstrap progress bars
                    previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-details\">\n    <div class=\"dz-filename\"><span data-dz-name></span></div>\n    <div class=\"dz-size\" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n  <div class=\"progress progress-small progress-striped active\"><div class=\"progress-bar progress-bar-success\" data-dz-uploadprogress></div></div>\n  <div class=\"dz-success-mark\"><span></span></div>\n  <div class=\"dz-error-mark\"><span></span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n</div>"
                });
            } catch(e) {
                layer.msg("Dropzone.js does not support older browsers!");
            }
        });
    </script>
@endsection