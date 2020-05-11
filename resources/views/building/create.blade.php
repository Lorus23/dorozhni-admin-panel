@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.buildings.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['building.store']]) !!}
    {{csrf_field()}}
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('building_name', trans('quickadmin.buildings.fields.name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('building_name', old('building_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('building_name'))
                        <p class="help-block">
                            {{ $errors->first('building_name') }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@endsection
