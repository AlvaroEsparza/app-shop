/*$(window).onload(function(){
    $('#loader').css({'display':'block'});
});*/

$('.edit').click(function(){

	var id = $(this).attr('id');
	console.log(id);
	$.ajax({
		  url: 'products/edit/'+id,
		  data: id,
		  type: 'get',
		   beforeSend: function () {
                       loaderOn();

                },
                success:  function (data) {
                      $('#name_edit').attr('value', data["name"]);
                      $('#price_edit').attr('value', data["price"]);
                      $('#long_description_edit').text(data["long_text"]);
                      $('#description_edit').attr('value', data["description"]);
                      $('#id_edit').attr('value', data["id"]);
                      /*$('#form_edit').attr('action', "/admin/products/"+data['id']+"/edit");*/
                      loaderOff();
                },
                fail: function(data){
                	
                }

	});

});

$("#EditGuard").click(function(){

  setTimeout(function(){
      loaderOn();
  },100);

loaderOff();
});




//INTENTAR HACER  DE MANERA ASINCRONA LA EDICION//

function ajaxUrl(){
  /*$("#EditGuard").click(function(e) e.preventDefault();

*/
event.preventDefault();
var id=$('#id_edit').val();
var token=$('#token').val();
var name = $('#name_edit').val();
var price = $('#price_edit').val();
var long_text = $('#long_description_edit').val();
var description = $('#description_edit').val();
       $.ajax({
      type: 'POST',
      url: 'products/edit',
      data:{'id':id,'_token':token, 'name':name, 'price':price, 'long_text': long_text, 'description': description},
       beforeSend: function () {

                       loaderOn();

                },
                success:  function (data) {
                  menssageResponse(data.menssages, data.status, data.alert_type)
                  
                      loaderOff();
                },
                fail: function(data){
                  console.log('error');
                }

  });

}

//Boton para mostrar como imagen principal de manera asincrona
function favorite(image,product){
  event.preventDefault();

         $.ajax({
        type: 'GET',
        url: '/admin/products/images/selectFav/',
        data:{'id_image':image,'id_product':product},
                    beforeSend: function(){
                      botonFavorite(image);

                    },
                  success:  function (data) {
                      botonFavorite(image);
                    
                        
                  },
                  fail: function(data){
                    $('#favorite_'+image).removeClass('btn-info');
                    $('#favorite_'+image).addClass('btn-primary');
                    alert('Algo salio mal');
                  }
    });
}


//loder
function loaderOn(){
  $('input, #EditGuard, form a').attr('disabled','disabled');
	$('#loader').css({'display':'block'});
}

function loaderOff(){
  $('input, #EditGuard, form a').removeAttr('disabled');
	$('#loader').css({'display':'none'});

}

//mensaje de respuesta en el formulario de edicion

function menssageResponse(menssages, status, alert_type){
  $('#menssage').addClass(alert_type);
  $('#icon-menssage').text(status);
  console.log(menssages);
  $.each( menssages, function( key, value ) {
  $('#menssage_body').append("<li>"+value+"</li>");
    });
  $('#menssage').css({'display':'block'});

    setTimeout(function(){
        $('#menssage').css({'display':'none'});
        $('#menssage').removeClass(alert_type);
        $('#menssage_body li').remove();

    },9000);
}

//modal de alerta previo a eliminar imagen 
function alertEliminar(image,product){
        $('#image_id_modal').val(image);
         $('#product_id_modal').val(product);
        $("#ModalEliminar").modal("toggle");
  
}

function botonFavorite(image){
  $('.btn-favorite').removeClass('btn-info');
  $('.btn-favorite').addClass('btn-primary');
  $('#favorite_'+image).removeClass('btn-primary');
  $('#favorite_'+image).addClass('btn-info');

}