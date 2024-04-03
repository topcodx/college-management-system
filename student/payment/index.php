<!DOCTYPE html>
<html lang="en">

<head>
    <title>How to Integrate Razorpay payment gateway in PHP | tutorialswebsite.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><b>VMJ University Payment</b></h4>
                    </div>
                    <form action="./checkout.php" method="post">
                        <div class="panel-body">
                        
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="test" id="billing_name"
                                    placeholder="Enter name" required="" autofocus="">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="test@gmail.com" id="billing_email"
                                    placeholder="Enter email" required="">
                            </div>

                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="number" class="form-control" name="mobile"  value="1234567890" id="billing_mobile"
                                    min-length="10" max-length="10" placeholder="Enter Mobile Number" required=""
                                    autofocus="">
                            </div>

                            <div class="form-group">
                                <label>Payment Amount</label>
                                <input type="text" class="form-control" name="amount" id="payAmount" value="100"
                                    placeholder="Enter Amount" required="" autofocus="">
                            </div>

                            <!-- submit button -->
                            <button type="submit" id="PayNow" class="btn btn-success btn-lg btn-block">Submit & Pay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>