define([
    'jquery',
    'underscore',
    'mage/template'
    ], function (
        $,
        _,
        template
    ) {
        function main(config, element) {
            var $element = $(element);
            var myUrl = config.AjaxUrl;
            $(document).on('click','noob',function() {
                    var param = 'ajax=1';
                        $.ajax({
                            showLoader: true,
                            url: myUrl,
                            data: param,
                            type: "POST",
                            dataType: 'json'
                        }).done(function (data) {
                            $('#test').removeClass('hideme');
                            var html = template('#test', {posts:data}); 
                            $('#test').html(html);
                        });
                });
        };
    return main;
});