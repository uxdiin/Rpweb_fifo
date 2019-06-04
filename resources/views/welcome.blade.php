@extends('layouts.base')

@section('content')
 
 <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 ">fifo</h1>
        @auth
        <h2 class="text-white-50 mx-auto mt-2 mb-5">Thank you for joining Let's have a tutorial</h2>
        <a href="{{route('users.tutorial')}}" class="btn btn-secondary " style="border-radius:24px">Tutorial</a>
        @else
        <h2 class="text-white-50 mx-auto mt-2 mb-5">find and found your and other's thing</h2>
        <a href="{{route('register')}}" class="btn btn-secondary " style="border-radius:24px">Join Now</a>
        @endauth
      </div>
    </div>
  </header>
 
  <section id="about" class="projects-section bg-white">
    <div class="container">

     <div class="row justify-content-center no-gutters bg-dark">
        <div class="col-lg-6" >
          <img class="img-fluid" src="img/BG1.jpg" alt="" style=" box-shadow: 5px 10px 8px #888888;">
        </div>
        <div class="col-lg-6 order-lg-first">
          <div class="text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-left text-white">
                <h4>Temukan.</h4>
                <h2>Temukan Barang Anda</h2>
                <p class="mb-0">Disini tidak hanya anda yang mencari barang anda komunitas ini akan membantu menemukan barang anda yang hilang .</p>
                <hr class="d-none d-lg-block mb-0 mr-0">
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="row justify-content-center no-gutters mb-5 mb-lg-0 bg-white ">
        <div class="col-lg-6" >
          <img class="img-fluid rounded " src="img/c-1.png" alt="" style=" box-shadow: 5px 10px 8px #888888;" >
        </div>
        <div class="col-lg-6 order-lg-first" >
          <div class="text-center h-100 project">
            <div class="d-flex h-100">
              <div class="project-text w-100 my-auto text-center text-lg-left text-black">
                <h4>Bantu.</h4>
                <h2>Saling Membantu</h2>
                <p class="mb-0">Saling membantu adalah kunci dari selesainya suatu masalah dengan bantuan web ini anda akan sangat mudah membantu orang untuk menemukan barangnya yang hilang</p>
                <hr class="d-none d-lg-block mb-0 ml-0">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="signup" class="signup-section">
    <div class="container">
      <div class="row">
      </div>
    </div>
  </section>

  <section class="contact-section bg-black">
    <div class="container">

      <div class="row">

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-map-marked-alt text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Address</h4>
              <hr class="my-4">
              <div class="small text-black-50">4923 Market Street, Orlando FL</div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-envelope text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Email</h4>
              <hr class="my-4">
              <div class="small text-black-50">
                <a href="#">hello@yourdomain.com</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-mobile-alt text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Phone</h4>
              <hr class="my-4">
              <div class="small text-black-50">+1 (555) 902-8832</div>
            </div>
          </div>
        </div>
      </div>

      <div class="social d-flex justify-content-center">
        <a href="#" class="mx-2">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="mx-2">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#" class="mx-2">
          <i class="fab fa-github"></i>
        </a>
      </div>

    </div>
  </section>
  @endsection