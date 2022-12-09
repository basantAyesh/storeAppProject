@extends('admin.layout.master')

@section('title')
    Dashboard
@endsection
@section('content')
    <div class="card">
        <div class="table-responsive">
            <a href="{{ Route('stores.create') }}" type="submit" class="btn btn-lg btn-primary btn-lg w-20 mt-4 mb-0" style="margin-left: 815px;">Add
                Store
            </a>
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Store</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Address</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
                </thead>
                <tbody>
                @if(!count($stores)<1)
                    @foreach($stores as $store)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img
                                            src="{{ $store->logo }}"
                                            class="avatar avatar-sm me-3">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs">{{ $store->name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $store->address }}</p>
                            </td>

                            <td class="align-middle">
                                <a href="{{ route('stores.edit',$store->id) }}"
                                   class="btn btn-link text-secondary text-xs"
                                   data-toggle="tooltip" data-original-title="Edit user">
                                    Edit
                                </a>
                                <form role="form" class="text-start" method="POST"
                                      action="{{ route('stores.destroy',$store->id) }}"
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
