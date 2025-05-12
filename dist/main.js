const pageId = document.body.id;
  // Initialize Bootstrap tooltips
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
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
if(pageId === "index"){
//   window.location.href = "index.php?modal=open"
  // Parse query parameters
const params = new URLSearchParams(window.location.search);

// Check if the modal should open
if (params.get('modal') === 'open') {
  const myModal = new bootstrap.Modal(document.getElementById('myModal'));
  myModal.show();
}


}else if(pageId === "reg"){
  var block1 = document.querySelector('.block1');
  var block2 = document.querySelector('.block2');
  const next = document.querySelector('#next');
  const prev = document.querySelector('#pre');

  next.addEventListener('click',(e)=>{
    console.log("btn clicked");
    block1.classList.add('tw-hidden');
    block2.classList.remove('tw-hidden');
  });
  prev.addEventListener("click",()=>{
    console.log("btn clicked");
    block1.classList.remove('tw-hidden');
    block2.classList.add('tw-hidden');
  });
}

  const alert_bar=document.querySelector("#alertbar");
  const cross_alert=document.querySelector("#crossalert");
  cross_alert.addEventListener("click",()=>{
    alert_bar.classList.add("tw-hidden");
  })