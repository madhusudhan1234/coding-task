@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h4 class="pull-left">Create Employee</h4>
            </div><!-- ./col-lg-12 -->
        </div><!-- ./row -->
        <hr/>


        <form action="{{ route('employees.store') }}" method="POST" id="employeeForm">
            {!! csrf_field() !!}

            <div class="row">

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Employee Name *</label>
                        <input id="name" type="text" name="name" class="form-control" required>
                    </div><!-- /.form-group -->
                </div><!-- ./col-lg-6 -->

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="gender">Gender *</label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="male">Male</option>
                            <option value="female">FeMale</option>
                            <option value="other">Other</option>
                        </select>
                    </div><!-- /.form-group -->
                </div><!-- ./col-lg-6 -->

            </div><!-- ./row -->

            <div class="row">

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="phone">Phone Number *</label>
                        <input type="text" id="phone" name="phone" class="form-control" required
                               placeholder="e.g. 9843360552">
                    </div><!-- /.form-group -->
                </div><!-- col-lg-6 -->

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="email">Employee Email *</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div><!-- /.form-group -->
                </div><!-- col-lg-6 -->

            </div> <!-- ./row -->

            <div class="row">

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="address">Employee Address *</label>
                        <input type="text" name="address" class="form-control" required >
                    </div><!-- /.form-group -->
                </div><!-- col-lg-6 -->

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nationality">Nationality *</label>
                        <input type="text" name="nationality" class="form-control" required>
                    </div><!-- /.form-group -->
                </div><!-- col-.lg-6 -->

            </div><!-- ./row -->

            <div class="row">

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth *</label>
                        <input type="text" name="date_of_birth" class="form-control" date="true" required
                               placeholder="e.g. 2051-01-05">
                    </div><!-- /.form-group -->
                </div><!-- col-lg-6 -->

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="education">Education *</label>
                        <select name="education" id="education" class="form-control" required>
                            <option value="slc+">SLC +</option>
                            <option value="+2above">+2 Above</option>
                            <option value="bachelor">Bachelor</option>
                            <option value="master">Master</option>
                        </select>
                    </div><!-- /.form-group -->
                </div><!-- col-lg- 6 -->

            </div><!-- ./row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="contact_from">Preferred Mode Of Contact *</label>
                        <select name="contact_from" id="contact_from" class="form-control" required>
                            <option value="email">Email</option>
                            <option value="phone">Phone</option>
                            <option value="none">None</option>
                        </select>
                    </div><!-- /.form-group -->
                </div><!-- col-lg-12 -->
            </div><!-- ./row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="submit" class="btn btn-success pull-right" value="Add Employee">
                    </div>
                </div>
            </div><!-- ./row -->

        </form><!-- ./form -->
    </div><!-- ./container -->
@endsection