<div id="menus">
    <ul>
        <{foreach $menus as $menu}>
        <li class="left_menu ajax_menu" href="<{$menu['pre_menu']|default:$HTTP_MODEL}><{$menu['url']}>"><{$menu['name']}></li>
        <{/foreach}>
    </ul>
</div>
<div id='contents'>
    <{$contents|default:""}>
</div>