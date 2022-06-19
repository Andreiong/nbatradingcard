 let slides = document.querySelectorAll('.slide-container');
      let index = 0;
            
            function next(){
                slides[index].classList.remove('active');
                index = (index + 1) % slides.length;
                slides[index].classList.add('active');
            } 
