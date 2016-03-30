        <form id = 'list_form'>
            <input type="hidden" name="sort" value="<{$page['sort']['key']}>" />
            <input type="hidden" name="sortLine" value="<{$page['sort']['sortLine']}>" />
            <input type="hidden" name="search" value="<{$page['search']['key']}>" />
            <input type="hidden" name="searchLine" value="<{$page['search']['searchLine']}>" />
            <input type="hidden" name="page" value="<{$page['page']}>" />
            <input type="hidden" name="pageRow" value="<{$page['pageRow']}>" />
        </form>
        <{if $page['count'] ge $page['pageRow']+1}>
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
        <li class="list_row_search">
            <input type="text" id="search_value" class="form_div" placeholder="搜索关键字" value="<{$page['search']['key']}>">
            <{if !empty($myOptions) }>
                <{html_options name=search_select id=search_select class=form_div  options=$myOptions selected=$mySelect }>
            <{/if}>
            <!--<select id="search_select" class="form_div">-->
                <!--<option >登录账号</option>-->
                <!--<option>姓名</option>-->
                <!--<option>权限级别</option>-->
            <!--</select>-->
            <div id = "list_search" class="button">搜索</div>
            <div id = "search_delete" class="delete">×</div>
                <span class="list_row_sum" title="每页显示3行">3</span>
                <span class="list_row_sum" title="每页显示10行">10</span>
                <span class="list_row_sum" title="每页显示15行">15</span>
                <span class="list_row_sum" title="每页显示20行">20</span>
        </li>