@extends('layouts.frontend.master')
@section('page-title', 'index')
@push('page-css')
@endpush
@section('page-content')

    <div class="strategic-page">
        <section class="our-service-about our-service">
            <div class="container">
                <div class="our-service-wrapper">
                    <div class="our-service-header-about">
                        <div class="our-service-left">
                            <h4>Mission</h4>
                        </div>
                    </div>
                    <div class="our-service-content">
                        <p>
                            At Aligned Global Network, our mission is to empower
                            organizations through complex, project-based initiatives by
                            providing expert advice and solutions.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- <div class="help-bg">
                                                <div class="help-bg-item"></div>
                                              </div> -->
        <section class="oour-service-about our-service-about-tow our-service cpb-0">
            <div class="container">
                <div class="our-service-wrapper">
                    <div class="our-service-header-about">
                        <div class="our-service-left">
                            <h4>Vision</h4>
                        </div>
                    </div>
                    <div class="our-service-content">
                        <p>
                            Our vision is to shape a future defined by transformative,
                            sustainable impact. We strive to help organizations navigate
                            challenges and seize opportunities by partnering with visionary
                            leaders to craft innovative, results-driven strategies that fuel
                            sustainable growth and create lasting change across sectors and
                            regions in an increasingly interconnected world. We rise by
                            lifting others.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- <div class="help-bg">
                                                <div class="help-bg-item"></div>
                                              </div> -->
        <section class="our-service-about our-service">
            <div class="container">
                <div class="our-service-wrapper">
                    <div class="our-service-header-about">
                        <div class="our-service-left">
                            <h4>Values</h4>
                        </div>
                    </div>
                    <div class="our-service-content">
                        <ul>
                            <li>
                                These values reflect AGN's approach to providing high-level
                                strategic solutions, focusing on long-term impact, and
                                fostering collaboration to drive success.
                            </li>
                            <li class="mt-2">
                                <b> Excellence:</b> A dedication to the highest standards of
                                quality in both strategy and execution.
                            </li>
                            <li>
                                <b>Expertise & Innovation:</b> Deep knowledge and
                                forward-thinking strategies fuel creative, high-impact
                                solutions tailored for long-term success.
                            </li>
                            <li>
                                <b>Collaboration & Impact:</b> Close partnerships to craft
                                result-driven strategies that create lasting, meaningful,
                                measurable change.
                            </li>
                            <!-- <li>
                                                            <b> Innovation </b> – Constant focus on developing creative
                                                            and forward-thinking strategies.
                                                          </li>

                                                          <li>
                                                            <b> Impact </b>– A focus on delivering measurable, meaningful
                                                            change in organizations and across sectors.
                                                          </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>



    <!-- ========== team ============== -->
    <section class="team" id="team">
        <div class="container">
            <div class="team-header">
                <p>/ Meet Our Team /</p>
                <h1>Our Leadership Team</h1>
            </div>
            <div class="team-card-items">
                @foreach ($leaderships as $leadership)
                    <div class="team-card-item">
                        <div class="team-img">
                            <img src="{{ asset($leadership->image) }}" alt="" />
                        </div>
                        <div class="team-content">
                            <div class="team-details">
                                <a href="#" class="team-name">{{ $leadership->name }}</a>
                                <h5 class="team-short-title">{{ $leadership->designation }}</h5>
                                <h4>
                                    {{ $leadership->short_description }}
                                </h4>
                            </div>
                            <!-- <a href="#" class="team-website">miye@example.com</a> -->
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection


@push('page-js')
@endpush
