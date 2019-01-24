<!-- slider-area-start -->
<% if HomeSliders %>
<div class="slider-area">
  <div class="pogoSlider" id="js-main-slider">
    <% loop HomeSliders %>
    <div class="pogoSlider-slide" data-transition="slide" data-duration="1000" style="background-image:url(<% if $BackgroundImage %>$BackgroundImage.Link <% end_if %>);">
      <div class="container">
        <div class="pss-box">
          <h3 class="title-m ">$FirstTitle</h3>
          <h2 class="title-b animated zoomIn">$SecondTitle</h2>
          <p class="text">$ShortDescription</p>
        </div>
      </div>
    </div>
    <% end_loop %>
  </div>
  <div class="to-down">
    <a class="smoothscroll" href="#_top_agency"><img src="$ThemeDir/images/to-down.png" alt=""></a>
  </div>
</div>
<% end_if %>
<!-- slider-area-end -->
<!-- top-agency-area-start -->
<div class="shortcode-title">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
        <div class="section-title">
          <h2>$KeyPointsHeadingText</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="sc-service-style1">
  <div class="container">
    <div class="row">
      <% loop HomeKeyPoints %>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="h2-service-box">
          <div class="icon">
            $IconClass
          </div>
          <div class="content">
            <h4 class="title">$Title</h4>
            <p class="text">$ShortDescription</p>
          </div>
        </div>
      </div>
      <% end_loop %>
    </div>
  </div>
</div>
<!-- top-agency-area-end -->
<!-- service-area-start -->
<% if HomeServices %>
<div class="service-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
        <div class="section-title">
          $ServicesHeadingText
        </div>
      </div>
    </div>
    <div class="service-carousel owl-carousel">
      <% loop HomeServices %>
      <div class="single-service">
        <div class="img">
          <% if $BackgroundImage %>
          <img src="$BackgroundImage.Link" alt="$Title" title="$Title" />
          <% end_if %>
        </div>
        <div class="content">
          <h2 class="title">$Title</h2>
          <p class="text">$ShortDescription</p>
        </div>
      </div>
      <% end_loop %>
    </div>
  </div>
</div>
<% end_if %>
<!-- service-area-end -->
<!-- verticals-area-start -->
<div class="shortcode-title verticals-home-page">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
        <div class="section-title">
          $SpecialisationsHeadingText
        </div>
      </div>
    </div>
  </div>
</div>
<div class="how-to-area">
  <% if $SpecialisationBackgroundImage %>
  <div class="how-to-banner" style="background-image:url($SpecialisationBackgroundImage.Link)"></div>
  <% else %>
  <div class="how-to-banner" style="background-image:url($ThemeDir/images/gs-standard-specialisation-bg.jpg)"></div>
  <% end_if %>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-6 col-md-8 offset-md-4 col-sm-12 col-12">
        <div class="how-to-content">
          <% loop HomeSpecialisations %>
          <div class="how-to-box">
            <div class="icon">
              $IconClass
            </div>
            <div class="content">
              <h5 class="name">$Title</h5>
              <p class="text">$ShortDescription</p>
            </div>
          </div>
          <% end_loop %>              
        </div>
      </div>
    </div>
  </div>
</div>
<!-- verticals-area-end -->

<% if HomeTestimonials %>
<!-- testimonial-area-start -->
<div class="shortcode-title testimonials-home-page">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
        <div class="section-title">
          <h2>$TestimonialHeadingText</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="testimonial-area bg-with-black" style="background-image:url(<% if $TestimonialBackgroundImage %>$TestimonialBackgroundImage.Link <% end_if %>);">
  <div class="container">
    <div class="testimonial-carousel owl-carousel">
      <% loop HomeTestimonials %> 
      <div class="testimonial-box">
        <div class="content">
          <h2 class="title">$ShortTitle</h2>
          <p class="text">$Description</p>
        </div>
        <% if Author %>
        <div class="author">
          <div class="details">
            <h4 class="name">$Author</h4>
            <% if AuthorJobTitle %>
            <p class="desg">$AuthorJobTitle</p>
            <% end_if %>
          </div>
        </div>
        <% end_if %>
      </div>
      <% end_loop %>
    </div>
  </div>
</div>
<!-- testimonial-area-end -->
<% end_if %>

<!-- blog-area-start -->
<div class="blog-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
        <div class="section-title">
          $NewsBlogHeadingText
        </div>
      </div>
    </div>
    <div class="blog-carousel owl-carousel">
      <% loop HomeBlogs %>
      <div class="single-blog">
        <div class="bimg">
          <a href="$Link" title="$Title">
          <% if $FeaturedImage %>
          $FeaturedImage.ScaleWidth(285)
          <% end_if %>
          </a>
        </div>
        <div class="content">
          <h4 class="title"><a href="$Link" title="$Title">$Title</a></h4>
          <p class="text">$Excerpt</p>
          <div class="meta">
            <div class="author">
              <div class="name">
                <p>by <% loop $Credits %> <% if $First %><strong>$Name.XML</strong><% end_if %> <% end_loop %> on <strong>$PublishDate.ShortMonth $PublishDate.DayOfMonth $PublishDate.Year</strong></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <% end_loop %>
    </div>
  </div>
</div>
<!-- blog-area-end -->