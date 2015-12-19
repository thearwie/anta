var debut=function(){
	$(".quantite").keyup(function(e){
		if($(this).val()!=''){
			if(e.keyCode==13){
			   var id=$(this).attr('data-id');
			   var prix=$(this).attr('data-prix');
			   var quantite=$(this).val();
			   $(this).parentsUntil('.produit').find('.sous-total').text('Sous-total: '+(prix*quantite));
			   $.post('modifierDonnees.php',{
				   Id:id,
				   Prix:prix,
				   Quantite:quantite
				   
			   }, function(e){
				   
				   $("#total").text('Total: '+ e);
				   
			   });
			   
			}	
		}
	});
	
}

$(document).on('ready',debut);