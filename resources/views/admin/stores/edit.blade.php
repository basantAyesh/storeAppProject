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
                            <h3 class="text-gradient text-primary">Update Store</h3>
                        </div>
                        <div class="card card-plain">
                            @if(session()->has('status'))
                                @if(session()->get('status') == true)
                                    <div class="alter alert-success text-white">
                                        Add Successfully
                                    </div>
                                @endif
                            @endif
                            <form role="form" class="text-start" method="POST" action="{{ route('stores.update' , $store->id) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Name Store</label>
                                    <input type="text" class="form-control" name="name" placeholder="name" value="{{ $store->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Address</label>
                                    <input type="text" class="form-control" name="address" placeholder="address" value="{{ $store->address }}">
                                </div>
                                <div class="form-group">
                                    <img
                                        src="{{ $store->logo }}"
                                        class="avatar avatar-sm me-3">
                                    <label for="exampleFormControlSelect2">Upload Logo</label>
                                    <input type="file" class="form-control" name="logo">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Update
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
