define([
    'jquery',
    'uiComponent',
    'ko',
    'mage/storage',
    'Magento_Checkout/js/model/url-builder',
    'mage/translate'
], function ($, Component,ko, storage, urlBuilder,$t) {
    'use strict';

    return Component.extend({
        
        defaults: {
            template: 'Betagento_CmsUiComponent/view/cms_block.html'
        },
        /**
         * @override
         */
        initialize: function (config, element) {
            
            this.block_id = config.block_id;
            this.cms_content = '';             
            this._super();   
        },
        initObservable: function () {
            
            this.errorMessages = [];
            this.sucessMessages = [];
            this.email = '';
            this.observe(['cms_content']);
            this._super();
            this.getHtmlContent();
            return this;
        },

        getHtmlContent : function(){
            var me = this;
            return storage.get( urlBuilder.createUrl('/cmsuicomponent/:blockId/', {blockId : me.block_id} ),false)
            .done(function (response) {
                if(response.content){
                    me.cms_content(response.content);
                }
            })
            .fail(function (response) {
                console.log(response);
            });
        }

    });
});
