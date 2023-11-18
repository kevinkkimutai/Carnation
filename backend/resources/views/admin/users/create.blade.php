@extends('admin.layouts.app')
@section('title', 'New user')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">New user</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                                    <li class="breadcrumb-item active"><a href="javascript: void(0);">New user</a></li>

                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">User Info</h4>
                                @include('partials.info')

                                <form method="POST" action="{{ route('users.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="productname">First name</label>
                                                <input id="productname" name="first_name" type="text"
                                                    class="form-control" placeholder="First name"
                                                    value="{{ old('first_name') }}">

                                                @error('first_name')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="productname">Second name</label>
                                                <input id="productname" name="second_name" type="text"
                                                    class="form-control" placeholder="Second name"
                                                    value="{{ old('second_name') }}">

                                                @error('second_name')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="productname">Last name</label>
                                                <input id="productname" name="last_name" type="text" class="form-control"
                                                    placeholder="Last name" value="{{ old('last_name') }}">

                                                @error('last_name')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="mb-3">
                                                <label for="manufacturerbrand">Email</label>
                                                <input id="manufacturerbrand" name="email" type="text"
                                                    class="form-control" placeholder="Email" value="{{ old('email') }}">
                                                @error('email')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="mb-3">
                                                <label for="manufacturerbrand">Phone</label>
                                                <input id="manufacturerbrand" name="phone" type="number"
                                                    class="form-control" placeholder="Phone number"
                                                    value="{{ old('phone') }}">
                                                @error('phone')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>


                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Submit</button>

                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->



    </div>
@endsection
