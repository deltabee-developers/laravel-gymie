<?php use Carbon\Carbon; ?>

<!-- Hidden Fields -->
@if(Request::is('members/create'))
    {!! Form::hidden('invoiceCounter',$invoiceCounter) !!}
    {!! Form::hidden('memberCounter',$memberCounter) !!}
@endif

<div class="row">
    <div class="col-sm-6">
      <div class="form-group">
          {!! Form::label('name','Name',['class'=>'control-label']) !!}
          {!! Form::text('name',null,['class'=>'form-control', 'id' => 'name']) !!}
      </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('address','Address',['class'=>'control-label']) !!}
            {!! Form::text('address',null,['class'=>'form-control', 'id' => 'address']) !!}
        </div>
    </div>
</div>

<div class="row">

    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('DOB','Date of birth') !!}
            {!! Form::text('DOB',null,['class'=>'form-control datepicker-default', 'id' => 'DOB']) !!}
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('gender','Gender') !!}
            {!! Form::select('gender',array('m' => 'Male', 'f' => 'Female'),null,['class'=>'form-control selectpicker show-tick show-menu-arrow', 'id' => 'gender']) !!}
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('language','Language Speaks') !!}
            {!! Form::text('languages',null,['class'=>'form-control', 'id' => 'languages']) !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('certification','Certification') !!}
            {!! Form::text('certification',null,['class'=>'form-control', 'id' => 'certification']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('timings','Timings') !!}
            {!! Form::text('timings',null,['class'=>'form-control', 'id' => 'timings']) !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('education','Education') !!}
            {!! Form::text('education',null,['class'=>'form-control', 'id' => 'education']) !!}
        </div>
    </div>
</div>

<div class="row">
    @if(isset($member))
        <?php
        $media = $member->getMedia('photo');
        $image = ($media->isEmpty() ? 'https://placeholdit.imgix.net/~text?txtsize=18&txt=NA&w=70&h=70' : url($media[0]->getUrl('form')));
        ?>
        <div class="col-sm-4">
            <div class="form-group">
                {!! Form::label('photo','Photo') !!}
                {!! Form::file('photo',['class'=>'form-control', 'id' => 'photo']) !!}
            </div>
        </div>
        <div class="col-sm-2">
            <img alt="profile Pic" class="pull-right" src="{{ $image }}"/>
        </div>
    @else
        <div class="col-sm-6">
            <div class="form-group">
                {!! Form::label('photo','Photo') !!}
                {!! Form::file('photo',['class'=>'form-control', 'id' => 'photo']) !!}
            </div>
        </div>
    @endif

    <div class="col-sm-6">
        <div class="form-group">
        {!! Form::label('status','Status') !!}
        <!--0 for inactive , 1 for active-->
            {!! Form::select('status',array('1' => 'Active', '0' => 'InActive'),null,['class' => 'form-control selectpicker show-tick show-menu-arrow', 'id' => 'status']) !!}
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
