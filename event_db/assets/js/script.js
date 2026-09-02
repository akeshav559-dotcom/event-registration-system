/* LOADER */

window.addEventListener("load", () => {

    const loader = document.querySelector(".loader");

    setTimeout(() => {

        loader.style.opacity = "0";

        loader.style.visibility = "hidden";

    }, 2000);

});

/* CURSOR GLOW */

const glow = document.querySelector(".cursor-glow");

document.addEventListener("mousemove", (e) => {

    glow.style.left = e.clientX + "px";

    glow.style.top = e.clientY + "px";

});

/* SMOOTH SCROLL */

const lenis = new Lenis({

    duration:1.2,

    smoothWheel:true

});

function raf(time){

    lenis.raf(time);

    requestAnimationFrame(raf);

}

requestAnimationFrame(raf);

/* 3D CARD EFFECT */

const cards = document.querySelectorAll('.workshop-card');

cards.forEach(card => {

    card.addEventListener('mousemove', (e) => {

        const rect = card.getBoundingClientRect();

        const x = e.clientX - rect.left;

        const y = e.clientY - rect.top;

        card.style.transform = `
        rotateY(${(x - rect.width/2)/15}deg)
        rotateX(${-(y - rect.height/2)/15}deg)
        scale(1.05)
        `;

    });

    card.addEventListener('mouseleave', () => {

        card.style.transform =
        'rotateY(0deg) rotateX(0deg) scale(1)';

    });

});

/* GSAP ANIMATIONS */

gsap.from('.hero-content h1', {

    y:100,

    opacity:0,

    duration:1.5

});

gsap.from('.hero-content p', {

    y:50,

    opacity:0,

    duration:2

});

gsap.from('.luxury-btn', {

    opacity:0,

    duration:2.5

});

/* SCROLL REVEAL */

gsap.registerPlugin(ScrollTrigger);

gsap.utils.toArray('.workshop-card').forEach(card => {

    gsap.from(card, {

        opacity:0,

        y:100,

        duration:1.2,

        scrollTrigger:{

            trigger:card,

            start:'top 85%',

            toggleActions:'play none none reverse'

        }

    });

});