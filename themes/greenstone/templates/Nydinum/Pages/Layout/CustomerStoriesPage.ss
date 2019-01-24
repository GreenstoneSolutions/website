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
<div class="how-to-area-customer-stories">
  <div class="container">
    <div class="row">
      <% loop CustomerStories %>
      <div class="col-lg-6 col-md-6 col-sm-12 col-12 $EvenOdd col-pos-$Pos">
        <div class="how-to-content">
          <div class="section-title">
            <h2>$Title</h2>
          </div>
          <div class="how-to-box content">
            $Description
          </div>
        </div>
      </div>
      <% end_loop %>
    </div>
  </div>
</div>