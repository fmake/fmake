<div id="right">	
						<div id="film-janr" class="right-block" >
							<div class="caption">Жанр Кино</div>
							<table><tr><td>
								<ul class="ul-janr">
								[[set i=0 ]]
								[[set limit_li=genres_size//2 ]]
								[[for gen in genresall]]
									[[if i==limit_li+1]]
										</ul><ul class="ul-janr">
										[[set i=0]]
									[[endif]]
									<li>
										<a [[if gen.id_genre==request.genre or gen.id_genre==id_genre]]class="active"[[endif]] href="/kino/genre-{gen.id_genre}/">{gen.caption}</a> 
									</li>
									[[set i=i+1]]
								[[endfor]]
								</ul>
							</td></tr></table>
						</div>
						
						<div id="search" class="right-block" >
							<div class="caption">Поиск фильма</div>
							<form action="/search/" method="post">
								<input type="text" name="text_search" class="text" autocomplete="off" />
								<div class="al-r"><input class="orange-submit" type="submit" value="НАЙТИ"/></div>
							</form>
						</div>
						
						<div id="reklama" class="right-block" >
							<div class="caption">Место для рекламы</div>
						</div>
						
						<div id="opros" class="right-block" >
							<div class="caption">Опрос</div>
							<p>{interview.caption}</p>
							<form method="post">
								<input type="hidden" name="active" value="interview">
								<table>
									[[for v in vopros]]
										<tr>
											[[if not iscookie]]
											<td width="20px">
												<input [[if loop.first]]checked[[endif]] type="radio" name="film" value="{v.id}" id="vote-{loop.index0}" />
											</td>
											[[endif]]
											<td width="150px">
												<label for="vote-{loop.index0}"><strong>{v.caption}</strong></label>
											</td>
											[[if iscookie]]
											<td width="30px">
												<label for="vote-{loop.index0}"><strong>{v.stat}</strong></label>
											</td>
											[[endif]]
										</tr>
									[[endfor]]
									[[if not iscookie]]
									<tr>
										<td width="20px">
										
										</td>
										<td align="right">
											<br />
											<input class="black-submit" type="submit" value="ОТВЕТИТЬ"/>
										</td>
									</tr>
									[[endif]]
								</table>
							</form>
						</div>
						
						<div id="phrase" class="right-block" >
							<div class="caption">К нам заходят по фразам</div>
								[[for s in search_query]]
									<div class="search-phrase [[if s.search_num=='0']]mail-ru[[elseif s.search_num=='2']]yandex-ru[[else]]google-ru[[endif]]" >
										<div class="img">&nbsp;</div>[[if s.search_num=='0']]Mail.ru[[elseif s.search_num=='2']]Яndex.ru[[else]]Google[[endif]]: <a href="{s.url}">{s.query}</a>
									</div>
								[[endfor]]
						</div>
						
					</div>