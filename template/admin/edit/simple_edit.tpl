[[ extends  TEMPLATE_PATH ~ "admin/main.tpl" ]]


[[ block left ]]
	
[[endblock]]

[[block center_all]]	
	<div class="center-content-all">
	[[block sub_menu]]
		{parent()}
	[[endblock]]
						<br />
						<div class="navigation" >
							<a href="/">Главная</a> / 
							[[for men in menu]]
								[[if men['status'] ]]
									<a href="./index.php?modul={men['redir']}">{men['caption']}</a> / 
								[[endif]]
							[[endfor]]
						</div>
 						

					 	<div class="page-content" >
							<table class="rt" >
								<tr>
									<td  class="rt-tl"></td>

									<td class="rt-tc" ></td>
									<td class="rt-tr" ></td>
								</tr>
								<tr>
									<td class="rt-ml"></td>
									<td class="rt-mc">
										[[ autoescape false ]]
										{ content }
										[[ endautoescape ]]
									<td class="rt-mr" ></td>
									</tr>
									<tr>

										<td class="rt-bl"></td>
										<td class="rt-bc" ></td>
										<td class="rt-br" ></td>
									</tr>
								</table>
								
					
							
								
							</div>

										
										
	</div>
[[endblock]]