@extends('admin.layouts.app')
@section('title', 'Contact us')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Contact us messages </h4>

                            <div class="page-title-right">
                                <div class="flex">

                                    <div>
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Contact Messages</a>

                                        </ol>
                                    </div>
                                </div>
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
                                                <th scope="col">Name</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Created at</th>
                                                <th scope="col">Message</th>

                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($messages as $index => $message)
                                                <tr>
                                                    <td>
                                                        {{ ($messages->currentPage() - 1) * $messages->perPage() + $loop->iteration }}
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
                                                                <a href="{{ route('contactus.complete', $message->id) }}"
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
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="pagination pagination-rounded justify-content-center mt-4">
                                            @if ($messages->onFirstPage())
                                                <li class="page-item disabled">
                                                    <span class="page-link"><i class="mdi mdi-chevron-left"></i></span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a href="{{ $messages->previousPageUrl() }}" class="page-link"
                                                        rel="prev"><i class="mdi mdi-chevron-left"></i></a>
                                                </li>
                                            @endif

                                            @foreach ($messages->getUrlRange(1, $messages->lastPage()) as $page => $url)
                                                @if ($page == $messages->currentPage())
                                                    <li class="page-item active"><span
                                                            class="page-link">{{ $page }}</span></li>
                                                @else
                                                    <li class="page-item"><a href="{{ $url }}"
                                                            class="page-link">{{ $page }}</a></li>
                                                @endif
                                            @endforeach

                                            @if ($messages->hasMorePages())
                                                <li class="page-item">
                                                    <a href="{{ $messages->nextPageUrl() }}" class="page-link"
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
