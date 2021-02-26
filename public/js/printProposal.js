function printContent(el) {
    var restorePage = document.body.innerHTML;
    var printContent = document.getElementById(el);
    document.body.innerHTML = printContent;
    var wme = window.open("","","width: 1000, height:1000");
    wme.document.write(printContent.outerHTML);
    wme.document.close();
    wme.focus();
    wme.print();
    //wme.close();
    document.body.innerHTML = restorePage;
}
function printMe(a,e){
    var restorePage = document.body.innerHTML;
    document.getElementById(a).style.display='none';
    var printContent = document.getElementById(e);
    window.print();
    document.getElementById(a).style.display='block';
    document.body.innerHTML = restorePage;

}
$("#excelDownloadBtn").on('click',function(){
    $("#proposalTable").table2excel({
      exclude: ".noExl",
      name: "Worksheet Name",
      filename: "Proposal", //do not include extension
      fileext: ".xls", // file extension
      preserveColors: true,
      exclude_img: true,
        exclude_links: true,
        exclude_inputs: true
    }); 
});