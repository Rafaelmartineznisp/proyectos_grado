
 
        function Validar(){
          var nombre = document.getElementById('nombre').value;      
          var numeros="0123456789", test=0;

           for (var i = nombre.length - 1; i >= 0; i--) {
            if (numeros.includes( nombre.charAt(i))) {
              break;
            }
            test++;
          }
          if (test< nombre.length) {
            $('#alert').html('Este campo no admite numero').slideDown(500);
            $('#nombre').focus();
            return false;
          }else if(nombre==""){
            $('#alert').html('Debes ingresar un nombre').slideDown(500);
            $('#nombre').focus();
            return false;
          }
          else{
            $('#alert').html('').slideUp(300);
          }        
}
        function Validar1(){
          
          var Asesor = document.getElementById('Asesor').value;    
          var numeros="0123456789", test=0;

           for (var i = Asesor.length - 1; i >= 0; i--) {
            if (numeros.includes( Asesor.charAt(i))) {
              break;
            }
            test++;
          }
         if (test< Asesor.length) {
            $('#alert').html('Este campo no admite numero').slideDown(500);
            $('#Asesor').focus();
            return false;
          }else if(Asesor==""){
            $('#alert').html('Debes ingresar un Asesor').slideDown(500);
            $('#Asesor').focus();
            return false;
          }
          else{
            $('#alert').html('').slideUp(300);
          } 


}
       function Validar2(){
          
          var Nota = document.getElementById('Nota').value;    
          var numeros="0123456789", test=0;

           for (var i = Nota.length - 1; i >= 0; i--) {
            if (numeros.includes( Nota.charAt(i))) {
              break;
            }
            test++;
          }
           if(Nota==""){
            $('#alert').html('Debes ingresar un Nota').slideDown(500);
            $('#Nota').focus();
            return false;
          }
          else{
            $('#alert').html('').slideUp(300);
          } 


}

$function(){
  $("#boton".Click(function() {



    
  })





})
