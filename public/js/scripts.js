/*$(window).onload(function(){
    $('#loader').css({'display':'block'});
});*/

$('.edit').click(function(){

	var id = $(this).attr('id');
	console.log(id);
	$.ajax({
		  url: 'products/edit/'+id,
		  data: id,
		  Type: 'get',
		   beforeSend: function () {
                       loaderOn();

                },
                success:  function (data) {
                      $('#name_edit').attr('value', data["name"]);
                      $('#price_edit').attr('value', data["price"]);
                      $('#long_description_edit').text(data["long_text"]);
                      $('#description_edit').attr('value', data["description"]);
                      $('#id_edit').attr('value', data["id"]);
                      $('#form_edit').attr('action', "/admin/products/"+data['id']+"/edit");
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
 /*$.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });
$("#EditGuard").click(function(e){
e.preventDefault();
var id=$('#id_edit').val();
       $.ajax({
      Type: 'put',
      url: 'prueba/'+id,
      data:{id:id},
       beforeSend: function () {

                       loaderOn();

                },
                success:  function (data) {
                      console.log(data);
                      loaderOff();
                },
                fail: function(data){
                  console.log('error');
                }

  });

});*/


function loaderOn(){
  $('input, #EditGuard, form a').attr('disabled','disabled');
	$('#loader').css({'display':'block'});
}

function loaderOff(){
  $('input, #EditGuard, form a').removeAttr('disabled');
	$('#loader').css({'display':'none'});

}
