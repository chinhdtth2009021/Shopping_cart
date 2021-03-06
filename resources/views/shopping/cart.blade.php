<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>List Product</h1>
    @if(session('massage'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> {{session('massage')}}
        </div>
    @endif
    @if(session('remove'))
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Danger!</strong> {{session('remove')}}
        </div>
    @endif
    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Thumbnail</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if($shoppingCart == null)
            vui long them moi san pham
        @else
            <?php
            $totalPrice = 0
            ?>
            @foreach($shoppingCart as $shopping)
                <?php
                if (!empty($shopping)) {
                    $totalPrice += $shopping->unitPrice * $shopping->quantity;
                }
                ?>
                <form action="/add" method="get">
                    <input type="hidden" name="cartAction" value="update">
                    <input type="hidden" name="productId" value="{{$shopping->id}}">
                    <tr>
                        <td>{{$shopping->id}}</td>
                        <td>{{$shopping->name}}</td>
                        <td>{{$shopping->unitPrice}}$</td>
                        <td><img src="{{$shopping->thumbnail}}" alt="" width="70px"></td>
                        <td><input type="number" min="1" value="{{$shopping->quantity}}" name="productQuantity"></td>
                        <td>{{$shopping->quantity * $shopping->unitPrice}}$</td>
                        <td>
                            <button class="btn btn-primary">update</button>
                            <a href="/remove?productId={{$shopping->id}}"
                               onclick="return confirm('b???n ch???c ch???n mu???n x??a san pham?')"
                               class="btn btn-danger">Remove</a>
                        </td>
                    </tr>
                </form>
            @endforeach
            <div>ToTal Price:{{$totalPrice}}</div>
        @endif
        </tbody>
    </table>
</div>
<div class="row mt-3 d-flex justify-content-end">
    <form action="/save" class="col-6" method="post">
        @csrf
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="shipName" class="form-control" placeholder="Enter name ">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="shipPhone" class="form-control" placeholder="Enter Phone">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="shipAddress" class="form-control" placeholder="Enter address">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="text" name="note" class="form-control" placeholder="Enter Note">
            </div>
        </div>
        <div class="col form-group">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
</body>
</html>

