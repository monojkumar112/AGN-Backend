@extends('layouts.frontend.master')
@section('page-title', 'index')
@push('page-css')
@endpush
@section('page-content')
    <section class="team strategic-advisor" id="advisor">
        <div class="container">
            <div class="team-header">
                <p>/ Meet Our Team /</p>
                <h1>Advisory Solutions</h1>
            </div>
            <div class="team-card-items">
                @foreach ($advisorys as $advisory)
                    <div class="team-card-item-advisory">
                        <div class="team-logo">
                            <img src="{{ asset($advisory->logo) }}" alt="Aligned Global Network" />
                        </div>
                        <div class="team-content-advisory">
                            <div class="team-details">
                                <img src="{{ asset($advisory->image) }}" alt="Amanda Hill-Attkisson"
                                    class="team-profile-pic" />
                                <a href="#" class="team-name">{{ $advisory->name }}</a>
                                <h4>{{ $advisory->designation }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ========== technology ============== -->
    <section class="technology" id="technology">
        <div class="container">
            <div class="team-header">
                <p>/ Meet Our Technology Team /</p>
                <h1>Technology Enablement</h1>
            </div>
            <div class="team-card-items">
                @foreach ($technologys as $technology)
                    <div class="team-card-item-advisory">
                        <div class="team-logo">
                            <img src="{{ asset($technology->logo) }}" alt="Aligned Global Network" />
                        </div>
                        <div class="team-content-advisory">
                            <div class="team-details">
                                <img src="{{ asset($technology->image) }}" alt="Amanda Hill-Attkisson"
                                    class="team-profile-pic" />
                                <a href="#" class="team-name">{{ $technology->name }}</a>
                                <h4>{{ $technology->designation }}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ========== events ============== -->
    <section class="events" id="events">
        <div class="container">
            <div class="team-header">
                <p>/ Meet Our Events Team /</p>
                <h1>Event Services</h1>
            </div>
            <div class="team-card-items">
                @foreach ($events as $event)
                    <div class="team-card-item-advisory">
                        <div class="team-logo">
                            <img src="{{ asset($event->logo) }}" alt="Aligned Global Network" />
                        </div>
                        <div class="team-content-advisory">
                            <div class="team-details">
                                {{-- <img src="{{ asset($event->image) }}" alt="Amanda Hill-Attkisson"
                                    class="team-profile-pic" /> --}}
                                <a class="team-name">{{ $event->name }}</a>
                                {{-- <h4>{{ $event->designation }}</h4> --}}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection


@push('page-js')
@endpush
