<div id="top">
    <div class="top_util">
        <div class="top_left">
            <{if !empty($user)}>
            <{else}>
                <div>
                   欢迎光临![<a>请登录]</a>或[<a>注册</a>]
                </div>
            <{/if}>
        </div>
        <div class="top_center">
            <input name="search" type="text" id="search" />
            <div><a>搜索</a></div>
        </div>
        <div class="top_right">
            <ul>
                <li><a>购物车</a></li><span>|</span>
                <li><a>收藏夹</a></li><span>|</span>
                <li><a>随便逛逛</a></li><span>|</span>
                <li><a>联系我们</a></li>
            </ul>
        </div>
    </div>

</div>