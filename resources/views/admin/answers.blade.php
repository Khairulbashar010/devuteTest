@extends('layouts.admin.app')

@section('title', 'Answers')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Wellcome To Answers
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Answers List</h3>
                                    <h2 class="box-title"><span class="badge bg-blue">{{$rowCount}}</span></h2>
                                </div>
                                <!-- /.box-header -->
                                @if(!$AnswersData->isEmpty())
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>User Name</th>
                                                <th>Mother's Maiden Name</th>
                                                <th>First Pet</th>
                                                <th>Favourite Teacher</th>
                                            </tr>
                                            @foreach($AnswersData as $data)
                                                <tr>
                                                    <td>{{$data->user->name}}</td>
                                                    <td>{{$data->mother_maiden_name}}</td>
                                                    <td>{{$data->first_pet}}</td>
                                                    <td>{{$data->favourite_teacher}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                        <div class="continer">
                                        </div>
                                    </div>
                                @else
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>Answers Name</th>
                                                <th>Photo</th>
                                                <th>Url</th>
                                                <th>Meta Tag</th>
                                                <th style="width: 150px">Action</th>
                                            </tr>
                                        </table>
                                        <div class="login-box">
                                            <h1 style="color: red;">No Data Availabe</h1>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
        </section>
    </div>
@endsection
