$(document).ready(function(){
    function populate(ps) {
        for(i=0;i<9;i++) {
            var row = ".r"+i;
            for(j=0;j<9;j++) {
                var cell = ".c"+j;
                $(row+" "+cell).val(ps.charAt(i*9 + j));
            }
        }
    }
    function getstr() {
        var str = "";
        for(i=0;i<9;i++) {
            var row = ".r"+i;
            for(j=0;j<9;j++) {
                var cell = ".c"+j;
                var $cj = $(row+" "+cell);
                if($cj.val().match(/^\d$/)) {
                    str+=$cj.val();
                } else {
                    str+="."
                }
            }
        }
        return str;
    }
    populate(".8..4....3......1........2...5...4.69..1..8..2...........3.9....6....5.....2.....");
    $("#submit").click(function(){
        str = getstr();
        console.log(str);
        $.ajax({
            type: "POST",
            url: "post.php",
            data: { b:str },
            success: function(d) {
                console.log(d);
                if(d.startsWith("500")) alert(d);
                if(d.startsWith("400")) alert(d);
                else {
                    if(d.length == 81)
                        populate(d);
                    else alert(d + " is not long enough");
                }
            }
        });
    });
});
