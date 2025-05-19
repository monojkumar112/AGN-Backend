document.addEventListener("DOMContentLoaded", function () {
  // Hero Slider
  const heroSwiper = new Swiper(".hero-slider", {
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
  const swiperContainer = document.querySelector(
    ".mySwiperCompany .swiper-wrapper"
  );

  // Jodi slides kom hoy, tahole duplicate kore add kora
  if (swiperContainer.children.length < 12) {
    swiperContainer.innerHTML += swiperContainer.innerHTML; // Duplicate slides
  }

  const companySwiper = new Swiper(".mySwiperCompany", {
    slidesPerView: "auto",
    spaceBetween: 30,
    loop: true, // Loop properly kaj korbe
    speed: 2000, // Smooth scrolling speed
    autoplay: {
      delay: 0, // No delay, always moving
      disableOnInteraction: false, // User interact korleo stop hobe na
    },
    allowTouchMove: false, // Disable manual swipe
    loopAdditionalSlides: swiperContainer.children.length, // Ensure loop smooth
    breakpoints: {
      0: { slidesPerView: 2, spaceBetween: 10 },
      768: { slidesPerView: 4, spaceBetween: 15 },
      1024: { slidesPerView: 6, spaceBetween: 30 },
    },
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const header = document.querySelector(".header");

  // Check if the current route is the home page
  if (window.location.pathname === "/") {
    header.style.backgroundColor = "";
  } else {
    header.style.backgroundColor = "var(--white-color)";
    header.style.borderBottom = "none";
  }
});

document.addEventListener("scroll", () => {
  const header = document.querySelector(".header");
  if (window.scrollY > 50) {
    header.classList.add("scrolled");
  } else {
    header.classList.remove("scrolled");
  }
});

document.addEventListener("DOMContentLoaded", () => {
  const menuButton = document.querySelector(".header-menu img");
  const closeButton = document.querySelector(".header-close img");
  const headerContent = document.querySelector(".header-content");
  const navLists = document.querySelector(".header-nav-lists");

  menuButton.addEventListener("click", () => {
    headerContent.classList.add("expanded");
    navLists.classList.add("active");
    closeButton.parentElement.classList.add("active");
  });

  closeButton.addEventListener("click", () => {
    headerContent.classList.remove("expanded");
    navLists.classList.remove("active");
    closeButton.parentElement.classList.remove("active");
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const counters = document.querySelectorAll(".count");

  counters.forEach((counter) => {
    const updateCount = () => {
      // Extract target value and convert "X.XM" to numeric value
      const target = parseFloat(
        counter.getAttribute("data-target").replace("M", "")
      );
      const current = parseFloat(counter.innerText.replace("M", ""));

      // Increment step
      const increment = target / 200;

      if (current < target) {
        counter.innerText = (current + increment).toFixed(1) + "M"; // Format as X.XM
        setTimeout(updateCount, 10);
      } else {
        counter.innerText = target.toFixed(1) + "M"; // Ensure it ends on target
      }
    };

    updateCount();
  });
});

document.getElementById("year").textContent = new Date().getFullYear();

document.addEventListener("DOMContentLoaded", function () {
  const steps = document.querySelectorAll(".donate-form-step");
  const continueButtons = document.querySelectorAll(".contuine-btn");

  let currentStep = 0;

  // Show only the first step initially
  function showStep(index) {
    steps.forEach((step, i) => {
      step.style.display = i === index ? "block" : "none";
    });
  }

  // Go to the next step on Continue click
  continueButtons.forEach((btn, index) => {
    btn.addEventListener("click", function () {
      if (currentStep < steps.length - 1) {
        currentStep++;
        showStep(currentStep);
      } else {
        // optionally submit the form or handle final step
        console.log("Form completed");
      }
    });
  });

  // Initialize
  showStep(currentStep);
});
