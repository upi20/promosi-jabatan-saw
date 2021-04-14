$(() => 
{

	$.doneMessage = (content, title) => 
	{
		title = title || 'Success'
		return $.smallBox({
			title 		: title,
			content 	: content,
			color 		: "#51a351",
			iconSmall 	: "fa fa-check bounce animated",
			timeout 	: 1000
		})
	}

	$.failMessage = (content, title) => 
	{
		title = title || 'Fail'
		return $.smallBox({
			title 		: title,
			content 	: content,
			color 		: "#bd362f",
			iconSmall 	: "fa fa-times bounce animated",
			timeout 	: 1000
		})
	}

	$.warningMessage = (content, title) => 
	{
		title = title || 'Warning'
		return $.smallBox({
			title 		: title,
			content 	: content,
			color 		: "#f89406",
			iconSmall 	: "fa fa-times bounce animated",
			timeout 	: 1000
		})
	}
	
})

// .toast {
//   background-color: #030303;
// }
// .toast-success {
//   background-color: #51a351;
// }
// .toast-error {
//   background-color: #bd362f;
// }
// .toast-info {
//   background-color: #2f96b4;
// }
// .toast-warning {
//   background-color: #f89406;
// }