<% include BreadCrumbs %>
<div class="shortcode-title">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
        <div class="section-title">
          <% if Success %> $Message.ThankYouMessage <% end_if %>
          <% if not $Success %>
            $Content
            $ContactUsForm 
          <% end_if %>
        </div>
      </div>
    </div>
  </div>
</div>