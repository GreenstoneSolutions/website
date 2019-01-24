<div class="menu">
  <nav id="mobile_menu_active">
    <ul>
      <% loop $Menu(1) %>
        <li class="$LinkingMode"><a href="$Link" title="$Title.XML">$MenuTitle.XML <% if $Top.HasActiveJobs && ClassName == "Nydinum\Pages\JobHolderPage" %><span class="badge badge-pill gs-badge">Hiring!</span><% end_if %></a>
        </li>
      <% end_loop %>
    </ul>
  </nav>
</div>