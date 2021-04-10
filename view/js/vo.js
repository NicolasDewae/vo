$(document).ready(function(){

    $('#text').click(function(){
        var sel=window.getSelection();
        var str=sel.anchorNode.nodeValue,len=str.length, a=b=sel.anchorOffset;
        while(str[a]!=' '&&a--){}; if (str[a]==' ') a++; // start of word
        while(str[b]!=' '&&b++<len){};                   // end of word+1
        word = str.substring(a,b);

        // console.log(word);
        // document.write ("<iframe src='reading.crtl.php?englishWord="+word+"' scrolling='no' frameborder='0' width='0' height='0' ><iframe>");

        // Tentative une avec ajax
        $.ajax({ 
            url: 'reading.crtl.php', //This is the current doc 
            type: "POST", 
            data: {
                    word,
            },
            contentType: "application/json",
            success: function(data){ 
                console.log(word); 
                console.log("AJAX ok")
            },
            error: function(xhr,responseText){            
                console.log('AJAX error');
                console.log(responseText);
            }
        });

    });

    // Tentative deux, avec XMLHttpRequest 
    // var xhr_object = new XMLHttpRequest(); 
    // xhr_object.open("GET", "reading.crtl.php?q=" + word, true);
    // xhr_object.send(word);

});
