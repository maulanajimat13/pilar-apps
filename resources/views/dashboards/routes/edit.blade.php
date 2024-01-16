<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit route : {{ $route->route_name }}</h4>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card-body">
                        <form action="/dashboard/routes/{{ $route->id }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="area_id" class="form-label ">Area</label>
                                <select class="form-select" name="area_id" id="area_id">
                                    @foreach ($areas as $area)
                                    @if (old('area_id') == $area->id)
                                    <option value="{{ $area->id }} " selected>{{ $area->area_name }}</option>
                                    @else
                                    <option value="{{ $area->id }} ">{{ $area->area_name }}</option>
                                    @endif
                                    @endforeach
                                  </select>
                            </div>
                            <div class="mb-3">
                                <label for="route_name"
                                    class="form-label @error('route_name') is-invalid
                        @enderror">Route
                                    Name</label>
                                <input type="text" class="form-control" id="route_name" name="route_name"
                                    value="{{ old('route_name',$route->route_name) }}" required autofocus>
                                @error('route_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="route_information"
                                    class="form-label @error('route_information') is-invalid
                        @enderror">Route
                                    Information</label>
                                <input type="text" class="form-control" id="route_information" name="route_information"
                                    value="{{ old('route_information', $route->route_information) }}">
                                @error('route_information')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
