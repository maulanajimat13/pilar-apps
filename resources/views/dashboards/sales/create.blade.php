<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Input Sales</h4>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card-body">
                        <form action="/dashboard/sales" method="POST">
                            @csrf
                            <div class="mb-3 col-lg-5">
                                <label for="team_id" class="form-label ">Team</label>
                                <select class="form-select" name="team_id" id="team_id">
                                    @foreach ($teams as $team)
                                        @if (old('team_id') == $team->id)
                                            <option value="{{ $team->id }} " selected>{{ $team->name }}
                                            </option>
                                        @else
                                            <option value="{{ $team->id }} ">{{ $team->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col-lg-5">
                                <label for="bp_id" class="form-label ">Brand Presenter</label>
                                <select class="form-select" name="bp_id" id="bp_id">
                                    @foreach ($presenters as $presenter)
                                        @if (old('bp_id') == $presenter->id)
                                            <option value="{{ $presenter->id }} " selected>{{ $presenter->name }}</option>
                                        @else
                                            <option value="{{ $presenter->id }} ">{{ $presenter->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-lg-5">
                                <label for="gender" class="form-label ">Gender</label>
                                <select class="form-select" name="gender" id="gender">
                                            <option value="Laki - Laki" selected>Laki - Laki</option>
                                            <option value="Perempuan" >Perempuan</option>
                                </select>
                            </div>
                              <div class="mb-3 col-lg-5">
                                <label for="age" class="form-label ">Age Range</label>
                                <select class="form-select" name="age" id="age">
                                            <option value="18-25" selected>18-25</option>
                                            <option value="26-30" >26-30</option>
                                            <option value="31-40" >31-40</option>
                                            <option value="40++" >40++</option>
                                </select>
                            </div>
                            <div class="mb-3 col-lg-5">
                                <label for="age" class="form-label ">Rokok Asal</label>
                                <select class="form-select" name="rokok_asal" id="rokok_asal">
                                            <option value="A Mild" selected>A Mild</option>
                                            <option value="Surya Promild" >Surya Promild</option>
                                            <option value="Magnum Mild" >Magnum Mild</option>
                                            <option value="Dunhil Mild" >Dunhil Mild</option>
                                            <option value="Evo" >Evo</option>
                                            <option value="Ultra Mild" >Ultra Mild</option>
                                            <option value="Others" >Others..</option>
                                </select>
                            </div>
                            <div class="mb-3 col-lg-5">
                                <label for="other_info"
                                    class="form-label @error('other_info') is-invalid
                        @enderror">Other Info
                                    </label>
                                <input type="text" class="form-control" id="other_info" name="other_info"
                                    value="{{ old('other_info') }}">
                                @error('other_info')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-3">
                                <label for="name"
                                    class="form-label @error('name') is-invalid
                        @enderror">CC
                                    </label>
                                <input type="number" class="form-control" id="cc" name="cc"
                                    value="{{ old('cc') }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-3">
                                <label for="ecc"
                                    class="form-label @error('ecc') is-invalid
                        @enderror">ECC
                                    </label>
                                <input type="number" class="form-control" id="ecc" name="ecc"
                                    value="{{ old('ecc') }}">
                                @error('ecc')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-3">
                                <h4 class="card-title">PACK SOLD</h4>
                            </div>
                            <div class="mb-3 col-lg-3">
                                <label for="clasmild"
                                    class="form-label @error('clasmild') is-invalid
                        @enderror">Clasmild
                                    </label>
                                <input type="number" class="form-control" id="clasmild" name="clasmild"
                                    value="{{ old('clasmild') }}">
                                @error('clasmild')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-3">
                                <label for="redmax"
                                    class="form-label @error('redmax') is-invalid
                        @enderror">Clasmild Redmax
                                    </label>
                                <input type="number" class="form-control" id="redmax" name="redmax"
                                    value="{{ old('redmax') }}">
                                @error('redmax')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-3">
                                <label for="silver"
                                    class="form-label @error('silver') is-invalid
                        @enderror">Clasmild Silver
                                    </label>
                                <input type="number" class="form-control" id="silver" name="silver"
                                    value="{{ old('silver') }}">
                                @error('silver')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <td> --}}
                                {{-- <button type="button" name="add" id="add"
                                    class="btn btn-success">Show QR Code</button> --}}
        <!-- Add id to image -->
        {{-- <img id="image"
             src=
"https://drive.google.com/uc?export=view&id=1N6sdfaGs6V1kw3_98pxJQ8kEt5TmafPG"
             alt="" />
    </div>
    <button type="button" onclick="show()" id="btnID">
        Show QR
    </button> --}}
                            {{-- </td> --}}
                            <div class="mb-3">
                                <label for="image" class="form-label @error('image') is-invalid
                                @enderror">Sale Image</label>
                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                <input type="file" class="form-control" id="image" name="image" onchange="previewImage()">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    //menampilan preview gambar
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector ('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }

    }

        function show() {
            /* Access image by id and change
            the display property to block*/
            document.getElementById('image')
                .style.display = "block";
            document.getElementById('btnID')
                .style.display = "none";
        }
</script>
</x-app-layout>
