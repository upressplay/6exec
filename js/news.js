$(document).ready(function(){  

	site.news.initialize();

}); 

site.news = {
    id:"news",
	data:site.news_data,
    set_start:0,
    set_end:2,
    set_total:3,
    news_set:[],
    article_open:false,
    loading:false,
    transition_entry:-1,
    direction:"right",
    device_state:"",
	initialize : function () {


		this.render();

		var thisobj = this;

		$( window ).resize(function() { thisobj.resize(); });
	    
    },
    render : function () {

    	var thisobj = this;

    	site.trace("render");   

        $('#news_arrow_l').click(function(event){
            thisobj.next("left");
        });

        $('#news_arrow_r').click(function(event){
            thisobj.next("right");
        });

        this.set_articles();
            

        for (i = 0; i < this.news_set.length; i++) {
            site.trace("this.news_set[i] = "+this.news_set[i])
        }

        site.trace("site.segments[1] = "+site.segments[1]+" site.segments[2] = "+site.segments[2]);
        if(site.segments[1] == "news" && site.segments[2] != "") {
            TweenMax.delayedCall(1, thisobj.open_news, [site.segments[2]], this);
        }

        this.set_btns();
    	this.resize();


        
    },

    next : function (val) {
        
        site.trace("next val = "+val);
        
        var thisobj = this;
        var new_id = 0;
        var new_l = 0;

        if(this.loading) return;
        this.loading = true;

        this.direction = val;

        if(this.direction == "right") {

            
            new_id = this.news_set[this.news_set.length-1] + 1;

            if(new_id > this.data.length-1) new_id = 0;

            new_l = (this.news_img_w() + this.news_entry_lr()) * 3;

            this.news_set.push(new_id);


        } else {

            new_id = this.news_set[0] - 1;

            if(new_id < 0) new_id = this.data.length-1;

            new_l = (this.news_img_w() + this.news_entry_lr()) * -1;

            this.news_set.unshift(new_id);
        }

        site.trace("next            new_id = "+new_id+" tthis.news_set.length = "+this.news_set.length)
        

        $('#news_holder').append('<a href="/news/'+this.data[new_id].id+'" entry_id="'+this.data[new_id].id+'"><div class="news_entry" id="'+this.data[new_id].id+'"></div></a>');

        var new_content = new Image();  
        new_content.id = new_id;
        new_content.onload = function () {   

            thisobj.thumb_loaded(this.id);

        } 

        $('#'+this.data[new_id].id).css({
            "left":new_l+"px",
            "top":this.news_entry_tb()+"px",
            "opacity":"0"
            });

        $('#'+this.data[new_id].id).append('<div class="news_img"></div>');

        $('#'+this.data[new_id].id+" .news_img").append('<img src="'+this.data[new_id].img+'">');
        $('#'+this.data[new_id].id).append('<div class="news_info"></div>');
        $('#'+this.data[new_id].id+" .news_info").append('<div class="news_title">'+this.data[new_id].title+'</div>');

        $('#'+this.data[new_id].id+" .news_info").append('<div class="news_desc">'+this.data[new_id].short_desc+'</div>');

        $('#'+this.data[new_id].id+" .news_info").append('<div class="news_read_more">read more°</div>');


        new_content.src = this.data[new_id].img;

        
    },

    

    set_articles : function () {

        var i;

        $('#news_holder').html('');
        this.news_set = [];

        if(site.device == "mobile") {
            this.news_set.push(0); 

            this.remove_entry(this.data[1].id); 
            this.remove_entry(this.data[2].id);    
        } else {
            for (i = 0; i < this.data.length; i++) { 
                if(i < 3) {
                    this.news_set.push(i);
                }
            } 
            
        }

        for (i = 0; i < this.news_set.length; i++) { 

            var new_id = this.news_set[i];
            $('#news_holder').append('<a href="/news/'+this.data[new_id].id+'" entry_id="'+this.data[new_id].id+'"><div class="news_entry" id="'+this.data[new_id].id+'"></div></a>');

            var new_content = new Image();  
            new_content.id = new_id;
            new_content.onload = function () {   

                

            } 

            $('#'+this.data[new_id].id).css({
                "opacity":"0"
                });

            $('#'+this.data[new_id].id).append('<div class="news_img"></div>');

            $('#'+this.data[new_id].id+" .news_img").append('<img src="'+this.data[new_id].img+'">');
            $('#'+this.data[new_id].id).append('<div class="news_info"></div>');
            $('#'+this.data[new_id].id+" .news_info").append('<div class="news_title">'+this.data[new_id].title+'</div>');
            $('#'+this.data[new_id].id+" .news_info").append('<div class="news_desc">'+this.data[new_id].short_desc+'</div>');

            $('#'+this.data[new_id].id+" .news_info").append('<div class="news_read_more">read more°</div>');


            new_content.src = this.data[new_id].img;         
        } 

        this.set_btns();

    },

    thumb_loaded : function (val) {
        site.trace("thumb_loaded val "+val);

        this.set_btns();

        var entry_l;
        var entry_id;


            if(this.direction == "right") {
                entry_l = this.news_entry_lr() + this.news_img_w() * -1;
                entry_id = this.news_set[0];
                
            } else {
                entry_l = this.news_entry_lr() + this.news_img_w() * 4;
                entry_id = this.news_set[this.news_set.length-1];
            }

            site.trace("thumb_loaded --------  this.data[entry_id].id = "+this.data[entry_id].id+" entry_l = "+entry_l+" entry_id = "+entry_id)
            TweenMax.to($('#'+this.data[entry_id].id), .5, {left:entry_l+"px", opacity:0, onCompleteScope:this, onComplete:this.remove_entry, onCompleteParams:[this.data[entry_id].id], ease:"Power1.easeInOut", overwrite:2}); 


            if(this.direction == "right") {
                this.news_set.splice(0,1);
                site.trace("this.news_set.length = "+this.news_set.length)
                
            } else {
                this.news_set.pop();
            }

        this.resize();

        this.loading = false;
    },

    remove_entry : function (id) {
        site.trace("remove_entry id = "+id)

        $( "#news_holder a" ).each(function( index ) {


            
            var entry_id = $(this).attr('entry_id');
            site.trace("entry_id = "+entry_id +" id = "+id)

            if(entry_id == id) $(this).remove();
        });
    },

    open_news : function (val) {
        site.trace("open_news val = "+val)

        var i;
        var thisobj = this;

        if(this.article_open) {

            site.set_url("news");

            this.article_open = false;

            TweenMax.to($('#news_overlay'), .5, {height:0, ease:"Power1.easeInOut", onComplete:this.reset_article, onCompleteScope:this, overwrite:2}); 
        } else {

            
                
            for (i = 0; i < this.data.length; i++) {
                site.trace("this.data[i].id = "+this.data[i].id)
                if(this.data[i].id == val) {
                    $('body').prepend('<div id="news_overlay"></div>');

                    site.set_url("news",this.data[i].id);
                    
                    
                    $('#news_overlay').append('<div id="news_nav"></div>');
                    $('#news_nav').append('<div id="news_nav_img"><img src="'+site.cdn+'/images/news_header.png"></div>');
                    $('#news_nav').append('<div id="news_article_close" class="fa fa-arrow-circle-right" ></div>');

                    $('#news_overlay').append('<div id="news_article"></div>');
                    $('#news_article').append('<div id="news_article_img"></div>');

                    var new_content = new Image();  
                    new_content.id = i;
                    new_content.onload = function () {   

                        thisobj.img_loaded(this.id);

                    } 

                    $('#news_article_img').append('<img src="'+this.data[i].img+'">');

                    $('#news_article').append('<span id="news_article_top"></span>');
                    $('#news_article_top').append('<span class="news_article_title">'+this.data[i].title+'</span>');
                    
                    $('#news_article_top').append('<div class="news_share">Share: </div>');


                    $('#news_article_top .news_share').append('<div entryid="'+this.data[i].id+'" type="facebook" class="overlay_share_btn"><span class="fa fa-facebook" aria-hidden="true" ></span><span class="screen-reader-text">Facebook</span></div>');

                    $('#news_article_top .news_share').append('<div entryid="'+this.data[i].id+'" type="twitter" class="overlay_share_btn"><span class="fa fa-twitter" aria-hidden="true" ></span><span class="screen-reader-text">Twitter</span></div>');

                    $('#news_article_top .news_share').append('<div entryid="'+this.data[i].id+'" type="pinterest" class="overlay_share_btn"><span class="fa fa-pinterest" aria-hidden="true" ></span><span class="screen-reader-text">Twitter</span></div>');

                    $('#news_article_top .news_share').append('<div entryid="'+this.data[i].id+'" type="google" class="overlay_share_btn"><span class="fa fa-google" aria-hidden="true" ></span><span class="screen-reader-text">Twitter</span></div>');


                    $('#news_article_top .news_share').append('<div entryid="'+this.data[i].id+'" type="tumblr" class="overlay_share_btn"><span class="fa fa-tumblr" aria-hidden="true" ></span><span class="screen-reader-text">Twitter</span></div>');

                    $('#news_article_top .news_share').append('<div entryid="'+this.data[i].id+'" type="linkedin" class="overlay_share_btn"><span class="fa fa-linkedin" aria-hidden="true" ></span><span class="screen-reader-text">Linkedin</span></div>');

                     $('.overlay_share_btn').click(function(event){
                        var type = $(this).attr('type');
                        var id = $(this).attr('entryid');
                        thisobj.share_article(type,id);
                    });
                    
                    if(site.device == "desktop") {
                        $('.overlay_share_btn').mouseenter(function (event){  
                           TweenMax.to($( this ), .25, {color:"#666", ease:"Power1.easeInOut", overwrite:2}); 
                        });

                        $('.overlay_share_btn').mouseleave(function (event){  
                            TweenMax.to($( this ), .5, {color:"#0079be", ease:"Power1.easeInOut", overwrite:2}); 
                        });      
                    }

                    $('#news_article').append('<span class="news_article_desc">'+this.data[i].desc+'</span>');

         

                    $('#news_article_close').click(function(event){
                        thisobj.open_news();
                        });

                    if(site.device == "desktop") {
                        $('#news_article_close').mouseenter(function (event){  
                           TweenMax.to($( this ), .25, {color:"#b5b5b5", ease:"Power1.easeInOut", overwrite:2}); 
                        });

                        $('#news_article_close').mouseleave(function (event){  
                            TweenMax.to($( this ), .5, {color:"#FFF", ease:"Power1.easeInOut", overwrite:2}); 
                        });      
                    }
                           
                    new_content.src = this.data[i].img;
                    
                    this.resize();
                }
            }

            
            
        }

    },

    share_article : function (type, id) {
        
        site.trace("share_article type = "+type+" id = "+id);

        var i;
        for (i = 0; i < this.data.length; i++) {
            if(this.data[i].id == id) {
                var url = "http://"+site.site_url+"/"+this.id+"/"+this.data[i].id;
                var img = this.data[i].img;
                var title = this.data[i].title;   
                var desc = this.data[i].desc;  
                site.share({type:type, id:id, url:url, img:img, title:title, desc:desc});
            }
        }

    },

    reset_article : function () {
        $('#news_overlay').remove();
    },

    img_loaded : function (val) {

        this.article_open = true;

        TweenMax.to($('#news_overlay'), .5, {height:site.window_height(), ease:"Power1.easeInOut", overwrite:2}); 

    },

    set_btns : function () {

        var thisobj = this;


        $('#news_holder a').click(function(event){
            event.preventDefault();
            var id = $(this).attr('entry_id');
            thisobj.open_news(id);
        });


        if(site.device == "desktop") {
            $('.news_read_more').mouseenter(function (event){  
               TweenMax.to($( this ), .25, {color:"#0072bc", backgroundColor:'#fff', ease:"Power1.easeInOut", overwrite:2}); 
            });

            $('.news_read_more').mouseleave(function (event){  
                TweenMax.to($( this ), .5, {color:"#FFF", backgroundColor:'#0072bc', ease:"Power1.easeInOut", overwrite:2}); 
            });      
        }
        

    },
         
    resize : function () {

    	site.trace("resize");

        var thisobj = this;

    	if(site.device == "mobile") {

            if(this.device_state != "mobile") {
                this.set_articles();
            }
            this.device_state = "mobile";    
            
    	} else {
            if(this.device_state != "desktop") {
                this.set_articles();
            }
            this.device_state = "desktop";       
    	}

            

        $('.news_entry').css({
            "width":this.news_img_w()+"px",
            "margin":this.news_entry_tb()+"px "+this.news_entry_lr()+"px"
            });


        var entry_count = 0;

        site.trace("this.news_set.length = "+this.news_set.length);

        for (i = 0; i < this.news_set.length; i++) {
            
            site.trace("=========      this.news_set[i] = "+this.news_set[i])

            var entry_l = (this.news_entry_lr() + this.news_img_w()) * entry_count;
            
            site.trace("entry_l = "+entry_l);

            TweenMax.to($('#'+this.data[this.news_set[i]].id), .5, {left:entry_l+"px", top:this.news_entry_tb()+"px", opacity:1, ease:"Power1.easeInOut", overwrite:2}); 
            
            entry_count++;

                

            
        }

        
            
    },

    news_img_w : function () {
        var value = 400 * site.scale();
        if(site.device == "mobile") value = site.window_width() * .7;
        return value;
    }, 
    news_entry_tb : function () {
        var value = 10 * site.scale();
        if(site.device == "mobile") value = site.window_width() * .01;
        return value;
    }, 

    news_entry_lr : function () {
        var value = 55 * site.scale();
        if(site.device == "mobile") value = site.window_width() * .05;
        return value;
    }, 




    news_holder_w : function () {
        var value = 1364 * site.scale();;
        if(site.device == "mobile") value = site.window_width() * .7;
        return value;
    },

    news_article_close_size : function () {
        var value = 36 * site.scale();
        if(site.device == "mobile") value = site.window_width() * .08;
        return value;
    },

    news_article_close_leading : function () {
        var value = 75 * site.scale();
        if(site.device == "mobile") value = site.window_width() * .1;
        return value;
    }, 

    news_article_desc_size : function () {
        var value = 16 * site.scale();
        if(site.device == "mobile") value = site.window_width() * .04;
        return value;
    },

    news_article_desc_leading : function () {
        var value = 32 * site.scale();
        if(site.device == "mobile") value = site.window_width() * .07;
        return value;
    }, 

    news_article_title_size : function () {
        var value = 55 * site.scale();
        if(site.device == "mobile") value = site.window_width() * .08;
        return value;
    },

    news_article_title_leading : function () {
        var value = 75 * site.scale();
        if(site.device == "mobile") value = site.window_width() * .1;
        return value;
    }, 

    news_article_img_rb : function () {
        var value = 25 * site.scale();
        if(site.device == "mobile") value = site.window_width() * .02;
        return value;
    },

    news_article_img_w : function () {
        var value = 600 * site.scale();
        if(site.device == "mobile") value = site.window_width() * 1;
        return value;
    },

    news_read_more_size : function () {
        var value = 33 * site.scale();
        if(site.device == "mobile") value = site.window_width() * .06;
        return value;
    },

    news_read_more_leading : function () {
        var value = 48 * site.scale();
        if(site.device == "mobile") value = site.window_width() * .09;
        return value;
    }, 



    news_desc_size : function () {
        var value = 16 * site.scale();
        if(site.device == "mobile") value = site.window_width() * .04;
        return value;
    }, 

    news_desc_leading : function () {
        var value = 24 * site.scale();
        if(site.device == "mobile") value = site.window_width() * .05;
        return value;
    }, 

    news_title_size : function () {
        var value = 66 * site.scale();
        if(site.device == "mobile") value = site.window_width() * .09;
        return value;
    }, 

    news_title_leding : function () {
        var value = 60 * site.scale();
        if(site.device == "mobile") value = site.window_width() * .12;
        return value;
    }, 

    news_title_t: function () {
        var value = 10 * site.scale();
        if(site.device == "mobile") value = site.window_width() * .03;
        return value;
    }, 

    

    news_img_h : function () {
        var value = (216/400) * this.news_img_w();
        return value;
    },  

    arrow_tb : function () {
        var value = 240 * site.scale();
        if(site.device == "mobile") value = site.window_width() * .5;
        return value;
    }, 

    arrow_w : function () {
        var value = 68 * site.scale();
        if(site.device == "mobile") value = site.window_width() * .1;
        return value;
    },  

    arrow_h : function () {
        var value = (114/68) * this.arrow_w();
        return value;
    },  
    

};
