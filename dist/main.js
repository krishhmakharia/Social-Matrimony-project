// Navbar color change on scroll
window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
      navbar.classList.add('scrolled');
      // console.log('scrolled');
      
    } else {
      navbar.classList.remove('scrolled');
      // console.log('not scrolled');
    }
  });

  // Initialize Bootstrap tooltips
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

  //profile page navbar
  const sidebar = document.getElementById('sidebar');
  const toggleBtn = document.getElementById('toggleBtn');

  toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('-tw-translate-x-full');
  });

  var block1 = document.querySelector('.block1');
  var block2 = document.querySelector('.block2');
  const next = document.querySelector("#nexts");
  const prev = document.querySelector('#pre');

  next.addEventListener("click",()=>{
    console.log("btn clicked");
    block1.classList.add('tw-hidden');
    block2.classList.remove('tw-hidden');
  });
  prev.addEventListener("click",()=>{
    console.log("btn clicked");
    block1.classList.remove('tw-hidden');
    block2.classList.add('tw-hidden');
  });