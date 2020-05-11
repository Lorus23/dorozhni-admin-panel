@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.rooms.title')</h3>
    <form action="{{route('room.update',['room_id'=>$room->id])}}" method="post">
        {{csrf_field()}}
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('quickadmin.qa_update')
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="" class="control-label">@lang('quickadmin.rooms.fields.room-number')
                            <input type="text" name="room_number" class="form-control"
                                   value="{{$room->room_number}}">
                        </label>
                        @if($errors->has('building_name'))
                            <p class="help-block">
                                {{ $errors->first('building_name') }}
                            </p>
                        @endif

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
                        <label for="" class="control-label">@lang('quickadmin.rooms.fields.floor')
                            <input type="text" name="floor" class="form-control"
                                   value="{{$room->floor}}">
                        </label>
                        @if($errors->has('building_name'))
                            <p class="help-block">
                                {{ $errors->first('building_name') }}
                            </p>
                        @endif
                        <p class="help-block"></p>
                        @if($errors->has('floor'))
                            <p class="help-block">
                                {{ $errors->first('floor') }}
                            </p>
                        @endif
                        <label for="" class="control-label">@lang('quickadmin.rooms.fields.description')
                            <textarea name="description" class="form-control">{{$room->description}}</textarea>
                        </label>
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
    </form>
@endsection
