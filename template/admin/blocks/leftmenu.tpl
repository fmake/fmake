<div class="filters">
	<ul class="menu-left">
		[[for child in menu[0]['child']]]
			<li>
				<a href="/admin/{child.redir}/" class="menu-left-main active" rel="{loop.index}" >{child.caption}</a>
				<ul class="child-left" id="child-left-{loop.index}">
					[[for ch in child['child']]]
						<li>
							<a href="/admin/{ch.redir}/">{ch.caption}</a>
						</li>
					[[endfor]]
				</ul>
			</li>
		[[endfor]]
	</ul>
</div>