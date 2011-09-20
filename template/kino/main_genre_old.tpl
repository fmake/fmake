[[ extends  TEMPLATE_PATH ~ "base/main.tpl" ]] 

[[block wrapper]]
	<!-- RIGHT -->
					[[ include TEMPLATE_PATH ~ "blocks/rightblock.tpl"]]
					<!-- RIGHT -->
					
					
					<!-- CENTER -->
					<div id="center" >
						<h1>{modul.caption}</h1>
						[[if items]]
							[[for item in items]]
							<div class="film-item content-block">
								<table><tr>
									<td class="left-film" width="100%" >
										<div class="header"><span class="date" >{df('date','d.m.Y',item.date)}</span><a href="/{request.modul}/{item.id}/">{item.caption}</a></div>
										<p class="janr" ><span><a href="/{request.modul}/{item.id}/#comment" ><img src="/images/icon-comment.gif" /> Ваш отзыв</a></span>
										[[if genres]]
											Жанр фильма: 
											[[for g in genres]]
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
										<a href="/kino/{item.id}/#view-online" class="black-submit" title="Смотреть онлайн">СМОТРЕТЬ ОНЛАЙН</a>
										<a href="" class="orange-submit" title="Скачать" >СКАЧАТЬ</a>
									</td>
									<td class="right-film">
											<a href="/kino/{item.id}/">
												<img src="/images/films/{item.id}/mini_image.jpg" alt="" />
											</a>
											[[raw]]
											<script>
												$(function(){  
													[[endraw]]
													[[if item.star_read]]
													[[raw]]
														$('#form[[endraw]]{item.id}[[raw]] :radio.star').rating([[endraw]][[if item.star_count]]'select',{item.star_count-1}[[endif]][[raw]]);
														$('#form[[endraw]]{item.id}[[raw]] :radio.star').rating('readOnly',true);
													[[endraw]]
													[[else]]
													[[raw]]
														$('#form[[endraw]]{item.id}[[raw]] :radio.star').rating([[endraw]][[if item.star_count]]'select',{item.star_count-1}[[endif]][[raw]]);
														$('#form[[endraw]]{item.id}[[raw]] :radio.star').rating('readOnly',false);
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
												<form id="form{item.id}" rel="{item.id}" method="POST">
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
						[[else]]
							<center><h2>По данному жанру нет ниодного фильма</h2></center>
						[[endif]]
						
						[[if pages>1]]
							<div class="pager">
							[[if page==1]]
								
							[[else]]
									<a href="/{request.modul}/page-{page-1}/" class="black-submit">пред</a>
							[[endif]]
							[[if pages<=10]]
								[[set k1 = 1]]
								[[set k2 = pages]]
							[[else]]
								[[if page>0 and page<=7]]
									[[set k1 = 1]]
									[[set k2 = 9]]
									[[set k3 = 1]]
								[[elseif page<=pages and page>=pages-7]]
									[[set k1 = pages-9]]
									[[set k2 = pages]]
									[[set k3 = 2]]
								[[else]]
									[[set k1 = page-3]]
									[[set k2 = page+3]]
									[[set k3 = 3]]
								[[endif]]
							[[endif]]
							[[if k3==2 or k3==3]]
									<a href="/{request.modul}/page-1/" class="black-submit">1</a>
									...
							[[endif]]
							
							[[for i in k1 .. k2]]
								[[if page==i]]
									<a href="javascript: void(0);" class="black-submit active">{i}</a>
								[[else]]
									<a href="/{request.modul}/page-{i}/" class="black-submit">{i}</a>
								[[endif]]
							[[endfor]]

							[[if k3==1 or k3==3]]
									...
									<a href="/{request.modul}/page-{pages}/" class="black-submit">{pages}</a>
							[[endif]]
							
							[[if page==pages]]
								
							[[else]]
									<a href="/{request.modul}/page-{page+1}/" class="black-submit">след</a>
							[[endif]]
						</div>
						[[endif]]
						
						<!-- <div class="pager">
							<a href="" class="black-submit">пред</a>
							<a href="" class="black-submit">1</a>
							<a href="" class="black-submit">2</a>
							<a href="" class="black-submit active">3</a>
							<a href="" class="black-submit">4</a>
							<a href="" class="black-submit">5</a>
							<a href="" class="black-submit">6</a>
							<a href="" class="black-submit">7</a>
							<a href="" class="black-submit">8</a>
							<a href="" class="black-submit">след</a>
						</div> -->
					</div><!-- CENTER -->
	
	
				<div id="subfooter-mini"></div>	
[[endblock]]
