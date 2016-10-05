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
                <table class="table" id="employeeTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Nationality</th>
                            <th>Date Of Birth</th>
                            <th>Education</th>
                            <th>Preferred Contact</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee['name'] }}</td>
                                <td>{{ $employee['email'] }}</td>
                                <td>{{ $employee['phone'] }}</td>
                                <td>{{ $employee['email'] }}</td>
                                <td>{{ $employee['address'] }}</td>
                                <td>{{ $employee['date_of_birth'] }}</td>
                                <td>{{ $employee['education'] }}</td>
                                <td>{{ $employee['contact_from'] }}</td>
                                <td>

                                    <a href="{{ route('employees.show',$i) }}">
                                        <i class="ion ion-search"></i>
                                    </a>

                                    <a href="{{ route('employees.edit',$i) }}">
                                        <i class="ion ion-ios-compose-outline"></i>
                                    </a>

                                    <a href="{{ route('employee.delete.confirm',$i) }}">
                                        <i class="ion ion-close-circled"></i>
                                    </a>

                                </td>

                                <?php ++$i;  ?>
                            </tr>
                        @endforeach
                </tbody>
                </table>
            </div><!-- ./col-lg-12 -->
        </div><!-- ./row -->

    </div>
@endsection