  <!-- breadcumb-area-start -->
  <div class="breadcumb-area bg-with-black">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <div class="breadcumb">
                      <ul class="links">
                          <% if $Pages %>
                            <% loop $Pages %>
                                <% if $Last %>$Title.XML<% else %><li><a href="$Link">$MenuTitle.XML</a> &raquo;</li><% end_if %>
                            <% end_loop %>
                          <% end_if %>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
    <!-- breadcumb-area-end -->