

let images = document.querySelector('.ctn-img');
let point = document.querySelectorAll('.point');
let position = 0;
let currentIndex = 0;
let currentDish =0;
let interval;
let intervalDish;

function updateActivePoint() {
  point.forEach((e, i) => {
    if (i === position) {
      point[i].classList.add('point--active');
    } else {
      point[i].classList.remove('point--active');
    }
  });
}

function autoAdvance() {
  if (position < 2) {
    position++;
  } else {
    position = 0;
  }
  let operation = position * -33.66;
  images.style.transform = `translateX(${operation}%)`;
  updateActivePoint();
}

function autoAdvanceDish() {
  for (let i = 0; i < carousels.length; i++) {
    carousels[i].style.transform = `translateX(${direction === 'arrow-right' ? '-' : ''}${100 * currentDish}%)`;
  }

  if (direction === 'arrow-right') {
    currentDish = (currentDish - 1 + carousels.length) % carousels.length;
  } else if (direction === 'arrow-left') {
    currentDish = (currentDish + 1 - carousels.length ) % carousels.length;
  } else if (direction === 'arrow-right') {
    currentDish = (currentDish + 1 - carousels.length) % carousels.length;
  }
}


point.forEach((element, i) => {
  point[i].addEventListener('click', () => {

    if (i === 0 && position > 0) {
      position--;
    } else if (i === 1 && position < 1) {
      position++;
    } else if (i === 2 && position < 2) {
      position++;
    } else if (i === 1 && position > 0) {
      position--;
    }



    let operation = position * -33.66;
    images.style.transform = `translateX(${operation}%)`;
    updateActivePoint();


  });

});

interval = setInterval(autoAdvance, 5000);
intervalDish = setInterval(autoAdvance, 5000);



let arrowLeft = document.querySelector('.arrow-left');
let arrowRight = document.querySelector('.arrow-right');

arrowLeft.addEventListener('click', () => {
  moveCarousel('arrow-left');
  moveCarouselDish('arrow-left');
  console.log("click");
});

arrowRight.addEventListener('click', () => {
  moveCarousel('arrow-right');
  moveCarouselDish('arrow-right');
});



function moveCarousel(direction) {
  let carousels = document.querySelectorAll('.carousel');

  if (direction === 'arrow-right') {
    currentIndex = (currentIndex + 1) % carousels.length;
  } else if (direction === 'arrow-left') {
    currentIndex = (currentIndex - 1 + carousels.length) % carousels.length;
  }

  for (let i = 0; i < carousels.length; i++) {
    carousels[i].style.transform = `translateX(${100 * currentIndex}%)`;
  }
}


function moveCarouselDish(direction) {
  let carousels = document.querySelectorAll('.carousel');

  for (let i = 0; i < carousels.length; i++) {
    carousels[i].style.transform = `translateX(${direction === 'arrow-right' ? '-' : ''}${100 * currentDish}%)`;
  }

  if (direction === 'arrow-right') {
    currentDish = (currentDish + 1) % carousels.length;
  } else if (direction === 'arrow-left') {
    currentDish = (currentDish + 1 - carousels.length ) % carousels.length;
  } else if (direction === 'arrow-right') {
    currentDish = (currentDish - 1 + carousels.length) % carousels.length;
  }

  console.log("moveCarouselDish");
}



//script of the page dish




