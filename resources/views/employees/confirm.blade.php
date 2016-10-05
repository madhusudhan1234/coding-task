@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('employees.destroy',$id) }}" method="POST" id="employeeForm">
                <input name="_method" type="hidden" value="DELETE">
                {!! csrf_field() !!}

                <div class="alert alert-danger">
                    <div class="alert alert-danger">
                        <strong>Warning</strong> You are about to delete a Employee. This action can not be undone. Are U sure you
                        want to continue ?
                    </div>
                    <input type="submit" value="Yes Delete This Employee" class="btn btn-danger">
                    <a href="{{ route('employees.index') }}" class="btn btn-success"> <strong>No Get Me Out Of Here</strong></a>
                </div>
            </form><!-- ./form -->
        </div><!-- ./row -->
    </div><!-- ./container -->
@endsection