[[ extends  TEMPLATE_PATH ~ "base/main.tpl" ]] 

[[block wrapper]]
	<!-- RIGHT -->
					[[ include TEMPLATE_PATH ~ "blocks/rightblock.tpl"]]
					<!-- RIGHT -->
					
					
					<!-- CENTER -->
					<div id="center" >
						<h1>{modul.caption}</h1>
						<div class="content">
							{compile(modul.text,_context)}
						</div>
					</div><!-- CENTER -->
	
	
				<div id="subfooter-mini"></div>	
[[endblock]]
