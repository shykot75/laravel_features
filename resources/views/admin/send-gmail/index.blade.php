@extends('admin.layout.master')

@section('title')
    Laravel Features | Send Gmail
@endsection

@section('extra-css')

    <link href="{{ asset('/')}}backend/assets/plugins/summernote/dist/summernote-lite.css" rel="stylesheet">

@endsection

@section('admin-content')

    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="">Home</a></li>
        <li class="breadcrumb-item active">Send Gmail</li>
    </ol>

    <div class="row my-5">
        <div class="col-md-10 mx-auto ">
            <h1 class="page-header ">Send Your Mail To a Gmail User</h1>
            <form action="{{ route('store.gmail') }}" method="POST">
                @csrf
                <div class="row mb-15px">
                    <label class="form-label col-form-label col-md-2">To</label>
                    <div class="col-md-10">
                        <input type="email" name="to" class="form-control mb-5px" placeholder="Enter Receiver Email" />
                    </div>
                </div>

                <div class="row mb-15px">
                    <label class="form-label col-form-label col-md-2">Subject</label>
                    <div class="col-md-10">
                        <input type="text" name="subject" class="form-control mb-5px" placeholder="Enter Your Subject" />
                    </div>
                </div>

                <div class="row mb-15px">
                    <label class="form-label col-form-label col-md-2">Email Body</label>
                    <div class="col-md-10">
                        <textarea class="form-control summernote" id="summernote" name="body" rows="20"></textarea>

                    </div>
                </div>
                <div class="row mb-15px">
                    <label class="form-label col-form-label col-md-2"></label>
                    <div class="col-md-10">
                        <button type="submit" class="btn btn-primary d-block w-100 h-45px btn-lg">Send</button>
                    </div>
                </div>

            </form>
        </div>


    </div>






@endsection

@section('extra-js')

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="{{ asset('/')}}backend/assets/plugins/summernote/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Write your Email Here..',
            tabsize: 2,
            height: 200,

        });
    });
</script>


@endsection
