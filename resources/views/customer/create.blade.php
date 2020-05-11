@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.customers.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['customer.store']]) !!}
    {{csrf_field()}}
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <p>* - отмечены обязательные поля</p>
                    {!! Form::label('last_name', trans('quickadmin.customers.fields.last_name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('last_name'))
                        <p class="help-block">
                            {{ $errors->first('last_name') }}
                        </p>
                    @endif

                    {!! Form::label('first_name', trans('quickadmin.customers.fields.first_name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('first_name'))
                        <p class="help-block">
                            {{ $errors->first('first_name') }}
                        </p>
                    @endif



                    {!! Form::label('fathers_name', trans('quickadmin.customers.fields.fathers_name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('fathers_name', old('fathers_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('fathers_name'))
                        <p class="help-block">
                            {{ $errors->first('fathers_name') }}
                        </p>
                    @endif

                    {!! Form::label('transport', trans('quickadmin.customers.fields.transport').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('transport', old('transport'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('transport'))
                        <p class="help-block">
                            {{ $errors->first('transport') }}
                        </p>
                    @endif

                    {!! Form::label('phone', trans('quickadmin.customers.fields.phone').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('phone', old('phone'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('phone'))
                        <p class="help-block">
                            {{ $errors->first('phone') }}
                        </p>
                    @endif

                    {!! Form::label('email', trans('quickadmin.customers.fields.email').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
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
@endsection
