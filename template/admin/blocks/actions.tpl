[[ import TEMPLATE_PATH ~ "admin/macro/actions.tpl" as forms ]]


[[if 'showlink'  in  actions ]]
	[[if (item['inmenu']==1)]]
		[[set img = 'published.gif' ]]
	[[else]]	
		[[set img = 'notpublished.gif' ]]
	[[endif]]	
	
	[[ set link ]]
	 	/admin/?modul={request.modul}&id={item['id']}&action=showlink
	[[ endset ]]
	
	{forms.action(link, img)}
[[endif]]

[[if 'inmenu'  in  actions ]]
	[[if (item['inmenu']==1)]]
		[[set img = 'published.gif' ]]
	[[else]]	
		[[set img = 'notpublished.gif' ]]
	[[endif]]	
	
	[[ set link ]]
	 	/admin/?modul={request.modul}&id={item['id']}&action=inmenu
	[[ endset ]]
	
	{forms.action(link, img)}
[[endif]]
[[if 'populyar'  in  actions ]]
	[[if (item['populyar']==1)]]
		[[set img = 'published.gif' ]]
	[[else]]	
		[[set img = 'notpublished.gif' ]]
	[[endif]]	
	
	[[ set link ]]
	 	/admin/?modul={request.modul}&id={item['id']}&action=populyar
	[[ endset ]]
	
	{forms.action(link, img)}
[[endif]]

[[if 'index'  in  actions ]]
		[[if (item['index']==1)]]
			[[set img = 'new.gif' ]]
		[[else]]	
			[[set img = 'notnew.gif' ]]
		[[endif]]	
		
		[[ set link ]]
		 	/admin/?modul={request.modul}&id={item['id']}&action=index
		[[ endset ]]
	
		
		{forms.action(link, img)}
[[endif]]

[[if 'move'  in  actions ]]

	[[set img = 'icon_up.gif' ]]
	[[ set link ]]
	 	/admin/?modul={request.modul}&id={item['id']}&action=up
	[[ endset ]]
	{forms.action(link, img)}

	[[set img = 'icon_down.gif' ]]
	[[ set link ]]
	 	/admin/?modul={request.modul}&id={item['id']}&action=down
	[[ endset ]]
	{forms.action(link, img)}

[[endif]]

[[if 'active'  in  actions ]]
	[[if (item['active']==1)]]
		[[set img = 'on.gif' ]]
	[[else]]	
		[[set img = 'off.gif' ]]
	[[endif]]	
	
	[[ set link ]]
	 	/admin/?modul={request.modul}&id={item['id']}&action=active[[if request.comm_film_id]]&comm_film_id={request.comm_film_id}[[endif]]
	[[ endset ]]
	
	{forms.action(link, img)}
[[endif]]

[[if 'comments'  in  actions ]]
	
	[[set img = 'comment.gif' ]]
	
	[[ set link ]]
	 	/admin/?modul=comments&comm_film_id={item['id']}
	[[ endset ]]
	
	{forms.action(link, img)}
[[endif]]

[[if 'edit'  in  actions ]]
	
	[[set img = 'icon_edit.gif' ]]
	
	[[ set link ]]
	 	/admin/?modul={request.modul}&id={item['id']}[[if request.modul=='blog']]&dop_polya=hide[[endif]]&action=edit
	[[ endset ]]
	
	{forms.action(link, img)}
[[endif]]

[[if 'editgallery'  in  actions ]]
	
	[[set img = 'icon_edit.gif' ]]
	
	[[ set link ]]
	 	/admin/?modul={request.modul}&id={item['id']}&action=editgallery
	[[ endset ]]
	
	{forms.action(link, img)}
[[endif]]

[[if 'delete'  in  actions and (item['delete_security']=='0' or ignor_delete_security)]]

	[[set img = 'del.gif' ]]

	[[ set link ]]
	 	/admin/?modul={request.modul}&id={item['id']}&action=delete[[if request.comm_film_id]]&comm_film_id={request.comm_film_id}[[endif]]
	[[ endset ]]
	
	{forms.action(link, img,'удалить',16,16,'Вы уверенны?')}
[[endif]]


[[if 'delete_confirm'  in  actions ]]
	[[set img = 'del.gif' ]]
	
	<span>
		<a href="/admin/?modul={request.modul}&id={item['id']}&ac" onclick="showChange('confirm-action-{item['id']}','confirm-action-select-{item['id']}');return false;"  >
			<img src="/images/admin/actions/{img}" border="0"  />
		</a>
		<div class="confirm-action" id="confirm-action-{item['id']}" >
			<form method="POST" action="/admin/index.php?modul={request.modul}"> 
				<input type="hidden" name="action" value="delete" />
				<input type="hidden" name="id" value="{item['id']}" />
				<table>
					<tr>
						<td>
							Выберите новую тематику
						</td>
						<td align="center" >
							<select name="new_id" id="confirm-action-select-{item['id']}"  >
								<option value="0">---</option>
							</select>
						</td>
						<td align="right" >
						<input type="submit" value="отменить" onclick="hideChange('confirm-action-{item['id']}');return false;"  /> <input type="submit" value="удалить" />
						</td>
					</tr>
				</table>
			
			</form>
		</div>
		
	</span>
[[endif]]





