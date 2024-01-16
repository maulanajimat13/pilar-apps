<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit Zone : {{ $zone->zone_name }}</h4>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card-body">
                        <form action="/dashboard/zones/{{ $zone->id }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="zone_name"
                                    class="form-label @error('zone_name') is-invalid
                        @enderror">Zone
                                    Name</label>
                                <input type="text" class="form-control" id="zone_name" name="zone_name"
                                    value="{{ old('zone_name', $zone->zone_name) }}" required autofocus>
                                @error('zone_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="zone_information"
                                    class="form-label @error('zone_information') is-invalid
                        @enderror">Zone
                                    Information</label>
                                <input type="text" class="form-control" id="zone_information" name="zone_information"
                                    value="{{ old('zone_information', $zone->zone_information) }}">
                                @error('zone_information')
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
