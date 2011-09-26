<div class="h-menu">
	<div class="inner">
			<table>
				<tr>
					[[for men in menu]]
					<td>
						
						<a href="./?modul={men['redir']}" title="{men['caption']}" 
							[[if men['status']]] class="active" [[endif]]
						  >
						
							<div class="content-icon" [[if men.icons]]style="background: url(/images/icons/{men.icons}) no-repeat;"[[endif]]></div>
							{men['caption']}
						</a>
						
					</td>
					[[endfor]]
				</tr>
				</table>
	</div>
</div>