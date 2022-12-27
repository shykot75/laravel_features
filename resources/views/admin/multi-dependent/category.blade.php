@extends('admin.layout.master')

@section('title')
    Multi Dependent | Category
@endsection

@section('extra-css')

    <!-- required files -->
    <link href="{{ asset('/')}}backend/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('/')}}plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('/')}}backend/assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('/')}}backend/assets/plugins/datatables.net-colreorder-bs5/css/colReorder.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('/')}}backend/assets/plugins/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('/')}}backend/assets/plugins/datatables.net-rowreorder-bs5/css/rowReorder.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('/')}}backend/assets/plugins/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" />

@endsection



@section('admin-content')
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="">Home</a></li>
        <li class="breadcrumb-item ">Multi Dependent</li>
        <li class="breadcrumb-item active">Category</li>
    </ol>


    <div class="row my-5 " >
        <div class="mx-auto p-4" style="border: 1px solid #801419; border-radius: 4px;">
            <h1 class="page-header ">Create a Category</h1>
            <form action="{{ route('store.category') }}" method="POST">
                @csrf
                <div class="row mb-15px">
                    <label class="form-label col-form-label col-md-2">Category Name</label>
                    <div class="col-md-10">
                        <input type="text" required name="category_name" class="form-control mb-5px" placeholder="Enter Category Name" />
                    </div>
                </div>

                <div class="row mb-15px">
                    <label class="form-label col-form-label col-md-2">Status</label>
                    <div class="col-md-10">
                        <select name="status" required id="" class="form-control mb-5px">
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-15px">
                    <label class="form-label col-form-label col-md-2"></label>
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-info d-block w-100 h-45px btn-lg">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="row">
        <table id="data-table-combine" class="table table-striped table-bordered align-middle" style="font-size: 14px;">
        <thead>
        <tr>
            <th>SL</th>
            <th>Category Name</th>
            <th>Status</th>

            <th >Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach($categories as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->category_name }}</td>
            <td>{{ $item->status == 1 ? 'Active' : 'Deactive' }}</td>
            <td><a href="" class="btn btn-sm btn-primary " title="Edit this data">
                    Edit
                </a>

                <a href="" class="btn btn-danger btn-sm" title="Delete this data">
                    Delete
                </a></td>

        </tr>
        @endforeach


        </tbody>

    </table>
    </div>


@endsection


@section('extra-js')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="{{ asset('/')}}backend/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/')}}backend/assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('/')}}backend/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('/')}}backend/assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>

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


    <!-- script -->
    <script>
        var options = {
            dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex me-0 me-md-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-md-5"i><"col-md-7"p>>>',
            buttons: [
                { extend: 'copy', className: 'btn-sm' },
                { extend: 'csv', className: 'btn-sm' },
                { extend: 'excel', className: 'btn-sm' },
                { extend: 'pdf', className: 'btn-sm' },
                { extend: 'print', className: 'btn-sm' }
            ],
            responsive: true,
            colReorder: true,
            keys: true,
            rowReorder: true,
            select: true
        };

        if ($(window).width() <= 767) {
            options.rowReorder = false;
            options.colReorder = false;
        }
        $('#data-table-combine').DataTable(options);
    </script>

@endsection
