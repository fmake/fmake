[[ import TEMPLATE_PATH ~ "admin/macro/actions.tpl" as forms ]]

[[if 'inmenu'  in  actions ]]
	[[if (item['inmenu']==1)]]
		[[set img = 'published.gif' ]]
	[[else]]	
		[[set img = 'notpublished.gif' ]]
	[[endif]]	
	
	[[ set link ]]
	 	/admin/{request.modul}/inmenu/{item['id']}/
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
		 		/admin/{request.modul}/index/{item['id']}/
		[[ endset ]]
	
		
		{forms.action(link, img)}
[[endif]]

[[if 'move'  in  actions ]]

	[[set img = 'icon_up.gif' ]]
	[[ set link ]]
	 	/admin/{request.modul}/up/{item['id']}/
	[[ endset ]]
	{forms.action(link, img)}

	[[set img = 'icon_down.gif' ]]
	[[ set link ]]
	 	/admin/{request.modul}/down/{item['id']}/
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
	 	/admin/{request.modul}/active/{item['id']}/
	[[ endset ]]
	
	{forms.action(link, img)}
[[endif]]


[[if 'edit'  in  actions ]]
	
	[[set img = 'icon_edit.gif' ]]
	
	[[ set link ]]
	 	/admin/{request.modul}/edit/{item['id']}/
	[[ endset ]]
	
	{forms.action(link, img)}
[[endif]]



[[if 'delete'  in  actions and (item['delete_security']=='0' or ignor_delete_security)]]

	[[set img = 'del.gif' ]]

	[[ set link ]]
	 	/admin/{request.modul}/delete/{item['id']}/
	[[ endset ]]
	
	{forms.action(link, img,'удалить',16,16,'Вы уверенны?')}
[[endif]]





