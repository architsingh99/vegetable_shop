@include('header')

<div class="ads-grid">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Order Id: {{$order_id}}
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <div class="agileinfo-ads-display col-md-12">
            <div class="wrapper" style="overflow-x: scroll;">
                <table id="ordersTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
                
                <th>Total price</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $key => $cat)
        <?php
                             if($cat->product->quantity_in_grams == 1)
                                $valueForDisplay = $cat->quantity < 1000 ? $cat->quantity . " g" : $cat->quantity/1000 . " kg";
                              else
                                $valueForDisplay = $cat->quantity;
          ?>
            <tr>
                <td>{{$cat->item_name}}</td>
                
                <td>{{$cat->price}}</td>
                <td>{{$valueForDisplay}}</td>
                <td>{{$cat->total}}</td>
               </tr>
            @endforeach
        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

	<script>
$(document).ready(function() {
   var table = $('#ordersTable').DataTable({
    dom: 'lfBrtip',
    buttons: [
        {
          extend: 'excelHtml5',
          exportOptions: {
            columns: ':visible'
          },
          title: "Orders"
        },
        {
          extend: 'pdfHtml5',
          exportOptions: {
            columns: ':visible'
          },
          title: "Orders"
        },
        {
          extend: 'csvHtml5',
          exportOptions: {
            columns: ':visible',
          },
          title: "Orders"
        }
    ]
    });
} );
</script>
@include('footer')