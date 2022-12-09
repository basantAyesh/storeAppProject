@extends('admin.layout.master')

@section('title')
    Purchase Transaction
@endsection
@section('content')
    <div class="card">
        <div class="table-responsive">
            <a href="{{ Route('Show_report') }}" type="submit" class="btn btn-lg btn-primary btn-lg w-20 mt-4 mb-0" style="margin-left: 815px;">Report
            </a>
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name Product
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name Store</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Time</th>
                </tr>
                </thead>
                <tbody>
                @if(!count($purchase_transactions)< 1)
                    @foreach($purchase_transactions as $purchase_transaction)
                        <tr>
                            <td style="height: 80px;">
                                <p class="text-xs text-secondary mb-0">{{ $purchase_transaction->Product->name }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $purchase_transaction->Product->Store->name }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $purchase_transaction->price }}</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">{{ $purchase_transaction->time_of_purchase }}</p>
                            </td>
                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
        </div>
    </div>
    {{ $purchase_transactions->links() }}
@endsection
