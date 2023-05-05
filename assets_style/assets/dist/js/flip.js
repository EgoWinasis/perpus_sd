// References to DOM Elements
const prevBtn = document.querySelector("#prev-btn");
const nextBtn = document.querySelector("#next-btn");
const book = document.querySelector("#book");

let pages = 0;
if(($('.total_hal').val()) % 2 == 0){
	pages = ($('.total_hal').val()) / 2;
}else{
	pages = (($('.total_hal').val()) - 1) / 2;

}

let paper = [];
for (let index = 1; index <= pages; index++) {
	const paper1 = document.querySelector(`#p${index}`);
	paper.push(paper1);
}

// Event Listener
prevBtn.addEventListener("click", goPrevPage);
nextBtn.addEventListener("click", goNextPage);


// Business Logic
let currentLocation = 1;
let numOfPapers = paper.length;
let maxLocation = numOfPapers + 1;


function openBook() {
	book.style.transform = "translateX(50%)";
	prevBtn.style.transform = "translateX(-180px)";
	nextBtn.style.transform = "translateX(180px)";
}

function closeBook(isAtBeginning) {
	if (isAtBeginning) {
		book.style.transform = "translateX(0%)";
	} else {
		book.style.transform = "translateX(100%)";
	}

	prevBtn.style.transform = "translateX(0px)";
	nextBtn.style.transform = "translateX(0px)";
}

function goNextPage() {
	if (currentLocation < maxLocation) {

		for (let index = 1; index <= pages; index++) {
			if (index == currentLocation) {
				if (currentLocation == 1) {
					openBook();
				}
				paper[index - 1].classList.add("flipped");
				paper[index - 1].style.zIndex = index;
				if (currentLocation == pages) {
					closeBook(false);
				};
			}

		}

		playSound();
		currentLocation++;
	}
}

function goPrevPage() {
	if (currentLocation > 0) {

		for (let index = 1; index <= pages; index++) {
			if (index == currentLocation) {
				if (currentLocation == 1) {
					closeBook(true);
				}
				paper[index - 1].classList.remove("flipped");
				paper[index - 1].style.zIndex = (pages - (index));
				if (currentLocation == pages) {
					openBook();
				}

			}

		}

		playSound();
		currentLocation--;
	}


}


let playSound = () => new Audio(`${base_url}/assets_style/sound/flip2.mp3`).play()
