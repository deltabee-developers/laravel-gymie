@extends('app')

@section('content')

    <div class="rightside bg-grey-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel no-border">
                        <div class="panel-title">
                            <div class="panel-head font-size-20">Enter details of the program</div>
                        </div>

                        {!! Form::model($trainer, ['method' => 'POST','action' => ['TrainerController@updateProgram',$trainer->id],'id'=>'trainerform']) !!}

                        @include('trainer.form',['submitButtonText' => 'Update'])

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
