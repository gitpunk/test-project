@extends('layouts.app')

@section('content')

@php
  $post_args = array(
    'posts_per_page' => 100,
    'order' => 'ASC'
  );

  $rp = new WP_Query($post_args);
@endphp

    <header class="bg-dark hero_img_1 text-white center-text" <?php if (get_field('header_bg_img')) : ?> style="background: linear-gradient(rgba(36, 21, 3, 0.5), rgba(36, 21, 3, 0.5)), url(<?php the_field('header_bg_img'); endif ?>);">
      <div class="container text-center">
        @if (get_field('header_title')) 
          <h1>{{the_field('header_title')}}</h1>
        @else <h1>Welcome to Chiang Mai</h1>
        @endif
      </div>
    </header>

    <main class="main">
      <section id="about" class="bg-brown text-white center-text">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <hr>
                @if (get_field('about_title')) 
                  <h2>{{the_field('about_title')}}</h2> 
                @else <h2>About Chiang Mai</h2>
                @endif            
                <hr>
                @if (get_field('about_text')) 
                  {{the_field('about_text')}} 
                @else 
                  <p class="lead">Chiang Mai is a land of misty mountains and colourful hill tribes, a playground for seasoned travellers, a paradise for shoppers and a delight for adventurers.</p>
                  <p>On a trip to Chiang Mai, the curious traveller can expand their horizons with Thai massage and cooking courses. Others will be bowled over by the variety of handicrafts and antiques. The wild child will find plenty of lively nightlife, and the epicure can indulge in wonderful cuisine. Despite its relatively small size, Chiang Mai truly has it all.</p>
                  <p>Located 700 km (435 miles) north of Bangkok in a verdant valley on the banks of the Ping River, Chiang Mai was founded in 1296 as the capital of the ancient Lanna Kingdom. Today it is a place where past and the present seamlessly merge with modern buildings standing side by side with venerable temples. Not convinced yet?</p>
                @endif
            </div>
          </div>
        </div>
      </section>

      <section id="first-time" class="center-text text-white">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 m-auto">
              <hr>
                @if (get_field('first_time_title')) 
                  <h2>{{the_field('first_time_title')}}</h2>
                @else <h2>First Time in Chiang Mai?</h2>
                @endif     
                <hr>
                @if (get_field('first_time_text')) 
                  {{the_field('first_time_text')}} 
                @else 
                  <p class="lead">There is so much to see and do around Chiang Mai that it can seem a little overwhelming to first-time visitors. To simplify things, we’ve selected the absolute best of the best around the so-called ‘Rose of the North’. This includes the must-see attractions, must-try restaurants, the most comfortable hotels and the best places to go bargain hunting. We’re confident that our concise guides will give you all the information you need to plan a fantastic stay in Chiang Mai.</p>
                @endif
            </div>
          </div>
        </div>
        @if (get_field('first_time_background_image')) 
          <img class="col-md-12 no_padding" src="<?php the_field('first_time_background_image') ?>">
        @else <img class="col-md-12 no_padding" src="@asset('images/hero3.jpg')">
        @endif
      </section>

      <section id="ten-things" class="sectionNoBG text-white">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 mrx-auto">
              @if (get_field('things_to_do_title')) 
                  <h2>{{the_field('things_to_do_title')}}</h2>
                @else <h2>What can you do in Chiang Mai?</h2>
              @endif

              @if (get_field('things_to_do_text')) 
                  {{the_field('things_to_do_text')}} 
              @else     
              <p class="lead">There is so much to see and do around Chiang Mai that it can seem a little overwhelming to first-time visitors. To simplify things, we’ve selected the absolute best of the best around the so-called ‘Rose of the North’. This includes the must-see attractions, must-try restaurants, the most comfortable hotels and the best places to go bargain hunting. We’re confident that our concise guides will give you all the information you need to plan a fantastic stay in Chiang Mai.</p>
              @endif
              
              <ol>
                @if($rp->have_posts())
                    @while($rp->have_posts()) @php($rp->the_post())

                      @include('partials.content-list')

                    @endwhile
                    @php(wp_reset_postdata())
                @endif
              </ol>
            </div>
          </div>
        </div>
        @if (get_field('things_to_do_background_image')) 
          <img class="col-md-12 no_padding" src="<?php the_field('things_to_do_background_image') ?>">
        @else <img class="col-md-12 no_padding" src="@asset('images/hero4.jpg')">
        @endif
      </section>
    </main>

    <section id="tenthings-index" class="bg-light">

    <div class="container">
      <!-- Example row of columns -->
      <h2>{!! wp_count_posts()->publish !!} Best things to do in Chiang Mai</h2>
      <div class="row">

        @if($rp->have_posts())
          @while($rp->have_posts()) @php($rp->the_post())

            @include('partials.content-'.get_post_type())

          @endwhile
          @php(wp_reset_postdata())
        @else
          <div class="alert alert-warning">
            {{ __('Sorry, no results were found.', 'sage') }}
          </div>
          {!! get_search_form(false) !!}
        @endif

      </div>

    </div>
    <!-- /container -->
  </section>

  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          @if (get_field('contact_title')) 
            <h2>{{the_field('contact_title')}}</h2>
            @else <h2>Contact us</h2>
          @endif

          @if (get_field('contact_text')) 
              {{the_field('contact_text')}} 
          @else 
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero odio fugiat voluptatem dolor, provident officiis,
              id iusto! Obcaecati incidunt, qui nihil beatae magnam et repudiandae ipsa exercitationem, in, quo totam.</p>
          @endif
        </div>
      </div>
    </div>
  </section>

  {!! get_the_posts_navigation() !!}
@endsection
