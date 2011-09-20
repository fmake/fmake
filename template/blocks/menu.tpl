				<div id="top-menu" class="menu" >
					<ul>
						[[for m in menu]]
							<li>
								<a [[if m.id==modul.id]]class="active"[[endif]] href="[[if m.redir]]/{m.redir}/[[else]]/[[endif]]">{m.caption}</a>
							</li>
						[[endfor]]
						<!-- <li>
							<a href="" class="active" >Кино</a>
						</li>
						<li>
							<a href="">Новинки</a>
						</li>
						<li>
							<a href="">Избранное</a>
						</li>
						<li>
							<a href="">Оплата</a>
						</li>
						<li>
							<a href="">Услуги</a>
						</li>
						<li>
							<a href="">Контакты</a>
						</li>  -->
					</ul>
				</div>