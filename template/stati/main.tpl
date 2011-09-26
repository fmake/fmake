[[ extends  TEMPLATE_PATH ~ "base/main.tpl" ]] 

[[ import TEMPLATE_PATH ~ "macro/macro.tpl" as macros ]]

[[block content]]
	<h2>Раздел «{modul.caption}»</h2>
	[[for item in items]]
	<div class="content1">
		<div class="content1-color1">
			<div class="content1-z1">
				<div class="content1-z2">
					<div class="content1-z3">
						<div class="content1-z4">
							<div class="block-header">
								<table>
									<tbody>
										<tr>
											<td align="left">
												<h3><a href="/stati/{macros.rubrika_redir(item)}/{item.redir}/">{item.title}</a></h3>
											</td>
											<td align="right">
												<div data-yasharequickservices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir" data-yasharetype="button" data-yasharel10n="ru" class="yashare-auto-init"></div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="block-content">
								<img class="thumbnail border5px-2" alt="{item.title}" src="/images/sitemodul_image/{item.id}/vm{item.image}">
								{compile(item.anotaciya,_context)}
							</div>
							<div class="block-footer">
								<div class="block-footer-z1">
									<div class="left">
										 Рубрика: <a rel="category tag" title="Просмотреть все записи в {macros.rubrika_name(item)}" href="/stati/{macros.rubrika_redir(item)}/">{macros.rubrika_name(item)}</a>, <a rel="category tag" title="Просмотреть все записи в Статьи" href="/stati/">Статьи</a>
									</div>
									<div class="right">
										 Опубликовано: {df('date','d.m.Y',item.date)} | <a href="#respond">Комментариев нет</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	[[endfor]]
	[[if pages>1]]
		<div class="pagenv">
			<div id="wp_page_numbers">
				<ul>
					<li class="page_info">
						Страница {page} из {pages}
					</li>
		[[if page==1]]
			
		[[else]]
			<li>
				<a href="/stati/{request.modul}/page-{page-1}/">«</a>
			</li>
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
			<li>
				<a href="/stati/{request.modul}/page-1/">1</a>
			</li>
			<li>
				...
			</li>
		[[endif]]
		
		[[for i in k1 .. k2]]
			[[if page==i]]
					<li class="active_page">
						<a href="javascript: void(0);" >{i}</a>
					</li>
			[[else]]
				<li class="active_page">
					<a href="/stati/{request.modul}/page-{i}/" >{i}</a>
				</li>
			[[endif]]
		[[endfor]]

		[[if k3==1 or k3==3]]
			<li>
				...
			</li>
			<li>
				<a href="/stati/{request.modul}/page-{pages}/">{pages}</a>
			</li>
		[[endif]]
		
		[[if page==pages]]
			
		[[else]]
			<li>
				<a href="/stati/{request.modul}/page-{page+1}/">»</a>
			</li>
		[[endif]]
				</ul>
			<div style="float: none; clear: both;"></div>
		</div>
	</div>
	[[endif]]
	
	<!-- <div class="pagenv">
		<div id="wp_page_numbers">
			<ul>
				<li class="page_info">
					Страница 1 из 9
				</li>
				<li class="active_page">
					<a href="http://www.world-tours.su/category/articles/">1</a>
				</li>
				<li>
					<a href="http://www.world-tours.su/category/articles/page/2/">2</a>
				</li>
				<li>
					<a href="http://www.world-tours.su/category/articles/page/3/">3</a>
				</li>
				<li>
					<a href="http://www.world-tours.su/category/articles/page/4/">4</a>
				</li>
				<li>
					<a href="http://www.world-tours.su/category/articles/page/5/">5</a>
				</li>
				<li>
					<a href="http://www.world-tours.su/category/articles/page/6/">6</a>
				</li>
				<li>
					<a href="http://www.world-tours.su/category/articles/page/7/">7</a>
				</li>
				<li>
					<a href="http://www.world-tours.su/category/articles/page/8/">8</a>
				</li>
				<li>
					<a href="http://www.world-tours.su/category/articles/page/9/">9</a>
				</li>
				<li>
					<a href="http://www.world-tours.su/category/articles/page/2/">»</a>
				</li>
			</ul>
			<div style="float: none; clear: both;"></div>
		</div>
	</div> -->	
[[endblock]]
