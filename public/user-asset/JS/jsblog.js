const blogCarouselContainer = document.querySelector(".carouleblog");
const firstBlogSlide = document.querySelectorAll(".imgsliderblog")[0];
const blogArrowIcons = document.querySelectorAll(".wrapperblog i");
let isBlogDragging2 = false;
let prevMouseX;
let prevScrollLeft2;
const firstBlogSlideWidth2 = firstBlogSlide.clientWidth + 30;

blogArrowIcons.forEach(icon => {
    icon.addEventListener("click", () => {
        blogCarouselContainer.scrollLeft += icon.id === "left" ? -firstBlogSlideWidth2 : firstBlogSlideWidth2;
    });
});

const startBlogDrag = (e) => {
    isBlogDragging2 = true;
    prevMouseX = e.pageX;
    prevScrollLeft2 = blogCarouselContainer.scrollLeft;
};

const duringBlogDrag = (e) => {
    if (!isBlogDragging2) return;
    e.preventDefault();
    let mouseXDiff = e.pageX - prevMouseX;
    blogCarouselContainer.scrollLeft = prevScrollLeft2 - mouseXDiff;
};

const stopBlogDrag = () => {
    isBlogDragging2 = false;
};

blogCarouselContainer.addEventListener("mousedown", startBlogDrag);
blogCarouselContainer.addEventListener("mousemove", duringBlogDrag);
blogCarouselContainer.addEventListener("mouseup", stopBlogDrag);
