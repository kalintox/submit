function check(){
	let buy_sum = 0;
	let pay = 0;
	const TAX = 1.08;
	let goukei;

	// 該当する価格を合算
	if (buy.check1.checked) buy_sum+=200;
	if (buy.check2.checked) buy_sum+=800;
	if (buy.check3.checked) buy_sum+=1280;
	if (buy.check4.checked) buy_sum+=5600;
	if (document.getElementById('ck5_1').checked) pay+=0;
	if (document.getElementById('ck5_2').checked) pay+=200;
	if (document.getElementById('ck5_3').checked) pay+=600;

	// 消費税を計算
	buy_sum = buy_sum * TAX;

	goukei = buy_sum + pay;

	buy.result.value = Math.floor(goukei);

}