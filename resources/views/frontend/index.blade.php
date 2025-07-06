@extends('frontend.layouts.master')

@section('content')
    


        <!-- About  Start -->
        @include('frontend.partials.about')
        <!-- About End -->

        <!-- Services Start -->
        @include('frontend.partials.services')
        <!-- Services End -->

      

        <!-- FAQs Start -->
        @include('frontend.partials.faqs')
        <!-- FAQs End -->


        <!-- Team Start -->
       @include('frontend.partials.team')
        <!-- Team End -->

        <!-- Testimonial Start -->
        @include('frontend.partials.testimonial')
        <!-- Testimonial End -->

@endsection