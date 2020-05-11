@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.customers.title')</h3>
    <form action="{{route('customer.update',['customer_id'=>$customer->id])}}" method="post">
    {{csrf_field()}}
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <label for="" class="control-label">@lang('quickadmin.customers.fields.last_name')
                        <input type="text" name="last_name" class="form-control"
                               value="{{$customer->last_name}}">
                    </label>
                    <p class="help-block"></p>
                    @if($errors->has('last_name'))
                        <p class="help-block">
                            {{ $errors->first('last_name') }}
                        </p>
                    @endif
                    <label for="" class="control-label">@lang('quickadmin.customers.fields.first_name')
                        <input type="text" name="first_name" class="form-control"
                               value="{{$customer->first_name}}">
                    </label>
                    <p class="help-block"></p>
                    @if($errors->has('first_name'))
                        <p class="help-block">
                            {{ $errors->first('first_name') }}
                        </p>
                    @endif


                    <label for="" class="control-label">@lang('quickadmin.customers.fields.fathers_name')
                        <input type="text" name="fathers_name" class="form-control"
                               value="{{$customer->fathers_name}}">
                    </label>
                    <p class="help-block"></p>
                    @if($errors->has('fathers_name'))
                        <p class="help-block">
                            {{ $errors->first('fathers_name') }}
                        </p>
                    @endif
                    <label for="" class="control-label">@lang('quickadmin.customers.fields.transport')
                        <input type="text" name="transport" class="form-control"
                               value="{{$customer->transport}}">
                    </label>
                    <p class="help-block"></p>
                    @if($errors->has('transport'))
                        <p class="help-block">
                            {{ $errors->first('transport') }}
                        </p>
                    @endif
                    <label for="" class="control-label">@lang('quickadmin.customers.fields.phone')
                        <input type="text" name="phone" class="form-control"
                               value="{{$customer->phone}}">
                    </label>
                    <p class="help-block"></p>
                    @if($errors->has('phone'))
                        <p class="help-block">
                            {{ $errors->first('phone') }}
                        </p>
                    @endif
                    <label for="" class="control-label">@lang('quickadmin.customers.fields.email')
                        <input type="text" name="email" class="form-control"
                               value="{{$customer->email}}">
                    </label>
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>

            </div>


        </div>
    </div>
    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    </form>
@endsection
