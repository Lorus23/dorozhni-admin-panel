@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.rooms.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['rooms.store']]) !!}
    {{csrf_field()}}
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <p>* - отмечены обязательные поля</p>
                    {!! Form::label('room_number', trans('quickadmin.rooms.fields.room-number').'*  ', ['class' => 'control-label']) !!}
                    {!! Form::text('room_number', old('room_number'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('room_number'))
                        <p class="help-block">
                            {{ $errors->first('room_number') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <p><label class="control-label">@lang('quickadmin.rooms.fields.building_id')
                            <select class="form-control select2" name="building_id" style="width:200px;">
                                @foreach($buildings as $building)
                                    <option value="{{$building->id}}">{{$building->building_name}}</option>
                                @endforeach
                            </select>
                        </label>
                    </p>

                    <p><label class="control-label">@lang('quickadmin.rooms.fields.category_id')
                            <select class="form-control select2" name="category_id" style="width:200px;">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </label>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('floor', trans('quickadmin.rooms.fields.floor').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('floor', old('floor'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('floor'))
                        <p class="help-block">
                            {{ $errors->first('floor') }}
                        </p>
                    @endif

                    {!! Form::label('description', trans('quickadmin.rooms.fields.description').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description', old('description'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif

                </div>
            </div>

        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@endsection
