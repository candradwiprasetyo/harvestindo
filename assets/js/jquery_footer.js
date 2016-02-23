// JavaScript Document

jQuery(document).ready(function($){
        var $el, leftPos, newWidth,
            $mainNav = $("#menugroup");

        $mainNav.append("<li id='magic-line'></li>");
        var $magicLine = $("#magic-line");


        /*$magicLine
            .width($(".current_page_item").width())
            .css("left", $(".current_page_item a").position().left)
            .data("origLeft", $magicLine.position().left)
            .data("origWidth", $magicLine.width());*/
                        
            $magicLine
                .width(0)
                .css("left", $(".current_page_item a").position().left)
                .data("origLeft", $magicLine.position().left)
                .data("origWidth", $magicLine.width());

                    
        $("#menugroup li a").hover(function() {
            $el = $(this);
            leftPos = $el.position().left + ($el.parent().width() * 0.15);
            newWidth = $el.parent().width() * 0.7;
            $magicLine.stop().animate({
                left: leftPos,
                width: newWidth
            });
        }, function() {
            $magicLine.stop().animate({
                left: $magicLine.data("origLeft"),
                width: $magicLine.data("origWidth")
            });    
        });
        
        $(".hexg h3").css("margin-top", "12%");
        $(".hexg .hexgcontent").css("background-position", "center 22%");
        
        $(".hexg").hover(function(){
            $(this).find("h3").css("margin-top", "0");
            $(this).find(".hexgcontent").css("background-position", "center 12%");
            $(this).find("p").fadeIn("fast");
        }, function() {
            $(this).find("h3").css("margin-top", "12%");
            $(this).find(".hexgcontent").css("background-position", "center 22%");
            $(this).find("p").fadeOut("fast");
        });

        $("#toTop").click(function(){

            // Disable the default behaviour when a user clicks an empty anchor link.
             // (The page jumps to the top instead of // animating)
             event.preventDefault();

            // Animate the scrolling motion.
             $("html, body").animate({
             scrollTop:0
             },"slow");

            });

        $(".usermenu").hide();

        $("#openusermenu").click(function(){
                       $(".usermenu").slideToggle();
        });


        $(".downarrow, #gotowhatis").click(function(){
                $("html, body").animate({
                     scrollTop:$(".whatishead").offset().top - parseInt($(".whatishead").css("margin-top"))
                     },"slow");
        });
        
        $(".downarrow, #gotohprod").click(function(){
            $("html, body").animate({
                     scrollTop:$(".hprodwrap").offset().top - parseInt($(".hprodwrap").css("margin-top"))
                     },"slow");
        });
        
        $("#gotohshop").click(function(){
            $("html, body").animate({
                     scrollTop:$(".hshop").offset().top - parseInt($(".hshop").css("margin-top"))
                     },"slow");
        });

        seticonpos();

        $(window).resize(function(){
                    seticonpos();    
            });

        function seticonpos(){
                var btcwrapheight = $(".toppernum:nth-child(2) .numinner").height();
                var btcheight = $(".toppernum:nth-child(2) .numinner .numicon").height();
                var btcdelta = btcwrapheight - btcheight;
                $(".toppernum:nth-child(2) .numinner .numicon").css("margin-top", btcdelta+"px");

                var ghswrapheight = $(".toppernum:nth-child(3) .numinner").height();
                var ghsheight = $(".toppernum:nth-child(3) .numinner .numicon").height();
                var ghsdelta = ghswrapheight - ghsheight;
                $(".toppernum:nth-child(3) .numinner .numicon").css("margin-top", ghsdelta+"px");
                
                var tphei = $(".toppera").css("height");
                $(".galbg").css("background-position", "center -" + tphei);
                
                var vmenuheight = $(".vmenu").outerHeight();
                $(".vmenu .rpointy").css("height", vmenuheight + "px");
                
                var moptbigheight = $(".moptbig").outerHeight();
                $(".moptsmall").css("padding-top", (moptbigheight * 0.1) + "px");
                $(".moptsmall").css("padding-bottom", (moptbigheight * 0.1) + "px");
                
                var dbhex1w = $(".dbhex1").outerWidth();
                $(".dbhex1").css("height", (dbhex1w*0.886) + "px");
                
                var dbhex2w = $(".dbhex2").outerWidth();
                $(".dbhex2, .dbhex3, .dbhex4").css("height", (dbhex2w*0.886) + "px");
                
                $(".dbhex2, .dbhex3").css("top", (dbhex1w*0.54) + "px");
                
                $(".dbhex2").css("left", (dbhex1w*0.23) + "px");
                $(".dbhex3").css("right", (dbhex1w*0.23) + "px");
                $(".dbhex4").css("left", (dbhex1w*0.87) + "px");
                
                $(".dbhex").css("padding-bottom", (dbhex1w) + "px");
                
                
                //this has to be on bottom
                var panleftheight = $(".panleft").outerHeight();
                $(".panright").css("min-height", panleftheight + "px");
                var panrightheight = $(".panright").outerHeight();
                $(".panleft").css("min-height", panrightheight + "px");
        }
        
        $(".btnproceed").click(function(){
            var pp = $("#rd_pf:checked").val();
            window.location = "http://www.hashfield.io/draft/buy-hashrate/?p=" + pp;
        });
        
        $(".btntransdet").click(function(){
            window.location = "http://www.hashfield.io/draft/transactions/";
        });
        
        $(".condetbtn").click(function(){
            window.location = "http://www.hashfield.io/draft/contracts/?p=certificate";
        });
        
        $(".lmine").click(function(event){
                var lid = event.target.id;
                lid = lid.substr(1);
                
                if($("#o" + lid).is(':visible')){
                    $("#o" + lid).slideUp("fast"); 
                }
                else{
                    $(".moptsub").css("display", "none");
                    setTimeout(function(){ 
                        $("#o" + lid).slideDown("fast"); 
                    }, 50);
                }
                seticonpos(); 
                return false;
        });
        
        $("#invcancel").click(function(){
            window.location = "http://www.hashfield.io/draft/buy-hashrate/";
        });
        $(".btnbuy").click(function(){
            window.location = "http://www.hashfield.io/draft/invoice/";
        });
    });	