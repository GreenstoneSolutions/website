<% include HtmlHead %>
<body class="$ClassName.ShortName<% if not $Menu(2) %> no-sidebar<% end_if %>" <% if $i18nScriptDirection %>dir="$i18nScriptDirection"<% end_if %>>
<% include Header %>
<% include BreadCrumbs %>
  <div class="shortcode-title standard-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
          <div class="section-title">
            <h2>Change Password</h2>
            <div class="security-form">$Form</div>
          </div>
        </div>
      </div>
    </div>
  </div>
<% include Footer %>
</body>
</html>