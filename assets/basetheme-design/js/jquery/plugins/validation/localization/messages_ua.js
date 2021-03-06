/*
 * Translated default messages for the jQuery validation plugin.
 * Locale: RU (Russian; русский язык)
 */
(function($) {
	$.extend($.validator.messages, {
		required: "Це поле необхідно заповнити.",
		remote: "Будь ласка, введіть вірне значення.",
		email: "Будь ласка, введіть коректну адресу електронної пошти.",
		url: "Будь ласка, введіть коректний URL.",
		date: "Будь ласка, введіть коректну дату.",
		dateISO: "Будь ласка, введіть коректную дату у форматі ISO.",
		number: "Будь ласка, введіть число.",
		digits: "Будь ласка, введіть тільки цифри.",
		creditcard: "Будь ласка, введіть правильний номер кредитної карти.",
		equalTo: "Будь ласка, введіть таке ж значення ще раз.",
		extension: "Будь ласка, оберіть файл з правильним розширенням.",
		maxlength: $.validator.format("Будь ласка, введіть не більш за {0} символів."),
		minlength: $.validator.format("Будь ласка, введіть не меньш за {0} символів."),
		rangelength: $.validator.format("Будь ласка, введіть значення довжиною від {0} до {1} символів."),
		range: $.validator.format("Будь ласка, введіть число від {0} до {1}."),
		max: $.validator.format("Будь ласка, введіть число, менше або рівне {0}."),
		min: $.validator.format("Будь ласка, введіть число, більше або рівне {0}.")
	});
}(jQuery));
