$(document).ready(function(){  

    site.nav.initialize();
    
}); 

site.nav = {

    id:"nav",
    data:[],
    current:-1,
    new:0,
    loading:false,
    open:false,
    scroll_urls:['http://6degreesinc.com/about/','http://6degreesinc.com/team/','http://6degreesinc.com/services/', 'http://6degreesinc.com/news/','http://6degreesinc.com/contact/'],
    initialize : function () {

        var thisobj = this;

        $( window ).resize(function() { thisobj.resize(); });

        this.render();


    },

    render : function () {

        site.trace(this.id+" render");

        var thisobj = this;

 

        if(site.device !="desktop") {
            $('#nav_toggle').click(function (event){  
                thisobj.toggle();
            }); 
        }

        if(site.device == "desktop") {
            $('.img_btn').mouseenter(function (event){  
                TweenMax.to($( this ).find('.img_btn_rest'), .5, {opacity:0, ease:"Power1.easeInOut", overwrite:2}); 
                TweenMax.to($( this ).find('.img_btn_roll'), .5, {opacity:1, ease:"Power1.easeInOut", overwrite:2}); 
            });

            $('.img_btn').mouseleave(function (event){  
                TweenMax.to($( this ).find('.img_btn_rest'), .5, {opacity:1, ease:"Power1.easeInOut", overwrite:2}); 
                TweenMax.to($( this ).find('.img_btn_roll'), .5, {opacity:0, ease:"Power1.easeInOut", overwrite:2}); 
            }); 

            $('.nav_btn').add('.social_btn').mouseenter(function (event){  
                TweenMax.to($( this ), .5, {color:'#fff', ease:"Power1.easeInOut", overwrite:2}); 
            });

            $('.nav_btn').add('.social_btn').mouseleave(function (event){  
                TweenMax.to($( this ), .5, {color:'#186693', ease:"Power1.easeInOut", overwrite:2}); 
            });      
        }
        
        this.resize();

    },

    

    toggle : function () {

        site.trace(this.id+" toggle");

        var thisobj = this;

        this.new = this.current + 1;
        if(this.open) {
            this.open = false;
            TweenMax.to($('#nav_btns_toggle'), .5, {height:'0px', ease:"Power1.easeInOut", overwrite:2}); 
        } else {
            this.open = true;
            TweenMax.to($('#nav_btns_toggle'), .5, {height:this.nav_height()+'px', ease:"Power1.easeInOut", overwrite:2}); 
        }


    },

    
    
    resize : function () {

        if(site.device == "mobile") {
            
            
        } else {
            
        }

        
    },

    nav_height : function () {
        var value = site.window_height() - $('#nav_toggle').height();
        return value;
    },

   

    
    
    
};


