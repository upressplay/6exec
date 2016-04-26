

site.home = {

    id:"home",
    data:[],
    current:-2,
    new:0,
    loading:false,
    initialize : function () {

        var thisobj = this;

        $( window ).resize(function() { thisobj.resize(); });

        this.data.push({img:"images/home_01.jpg", loaded:false});
        this.data.push({img:"images/home_02.jpg", loaded:false});
        this.data.push({img:"images/home_03.jpg", loaded:false});

        this.render();


    },

    render : function () {

        site.trace(this.id+" render");

        var thisobj = this;
       
        this.resize();

    },

    load : function () {

        this.new = this.current + 1;

        var photo_url = this.data[this.new].img;
        var new_img = new Image();  
        new_img.id = 
        new_img.onload = function () {   
            thisobj.img_loaded(this.id);
        }

        $('#home_anim').append('<div id="home_anim"><img src="'+photo_url+'"></div>');

        new_img.src = photo_url;

    },

    
    resize : function () {

        if(site.device == "mobile") {
            
            
        } else {
            
        }


        

        
    },

    prizes_holder_w : function () {
        var value = 1400 * site.scale();
        if(site.device == "mobile") value = site.window_width() * 1;
        return value;
    },

   

    
    
    
};


