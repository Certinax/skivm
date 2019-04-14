// Select item from DOM
const menuBtn = document.querySelector(".menu-btn");
const modal = document.getElementById("simpleModal");
const modalBtn = document.getElementById("modalBtn");
const closeBtn = document.getElementById("closeBtn_");
const loginBtn = document.getElementById("login");
const logoutBtn = document.getElementById("logout");

// Set initial state of menu
let showMenu = false;

menuBtn.addEventListener("click", () => {
  if (!showMenu) {
    menuBtn.classList.add("close");
    openModal();
    // Set menu state
    showMenu = true;
  } else {
    menuBtn.classList.remove("close");
    // Set menu state
    showMenu = false;
  }
});

openModal = () => {
  modal.style.display = "block";
};

closeModal = () => {
  modal.style.display = "none";
};

closeMenuBtn = () => {
  menuBtn.classList.remove("close");
};

closeBtn.addEventListener("click", () => {
  modal.style.display = "none";
  menuBtn.classList.remove("close");
  showMenu = false;
});

window.addEventListener("click", e => {
  if (e.target === modal) {
    modal.style.display = "none";
    menuBtn.classList.remove("close");
    showMenu = false;
  }
});

loginBtn.addEventListener("click", () => {
  closeModal();
  closeMenuBtn();
  showMenu = false;
});

logoutBtn.addEventListener("click", () => {
  closeModal();
  closeMenuBtn();
  showMenu = false;
});
