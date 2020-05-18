@include('header')

<div class="ads-grid">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">My Orders
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <div style=" margin-top: 2em;" class="agileinfo-ads-display col-md-12">
            <div class="wrapper" style="overflow-x: scroll;">
                <table id="ordersTable" class="table table-striped table-bordered" style="width:100%; ">
        <thead>
            <tr>
            <th>Order Id</th>
                <th>Delivery Address</th>
                <th>Total Items</th>
               <th>Total Price</th>
                <th>Payment Method</th>
                <th>Delivery Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $key => $cat)
            <tr>
                <td>{{$cat->order_id}}</td>
                <td>{{$cat->landmark}}</td>
               <td>{{$cat->total_items}}</td>
                <td>{{$cat->total_price}}</td>
                <td>{{$cat->payment_status}}</td>
                <td>{{$cat->delivery_status}}</td>
                <td><a href="{{url('sub_orders',$cat->order_id)}}"><input style="    color: black;   background-color: #bfcc00;
    font-weight: 700;" type="button" name="submit" value="Vew Details"
                                        class="button" /></a></td>
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
        // {
        //   extend: 'excelHtml5',
        //   exportOptions: {
        //     columns: ':visible'
        //   },
        //   title: "Orders"
        // },
        // {
        //   extend: 'pdfHtml5',
        //   exportOptions: {
        //     columns: ':visible'
        //   },
        //   title: "Orders"
        // }
        // {
        //   extend: 'csvHtml5',
        //   exportOptions: {
        //     columns: ':visible',
        //   },
        //   title: "Orders"
        // }
    ]
    });
} );
</script>
@include('footer')