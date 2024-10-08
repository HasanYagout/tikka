@extends('layouts.back-end.app')

@section('title',\App\CPU\translate('Collect_Cash'))


@push('css_or_js')

@endpush

@section('content')

    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="{{asset('public/assets/back-end/img/earning_statictics.png')}}" alt="">
                {{\App\CPU\translate('Collect_Cash')}}
            </h2>
        </div>
        <!-- End Page Title -->

        <!-- Page Header -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('admin.delivery-man.cash-receive', ['id' => $delivery_man->id]) }}" method="post">
                        @csrf
                    <div class="card-body">
                        <h5 class="mb-0 page-header-title d-flex align-items-center gap-2 border-bottom pb-3 mb-3">
                            <i class="tio-money"></i>
                            {{\App\CPU\translate('Collect_Cash')}}
                        </h5>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="d-flex flex-wrap gap-2 mt-3 title-color" id="chosen_price_div">
                                    <div class="product-description-label">{{\App\CPU\translate('Total_Cash_In_Hand')}}: </div>
                                    <div class="product-price">
                                        <strong>{{ $delivery_man->wallet ? \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($delivery_man->wallet->cash_in_hand)) : 0  }}</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="number" name="amount" class="form-control" placeholder="{{\App\CPU\translate('enter_withdraw_amount')}}"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-3 justify-content-end">
                            <button type="submit" class="btn btn--primary px-4">{{\App\CPU\translate('Receive')}}</button>
                        </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 mb-3">
                <!-- Card -->
                <div class="card">
                    <!-- Header -->
                    <div class="px-3 py-4">
                        <div class="d-flex justify-content-between gap-10 flex-wrap align-items-center">
                            <div class="">
                                <form action="{{url()->current()}}" method="GET">
                                    <!-- Search -->
                                    <!-- End Search -->
                                </form>
                            </div>

                        </div>
                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <div class="table-responsive datatable-custom">
                        <table class="table table-hover table-borderless table-thead-bordered table-align-middle card-table {{ Session::get('direction') === 'rtl' ? 'text-right' : 'text-left' }}">
                            <thead class="thead-light thead-50 text-capitalize table-nowrap">
                            <tr>
                                <th>{{\App\CPU\translate('SL')}}</th>
                                <th>{{\App\CPU\translate('delivery_man_name')}}</th>
                                <th>{{\App\CPU\translate('amount')}}</th>
                                <th>{{\App\CPU\translate('transaction_date')}}</th>
                            </tr>
                            </thead>

                            <tbody id="set-rows">
                            @forelse($transactions as $transaction)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $delivery_man->f_name. ' ' .$delivery_man->l_name  }}
                                    </td>
                                    <td>
                                        {{ \App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($transaction->credit)) }}
                                    </td>
                                    <td>
                                        {{ date_format( $transaction->created_at, 'd-M-Y, h:i:s A') }}
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        <div class="text-center p-4">
                                            <img class="mb-3 w-160" src="{{asset('public/assets/back-end')}}/svg/illustrations/sorry.svg" alt="Image Description">
                                            <p class="mb-0">{{\App\CPU\translate('No Country Found')}}</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive mt-4">
                        <div class="px-4 d-flex justify-content-lg-end">
                            <!-- Pagination -->
                            {!! $transactions->links() !!}
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>


    </div>


@endsection

@push('script')

@endpush
