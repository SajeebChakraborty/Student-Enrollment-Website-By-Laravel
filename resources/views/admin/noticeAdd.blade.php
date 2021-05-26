@extends('layout')


@section('container')

<div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">

      
      @if(Session::has('notice_status')) 
        <script>
            swal("Congrats !","Sucessfully notice Uploaded","success");

            </script>

      @php  Session::put('notice_status',null); @endphp

      @endif
        
        <!-- partial -->
        <div class="content-wrapper">
          <h1 class="page-title">Notice Upload</h1>
          <div class="row">
              <div class="col-12 col-lg-6 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <h2 class="card-title"></h2>
                          <form class="" action="{{ URL::to('/admin/notice/add/process') }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                                  <label for="exampleInputEmail1">Title</label>
                                  <input type="text" class="form-control p-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="title"> 
                              </div>
                              
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Details</label>
                                  <textarea rows="4" cols="40" placeholder="Description" name="details"></textarea>
                              </div>
                             
                             
                             
                              
                              <div class="form-group">
                                  <label>File</label>
                                  <div class="row">
                                    <div class="col-12">
                                      <label for="exampleInputFile2" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-upload btn-label btn-label-left"></i>Browse</label>
                                      <input type="file" class="form-control-file" id="exampleInputFile2" aria-describedby="fileHelp" name="file">
                                    </div>
                                  </div>
                              </div>

                              <button type="submit" class="btn btn-success">Submit</button>
                          </form>
                      </div>
                  </div>
             
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
       
        <!-- partial -->
      </div>
      <!-- row-offcanvas ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>


@endsection()