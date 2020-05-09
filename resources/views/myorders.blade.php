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
        <div class="agileinfo-ads-display col-md-12">
            <div class="wrapper" style="overflow-x: scroll;">
                <table id="ordersTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            <th>Order Id</th>
            <th>Transaction Id</th>
                <th>Name</th>
                <th>Contact Number</th>
                <th>Landmark</th>
                <th>Town/City</th>
                <th>Pincode</th>
                <th>Address Type</th>
                <th>Total Items</th>
                <th>Sub Total</th>
                <th>Delivery Charges</th>
                <th>Final Price</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
                <th>View Details</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $key => $cat)
            <tr>
                <td>{{$cat->order_id}}</td>
                <td>{{$cat->transaction_id}}</td>
                <td>{{$cat->name}}</td>
                <td>{{$cat->mobile}}</td>
                <td>{{$cat->landmark}}</td>
                <td>{{$cat->town_city}}</td>
                <td>{{$cat->pincode}}</td>
                <td>{{$cat->address_type}}</td>
                <td>{{$cat->total_items}}</td>

                <td>{{$cat->sub_total}}</td>
                <td>{{$cat->delivery_charge}}</td>
                <td>{{$cat->total_price}}</td>
                <td>{{$cat->payment_status}}</td>
                <td>{{$cat->delivery_status}}</td>
                <td><a href="{{url('sub_orders',$cat->order_id)}}"><i class="fa fa-eye" style="color:red"></i></a></td>
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