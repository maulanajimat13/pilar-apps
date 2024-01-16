<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        @dd($tL)
                        <h4 class="card-title">Edit team leader : {{ $tL->name }}</h4>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card-body">
                        <form action="/dashboard/teamleaders/{{ $tL->id }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="name"
                                    class="form-label @error('name') is-invalid
                        @enderror">TL Name
                                    </label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $tL->name) }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email"
                                    class="form-label @error('email') is-invalid
                        @enderror">Email
                                    </label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email', $tL->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password"
                                    class="form-label @error('password') is-invalid
                        @enderror">Password
                                    </label>
                                <input type="password" class="form-control" id="password" name="password"
                                    value="{{ old('password') }}" required>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone_number"
                                    class="form-label @error('phone_number') is-invalid
                        @enderror">Phone Number
                                    </label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    value="{{ old('phone_number', $tL->phone_number) }}">
                                @error('phone_number')
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
