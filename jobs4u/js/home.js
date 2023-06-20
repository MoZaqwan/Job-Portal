const heroImage = document.querySelector(".hero-image-area");
const heroTestimonial = document.querySelector(".testimonial");
const header = document.querySelector("header");
const hero = document.querySelector(".hero");

const profile = document.getElementById("profile");
const profile_menu = document.querySelector(".profile-menu");

const heroArr = [
  {
    id: 1,
    name: "Nubia Hadid <br> (Hotel Manager at Hilton)",
    message:
      "Organizing things is part of my life. Jobs4U helps me to find the right opputunity to match with my skills",
    color: "#03045e",
  },
  {
    id: 2,
    name: "Sara Kesok <br>(Preshcool Teacher at Hogwerd)",
    message:
      "From the childhood I want to become a mentor. Thanks to the Jobs4U now I can mentor our future generation",
    color: "#d1661a",
  },
  {
    id: 3,
    name: "Harry Jayamaha <br> (Kaita Group, CEO)",
    message:
      "Good employees are best investment business could have. To get the best of that investment I can recommand jobs4U for anyone.",
    color: "#114611",
  },
  {
    id: 4,
    name: "Oshara Samuel <br> (Cheng International, CEO)",
    message:
      "As a globalize company we hire employees from all around the world. After partner with the jobs4U our company was able to find many great employees.",
    color: "#B22222",
  },
  {
    id: 5,
    name: "Kevin Neel <br> (Intern at Tekka)",
    message:
      "I'm thankful to Jobs4U for helping me to find the best internship offer.",
    color: "#003c66",
  },
];

let x = 0;

function heroImg(arr, i) {
  heroImage.innerHTML = `<img class="hero-img" src="../images/hero/${arr[i].id}.png" alt="" /> `;
  heroTestimonial.innerHTML = `
  <p class="name">${arr[i].name}</p>
  <p class="description">${arr[i].message}</p>
  `;

  header.style.backgroundColor = `${arr[i].color}`;
  hero.style.backgroundColor = `${arr[i].color}`;
}

heroImg(heroArr, 0);

setInterval(() => {
  heroImg(heroArr, x);
  x++;

  if (x > 4) {
    x = 0;
  }
}, 3000);

// heroImg(heroArr);

// window.addEventListener(
//   "focus",
//   setInterval(() => heroImg(heroArr), 10000)
// );

// const heroBgSlider = setInterval(() => heroImg(heroArr), 1);

// document.addEventListener("visibilitychange", function (event) {
//   if (document.hidden) {
//     clearInterval(() => heroImg(heroArr));
//     console.log("not showing");
//   } else {
//     setInterval(() => heroImg(heroArr), 1);
//   }
// });

const jobResults = document.querySelector("main");
const navLinks = document.querySelector(".main-nav-links");
const mainNav = document.querySelector(".main-nav");
const brandlogo = document.querySelector(".header-brand-txt");

const textBox_1 = document.querySelector(".textField-1");
const textBox_2 = document.querySelector(".textField-2");
const Countries = document.querySelectorAll(".country");
const Fields = document.querySelectorAll(".field");
const dropdown = document.querySelector(".dropdown");

Countries.forEach((el) => {
  el.addEventListener("click", () => {
    textBox_1.value = el.textContent;
  });
});

dropdown.addEventListener("click", () => {
  dropdown.classList.toggle("active");
});

Fields.forEach((el) => {
  el.addEventListener("click", () => {
    textBox_2.value = el.textContent;
  });
});

const obs = new IntersectionObserver(
  function (entries) {
    const ent = entries[0];
    if (ent.isIntersecting === true) {
      // console.log(ent);
      document.body.classList.add("sticky");
      navLinks.classList.add("default");
      mainNav.classList.add("default");
      brandlogo.classList.add("grey-txt");

      // document.querySelector("main-nav-links").add("sticky");
    }

    if (ent.isIntersecting === false) {
      // console.log(ent);
      document.body.classList.remove("sticky");
      navLinks.classList.remove("default");
      mainNav.classList.remove("default");
      brandlogo.classList.remove("grey-txt");

      // document.querySelector("main-nav-links").remove("sticky");
    }
  },
  {
    root: null,
    threshold: 0,
  }
);
obs.observe(jobResults);

console.log("JE");
