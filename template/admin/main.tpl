[[ include TEMPLATE_PATH ~ "admin/blocks/head.tpl" ]]

<body>
	<!-- PAGE -->
	<div class="page">
		<div class="p-inner">

			<!-- HEADER -->
			<div class="header bg">
				<div class="top_container" >
					
				</div>
				<!-- phone -->
				<div class="h-right-zone" >					
				</div>
				[[ include TEMPLATE_PATH ~ "admin/blocks/topmenu.tpl" ]]

				
				<!-- logo -->
				<a href="./" title="{hostname}" class="h-logo"   ><img src="/images/admin/logo.gif" alt="{hostname}" /> </a>
				
			<div class="user-info" >
				<div><a href="" ><img src="/images/admin/user-icon-mini.gif" /></a>  <a href="" >{admin.name}</a> (<a href="./?action=logout" class="red-link" >Выйти</a>)</div>
				<div><a href="" ><img src="/images/admin/question-icon-mini.gif" /></a>  <a href="" > Помощь</a> <a href="./?modul=cms_content" ><img src="/images/admin/congif-icon-mini.gif" /> </a>  <a href="./?modul=cms_content" >Настроить</a></div>
			</div>
				
			</div><!-- HEADER -->
	
			<!-- CONTENT -->
			<div class="content">

	
				<!-- WRAPPER -->
				<div class="wrapper">
				
				<!-- LEFT -->
				<div class="left-content">	
					[[ block left ]]
					<div class="filters" >
						<table class="rt" >
							<tr>
								<td class="rt-tl"></td>
								<td class="rt-tc" ></td>
								<td class="rt-tr" ></td>
							</tr>
							<tr>
								<td class="rt-ml"></td>
								<td class="rt-mc" >
									<img src="/images/admin/message-mini.gif" alt="" /> Сообщения
									<ul class="filter-list" >
										<li>14 <a href="">Входящие</a></li>
										<li>29 <a href="">Исходящие</a></li>
										<li>11 <a href="">Прочитанные</a></li>
										<li>86 <a href="">Корзина</a></li>
									</ul>
									
									<img src="/images/admin/earth-mini.gif" alt="" /> Выбор языка
									<select class="filter-select" >
										<option>Русский</option>
										<option>Китайский</option>
									</select>
									
									<ul class="check-list" >
										<li><input type="checkbox" id="1"  /> <label for="1" >Новые модули</label></li>
										<li><input type="checkbox" id="2" /> <label for="2" >Измененные модули</label></li>
										<li><input type="checkbox" id="3" /> <label for="3" >Удалить выбранные</label></li>
									</ul>
									
									<img src="/images/admin/celendar-mini.gif" alt="" /> <a href="">Выбрать дату</a>
									<br /><br />
									Цена от <input type="text" class="input-mini" /> до <input type="text" class="input-mini"/>
								</td>
								<td class="rt-mr" ></td>
							</tr>
							<tr>
								<td class="rt-bl"></td>
								<td class="rt-bc" ></td>
								<td class="rt-br" ></td>
							</tr>
						</table>
					</div>
					[[endblock]]
				</div>
				<!-- LEFT -->
				
				
				[[ block center_all ]]
					<!-- CENTER -->
					<div class="center-content">
					[[ block center]]
						[[ block sub_menu ]]
							[[for men in menu]]
								[[if men['status'] and men['child'] ]]
									<div class="sub-menu" >
										<table class="rt" >
											<tr>
												<td class="rt-tl"></td>
												<td class="rt-tc" ></td>
												<td class="rt-tr" ></td>
											</tr>
											<tr>
												<td class="rt-ml"></td>
												<td class="rt-mc">
													
															[[for sub in men['child']]]
																<a href="./?modul={sub['redir']}" class="sub-menu-link [[if sub['redir']== mod['redir'] ]]active[[endif]]">
																	<div>
																		[[if sub.icons]]<img src="/images/icons/{sub.icons}" alt="" />[[endif]]
																	</div>
																	{sub['caption']}
																</a>
															[[endfor]]
														
														
												</td>
												<td class="rt-mr" ></td>
											</tr>
											<tr>
												<td class="rt-bl"></td>
												<td class="rt-bc" ></td>
												<td class="rt-br" ></td>
											</tr>
										</table>
										
									</div>
								[[endif]]	
							[[endfor]]
						[[endblock]]
						[[ include TEMPLATE_PATH ~ block ]]		
					 [[endblock]]
					</div><!-- CENTER -->
				 [[endblock]]
				</div><!-- WRAPPER -->
	
				
	
				<!-- SUBFOOTER -->

				<div class="subfooter">
					
				</div>
			
			</div><!-- CONTENT -->
	
		</div>
	


	</div><!-- PAGE -->

</body>
</html>