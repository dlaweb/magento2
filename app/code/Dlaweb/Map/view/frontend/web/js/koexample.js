define(
    ['uiComponent'] , function (Component){

        return Component.extend({
            initialize: function(){
                this._super();
                this.time = Date();

                this.observe(['time']);

                setInterval(this.flush.bind(this), 1000);

                this.sayHello = "Hello this is content populated with KO!";
            },

            flush: function () {
                this.time(Date());
            }
        });
    }
);