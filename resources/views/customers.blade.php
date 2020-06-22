<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Customer</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/grid/">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

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
    <!-- Custom styles for this template -->
    <link href="grid.css" rel="stylesheet">
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"  crossorigin="anonymous"></script>
  </head>
  <body class="py-4">
<div class="container">

  <h1>Customer List</h1>

  <div class="alert alert-Red" role="alert">
    Highlight 'Removed' customers in <strong>RED</strong>
  </div>
  <div class="alert alert-Orange" role="alert">
    'Active' customers who have not placed any orders during the last 12 months in <strong>ORANGE</strong>
  </div>
  <div class="alert alert-Green" role="alert">
    'Active' customers who have placed a minumum of AUD $200.00 in sales over the last 3 months in <strong>GREEN</strong> (check the 'OrderStatus' and make sure you are only including 'Completed' orders in this calculation)
  </div>


  <div class="table-responsive">
    <table class="table table-sm">
      <thead class="thead-dark">
        <tr>
          <th class="text-center">Customer Name</th>
          <th class="text-center">Customer Status</th>
          <th class="text-center">Total Order Count</th>
          <th class="text-center">Total Order ($ AUD)</th>
        </tr>
      </thead>
      <tbody id="div1">
      <?php $orderTotalSum = 0; ?>
      <?php $orderTotalCnt = 0; ?>
        @foreach($customers as $customer)
          <tr class="text-center {{$customer->CustomerType}}">
            <td class="text-center">{{$customer->Name}}</td>
            <td class="text-center">{{$customer->CustomerStatusName}}</td>
            <td class="text-right">{{$customer->OrderTotalCnt}}</td>
            <td class="text-right">$ {{$customer->OrderTotalSum}}</td>
          </tr>
          
          <?php $orderTotalSum += $customer->OrderTotalSum; ?>
          <?php $orderTotalCnt += $customer->OrderTotalCnt; ?>
        @endforeach
      </tbody>

      @if(count($customers) > 0 )
      <tfoot>
        <tr class="table-dark">
          <th class="text-center" colspan="2"> Total</th>
          <td class="text-right">{{$orderTotalCnt}}</td>
          <td class="text-right">$ {{$orderTotalSum}}</td>
        </tr>
      </tfoot>
      @endif
    </table>
  </div>

  <hr class="my-4">

  <p></p>
  
</div>


</body>
</html>
