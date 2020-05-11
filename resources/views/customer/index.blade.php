@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.customers.title')</h3>

    <p>
        <a href="{{route('customer.create')}}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>@lang('quickadmin.customers.fields.last_name')</th>
                    <th>@lang('quickadmin.customers.fields.first_name')</th>
                    <th>@lang('quickadmin.customers.fields.fathers_name')</th>
                    <th>@lang('quickadmin.customers.fields.transport')</th>
                    <th>@lang('quickadmin.customers.fields.phone')</th>
                    <th>@lang('quickadmin.customers.fields.email')</th>
                </tr>
                </thead>
                <tbody>
                @if (count($customers) > 0)
                    @foreach($customers as $customer)
                        <tr data-entry-id="">
                            <td field-key='last_name'>{{$customer->last_name}}</td>
                            <td field-key='first_name'>{{$customer->first_name}}</td>
                            <td field-key='fathers_name'>{{$customer->fathers_name}}</td>
                            <td field-key='transport'>{{$customer->transport}}</td>
                            <td field-key='phone'>{{$customer->phone}}</td>
                            <td field-key='email'>{{$customer->email}}</td>
                            <td>
                                <a href="{{route('customer.edit', ['customer_id'=>$customer->id])}}"
                                   class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                {!! Form::open(array(
                                                                        'style' => 'display: inline-block;',
                                                                        'method' => 'GET',
                                                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                        'route' => ['customer.delete', $customer->id]
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
