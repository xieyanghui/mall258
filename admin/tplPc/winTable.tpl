<{if $page['count'] ge 1 || $page['search'] ne "" }>
<div class=" <{if !empty($page['float'])}>float_win<{/if}> win">
    <h1 class="win_head"><{$view['table']['title']|default:'列表'}><{if !empty($page['float'])}><div class="show_win_close">×</div><{/if}></h1>
    <ul>
        <li class='list_row_head'>
            <{foreach $view['table']['column'] as $column}>
            <span name="<{$column['key']}>" value="<{$column['value']|default:''}>"  style="width:<{$column['width']|default:'100'}>px"><{$column['name']}></span>
            <{/foreach}>
        </li>
        <{foreach $data as $row}>
        <li class='list_row' name="<{$row[$view['table']['id']]}>">
            <{foreach $view['table']['column'] as $c1}>
                <span name="<{$c1['key']}>" title="<{$row[$c1['key']]}>"  style="width:<{$c1['width']|default:'100'}>px"><{$row[$c1['key']]}></span>
            <{/foreach}>
            <{if empty($page['float'])}>
            <{if !empty($view['delete']) }>
            <span class="list_delete" >×</span>
            <{/if}>
            <{/if}>

        </li>
        <{/foreach}>

        <!--分页搜索-->
        <form class = 'list_form'>
            <input type="hidden" name="float" value="<{$page['float']}>" />
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

        <{if empty($view['table']['noSearch'] )}>
        <!--搜索-->
        <li class="list_row_search">
            <input type="text"  class="form_div search_value" placeholder="搜索关键字" value="<{$page['search']['key']}>">
            <{if !empty($view['table']['search']) }>
            <select  class="search_select form_div">
                <{foreach $view['table']['column'] as $c2 }>
                    <{if empty($c2['noSearch']) || !$c2['noSearch'] }>
                    <option value="<{$c2['key']}>"><{$c2['name']}></option>
                    <{/if}>
                <{/foreach}>
            </select>
            <{/if}>
            <div class="list_search button">搜索</div>
            <div  class="search_delete delete">×</div>
            <span class="list_row_sum" title="每页显示3行">3</span>
            <span class="list_row_sum" title="每页显示10行">10</span>
            <span class="list_row_sum" title="每页显示15行">15</span>
            <span class="list_row_sum" title="每页显示20行">20</span>
        </li>
        <{/if}>
    </ul>


    <!--增加-->
    <{if empty($page['float'])}>
    <{if !empty($view['add'])  }>
    <div class="add_button ajax_menu" href="<{$HTTP_MODEL}><{$view['add']}>">+</div>
    <{/if}>
    <{/if}>
</div>
<{/if}>


<{if empty($page['float'])}>
<!--删除-->
<{if !empty($view['delete']) }>
<script type="text/javascript">
    $(function(){
        $('.win').on('click','.list_row > span.list_delete',function(e){
            var self = $(this);
            dialogue(function(){
                $.getJSON("<{$HTTP_MODEL}><{$view['delete']}>?id="+self.parents('.list_row').attr('name'),function(data){
                    toast(data.status,data.megs);
                    $(this).parents('.win').parent().load("<{$page['url']}>",$('#list_form').serialize());
                });
            });
            e.stopPropagation();
        });
    });
</script>
<{/if}>
<!--更新-->
<{if !empty($view['update'])}>
<script type="text/javascript">
    $(function(){
        $('.list_row').each(function(){
            $(this).attr('href','<{$HTTP_MODEL}><{$view['update']}>?id='+$(this).attr('name'));
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
<{else}>
<script>
    $(function(){
        var callback = $("#"+"<{$page['float']}>");
        var args = "<{$view['table']['float_args']|default:''}>";
        $('.list_row').dblclick(function(){
            var x = new Object();
            x.id = $(this).attr('name');
            args = args.split(',');
            for(var a in args){
                x[args[a]] = $(this).find("[name='"+args[a]+"']").html();
            }
            callback.trigger('call',x);
            $(this).parents('.win').hide();
            loading.end();
        });

        $('.show_win_close').click(function(){
            $(this).parents('.win').hide();
            loading.end();
        });
    });
</script>
    <script type="text/javascript">
        $(function(){
            PageSearch("<{$page['url']}>");
        });
    </script>
<{/if}>



