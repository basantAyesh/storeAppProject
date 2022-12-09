@extends('admin.layout.master')

@section('title')
    Create Store
@endsection
@section('content')
    <section>
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-7 mx-auto d-flex justify-content-center flex-column">
                    <div class="card d-flex justify-content-center p-4 shadow-lg">
                        <div class="text-center">
                            <h3 class="text-gradient text-primary">Create Product</h3>
                        </div>
                        <div class="card card-plain">
                            @if(session()->has('status'))
                                @if(session()->get('status') == true)
                                    <div class="alter alert-success text-white">
                                        Add Successfully
                                    </div>
                                @endif
                            @endif
                            <form role="form" class="text-start" method="POST" action="{{ route('products.store') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Name Product</label>
                                    <input type="text" class="form-control" name="name" placeholder="name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Description</label>
                                    <input type="text" class="form-control" name="description"
                                           placeholder="Description">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Store Name</label>
                                    <select name="store_id" class="form-control" id="exampleFormControlSelect1">
                                        <option selected>Choose Store...</option>
                                        @foreach ($stores as $store)
                                            <option value="{{ $store->id }}">{{ $store->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Base Price</label>
                                    <input type="text" class="form-control" name="base_price" placeholder="Base Price">
                                </div>
                                <div class="form-group">
                                    <label>Discount Price</label>
                                    <input type="text" class="form-control" name="discount_price"
                                           placeholder="Discount Price">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Flag</label>
                                    <select name="flag" class="form-control" id="exampleFormControlSelect2">
                                        <option selected>Choose Flag...</option>
                                        <option value="base_purchase">Base Purchase</option>
                                        <option value="discount_purchase">Discount Purchase</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Upload Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Create
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
