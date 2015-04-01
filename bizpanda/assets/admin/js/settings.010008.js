(function($){
    
    var settings = {
        
        init: function() {
            
            this.basic.init();
            this.social.init();
            this.subscription.init();
            this.advanced.init();
            this.text.init();    
        },
        
        /** ---
         * Basic Options
         */
        
        basic: {
            
            init: function() {
                

            }
        },
        
        /** ---
         * Social Options
         */
        
        social: {
            
            init: function() {
                
                $("#opanda_twitter_use_dev_keys").change(function(){
                    var $options = $("#opanda-twitter-custom-options");
                    if ( 'default' === $(this).val() ) $options.fadeOut();
                    else $options.fadeIn();
                }).change();
            }   
        },
        
        /** ---
         * Subscription Options
         */
        
        subscription: {
            
            init: function() {
                
                $("#opanda_subscription_service").change(function(){
                    
                    var value = $(this).val();
                    var $options = $("#opanda-" + value + "-options");
                    
                    $(".opanda-mail-service-options").hide();
                    $options.fadeIn();
                    
                    if ( 'none' !== value ) {
                        $("#opanda-all-services-options").fadeIn();
                    }
                    
                }).change();
            }  
        },
        
        /** ---
         * Advanced Options
         */
        
        advanced: {
            
            init: function() {
                
                $("#opanda_dynamic_theme").change(function(){
                    var isYes = $(this).is(":checked");

                    if ( isYes ) {
                        $("#onp-dynamic-theme-options").fadeIn();
                    } else {
                        $("#onp-dynamic-theme-options").hide();  
                    }
                }).change();
            }
        },
        
        text: {
            
            init: function() {
               
                $("#opanda_terms_enabled").change(function(){
                    
                    if ( $(this).is(":checked") ) { 
                        $("#opanda-enabled-options").fadeIn();
                    } else {
                        $("#opanda-enabled-options").hide();
                    }
                }).change();
                
                $("#opanda_terms_use_pages").change(function(){
                    
                    if ( $(this).is(":checked") ) { 
                        $("#opanda-nopages-options").hide();            
                        $("#opanda-pages-options").fadeIn();
                    } else {
                        $("#opanda-nopages-options").fadeIn(); 
                        $("#opanda-pages-options").hide();
                    }
                }).change();                
            }
        }
    };
    
    $(function(){
        settings.init();
    });
    
})(jQuery)