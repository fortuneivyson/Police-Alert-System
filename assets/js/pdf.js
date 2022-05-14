function download(divId,name){

    const report = document.getElementById(divId);
    // document.getElementById('img-report').innerHTML = '<img src="./../assets/img/logo.png">';
    var opt = {
        margin: 1,
        filename: name+'.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
    };

    console.log(report.innerHTML);
    setTimeout(function(){
        html2pdf().from(report).set(opt).save();
    },1000);
    // setTimeout(function(){
    //     document.getElementById('img-report').innerHTML ='';
    //     //$('#reloadDownload').modal('hide');
    // },1000);

}
