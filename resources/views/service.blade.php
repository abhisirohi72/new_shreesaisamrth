@extends('layouts.front_app')

@section('title', $title)

@section('content')
<!-- inner banner -->
<section class="inner-banner py-5">
    <div class="w3l-breadcrumb py-lg-5">
        <div class="container pt-5 pb-sm-4">
            <h4 class="inner-text-title font-weight-bold pt-sm-5 pt-4">Services</h4>
            <ul class="breadcrumbs-custom-path">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active"><i class="fas fa-angle-right mx-2"></i>Services</li>
            </ul>
        </div>
    </div>
</section>
<!-- //inner banner -->
<!-- home page service grids -->
<section class="home-services py-5" id="services">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:700px;">
            <h5 class="small-title mb-2">Best Services</h5>
            <h3 class="title-style">More than 30+ years we provide business consulting</h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="box-wrap">
                    <div class="icon">
                        <i class="fas fa-donate"></i>
                    </div>
                    <h4 class="number">01</h4>
                    <h4><a href="#url">Financial planing</a></h4>
                    <p>Lorem ipsum dolor sit amet sed consectetur adipisicing elit.
                        doloret quas saepe autem, dolor set.</p>
                    <a href="{{ route('service') }}" class="read">Read more</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-md-0 mt-4">
                <div class="box-wrap">
                    <div class="icon">
                        <i class="fas fa-marker"></i>
                    </div>
                    <h4 class="number">02</h4>
                    <h4><a href="#url">Training services</a></h4>
                    <p>Lorem ipsum dolor sit amet sed consectetur adipisicing elit.
                        doloret quas saepe autem, dolor set.</p>
                    <a href="{{ route('service') }}" class="read">Read more</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-lg-0 mt-4">
                <div class="box-wrap">
                    <div class="icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h4 class="number">03</h4>
                    <h4><a href="#url">Marketing services</a></h4>
                    <p>Lorem ipsum dolor sit amet sed consectetur adipisicing elit.
                        doloret quas saepe autem, dolor set.</p>
                    <a href="{{ route('service') }}" class="read">Read more</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-4">
                <div class="box-wrap">
                    <div class="icon">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <h4 class="number">04</h4>
                    <h4><a href="#url">Taxation services</a></h4>
                    <p>Lorem ipsum dolor sit amet sed consectetur adipisicing elit.
                        doloret quas saepe autem, dolor set.</p>
                    <a href="{{ route('service') }}" class="read">Read more</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-4">
                <div class="box-wrap">
                    <div class="icon">
                        <i class="fas fa-ruler-combined"></i>
                    </div>
                    <h4 class="number">05</h4>
                    <h4><a href="#url">Start Ups</a></h4>
                    <p>Lorem ipsum dolor sit amet sed consectetur adipisicing elit.
                        doloret quas saepe autem, dolor set.</p>
                    <a href="{{ route('service') }}" class="read">Read more</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-4">
                <div class="box-wrap">
                    <div class="icon">
                        <i class="fas fa-edit"></i>
                    </div>
                    <h4 class="number">06</h4>
                    <h4><a href="#url">Business Planning</a></h4>
                    <p>Lorem ipsum dolor sit amet sed consectetur adipisicing elit.
                        doloret quas saepe autem, dolor set.</p>
                    <a href="{{ route('service') }}" class="read">Read more</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //home page service grids -->

<!-- content block -->
<section class="w3l-content1 py-5">
    <div class="container py-md-5 py-sm-4 py-2">
        <div class="row py-4">
            <div class="col-lg-7">
                <h3 class="title-style text-white">We manage your business</span></h3>
                <p class="mt-4 text-light">Lorem ipsum dolor sit amet elit. Velit beatae
                    rem ullam dolore nisi esse quasi. Integer sit amet. Lorem ipsum dolor sit
                    amet elit.</p>
                <a href="{{ route('contact.us') }}" class="btn btn-style mt-md-5 mt-4">Contact Us</a>
            </div>
        </div>
    </div>
</section>
<!-- //content block -->

<!-- 3grids with bg-image section -->
<div class="w3l-homeblock3 py-5">
    <div class="container py-lg-5 py-md-4 py-2">
        <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:700px;">
            <h5 class="small-title mb-2">What we do?</h5>
            <h3 class="title-style">We take care of the Future!</h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="top-pic1">
                    <div class="card-body blog-details">
                        <span class="meta-value">Investment</span>
                        <a href="#blog" class="blog-desc">Strength solutions
                        </a>
                        <a href="#blog" class="btn btn-style-primary btn-style text-white mt-4">Read
                            More<i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-md-0 mt-4">
                <div class="top-pic2">
                    <div class="card-body blog-details">
                        <span class="meta-value">Strategy</span>
                        <a href="#blog" class="blog-desc">Business analytics
                        </a>
                        <a href="#blog" class="btn btn-style-primary btn-style text-white mt-4">Read
                            More<i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-lg-0 mt-4">
                <div class="top-pic3">
                    <div class="card-body blog-details">
                        <span class="meta-value"> Tax Consulting </span>
                        <a href="#blog" class="blog-desc">Stock investments
                        </a>
                        <a href="#blog" class="btn btn-style-primary btn-style text-white mt-4">Read
                            More<i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //3grids with bg-image section -->
@endsection
