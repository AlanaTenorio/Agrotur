$(document).ready(function(){


    $("#chest").on("click", function() {
       $("h4").html("Bench Press");
        $("p").html("<img id='yo' src='https://45.media.tumblr.com/860edb05e3f8b0bf9b4313a819e87699/tumblr_mi2ud72e931qet17vo1_400.gif'>");
        $("#modal1").openModal("show");
    });

    $("#squat").on("click", function() {
       $("h4").html("Squat");
        $("p").html("<img id='yo' src='https://i.imgur.com/89ZQmzf.gif'>");
        $("#modal1").openModal("show");
    });

    $("#shld").on("click", function() {
       $("h4").html("Shoulder Press");
        $("p").html("<img id='yo' src='http://i0.wp.com/thegaysian.com/wp-content/uploads/2015/07/b001.gif?resize=420%2C420'>");
        $("#modal1").openModal("show");
    });
    
    $("#bi").on("click", function() {
       $("h4").html("Incline Dumbbell Bicep Curl");
        $("p").html("<img id='yo' src='http://cdn.makeagif.com/media/8-05-2015/OZGZTL.gif'>");
        $("#modal1").openModal("show");
    });
    
    $("#tri").on("click", function() {
       $("h4").html("Tricep Dips");
        $("p").html("<img id='yo' src='https://45.media.tumblr.com/a731186fc986346bf6e2b96225e5f1f3/tumblr_njhocrvEo91six5o1o1_500.gif'>");
        $("#modal1").openModal("show");
    });
    
    $("#twist").on("click", function() {
       $("h4").html("Standing Ab Twist");
        $("p").html("<img id='yo' src='https://s-media-cache-ak0.pinimg.com/originals/b2/9c/0e/b29c0e0eb56db9cb3451625c13a00766.jpg'>");
        $("#modal1").openModal("show");
    });
    
});
    