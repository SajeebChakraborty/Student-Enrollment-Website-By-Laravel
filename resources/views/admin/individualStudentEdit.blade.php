@extends('layout')

@section('container')
@php 

    $message = Session::get('teacher_status');
    $status = Session::get('student_update_status');
    
  
    
   

@endphp
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/salt/jquery/pages/forms/basic-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Dec 2017 12:34:50 GMT -->
<head>
@if(Session::has('student_update_status'))

      
      <script>
      swal("Congrats!", "Successfully Updated!", "success");
      </script>
      @php
      Session::put('student_update_status',null);
      @endphp



@endif
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add Teacher</title>
  <style>
  select{

    width:200px;
    height:30px;


  }
  </style>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.html" />
</head>

<body class="">
  <!-- partial:../../partials/_settings-panel.html -->
  <div class="settings-panel">
    <ul class="nav nav-tabs" id="setting-panel" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="layouts-tab" data-toggle="tab" href="#layouts-section" role="tab" aria-controls="layouts-section" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section"><i class="mdi mdi-account"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="close-button" href="#"><i class="mdi mdi-window-close"></i></a>
      </li>
    </ul>
    
      <!-- layout section tabends -->
      <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-tab">
        
      </div>
      <!-- chat section tabends -->
    </div>
  </div>
  <!-- partial -->
  <div class="container-scroller">
    <!-- par
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
        @foreach($query as $row)

        <!-- partial -->
        <div class="content-wrapper">
          <h1 class="page-title">Edit Student</h1>
          <div class="row">
              <div class="col-12 col-lg-6 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <h2 class="card-title"></h2>
                          <form class="" action="{{ Url('admin/student/update/'.$row->id) }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                                  <label for="exampleInputEmail1">Full Name</label>
                                  <input type="text" class="form-control p-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="name" value = "{{ $row->name }}" readonly> 
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Roll</label>
                                  <input type="text" class="form-control p-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="roll" value ="{{ $row->roll }} " readonly>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Email address</label>
                                  <input type="email" class="form-control p-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value ="{{ $row->email }} " readonly>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Contact no</label>
                                  <input type="text" class="form-control p-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter contact no" name="contact" value ="{{ $row->phone }}">
                              </div>
                              <div class="form-group">
                              <label for="cars">Choose your Class : </label>
                              <br>
                              
                              <select name="class">
                              
                              @php 

                                $count=5;

                              @endphp

                              
                              @while($count < 11)
                              {
                              <option value="{{ $count }}"@php if($row->class== $count) echo "selected" ; @endphp >{{ $count }}</option>
                              
                              
                              @php 

                                $count++;

                              @endphp

                              }

                              @endwhile

                              </select>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Date of Birth</label>
                                  <input type="date" class="form-control p-input" id="exampleInputPassword1" placeholder="Enter birthdate" name="birth_date" value ="{{ $row->birth_date }}">
                              </div>
                              
                             
                             

                              <div class="form-group">
                                  <label>New Image</label>
                                  <div class="row">
                                    <div class="col-12">
                                      <label for="exampleInputFile2" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-upload btn-label btn-label-left"></i>Browse</label>
                                      <input type="file" class="form-control-file" id="exampleInputFile2" aria-describedby="fileHelp" name="picture">
                                    </div>
                                  </div>
                              </div>
                              
                              <button type="submit" class="btn btn-success">Submit</button>
                          </form>
                      </div>
                  </div>
             @endforeach
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
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
  <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('js/misc.js') }}"></script>
  <script src="{{ asset('js/settings.js') }}"></script>

  <link rel="stylesheet" href="{{asset('node_modules/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <!-- endinject -->
</body>


<!-- Mirrored from www.urbanui.com/salt/jquery/pages/forms/basic-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Dec 2017 12:34:51 GMT -->
</html>



@endsection()