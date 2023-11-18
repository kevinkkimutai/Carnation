@extends('admin.layouts.app')
@section('title', 'Vehicle Images')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">{{ $details->title }} Images</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                                    <li class="breadcrumb-item active">Add images (Step 1)</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                @include('partials.info')

                <livewire:inventory.images :carDetails='$details' />
                <!-- end row -->
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Upload Images</h4>

                            <form action="{{ route('inventory.images.upload', $details->slug) }}" method="post"
                                class="dropzone">
                                @csrf
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>

                                <div class="dz-message needsclick">
                                    <div class="mb-3">
                                        <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                    </div>

                                    <h4>Drop files here or click to upload.</h4>
                                </div>
                            </form>
                        </div>

                    </div> <!-- end card-->
                </div>

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->



    </div>
@endsection
