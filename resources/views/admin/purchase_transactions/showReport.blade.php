@extends('admin.layout.master')

@section('title')
    Report
@endsection

@section('content')
    <div class="card">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name Product
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($Report_data as $data)
                    <tr>
                        <td style="height: 80px;">
                            <p class="text-xs text-secondary mb-0">{{ $data->Product->name}}</p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{ $data   ->price }}</p>
                        </td>
                    </tr>

                @endforeach


                </tbody>
            </table>


        </div>
    </div>
@endsection

