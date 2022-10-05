@extends('layouts.frontend.app')
@section('content')
    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="section-title">
            <h2>Shopping Cart</h2>
        </div>
        @if (session('cart'))
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Shopping Summery -->
                        <table class="table shopping-summery">
                            <thead>
                                <tr class="main-hading">
                                    <th>PRODUCT</th>
                                    <th>NAME</th>
                                    <th class="text-center">UNIT PRICE</th>
                                    <th class="text-center">QUANTITY</th>
                                    <th class="text-center">TOTAL</th>
                                    <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0 @endphp
                                @if (session('cart'))
                                    @foreach (session('cart') as $id => $details)
                                        @php $total += $details['price'] * $details['quantity'] @endphp
                                        <tr data-id="{{ $id }}">
                                            <td class="image" data-title="No"><img
                                                    src="images/products/{{ $details['image'] }}" width="100"
                                                    height="100" alt="#"></td>
                                            <td class="product-des" data-title="Description">
                                                <p class="product-name"><a href="#">{{ $details['name'] }}</a></p>
                                            </td>
                                            <td class="price" data-title="Price"><span>${{ $details['price'] }}</span></td>

                                            <td data-th="Quantity">
                                                <input type="number" value="{{ $details['quantity'] }}"
                                                    class="form-control quantity update-cart" />
                                            </td>
                                            <!--/ End Input Order -->

                                            <td class="total-amount" data-title="Total">
                                                <span>${{ $details['price'] * $details['quantity'] }}</span>
                                            </td>
                                            <td class="actions" data-th="">
                                                <button class="btn btn-danger btn-sm remove-from-cart"><i
                                                        class="fa fa-trash-o"></i></button>
                                            </td>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <!--/ End Shopping Summery -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Total Amount -->
                        <div class="total-amount">
                            <div class="row">
                                <div class="col-lg-8 col-md-5 col-12"></div>
                                <div class="col-lg-4 col-md-7 col-12">
                                    <div class="right">
                                        <ul>
                                            <li>Cart Subtotal<span>${{ $total }}</span></li>
                                            <li class="last">You Pay<span>${{ $total }}</span></li>
                                        </ul>
                                        <div class="button5">
                                            <a href="/checkout" class="btn">Checkout</a>
                                            <a href="/" class="btn">Continue shopping</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ End Total Amount -->
                    </div>
                </div>
            </div>
        @else
            <div class="container" style="margin-top: 10rem">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>No Item In the Cart</h2>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <!--/ End Shopping Cart -->
@endsection
