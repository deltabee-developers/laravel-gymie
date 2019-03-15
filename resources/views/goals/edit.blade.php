@extends('app')

@section('content')

    <div class="rightside bg-grey-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel no-border">
                        <div class="panel-title">
                            <div class="panel-head font-size-20">Enter details of the Goal</div>
                        </div>

                        {!! Form::model($goal, ['method' => 'POST','action' => ['GoalsController@update',$goal->id],'id'=>'Goalsform']) !!}

                        @include('goals.form',['submitButtonText' => 'Update'])

                        {!! Form::Close() !!}

                        </form>

                    </div>
                </div>
            </div>
        </div>

        @stop
        @section('footer_scripts')
            <script src="{{ URL::asset('assets/js/service.js') }}" type="text/javascript"></script>
@stop