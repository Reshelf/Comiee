@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        {{-- エラー文 --}}
                        @include('atoms._error_card_list')

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            <div class="form-group">
                                <label for="phone" class="col-md-4 control-label">Phone</label>

                                <div class="col-md-6">

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <select name="country_code" style="width: 150px;">
                                                <option value="+1">(+1) US</option>
                                                <option value="+212">(+212) Morocco</option>
                                            </select>
                                        </div>
                                        <input id="phone" type="text" class="form-control" name="phone" required>

                                        @if ($errors->has('country_code'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('country_code') }}</strong>
                                            </span>
                                        @endif
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
