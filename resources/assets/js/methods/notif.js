 
 class NotificationHandler{
    notifyUserError(message,title,placementF,placementA,url,target){
		var placementFrom = placementF;
        var placementAlign = placementA;
        var state = 'danger';
		var content = {};

		content.message = message;
		content.title = title;
		content.icon = 'la la-ban';
        if(url != ''){
		content.url = url;
        content.target = target;
        }
        else{
            content.url = '#';
		content.target = '_blank';
        }

		$.notify(content,{
			type: state,
			placement: {
				from: placementFrom,
				align: placementAlign
			},
			time: 1000,
		});
    }

    notifyUserSuccess(message,title,placementF,placementA,url,target){
		var placementFrom = placementF;
        var placementAlign = placementA;
        var state = 'success';
		var content = {};

		content.message = message;
		content.title = title;
		content.icon = 'la la-check';
        if(url != ''){
		content.url = url;
        content.target = target;
        }
        else{
            content.url = '#';
		content.target = '_blank';
        }

		$.notify(content,{
			type: state,
			placement: {
				from: placementFrom,
				align: placementAlign
			},
			time: 1000,
		});
    }
    
}

export default NotificationHandler;
window.NotificationHandler = NotificationHandler;