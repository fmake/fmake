[[ extends  TEMPLATE_PATH ~ "base/main.tpl" ]] 

[[block wrapper]]
	<!-- RIGHT -->
					[[ include TEMPLATE_PATH ~ "blocks/rightblock.tpl"]]
					<!-- RIGHT -->
					
					
					<!-- CENTER -->
					<div id="center" >
						<h1>{modul.caption} [[if request.text_search]]: {request.text_search}[[endif]]</h1>
						[[if items]]
							[[for item in items]]
							<div class="film-item content-block">
								<table><tr>
									<td class="left-film" width="100%" >
										<div class="header"><span class="date" >{df('date','d.m.Y',item.date)}</span><a href="/kino/{item.id}/">{item.caption}</a></div>
										<p class="janr" ><span><a href="/kino/{item.id}/#comment" ><img src="/images/icon-comment.gif" /> Ваш отзыв</a></span>
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
										<a href="/kino/{item.id}/#view-online" class="orange-submit" title="Скачать" >СКАЧАТЬ</a>
									</td>
									<td class="right-film">
											<a href="/kino/{item.id}/">
												<img src="/images/films/{item.id}/mini_image.jpg" alt="" />
											</a>
											<div>
												<img src="/images/raiting2.gif" alt="" />
											</div>
									</td>
								</tr></table>
							</div>
							[[endfor]]
						[[else]]
							Поиск недал результатов
						[[endif]]
						
						[[if pages>1]]
							<div class="pager">
							[[if page==1]]
								
							[[else]]
									<a href="/{request.modul}/page-{page-1}/[[if request.text_search]]text={request.text_search}[[endif]]" class="black-submit">пред</a>
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
									<a href="/{request.modul}/page-1/[[if request.text_search]]text={request.text_search}[[endif]]" class="black-submit">1</a>
									...
							[[endif]]
							
							[[for i in k1 .. k2]]
								[[if page==i]]
									<a href="javascript: void(0);" class="black-submit active">{i}</a>
								[[else]]
									<a href="/{request.modul}/page-{i}/[[if request.text_search]]text={request.text_search}[[endif]]" class="black-submit">{i}</a>
								[[endif]]
							[[endfor]]

							[[if k3==1 or k3==3]]
									...
									<a href="/{request.modul}/page-{pages}/[[if request.text_search]]text={request.text_search}[[endif]]" class="black-submit">{pages}</a>
							[[endif]]
							
							[[if page==pages]]
								
							[[else]]
									<a href="/{request.modul}/page-{page+1}/[[if request.text_search]]text={request.text_search}[[endif]]" class="black-submit">след</a>
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
