<% include BreadCrumbs %>
<div class="shortcode-title">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
        <div class="section-title">
          $Content
        </div>
      </div>
    </div>
  </div>
</div>

<% if $ActiveJobs %>
<div class="sc-service-style4">
  <div class="container">
    <div class="row">
      <% loop ActiveJobs %>
      <div class="col-lg-6 col-12">
        <div class="jtc-box">
          <a class="gs-job-link-title" href="$Link" title="$Title"><div class="icon">
            <span class="flaticon-language"></span>
          </div></a>
          <div class="content">
            <h4 class="title"><a class="gs-job-link-title" href="$Link" title="$Title">$Title</a></h4>
            <p class="text">$ShortDescription</p>
          </div>
        </div>
      </div>
      <% end_loop %>
    </div>
  </div>
</div>
<% end_if %>
