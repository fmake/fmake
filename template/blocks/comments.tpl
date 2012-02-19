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
												<h3>Комментарии</h3>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div style="padding: 1px 8px 0 8px;" class="block-content">
								
								<div id="comments" class="comments">
									[[for comm in comments]]
										<div id="comment-45" class="cd-format1">
											<div class="cd-format1 color1">
												<div class="widget-header"> 
													<span>{comm.name}</span>, {df('date','d.m.Y H:i',comm.date)}
												</div>
												<div class="widget-content">
													{comm.text}
												</div>
												<div class="widget-footer"></div>
											</div>
										</div>
									[[endfor]]
									[[if pages>1]]
											<div class="">
												<div id="wp_page_numbers" style="background: none repeat scroll 0 0 #F9F1E6;">
													<ul>
														<li class="page_info">
															Страница {page} из {pages}
														</li>
											[[if page==1]]
												
											[[else]]
												<li>
													<a href="/stati/{request.modul}/{request.url}/page-{page-1}/">«</a>
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
													<a href="/stati/{request.modul}/{request.url}/page-1/">1</a>
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
														<a href="/stati/{request.modul}/{request.url}/page-{i}/" >{i}</a>
													</li>
												[[endif]]
											[[endfor]]
									
											[[if k3==1 or k3==3]]
												<li>
													...
												</li>
												<li>
													<a href="/stati/{request.modul}/{request.url}/page-{pages}/">{pages}</a>
												</li>
											[[endif]]
											
											[[if page==pages]]
												
											[[else]]
												<li>
													<a href="/stati/{request.modul}/{request.url}/page-{page+1}/">»</a>
												</li>
											[[endif]]
													</ul>
												<div style="float: none; clear: both;"></div>
											</div>
										</div>
									[[endif]]
									<h3 style="padding-top: 0px;">Добавить комментарий</h3>
									[[if error]]
										[[for err in error]]
											{err}<br/>
										[[endfor]]
									[[endif]]
									<div id="respond" class="commentform">
										<form method="post">
											<input type="text" class="input"  value="[[if error]]{request.name}[[endif]]" name="name">Ник (отображаемое имя)<br> 
											<input type="text" class="input" value="[[if error]]{request.email}[[endif]]" name="email">Адрес e-mail (не публикуется)<br> 
											<textarea name="text" class="textarea">[[if error]]{request.text}[[endif]]</textarea>
											<input type="hidden" value="comments" name="action">
											<input type="hidden" id="comment_post_url" value="{request.url}" name="comment_post_url">
											<input type="submit" value="Отправить" class="submit" name="submit">
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>