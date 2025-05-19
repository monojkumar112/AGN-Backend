@extends('layouts.frontend.master')
@section('page-title', 'index')
@push('page-css')
@endpush
@section('page-content')

    <!-- ============= Donate ========== -->
    <section class="donate">
        <div class="donate-wrapper">
            <div class="donate-left">
                <img src="/assets/images/donate.png" alt="" />
            </div>
            <div class="donate-right">
                <p class="donate-text">
                    Aligned Global Network currently engaged in 501c3 fiscally sponsored
                    projects that serve communities across the world. If you would like
                    to learn more about the work we do - please connect with us via
                    Contact Us.
                </p>
                <p class="donate-text">
                    Please consider a tax-deductible contribution to support these
                    efforts.
                </p>
                <p class="donate-text">Thank you!</p>
                <a href="/#contact" data-bs-toggle="modal" data-bs-target="#exampleModal" class="custom-btn get-qucte-btn">
                    <div class="get-arrow-icon"><i class="fas fa-arrow-up"></i></div>
                    <p>Donate</p>
                </a>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="donate-form-wrappr">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                <form action="">
                                    <div class="donate-form-step" data-step="1">
                                        <div class="donate-logo">
                                            <img src="/assets/images/logo.png" alt="" />
                                        </div>
                                        <div class="donate-header-item">
                                            <button class="donate-btn active" type="button">
                                                One Time
                                            </button>
                                            <button class="donate-btn" type="button">
                                                One Time
                                            </button>
                                        </div>
                                        <div class="donate-stap-1-content">
                                            <p>Choose an amount to give</p>
                                            <div class="donate-stap-1-list">
                                                <button class="donate-price-btn" type="button">
                                                    $50
                                                </button>
                                                <button class="donate-price-btn" type="button">
                                                    $10
                                                </button>
                                                <button class="donate-price-btn" type="button">
                                                    $150
                                                </button>
                                                <button class="donate-price-btn" type="button">
                                                    $200
                                                </button>
                                            </div>
                                            <div class="form-input-item">
                                                <input type="text" placeholder="$ 200" />
                                            </div>
                                            <button class="contuine-btn" type="button">
                                                Continue
                                            </button>
                                        </div>
                                    </div>
                                    <div class="donate-form-step" data-step="2">
                                        <div class="donate-logo">
                                            <img src="/assets/images/logo.png" alt="" />
                                        </div>
                                        <ul class="donate-card-item">
                                            <li class="donate-card-item-list">
                                                <p>Donation amount</p>
                                                <p>$100.00</p>
                                            </li>
                                            <li class="donate-card-item-list">
                                                <p>Donation amount</p>
                                                <p>$100.00</p>
                                            </li>
                                            <li class="donate-card-item-list">
                                                <h3>Total payment amount</h3>
                                                <h3>$108.00</h3>
                                            </li>
                                        </ul>
                                        <div class="form-checkbox-item">
                                            <input type="checkbox" class="checkbox-item" id="checkbox" />
                                            <label for="checkbox">
                                                Keep me informed with email and SMS updates
                                            </label>
                                        </div>
                                        <button class="contuine-btn" type="button">Card</button>
                                    </div>
                                    <div class="donate-form-step" data-step="3">
                                        <div class="donate-logo">
                                            <img src="/assets/images/logo.png" alt="" />
                                        </div>
                                        <h3 class="donate-info-title">Your Information</h3>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-input-item">
                                                    <input type="text" placeholder="First Name" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-input-item">
                                                    <input type="text" placeholder="Last Name" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-input-item">
                                                    <input type="email" placeholder="Email" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-input-item">
                                                    <input type="text" placeholder="Phone Number" />
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-input-item">
                                                    <input type="text" placeholder="Address" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-info-wrapper">
                                            <h2 class="donate-info-title">Card information</h2>
                                            <img src="/assets/images/card.png" alt="" />
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-input-item">
                                                    <input type="number" placeholder="Card Number" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-input-item">
                                                    <input type="number" placeholder="MM/YY" />
                                                </div>
                                            </div>
                                        </div>
                                        <button class="contuine-btn">Pay $55</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('page-js')
@endpush
