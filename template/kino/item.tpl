[[ extends  TEMPLATE_PATH ~ "base/main.tpl" ]] 

[[block wrapper]]
	<!-- RIGHT -->
					[[ include TEMPLATE_PATH ~ "blocks/rightblock.tpl"]]
					<!-- RIGHT -->
					
					
					<!-- CENTER -->
					<div id="center" >
						<div id="film-description" class="content-block">
							<div class="navigation">
								<a href="/">Главная</a>
								[[for bredcrumb in breadcrumbs]]
									[[if loop.last]]
										/ {bredcrumb.caption}
									[[else]]
										/ <a href="{bredcrumb.link}">{bredcrumb.caption}</a>
									[[endif]]
								[[endfor]]
							</div>
							<div class="left-separator">
								<div class="header">
									<div class="date">{df('date','d.m.Y',item.date)}</div>
									<h1>{item.caption}</h1>
								</div>
								<p class="janr" ><span><a href="#comment" ><img src="/images/icon-comment.gif" /> Ваш отзыв</a></span>
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
							</div>
							<table>
								<tr>
									<td class="left-film">
										<img src="/images/films/{item.id}/mini_image.jpg" alt="" />
									</td>
									<td class="right-film" >
										<div class="raiting">
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
													
													$('.show-film').live('click',function(){
														if($('#video span').attr('class')){
															$(this).text('Скрыть фильм');
															$('#video span').removeClass('video-hide');
														}
														else{
															$(this).text('Смотреть фильм онлайн');
															$('#video span').addClass('video-hide');
														}
													});
													/*$('.star-rating').rating({
													focus: function(value, link){
														alert('qq');
													}
													});*/ 
												});
											</script>
											[[endraw]]
											<div>
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
										</div>
										<p>
											<strong>[[if item.year]]Год выхода: {item.year}<br />[[endif]]
											[[if item.genre]]Жанр: {item.genre}<br />[[endif]]
											[[if item.country]]Выпущено: {item.country}[[endif]]</strong>
										</p>
										<p class="italic">
											[[if item.director]]Режиссер: {item.director} <br />[[endif]]
											[[if item.v_rolyax]]В ролях: {item.v_rolyax}[[endif]]
										</p>
									</td>
								</tr>
							</table>
							<p class="about" >
								<strong>О фильме</strong>: {compile(item.anonse,_context)}
							</p>
							[[raw]]
							<style>
								div#video .video-hide {display: none;}
							</style>
							[[endraw]]
							<a name="view-online"></a>
							[[if item.show_player and item.link_partners]]
							<p>
								<a href="" class="show-film" onclick="xajax_clickLinkFilmView({request.id});return false;">Смотреть фильм онлайн</a>
							</p>
							<div id="video">
								<span id="video-content" class="video-hide">
									{compile(item.link_partners,_context)}
								</span>
							</div>
							[[endif]]
							<p>
							[[if item.url_partners]]
								<a class="link-dashed" target="_blank" href="{item.url_partners}" >Скачать фильм</a></p>
							[[else]]
								{compile(configs.default_url_partners,_context.item)}
							[[endif]]
							<div class="like">
									<div style="float:right;">
										<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script><div style="float:left;" class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="button" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir,lj"></div> 
										<div style="float:left;padding-top: 7px; "><g:plusone size="small"></g:plusone></div>
										<div style="float:left;padding-top: 4px; "><div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=173719562696000&amp;xfbml=1"></script><fb:like href="" send="true" layout="button_count" width="140" show_faces="true" font=""></fb:like></div>
									</div>
								</div>
							[[raw]]
							<script src="/js/highslide-with-gallery.js" type="text/javascript"></script>
							<link href="/css/highslide.css" type="text/css" rel="stylesheet">
							<script type="text/javascript">
							hs.graphicsDir = '/images/graphics/';
							hs.align = 'center';
							hs.transitions = ['expand', 'crossfade'];
							hs.fadeInOut = true;
							hs.dimmingOpacity = 0.8;
							hs.outlineType = 'rounded-white';
							hs.captionEval = 'this.thumb.alt';
							hs.marginBottom = 105; // make room for the thumbstrip and the controls
							hs.numberPosition = 'caption';

							// Add the slideshow providing the controlbar and the thumbstrip
							hs.addSlideshow({
								//slideshowGroup: 'group1',
								interval: 5000,
								repeat: false,
								useControls: true,
								overlayOptions: {
									className: 'text-controls',
									position: 'bottom center',
									relativeTo: 'viewport',
									offsetY: -60
								},
								thumbstrip: {
									position: 'bottom center',
									mode: 'horizontal',
									relativeTo: 'viewport'
								}
							});

												
							</script>

							<!--[if lt IE 7]>
								<link rel="stylesheet" type="text/css" href="/styles/highslide-ie6.css" />
							<![endif]-->
							[[endraw]]
							<p><strong>Кадры из фильма</strong></p>
							<p class="film-kadr">
								[[for item_thumb in image_thumbs]]
									<a class="highslide" href="/images/films/{item['id']}/mini/{item_thumb}" onclick="return hs.expand(this)"><img src="/images/films/{item['id']}/mini/thumbs/{item_thumb}" alt="" /></a>
								[[endfor]]
							</p>
							[[if recomented]]
							<div class="caption">Рекомендуем к просмотру</div>
							<br /><br />
							<div class="recomendation">
								<table><tr><td>
								[[for recom in recomented]]
									<div class="item">
										<a href="/{recom.id}-{recom.url}.html">
											{recom.caption}<br />
											<img src="/images/films/{recom.id}/mini_image.jpg"/>
										</a>
									</div>
								[[endfor]]
								</td></tr></table>
							</div>
							[[endif]]
							<a name="comment"></a>
							<div class="comments">
								[[if error]]
									<p>
										Ошибки:<br/>
										<span style="color: red;">
										[[for err in error]]
											{err}<br/>
										[[endfor]]
										</span>
									</p>
								[[endif]]
								<div id="comment-form">
									<p><strong>Отзывы по фильму "{item.caption}"</strong></p>
									[[if addcomment]]
										Спасибо за оставленный коментарий, он будет добавлен в ближайшее время после модерации.
									[[else]]
									<form method="post" action="#comment">
										<input type="hidden" name="action" value="comments">
										<table>
											<tr>
												<td class="first">
													Имя:
												</td>
												<td width="100%">
													<input type="text" class="text" name="name" value="{request.name}"/>
												</td>
											</tr>
											<tr>
												<td class="first">
													Сообщение:
												</td>
												<td>
													<textarea rows="" cols="" name="text">{request.text}</textarea>
												</td>
											</tr>
											<tr>
												<td>
												
												</td>
												<td>
													<input type="submit" class="black-submit f_r" value="ОТПРАВИТЬ"/>
													Введите код: <img src="/getpicture.php" alt="" style="padding-right: 10px;" /><input type="text" class="capcha" name="capcha"/>
												</td>
											</tr>
										</table>
									</form>
									[[endif]]
								</div>
								[[for comm in comments]]
									<div class="comment">
										<div class="commnet-head" >
											<div class="date-time">{df('date','d.m.Y',comm.date)} <img src="/images/icon-time.gif" /> {df('date','G:i',comm.date)}</div>
											<span>{comm.name}</span>
										</div>
										<p class="text">
											{compile(comm.text,_context)}
										</p>
									</div>
								[[endfor]]
							</div>
							[[if pages>1]]
							<div class="pager">
								[[if page==1]]
									
								[[else]]
										<a href="/{request.modul}/{item.id}/page-{page-1}/" class="black-submit">пред</a>
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
										<a href="/{request.modul}/{item.id}/page-1/" class="black-submit">1</a>
										...
								[[endif]]
								
								[[for i in k1 .. k2]]
									[[if page==i]]
										<a href="javascript: void(0);" class="black-submit active">{i}</a>
									[[else]]
										<a href="/{request.modul}/{item.id}/page-{i}/" class="black-submit">{i}</a>
									[[endif]]
								[[endfor]]

								[[if k3==1 or k3==3]]
										...
										<a href="/{request.modul}/{item.id}/page-{pages}/" class="black-submit">{pages}</a>
								[[endif]]
								
								[[if page==pages]]
									
								[[else]]
										<a href="/{request.modul}/{item.id}/page-{page+1}/" class="black-submit">след</a>
								[[endif]]
							</div>
							[[endif]]
						</div>
					</div><!-- CENTER -->
	
	
				<div id="subfooter-mini"></div>	
[[endblock]]
