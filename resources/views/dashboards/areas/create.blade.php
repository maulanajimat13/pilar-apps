<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Create New Area</h4>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card-body">
                        <form action="/dashboard/areas" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="zone_id" class="form-label ">Zone</label>
                                <select class="form-select" name="zone_id" id="zone_id">
                                    @foreach ($zones as $zone)
                                    @if (old('zone_id') == $zone->id)
                                    <option value="{{ $zone->id }} " selected>{{ $zone->zone_name }}</option>
                                    @else
                                    <option value="{{ $zone->id }} ">{{ $zone->zone_name }}</option>
                                    @endif
                                    @endforeach
                                  </select>
                            </div>
                            <div class="mb-3">
                                <label for="area_name"
                                    class="form-label @error('area_name') is-invalid
                        @enderror">Area
                                    Name</label>
                                <input type="text" class="form-control" id="area_name" name="area_name"
                                    value="{{ old('area_name') }}" required autofocus>
                                @error('area_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="area_information"
                                    class="form-label @error('area_information') is-invalid
                        @enderror">Area
                                    Information</label>
                                <input type="text" class="form-control" id="area_information" name="area_information"
                                    value="{{ old('area_information') }}">
                                @error('area_information')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
