<div id="menus">
    <ul>
        <{foreach $menus as $menu}>
        <li class="left_menu" href="<{$menu['pre_menu']|default:$HTTP_MODEL}><{$menu['url']}>"><{$menu['name']}></li>
        <{/foreach}>
    </ul>
</div>
<div id='contents' href="<{$sub_page}>" args="<{$sub_args}>")>
</div>
<script>
    if($('#contents').attr('href') !=null){
        var href = $('#contents').attr('href');
        var args = $('#contents').attr('args');
        $('.left_menu').each(function(){
            if($(this).attr('href').indexOf(href) >0){
                $(this).attr('href',$(this).attr('href')+args);
                $(this).trigger('click');
            }
        });

    }

</script>