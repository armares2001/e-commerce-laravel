// const navbar = document.querySelector('.my-navbar');
// const titleNavbar = document.querySelector('.title-navbar');
// const navLink = document.querySelectorAll('.nav-link');
// console.log(navLink);

// window.addEventListener('scroll', () => {
//     if (window.scrollY > 0) {
//         navbar.classList.add('scrolled');
//         titleNavbar.classList.add('scrolled');
//         navLink.forEach(el => {
//             el.classList.add('scrolled')
//         })
//     } else {
//         navbar.classList.remove('scrolled');
//         titleNavbar.classList.remove('scrolled');
//         navLink.forEach(el => {
//             el.classList.remove('scrolled')
//         })
//     }
// })

// const rotateOn=document.querySelector('#rotateOn');
// const rotateWrapper=document.querySelector('#rotateWrapper');

// console.log(rotateOn);
// rotateOn.addEventListener('onmouseenter',()=>{
//     rotateWrapper.classList.add('rotate');
// })
// rotateOn.addEventListener('onmouseleave',()=>{
//     rotateWrapper.classList.remove('rotate');
// })

const navbar = document.querySelector('.my-navbar')

window.addEventListener('scroll', () =>{
    if(window.scrollY > 0){
        navbar.classList.add('scrolled');
    } else{
        navbar.classList.remove('scrolled')
    }
})



