const inpmoney = document.querySelector('#inpmoney');
const flag = document.querySelector('#flag');


if (inpmoney.value == " RUB") {
	flag.src = 'img/Russia.png';

}
else if (inpmoney.value == " $") {
	flag.src = 'img/Uk.png';

}

else {
	flag.src = 'img/ukraine.png';

}
function submitform1() {
	document.forms["typemoney1"].submit();
}

function submitform2() {
	document.forms["typemoney2"].submit();
}

function submitform3() {
	document.forms["typemoney3"].submit();
}

// console.log(inpmoney.value);