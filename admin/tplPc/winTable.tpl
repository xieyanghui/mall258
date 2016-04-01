<style type="text/css">

    #goodsList{
        margin-top: 10px;
        float: left;
    }
    .test{
        float: left;
    }

</style>
<{if $page['count'] ge 1 || $page['search'] ne "" }>
<div class='win'>
    <h1 class="win_head"><{$table['title']|default:'列表'}></h1>
    <ul>
        <li class='list_row_head'>
            <{foreach $table['column'] as $column}>
            <span name="<{$column['key']}>" style="width:<{$column['width']|default:'100'}>px"><{$column['name']}></span>
            <{/foreach}>
        </li>
        <{foreach $data as $row}>
            <li class='list_row' >
            <{foreach $table['column'] as $c1}>
                <span title="<{$row[$c1['key']]}>"  style="width:<{$c1['width']|default:'100'}>px"><{$row[$c1['key']]}></span>
            <{/foreach}>
            <span class="list_delete" >×</span>
        </li>
        <{/foreach}>
        <!--<{section name=index loop=$row}>-->
        <!--<li class='list_row'>-->
            <!--<span title="<{$row[index]['g_number']}>"><{$row[index]['g_number']}></span>-->
            <!--<span title="<{$row[index]['g_name']}>"><{$row[index]['g_name']}></span>-->
            <!--<span title="<{$row[index]['gt_name']}>"><{$row[index]['gt_name']}></span>-->
            <!--<span title="<{$row[index]['g_status']}>"><{$row[index]['g_status']}></span>-->
            <!--<span title="<{$row[index]['g_reg']}>"><{$row[index]['g_reg']}></span>-->
            <!--<span class="delete" value="<{$row[index]['g_id']}>">×</span>-->
        <!--</li>-->
        <!--<{/section}>-->

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
            <{if $table['search'] }>
            <select id="search_select" class="form_div">
                <{foreach $table['column'] as $c2 }>
                    <{if !$c2['noSearch'] }>
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
    </ul>
</div>
<{/if}>
<div class="add_show_button button">增加商品</div>
<div class="test button" >aaa</div>
<script type="text/javascript">
    $(function () {
        PageSearch(document.URL);
        CRUD.add('./inc/goodsAdd.php',500);
        CRUD.update('./inc/goodsUpdate.php',500);
        CRUD.delete('./server/goodsDeleteSer.php','./inc/goodsInfo.php','确定要删除吗?','删除之之后很严重哦');
    });
    $(function(){
        $('.test').click(function(){
            $.post('./inc/goodsAdd2.php',{'g_id':1,'g_price':1888.22,'g_img':"aaaaaaaaaa"},function(data){
                $('#CRUD').html(data);
                Resize.resizeAdd(1200,100);
            });
        });
    });
</script>