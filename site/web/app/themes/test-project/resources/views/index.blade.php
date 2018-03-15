@extends('layouts.app')

@section('content')

    <header class="bg-dark hero_img_1 text-white center-text">
      <div class="container text-center">
        <h1>Welcome to Chiang Mai</h1>
      </div>
    </header>

    <main class="main">
      <section id="about" class="bg-brown text-white center-text">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <hr>
              <h2>About Chiang Mai</h2>
              <hr>
              <p class="lead">Chiang Mai is a land of misty mountains and colourful hill tribes, a playground for seasoned travellers, a paradise for shoppers and a delight for adventurers.</p>
              <p>On a trip to Chiang Mai, the curious traveller can expand their horizons with Thai massage and cooking courses. Others will be bowled over by the variety of handicrafts and antiques. The wild child will find plenty of lively nightlife, and the epicure can indulge in wonderful cuisine. Despite its relatively small size, Chiang Mai truly has it all.</p>
              <p>Located 700 km (435 miles) north of Bangkok in a verdant valley on the banks of the Ping River, Chiang Mai was founded in 1296 as the capital of the ancient Lanna Kingdom. Today it is a place where past and the present seamlessly merge with modern buildings standing side by side with venerable temples. Not convinced yet?</p>
            </div>
          </div>
        </div>
      </section>

      <section id="first-time" class="center-text text-white">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 m-auto">
              <hr>
              <h2>First Time in Chiang Mai?</h2>
              <hr>
              <p class="lead">There is so much to see and do around Chiang Mai that it can seem a little overwhelming to first-time visitors. To simplify things, we’ve selected the absolute best of the best around the so-called ‘Rose of the North’. This includes the must-see attractions, must-try restaurants, the most comfortable hotels and the best places to go bargain hunting. We’re confident that our concise guides will give you all the information you need to plan a fantastic stay in Chiang Mai.</p>
            </div>
          </div>
        </div>
        <img class="col-md-12 no_padding" src="@asset('images/hero3.jpg')">
      </section>

      <section id="ten-things" class="sectionNoBG text-white">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 mrx-auto">
              <h2>What can you do in Chiang Mai?</h2>
              <p class="lead">There is so much to see and do around Chiang Mai that it can seem a little overwhelming to first-time visitors. To simplify things, we’ve selected the absolute best of the best around the so-called ‘Rose of the North’. This includes the must-see attractions, must-try restaurants, the most comfortable hotels and the best places to go bargain hunting. We’re confident that our concise guides will give you all the information you need to plan a fantastic stay in Chiang Mai.</p>
              
              <ol>
                @while (have_posts()) @php(the_post())
                @include('partials.content-list')
                @endwhile
              </ol>
            </div>
          </div>
        </div>
        <img class="col-md-12 no_padding" src="@asset('images/hero4.jpg')">
      </section>
    </main>

    <section id="tenthings-index" class="bg-light">

    <div class="container">
      <!-- Example row of columns -->
      <h2>{!! wp_count_posts()->publish !!} Best things to do in Chiang Mai</h2>
      <div class="row">

        @if (!have_posts())
          <div class="alert alert-warning">
            {{ __('Sorry, no results were found.', 'sage') }}
          </div>
          {!! get_search_form(false) !!}
        @endif

        @while (have_posts()) @php(the_post())
        @include('partials.content-'.get_post_type())
        @endwhile

      </div>

    </div>
    <!-- /container -->
  </section>

  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2>Contact us</h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero odio fugiat voluptatem dolor, provident officiis,
            id iusto! Obcaecati incidunt, qui nihil beatae magnam et repudiandae ipsa exercitationem, in, quo totam.</p>
        </div>
      </div>
    </div>
  </section>

  {!! get_the_posts_navigation() !!}
@endsection
