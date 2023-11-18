@extends('admin.layouts.app')
@section('title', $title)
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">{{ $title }} </h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                                    <li class="breadcrumb-item active">{{ $title }}</li>
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
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap table-hover">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" style="width: 70px;">#</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Make/Model/Year</th>
                                                <th scope="col">Body Type</th>
                                                <th scope="col">Created</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cars as $index => $car)
                                                <tr>
                                                    <td>
                                                        {{ ($cars->currentPage() - 1) * $cars->perPage() + $loop->iteration }}
                                                    </td>

                                                    <td>
                                                        <div class="row">
                                                            <div class="col-2">
                                                                <div>
                                                                    <img class="avatar-xs"
                                                                        src="{{ $car->images->first() ? env('AWS_BASE_URL') . $car->images->first()->image_url : asset('images/logo.png') }}"
                                                                        alt="">
                                                                </div>
                                                            </div>
                                                            <div class="col-10 text-left">
                                                                <h5 class="font-size-14 mb-1"><a href="javascript: void(0);"
                                                                        class="text-dark">{{ $car->title }}</a></h5>
                                                                <span
                                                                    class="badge badge-soft-{{ $car->availability == 'available' ? 'success' : 'warning' }} font-size-11 m-1">{{ $car->availability }}</span>
                                                                @if ($car->featured)
                                                                    <span
                                                                        class="badge badge-soft-warning font-size-11 m-1">Featured</span>
                                                                @endif


                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>Ksh {{ number_format($car->price) }}</td>

                                                    <td>
                                                        <div>
                                                            <span
                                                                class="badge badge-soft-primary font-size-11 m-1">{{ $car->model->name }}</span>
                                                            <span
                                                                class="badge badge-soft-primary font-size-11 m-1">{{ $car->make->name }}</span>
                                                            <span
                                                                class="badge badge-soft-primary font-size-11 m-1">{{ $car->year }}</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{ $car->body_type }}
                                                    </td>
                                                    <td>
                                                        <h5 class="font-size-14 mb-1"><a href="javascript: void(0);"
                                                                class="text-dark">{{ $car->createdBy->first_name . ' ' . $car->createdBy->second_name . ' ' . $car->createdBy->last_name }}</a>
                                                        </h5>
                                                        <p class="text-muted mb-0">{{ $car->created_at->toDateString() }}
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            @if ($car->featured)
                                                                <a href="{{ route('inventory.unfeature', $car->id) }}"
                                                                    class="btn btn-sm btn-outline-danger font-size-11 m-1">Un-feature</a>
                                                            @else
                                                                <a href="{{ route('inventory.feature', $car->id) }}"
                                                                    class="btn btn-sm btn-outline-info font-size-11 m-1">Feature</a>
                                                            @endif
                                                            <a href="{{ route('inventory.show', $car->slug) }}"
                                                                class="btn btn-sm btn-outline-success m-1">Details</a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="pagination pagination-rounded justify-content-center mt-4">
                                            @if ($cars->onFirstPage())
                                                <li class="page-item disabled">
                                                    <span class="page-link"><i class="mdi mdi-chevron-left"></i></span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a href="{{ $cars->previousPageUrl() }}" class="page-link"
                                                        rel="prev"><i class="mdi mdi-chevron-left"></i></a>
                                                </li>
                                            @endif

                                            @foreach ($cars->getUrlRange(1, $cars->lastPage()) as $page => $url)
                                                @if ($page == $cars->currentPage())
                                                    <li class="page-item active"><span
                                                            class="page-link">{{ $page }}</span></li>
                                                @else
                                                    <li class="page-item"><a href="{{ $url }}"
                                                            class="page-link">{{ $page }}</a></li>
                                                @endif
                                            @endforeach

                                            @if ($cars->hasMorePages())
                                                <li class="page-item">
                                                    <a href="{{ $cars->nextPageUrl() }}" class="page-link"
                                                        rel="next"><i class="mdi mdi-chevron-right"></i></a>
                                                </li>
                                            @else
                                                <li class="page-item disabled">
                                                    <span class="page-link"><i class="mdi mdi-chevron-right"></i></span>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->



    </div>
@endsection
