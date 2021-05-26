<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SSLCommerz">
    <title>Payment</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body class="bg-light">
<div class="container">
    

    <div class="row">
    @foreach($query5 as $row)

    @foreach($res as $row2)
       
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                
                <span class="text-muted"><br>Your cart</span>
                <span class="badge badge-secondary badge-pill">1</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Tution Fee</h6>
                        <small class="text-muted">Per Month 1200</small>
                    </div>
                    <span class="text-muted"> {{ $row->invoice_money }}</span>
                </li>
              
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (BDT)</span>
                    <strong>{{ $row->invoice_money }} TK</strong>
                </li>
            </ul>
        </div>
        <div class="col-md-8 order-md-1">
            <br>
            <h4 class="mb-3">Billing Info</h4>
            <form method="POST" class="needs-validation" novalidate>
            <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="firstName">Invoice number</label>
                        <input type="text" name="" class="form-control" id="customer_name" placeholder=""
                               value="{{ $row->invoice_number }}" required readonly>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="firstName">Full name</label>
                        <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder=""
                               value="{{ $row2->name }}" required readonly>
                        <div class="invalid-feedback">
                            Valid customer name is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="mobile">Mobile</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                         
                        </div>
                        <input type="text" name="customer_mobile" class="form-control" id="mobile" placeholder="Mobile"
                               value="{{ $row2->phone }}" required readonly>
                        <div class="invalid-feedback" style="width: 100%;">
                            Your Mobile number is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email <span class="text-muted"></span></label>
                    <input type="email" name="customer_email" class="form-control" id="email"
                           placeholder="you@example.com" value="{{ $row2->email }}" required readonly>
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

               

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="firstName">Invoice Month</label>
                        <input type="text" name="customer_name" class="form-control" id="customer_name" placeholder=""
                               value="{{ $row->invoice_month }}" required readonly>
                       
                    </div>
                </div>
             
                
              
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata="your javascript arrays or objects which requires in backend"
                        order="If you already have the transaction generated for current order"
                        endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                </button>
            </form>
        </div>
    </div>

       
        @endforeach
        @endforeach
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


<!-- If you want to use the popup integration, -->
<script>
    var obj = {};
    obj.cus_name = $('#customer_name').val();
    obj.cus_phone = $('#mobile').val();
    obj.cus_email = $('#email').val();
    obj.cus_addr1 = $('#address').val();
    obj.amount = $('#total_amount').val();

    $('#sslczPayBtn').prop('postdata', obj);

    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>
</html>
