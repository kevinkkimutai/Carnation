@extends('admin.layouts.app')
@section('title', $details->title)
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">{{ $details->title }} </h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                                    <li class="breadcrumb-item active">{{ $details->title }}</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                @include('partials.info')

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="product-detai-imgs">
                                            <div class="row">
                                                <div class="col-md-2 col-sm-3 col-4">
                                                    <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist"
                                                        aria-orientation="vertical">
                                                        @foreach ($details->images as $image)
                                                            <a class="nav-link  @if ($image->order == 1) active @endif"
                                                                id="product-1-tab" data-bs-toggle="pill"
                                                                href="#image-{{ $image->id }}" role="tab"
                                                                aria-controls="product-1" aria-selected="true">
                                                                <img src="{{ env('AWS_BASE_URL') . $image->image_url }}"
                                                                    alt=""
                                                                    class="img-fluid mx-auto d-block rounded">
                                                            </a>
                                                        @endforeach

                                                    </div>
                                                </div>
                                                <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                                    <div class="tab-content" id="v-pills-tabContent">
                                                        @foreach ($details->images as $image)
                                                            <div class="tab-pane fade show @if ($image->order == 1) active @endif"
                                                                id="image-{{ $image->id }}" role="tabpanel"
                                                                aria-labelledby="product-1-tab">
                                                                <div>
                                                                    <img src="{{ env('AWS_BASE_URL') . $image->image_url }}"
                                                                        alt="" class="img-fluid mx-auto d-block">
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                    </div>


                                                </div>
                                                <div class="text-center">
                                                    <a href="{{ route('inventory.images', $details->slug) }}"
                                                        class="btn btn-sm btn-outline-primary waves-effect waves-light mt-2 ">
                                                        <i class="bx bx-image-add me-2"></i> Manage Images
                                                    </a>
                                                    <a href="{{ route('inventory.edit', $details->slug) }}"
                                                        class="btn btn-sm btn-outline-success waves-effect  mt-2 waves-light">
                                                        <i class="bx bx-edit-alt me-2"></i>Edit Car
                                                    </a>
                                                    @if ($details->featured)
                                                        <a href="{{ route('inventory.unfeature', $details->id) }}"
                                                            class="btn btn-sm btn-outline-danger  mt-2 waves-light">
                                                            <i class="bx bx-x-circle me-2"></i>
                                                            Un-feature</a>
                                                    @else
                                                        <a href="{{ route('inventory.feature', $details->id) }}"
                                                            class="btn btn-sm btn-outline-info  mt-2 waves-light">
                                                            <i class="bx bx-star me-2"></i>
                                                            Feature</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="mt-4 mt-xl-3">
                                            @if ($details->featured == true)
                                                <span class="btn btn-sm btn-outline-warning"> <i
                                                        class="bx bx-star me-2"></i>featured</span>
                                            @endif
                                            <h4 class="mt-1 mb-3">{{ $details->title }}</h4>
                                            <h5 class="mb-4">Price : <b>Ksh {{ number_format($details->price) }}</b></h5>
                                            <p class="text-muted mb-4">{{ $details->description }}</p>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <div>
                                                        <p class="text-muted">
                                                            Make : {{ $details->make->name }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <p class="text-muted">
                                                            Model : {{ $details->model->name }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <p class="text-muted">
                                                            Body Type : {{ $details->bodyType->name }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <p class="text-muted">
                                                            Year : {{ $details->year }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <p class="text-muted">
                                                            Mileage : {{ $details->mileage }} Km</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <p class="text-muted">
                                                            CC : {{ $details->cc }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <p class="text-muted">
                                                            Transmission : {{ $details->transmission }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <p class="text-muted">
                                                            Interior : {{ $details->interiorType->name }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <p class="text-muted">
                                                            Drive Train : {{ $details->drive_train }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <p class="text-muted">
                                                            Fuel : {{ $details->fuel }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <p class="text-muted">
                                                            Usage : {{ $details->usage }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <p class="text-muted">
                                                            Availability : {{ $details->availability }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <p class="text-muted">
                                                            Color : {{ $details->color }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <p class="text-muted">
                                                            Top Speed : {{ $details->top_speed }} Km/h</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <p class="text-muted">
                                                            Number of seats : {{ $details->seats }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <p class="text-muted">
                                                            Number of doors : {{ $details->doors }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <p class="text-muted">
                                                            Steering Position : {{ $details->steering }}</p>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div>
                                                        <p class="text-muted">
                                                            Steering : {{ $details->steering_type }}</p>
                                                    </div>
                                                </div>


                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="mt-5">
                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="mb-3">Safety features :</h5>

                                            <div class="table-responsive">
                                                <table class="table mb-0 table-bordered">
                                                    <tbody>
                                                        @foreach ($safetyFeatures as $feature)
                                                            <tr>
                                                                <td>
                                                                    @if ($details->carFeatures->contains('car_feature_id', $feature->id))
                                                                        <i
                                                                            class="bx bx-check-circle text-success me-2"></i>
                                                                    @else
                                                                        <i class="bx bx-x-circle text-danger me-2"></i>
                                                                    @endif
                                                                    {{ $feature->name }}
                                                                </td>
                                                            </tr>
                                                        @endforeach


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="mb-3">Comfort features :</h5>

                                            <div class="table-responsive">
                                                <table class="table mb-0 table-bordered">
                                                    <tbody>
                                                        @foreach ($comfortFeatures as $feature)
                                                            <tr>
                                                                <td>
                                                                    @if ($details->carFeatures->contains('car_feature_id', $feature->id))
                                                                        <i
                                                                            class="bx bx-check-circle text-success me-2"></i>
                                                                    @else
                                                                        <i class="bx bx-x-circle text-danger me-2"></i>
                                                                    @endif
                                                                    {{ $feature->name }}
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row pt-5">
                                    <div class="col-lg-12">
                                        <h3>Car enquiries</h3>

                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap table-hover">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" style="width: 70px;">#</th>

                                                        <th scope="col">Name</th>
                                                        <th scope="col">Phone</th>
                                                        <th scope="col">Created at</th>
                                                        <th scope="col">Message</th>

                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($details->enquiries as $index => $message)
                                                        <tr>
                                                            <td>
                                                                {{ ++$index }}
                                                            </td>


                                                            <td>
                                                                {{ $message->first_name . ' ' . $message->last_name }}
                                                            </td>

                                                            <td> {{ $message->phone }}</td>

                                                            <td>
                                                                <div>
                                                                    {{ $message->message }}
                                                                </div>
                                                            </td>
                                                            <td>
                                                                @if ($message->completed)
                                                                    <span
                                                                        class="badge badge-soft-warning font-size-11 m-1">Completed</span>
                                                                @else
                                                                    <span
                                                                        class="badge badge-soft-success font-size-11 m-1">New</span>
                                                                @endif
                                                            </td>

                                                            <td>
                                                                <div>

                                                                    @if (!$message->completed)
                                                                        <a href="{{ route('enquiries.complete', $message->id) }}"
                                                                            class="btn btn-sm btn-outline-warning m-1">Mark
                                                                            completed</a>
                                                                    @endif

                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                </div>

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->



    </div>
@endsection
