@extends('layouts.frontend.master')
@section('page-title', 'index')
@push('page-css')
@endpush
@section('page-content')
    <!-- ============ Hero Section ============= -->
    <section class="hero">
        <div class="swiper hero-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="hero-item">
                        <div class="hero-content">
                            <h1 class="hero-title">Aligned Global Network</h1>
                            <p>
                                Leverage the power of the collective to unlock bold,
                                actionable solutions for your organization.
                            </p>
                            <a href="/service.html" class="custom-btn get-qucte-btn">
                                <div class="get-arrow-icon">
                                    <i class="fas fa-arrow-up"></i>
                                </div>
                                <p>Learn More</p>
                            </a>
                        </div>
                        <div class="silder-img">
                            <img src="{{ asset('assets/frontend/images/silder-1.png') }}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hero-item">
                        <div class="hero-content">
                            <h1 class="hero-title">Excellence</h1>
                            <p>
                                A dedication to the highest standards of quality in both
                                strategy and execution.
                            </p>
                            <a href="/service.html" class="custom-btn get-qucte-btn">
                                <div class="get-arrow-icon">
                                    <i class="fas fa-arrow-up"></i>
                                </div>
                                <p>Learn More</p>
                            </a>
                        </div>
                        <div class="silder-img silder-img-excell">
                            <img src="{{ asset('assets/frontend/images/silder-2.png') }}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hero-item">
                        <div class="hero-content hero-content-3">
                            <h1 class="hero-title">Expertise & Innovation</h1>
                            <p>
                                Deep knowledge and forward-thinking strategies fuel creative,
                                high-impact solutions tailored for long-term success.
                            </p>
                            <a href="/service.html" class="custom-btn get-qucte-btn">
                                <div class="get-arrow-icon">
                                    <i class="fas fa-arrow-up"></i>
                                </div>
                                <p>Learn More</p>
                            </a>
                        </div>
                        <div class="silder-img">
                            <img src="{{ asset('assets/frontend/images/silder-3.png') }}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hero-item">
                        <div class="hero-content">
                            <h1 class="hero-title">Collaboration & Impact</h1>
                            <p>
                                Close partnerships to craft result-driven strategies that
                                create lasting, meaningful, measurable change.
                            </p>
                            <a href="/service.html" class="custom-btn get-qucte-btn">
                                <div class="get-arrow-icon">
                                    <i class="fas fa-arrow-up"></i>
                                </div>
                                <p>Learn More</p>
                            </a>
                        </div>
                        <div class="silder-img">
                            <img src="{{ asset('assets/frontend/images/silder-4.png') }}" alt="" />
                        </div>
                    </div>
                </div>
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
                        <div class="swiper-slide">
                            <div class="company-logo-item">
                                <img src="{{ asset('assets/frontend/images/company-logo/8.png') }}" alt="" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="company-logo-item">
                                <img src="{{ asset('assets/frontend/images/company-logo/1.png') }}" alt="" />
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="company-logo-item">
                                <img src="{{ asset('assets/frontend/images/company-logo/gpallc_logo.png') }}"
                                    alt="" />
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="company-logo-item">
                                <img src="{{ asset('assets/frontend/images/company-logo/9.png') }}" alt="" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="company-logo-item">
                                <img src="{{ asset('assets/frontend/images/company-logo/10.png') }}" alt="" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="company-logo-item">
                                <img src="{{ asset('assets/frontend/images/company-logo/11.png') }}" alt="" />
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="company-logo-item">
                                <img src="{{ asset('assets/frontend/images/company-logo/4.png') }}" alt="" />
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="company-logo-item">
                                <img src="{{ asset('assets/frontend/images/company-logo/5.png') }}" alt="" />
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="company-logo-item">
                                <img src="{{ asset('assets/frontend/images/company-logo/6.png') }}" alt="" />
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="company-logo-item">
                                <img src="{{ asset('assets/frontend/images/company-logo/7.png') }}" alt="" />
                            </div>
                        </div>
                    </div>
                    <!-- <div class="swiper-pagination"></div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- ============= Count Down Section ============= -->
    <!-- <section class="count-down">
                                        <div class="container">
                                          <div class="row">
                                            <div class="col-lg-3 col-md-3 col-6">
                                              <div class="count-down-item">
                                                <h2 class="count" data-target="834.0M">0.0M</h2>
                                                <p>Years of Experience</p>
                                              </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-6">
                                              <div class="count-down-item">
                                                <h2 class="count" data-target="732.0M">0.0M</h2>
                                                <p>Constituents Served</p>
                                              </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-6">
                                              <div class="count-down-item">
                                                <h2 class="count" data-target="90.0M">0.0M</h2>
                                                <p>Project $ Saved</p>
                                              </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-6">
                                              <div class="count-down-item">
                                                <h2 class="count" data-target="236.0M">0.0M</h2>
                                                <p>Project Complete</p>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </section> -->

    <!-- ============= Count Down Section End ============= -->

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
                            <form action="">
                                <div class="input-fuild-item">
                                    <input type="text" placeholder="Name*" name="name" required />
                                </div>
                                <div class="input-fuild-item">
                                    <input type="text" placeholder="Company Name" name="name" />
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

                                <a class="custom-btn get-qucte-btn" href="mailto:amandah@alignedglobalnetwork.com">
                                    <div class="get-arrow-icon">
                                        <i class="fas fa-arrow-up"></i>
                                    </div>
                                    <p>Submit Request</p>
                                </a>
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



    <!-- Lets Talk Modal -->
    <div class="modal fade" id="subscriber" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Subscribe</h5>
                    <button type="button" class="btn btn-default close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group pt-2">
                            <label for="from-email" class="pb-1">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" id="from-email" placeholder="example@gmail.com"
                                name="email">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info btn-sm text-light">Submit</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Lets Talk Modal -->

@endsection


@push('page-js')
@endpush
