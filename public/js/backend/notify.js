var Notify = {

	showNotice: function(message){
			$.notify({
				message: message,
			},{
				type: 'success',
				placement:{
					align:"center"
				},
				animate: {
					enter: 'animated slideInDown',
					exit: 'animated fadeOutUp'
				},
				delay: 3500,
				timer: 1000,
			});
	},


	showInfo : function(message){
			$.notify({
				message: message,
			},{
				type: 'info',
				placement:{
					align:"center",
				},
				animate: {
					enter: 'animated slideInDown',
					exit: 'animated fadeOutUp'
				},
				delay: 3500,
				timer: 1000,
			});
	},

	showWarning : function(message){
			$.notify({
				message: message,
			},{
				type: 'warning',
				placement:{
					align:"center"
				},
				animate: {
					enter: 'animated bounceInDown',
					exit: 'animated fadeOutUp'
				},
				delay: 3500,
				timer: 1000,
			});
	},

	showAlert : function(message){
			$.notify({
				message: message,
			},{
				type: 'danger',
				placement:{
					align:"center"
				},
				animate: {
					enter: 'animated bounceInDown',
					exit: 'animated fadeOutUp'
				},
				delay: 3500,
				timer: 1000,
			});
	}
}