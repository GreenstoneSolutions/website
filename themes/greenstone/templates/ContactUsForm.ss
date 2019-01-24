<form $FormAttributes>
  <div class="row">
    $Fields.dataFieldByName(SecurityID)
    <div class="col-lg-6 col-sm-6 col-12">
    <div class="cf-box">
      $Fields.dataFieldByName(Name)
    </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-12">
    <div class="cf-box">
      $Fields.dataFieldByName(Email)
    </div>
    </div>
    <div class="col-lg-12 col-sm-12 col-12">
    <div class="cf-box">
      $Fields.dataFieldByName(Message)
    </div>
    </div>
    <div class="col-lg-12 col-sm-12 col-12">
    <div class="cf-box">
      <% loop $Actions %>$Field<% end_loop %>
    </div>
    </div>
  </div>
</form>