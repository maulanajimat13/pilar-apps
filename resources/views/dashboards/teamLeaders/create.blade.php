<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Create New Team Leader</h4>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card-body">
                        <form action="/dashboard/teamleaders" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="username"
                                    class="form-label @error('username') is-invalid
                        @enderror">TL Username
                                    </label>
                                <input type="text" class="form-control" id="username" name="username"
                                    value="{{ old('username') }}" required autofocus>
                                @error('username')
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
                                    value="{{ old('email') }}" required>
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
                                    value="{{ old('phone_number') }}">
                                @error('phone_number')
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
