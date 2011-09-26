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
					[[if novinki]]
					<div id="new-films" class="content-block">
						<div class="caption">Новинки кино</div>
						<table>
							<tr>
								<td>
									<div class="films-caption">
										[[for item in novinki]]
											<div class="item">
												<div class="left-zone">
													<a href="/{item.id}-{item.url}.html"><img width="120" src="/images/films/{item.id}/mini_image.jpg" alt="{item.caption}" /></a>
													[[raw]]
													<script>
														$(function(){  
															[[endraw]]
															[[if item.star_read]]
															[[raw]]
																$('#form_new[[endraw]]{item.id}[[raw]] :radio.star').rating([[endraw]][[if item.star_count]]'select',{item.star_count-1}[[endif]][[raw]]);
																$('#form_new[[endraw]]{item.id}[[raw]] :radio.star').rating('readOnly',true);
															[[endraw]]
															[[else]]
															[[raw]]
																$('#form_new[[endraw]]{item.id}[[raw]] :radio.star').rating([[endraw]][[if item.star_count]]'select',{item.star_count-1}[[endif]][[raw]]);
																$('#form_new[[endraw]]{item.id}[[raw]] :radio.star').rating('readOnly',false);
															[[endraw]]
															[[endif]]
															[[raw]]
															$('.star-rating').live('click',function(){
																
																var form = $(this).parent().parent();
																form.find('input').rating('readOnly',true);
																xajax_addStar(form.attr('rel'),form.find('input:checked').val());
															});
														});
													</script>
													[[endraw]]
													<div class="raiting-star">
														<form id="form_new{item.id}" rel="{item.id}" method="POST">
															[[for star in 1 .. 5]]
																<input name="star{item.id}" value="{loop.index}" type="radio" class="star"/>
															[[endfor]]
															<!-- <input name="star{item.id}" value="1" type="radio" class="star"/>
															<input name="star{item.id}" value="2" type="radio" class="star"/>
															<input name="star{item.id}" value="3" type="radio" class="star"/>
															<input name="star{item.id}" value="4" type="radio" class="star"/>
															<input name="star{item.id}" value="5" type="radio" class="star"/> -->
														</form>
													</div>
												</div>
												<div class="text">
													<a href="/{item.id}-{item.url}.html" class="film-caption">{item.caption}</a>
													{compile(item.anonse,_context)}
												</div>
											</div>
										[[endfor]]
									</div>
						
								</td>
							</tr>
						</table>
						
					</div>
					[[endif]]
					<!-- RIGHT -->
					[[ include TEMPLATE_PATH ~ "blocks/rightblock.tpl"]]
					<!-- RIGHT -->
					
					
					<!-- CENTER -->
					
					<div id="center" >
					[[if populars]]
						[[for item in populars]]
						<div class="film-item content-block">
							<table><tr>
								<td class="left-film" width="100%" >
									<div class="header"><span class="date" >{df('date','d.m.Y',item.date)}</span><a href="/{item.id}-{item.url}.html">{item.caption}</a></div>
									<p class="janr" ><span><a href="/{item.id}-{item.url}.html#comment" ><img src="/images/icon-comment.gif" /> Ваш отзыв</a></span>
									[[if item.genres]]
										Жанр фильма: 
										[[for g in item.genres]]
											[[if loop.last]]
												<a href="/kino/genre-{g.id_genre}/">{g.caption}</a>
											[[else]]
												<a href="/kino/genre-{g.id_genre}/">{g.caption}</a>,
											[[endif]]
										[[endfor]]
									[[endif]]
									</p>
									<p>
										<strong>[[if item.year]]Год выхода: {item.year}<br />[[endif]]
										[[if item.genre]]Жанр: {item.genre}<br />[[endif]]
										[[if item.country]]Выпущено: {item.country}[[endif]]</strong>
									</p>
									<p class="italic">
										[[if item.director]]Режиссер: {item.director} <br />[[endif]]
										[[if item.v_rolyax]]В ролях: {item.v_rolyax}[[endif]]
									</p>
									<p class="about" >
										<strong>О фильме</strong>: {compile(item.anonse,_context)}
									</p>
									<a href="/{item.id}-{item.url}.html#view-online" class="black-submit" title="Смотреть онлайн">СМОТРЕТЬ ОНЛАЙН</a>
									<a href="/{item.id}-{item.url}.html#view-online" class="orange-submit" title="Скачать" >СКАЧАТЬ</a>
								</td>
								<td class="right-film">
										<a href="/{item.id}-{item.url}.html">
											<img src="/images/films/{item.id}/mini_image.jpg" alt="{item.caption}" />
										</a>
										[[raw]]
										<script>
											$(function(){  
												[[endraw]]
												[[if item.star_read]]
												[[raw]]
													$('#form_popular[[endraw]]{item.id}[[raw]] :radio.star').rating([[endraw]][[if item.star_count]]'select',{item.star_count-1}[[endif]][[raw]]);
													$('#form_popular[[endraw]]{item.id}[[raw]] :radio.star').rating('readOnly',true);
												[[endraw]]
												[[else]]
												[[raw]]
													$('#form_popular[[endraw]]{item.id}[[raw]] :radio.star').rating([[endraw]][[if item.star_count]]'select',{item.star_count-1}[[endif]][[raw]]);
													$('#form_popular[[endraw]]{item.id}[[raw]] :radio.star').rating('readOnly',false);
												[[endraw]]
												[[endif]]
												[[raw]]
												$('.star-rating').live('click',function(){
													
													var form = $(this).parent().parent();
													form.find('input').rating('readOnly',true);
													xajax_addStar(form.attr('rel'),form.find('input:checked').val());
												});
											});
										</script>
										[[endraw]]
										<div class="raiting-star">
											<form id="form_popular{item.id}" rel="{item.id}" method="POST">
												[[for star in 1 .. 5]]
													<input name="star{item.id}" value="{loop.index}" type="radio" class="star"/>
												[[endfor]]
												<!-- <input name="star{item.id}" value="1" type="radio" class="star"/>
												<input name="star{item.id}" value="2" type="radio" class="star"/>
												<input name="star{item.id}" value="3" type="radio" class="star"/>
												<input name="star{item.id}" value="4" type="radio" class="star"/>
												<input name="star{item.id}" value="5" type="radio" class="star"/> -->
											</form>
										</div>
								</td>
							</tr></table>
						</div>
						[[endfor]]
					[[endif]]
						
					</div><!-- CENTER -->
					
	
				<div id="subfooter-mini"></div>
	[[if lastfilms]]
	<div id="last-films" class="content-block">
						<div class="caption">Недавно добавленные</div>
						<table>
							<tr>
								<td>
								
									<div class="films-caption">
										[[for item in lastfilms]]
											<div class="item">
												<div class="left-zone">
													<a href="{item.id}-{item.url}.html"><img width="120" src="/images/films/{item.id}/mini_image.jpg" alt="{item.caption}" /></a>
													[[raw]]
													<script>
														$(function(){  
															[[endraw]]
															[[if item.star_read]]
															[[raw]]
																$('#last-films .raiting-star #form_new[[endraw]]{item.id}[[raw]] :radio.star').rating([[endraw]][[if item.star_count]]'select',{item.star_count-1}[[endif]][[raw]]);
																$('#last-films .raiting-star #form_new[[endraw]]{item.id}[[raw]] :radio.star').rating('readOnly',true);
															[[endraw]]
															[[else]]
															[[raw]]
																$('#last-films .raiting-star #form_new[[endraw]]{item.id}[[raw]] :radio.star').rating([[endraw]][[if item.star_count]]'select',{item.star_count-1}[[endif]][[raw]]);
																$('#last-films .raiting-star #form_new[[endraw]]{item.id}[[raw]] :radio.star').rating('readOnly',false);
															[[endraw]]
															[[endif]]
															[[raw]]
															$('.star-rating').live('click',function(){
																
																var form = $(this).parent().parent();
																form.find('input').rating('readOnly',true);
																xajax_addStar(form.attr('rel'),form.find('input:checked').val());
															});
														});
													</script>
													[[endraw]]
													<div class="raiting-star">
														<form id="form_new{item.id}" rel="{item.id}" method="POST">
															[[for star in 1 .. 5]]
																<input name="star{item.id}" value="{loop.index}" type="radio" class="star"/>
															[[endfor]]
															<!-- <input name="star{item.id}" value="1" type="radio" class="star"/>
															<input name="star{item.id}" value="2" type="radio" class="star"/>
															<input name="star{item.id}" value="3" type="radio" class="star"/>
															<input name="star{item.id}" value="4" type="radio" class="star"/>
															<input name="star{item.id}" value="5" type="radio" class="star"/> -->
														</form>
													</div>
												</div>
												<div class="text">
													<a href="/{item.id}-{item.url}.html" class="film-caption">{item.caption}</a>
													{compile(item.anonse,_context)}
												</div>
											</div>
										[[endfor]]
									</div>
						
								</td>
							</tr>
						</table>
						
					</div>
	[[endif]]
				
	<div id="bot-content" class="content-block">
		<h1>{modul.caption}</h1>
		{compile(modul.text,_context)} 
	</div>
	
				[[endblock]]
				</div><!-- WRAPPER -->
	
				
	
				
			
			<!-- SUBFOOTER -->

				<div id="subfooter"></div>
			</div><!-- CONTENT -->
		
		</div>
	


<!-- FOOTER -->
		{compile(configs.footer,_context)}
	</div><!-- PAGE -->

	
</body>
</html>