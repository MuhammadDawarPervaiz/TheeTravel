"use strict";

(function($){
    function ArContactUs(element, options){
        this.settings = null;
        this.options = $.extend({}, ArContactUs.Defaults, options);
        this.$element = $(element);
        this.init();
    };
    ArContactUs.Defaults = {
        align: 'right',
        secs: 0,
        drag: false,
        ajaxUrl: 'server.php',
        phonePlaceholder: '+X-XXX-XXX-XX-XX',
        callbackSubmitText: 'Waiting for call',
        reCaptcha: false,
        reCaptchaAction: 'callbackRequest',
        reCaptchaKey: '',
        errorMessage: 'Connection error. Please try again.',
        items: [],
        callbackFormText: 'Please enter your phone number<br>and we call you back soon',
        closeIcon: '<svg width="14" height="14" viewBox="0 0 14 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Canvas" transform="translate(-4087 108)"><g id="Vector"><use xlink:href="#path0_fill" transform="translate(4087 -108)" fill="currentColor"></use></g></g><defs><path id="path0_fill" d="M 14 1.41L 12.59 0L 7 5.59L 1.41 0L 0 1.41L 5.59 7L 0 12.59L 1.41 14L 7 8.41L 12.59 14L 14 12.59L 8.41 7L 14 1.41Z"></path></defs></svg>'
    };
    ArContactUs.prototype.init = function(){
        this.settings = $.extend({}, this.options);
        this.$element.addClass('arcontactus-widget');
        if (this.settings.align === 'left'){
            this.$element.addClass('left');
        }else{
            this.$element.addClass('right');
        }
        this.$element.addClass('active');
        this.initCallbackBlock();
    };
    ArContactUs.prototype.initCallbackBlock = function(){
        var $container = $('<div>', {
            class: 'callback-countdown-block'
        });
        var $close = $('<div>', {
            class: 'callback-countdown-block-close'
        });
        $close.append(this.settings.closeIcon);
        
        var $formBlock = $('<div>', {
            class: 'callback-countdown-block-phone'
        });
        $formBlock.append('<p>' + this.settings.callbackFormText + '</p>');
        
        var $form = $('<form>', {
            action: this.settings.ajaxUrl,
            method: 'POST'
        });
        
        var $formGroup = $('<div>', {
            class: 'callback-countdown-block-form-group'
        });
        var $inputAction = $('<input>', {
            name: 'action',
            type: 'hidden',
            value: 'callback'
        });
        var $inputGtoken = $('<input>', {
            name: 'gtoken',
            id: 'ar-g-token',
            type: 'hidden',
            value: ''
        });
        var $inputPhone = $('<input>', {
            name: 'gtoken',
            id: 'arcontactus-message-callback-phone',
            required: '',
            type: 'tel',
            value: '',
            placeholder: this.settings.phonePlaceholder
        });
        var $inputSubmit = $('<input>', {
            id: 'arcontactus-message-callback-phone-submit',
            type: 'submit',
            value: this.settings.callbackSubmitText
        });
        
        $formGroup.append($inputAction);
        $formGroup.append($inputGtoken);
        $formGroup.append($inputPhone);
        $formGroup.append($inputSubmit);
        
        $form.append($formGroup);
        $formBlock.append($form);
        
        $container.append($close);
        $container.append($formBlock);
        this.$element.append($container);
    };
    $.fn.contactUs = function(option){
        var args = Array.prototype.slice.call(arguments, 1);
        return this.each(function() {
            var $this = $(this),
                data = $this.data('ar.contactus');

            if (!data) {
                data = new ArContactUs(this, typeof option == 'object' && option);
                $this.data('ar.contactus', data);
            }

            if (typeof option == 'string' && option.charAt(0) !== '_') {
                data[option].apply(data, args);
            }
        });
    };
    $.fn.contactUs.Constructor = ArContactUs;
}(jQuery));