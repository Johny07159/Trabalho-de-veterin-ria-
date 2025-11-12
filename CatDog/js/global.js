 const slides = document.querySelector('.slides');
    const slide = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');

    let index = 0;

    function showSlide(i) {
      if (i >= slide.length) index = 0;
      if (i < 0) index = slide.length - 1;
      slides.style.transform = `translateX(${-index * 100}%)`;
      updateDots();
    }

    function updateDots() {
      dots.forEach((dot, idx) => {
        dot.classList.toggle('active', idx === index);
      });
    }

    document.getElementById('next').addEventListener('click', () => {
      index++;
      showSlide(index);
    });

    document.getElementById('prev').addEventListener('click', () => {
      index--;
      showSlide(index);
    });

    dots.forEach((dot, i) => {
      dot.addEventListener('click', () => {
        index = i;
        showSlide(index);
      });
    });

    // Troca automática a cada 4 segundos
    setInterval(() => {
      index++;
      showSlide(index);
    }, 4000);