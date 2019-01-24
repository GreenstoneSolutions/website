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
          <h2><% if $ArchiveYear %>
            <%t SilverStripe\\Blog\\Model\\Blog.Archive 'Archive' %>:
            <% if $ArchiveDay %>
            $ArchiveDate.Nice
            <% else_if $ArchiveMonth %>
            $ArchiveDate.format('MMMM, y')
            <% else %>
            $ArchiveDate.format('y')
            <% end_if %>
            <% else_if $CurrentTag %>
            <%t SilverStripe\\Blog\\Model\\Blog.Tag 'Tag' %>: $CurrentTag.Title
            <% else_if $CurrentCategory %>
            <%t SilverStripe\\Blog\\Model\\Blog.Category 'Category' %>: $CurrentCategory.Title
            <% else %>
            $Title
            <% end_if %>
          </h2>
          $Content
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
          <% if $PaginatedList.Exists %>
          <% loop $PaginatedList %>
          <div class="single-page-blog">
            <div class="bimg">
              <% if $FeaturedImage %>
              <a href="$Link">
              $FeaturedImage.ScaleWidth(795)
              <span class="icon"><i class="fas fa-link"></i></span>
              </a>
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
                  <% if $MyCategories %> 
                  <div class="business">
                    <p><span><i class="fas fa-tags"></i></span> <% loop $MyCategories %>
                      <a href="$Link" title="$Title">$Title</a> <% if not Last %>, <% end_if %>
                      <% end_loop %>
                    </p>
                  </div>
                  <% end_if %>
                </div>
              </div>
              $Excerpt <br/><br/>
              <a class="more" href="$Link">Read More <span><i class="fas fa-angle-right"></i></span></a>
            </div>
          </div>
          <% end_loop %>
          <% else %>
          <p><%t SilverStripe\\Blog\\Model\\Blog.NoPosts 'There are no posts' %></p>
          <% end_if %>
          <% with $PaginatedList %>
          <% include SilverStripe\\Blog\\Pagination %>
          <% end_with %>
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
          <% if $Categories %>
          <div class="sdsw-links sd-sidebar-widget">
            <h4 class="title">Categories</h4>
            <ul class="links">
              <% loop $Categories %>
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