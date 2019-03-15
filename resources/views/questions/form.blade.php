<div class="panel-body">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::label('name','Question') !!}
                {!! Form::text('name',null,['class'=>'form-control', 'id' => 'name']) !!}
            </div>
        </div>

        <div class="col-sm-6">
        <div class="form-group">
                 <?php $questiontypes = App\QuestionType::where('id', '!=', '0')->lists('name', 'id'); ?>
                     {!! Form::label('Question Type') !!}
                     {!! Form::select('question_type_id',$questiontypes,null,['class'=>'form-control selectpicker show-tick show-menu-arrow', 'id' => 'question_type_id']) !!}
                 </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary pull-right']) !!}
            </div>
        </div>
    </div>
</div>
                            