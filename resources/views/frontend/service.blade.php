@extends('layouts.frontend.master')
@section('page-title', 'index')
@push('page-css')
@endpush
@section('page-content')
    <!-- ============= Our Service Section ============= -->
    <div class="help-bg">
        <div class="help-bg-item"></div>
    </div>
    <section class="our-service">
        <div class="container">
            <div class="our-service-wrapper">
                <div class="our-service-header our-service-header-con">
                    <div class="our-service-left">
                        <h4>How We Work</h4>
                        <h5>A Project-Based Approach</h5>
                    </div>
                    <!-- <a href="/service.html" class="custom-btn get-qucte-btn">
                                                                                                                <div class="get-arrow-icon">
                                                                                                                  <i class="fas fa-arrow-up"></i>
                                                                                                                </div>
                                                                                                                <p>See All Services</p>
                                                                                                              </a> -->
                </div>
                <div class="our-service-content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="our-service-item">
                                <a href="#" class="our-service-title" target="_blank" rel="noopener noreferrer">Step
                                    1: DISCOVERY</a>
                                <p>
                                    We begin by understanding your goals and desired target
                                    outcomes.
                                </p>
                                <!-- <ul class="mt-2">
                                                                                                                      <li>
                                                                                                                        Research and strategy initiated by our internal team of
                                                                                                                        Impact Advisors
                                                                                                                      </li>
                                                                                                                      <li>Budget considerations and team requirements</li>
                                                                                                                      <li>Retain necessary resources for project development</li>
                                                                                                                    </ul> -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="our-service-item">
                                <a href="#" class="our-service-title" target="_blank" rel="noopener noreferrer">Step
                                    2: DESIGN
                                </a>
                                <p>
                                    Collaborating closely with the client, we develop a
                                    comprehensive project plan ~ a blueprint to success:
                                    timelines, milestones, deliverables.
                                </p>
                                <!-- <ul class="mt-2">
                                                                                                                      <li>
                                                                                                                        Establish a clear timeline and assign team
                                                                                                                        responsibilities
                                                                                                                      </li>
                                                                                                                      <li>Set milestones and define key deliverables</li>
                                                                                                                      <li>Finalize proposal, contract, and legal agreements</li>
                                                                                                                    </ul> -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="our-service-item">
                                <a href="#" class="our-service-title" target="_blank" rel="noopener noreferrer">Step
                                    3: EXECUTE
                                </a>
                                <p>
                                    We execute the plan with a focus on innovation and
                                    measurable impact for short-term objectives and long-term
                                    goals.
                                </p>
                                <!-- <ul class="mt-2">
                                                                                                                      <li>
                                                                                                                        Deliverables are completed, reviewed, and signed off by
                                                                                                                        the client
                                                                                                                      </li>
                                                                                                                      <li>
                                                                                                                        Evaluation of the project begins as we move toward the
                                                                                                                        next phase or project!
                                                                                                                      </li>
                                                                                                                    </ul> -->
                                <!-- <a
                                                                                                                      href="/service.html"
                                                                                                                      target="_blank"
                                                                                                                      rel="noopener noreferrer"
                                                                                                                      class="service-link-btn"
                                                                                                                    >
                                                                                                                      <span>Explore Now</span>
                                                                                                                      <span> <i class="fas fa-arrow-up"></i> </span>
                                                                                                                    </a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="service-main-wrapper">
        @foreach ($services as $service)
            <div class="help-bg help-serve-bg">
                <div class="help-bg-item"></div>
            </div>
            <section class="our-service">
                <div class="container">
                    <div class="our-service-wrapper">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="our-service-header mb-3">
                                    <div class="our-service-left">
                                        <h4>Our Services</h4>
                                    </div>
                                </div>
                                <div class="our-service-item">
                                    <a href="#" class="our-service-title" target="_blank" rel="noopener noreferrer">
                                        {{ $service->name }}
                                    </a>
                                    <ul>
                                        @foreach (json_decode($service->service) as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach

                                    </ul>
                                </div>
                                <a href="{{ route('advisor') }}#{{ $service->btn_slug }}"
                                    class="custom-btn mt-3 get-qucte-btn">
                                    <div class="get-arrow-icon">
                                        <i class="fas fa-arrow-up"></i>
                                    </div>
                                    <p>{{ $service->btn_text }}</p>
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <div class="our-service-img-item">
                                    <div class="service-img-add">
                                        <img src="{{ asset($service->image) }}" alt="" />

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
    </div>
    <section id="contact" class="request-call">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="request-call-item">
                        <p>/ Contact Us /</p>
                        <h3>Let’s Get Started!</h3>
                        <p>
                            We are ready to tackle your biggest challenges together and
                            deliver solutions.
                        </p>
                        <div class="request-call-form">
                            <form action="{{ route('contact.store') }}" method="post">
                                @csrf
                                @method('post')
                                <div class="input-fuild-item">
                                    <input type="text" placeholder="Name*" name="name" required />
                                </div>
                                <div class="input-fuild-item">
                                    <input type="text" placeholder="Company Name" name="company" />
                                </div>
                                <div class="input-fuild-item">
                                    <input type="email" placeholder="Email*" name="email" />
                                </div>
                                <div class="input-fuild-item">
                                    <input type="number" placeholder="Phone Number" name="phone" />
                                </div>

                                <div class="input-fuild-item">
                                    <textarea name="message" placeholder="Message*" id="" cols="30" rows=""></textarea>
                                </div>

                                <button type="submit" class="custom-btn get-qucte-btn"
                                    href="mailto:amandah@alignedglobalnetwork.com">
                                    <div class="get-arrow-icon">
                                        <i class="fas fa-arrow-up"></i>
                                    </div>
                                    <p>Submit Request</p>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="request-call-item">
                        <div class="request-call-img">
                            <img src="{{ asset('assets/frontend/images/request-img.png') }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('page-js')
@endpush
