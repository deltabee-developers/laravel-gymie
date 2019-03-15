@extends('app')

@section('content')

<div class="rightside bg-grey-100">

    <!-- BEGIN PAGE HEADING -->
    <div class="page-head bg-grey-100 padding-top-15 no-padding-bottom">
        @include('flash::message')
        <h1 class="page-title no-line-height">View Feedbacks
            @permission(['manage-gymie','manage-members'])
            <!-- <a href="{{ action('MembersController@create') }}" class="page-head-btn btn-sm btn-primary active" role="button">Add New</a> -->
            <!-- <small>Feedback of all gym members</small> -->
        </h1>
        @permission(['manage-gymie','pagehead-stats'])
        <h1 class="font-size-30 text-right color-blue-grey-600 animated fadeInDown total-count pull-right"><span data-toggle="counter" data-start="0"
                                                                                                                 data-from="0" data-to="{{ $count }}"
                                                                                                                 data-speed="600"
                                                                                                                 data-refresh-interval="10"></span>
            <small class="color-blue-grey-600 display-block margin-top-5 font-size-14">Total Feedbacks</small>
        </h1>
        @endpermission
        @endpermission
    </div><!-- / PageHead-->

    <div class="container-fluid">
        <div class="row"><!-- Main row -->
            <div class="col-lg-12"><!-- Main Col -->
                <div class="panel no-border ">
                    <div class="panel-body bg-white">

                        @if(count($members_feedback) == 0)
                            <h4 class="text-center padding-top-15">Sorry! No records found</h4>
                        @else
                            <table id="members" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Member Name</th>
                                    <th>Feedback To</th>
                                    <th>Feedback Description</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach ($members_feedback as $member)
                                    <tr>
                                        <td>{{ $member->m_name}}</td>
                                        <td>{{ $member->name}}</td>
                                        <td>{{ $member->description}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>



                    </div><!-- / Panel Body -->
                    @endif
                </div><!-- / Panel-no-border -->
            </div><!-- / Main Col -->
        </div><!-- / Main Row -->
    </div><!-- / Container -->
</div><!-- / RightSide -->
@stop
@section('footer_script_init')
    <script type="text/javascript">
        $(document).ready(function () {
            gymie.deleterecord();
        });
    </script>
@stop
