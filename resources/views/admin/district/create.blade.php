@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Create District
@endsection
@section('content')

<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header  bg-dark">
                      <h3 class="card-title float-left"><strong>Create District</strong></h3>
                  
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    


                  @include('partial.errors')

                    <form action="{{ route('admin.district.store') }}" method="POST" >
					        @csrf
					        <div class="form-group">
					          <label for="name"> Name: </label>
					          <input type="text" class="form-control" placeholder="Enter District Name" id="name" name="name">
					        </div>

                  <div class="form-group">
                        <button type="submit" class="btn btn-success">Create</button>
                        <a href="{{ route('admin.district.index') }}" class="btn btn-danger wave-effect" >Back</a>
                  </div>
					      

      				</form>
                     
                      
                    </div>
                   
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container -->





 @endsection