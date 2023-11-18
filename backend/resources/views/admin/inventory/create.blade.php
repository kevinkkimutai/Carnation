@extends('admin.layouts.app')
@section('title', 'Add vehicle')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Add Vehicle (Step 1)</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Inventory</a></li>
                                    <li class="breadcrumb-item active">Add Vehicle (Step 1)</li>
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

                                <h4 class="card-title">Basic Information</h4>
                                @include('partials.info')

                                <form method="POST" action="{{ route('inventory.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="mb-3">
                                                <label for="productname">Title</label>
                                                <input id="productname" name="title" type="text" class="form-control"
                                                    placeholder="Product Name" value="{{ old('title') }}">

                                                @error('title')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="manufacturername">Negotiable</label>
                                                <select class="form-control select2" name="negotiable">
                                                    <option value="negotiable">Negotiable</option>
                                                    <option value="fixed">Fixed</option>

                                                </select>
                                                @error('negotiable')
                                                     <div class="text-sm text-danger" >
                                                       {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div> --}}
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="manufacturername">Make</label>
                                                <select class="form-control select2" name="make_id">

                                                    @foreach ($carMakes as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ old('make_id') == $item->id ? 'selected' : '' }}>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('make_id')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="manufacturername">Model</label>
                                                <select class="form-control select2" name="model_id">
                                                    @foreach ($carModels as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ old('model_id') == $item->slug ? 'selected' : '' }}>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('model_id')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="manufacturername">Body Type</label>
                                                <select class="form-control select2" name="body_type">

                                                    @foreach ($bodyTypes as $item)
                                                        <option value="{{ $item->slug }}"
                                                            {{ old('body_type') == $item->slug ? 'selected' : '' }}>
                                                            {{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('body_type')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="manufacturerbrand">Year</label>
                                                <input id="manufacturerbrand" name="year" type="number"
                                                    class="form-control" placeholder="YOM" value="{{ old('year') }}">
                                                @error('year')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="manufacturerbrand">Mileage (KM)</label>
                                                <input id="manufacturerbrand" name="mileage" type="number"
                                                    class="form-control" placeholder="Mileage"
                                                    value="{{ old('mileage') }}">
                                                @error('mileage')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="manufacturerbrand">CC</label>
                                                <input id="manufacturerbrand" name="cc" type="number"
                                                    class="form-control" placeholder="CC" value="{{ old('cc') }}">
                                                @error('cc')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="mb-3">
                                                <label for="price">Price</label>
                                                <input id="price" name="price" type="text" class="form-control"
                                                    placeholder="Price" value="{{ old('price') }}">
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="manufacturername">Transmission</label>
                                                <select class="form-control select2" name="transmission">
                                                    <option value="automatic"
                                                        {{ old('transmission') == 'automatic' ? 'selected' : '' }}>
                                                        Automatic</option>
                                                    <option value="manual"
                                                        {{ old('manual') == 'automatic' ? 'selected' : '' }}>Manual
                                                    </option>
                                                </select>
                                                @error('transmission')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="manufacturername">Interior</label>
                                                <select class="form-control select2" name="interior">

                                                    @foreach ($interiors as $item)
                                                        <option {{ old('interior') == $item->slug ? 'selected' : '' }}
                                                            value="{{ $item->slug }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('interior')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="manufacturername">Drive train</label>
                                                <select class="form-control select2" name="drive_train">
                                                    <option value="fwd"
                                                        {{ old('drive_train') == 'fwd' ? 'selected' : '' }}>Front-Wheel
                                                        (FWD)</option>
                                                    <option value="rwd"
                                                        {{ old('drive_train') == 'rwd' ? 'selected' : '' }}>Rear-Wheel
                                                        (RWD)</option>
                                                    <option value="awd"
                                                        {{ old('drive_train') == 'awd' ? 'selected' : '' }}>All-Wheel (AWD)
                                                    </option>
                                                    <option value="4wd"
                                                        {{ old('drive_train') == '4wd' ? 'selected' : '' }}>Four-Wheel
                                                        (4WD)</option>
                                                    <option value="part-time-4wd"
                                                        {{ old('drive_train') == 'part-time-4wd' ? 'selected' : '' }}>
                                                        Part-Time Four-Wheel</option>
                                                    <option value="selectable-4wd"
                                                        {{ old('drive_train') == 'selectable-4wd' ? 'selected' : '' }}>
                                                        Selectable Four-Wheel</option>
                                                    <option value="electric-fwd"
                                                        {{ old('drive_train') == 'electric-fwd' ? 'selected' : '' }}>
                                                        Electric Front-Wheel</option>
                                                    <option value="electric-rwd"
                                                        {{ old('drive_train') == 'electric-rwd' ? 'selected' : '' }}>
                                                        Electric Rear-Wheel</option>
                                                    <option value="electric-awd"
                                                        {{ old('drive_train') == 'electric-awd' ? 'selected' : '' }}>
                                                        Electric All-Wheel</option>
                                                    <option value="hybrid-fwd"
                                                        {{ old('drive_train') == 'hybrid-fwd' ? 'selected' : '' }}>Hybrid
                                                        Front-Wheel</option>
                                                    <option value="hybrid-rwd"
                                                        {{ old('drive_train') == 'hybrid-rwd' ? 'selected' : '' }}>Hybrid
                                                        Rear-Wheel</option>
                                                    <option value="hybrid-awd"
                                                        {{ old('drive_train') == 'hybrid-awd' ? 'selected' : '' }}>Hybrid
                                                        All-Wheel</option>
                                                    <option value="plug-in-hybrid-fwd"
                                                        {{ old('drive_train') == 'plug-in-hybrid-fwd' ? 'selected' : '' }}>
                                                        Plug-In Hybrid Front-Wheel</option>
                                                    <option value="plug-in-hybrid-rwd"
                                                        {{ old('drive_train') == 'plug-in-hybrid-rwd' ? 'selected' : '' }}>
                                                        Plug-In Hybrid Rear-Wheel</option>
                                                    <option value="plug-in-hybrid-awd"
                                                        {{ old('drive_train') == 'plug-in-hybrid-awd' ? 'selected' : '' }}>
                                                        Plug-In Hybrid All-Wheel</option>
                                                </select>
                                                @error('drive_train')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="manufacturername">Fuel</label>
                                                <select class="form-control select2" name="fuel">
                                                    <option value="petrol"
                                                        {{ old('fuel') == 'petrol' ? 'selected' : '' }}>Petrol</option>
                                                    <option value="diesel"
                                                        {{ old('fuel') == 'diesel' ? 'selected' : '' }}>Diesel</option>
                                                    <option value="electric"
                                                        {{ old('fuel') == 'electric' ? 'selected' : '' }}>Electric</option>
                                                    <option value="hybrid"
                                                        {{ old('fuel') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                                                    <option value="plug-in-hybrid"
                                                        {{ old('fuel') == 'plug-in-hybrid' ? 'selected' : '' }}>Plug-In
                                                        Hybrid</option>
                                                    <option value="natural-gas"
                                                        {{ old('fuel') == 'natural-gas' ? 'selected' : '' }}>Natural Gas
                                                    </option>
                                                    <option value="hydrogen"
                                                        {{ old('fuel') == 'hydrogen' ? 'selected' : '' }}>Hydrogen</option>
                                                    <option value="biofuel"
                                                        {{ old('fuel') == 'biofuel' ? 'selected' : '' }}>Biofuel</option>
                                                    <option value="flex-fuel"
                                                        {{ old('fuel') == 'flex-fuel' ? 'selected' : '' }}>Flex Fuel
                                                    </option>
                                                </select>
                                                @error('fuel')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="manufacturername">Usage</label>
                                                <select class="form-control select2" name="car_usage">
                                                    <option {{ old('car_usage') == 'new' ? 'selected' : '' }}
                                                        value="new">New</option>
                                                    <option {{ old('car_usage') == 'foreign' ? 'selected' : '' }}
                                                        value="foreign">Foreign Used</option>
                                                    <option {{ old('car_usage') == 'local' ? 'selected' : '' }}
                                                        value="local">Locally used</option>
                                                </select>
                                                @error('car_usage')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mb-3">
                                                <label for="manufacturername">Availability</label>
                                                <select class="form-control select2" name="availability">
                                                    <option value="available"
                                                        {{ old('availability') == 'available' ? 'selected' : '' }}>
                                                        Available</option>
                                                    <option value="unavailable"
                                                        {{ old('availability') == 'unavailable' ? 'selected' : '' }}>
                                                        Unavailable</option>
                                                </select>
                                                @error('availability')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="mb-3">
                                                <label for="manufacturerbrand">Color</label>
                                                <input id="manufacturerbrand" name="color" type="text"
                                                    class="form-control" placeholder="Color"
                                                    value="{{ old('color') }}">
                                                @error('color')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="mb-3">
                                                <label for="manufacturerbrand">Top Speed</label>
                                                <input id="manufacturerbrand" name="top_speed" type="number"
                                                    class="form-control" placeholder="Top Speed"
                                                    value="{{ old('top_speed') }}">
                                                @error('top_speed')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="mb-3">
                                                <label for="manufacturerbrand">Number of seats</label>
                                                <input id="manufacturerbrand" name="seat_number" type="number"
                                                    class="form-control" placeholder="Number of seats"
                                                    value="{{ old('seat_number') }}">
                                                @error('seat_number')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="mb-3">
                                                <label for="manufacturerbrand">Number of doors</label>
                                                <input id="manufacturerbrand" name="doors" type="number"
                                                    class="form-control" placeholder="Number of doors"
                                                    value="{{ old('doors') }}">
                                                @error('doors')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="manufacturerbrand">Steering position</label>
                                                <select class="form-control select2" name="steering">
                                                    <option value="left"
                                                        {{ old('steering') == 'left' ? 'selected' : '' }}>Left-Hand Drive
                                                        (LHD)</option>
                                                    <option value="right"
                                                        {{ old('steering') == 'right' ? 'selected' : '' }}>Right-Hand Drive
                                                        (RHD)</option>
                                                    <option value="center"
                                                        {{ old('steering') == 'center' ? 'selected' : '' }}>Center-Steer
                                                    </option>
                                                </select>
                                                @error('steering')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="manufacturerbrand">Steering type</label>
                                                <select class="form-control select2" name="steering_type">
                                                    <option value="manual"
                                                        {{ old('steering_type') == 'manual' ? 'selected' : '' }}>Manual
                                                        Steering</option>
                                                    <option value="power"
                                                        {{ old('steering_type') == 'power' ? 'selected' : '' }}>Power
                                                        Steering</option>
                                                    <option value="electric"
                                                        {{ old('steering_type') == 'electric' ? 'selected' : '' }}>Electric
                                                        Power Steering (EPS)</option>
                                                    <option value="hydraulic"
                                                        {{ old('steering_type') == 'hydraulic' ? 'selected' : '' }}>
                                                        Hydraulic Power Steering</option>
                                                </select>
                                                @error('steering_type')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>





                                    </div>



                                    <h4 class="card-title pt-2 pb-2">Car Features</h4>
                                    {{-- <p class="card-title-desc">Select vehicle features</p> --}}


                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="metatitle">Safety features</label>
                                                @foreach ($safetyFeature as $item)
                                                    <div>
                                                        <input type="checkbox" id="{{ $item->id }}"
                                                            name="safety_features[]" value="{{ $item->id }}"
                                                            {{ in_array($item->id, old('safety_features', [])) ? 'checked' : '' }}>
                                                        <label for="{{ $item->id }}">{{ $item->name }}</label>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="metadescription">Comfort features</label>
                                                @foreach ($comfortFeatures as $item)
                                                    <div>
                                                        <input type="checkbox" id="{{ $item->id }}"
                                                            name="comfort_features[]" value="{{ $item->id }}"
                                                            {{ in_array($item->id, old('comfort_features', [])) ? 'checked' : '' }}>
                                                        <label for="{{ $item->id }}">{{ $item->name }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="mb-3">
                                                <label for="metadescription">Description</label>
                                                <textarea class="form-control" id="metadescription" name="description" rows="5"
                                                    placeholder="Meta Description">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <div class="text-sm text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                            Changes</button>
                                        <button type="submit"
                                            class="btn btn-secondary waves-effect waves-light">Cancel</button>
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
