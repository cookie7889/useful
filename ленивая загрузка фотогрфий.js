//ленивая загрузка фотогрфий при скролле для всего сайта 
//сслыку на саму картинку нужно прописать в дата атрибуте link, а в src желательно ваставить загулку 1 на 1 пиксель, например:
//<img src="/images/min.jpg" data-link="/images/stati/ochistki-ventilyatsionnikh-sistem-ot-zagryaznenii/2.jpg">
//загрузка фотографии происходит когда до самой фотографии остается 300 пискселей 

document.addEventListener('DOMContentLoaded', function () {
	if (document.querySelector('img[data-link]')) {
		lazyLoad()
		window.addEventListener('scroll', lazyLoad);
	}
})

function lazyLoad() {
	// проходимся по всем изображениям
	let imagesMin = document.querySelectorAll('img[data-link]');

	imagesMin.forEach((img) => {
		// проверяем, если изображение уже загружено, то пропускаем его
		if (img.src === img.dataset.link) return;

		// проверяем, если изображение находится в зоне видимости пользователя
		if (img.getBoundingClientRect().top < window.innerHeight + 300) {
			// загружаем изображение
			img.src = img.dataset.link;
		}
	});
}