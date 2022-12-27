
<!--  EDIT / UPDATE SECTION -->
    <form action="{{ route('update.yajra', $yajra->id) }}" method="POST" enctype="multipart/form-data"  >
        @csrf
        <div class="row mb-15px">
            <div class="col-md-6">
                <label class="form-label col-form-label ">Name</label>
                <div class="">
                    <input type="text"  name="name" class="form-control mb-5px" placeholder="Enter Name" value="{{ $yajra->name }}" />
                    @if ($errors->has('name'))
                        <span class="text-red-500">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label col-form-label ">Email</label>
                <div class="">
                    <input type="email"  name="email" class="form-control mb-5px" placeholder="Enter email" value="{{ $yajra->email }}"  />
                    @if ($errors->has('email'))
                        <span class="text-red-500">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>


        </div>

        <div class="row mb-15px">
            <div class="col-md-6">
                <label class="form-label col-form-label ">Phone</label>
                <div class="">
                    <input type="text"  name="phone" class="form-control mb-5px" placeholder="Enter Phone" value="{{ $yajra->phone }}"  />
                    @if ($errors->has('phone'))
                        <span class="text-red-500">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label col-form-label ">Description</label>
                <div class="">
                    <input type="text"  name="description" class="form-control mb-5px" placeholder="Enter Description" value="{{ $yajra->description }}"  />
                    @if ($errors->has('description'))
                        <span class="text-red-500">{{ $errors->first('description') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row mb-15px">
            <div class="col-md-6">
                <label class="form-label col-form-label ">Address</label>
                <div class="">
                    <input type="text"  name="address" class="form-control mb-5px" placeholder="Enter Address" value="{{ $yajra->address }}"  />
                    @if ($errors->has('address'))
                        <span class="text-red-500">{{ $errors->first('address') }}</span>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <label class="form-label col-form-label ">Image</label>
                <div class="">
                    <img src="{{ $yajra->image == null ? '' : asset($yajra->image) }}" alt="">
                    <input type="file"  name="image" accept="image/*" class="form-control mb-5px"  />
                    @if ($errors->has('image'))
                        <span class="text-red-500">{{ $errors->first('image') }}</span>
                    @endif
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>









