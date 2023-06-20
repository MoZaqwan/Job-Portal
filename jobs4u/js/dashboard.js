let dashboardBtnEl = document.querySelectorAll(".menu-btn");
let elementId;
console.log("connect");

let profileImage = document.getElementById("profile_img");
// let profileMenu = document.getElementById("profile-menu");

profileImage.addEventListener("click", () => {
  console.log("HI");
  // profileMenu.classList.toggle("active_prof");
  document.querySelector("header").classList.toggle("color");
  document.getElementById("menu-profile").classList.toggle("active");
});

dashboardBtnEl.forEach((btn) => {
  btn.addEventListener("click", (event) => {
    let selectedEl = event.target.id;
    console.log(selectedEl);
    if (elementId)
      document.getElementById(elementId).classList.remove("active");

    switch (selectedEl) {
      case "dashboard":
        elementId = "main-dashboard";
        break;
      case "posted":
        elementId = "publihed-posts";
        break;
      case "applicants":
        elementId = "recieved-applicants";
        break;
      case "newJob":
        elementId = "vacancy-published";
        break;
      case "myProfile":
        elementId = "edit-profile";
        break;
    }

    console.log(elementId);
    console.log(document.getElementById(elementId));
    document.getElementById(elementId).classList.add("active");
  });
});
