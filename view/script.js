$(document).ready(function(){

// -------------------NAVBAR-------------------

$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll > 50) {
        $('nav').fadeIn();
    } else {
        $('nav').fadeOut();
    }
});
});


// -------------------LES PLATS-------------------

$('#retourAccueilPlats').click(function(){
    $('.modifierPlat').hide();
    $('.accueilPlats').show();
    $(":checked").prop('checked', false); //réinitialisation des checkbox
    $("input[name='idPlat']").val("");
    $("input[name='name']").val("");
    $("input[name='price']").val("€");
    $("input[name='description']").val("");
});



$('.liplat').click(function(){ //on click dans la liste
    $('.accueilPlats').hide();
    $('.modifierPlat').show();
     id= $(this).parent().find('input#id_plat').val();
    $.ajax({
        url:"./model/handleDish.php", 
        method: "POST",
        data: { id: id },
        success: function(result)
        {
            data = JSON.parse(result);

            $(":checked").prop('checked', false); //réinitialisation des checkbox
            $("input[name='idPlat']").val(data['idDish']);
            $("input[name='name']").val(data['name']);
            $("input[name='price']").val(data['price']+'€');
            $("input[name='description']").val(data['description']);
            $(".suppPlat").html("<a class='suppPlat' href='./index.php?uc=suppDish&id="+data['idDish']+"'>Supprimer le plat</a>");

            switch (data['isAvailable'])
                {
                 case 1:
                      $("input[name='available']").prop('checked', true);
                     break;
                 case 0:
                     $("input[name='available']").prop('checked', false);
                     break;
                }

            course = data['course'];

            $("select[name='course'] option[value='"+course[0]+"']").prop('selected',true);

            for (let i = 0; i < data['allergens'].length; i++) {
                allergen = data['allergens'][i];
                name = allergen['name'];
                $("input[name="+name+"]").prop('checked', true);
            }
            
        }
    });
});



            

        
