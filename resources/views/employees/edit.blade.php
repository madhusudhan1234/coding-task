@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h4 class="pull-left">Create Employee</h4>
            </div><!-- ./col-lg-12 -->
        </div><!-- ./row -->
        <hr/>

        <form action="{{ route('employees.update',$id) }}"  method="POST" id="employeeForm">
            <input name="_method" type="hidden" value="PUT">
            {!! csrf_field() !!}

            <div class="row">

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Employee Name *</label>
                        <input id="name" type="text" name="name" class="form-control" value="{{ $employee['name'] }}" required>
                    </div><!-- /.form-group -->
                </div><!-- ./col-lg-6 -->

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="gender">Gender *</label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="male"  @if($employee['name'] == 'male') selected @endif >Male</option>
                            <option value="female" @if($employee['name'] == 'female') selected @endif>FeMale</option>
                            <option value="other" @if($employee['name'] == 'other') selected @endif>Other</option>
                        </select>
                    </div><!-- /.form-group -->
                </div><!-- ./col-lg-6 -->

            </div><!-- ./row -->

            <div class="row">

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="phone">Phone Number *</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{ $employee['phone'] }}" required placeholder="e.g. 9843360552">
                    </div><!-- /.form-group -->
                </div><!-- col-lg-6 -->

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="email">Employee Email *</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ $employee['email'] }}" required>
                    </div><!-- /.form-group -->
                </div><!-- col-lg-6 -->

            </div> <!-- ./row -->

            <div class="row">

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="address">Employee Address *</label>
                        <input type="text" name="address" class="form-control" value="{{ $employee['address'] }}" required>
                    </div><!-- /.form-group -->
                </div><!-- col-lg-6 -->

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nationality">Nationality *</label>
                        <input type="text" name="nationality" class="form-control" value="{{ $employee['nationality'] }}" required>
                    </div><!-- /.form-group -->
                </div><!-- col-.lg-6 -->

            </div><!-- ./row -->

            <div class="row">

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth *</label>
                        <input type="text" name="date_of_birth" class="form-control" value="{{ $employee['date_of_birth'] }}"  required placeholder="e.g. 2051-01-05">
                    </div><!-- /.form-group -->
                </div><!-- col-lg-6 -->

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="education">Education *</label>
                        <select name="education" id="education" class="form-control" required>
                            <option value="slc+" @if($employee['education'] == 'slc+') selected @endif>SLC +</option>
                            <option value="+2above" @if($employee['education'] == '+2above') selected @endif>+2 Above</option>
                            <option value="bachelor" @if($employee['education'] == 'bachelor') selected @endif>Bachelor</option>
                            <option value="master" @if($employee['education'] == 'master') selected @endif>Master</option>
                        </select>
                    </div><!-- /.form-group -->
                </div><!-- col-lg- 6 -->

            </div><!-- ./row -->

            <div class="row">

                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="contact_from">Preferred Mode Of Contact *</label>
                        <select name="contact_from" id="contact_from" class="form-control" required>
                            <option value="email" @if($employee['contact_from'] == 'email') selected @endif>Email</option>
                            <option value="phone"  @if($employee['contact_from'] == 'phone') selected @endif>Phone</option>
                            <option value="none"  @if($employee['contact_from'] == 'none') selected @endif>None</option>
                        </select>
                    </div><!-- /.form-group -->
                </div><!-- col-lg-12 -->

            </div><!-- ./row -->

            <div class="row">

                <div class="col-lg-12">
                    <div class="form-group">
                        <input type="submit" class="btn btn-success pull-right" value="Update Employee">
                    </div>
                </div>

            </div><!-- ./row -->

        </form><!-- ./form -->
    </div><!-- ./container -->

@endsection