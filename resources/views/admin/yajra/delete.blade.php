
<!--  EDIT / UPDATE SECTION -->
    <form action="{{ route('destroy.confirm', $yajra->id) }}" method="POST" enctype="multipart/form-data"  >
        @csrf
        <div class="row mb-15px">
            <div class="col-md-6">
                <label class="form-label col-form-label ">Name</label>
                <div class="">
                    <input type="text"  name="name" class="form-control mb-5px" placeholder="Enter Name" value="{{ $yajra->name }}" />

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


        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete</button>
        </div>
    </form>









