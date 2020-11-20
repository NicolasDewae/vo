$(document).ready(function(){
    $('.text').click(function(){
    var sel=window.getSelection();
    var str=sel.anchorNode.nodeValue,len=str.length, a=b=sel.anchorOffset;
    while(str[a]!=' '&&a--){}; if (str[a]==' ') a++; // start of word
    while(str[b]!=' '&&b++<len){};                   // end of word+1
    console.log(str.substring(a,b));
    });
});