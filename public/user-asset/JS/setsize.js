function selectSize(size) {
    var buttons = document.getElementsByClassName('size-button');
    for (var i = 0; i < buttons.length; i++) {
      buttons[i].classList.remove('active');
    }
    size.classList.add('active');
  }