@extends('layouts.app')
@section('content')
     <!-- features start -->
     <div class="container mt-5 ">
        <div class="container">
            <div class="pull-right">
                <a class="btn btn-success" href="javascript:void(0)" id="createNewMember"> Create New Member</a>
            </div>
            <br>

            <table class="table table-bordere data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Instansi</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
           
        <div class="modal fade" id="ajaxModel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeading"></h4>
                    </div>
                    <div class="modal-body">
                        <form id="memberForm" name="memberForm" class="form-horizontal" enctype="multipart/form-data">
                           <input type="hidden" name="member_id" id="member_id">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
                                </div>
                            </div>
             
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Instansi</label>
                                <div class="col-sm-12">
                                    <input type="text" id="instansi" name="instansi" required="" placeholder="Instansi" class="form-control"></input>
                                   
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Photo</label>
                                <div class="col-sm-12">
                                    <input type="file" name="photo" id="photo" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="col-sm-offset-2 col-sm-10">
                             <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                             </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        

    </div>
    <!-- features end -->
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
       console.log('ready');
       $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
       });
     var table = $('.data-table').DataTable({
         processing: true,
         serverSide: true,
         ajax: "{{ route('attendance.index') }}",
         columns: [
             {data: 'DT_RowIndex', name: 'DT_RowIndex'},
             {data: 'name', name: 'name'},
             {data: 'instansi', name: 'instansi'},
             {data: 'action', name: 'action', orderable: false, searchable: false},
         ]
     });
      
     $('#createNewMember').click(function () {
         $('#saveBtn').val("create-member");
         $('#member_id').val('');
         $('#memberForm').trigger("reset");
         $('#modelHeading').html("Create New Member");
         $('#ajaxModel').modal('show');
     });
     
     $('body').on('click', '.editMember', function () {
       var member_id = $(this).data('id');
       $.get("{{ route('attendance.index') }}" +'/' + member_id +'/edit', function (data) {
           $('#modelHeading').html("Edit Member");
           $('#saveBtn').val("edit-member");
           $('#ajaxModel').modal('show');
           $('#member_id').val(data.id);
           $('#name').val(data.name);
           $('#instansi').val(data.instansi);
       })
    });
     
     $('#saveBtn').click(function (e) {
         e.preventDefault();
         $(this).html('Save');
         // Get form
         var form = $('#memberForm')[0];
        // Create an FormData object 
        var data = new FormData(form);
        console.log(data);
         $.ajax({
           data:data,
           url: "{{ route('attendance.store') }}",
           type: "POST",
           dataType: 'json',
           processData: false,  // Important!
           contentType: false,
           cache: false,
           success: function (data) {
               $('#memberForm').trigger("reset");
               $('#ajaxModel').modal('hide');
               table.draw();
           },
           error: function (data) {
               console.log('Error:', data);
               $('#saveBtn').html('Save Changes');
           }
       });
     });
    
     $('body').on('click', '.deleteMember', function () {
      
      var member_id = $(this).data("id");
      var form =  $(this).closest("form");
      var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: "Are you sure you want to delete this record?",
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                type: "DELETE",
                url: "{{ route('attendance.store') }}"+'/'+member_id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
            }
          });  
     });

//    $('#instansi').select2({
//     placeholder: 'Cari...',
//     allowClear: true,
//     tags: true,
//     ajax: {
//       url: 'attendance/datainstansi',
//       dataType: 'json',
//       delay: 250,
//       processResults: function (data) {
//         return {
//           results:  $.map(data, function (item) {
//             return {
//               text: item.text,
//               id: item.id
//             }
//           })
//         };
//       },
//       cache: true
//     }
 
//    });

   });
 </script>
@endsection

