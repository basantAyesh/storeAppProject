@extends('admin.layout.master')

@section('title')
    Dashboard
@endsection
@section('content')
    <div class="card">
        <div class="table-responsive">
            <a href="{{ Route('products.create') }}" type="submit"
               class="btn btn-lg btn-primary btn-lg w-20 mt-4 mb-0" style="margin-left: 815px;">Add
                Product
            </a>
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name Store</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Base Price</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Discount
                        Price
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Flag</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
                </thead>
                <tbody>
                @if(!count($products)<1)
                    @foreach($products as $product)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img
                                            src="{{ $product->image }}"
                                            class="avatar avatar-sm me-3">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs">{{ $product->name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs text-secondary mb-0">{{ $product->description }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $product->store->name }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $product->base_price }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $product->discount_price }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $product->flag }}</p>
                            </td>

                            <td class="align-middle">
                                <a href="{{ route('products.edit',$product->id) }}"
                                   class="btn btn-link text-secondary text-xs"
                                   data-toggle="tooltip" data-original-title="Edit user">
                                    Edit
                                </a>
                                <form role="form" class="text-start" method="POST"
                                      action="{{ route('products.destroy',$product->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger text-xs"
                                            onclick="return confirm('Are You Sure ?')">Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
        </div>
    </div>
@endsection
