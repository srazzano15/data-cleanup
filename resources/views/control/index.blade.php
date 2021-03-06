@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Control CSV Import</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/import_parse" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group{{ $errors->has('control_file') ? ' has-error' : '' }}">
                            <label for="control_file" class="col-md-4 control-label">Allbound Data CSV File</label>

                            <div class="col-md-6">
                                <input id="control_file" type="file" class="form-control" name="control_file" required>

                                @if ($errors->has('control_file'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('control_file') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="header"> File contains header row?
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Parse CSV
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
