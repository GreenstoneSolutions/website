<% if $MoreThanOnePage %>
	<ul class="pagination">
		<% if $NotFirstPage %>
			<li class="page-item"><a class="page-link" title="Previous" href="{$PrevLink}">&larr;</a></li>
		<% end_if %>

		<% loop $PaginationSummary(4) %>
			<% if $CurrentBool %>
				<li class="page-item"><a class="page-link no-event">$PageNum</a></li>
			<% else %>
				<% if $Link %>
					<li class="page-item"><a class="page-link" href="$Link">$PageNum</a></li>
				<% else %>
					<span>...</span>
				<% end_if %>
			<% end_if %>
		<% end_loop %>

		<% if $NotLastPage %>
			<li class="page-item"><a class="page-link" title="Next" href="{$NextLink}">&rarr;</a></li>
		<% end_if %>
	</ul>
<% end_if %>
