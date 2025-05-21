@extends('layouts.frontend.master')
@section('page-title', 'index')
@push('page-css')
@endpush
@section('page-content')
    <!-- ============ Hero Section ============= -->
    <section class="hero">
        <div class="swiper hero-slider">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide hero-item-sidee">
                        <div class="hero-item">
                            <div class="hero-content">
                                <h1 class="hero-title">{{ $slider->name }} </h1>
                                <p>
                                    {{ $slider->description }}
                                </p>
                                <a href="/service.html" class="custom-btn get-qucte-btn">
                                    <div class="get-arrow-icon">
                                        <i class="fas fa-arrow-up"></i>
                                    </div>
                                    <p>{{ $slider->btn_text }}</p>
                                </a>
                            </div>
                            <div class="silder-img">
                                <img src="{{ asset($slider->image) }}" alt="" />
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- ============= Hero Section End ============= -->

    <!-- ============= Who Are Section ============= -->
    <section id="about" class="who-are">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="who-are-img">
                        <img src="{{ asset('assets/frontend/images/who-img.png') }}" alt="" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="who-are-content">
                        <!-- <p>/ who we are /</p> -->
                        <h2>
                            <!-- Aligned Global Network is a leading global business strategy
                                                                                                              consultancy -->
                            Facing tough challenges? <br />
                            Get expert advisors and problem solvers by your side.
                        </h2>
                        <p class="who-are-text">
                            <b> Aligned Global Network (AGN)</b> is a leading global
                            strategy consulting group focused on providing innovative
                            solutions tailored to meet the unique needs of organizations in
                            the corporate, nonprofit, and social impact sectors. The AGN
                            Impact Advisor team is made up of seasoned strategic
                            consultants, advisors, and subject matter experts (SMEs) with
                            decades of leadership experience in driving transformative
                            change for Fortune 500 companies, NGOs, federal agencies, and
                            international organizations.
                        </p>
                        <p class="who-are-text">
                            Through cost-effective, project-based initiatives, our team of
                            experts collaborates closely with our client leaders to develop
                            innovative, results-driven strategies that tackle immediate
                            concerns while advancing long-term objectives.
                        </p>

                        <div class="who-are-items">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="who-are-item">
                                        <h4>Customized Solutions</h4>
                                        <p>
                                            We create value-add solutions that are designed fit your
                                            organizational priorities and deliver within your
                                            budget.
                                        </p>
                                        <a href="/service.html" class="custom-btn get-qucte-btn mt-3">
                                            <div class="get-arrow-icon">
                                                <i class="fas fa-arrow-up"></i>
                                            </div>
                                            <p>See Our Services</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="who-are-item">
                                        <h4>Project-Based Approach</h4>
                                        <p>
                                            We use a 3-step-process to meet the clients needs
                                            <br />
                                            Discovery | Design | Execute.
                                        </p>
                                        <a href="/strategic-advisor.html" class="custom-btn get-qucte-btn mt-3">
                                            <div class="get-arrow-icon">
                                                <i class="fas fa-arrow-up"></i>
                                            </div>
                                            <p>Meet Our Team</p>
                                        </a>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-6 col-md-6">
                                                                                                                  <div class="who-are-item">
                                                                                                                    <h4>Leadership Trainning</h4>
                                                                                                                    <p>
                                                                                                                      Get highlighted by the company that you’ve been worked.
                                                                                                                    </p>
                                                                                                                  </div>
                                                                                                                </div>
                                                                                                                <div class="col-lg-6 col-md-6">
                                                                                                                  <div class="who-are-item">
                                                                                                                    <h4>Fast On Demand Service</h4>
                                                                                                                    <p>
                                                                                                                      Get highlighted by the company that you’ve been worked.
                                                                                                                    </p>
                                                                                                                  </div>
                                                                                                                </div> -->
                            </div>
                        </div>
                        <!-- <a href="#" class="custom-btn get-qucte-btn">
                                                                                                              <div class="get-arrow-icon">
                                                                                                                <i class="fas fa-arrow-up"></i>
                                                                                                              </div>
                                                                                                              <p>Get A Quote</p>
                                                                                                            </a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================ Company Logo ============ -->
    <section class="company-logo">
        <div class="container">
            <div class="company-wrapper">
                <div class="swiper mySwiperCompany">
                    <div class="swiper-wrapper">
                        @foreach ($companyLogos as $companyLogo)
                            <div class="swiper-slide">
                                <div class="company-logo-item">
                                    <img src="{{ asset($companyLogo->image) }}" alt="" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============= Our Promote Section ============= -->
    <section class="our-promote">
        <div class="our-promote-bg">
            <div class="container">
                <div class="our-promote-header">
                    <h1>What we do</h1>
                    <p class="short-text">
                        We help organizations address the challenges they face.
                        Collaborating with our clients, we identify business pain points,
                        develop strategic initiatives, and implement data-driven solutions
                        to drive measurable outcomes.
                    </p>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="our-promote-content our-promote-content-1">
                            <div class="our-promote-icon-img">
                                <img src="{{ asset('assets/frontend/images/promote-1.png') }}" alt="" />
                            </div>
                            <div class="our-promote-text">
                                <h4>Advisory Solutions</h4>
                                <p>
                                    Custom, integrated and collaborative consultative services
                                    for company, team, and individual excellence
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="our-promote-content our-promote-content-2">
                            <div class="our-promote-icon-img">
                                <img src="{{ asset('assets/frontend/images/promote-2.png') }}" alt="" />
                            </div>
                            <div class="our-promote-text">
                                <h4>TECHNOLOGY ENABLEMENT</h4>
                                <p>
                                    Research, program development, scalable implementation,
                                    technical upskilling, and organizational evaluation to
                                    maximize impact while optimizing time, resources, and team
                                    capacity.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="our-promote-content our-promote-content-3">
                            <div class="our-promote-icon-img">
                                <img src="{{ asset('assets/frontend/images/promote-3.svg') }}" alt="" />
                            </div>
                            <div class="our-promote-text our-promote-text-3">
                                <h4>Event Services</h4>
                                <p>
                                    End-to-end design, content, and production of your in-person
                                    & virtual events, workshops, hack-a-thons, and training
                                    needs.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============= Our Promote Section End ============= -->

    <!-- ============= Our Service Section ============= -->
    <div class="help-bg">
        <div class="help-bg-item"></div>
    </div>

    <section class="our-service">
        <div class="container">
            <div class="our-service-wrapper">
                <div class="our-service-header our-service-header-who">
                    <div class="our-service-left">
                        <!-- <p>/ Our Service /</p> -->
                        <h4>Why work with us</h4>
                    </div>
                    <a href="/service.html" class="custom-btn get-qucte-btn get-all-qucte-btn">
                        <div class="get-arrow-icon">
                            <i class="fas fa-arrow-up"></i>
                        </div>
                        <p>See Our Services</p>
                    </a>
                </div>
                <div class="our-service-content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="our-service-item">
                                <h3>Project-Driven</h3>
                                <p>
                                    We utilize a project based approach to deliver customized
                                    solutions quickly and efficiently.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="our-service-item">
                                <h3>Collaborative</h3>
                                <p>
                                    We collaborate with you and your team to design solutions
                                    that fit your budget.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="our-service-item">
                                <h3>Dedicated</h3>
                                <p>
                                    We have dedicated Impact Advisors and SMEs with decades of
                                    experience to serve your business needs.
                                </p>
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                                                                                                              <div class="our-service-item">
                                                                                                                <p>We have the ability to execute globally.</p>
                                                                                                              </div>
                                                                                                            </div> -->
                    </div>
                    <h5 class="text-center service-text">We rise by lifting others.</h5>
                </div>
            </div>
        </div>
    </section>

    <!-- ============= Our Service Section End ============= -->

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
