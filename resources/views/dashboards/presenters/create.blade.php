<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Create New Brand Presenter</h4>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card-body">
                        <form action="/dashboard/presenters" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="username"
                                    class="form-label @error('username') is-invalid
                        @enderror">Username
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
                            <div class="mb-3">
                                <label for="qris_name"
                                    class="form-label @error('qris_name') is-invalid
                        @enderror">Qris Name
                                    </label>
                                <input type="text" class="form-control" id="qris_name" name="qris_name"
                                    value="{{ old('qris_name') }}">
                                @error('qris_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-label custom-file-input @error('image') is-invalid
                                @enderror">Qris Image</label>
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                <input class="form-control" type="file" id="customImage" name="image" onchange="previewImage()">
                                @error('image')
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
    <script>
        // const title = document.querySelector('#title');
        // const slug = document.querySelector('#slug');

        // title.addEventListener('change', function(){
        //     fetch('/dashboard/posts/checkSlug?title='+ title.value)
        //     .then(response => response.json())
        //     .then(data => slug.value = data.slug)
        // });

        // document.addEventListener('trix-file-accept', function(e){
        //     e.preventDefault();
        // })

        //menampilan preview gambar
        function previewImage() {
            const image = document.querySelector('#customImage');
            const imgPreview = document.querySelector ('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }

    </script>
</x-app-layout>
