$("#registroValidate").validate({
        rules: {
            
            email: {
                required: true,
                email:true
            },
            password: {
				required: true,
				minlength2: 5
			},
			
            
            dni: {
                required: true,
                minlength: 7
            },
            
        },
        //For custom messages
        messages: {
            required: "Campo requerido",
            minlength: "Ingrese al menos 7 caracteres",
            minlength2: "El password debe tener al menos 5 caracteres",
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });

$("#loginValidate").validate({
        rules: {
            email: {
                required: true,
            },
            password: {
                required: true,
            },
        },
        
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });