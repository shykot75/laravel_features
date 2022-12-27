@extends('admin.layout.master')

@section('title')
    Yajra Datatable | CRUD

@endsection

@section('extra-css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Data Table required files -->
    <link href="{{ asset('/')}}backend/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('/')}}plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('/')}}backend/assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" />
    <!--Data Table Buttons required files -->
    <link href="{{ asset('/')}}backend/assets/plugins/datatables.net-colreorder-bs5/css/colReorder.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('/')}}backend/assets/plugins/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('/')}}backend/assets/plugins/datatables.net-rowreorder-bs5/css/rowReorder.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('/')}}backend/assets/plugins/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" />

    <!--Data Table & Buttons required files [CDN] -->
{{--    <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">--}}

{{--    <link href="https://cdn.datatables.net/buttons/2.3.3/css/buttons.bootstrap5.min.css" rel="stylesheet">--}}
{{--    <link href="https://cdn.datatables.net/colreorder/1.6.1/css/colReorder.bootstrap5.min.css" rel="stylesheet">--}}


@endsection

@section('admin-content')
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="">Home</a></li>
        <li class="breadcrumb-item active">Yajra Data Table</li>
    </ol>

    <div class="row my-5 " >
        <div class="mx-auto p-4" style="border: 1px solid #801419; border-radius: 4px;">

            <!-- ADD / CREATE SECTION -->
                <form action="{{ route('store.yajra') }}" method="POST" enctype="multipart/form-data"  >
                    <h1 class="page-header ">Create a Yajra Data </h1>
                    @csrf
                    <div class="row mb-15px">
                        <div class="col-md-4">
                            <label class="form-label col-form-label ">Name</label>
                            <div class="">
                                <input type="text"  name="name" class="form-control mb-5px" placeholder="Enter Name" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label col-form-label ">Email</label>
                            <div class="">
                                <input type="email"  name="email" class="form-control mb-5px" placeholder="Enter email" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label col-form-label ">Phone</label>
                            <div class="">
                                <input type="number"  name="phone" class="form-control mb-5px" placeholder="Enter Phone" />
                            </div>
                        </div>

                    </div>

                    <div class="row mb-15px">
                        <div class="col-md-4">
                            <label class="form-label col-form-label ">Description</label>
                            <div class="">
                                <input type="text"  name="description" class="form-control mb-5px" placeholder="Enter Description" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label col-form-label ">Address</label>
                            <div class="">
                                <input type="text"  name="address" class="form-control mb-5px" placeholder="Enter Address" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label col-form-label ">Image</label>
                            <div class="">
                                <input type="file"  name="image" accept="image/*" class="form-control mb-5px" placeholder="Enter Name" />
                            </div>
                        </div>

                    </div>

                    <div class="row mb-15px">
                        <label class="form-label col-form-label "></label>
                        <div class="">
                            <button type="submit" class="btn btn-info d-block w-100 h-45px btn-lg">Create</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>

<!--- Table Section --->
    <div class="row">
        <table id="user_datatable" class="user_datatable table table-striped table-bordered align-middle" style="font-size: 14px;">
        <thead>
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th >Action</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Yajra Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="modal_data"></div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Delete Modal -->
    <div class="modal fade " id="exampleModalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete This Yajra Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="delete_modal_data"></div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('extra-js')
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>

    <!--Data Table required files -->
    <script src="{{ asset('/')}}vendor/datatables/buttons.server-side.js"></script>

    <script src="{{ asset('/')}}backend/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/')}}backend/assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('/')}}backend/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('/')}}backend/assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>

    <!--Data Table Buttons required files -->
    <script src="{{ asset('/')}}backend/assets/plugins/datatables.net-colreorder/js/dataTables.colReorder.min.js"></script>
    <script src="{{ asset('/')}}backend/assets/plugins/datatables.net-colreorder-bs5/js/colReorder.bootstrap5.min.js"></script>
    <script src="{{ asset('/')}}backend/assets/plugins/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('/')}}backend/assets/plugins/datatables.net-keytable-bs5/js/keyTable.bootstrap5.min.js"></script>
    <script src="{{ asset('/')}}backend/assets/plugins/datatables.net-rowreorder/js/dataTables.rowReorder.min.js"></script>
    <script src="{{ asset('/')}}backend/assets/plugins/datatables.net-rowreorder-bs5/js/rowReorder.bootstrap5.min.js"></script>
    <script src="{{ asset('/')}}backend/assets/plugins/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="{{ asset('/')}}backend/assets/plugins/datatables.net-select-bs5/js/select.bootstrap5.min.js"></script>
    <script src="{{ asset('/')}}backend/assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('/')}}backend/assets/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="{{ asset('/')}}backend/assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="{{ asset('/')}}backend/assets/plugins/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('/')}}backend/assets/plugins/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('/')}}backend/assets/plugins/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('/')}}backend/assets/plugins/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset('/')}}backend/assets/plugins/pdfmake/build/vfs_fonts.js"></script>
    <script src="{{ asset('/')}}backend/assets/plugins/jszip/dist/jszip.min.js"></script>


    <!--Data Table & Buttons required files [CDN] -->
{{--    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>--}}
{{--    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>--}}

{{--    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.3/js/dataTables.buttons.min.js"></script>--}}
{{--    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.bootstrap5.min.js"></script>--}}
{{--    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script>--}}
{{--    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>--}}
{{--    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>--}}
{{--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>--}}
{{--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>   --}}


    <script type="text/javascript">
        // YAJRA DATATABLE FUNCTIONALITY + BUTTON
        $(function () {
            var table = $('#user_datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                autoWidth:false,
                ajax: "{{ route('yajra.datatable') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                dom: 'Blfrtip', // Bfrtip, lBfrtip -- other options
                buttons: [
                    { extend: 'copy',  exportOptions: { modifier: { page: 'all', search: 'none' } } },
                    { extend: 'excel', exportOptions: { modifier: { page: 'all', search: 'none' } } },
                    { extend: 'csv',   exportOptions: { modifier: { page: 'all', search: 'none' } } },
                    { extend: 'pdf',   exportOptions: { modifier: { page: 'all', search: 'none' } } },
                    { extend: 'print', exportOptions: { modifier: { page: 'all', search: 'none' } } },
                    { extend: 'colvis', exportOptions: { modifier: { page: 'all', search: 'none' } } },
                //     'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, 'All'] ]
            });
        });


        // EDIT FUNCTIONALITY STARTS
        $(document).on('click', '.edit', function(event){
            event.preventDefault();
            var id = $(this).val();
            // alert(id);
            $.ajax({
                url: "{{ url('admin/yajra/edit/') }}/" + id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    $("#modal_data").html(data.html);
                },
                error: function(data){
                    var errors = data.responseJSON;
                    console.log(errors);
                }
            });
        });
        // EDIT FUNCTIONALITY ENDS


        // DELETE FUNCTIONALITY STARTS
        $(document).on('click', '.delete', function(event){
            event.preventDefault();
            var id = $(this).val();
            // alert(id);
            $.ajax({
                url: "{{ url('admin/yajra/destroy/') }}/" + id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    // console.log(data);
                    $("#delete_modal_data").html(data.html);
                },
                error: function(data){
                    var errors = data.responseJSON;
                    console.log(errors);
                }
            });
        });
        // DELETE FUNCTIONALITY ENDS

    </script>




@endsection
