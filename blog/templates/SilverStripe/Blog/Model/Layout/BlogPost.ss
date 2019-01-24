<div class="breadcumb-area bg-with-black">
  <div class="container">
    <div class="row">
      <div class="col-12"></div>
    </div>
  </div>
</div>
<div class="shortcode-title">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
        <div class="section-title">
          <h2>$Title</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="page-blog-area">
  <div class="container">
    <div class="row">

      <div class="col-lg-8 col-sm-12 col-12">
        <div class="page-blog">
          <div class="single-page-blog">
            <div class="bimg">
              <% if $FeaturedImage %>
              $FeaturedImage.ScaleWidth(795)
              <% end_if %>
            </div>
            <div class="content">
              <h4 class="title"><a href="$Link" title="$Title">$Title</a></h4>
              <div class="meta">
                <div class="author">
                  <div class="name">
                    <p>by <% loop $Credits %> <% if $First %><strong>$Name.XML</strong><% end_if %> <% end_loop %></p>
                  </div>
                </div>
                <div class="date">
                  <p><span><i class="far fa-calendar-alt"></i></span> $PublishDate.ShortMonth $PublishDate.DayOfMonth $PublishDate.Year</p>
                </div>
                <div>
                  <% if $Categories %>
                  <div class="business">
                    <p><span><i class="fas fa-tags"></i></span> <% loop $Categories %>
                      <a href="$Link" title="$Title">$Title</a> <% if not Last %>, <% end_if %>
                      <% end_loop %>
                    </p>
                  </div>
                  <% end_if %>
                </div>
              </div>
              $Content
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4 col-md-12 col-sm-12 col-12">
        <div class="sd-sidebar">
          <div class="sdsw-links sd-sidebar-widget">
            <% if $FeaturedPosts %>
            <h4 class="title">Latest Posts</h4>
            <ul class="links">
              <% loop $FeaturedPosts %>
              <li><a href="$Link" title="$Title"><span><i class="fas fa-angle-right"></i></span> $Title</a></li>
              <% end_loop %>
            </ul>
            <% end_if %>
          </div>
          <% if $AllCategories %>
          <div class="sdsw-links sd-sidebar-widget">
            <h4 class="title">Categories</h4>
            <ul class="links">
              <% loop $AllCategories %>
              <li><a href="$Link" title="$Title"><span><i class="fas fa-angle-right"></i></span> $Title</a></li>
              <% end_loop %>
            </ul>
          </div>
          <% end_if %>
          <% if Tags %>
          <div class="sdsw-tags sd-sidebar-widget">
            <h4 class="title">Tags</h4>
            <ul class="tags">
              <% loop $Tags %>
              <li>
                <a href="$Link" title="$Title">$Title</a>
              </li>
              <% end_loop %>
            </ul>
          </div>
          <% end_if %>
        </div>
      </div>

    </div>
  </div>
</div>