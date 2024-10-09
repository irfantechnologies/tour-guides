@extends('layouts.backend.master')
@section('title')
    Tourist Guide - Banner Edit
@endsection
@section('content')

<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header  bg-dark">
                      <h3 class="card-title float-left"><strong>Update Banner</strong></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      @include('partial.errors')
                      <form action="{{ route('admin.activity.update', $activity->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <label for="title">  Title : </label>
                          <input type="text" class="form-control" value="{{ old('title', $activity->title) }}" placeholder="Enter Title" id="title" name="title">
                        </div>
                         
                        <div class="form-group">
                          <label for="isActive">Status:</label>
                          <div class="custom-control custom-switch">
                            <input
                              type="checkbox"
                              class="custom-control-input"
                              id="statusToggle"
                              name="isActive"
                              value="1"
                              {{  old('isActive', $activity->isActive) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="statusToggle">Active</label>
                          </div>
                        </div>


                        <div class="form-group">
                          <label for="image"> Image: </label>
                          <input type="file" class="form-control" id="image" name="image" onchange="loadPreview(this);">
                        </div>
                          
                          <div class="form-group">
                              <img src={{ $activity->image }} id="preview_img" width="200px">
                          </div>
                      
                        <div class="form-group">
                              <button type="submit" class="btn btn-success">Update</button>
                              <a href="{{ route('admin.activity.index') }}" class="btn btn-danger wave-effect" >Back</a>
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


 @section('scripts')
<script src="{{ asset('js/trix.js') }}"></script>
<script>
    function loadPreview(input, id) {
      id = id || '#preview_img';
      if (input.files && input.files[0]) {
          var reader = new FileReader();
   
          reader.onload = function (e) {
              $(id)
                      .attr('src', e.target.result)
                      .width(200)
                      .height(140);
          };
   
          reader.readAsDataURL(input.files[0]);
      }
   }

</script>
@endsection

@section('css')
<link href="{{ asset('css/trix.css') }}" rel="stylesheet">
@endsection
      