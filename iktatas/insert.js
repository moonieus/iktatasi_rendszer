function ellenoriz(){
    let a=document.getElementById("netto").value;
    let b=document.getElementById("afa").value;
    let c=document.getElementById("brutto").value;
    if ((a+b)!=c){
        alert("A nettó érték és az áfa összege nem egyenlő a bruttó értékkel!");
    }
}