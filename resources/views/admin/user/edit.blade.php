@extends('layouts.admin')
@section('content')
    <div class="page-content">
        <div class="page-header">
            <h1>
                {{trans('labels.user.systemManage')}}
                <small>
                    <i class="icon-double-angle-right"></i>
                    {{trans('labels.user.userManage')}}
                </small>
            </h1>
        </div><!-- /.page-header -->
        <div class="row">
            <div class="col-xs-12">
            @include('common.errors')
            <!-- PAGE CONTENT BEGINS -->
                {!! Form::open(array('route'=>['admin.user.update',$user['id']],'method'=>'patch','class'=>'form-horizontal','role'=>'form')) !!}
                <div class="form-group">
                    {!! Form::label('name',trans('labels.user.name'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('name',$user['name'],['class'=>'col-xs-10 col-sm-5','id'=>'name','placeholder'=>trans('labels.user.name')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('role',trans('labels.user.role'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                    @if($roles)
                        <div class="col-md-9">
                            @foreach($roles as $role)
                                <div class="md-checkbox">
                                    <div class="checkbox">
                                        <label>
                                            <input name="roles[]" value="{{$role['id']}}" type="checkbox" class="ace" @if(in_array($role['id'],$user['role'])) checked @endif>
                                            <span class="lbl">{{$role['name']}}</span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('email',trans('labels.user.email'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                    <div class="col-sm-9">
                        {!! Form::email('email',$user['email'],['class'=>'col-xs-10 col-sm-5','id'=>'email','placeholder'=>trans('labels.user.email')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('password',trans('labels.user.password'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                    <div class="col-sm-9">
                        {!! Form::text('password',null,['class'=>'col-xs-10 col-sm-5','id'=>'password','placeholder'=>trans('labels.user.password')]) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('form-field-3',trans('labels.user.status'),['class'=>'col-sm-3 control-label no-padding-right']) !!}
                    <div class="col-sm-9" id="form-field-2">
                        <div id="form-field-3">
                            <label>
                                <input name="status" value="0" type="radio" class="ace" @if($user['status']==0) checked @endif>
                                <span class="lbl">正常</span>
                            </label>
                            <label>
                                <input name="status" value="1" type="radio" class="ace" @if($user['status']==1) checked @endif>
                                <span class="lbl">禁用</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="col-md-1 text-center">{{trans('labels.role.module')}}</th>
                                <th class="col-md-10 text-center">{{trans('labels.role.permission')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($permissions)
                                @foreach($permissions as $permission)
                                    @foreach($permission as $k=>$v)
                                        <tr>
                                            <td class="text-center"> {{$k}} </td>
                                            <td>
                                                @if(isDoubleArray($v))
                                                    @foreach($v as $val)
                                                        <div class="col-md-4">
                                                            <div class="md-checkbox">
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input name="permission[]" value="{{$val['id']}}" type="checkbox" class="ace" @if(in_array($val['id'],$user['permission'])) checked @endif>
                                                                        <span class="lbl">{{$val['name']}}</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="col-md-4">
                                                        <div class="md-checkbox">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input name="permission[]" value="{{$v['id']}}" type="checkbox" class="ace" @if(in_array($v['id'],$user['permission'])) checked @endif>
                                                                    <span class="lbl">{{$v['name']}}</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info" type="submit">
                        <i class="icon-ok bigger-110"></i>
                        {{trans('labels.save')}}
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