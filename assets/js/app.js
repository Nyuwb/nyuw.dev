// Affichage d'un menu dropdown
if (document.querySelector('li.submenu') !== null) {
	document.querySelector('li.submenu').addEventListener('click', e => {	
		if (e.target.parentElement.className == 'submenu' || e.target.parentElement.parentElement.className == 'submenu') {
			e.preventDefault();
			e.currentTarget.querySelector('ul.sublist').classList.toggle('hidden');
			e.currentTarget.querySelector('i.arrow').classList.toggle('up');
		}
	}); 
}