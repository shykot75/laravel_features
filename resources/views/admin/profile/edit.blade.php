@extends('admin.layout.master')

@section('title')
    Laravel Features | Profile Page
@endsection

@section('admin-content')

<style>
    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type="number"] {
        -moz-appearance: textfield;
    }
</style>



<div class="profile">
        <div class="profile-header">

            <div class="profile-header-cover"></div>


            <div class="profile-header-content">

                <div class="profile-header-img">
                    <img src="{{ $profile->image == null ? url('uploads/no_image.jpg') : asset($profile->image)  }}" alt="" />
                </div>


                <div class="profile-header-info">
                    <h4 class="mt-0 mb-1">{{ $profile->name }}</h4>
                    <p class="mb-2">Back End Developer</p>
                    <a href="#" class="btn btn-xs btn-yellow">Edit Profile</a>
                </div>

            </div>


            <ul class="profile-header-tab nav nav-tabs">
                <li class="nav-item"><a href="#profile-post" class="nav-link active" data-bs-toggle="tab"></a></li>
                <li class="nav-item"><a href="#profile-about" class="nav-link" data-bs-toggle="tab"></a></li>
                <li class="nav-item"><a href="#profile-photos" class="nav-link" data-bs-toggle="tab"></a></li>
                <li class="nav-item"><a href="#profile-videos" class="nav-link" data-bs-toggle="tab"></a></li>
                <li class="nav-item"><a href="#profile-friends" class="nav-link" data-bs-toggle="tab"></a></li>
            </ul>

        </div>



    <div class="profile-content">

        <div class="tab-content p-0">
            <div class="col-8 mx-auto">
                <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-20px">
                        <input type="text" name="name" class="form-control fs-13px h-45px border-0" placeholder="Your Name" id="name" value="{{ $profile->name }}" />
                        <label for="name" class="d-flex align-items-center text-gray-600 fs-13px">Name</label>
                    </div>
                    <div class="form-floating mb-20px">
                        <input type="email" name="email" class="form-control fs-13px h-45px border-0" placeholder="Email Address" id="emailAddress" value="{{ $profile->email }}" />
                        <label for="emailAddress" class="d-flex align-items-center text-gray-600 fs-13px">Email Address</label>
                    </div>
                    <div class="form-floating mb-20px">
                        <input type="number" min="0" oninput="validity.valid||(value='0');" onwheel="this.blur()" name="mobile" class="form-control fs-13px h-45px border-0" placeholder="Your Mobile Number" id="mobile" value="{{ $profile->mobile }}" />
                        <label for="mobile" class="d-flex align-items-center text-gray-600 fs-13px">Mobile Number</label>
                    </div>
                    <div class="form-floating mb-20px">
                        <div class="controls">
                            <img class="rounded" id="showImage" src="{{ $profile->image == null ? url('uploads/no_image.jpg') : asset($profile->image)  }}" alt="Profile Image" height="140" width="130">
                        </div>
                    </div>
                    <div class="form-floating mb-20px">
                        <input type="file" accept="image/*" name="image" class="form-control fs-13px h-45px border-0" placeholder="Your Image" id="image" />
                        <label for="image" class="d-flex align-items-center text-gray-600 fs-13px">Image</label>
                    </div>

                    <div class="mb-20px">
                        <button type="submit" class="btn btn-primary d-block w-100 h-45px btn-lg">Update Profile</button>
                    </div>
                    <div class="text-gray-500">

                    </div>
                </form>
            </div>



        </div>

    </div>

</div>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>












@endsection
