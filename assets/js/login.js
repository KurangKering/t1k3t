$('document').ready(function() { 
	/* handling form validation */
	$("#login-form").validate({
		rules: {
			username: {
				required: true,
			},
			password: {
				required: true,
			},
		},
		messages: {
			username: "username tidak boleh kosong"
			,
			password: "password tidak boleh kosong"
		},
		submitHandler: submitForm	
	});	  
	/* Handling login functionality */
	function submitForm() {		
		var data = $("#login-form").serialize();				
		$.ajax({				
			type : 'POST',
			url  : 'config/proses_login.php',
			data : 'action=login&'+data,
			beforeSend: function(){	
				$('#login_button')[0].disabled = true;
				$("#error").fadeOut();
				$("#login_button").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Mengecek ...');
			},
			success : function(response){	

				if(response == 'OK')
				{									
					$("#login_button").html('<img src="assets/img/ajax-loader.gif" /> &nbsp; Signing In ...');

					setTimeout(' window.location.href = "dashboard.php"; ',2000);
				} 
				else  
				{									
					$("#error").fadeIn(1000, function(){						
						$("#error").html('<div class="alert alert-danger text-center"> <span class="glyphicon glyphicon-info-sign"></span> Username atau Password Salah</div>');
						$("#login_button").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Log in');
						$('#login_button')[0].disabled = false;	
					});

				}
			}
		});	
		return false;
	}   
});
$(function(){
	$('.button-checkbox').each(function(){
		var $widget = $(this),
		$button = $widget.find('button'),
		$checkbox = $widget.find('input:checkbox'),
		color = $button.data('color'),
		settings = {
			on: {
				icon: 'glyphicon glyphicon-check'
			},
			off: {
				icon: 'glyphicon glyphicon-unchecked'
			}
		};
		$button.on('click', function () {
			$checkbox.prop('checked', !$checkbox.is(':checked'));
			$checkbox.triggerHandler('change');
			updateDisplay();
		});
		$checkbox.on('change', function () {
			updateDisplay();
		});
		function updateDisplay() {
			var isChecked = $checkbox.is(':checked');
			// Set the button's state
			$button.data('state', (isChecked) ? "on" : "off");
			// Set the button's icon
			$button.find('.state-icon')
			.removeClass()
			.addClass('state-icon ' + settings[$button.data('state')].icon);
			// Update the button's color
			if (isChecked) {
				$button
				.removeClass('btn-default')
				.addClass('btn-' + color + ' active');
			}
			else
			{
				$button
				.removeClass('btn-' + color + ' active')
				.addClass('btn-default');
			}
		}
		function init() {
			updateDisplay();
			// Inject the icon if applicable
			if ($button.find('.state-icon').length == 0) {
				$button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
			}
		}
		init();
	});
});