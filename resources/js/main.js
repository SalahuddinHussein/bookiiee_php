$(document).ready(function(){
    
  
    
     
    
    
    $('.mobile-menu-li').click(function(){
        $('.mobile-sub-menu').addClass("no-display");
        $('.mobile-menu-li').find('i:first').attr('class','fa fa-chevron-right');
        $(this).children('.mobile-sub-menu').toggleClass("no-display");
        $(this).find('i:first').attr('class','fa fa-chevron-down');
    });
                  
    
  
     $('#hamburger-icon').click(function(){
        $('.mobile-menu').toggleClass("no-display");
    });
    
    
    $('.mobile-sub-menu-li').click(function(){
        $('.mobile-menu').toggleClass("no-display");
    });
    
    $('#message-div').css("display","none");
    
    
    
    
     $('#btn-query-box').click(function(){
        
        if($('#query-box').val() == ''){
            
            $('#query-box').attr('placeholder','put some text first');
            
            return false;
            
        }
         
    });
    
     $('#btn-query-box-mob').click(function(){
        
        if($('#query-box-mob').val() == ''){
            
            $('#query-box-mob').attr('placeholder','put some text first');
            
            return false;
            
        }
         
    });
   
    
});

$(document).on("click", function(event){
        var $trigger = $(".mobile-menu-li");
        if($trigger !== event.target && !$trigger.has(event.target).length){
             $trigger.children('.mobile-sub-menu').addClass("no-display");
        }            
    });