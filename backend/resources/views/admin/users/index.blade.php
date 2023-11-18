@extends('admin.layouts.app')
@section('title', 'Users')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Users</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active"><a href="javascript: void(0);">Users</a></li>
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
                                                <th scope="col">Name</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Email</th>

                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $index => $user)
                                                <tr>
                                                    <td>
                                                        {{ ++$index }}
                                                    </td>

                                                    <td>{{ $user->first_name . ' ' . $user->second_name . ' ' . $user->last_name }}
                                                    </td>

                                                    <td>{{ $user->phone }}</td>
                                                    <td>{{ $user->email }}</td>


                                                    <td>
                                                        <div>
                                                            @if ($user->is_active)
                                                                <a href="{{ route('users.deactivate', $user->id) }}"
                                                                    class="btn btn-sm btn-outline-danger font-size-11 m-1">Suspend</a>
                                                            @else
                                                                <a href="{{ route('users.activate', $user->id) }}"
                                                                    class="btn btn-sm btn-outline-info font-size-11 m-1">Activate</a>
                                                            @endif
                                                            <a href="{{ route('users.edit', $user->id) }}"
                                                                class="btn btn-sm btn-outline-success m-1">Edit</a>

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
            </div>
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->



    </div>
@endsection
