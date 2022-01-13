
<!-- main header @e -->
<!-- content @s -->
<div class="nk-content ">
<div class="container-fluid">
<div class="nk-content-inner">
<div class="nk-content-body">
<div class="components-preview wide-md mx-auto">

<div class="nk-block nk-block-lg">

<div class="card card-preview">
<div class="card-inner">
<table class="datatable-init nowrap table">
<thead>
<tr>
<th>Sl</th>
<th>City Name</th>
</tr>
</thead>
  
<tbody>
 <?php 
    $x=1;
    foreach($qry as $row){?> 
<tr>    
<td><?php echo $x++;?></td>
<td><?php echo $row['city_name'];?><td>
</tr>
   <?php }?> 
</tbody>

</table>
</div>
</div><!-- .card-preview -->
</div> <!-- nk-block -->


</div><!-- .components-preview -->
</div>
</div>
</div>
</div>
<!-- content @e -->
