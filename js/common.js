document.getElementById("year").innerHTML = new Date().getFullYear();
	$(document).ready(function () {
		$('.customer-logos').slick({
			slidesToShow: 6,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 1500,
			arrows: false,
			dots: false,
			pauseOnHover: false,
			responsive: [{
				breakpoint: 768,
				settings: {
					slidesToShow: 4
				}
			}, {
				breakpoint: 520,
				settings: {
					slidesToShow: 3
				}
			}]
		});
		$('.services-slider').slick({
			slidesToShow: 3,
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 1500,
			arrows: false,
			dots: false,
			pauseOnHover: false,
			responsive: [
				{
					breakpoint: 1024, // Tablet devices and below
					settings: {
						slidesToShow: 2 // Show 2 slides for tablets
					}
				},
				{
					breakpoint: 768, // Mobile devices and below
					settings: {
						slidesToShow: 1 // Show 1 slide for mobile devices
					}
				}
			]
		});
	});
	function adjustVideoContainer() {
		var videoContainers = document.querySelectorAll('.video-container');

		videoContainers.forEach(function (container) {
			var width = container.offsetWidth;
			var height = width * (9 / 16); // Change this ratio to match your video's aspect ratio
			container.style.height = height + 'px';
		});
	}

	window.addEventListener('resize', adjustVideoContainer);
	document.addEventListener('DOMContentLoaded', adjustVideoContainer);
	window.onscroll = function() {myFunction()};
	var navbar = document.getElementById("navbar");
	var sticky = navbar.offsetTop;

	function myFunction() {
	if (window.pageYOffset >= sticky) {
		console.log("Add");
		navbar.classList.add("sticky")
	} else {
		console.log("Remove");
		navbar.classList.remove("sticky");
	}
	}