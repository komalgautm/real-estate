<table id="example" class="display table-bordered" style="width:100%">
<thead>
  <tr>
    <th>Sr. No.</th>
    <th>Tenant Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Parmanent Address</th>
    <th>Building Name</th>
    <th>Apartment No.</th>
    <th>Rent (Monthly)</th>
    <th>Maintenance Fee (Monthly)</th>
   <th>Agreement Start Data</th>
   <th>Agreement End Date</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
  <?php $i=1;  ?>
      @foreach ($tenants as $key => $val)
        <tr>
          <th scope="row"><?php echo $i; ?></th>
          <td>{{ ucfirst($val->name)}}</td>
          <td>@if($val->email == '')  Not available @else{{ $val->email}} @endif</td>
          <td>@if($val->contact == '')  Not available @else{{ $val->contact}}@endif</td>
          <td>{{ $val->parmanent_address }}</td>
          <td>{{ $val->building_name }}</td>
          <td>{{ $val->apartment }}</td>
          <td>{{ $val->rent }}</td>
          @if($val->maintenance_fee == "0")
            <td>-</td>
          @else
            <td>{{ $val->maintenance_fee }}</td>
          @endif
          
          <td>{{ $val->agreement_start_date }}</td>
          <td>{{ $val->agreement_end_date }}</td>
          <td><a href="{{url('admin/edit_tenant'.$val->users_id )}}" > <i class="fas fa-edit"></i></a> | <a  href="{{ url('/admin/delete_tenant'.$val->users_id) }}"><i  class="fas fa-trash-alt" style="color: #00ade6;"></i></a> </a></td>
      </tr>
      <?php $i++; ?>
    @endforeach
</tbody>
</table>




$('body').on('click', '.delteadd', function (e) {
e.preventDefault();
//alert('am i here');
if (confirm('Are you sure you want to Delete Ad ?')) {
    var id = $(this).attr('id');
    $.ajax({
        method: "POST",
        url: "{{url()}}/delteadd",
        }).done(function( msg ) {
        if(msg.error == 0){
            //$('.sucess-status-update').html(msg.message);
            alert(msg.message);
        }else{
            alert(msg.message);
            //$('.error-favourite-message').html(msg.message);
        }
    });
} else {
    return false;
}
});