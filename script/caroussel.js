(function() {
  function create(cars, elements, prev, next) {
    var start = 0;
    var end = elements.length - 1;
    var posx = 0;
    var widths = [];

    var move = function(x) {
      if (x < 0) {
        for (var j = -1; j >= x; j--) {
          posx += widths[j + start];
        }
      } else if (x > 0) {
        for (var j = 0; j < x; j++) {
          posx -= widths[j + start];
        }
      }

      start += x;
      end += x;
      var remaining = cars.clientWidth;

      for (var i = 0; i < elements.length; i++) {
        elements[i].style.transform = "translateX(" + posx + "px)";

        if (i >= start) {
          remaining -= widths[i];

          if (remaining > 0) {
            elements[i].style.opacity = 1;
          } else {
            elements[i].style.opacity = 0;
          }
        } else {
          elements[i].style.opacity = 0;
        }
      }

      prev.className = start == 0 ? "prev inactive" : "prev";
      next.className = remaining > 0 ? "next inactive" : "next";
    };

    prev.addEventListener("click", function() {
      if (start > 0) {
        move(-1);
      }
    });

    next.addEventListener("click", function() {
      var remaining = cars.clientWidth;
      for (var i = start; i < elements.length; i++) {
        remaining -= widths[i];
      }

      if (remaining < 0) {
        move(1);
      }
    });

    for (var i = 0; i < elements.length; i++) {
      elements[i].style.transition = "opacity 200ms, transform 200ms";
      widths[i] = elements[i].clientWidth;
    }
    move(0);
  }

  function load() {
    var cars = document.getElementsByClassName("caroussel");

    for (var i = 0; i < cars.length; i++) {
      var prev = document.createElement("span");
      var next = document.createElement("span");
      var elements = cars[i].getElementsByTagName("a");

      prev.className = "prev";
      next.className = "next";

      prev.innerHTML = "&lt;";
      next.innerHTML = "&gt;";

      cars[i].appendChild(prev);
      cars[i].appendChild(next);

      create(cars[i], elements, prev, next);
    }
  }
  window.addEventListener("load", load);
})();
