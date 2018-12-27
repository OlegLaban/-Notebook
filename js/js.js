window.onload = function() {
	//Работаем с объектом даты, чтобы получить кол-во дней в месяце
	/*
		Для того чтобы получить кол-во дней в месяце нужно задать для объекта DATE
		месяц и год методами "setMonth" и "setFullYear" соответсвенно.
		Для метода "setMonth" мы уменьшаем значение "month.value" на 1 т.к. месяцы
		в объекте DATE нумеруются с 0.
		Затем возвращем результат выполнения алгоритма написанного после слова "return".
	*/
	Date.prototype.daysInMonth = function(){
		var year = document.querySelector("#year"),
		day = document.querySelector("#day"),
		month = document.querySelector("#month");
		this.setMonth(parseInt(month.value) - 1);
		this.setFullYear(year.value);
		return  33 - new Date(this.getFullYear(), this.getMonth(), 33).getDate();
	};

	/*
		Функция "changeDay" отвечает за подстановку новых значений для даты (а именно дня)
		в соответсвующий "input".
		При помощи методов "attributes.max.nodeValue" объекта day мы задаем максимально
		возможное значение для "input type='number'", а при помощи "day.attributes.value.nodeValue"
		задаем значение атрибута "value" тем значением которое находится в "input".
		Далее в условном операторе мы проверяем является ли значение которое содержится в "input"
		больше чем допустимо в выбранном месяце (данная проверка выполнятся при
		изменении значения полей "month" и "year").
	*/

	function changeDay(){
		var maxDaysInMonth = parseInt(new Date().daysInMonth());
		day.attributes.max.nodeValue = maxDaysInMonth;
		day.attributes.value.nodeValue = day.value;
		if(parseInt(day.value) > maxDaysInMonth ){
			day.attributes.value.nodeValue = maxDaysInMonth;
			day.value = maxDaysInMonth;
		}
	}

	// Вызов прослущшивателей для полей "month" и "year".
	day.addEventListener('change', changeDay);
	month.addEventListener('change', changeDay);
	year.addEventListener('change', changeDay);



	function addToSessionData(className, locationHref, actionRout)
	{
		function addSession(input)
		{
			dataObj = {
				date : input.getAttribute("data-date"),
				time : input.getAttribute("data-time")
			}
			$.ajax({
				url: actionRout,
				type: 'POST',
				data: dataObj,
				dataType: "html",
				success: function(data){
					if(locationHref != ''){
						document.location.href = locationHref;
					}else{
						document.location.reload();
					}
				}
			});
		}


		var buttons = document.getElementsByClassName(className);

			for(var i = 0; i < buttons.length; i++){
				buttons[i].onclick = function(){
				addSession(this);
			};
		}
	}
	addToSessionData('buttonsView','notes/viewNote', 'site/addSession');
	addToSessionData('buttonsEdit', 'notes/editNote', 'site/addSession');
	addToSessionData('buttonsDelete', '', 'notes/deleteNote');

}
