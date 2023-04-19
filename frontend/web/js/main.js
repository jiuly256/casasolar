(function(document, window, $){
    

    $(document).ready(function(){
      // eliminar botones en el preview de imagenes
     $('.kv-file-remove').remove();  
     $('.kv-file-rotate').remove();  
     $('.file-drag-handle').remove();  

      $('.alert').removeClass("fade in");

       //quitar el amarillo de los totales en los gridview
       $('.kv-page-summary').removeClass("table-warning");
       $('.kv-page-summary').addClass("table-default");

       if ($("#id_tipo").val()==1){

        $("#empresa").css('display', 'none');
        $("#programa").css('display', 'none');
        $("#comuna").css('display', 'none');
        }else if ($("#id_tipo").val()==2){
        $("#empresa").css('display', 'block');
        $("#programa").css('display', 'none');
        $("#comuna").css('display', 'none');
        }else  if ($("#id_tipo").val()==3){
        $("#empresa").css('display', 'none');
        $("#programa").css('display', 'block');
        $("#comuna").css('display', 'block');
         }


       $( "#id_tipo" ).on('change', function () {

        if ($("#id_tipo").val()==1){

            $("#empresa").css('display', 'none');
            $("#programa").css('display', 'none');
            $("#comuna").css('display', 'none');
         }else if ($("#id_tipo").val()==2){
            $("#empresa").css('display', 'block');
            $("#programa").css('display', 'none');
            $("#comuna").css('display', 'none');
         }else  if ($("#id_tipo").val()==3){
            $("#empresa").css('display', 'none');
            $("#programa").css('display', 'block');
            $("#comuna").css('display', 'block');
        }

       });
      
       
    });


        
        function formatNumber(num) {
            if (!num || num == 'NaN') return '-';
            if (num == 'Infinity') return '&#x221e;';
            num = num.toString().replace(/\$|\,/g, '');
            if (isNaN(num))
                num = '0';
            sign = (num == (num = Math.abs(num)));
            num = Math.floor(num * 100 + 0.50000000001);
            cents = num % 100;
            num = Math.floor(num / 100).toString();
            if (cents < 10)
                cents = '0' + cents;
            for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3) ; i++)
                num = num.substring(0, num.length - (4 * i + 3)) + '.' + num.substring(num.length - (4 * i + 3));
            return (((sign) ? '' : '-') + num + ',' + cents);
        }

       
  })(document, window, jQuery);
  
