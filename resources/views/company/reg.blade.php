<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    <div class="nk-block nk-block-lg">
                        <div class="card card-preview">
                            <div class="card-inner">
                                <a data-toggle="modal" data-target="#addcompany" onclick="upid()"
                                   class="btn btn-outline-info float-right">Add New</a>
                                <!--- table start-->
                                <table class="datatable-init nowrap table">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Company</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Logo</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>



                                        {{$x=1}}
                                        @foreach ($data as $row)
                                            <tr>
                                            <td>{{ $x++ }}</td>
                                            <td>{{ $row['company_name'] }}</td>
                                            <td>{{ $row['address'] }}</td>
                                            <td>{{ $row['email'] }}</td>
                                            <td>{{ $row['phone'] }}</td>
                                                <td><img style="height: 80px; width: 80px;" src="{{URL('/').'/'. $row['logo'] }}" class="img-thumbnail" /></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#deleteid" onclick="delet_value_pass({{ $row['company_id'] }})"
                                                   class="btn btn-danger">Delete</a>
                                                <a data-toggle="modal" data-target="#updateid" onclick="update_value_pass('{{ $row['company_id'] }}','{{ $row['company_name'] }}','{{ $row['email'] }}','{{ $row['address'] }}','{{ $row['phone'] }}','{{ $row['logo'] }}')"
                                                   class="btn btn-primary">Update</a>

                                            </td>
                                            </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                                <!--- table start-->
                                <!-- Delete Modal Start-->
                                <div id="deleteid" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4>Do you Want to delete data?</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;
                                                </button>
                                            </div>
                                            <form id="delete_data" method="post">
                                                <div class="modal-body">

                                                    <input type="text" name="del_id" id="del_id" value=""
                                                           class="form-control form-control-sm"/>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-success" type="button" onclick="delets()">
                                                        Yes
                                                    </button>
                                                    <button class="btn btn-danger" class="close" data-dismiss="modal">
                                                        No
                                                    </button>

                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                </div>

                                <!-- Delete Modal End-->
                                <!-- start add Modal-->
                                <div id="addcompany" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-lg">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4>Add City</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;
                                                </button>
                                            </div>
                                            <form id="save_data" method="post" enctype="multipart/form-data">

                                                <div class="modal-body">

                                                    <div class="mb-3 mt-3">
                                                        <label for="company_name" class="form-label">Company
                                                            Name:</label>
                                                        <input type="text" class="form-control" id="company_name"
                                                               placeholder="Company Name" name="company_name">
                                                    </div>
                                                    <div class="mb-3 mt-3">
                                                        <label for="email" class="form-label">Email:</label>
                                                        <input type="email" class="form-control" id="email"
                                                               placeholder="Enter email" name="email">
                                                    </div>
                                                    <div class="mb-3 mt-3">
                                                        <label for="address" class="form-label">Address:</label>
                                                        <input type="text" class="form-control" id="address"
                                                               placeholder="Enter Address" name="address">
                                                    </div>
                                                    <div class="mb-3 mt-3">
                                                        <label for="phone" class="form-label">Phone:</label>
                                                        <input type="text" class="form-control" id="phone"
                                                               placeholder="Enter Phone" name="phone">
                                                    </div>
                                                    <div class="mb-3 mt-3">
                                                        <label for="logo" class="form-label">Logo:</label>
                                                        <input type="file" class="form-control" id="logo"
                                                               placeholder="Enter logo" name="logo">
                                                    </div>
                                                    <input type="hidden" name="_token" id="_token"
                                                           value="{{ csrf_token()}}">
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-success" type="button"
                                                            onclick="addcompany()">Save
                                                    </button>
                                                    <button class="btn btn-danger" class="close" data-dismiss="modal">
                                                        Cancel
                                                    </button>

                                                </div>
                                            </form>
                                        </div>


                                    </div>

                                </div>
                                <!-- Ednd add model-->
                                <!-- update Modal-->

                                <div id="updateid" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-lg">

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4>Update City</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;
                                                </button>
                                            </div>
                                            <form method="post" id="update_data">

                                                <div class="modal-body">

                                                    <div class="mb-3 mt-3">
                                                        <label for="company_name" class="form-label">Company
                                                            Name:</label>
                                                        <input type="text" class="form-control" id="ucompany_name"
                                                               placeholder="Company Name" name="company_name">
                                                    </div>
                                                    <div class="mb-3 mt-3">
                                                        <label for="email" class="form-label">Email:</label>
                                                        <input type="email" class="form-control" id="uemail"
                                                               placeholder="Enter email" name="email">
                                                    </div>
                                                    <div class="mb-3 mt-3">
                                                        <label for="address" class="form-label">Address:</label>
                                                        <input type="text" class="form-control" id="uaddress"
                                                               placeholder="Enter Name" name="address">
                                                    </div>
                                                    <div class="mb-3 mt-3">
                                                        <label for="phone" class="form-label">Phone:</label>
                                                        <input type="text" class="form-control" id="uphone"
                                                               placeholder="Enter Phone" name="phone">
                                                    </div>
                                                    <div class="mb-3 mt-3">
                                                        <label for="logo" class="form-label">Logo:</label>
                                                        <input type="file" class="form-control" id="ulogo"
                                                               placeholder="Enter logo" name="logo">
                                                    </div>
                                                    <input type="hidden" id="ucompany_id" name="ucompany_id" value="" />
                                                    <input type="hidden" name="_token" id="u_token" value="{{ csrf_token()}}">

                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-success" type="button" onclick="updatecompany()">Save
                                                    </button>
                                                    <button class="btn btn-danger" class="close" data-dismiss="modal">
                                                        Cancel
                                                    </button>

                                                </div>
                                            </form>
                                        </div>


                                    </div>

                                </div>

                                <!-- Ednd add model-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>

</script>
<script>

    function delet_value_pass(id){
        $('#del_id').val(id);
    }
    function update_value_pass(id,name,email,address,phone,logo){

        $('#ucompany_id').val(id);
        $('#ucompany_name').val(name);
        $('#uemail').val(email);
        $('#uaddress').val(address);
        $('#uphone').val(phone);
        $('#ulogo').val(logo);
    }
    function addcompany() {
        var form = $('#save_data').get(0);
        $.ajax({
            url: 'comadd',
            method: 'POST',
            data: new FormData(form),
            processData: false,
            contentType: false,
            success: function () {
                window.location.assign('comreg');
            }


        })
    }

    function delets() {
        var id = $('#del_id').val();
        var token = $('#_token').val();

        $.ajax({
            url: 'comdel',
            method: 'POST',
            dataType: 'html',
            data: {id: id, _token: token},
            success: function () {
                window.location.assign('comreg');
            }
        })
    }

    function updatecompany(){
      var id= $('#ucompany_id').val();
      var name=  $('#ucompany_name').val();
      var email=  $('#uemail').val();
      var address=  $('#uaddress').val();
      var phone=  $('#uphone').val();
      var logo=  $('#ulogo').val();
      var _token = $('#u_token').val();
      // alert(_token);
      $.ajax({
          url: 'comup',
          method: 'POST',
          dataType: 'html',
          data:{id:id,name:name,email:email,address:address,phone:phone,logo:logo,_token:_token},
          success: function () {
              window.location.assign('comreg');
          }
      })

    }

</script>
