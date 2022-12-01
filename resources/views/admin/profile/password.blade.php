@extends('admin.layout.master')

@section('title')
    Laravel Features | Password Update
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
                <form action="{{ route('password.update', $profile->id) }}" method="POST" >
                    @csrf
                    <div class="form-floating mb-20px">
                        <input type="password" name="current_password" id="currentPassField" class="form-control fs-13px h-45px border-0" placeholder="Your Current Password"   />
                        <label for="currentPassField" class="d-flex align-items-center text-gray-600 fs-13px">Current Password</label>
                    </div>

                    <div class="form-floating mb-20px">
                        <input type="password" name="password" id="newPass" class="form-control fs-13px h-45px border-0" placeholder="Your New Password"   />
                        <label for="newPass" class="d-flex align-items-center text-gray-600 fs-13px">New Password</label>
                    </div>

                    <div class="form-floating mb-20px">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control fs-13px h-45px border-0" placeholder="Your Current Password"   />
                        <label for="password_confirmation" class="d-flex align-items-center text-gray-600 fs-13px">Re-Type Password</label>
                    </div>



                    <div class="mb-20px">
                        <button type="submit" class="btn btn-primary d-block w-100 h-45px btn-lg">Update Password</button>
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

        function currentPassword(){
            const currentPassField = document.getElementById("currentPassField");
            const showHideIcon = document.getElementById("current-show-hide");
            if (currentPassField.type === "password") {
                currentPassField.type = "text";
                showHideIcon.classList.add("fa-eye");
                showHideIcon.classList.remove("fa-eye-slash");
            } else {
                currentPassField.type = "password";
                showHideIcon.classList.remove("fa-eye");
                showHideIcon.classList.add("fa-eye-slash");
            }
        }


    });
</script>












@endsection
