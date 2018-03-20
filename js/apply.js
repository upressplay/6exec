$(document).ready(function(){  

    site.apply.initialize();
    
}); 

site.apply = {

    id:"apply",
    data:[],
    current:-1,
    new:0,
    loading:false,
    initialize : function () {

        var thisobj = this;

        $( window ).resize(function() { thisobj.resize(); });

        this.data = site.position_data;

        this.render();


    },

    render : function () {

        site.trace(this.id+" render");

        var thisobj = this;

        var apply_content = $("#apply_content");

        $.ajax({
            type: "GET",
            url: "https://bigbiller-feeds-prod.s3.amazonaws.com/uploads/feeds/job_board/job_feed/05e36101c9623d142dce409d35be7f75.xml",
            dataType: "xml",
            success: function(xml){
                $(xml).find('job').each(function(i, val){
                     var id = $(val).find("jobid").text();
                     var url = $(val).find("url").text();
                     var title = $(val).find("positiontitle").text();
                     var desc = $(val).find("description").text();
                     desc = desc.substring(0,400);
                     desc = desc.replace(/<[^>]+>/g, '');
                     desc = desc + "...";
                     var location = $(val).find("city").text() +", "+$(val).find("state").text();
                     var salary = $(val).find("salary").text();
                     salary = "$80,000 to $100,000";

                     apply_content.append('<div id="position_'+ i + '" class="position"></div>');

                     $("#position_"+i).append('<a href="' + url + '"><div id="apply_btn" class="circle_blue"><div class="circle_content"><div class="circle_txt"><div class="fa fa-pencil-square-o apply_icon" aria-hidden="true"></div>apply°</div><!-- circle_txt --></div><!-- circle_content --></div><!-- apply_btn --></a><div id="apply_info"><div class="apply_title">'+title+'</div><!-- apply_title --><div class="blue_sub">' + location + '</div><div class="gray_desc">'+desc+'</div><!-- apply_desc --><div id="pay_range" class="gray_subhead">'+salary+'</div><!-- pay_range --></div><!-- apply_info -->');

                     site.trace(id+" i = "+i);
                });

                thisobj.next();
            }
        });


        
       
        this.resize();

    },

    next : function () {

        site.trace(this.id+" next");

        var thisobj = this;

        this.new = this.current + 1;
        if(this.new > this.data.length-1) this.new = 0;

        site.trace(this.new+" "+this.current);

        TweenMax.to($('#position_'+this.new), .5, {delay:.5, opacity:1, onStart:site.div_display, onStartParams:['#position_'+this.new, 'block'], ease:"Power1.easeInOut", overwrite:2}); 
        TweenMax.to($('#position_'+this.current), .5, {opacity:0, onComplete:site.div_display, onCompleteParams:['#position_'+this.current, 'none'], ease:"Power1.easeInOut", overwrite:2}); 

        this.current = this.new;

        if(this.data.length > 1) TweenMax.delayedCall(6, this.next, [], this);

    },

    
    resize : function () {

        if(site.device == "mobile") {
            
            
        } else {
            
        }


        

        
    },

    
};


