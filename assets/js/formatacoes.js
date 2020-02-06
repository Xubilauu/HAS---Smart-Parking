function mascaraTelefone( campo ) {
    function trata(valor,  isOnBlur) {
        valor = valor.replace(/\D/g,"");             			
        valor = valor.replace(/^(\d{2})(\d)/g,"($1)$2"); 		
        
        if( isOnBlur ) {
            valor = valor.replace(/(\d)(\d{4})$/,"$1-$2");   
        } else{
            valor = valor.replace(/(\d)(\d{5})$/,"$1-$2"); 
        }
        return valor;
    }
    
    campo.onkeypress = function (evt) { 
        var code = (window.event) ? window.event.keyCode : evt.which;	
        var valor = this.value
        
        if(code > 57 || (code < 48 && code != 8 ))  {
            return false;
        } else {
            this.value = trata(valor, false);
        }
    }
    
    campo.onblur = function() {
        var valor = this.value;
        if( valor.length < 13 ) {
            this.value = ""
        }else {		
            this.value = trata(this.value, true );
        }
    }
    
    campo.maxLength = 14;
}

function mascaraPlaca() {
    var txt = $(this).val().toUpperCase().replace(/[^\w]/g, ''); 
    var num = $(this).val().replace(/\D/g,''); 
    $(this).val(txt.substring(0,3) + '-' + num.substring(0,4)); 
}
