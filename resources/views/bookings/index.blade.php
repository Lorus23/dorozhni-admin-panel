@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.rooms.title')</h3>
    <p>
        <a href="{{ route('rooms.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>

                    <th>@lang('quickadmin.rooms.fields.room-number')</th>
                    <th>@lang('quickadmin.rooms.fields.building_id')</th>
                    <th>@lang('quickadmin.rooms.fields.category_id')</th>
                    <th>@lang('quickadmin.rooms.fields.floor')</th>
                    <th>@lang('quickadmin.rooms.fields.description')</th>

                    <th>&nbsp;</th>

                    <th>&nbsp;</th>

                </tr>
                </thead>

                <tbody>
                @if (count($rooms) > 0)
                    @foreach($rooms as $room)
                        <tr data-entry-id="{{ $room->id }}">

                            <td field-key='room_number'>{{ $room->room_number }}</td>
                            <td field-key='floor'>{!! $room->building->building_name !!}</td>
                            <td field-key='description'>{!! $room->category->category_name !!}</td>
                            <td field-key='description'>{{ $room->floor }}</td>
                            <td field-key='description'>{!! $room->description !!}</td>
                            <td>
                                <a href="{{route('room.edit', ['room_id'=>$room->id])}}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                {!! Form::open(array(
                                                                        'style' => 'display: inline-block;',
                                                                        'method' => 'GET',
                                                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                        'route' => ['room.delete', $room->id]
                                                                        )) !!}
                                {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8">@lang('quickadmin.qa_no_entries_in_table')</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
