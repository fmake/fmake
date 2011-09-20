[[ extends  TEMPLATE_PATH ~ "base/main.tpl" ]] 

[[block content]]
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
												<h3>{item.caption}</h3>
											</td>
											<td align="right">
												<div style="position: relative;width: 511px;">
													<div style="float:left;" class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="button" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir,lj"></div> 
													<div style="float:left;padding-top: 7px; "><g:plusone size="small"></g:plusone></div>
													<div style="float:left;padding-top: 4px; "><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=173719562696000&amp;xfbml=1"></script><fb:like href="" send="true" layout="button_count" width="140" show_faces="true" font=""></fb:like></div>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="block-content">
								<img class="thumbnail" alt="{item.title}" src="/images/sitemodul_image/{item.id}/{item.image}">
								{compile(item.text,_context)}
							</div>
							<div class="block-footer">
								<div class="block-footer-z1">
									<div class="left">
										 Рубрика: <a rel="category tag" title="Просмотреть все записи в Новости" href="/news/">Новости</a>
									</div>
									<div class="right">
										 Опубликовано: {df('date','d.m.Y',item.dop_param.date)} | <a href="#respond">Комментариев нет</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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
												<h3>Другие статьи по теме:</h3>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="block-content">
								<table cellspacing="0" cellpadding="0" border="0">
									<tbody>
										<tr>
											[[for item in items_pohojie]]
												<td valign="top">
													<div class="format-related">
														<div class="format-content">
															<h3>
																<a href="/stati/news/{item.redir}/">{item.caption}</a>
															</h3>
															<img src="/images/sitemodul_image/{item.id}/mini{item.image}" alt="{item.caption}">
															{compile(item.text2,_context)}
														</div>
													</div>
												</td>
											[[endfor]]
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
[[endblock]]
