const ca = document.querySelector(".caroule"),
firstImg = document.querySelectorAll(".imgslider")[0];
arrowsIcon = document.querySelectorAll(".wrapper i")
let isDragstart = false, prevPageX, prevScrollLeft;
let firstImgWidth = firstImg.clientWidth + 130;

arrowsIcon.forEach(icon => {
    icon.addEventListener("click",()=>{
        ca.scrollLeft += icon.id =="left" ? - firstImgWidth: firstImgWidth;
    })
});

const dragStart = (e) => {
    isDragstart = true;
    prevPageX = e.pageX;
    prevScrollLeft = ca.scrollLeft;
}
const dragging = (e) => {
    if(!isDragstart) return;
    e.preventDefault();
    let positionDiff = e.pageX - prevPageX;
    ca.scrollLeft= prevScrollLeft - positionDiff;
}
const dragStop = () =>{
    isDragstart = false;
}
ca.addEventListener("mousedown",dragStart);
ca.addEventListener("mousemove",dragging);
ca.addEventListener("mouseup", dragStop );

