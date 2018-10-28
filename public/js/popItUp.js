function popItUp(name) {
	var popup = document.querySelectorAll('.myPopup, .popup , .hide, .Nhide');
	
	for (var i in popup) {
		if(popup[i].id == name){
			if(popup[i].classList.contains("shows")){
				popup[i].classList.replace("shows","Nshows");
			}
			else if(popup[i].classList.contains("Nshows")){
				popup[i].classList.replace("Nshows","shows");
			}
			else if(popup[i].classList.contains("hide")){
				popup[i].classList.replace("hide","Nhide");
			}
			else if(popup[i].classList.contains("Nhide")){
				popup[i].classList.replace("Nhide","hide");
			}
		}
	}
}