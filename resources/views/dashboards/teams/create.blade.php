<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Create New Team</h4>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card-body">
                        <form action="/dashboard/teams" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="route_id" class="form-label ">Route</label>
                                <select class="form-select" name="route_id" id="route_id">
                                    @foreach ($routes as $route)
                                        @if (old('route_id') == $route->id)
                                            <option value="{{ $route->id }} " selected>{{ $route->route_name }}
                                            </option>
                                        @else
                                            <option value="{{ $route->id }} ">{{ $route->route_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="leader_id" class="form-label ">Team Leader</label>
                                <select class="form-select" name="leader_id" id="leader_id">
                                    @foreach ($leaders as $leader)
                                        @if (old('leader_id') == $leader->id)
                                            <option value="{{ $leader->id }} " selected>{{ $leader->username }}</option>
                                        @else
                                            <option value="{{ $leader->id }} ">{{ $leader->username }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name"
                                    class="form-label @error('name') is-invalid
                        @enderror">Team
                                    Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <table id="table">
                                    <tr>
                                        <td>
                                            <label for="brand_presenter" class="form-label ">Brand Presenters</label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select class="form-select" name="brand_presenter" id="brand_presenter">
                                                @foreach ($presenters as $presenter)
                                                @if (old('brand_presenter') == $presenter->id)
                                                <option value="{{ $presenter->id }} " selected>{{ $presenter->username }}</option>
                                                @else
                                                <option value="{{ $presenter->id }} ">{{ $presenter->username }}</option>
                                                @endif
                                                @endforeach
                                              </select>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-success btn-sm addRow">+</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){

        });

    </script>
</x-app-layout>
