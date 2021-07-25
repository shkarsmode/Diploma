setTimeout(hide, 100);
function hide() {
	money2.style.cssText = 'display: none;';
}

Object.prototype.getStyleProperty = function (prop) {
	return (window.getComputedStyle(this, null)[prop] || this.currentStyle[prop])
};

let button = document.querySelector('#but');
let money2 = document.querySelector('.typeSelect');
let body = document.querySelector('body');

button.addEventListener('click', function () {
	if (money2.getStyleProperty('opacity') == 0) {
		button.classList.add('after');
		money2.style.cssText = 'display: block;';
		// money.style.cssText = 'opacity: 1;';
		setTimeout(show, 10);
		button.style.cssText = 'z-index: 0';

	}
	else {
		button.classList.remove('after');
		money2.style.cssText = 'opacity: 0';
		button.style.cssText = 'z-index: 3';
		// money.style.cssText = 'display: block;';
		setTimeout(hide, 400);
	}

	function show() {
		money2.style.cssText = 'opacity: 1;';
	}

});

const moneytype = document.querySelectorAll('.money');
const tpm = document.querySelectorAll('.typeofm');
let montemp;
for (let i = 0; i < 3; i++) {
	moneytype[i].addEventListener('click', function () {
		button.querySelector('img').src = this.querySelector('img').src;
		button.querySelector('font').innerText = this.querySelector('font').innerText;
		button.querySelector('span').innerText = this.querySelector('span').innerText;
		button.classList.remove('after');
		money2.style.cssText = 'opacity: 0';
		button.style.cssText = 'z-index: 3';
		// money.style.cssText = 'display: block;';
		setTimeout(hide, 400);
		let mny;
		switch (this.querySelector('font').innerText) {
			case '₴': mny = ' грн.'; montemp = 0; break;
			case '₽': mny = ' RUB'; montemp = 1; break;
			case '$': mny = '$'; montemp = 2; break;
		}
		for (let i = 0; i < tpm.length; i++) {
			tpm[i].innerText = mny;
		}
	});
}

let hex = document.querySelectorAll('.hex, .inner_text');
for (let i = 0; i < hex.length; i++) {
	hex[i].addEventListener('click', function () {
		switch (hex[i].firstChild.innerText) {
			case 'Транзакції': document.location.href = "php/transactions.php"; break;
			case 'Календар': document.location.href = "php/calendar.php"; break;
			case 'Витрати': document.location.href = "php/transcosts.php"; break;
			case 'Доходи': document.location.href = "php/transincome.php"; break;
			case 'Борги': break;
			case 'Цілі': alert('Цілі'); break;
		}
	});
}

