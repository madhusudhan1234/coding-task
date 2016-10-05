@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h4 class="pull-left">{{ $employee['name'] }}'s Detail Information</h4>
            </div><!-- ./col-lg-12 -->
        </div><!-- ./row -->

        <div class="row">
            <div class="col-lg-12">
                <ul class="list-group">
                    <li class="list-group-item">
                        <table class="table">
                            <tr>
                                <td> <b>Name  :</b> </td>
                                <td> {{ $employee['name'] }}</td>
                            </tr>
                            <tr>
                                <td><b>Gender  :</b> </td>
                                <td>{{ $employee['gender'] }}</td>
                            </tr>
                            <tr>
                                <td>Phone Number  : </td>
                                <td>{{ $employee['phone'] }}</td>
                            </tr>
                            <tr>
                                <td><b>Email Address  :</b></td>
                                <td> {{ $employee['email'] }}</td>
                            </tr>
                            <tr>
                                <td><b>Address  : </b></td>
                                <td>{{ $employee['address'] }}</td>
                            </tr>
                            <tr>
                                <td><b>Nationality  :</b></td>
                                <td> {{ $employee['nationality'] }}</td>
                            </tr>
                            <tr>
                                <td><b>Date of Birth  :</b></td>
                                <td>{{ $employee['date_of_birth'] }}</td>
                            </tr>
                            <tr>
                                <td><b>Education Level  :</b></td>
                                <td>{{ $employee['education'] }}</td>
                            </tr>
                            <tr>
                                <td><b>You can Contact By  : </b></td>
                                <td>{{ $employee['contact_from'] }}</td>
                            </tr>
                        </table>
                      </li>
                </ul>
            </div><!-- ./col-lg-12 -->
        </div><!-- ./row -->
    </div>

@endsection