$(document).ready(function(){
    setButton("Cramer");
    setButton("Vocabulary");
   
});

function setButton(button){
    $("#"+button).click(function(){
        $("li").removeClass("active");
        $("#"+button).addClass("active");
        if ( $("#iFrameContent") ) {
            setCont();
            $("#iFrameContent").attr("src", button);
        }else{
            $("#iFrameContent").attr("src", button);
        }
    });
}

function setCont(){
    $("#cont").html("<div class='embed-responsive embed-responsive-16by9'><iframe class='embed-responsive-item' src='Cramer' id='iFrameContent'></iframe></div>");
}