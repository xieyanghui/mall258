<{if $page['count'] ge 1 || $page['search'] ne "" }>
<div class='win '>
    <h1 class="win_head"><{$table['title']|default:'列表'}></h1>
    <ul>
        <li class='list_row_head'>
            <{foreach $table['column'] as $column}>
            <span name="<{$column['key']}>" style="width:<{$column['width']|default:'100'}>px"><{$column['name']}></span>
            <{/foreach}>
        </li>
        <{foreach $data as $row}>
        <li class='list_row' name="<{$row[$table['id']]}>">
            <{foreach $table['column'] as $c1}>
                <span title="<{$row[$c1['key']]}>"  style="width:<{$c1['width']|default:'100'}>px"><{$row[$c1['key']]}></span>
            <{/foreach}>
            <{if !empty($delete) }>
            <span class="list_delete" >×</span>
            <{/if}>
        </li>
        <{/foreach}>

        <!--分页搜索-->
        <form id = 'list_form'>
            <input type="hidden" name="sort" value="<{$page['sort']['key']}>" />
            <input type="hidden" name="sortLine" value="<{$page['sort']['sortLine']}>" />
            <input type="hidden" name="search" value="<{$page['search']['key']}>" />
            <input type="hidden" name="searchLine" value="<{$page['search']['searchLine']}>" />
            <input type="hidden" name="page" value="<{$page['page']}>" />
            <input type="hidden" name="pageRow" value="<{$page['pageRow']}>" />
        </form>
        <{if $page['count'] ge $page['pageRow']+1}>
        <!--分页-->
        <li class="list_row_page">
            <div class="  pageButton  <{if $page['page'] ge 1}>button<{else}> pageOff <{/if}>">上一页</div>
            <{section name=loop loop=$page['pages']}>
            <div class="<{if $page['start']+$smarty.section.loop.index eq $page['page']}>
                pageOn<{/if}>  pageNumber"><{$page['start']+$smarty.section.loop.index+1 }>
            </div>
            <{/section}>
            <div class=" pageButton <{if $page['page']+1 lt $page['countPages']}>  button<{else}> pageOff <{/if}>">下一页</div>
        </li>
        <{/if}>

        <{if empty($table['noSearch'] )}>
        <!--搜索-->
        <li class="list_row_search">
            <input type="text" id="search_value" class="form_div" placeholder="搜索关键字" value="<{$page['search']['key']}>">
            <{if !empty($table['search']) }>
            <select id="search_select" class="form_div">
                <{foreach $table['column'] as $c2 }>
                    <{if empty($c2['noSearch']) || !$c2['noSearch'] }>
                    <option value="<{$c2['key']}>"><{$c2['name']}></option>
                    <{/if}>
                <{/foreach}>
            </select>
            <{/if}>
            <div id = "list_search" class="button">搜索</div>
            <div id = "search_delete" class="delete">×</div>
            <span class="list_row_sum" title="每页显示3行">3</span>
            <span class="list_row_sum" title="每页显示10行">10</span>
            <span class="list_row_sum" title="每页显示15行">15</span>
            <span class="list_row_sum" title="每页显示20行">20</span>
        </li>
        <{/if}>
    </ul>
</div>
<{/if}>

<!--增加-->
<{if  !empty($add) }>
<div class="add_button button ajax_menu" href="<{$HTTP_MODEL}><{$add['url']}>"><{$add['label']}></div>
<{/if}>
<!--删除-->
<{if !empty($delete) }>
<script type="text/javascript">
    $(function(){
        $('.list_row > span.list_delete').click(function(e){
            var self = $(this);
            dialogue(function(){
                $.getJSON("<{$HTTP_MODEL}><{$delete}>?id="+self.parents('.list_row').attr('name'),function(data){
                    toast(data.status,data.megs);
                    $('#contents').load(document.URL,$('#list_form').serialize());
                });
            });
            e.stopPropagation();
        });
    });
</script>
<{/if}>
<!--更新-->
<{if !empty($update)}>
<script type="text/javascript">
    $(function(){
        $('.list_row').each(function(){
            $(this).attr('href','<{$HTTP_MODEL}><{$update}>?id='+$(this).attr('name'));
            $(this).addClass('ajax_menu');
        });
    });
</script>
<{/if}>
<script type="text/javascript">
    $(function(){
        PageSearch(document.URL);
    });
</script>