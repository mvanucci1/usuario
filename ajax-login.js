$(document).ready(function(){
	$("form[name='frm-login']").submit(function(){
		var frm_login = $(this).serialize();
		var btn = $(this).find("button");
		
		$.ajax({
			type: 'POST',
			url: 'chec_login.php?app=prod',
			data: frm_login,
			beforeSend: function(){
				btn.attr("disabled","disabled");
				btn.html('Aguarde...');	
			},
			success: function(){
				btn.removeAttr("disabled","disabled");
				btn.html('Login');	
			}
		})
		.done(function(msg){
			switch(msg){
				case 'lider':
					$(location).attr('href','usuario_v2.0/lider/');
					break;
				case 'supervisor':
					$(location).attr('href','usuario_v2.0/supervisor/');
					break;
				case 'admin':
					$(location).attr('href','usuario_v2.0/admin/');
					break;
				default:
					alert(msg);
			}
			
		});
		
		return false;
	});
});