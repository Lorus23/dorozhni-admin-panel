@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.bookings.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['booking.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    <p><label class="control-label">@lang('quickadmin.customers.title')
                            <select class="form-control select2" name="customer_id" style="width:500px;">
                                @foreach($customers as $customer)
                                    @php($name = $customer['first_name'].' '.$customer['last_name'])
                                    <option value="{{$customer->id}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </label>
                    </p>
                    <p class="help-block"></p>
                    @if($errors->has('customer_id'))
                        <p class="help-block">
                            {{ $errors->first('customer_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    <p><label class="control-label">@lang('quickadmin.rooms.fields.room-number')
                            <select class="form-control select2" name="building_id" style="width:500px;">
                                @foreach($rooms as $room)
                                    @php($name = 'Номер:'.$room['room_number'].', этаж:'.$room['floor'])
                                    <option value="{{$room->id}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </label>
                    </p>
                    <p class="help-block"></p>
                    @if($errors->has('room_id'))
                        <p class="help-block">
                            {{ $errors->first('room_id') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-5 form-group">
                    {!! Form::label('time_from', trans('quickadmin.bookings.fields.time-from').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('time_from', old('time_from'), ['class' => 'form-control datetimepicker', 'placeholder' => '', 'required' => '']) !!}
                    <span class="glyphicon glyphicon-calendar"></span>
                    <p class="help-block"></p>
                    @if($errors->has('time_from'))
                        <p class="help-block">
                            {{ $errors->first('time_from') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5 form-group">
                    {!! Form::label('time_to', trans('quickadmin.bookings.fields.time-to').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('time_to', old('time_to'), ['class' => 'form-control datetimepicker', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('time_to'))
                        <p class="help-block">
                            {{ $errors->first('time_to') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 form-group">
                    {!! Form::label('adult_count',trans('Количество взрослых').'*') !!}
                    {!! Form::text('adult_count', old('adult_count'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}

                    {!! Form::label('kids_count',trans('Количество детей').'*') !!}
                    {!! Form::text('kids_count', old('adult_count'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Питание</div>
                <div class="panel-body">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('adult_nutrition_count',trans('Количество питающихся взрослых').'*') !!}
                                {!! Form::text('adult_nutrition_count', old('adult_nutrition_count'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}

                                <input type="checkbox" name="adult_breakfast">
                                <label for="adult_breakfast">Завтрак (взрослый)</label>

                                <input type="checkbox" name="adult_lunch">
                                <label for="adult_lunch">Обед (взрослый)</label>

                                <input type="checkbox" name="adult_afternoon_tea">
                                <label for="adult_afternoon_tea">Полдник (взрослый)</label>

                                <input type="checkbox" name="adult_dinner">
                                <label for="adult_dinner">Ужин (взрослый)</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('kids_nutrition_count',trans('Количество питающихся детей').'*') !!}
                                {!! Form::text('kids_nutrition_count', old('kids_nutrition_count'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}

                                <input type="checkbox" name="kids_breakfast">
                                <label for="kids_breakfast">Завтрак (детский)</label>

                                <input type="checkbox" name="kids_lunch">
                                <label for="kids_lunch">Обед (детский)</label>

                                <input type="checkbox" name="kids_afternoon_tea">
                                <label for="kids_afternoon_tea">Полдник (детский)</label>

                                <input type="checkbox" name="kids_dinner">
                                <label for="kids_dinner">Ужин (детский)</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Раздел оплаты</div>
                <div class="panel-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                {!! Form::label('prepay_cache',trans('Предоплата наличными').'*') !!}
                                <br>
                                {!! Form::text('prepay_cache', old('prepay_cache'), ['class' => 'form-control', 'placeholder' => '0']) !!}
                                <br>

                                {!! Form::label('prepay_kaspi',trans('Предоплата Kaspi').'*') !!}
                                <br>
                                {!! Form::text('prepay_kaspi', old('prepay_kaspi'), ['class' => 'form-control', 'placeholder' => '0']) !!}
                                <br>

                                {!! Form::label('prepay_eurasian',trans('Предоплата Евразийский').'*') !!}
                                <br>
                                {!! Form::text('prepay_eurasian', old('prepay_eurasian'), ['class' => 'form-control', 'placeholder' => '0']) !!}
                                <br>

                                {!! Form::label('prepay_forte',trans('Предоплата Forte').'*') !!}
                                <br>
                                {!! Form::text('prepay_forte', old('prepay_forte'), ['class' => 'form-control', 'placeholder' => '0']) !!}

                            </div>

                            <div class="col">
                                {!! Form::label('post_pay_cache',trans('Оплата по факту наличными').'*') !!}
                                <br>
                                {!! Form::text('prepay_cache', old('prepay_cache'), ['class' => '', 'placeholder' => '0']) !!}
                                <br>

                                {!! Form::label('post_pay_kaspi',trans('Оплата по факту Kaspi').'*') !!}
                                <br>
                                {!! Form::text('post_pay_kaspi', old('post_pay_kaspi'), ['class' => '', 'placeholder' => '0']) !!}
                                <br>

                                {!! Form::label('post_pay_eurasian',trans('Оплата по факту Евразийский').'*') !!}
                                <br>
                                {!! Form::text('post_pay_eurasian', old('post_pay_eurasian'), ['class' => '', 'placeholder' => '0']) !!}
                                <br>

                                {!! Form::label('post_pay_forte',trans('Оплата по факту Forte').'*') !!}
                                <br>
                                {!! Form::text('post_pay_forte', old('post_pay_forte'), ['class' => '', 'placeholder' => '0']) !!}
                            </div>

                            <div class="col">
                                {!! Form::label('extra_pay_cache',trans('Доплата по факту наличными').'*') !!}
                                <br>
                                {!! Form::text('extra_pay_cache', old('extra_pay_cache'), ['class' => '', 'placeholder' => '0']) !!}
                                <br>

                                {!! Form::label('extra_pay_kaspi',trans('Доплата по факту Kaspi').'*') !!}
                                <br>
                                {!! Form::text('extra_pay_kaspi', old('extra_pay_kaspi'), ['class' => '', 'placeholder' => '0']) !!}
                                <br>

                                {!! Form::label('extra_pay_eurasian',trans('Доплата по факту Евразийский').'*') !!}
                                <br>
                                {!! Form::text('extra_pay_eurasian', old('extra_pay_eurasian'), ['class' => '', 'placeholder' => '0']) !!}
                                <br>

                                {!! Form::label('extra_pay_forte',trans('Доплата по факту Forte').'*') !!}
                                <br>
                                {!! Form::text('extra_pay_forte', old('extra_pay_forte'), ['class' => '', 'placeholder' => '0']) !!}
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('additional_information', trans('quickadmin.bookings.fields.additional-information').'*', ['class' => 'control-label']) !!}
                    {!! Form::textarea('additional_information', old('additional_information'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('additional_information'))
                        <p class="help-block">
                            {{ $errors->first('additional_information') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('Precio',trans('quickadmin.bookings.fields.amount').'*') !!}
                    {!! Form::text('amount', old('amount'), ['class' => 'form-control ', 'placeholder' => '', 'required' => '']) !!}
                    {!! Form::label('debt',trans('Долг').'*') !!}
                    {!! Form::text('debt', old('debt'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('additional_information'))
                        <p class="help-block">
                            {{ $errors->first('additional_information') }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        $('.datetimepicker').datetimepicker({
            format: "YYYY-MM-DD HH:mm"
        });
    </script>
@stop
