<article id="thing-{{ the_ID() }}" {{ post_class('col-md-6 bg-white border') }}>
  <figure class="featured-img">
    {{ the_post_thumbnail('crave-index') }}
  </figure>
  <h4><?php $count = 0; $count++; echo $count ?>. {{ get_the_title() }}</h4>
  @php(the_content())
</article>