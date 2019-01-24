<footer class="gs-footer">
  <div class="gs-footer-top-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="about-h3aw gs-footer-widget">
            $SiteConfig.FooterContent
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="cat-h3aw gs-footer-widget">
            <h4 class="title">Categories</h4>
            <ul class="cat-list">
              <% loop Categories %>
              <li><a title="$Title" href="$Link"><span><i class="fas fa-long-arrow-alt-right"></i></span> $Title</a></li>
              <% end_loop %>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="news-h3aw gs-footer-widget">
            <h4 class="title">Blog</h4>
            <ul class="lat-news">
              <% loop LatestPosts %>
              <li><a href="$Link" title="$Title">
                <span class="date"><span><i class="far fa-clock"></i></span> $PublishDate.DayOfMonth $PublishDate.ShortMonth, $PublishDate.Year</span>
                <span class="text">$Title</span>
                </a>
              </li>
              <% end_loop %>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="contact-h3aw gs-footer-widget">
            <h4 class="title">Contact Information</h4>
            <ul class="c-info">
              <% if $SiteConfig.EmailAddress %>
              <li><span><i class="fas fa-envelope"></i></span> $SiteConfig.EmailAddress</li>
              <% end_if %>
              <% if $SiteConfig.Telephone %>
              <li><span><i class="fas fa-phone"></i></span> <a href="tel:$SiteConfig.Telephone">$SiteConfig.Telephone</a></li>
              <% end_if %>
              <% if $SiteConfig.Address %>
              <li><span><i class="fas fa-map-marked-alt"></i></span> $SiteConfig.Address</li>
              <% end_if %>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="gs-footer-bottom-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="h3fb-left">
            <p><a href="$BaseHref">Greenstone Solutions Ltd</a> <br class="d-block d-sm-none" />&copy; $ThisYear. All Rights Reserved.</p>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
          <div class="h3fb-left text-center d-inline-block">
            <p><% loop FooterPages %>
              <a href="$Link" title="$Title" class="gs-f-pages">$Title</a>
              <% end_loop %>
            </p>
          </div>
          <div class="h3fb-social d-inline-block">
            <ul>
              <% if $SiteConfig.FacebookUrl %>
              <li><a href="$SiteConfig.FacebookUrl" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
              <% end_if %>
              <% if $SiteConfig.TwitterUrl %>
              <li><a href="$SiteConfig.TwitterUrl" target="_blank"><i class="fab fa-twitter"></i></a></li>
              <% end_if %>
              <% if $SiteConfig.LinkedInUrl %>
              <li><a href="$SiteConfig.LinkedInUrl" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
              <% end_if %>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>