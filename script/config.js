require.config({
    paths:{
        'jquery':['//cdn.bootcss.com/jquery/2.2.1/jquery.min','jquery.min'],

        'underscore':['//cdn.bootcss.com/underscore.js/1.8.3/underscore-min','underscore-min'],

        'plupload':['//cdn.bootcss.com/plupload/2.1.8/plupload.min','plupload.min'],

        'plupload.full':['//cdn.bootcss.com/plupload/2.1.8/plupload.full.min','plupload.full.min'],

        'verify':['verify-hui'],
        'qiniu':['//cdn.staticfile.org/qiniu-js-sdk/1.0.14-beta/qiniu.min','qiniu.min'],
        'main':['main'],
        'jquery-ui':['//cdn.bootcss.com/jqueryui/1.11.4/jquery-ui.min','jquery-ui.min']
    },
    urlArgs: "bust=" +  (new Date()).getTime(),
    shim:{
        'qiniu':['jquery','plupload','plupload.full'],
        'verify':['jquery'],
        'jquery-ui':['jquery']
    }
});
