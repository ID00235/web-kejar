var Notify = {

	showNotice: function(message){
			$.notify({
				message: message,
			},{
				type: 'success',
				placement:{
					from: "bottom",
					align:"center"
				},
				animate: {
					enter: 'animated slideInDown',
					exit: 'animated fadeOutUp'
				},
				delay: 2000,
				timer: 1000,
			});
	},


	showInfo : function(message){
			$.notify({
				message: message,
			},{
				type: 'info',
				placement:{
					from: "bottom",
					align:"center",
				},
				animate: {
					enter: 'animated slideInDown',
					exit: 'animated fadeOutUp'
				},
				delay: 2000,
				timer: 1000,
			});
	},

	showWarning : function(message){
			$.notify({
				message: message,
			},{
				type: 'warning',
				placement:{
					from: "bottom",
					align:"center"
				},
				animate: {
					enter: 'animated bounceInDown',
					exit: 'animated fadeOutUp'
				},
				delay: 2000,
				timer: 1000,
			});
	},

	showAlert : function(message){
			$.notify({
				message: message,
			},{
				type: 'danger',
				placement:{
					from: "bottom",
					align:"center"
				},
				animate: {
					enter: 'animated bounceInDown',
					exit: 'animated fadeOutUp'
				},
				delay: 2000,
				timer: 1000,
			});
	}
}