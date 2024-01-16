<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Create New Product</h4>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card-body">
                        <form action="/dashboard/products" method="POST" >
                            @csrf
                            <div class="mb-3">
                                <label for="product_name"
                                    class="form-label @error('product_name') is-invalid
                        @enderror">Product
                                    Name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name"
                                    value="{{ old('product_name') }}" required autofocus>
                                @error('product_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label for="brand" class="form-label ">Brand</label>
                                <select class="form-select" name="brand" id="brand">
                                    <option value="Aroma">Aroma</option>
                                    <option value="Clas Mild">Clas Mild</option>
                                    <option value="Minak Djinggo">Minak Djinggo</option>
                                </select>
                            </div>
                            <div class="mb-3 col-lg-3">
                                <label for="unit" class="form-label ">Unit</label>
                                <select class="form-select" name="unit" id="unit">
                                    <option value="PCS">PCS</option>
                                    <option value="SLOP">SLOP</option>
                                    <option value="BAL">BAL</option>
                                </select>
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label for="price"
                                    class="form-label @error('price') is-invalid
                        @enderror">Price
                                    (Rp.)</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    value="{{ old('price') }}" required>
                                @error('price')
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
