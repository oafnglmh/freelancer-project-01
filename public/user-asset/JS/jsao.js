const carouselContainer = document.querySelector(".caroule1");
const firstSlide = document.querySelectorAll(".imgslider1")[0];
const arrowIcons = document.querySelectorAll(".wrapper1 i");
let isDragging1 = false;
let prevMouseX1;
let prevScrollLeft1;
const firstSlideWidth1 = firstSlide.clientWidth + 210;

arrowIcons.forEach(icon => {
    icon.addEventListener("click", () => {
        carouselContainer.scrollLeft += icon.id === "left" ? -firstSlideWidth1 : firstSlideWidth1;
    });
});

const startDrag = (e) => {
    isDragging1 = true;
    prevMouseX1 = e.pageX;
    prevScrollLeft1 = carouselContainer.scrollLeft;
};

const duringDrag = (e) => {
    if (!isDragging1) return;
    e.preventDefault();
    let mouseXDiff = e.pageX - prevMouseX1;
    carouselContainer.scrollLeft = prevScrollLeft1 - mouseXDiff;
};

const stopDrag = () => {
    isDragging1 = false;
};

carouselContainer.addEventListener("mousedown", startDrag);
carouselContainer.addEventListener("mousemove", duringDrag);
carouselContainer.addEventListener("mouseup", stopDrag);
