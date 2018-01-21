@extends('layouts.newLayout')


@section('style')
<style>
    .info p{
        color:white;
    }
</style>
@endsection

@section('content')

    <div class="newsitem_text">

        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
        </div><!--/.row-->

        <div class="panel panel-container">
            <div class="row">
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="row no-padding">
                            <a  href='{{url("/client/pledge/new")}}'   title="Click make pledges"><button class="btn btn-lg btn-primary">Pledge </button> </a>

                        </div>
                    </div>
                </div>


                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-blue panel-widget border-right">
                        <div class="row no-padding">
                                    <a  href='{{url("/pledges/pending")}}'   title="View pending"><button class="btn btn-lg btn-primary">Pendings</button> </a>

                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="row no-padding">

                            <a  href='{{url("/funds")}}'   title="View pending">  <button class="btn btn-lg btn-primary">My Funds</button></a>

                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="row no-padding">
                            <a  href='{{url("/client/matches")}}'   title="View Matches"> <button class="btn btn-lg btn-primary">Matches</button></a>

                        </div>
                    </div>
                </div>
            </div><!--/.row-->
        </div>




    </div>
@endsection
@section('js')
@endsection