@extends('admin.layout.master')

@section('title')
    Multi Dependent | Example
@endsection

@section('extra-css')

    <!--Data Table required files -->
    <link href="{{ asset('/')}}backend/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('/')}}plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('/')}}backend/assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('/')}}backend/assets/plugins/datatables.net-colreorder-bs5/css/colReorder.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('/')}}backend/assets/plugins/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('/')}}backend/assets/plugins/datatables.net-rowreorder-bs5/css/rowReorder.bootstrap5.min.css" rel="stylesheet" />
    <link href="{{ asset('/')}}backend/assets/plugins/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" />

    <!-- Select2 css-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('admin-content')
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="">Home</a></li>
        <li class="breadcrumb-item ">Multi Dependent</li>
        <li class="breadcrumb-item active">Example</li>
    </ol>


    <div class="row my-5 " >
        <div class="mx-auto p-4" style="border: 1px solid #801419; border-radius: 4px;">
            <!--  EDIT / UPDATE SECTION -->
            @if(Request::routeIs('edit.selectbox'))
                <h1 class="page-header ">Edit Multi Dependent SelectBox </h1>
                <form action="{{ route('update.selectbox',$selectbox->id) }}" method="POST">
                    @csrf
                    <div class="row mb-15px">
                        <div class="col-md-4">
                            <label class="form-label col-form-label ">Select Category</label>
                            <div class="">
                                <select name="category_id"  id="" class="form-control mb-5px js-example-basic-single">
                                    <option value="" disabled selected>-- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $selectbox->category_id ? 'selected' : '' }} >{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="text-red-500">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label col-form-label ">Select SubCategory</label>
                            <div class="">
                                <select name="subcategory_id"  id="" class="form-control mb-5px js-example-basic-single">
                                    @foreach($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}" {{ $subcategory->id == $selectbox->subcategory_id ? 'selected' : '' }} >{{ $subcategory->subcategory_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('subcategory_id'))
                                    <span class="text-red-500">{{ $errors->first('subcategory_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label col-form-label ">Select Sub SubCategory</label>
                            <div class="">
                                <select name="sub_subcategory_id"  id="" class="form-control mb-5px js-example-basic-single">
                                    @foreach($subSubCategories as $subSubCategory)
                                        <option value="{{ $subSubCategory->id }}" {{ $subSubCategory->id == $selectbox->sub_subcategory_id ? 'selected' : '' }} >{{ $subSubCategory->sub_subcategory_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('sub_subcategory_id'))
                                    <span class="text-red-500">{{ $errors->first('sub_subcategory_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row mb-15px">
                        <div class="col-md-4">
                            <label class="form-label col-form-label ">Name</label>
                            <div class="">
                                <input type="text"  name="name" class="form-control mb-5px" placeholder="Enter Name" value="{{ $selectbox->name }}" />
                                @if ($errors->has('name'))
                                    <span class="text-red-500">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label col-form-label ">Tags</label>
                            <div class="">
                                <select name="tags[]" multiple="multiple"   id="tags" class="js-example-basic-multiple form-control mb-5px" style="width: 100%; height:100% ">
                                    @php
                                    $tags = json_decode($selectbox->tags);
                                    @endphp
                                    @foreach($tags as $tag)
                                    <option value="{{ $tag }}" selected>{{ $tag }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('tags'))
                                    <span class="text-red-500">{{ $errors->first('tags') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label col-form-label ">Status</label>
                            <div class="">
                                <select name="status"  id="" class="form-control mb-5px">
                                    <option value="1" {{ $selectbox->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0"  {{ $selectbox->status == 0 ? 'selected' : '' }}>Deactive</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="text-red-500">{{ $errors->first('status') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row mb-15px">
                        <label class="form-label col-form-label "></label>
                        <div class="">
                            <button type="submit" class="btn btn-info d-block w-100 h-45px btn-lg">Update</button>
                        </div>
                    </div>
                </form>
            @else
            <!-- ADD / CREATE SECTION -->
                <h1 class="page-header ">Create Multi Dependent SelectBox </h1>
                <form action="{{ route('store.selectbox') }}" method="POST">
                    @csrf
                    <div class="row mb-15px">
                        <div class="col-md-4">
                            <label class="form-label col-form-label ">Select Category</label>
                            <div class="">
                                <select name="category_id"  id="" class="form-control mb-5px js-example-basic-single">
                                    <option value="" disabled selected>-- Select Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" >{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="text-red-500">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label col-form-label ">Select SubCategory</label>
                            <div class="">
                                <select name="subcategory_id"  id="" class="form-control mb-5px js-example-basic-single">
                                    {{--                                <option value="" disabled selected>-- Select SubCategory --</option>--}}

                                </select>
                                @if ($errors->has('subcategory_id'))
                                    <span class="text-red-500">{{ $errors->first('subcategory_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label col-form-label ">Select Sub SubCategory</label>
                            <div class="">
                                <select name="sub_subcategory_id"  id="" class="form-control mb-5px js-example-basic-single">
                                    {{--                                <option value="" disabled selected>-- Select Sub SubCategory --</option>--}}

                                </select>
                                @if ($errors->has('sub_subcategory_id'))
                                    <span class="text-red-500">{{ $errors->first('sub_subcategory_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row mb-15px">
                        <div class="col-md-4">
                            <label class="form-label col-form-label ">Name</label>
                            <div class="">
                                <input type="text"  name="name" class="form-control mb-5px" placeholder="Enter Name" />
                                @if ($errors->has('name'))
                                    <span class="text-red-500">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label col-form-label ">Tags</label>
                            <div class="">
                                <select name="tags[]" multiple="multiple"   id="tags" class="js-example-basic-multiple form-control mb-5px" style="width: 100%; height:100% ">

                                </select>
                                @if ($errors->has('tags'))
                                    <span class="text-red-500">{{ $errors->first('tags') }}</span>
                                @endif
                                {{--                            <input name="tags[]" multiple="multiple"  required id="tags" class="js-example-basic-multiple form-control mb-5px" style="width: 100%; height:100% " />--}}

                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label col-form-label ">Status</label>
                            <div class="">
                                <select name="status"  id="" class="form-control mb-5px">
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="text-red-500">{{ $errors->first('status') }}</span>
                                @endif
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
            @endif
        </div>
    </div>

<!--- Table Section --->
    <div class="row">
        <table id="data-table-combine" class="table table-striped table-bordered align-middle" style="font-size: 14px;">
        <thead>
        <tr>
            <th>SL</th>
            <th>Category</th>
            <th>Sub Category</th>
            <th>Sub SubCategory</th>
            <th>Name</th>
            <th>Tags</th>
            <th>Status</th>
            <th >Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($selectboxs as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->category->category_name }}</td>
            <td>{{ $item->subCategory->subcategory_name }}</td>
            <td>{{ $item->subSubCategory->sub_subcategory_name }}</td>
            <td>{{ $item->name }}</td>
            <td>
                {{ implode(', ', json_decode($item->tags)) }}
            </td>
            <td>{{ $item->status == 1 ? 'Active' : 'Deactive' }}</td>
            <td><a href="{{ route('edit.selectbox',$item->id) }}" class="btn btn-sm btn-primary " title="Edit this data">
                    Edit
                </a>
                <a href="{{ route('destroy.selectbox',$item->id) }}" type="button" class="btn btn-danger btn-sm deleteConfirm" id="delete" title="Delete this data">
                    Delete
                </a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>

@endsection

@section('extra-js')
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>

    <!--Data Table required files -->
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


    <!-----Select2 JS-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- SCRIPT FOR DEPENDENT SELECT BOX -->
    <script type="text/javascript">
        $(document).ready(function () {
            // FOR CATEGORY
            $('select[name="category_id"]').on('change', function () {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('admin/multi-dependent-selectbox/subcategory-by-category/') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                             // console.log(data);

                            $('select[name="sub_subcategory_id"]').html('');
                            $('select[name="subcategory_id"]').empty();
                            $('select[name="subcategory_id"]').append('<option value="" disabled selected>-- Select SubCategory --</option>');
                            $.each(data, function (keys, value) {
                                $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory_name + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="subcategory_id"]').empty();
                }

            });

            // FOR SUBCATEGORY
            $('select[name="subcategory_id"]').on('change', function () {
                var subcategory_id = $(this).val();
                if (subcategory_id) {
                    $.ajax({
                        url: "{{ url('admin/multi-dependent-selectbox/sub-subcategory-fetch/') }}/" + subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            // console.log(data);

                            $('select[name="sub_subcategory_id"]').empty();
                            $('select[name="sub_subcategory_id"]').append('<option value="" disabled selected>-- Select Sub SubCategory --</option>');
                            $.each(data, function (keys, value) {
                                $('select[name="sub_subcategory_id"]').append('<option value="' + value.id + '">' + value.sub_subcategory_name + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="sub_subcategory_id"]').empty();
                }
            });

            // SELECT 2
            $('.js-example-basic-single').select2();
            $('.js-example-basic-multiple').select2({
                tags : true,
                theme : "classic"
            });

        });

    </script>

    <!-- SCRIPT FOR DATA TABLE BUTTON FUNCTIONALITY -->
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
