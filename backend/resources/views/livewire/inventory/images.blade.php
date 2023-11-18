<div>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Vehicle Images - Select to view</h4>

                    <div class="table-responsive">
                        <table class="table project-list-table table-nowrap align-middle table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 100px">#</th>
                                    <th scope="col">Created on</th>
                                    <th scope="col">Order</th>

                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carImages as $image)
                                    <tr class="p-1" style="padding:0px !important">
                                        <td><img src="{{ env('AWS_BASE_URL') . $image->image_url }}" alt=""
                                                class="avatar-sm"></td>
                                        <td>
                                            <h5 class="text-truncate font-size-14"><a href="javascript: void(0);"
                                                    class="text-dark">{{ $image->created_at->toDateString() }}</a>
                                            </h5>
                                            <p class="text-muted mb-0">
                                                {{ $image->user->first_name . ' ' . $image->user->last_name }}
                                            </p>
                                        </td>

                                        <td><span class="badge bg-success">Order {{ $image->order }}</span></td>

                                        <td>
                                            <a class="btn btn-sm btn-outline-danger mr-1">Delete</a>
                                            @if ($image->order !== 1)
                                                <a wire:click="moveUp('{{ $image->id }}')"
                                                    class="btn btn-sm btn-outline-info mr-1">Move Up </a>
                                            @endif
                                            @if ($carImages->count() !== $image->order)
                                                <a wire:click="moveUp('{{ $image->id }}')"
                                                    class="btn btn-sm btn-outline-warning mr-1">Move Down </a>
                                            @endif
                                            <a wire:click="viewImage('{{ $image->image_url }}')"
                                                class="btn btn-sm btn-outline-success">View</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">

                    {{-- <h4 class="card-title">Responsive images</h4> --}}


                    <div class="">
                        <img style="overflow: hidden"
                            src="{{ $viewImageUrl == '' ? asset('images/logo.png') : env('AWS_BASE_URL') . $viewImageUrl }}"
                            class="img-fluid" alt="Responsive image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
