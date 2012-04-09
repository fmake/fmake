[[ include TEMPLATE_PATH ~ "blocks/header.tpl"]]

<body>
	<!-- PAGE -->
	<div id="page">
		<div class="p-inner">
			<!-- HEADER -->
			<div id="head">
				<!-- logo -->
				<a href="/" title="{hostname}" id="logo" ><img src="/images/logo.png" /></a>
				 
				
				<div id="social-top" >	
					<a href="http://facebook.com" target="_blank">
						<img src="/images/icon-facebook.gif" alt="The Facebook" />
					</a>
					<a href="http://twitter.com" target="_blank">
						<img src="/images/icon-twitter.gif" alt="Twitter" />
					</a>
					<a href="mailto: info@onlite.ws" target="_blank">
						<img src="/images/icon-mail.gif" alt="" />
					</a>
				</div>

				[[ include TEMPLATE_PATH ~ "blocks/menu.tpl"]]

			</div><!-- HEADER -->
	
			<!-- CONTENT -->
			<div id="content">

	
				<!-- WRAPPER -->
				<div id="wrapper">
					[[block wrapper]]

					
					<!-- CENTER -->
					
					<div id="center" >
						
						[[get testInstall.test('/news/news2.tpl')]] 
						
					</div><!-- CENTER -->
					
	
				<div id="subfooter-mini"></div>
				
	<div id="bot-content" class="content-block">


	
	</div>
	
				[[endblock]]
				</div><!-- WRAPPER -->
	
				
	
				
			
			<!-- SUBFOOTER -->

				<div id="subfooter"></div>
			</div><!-- CONTENT -->
		
		</div>
	


	</div><!-- PAGE -->

	
</body>
</html>