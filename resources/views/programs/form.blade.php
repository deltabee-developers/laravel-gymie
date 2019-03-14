<div class="panel-body">
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('name','Program Name') !!}
                {!! Form::text('name',null,['class'=>'form-control', 'id' => 'name']) !!}
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('description','Program Description') !!}
                {!! Form::text('description',null,['class'=>'form-control', 'id' => 'description']) !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                {!! Form::label('program_icon','Program Icon') !!}
                {!! Form::file('program_icon',['class'=>'form-control', 'id' => 'program_icon']) !!}
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
                            