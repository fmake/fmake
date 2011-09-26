[[ extends  TEMPLATE_PATH ~ "admin/main.tpl" ]]

[[ block left ]]
	
[[endblock]]

[[block center_all]]	
<div class="center-content-all">

	[[block sub_menu]]
		{parent()}
	[[endblock]]

	<h1>{mod['caption']}</h1>
	
	{mod['text']}

	
	[[if pages]]
		<div class="pager" >
		
		<span><a href="/admin/index.php?modul={request.modul}&page=0[[if request.status]]&status={request.status}[[endif]]" [[if page == 1 ]]class="active"[[endif]] title="Страница 0" >первая</a></span> ..
		[[ set start = page//limitOnpage*limitOnpage - 1]]
		[[ set end = start + limitOnpage + 1]]
		
		[[ for i in start..end ]]
			[[ if i <= pages and i > 0]]
				<span><a href="/admin/index.php?modul={request.modul}&page={i}[[if request.status]]&status={request.status}[[endif]][[if request.date_start]]&date_start={request.date_start}[[endif]][[if request.date_end]]&date_end={request.date_end}[[endif]]" [[if i==page ]]class="active"[[endif]] title="Страница {i}" >{i}</a></span>
			[[ endif ]]
		[[ endfor ]]
		
		
		.. <span><a href="/admin/index.php?modul={request.modul}&page={pages}[[if request.status]]&status={request.status}[[endif]]" [[if pages==page ]]class="active"[[endif]] title="Страница {pages}" >последняя</a></span>
		
		
		</div>
	[[endif]]
	
	[[if items ]]
	<table class="main-table">
		<tbody>
		<tr class="td-header">
			[[for fild in filds]]
				<td>{fild}</td>
			[[endfor]]
		</tr>
		[[for key,item in items]]
		<tr class="td-item"  >
			<td >
				<span>{item.name}</span>
			</td>
			<td align="center" width="270px">
				<span>{item.size}</span>
			</td>
			
			<td align="center" >
				<a onclick="return confirm('Вы уверенны?');" href="	 	/admin/?modul={request.modul}&amp;id={item.id_tag}&amp;action=delete">
					<img height="16" border="0" width="16" alt="удалить" src="/images/admin/actions/del.gif">
				</a>
			</td>
		</tr>
		[[endfor]]
	</tbody></table>
	[[else]]
		<h1>Не найдено ни одной записи</h1>
	[[endif]]	
</div>
[[endblock]]	