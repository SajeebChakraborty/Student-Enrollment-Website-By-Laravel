@extends('layout')

@section('container')

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/salt/jquery/pages/forms/basic-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Dec 2017 12:34:50 GMT -->
<head>





    @if(Session::has('live_class_status')) 
    
        <script>
            swal("Congrats !","Sucessfully Live Class is Uploaded","success");

            </script>
    @php
        Session::put('live_class_status',null);

    @endphp

    @endif

    @php

        $time=Session::get('time');

    @endphp
        @if($time)
        

          <font color="red"><center>That time has already Live Class ! </center></font>
      @php

          Session::put('time',null);

      @endphp

      @endif
    
      @php

      $time=Session::get('real_time');

      @endphp
      @if($time)


        <font color="red"><center>Wrong Time ! </center></font>
      @php

        Session::put('real_time',null);

      @endphp

      @endif



  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Live Class</title>
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
        
      
        <div class="content-wrapper">
          <h1 class="page-title">Live Class Info</h1>
          <div class="row">
              <div class="col-12 col-lg-6 grid-margin">
                  <div class="card">
                      <div class="card-body">
                          <h2 class="card-title"></h2>
                          
                          <form class="" action="{{ URL::to('/admin/live-class/confirm') }}" method="post" enctype="multipart/form-data">
                          @csrf
                             <div class="form-group">
                                  <label for="exampleInputEmail1">Subject</label>
                                  <input type="text" class="form-control p-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter subject" name="subject"> 
                              </div>

                              <div class="form-group">
                                  <label for="exampleInputEmail1">Date</label>
                                  <input type="date" class="form-control p-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="date"> 
                              </div>
                              
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Staring Time</label>
                                  <input type="time" class="form-control p-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="start_time">
                              </div>
                        
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Ending Time</label>
                                  <input type="time" class="form-control p-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" name="end_time">
                              </div>

                              <div class="form-group">
                                  <label for="exampleInputEmail1">Class Link</label>
                                  <textarea rows="2" cols="40" placeholder="Enter Class Link" name="link"></textarea>
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
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/misc.js"></script>
  <script src="../../js/settings.js"></script>
  <!-- endinject -->
</body>


<!-- Mirrored from www.urbanui.com/salt/jquery/pages/forms/basic-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Dec 2017 12:34:51 GMT -->
</html>



@endsection()