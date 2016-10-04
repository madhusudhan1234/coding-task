@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h4 class="pull-left">List of Employee</h4>
                <a class="pull-right" href="{{ route('employees.create') }}">
                    <button class="btn btn-primary">Add Employee</button>
                </a>
            </div><!-- ./col-lg-12 -->
        </div><!-- ./row -->
        <hr/>

        <div class="row">
            <div class="col-lg-12">
                <table class="table  table-bordered" id="employeeTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>email</th>
                            <th>address</th>
                            <th>nationality</th>
                            <th>Date Of Birth</th>
                            <th>Education</th>
                            <th>Mode of Contact</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee['name'] }}</td>
                                <td>{{ $employee['gender'] }}</td>
                                <td>{{ $employee['email'] }}</td>
                                <td>{{ $employee['phone'] }}</td>
                                <td>{{ $employee['email'] }}</td>
                                <td>{{ $employee['address'] }}</td>
                                <td>{{ $employee['date_of_birth'] }}</td>
                                <td>{{ $employee['education'] }}</td>
                                <td>{{ $employee['contact_from'] }}</td>
                                <td>
                                    <i class="ion ion-search"></i>  <i class="ion ion-ios-compose-outline"></i>  <i class="ion ion-close-circled"></i>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
                </table>
            </div><!-- ./col-lg-12 -->
        </div><!-- ./row -->

    </div>
@endsection