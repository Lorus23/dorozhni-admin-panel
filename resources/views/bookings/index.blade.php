@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.bookings.title')</h3>

        <p>
            <a href="{{ route('booking.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        </p>


{{--    @can('booking_delete')--}}
        <p>
        <ul class="list-inline">
            <li><a href="{{ route('bookings') }}"
                   style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a>
            </li>
            |
            <li><a href="{{ route('bookings') }}?show_deleted=1"
                   style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a>
            </li>
        </ul>
        </p>
{{--    @endcan--}}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table
                class="table table-bordered table-striped {{ count($bookings) > 0 ? 'datatable' : '' }} @can('booking_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                <tr>
                    @can('booking_delete')
                        @if ( request('show_deleted') != 1 )
                            <th style="text-align:center;"><input type="checkbox" id="select-all"/></th>@endif
                    @endcan

                    <th>@lang('quickadmin.bookings.fields.customer')</th>
                    <th>@lang('quickadmin.bookings.fields.room')</th>
                    <th>@lang('quickadmin.bookings.fields.time-from')</th>
                    <th>@lang('quickadmin.bookings.fields.time-to')</th>
                    <th>@lang('quickadmin.bookings.fields.amount')</th>
                    <th>@lang('quickadmin.bookings.fields.additional-information')</th>
                    @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                    @else
                        <th>&nbsp;</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                @if (count($bookings) > 0)
                    @foreach ($bookings as $booking)
                        <tr data-entry-id="{{ $booking->id }}">
                            @can('booking_delete')
                                @if ( request('show_deleted') != 1 )
                                    <td></td>@endif
                            @endcan

                            <td field-key='customer'>{{ $booking->customer->full_name or '' }}</td>
                            <td field-key='room'>{{ $booking->room->room_number or '' }}</td>
                            <td field-key='time_from'>{{ $booking->time_from }}</td>
                            <td field-key='time_to'>{{ $booking->time_to }}</td>
                            <td field-key='amount'>{{ $booking->amount }}</td>
                            <td field-key='additional_information'>{!! $booking->additional_information !!}</td>

                                <td>
                                    @can('booking_view')
                                        <a href="{{ route('bookings.show',[$booking->id]) }}"
                                           class="btn btn-xs btn-primary">@lang('quickadmin.qa_view_detail')</a>
                                    @endcan
                                    @can('booking_edit')
                                        <a href="{{ route('bookings.edit',[$booking->id]) }}"
                                           class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('booking_delete')
                                        {!! Form::open(array(
                                                                                'style' => 'display: inline-block;',
                                                                                'method' => 'DELETE',
                                                                                'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                                'route' => ['bookings.delete', $booking->id])) !!}
                                        {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

