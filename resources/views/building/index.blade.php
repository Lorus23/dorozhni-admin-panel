@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.buildings.title')</h3>

        <p>
            <a href="{{route('building.create')}}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>

        </p>

        <p>
        <ul class="list-inline">
            <li><a href="" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
        </p>


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    @can('country_delete')
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                    @endcan

                    <th>@lang('quickadmin.buildings.fields.name')</th>
                        <th>@lang('quickadmin.buildings.fields.manage')</th>
                </tr>
                </thead>
                <tbody>
                @if (count($buildings) > 0)
                @foreach($buildings as $building)
                        <tr data-entry-id="">
                            <td field-key='name'>{{$building->building_name}}</td>
                                <td>

                                        <a href="{{route('building.edit', ['building_id'=>$building->id])}}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                        {!! Form::open(array(
                                                                                'style' => 'display: inline-block;',
                                                                                'method' => 'GET',
                                                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                                'route' => ['building.delete', $building->id]
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
