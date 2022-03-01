function error_text(field, rules){
    if (rules == 'required') {
        var err_text = field + " Harus Diisi !"
    }else if (rules == 'number') {
        var err_text = field + " Harus Angka !"
    }else if (rules == 'format') {
        var err_text = field + " Format Salah !"
    }else if (rules == 'periode') {
        var err_text = field + " Harus Lebih Besar Dari Periode 1"
    }else if (rules == 'custom') {
        var err_text = field
    }
    swal({
       title: "Perhatian",
       text: ""+ err_text,
       icon: "warning",
       // buttons: true,
       dangerMode: true,
    }).then(function(){
      return false;
    }) 
}