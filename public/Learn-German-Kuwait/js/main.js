// 🎥 الفيديو مودال
const videoModal = document.getElementById('videoModal');
const videoPlayer = document.getElementById('videoPlayer');

if (videoModal && videoPlayer) {
  videoModal.addEventListener('show.bs.modal', function (event) {
    const trigger = event.relatedTarget;
    const videoSrc = trigger?.getAttribute('data-video');
    if (videoSrc) {
      videoPlayer.querySelector('source').src = videoSrc;
      videoPlayer.load();
      videoPlayer.play();
    }
  });

  videoModal.addEventListener('hidden.bs.modal', function () {
    videoPlayer.pause();
    videoPlayer.currentTime = 0;
  });
}

// 📌 كروت الرسالة/الرؤية/الهدف
let messageCard = document.getElementById("message-card");
let vissionCard = document.getElementById("vission-card");
let goalCard = document.getElementById("goal-card");

function showVission() {
  if (vissionCard && messageCard && goalCard) {
    vissionCard.classList.remove("d-none");
    messageCard.classList.add("d-none");
    goalCard.classList.add("d-none");
  }
}
function showGoal() {
  if (vissionCard && messageCard && goalCard) {
    goalCard.classList.remove("d-none");
    vissionCard.classList.add("d-none");
    messageCard.classList.add("d-none");
  }
}
function showMessage() {
  if (vissionCard && messageCard && goalCard) {
    messageCard.classList.remove("d-none");
    vissionCard.classList.add("d-none");
    goalCard.classList.add("d-none");
  }
}

// 📌 Array بالدوال
const functions = [showMessage, showVission, showGoal];
let index = 0;

// 📌 استدعاء أولي
functions[index]();

// 📌 تبديل كل 3 ثواني
setInterval(() => {
  index = (index + 1) % functions.length; // يرجع من الأول بعد آخر دالة
  functions[index]();
}, 5000);

// 🖼️ سلايدر الصور
// document.addEventListener("DOMContentLoaded", function () {
//   const slider = document.getElementById("why-slider");
//   if (slider) {
//     const images = [
//       "Learn-German-Kuwait/img/6234a6c217058_0-(10).jpeg",
//       "Learn-German-Kuwait/img/6234a99bb11c1_0-(22).jpeg",
//       "Learn-German-Kuwait/img/6234a59a6c08d_02.jpeg"
//     ];
//     let index = 0;

//     setInterval(() => {
//       slider.classList.add("fade-out");
//       setTimeout(() => {
//         index = (index + 1) % images.length;
//         slider.src = images[index];
//         slider.classList.remove("fade-out");
//       }, 300);
//     }, 3000);
//   }
// });

// 🖼️ سلايدر متعدد الصور
// document.addEventListener("DOMContentLoaded", function () {
//   const sliders = document.querySelectorAll(".slider-img");

//   sliders.forEach(slider => {
//     const images = JSON.parse(slider.getAttribute("data-images")); // الصور الخاصة بكل slider
//     let index = 0;

//     setInterval(() => {
//       slider.classList.add("fade-out");
//       setTimeout(() => {
//         index = (index + 1) % images.length;
//         slider.src = images[index];
//         slider.classList.remove("fade-out");
//       }, 300);
//     }, 3000);
//   });
// });


// 🎡 سلايدر الكورسات (Swiper)
if (document.querySelector(".mySwiper")) {
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 20,
    loop: true,
    autoplay: { delay: 3000, disableOnInteraction: false },
    breakpoints: { 0: { slidesPerView: 1 }, 768: { slidesPerView: 2 }, 1024: { slidesPerView: 3 } }
  });
}

// 🔢 أنيميشن الأرقام
function animateCounter(el, start, end, duration) {
  let startTime = null;
  function step(timestamp) {
    if (!startTime) startTime = timestamp;
    const progress = timestamp - startTime;
    const current = Math.min(Math.floor((progress / duration) * (end - start) + start), end);
    el.innerText = current;
    if (current < end) window.requestAnimationFrame(step);
  }
  window.requestAnimationFrame(step);
}

const counterSection = document.querySelector('.analytics');
if (counterSection) {
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const counters = entry.target.querySelectorAll('.counter-number');
        counters.forEach(counter => {
          let targetNumber = parseInt(counter.dataset.target || counter.innerText);
          if (isNaN(targetNumber)) return;
          counter.dataset.target = targetNumber;
          counter.innerText = 0;
          animateCounter(counter, 0, targetNumber, 2000);
        });
      }
    });
  }, { threshold: 0.5 });
  observer.observe(counterSection);
}

// 💬 تغيير الصور عند hover في comments
const commentsCards = document.querySelectorAll('.comments-card');
commentsCards.forEach(card => {
  const img = card.querySelector('.quote-img');
  if (!img) return;
  const originalSrc = img.getAttribute('src');
  const hoverSrc = "Learn-German-Kuwait/img/quote-2.png";
  card.addEventListener('mouseenter', () => img.setAttribute('src', hoverSrc));
  card.addEventListener('mouseleave', () => img.setAttribute('src', originalSrc));
});

// 📚 كروت الكورسات hover
const courseCards = document.querySelectorAll('.course-card');
courseCards.forEach(card => {
  const mrDiv = card.querySelector('.mr-div');
  const detailsBtn = card.querySelector('.details-btn');
  if (!mrDiv || !detailsBtn) return;
  card.addEventListener('mouseenter', () => {
    mrDiv.classList.add('d-none');
    detailsBtn.classList.remove('d-none');
  });
  card.addEventListener('mouseleave', () => {
    mrDiv.classList.remove('d-none');
    detailsBtn.classList.add('d-none');
  });
});

// 🔀 pop-up filter switching
document.addEventListener("DOMContentLoaded", function () {
  const cards = document.querySelectorAll(".pop-up-filter-card");
  if (cards.length) {
    const views = {
      "نظرة عامة": document.querySelector(".pop-up-filter-view"),
      "المنهج الدراسي": document.querySelector(".pop-up-filter-edu"),
      "المُدرِّس": document.querySelector(".pop-up-filter-teacher"),
    };
    cards.forEach(card => {
      card.addEventListener("click", function () {
        cards.forEach(c => c.classList.remove("active"));
        this.classList.add("active");
        Object.values(views).forEach(view => view?.classList.add("d-none"));
        const text = this.querySelector(".pop-up-filter-text")?.innerText.trim();
        if (views[text]) views[text].classList.remove("d-none");
      });
    });
  }
});

// كلمة المرور
const passwordInput = document.getElementById("password-input");
const togglePassword = document.getElementById("togglePassword");

if (passwordInput && togglePassword) {
  togglePassword.addEventListener("click", () => {
    const type = passwordInput.type === "password" ? "text" : "password";
    passwordInput.type = type;
    togglePassword.textContent = type === "password" ? "visibility" : "visibility_off";
  });
}

// تأكيد كلمة المرور
const confirmPasswordInput = document.getElementById("confirm-password-input");
const toggleConfirmPassword = document.getElementById("toggleConfirmPassword");

if (confirmPasswordInput && toggleConfirmPassword) {
  toggleConfirmPassword.addEventListener("click", () => {
    const type = confirmPasswordInput.type === "password" ? "text" : "password";
    confirmPasswordInput.type = type;
    toggleConfirmPassword.textContent = type === "password" ? "visibility" : "visibility_off";
  });
}

document.addEventListener("DOMContentLoaded", function () {
  const listBtn = document.querySelector(".row-cards");
  const gridBtn = document.querySelector(".long-cards");
  const detailsTeacher = document.querySelectorAll(".details-teacher");

  const cards = document.querySelectorAll(".cards-container .col-lg-4, .cards-container .col-12");
  const cardsImg = document.querySelectorAll(".cards-container .course-img");
  const detailsBtn = document.querySelectorAll(".cards-container .details-btn");

  function applyListView() {
    cards.forEach(card => {
      card.classList.remove("col-lg-4");
      card.classList.add("col-12");
      const innerCard = card.querySelector(".card");
      innerCard.classList.add("d-flex", "flex-row");
      innerCard.querySelector(".cards-long").classList.add("d-flex", "flex-row", "gap-3");
    });
    cardsImg.forEach(img => {
      img.classList.remove("w-100");
      img.classList.add("h-100");
      img.style.width = "400px";
    });
    detailsTeacher.forEach(det => {
      det.classList.add("d-flex", "justify-content-between", "align-items-center");
    });
    listBtn.classList.add("active");
    gridBtn.classList.remove("active");
  }

  function applyGridView() {
    cards.forEach(card => {
      card.classList.remove("col-12");
      card.classList.add("col-lg-4");
      const innerCard = card.querySelector(".card");
      innerCard.classList.remove("d-flex", "flex-row");
      innerCard.querySelector(".cards-long").classList.remove("d-flex", "flex-row", "gap-3");
    });
    cardsImg.forEach(img => {
      img.classList.add("w-100");
      img.classList.remove("h-100");
      img.style.width = "";
    });
    detailsTeacher.forEach(det => {
      det.classList.remove("d-flex", "justify-content-between", "align-items-center");
    });
    gridBtn.classList.add("active");
    listBtn.classList.remove("active");
  }

  // عند الضغط على الزرين
  listBtn.addEventListener("click", function () {
    if (window.innerWidth > 992) { // اشتغل بس على الشاشات الكبيرة
      applyListView();
    }
  });

  gridBtn.addEventListener("click", function () {
    if (window.innerWidth > 992) {
      applyGridView();
    }
  });

  // تفعيل الوضع تلقائيًا حسب حجم الشاشة
  function autoApply() {
    if (window.innerWidth <= 992) {
      applyGridView(); // دائمًا بطاقات على الموبايل/تابلت
      listBtn.style.display = "none"; // إخفاء زر القائمة
    } else {
      gridBtn.style.display = "inline-block";
      listBtn.style.display = "inline-block";
      applyGridView(); // الوضع الافتراضي على الديسكتوب
    }
  }

  autoApply();
  window.addEventListener("resize", autoApply);
});


document.addEventListener("DOMContentLoaded", function () {
  const boxes = document.querySelectorAll(".faq-box");

  // السكاشن الأربعة
  const sections = {
    0: document.getElementById("courses-questations"),
    1: document.getElementById("dates-questations"),
    2: document.getElementById("pay-questations"),
    3: document.getElementById("teaching-questations"),
  };

  boxes.forEach((box, index) => {
    box.addEventListener("click", () => {
      // تبديل الـ active بين الصناديق
      boxes.forEach(b => b.classList.remove("active"));
      box.classList.add("active");

      // إخفاء جميع السكاشن
      Object.values(sections).forEach(sec => sec.classList.add("d-none"));

      // إظهار السكشن المطلوب
      sections[index].classList.remove("d-none");
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const collapses = document.querySelectorAll(".faq-collapse");

  collapses.forEach(collapse => {
    const header = collapse.previousElementSibling; // الهيدر (السؤال)

    // لما الكولابس يفتح
    collapse.addEventListener("show.bs.collapse", function () {
      collapse.classList.add("primary-bg", "p-3", "rounded-bottom");
      header.classList.add("primary-bg", "p-3", "rounded-top");

      const icon = header.querySelector(".faq-main-icon");
      if (icon) {
        icon.classList.remove("fa-chevron-down");
        icon.classList.add("fa-chevron-up");
        icon.classList.add("text-black");
      }
    });

    // لما الكولابس يتقفل
    collapse.addEventListener("hide.bs.collapse", function () {
      collapse.classList.remove("primary-bg", "p-3", "rounded-bottom");
      header.classList.remove("primary-bg", "p-3", "rounded-top");

      const icon = header.querySelector(".faq-main-icon");
      if (icon) {
        icon.classList.remove("fa-chevron-up");
        icon.classList.add("fa-chevron-down");
        icon.classList.remove("text-black");
      }
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const images = document.querySelectorAll(".images-container img");
  const modalImage = document.getElementById("modalImage");

  images.forEach(img => {
    img.addEventListener("click", function () {
      modalImage.src = this.src; // نفس الصورة اللي دوست عليها
      const modal = new bootstrap.Modal(document.getElementById("imageModal"));
      modal.show();
    });
  });
});







document.addEventListener("DOMContentLoaded", function () {
  const rows = document.querySelectorAll(".main-vedio-row");

  rows.forEach(row => {
    const cols = row.querySelectorAll(".sub-ved-container");
    const firstCol = cols[0]; // أول عمود نخليه هو الكبير افتراضياً

    cols.forEach(col => {
      col.addEventListener("mouseenter", function () {
        // صغّر كل الأعمدة
        cols.forEach(c => {
          c.classList.remove("col-md-6");
          c.classList.add("col-md-2");
          c.querySelector(".video-icon")?.classList.add("d-none");
          c.querySelector(".img-desc")?.classList.add("d-none");
        });

        // كبّر العمود الحالي
        this.classList.remove("col-md-2");
        this.classList.add("col-md-6");
        this.querySelector(".video-icon")?.classList.remove("d-none");
        this.querySelector(".img-desc")?.classList.remove("d-none");
      });
    });

    // لما الماوس يسيب الرو كله يرجع للوضع الطبيعي
    row.addEventListener("mouseleave", function () {
      cols.forEach(c => {
        c.classList.remove("col-md-6");
        c.classList.add("col-md-2");
        c.querySelector(".video-icon")?.classList.add("d-none");
        c.querySelector(".img-desc")?.classList.add("d-none");
      });

      // رجّع العمود الأول كبير
      firstCol.classList.remove("col-md-2");
      firstCol.classList.add("col-md-6");
      firstCol.querySelector(".video-icon")?.classList.remove("d-none");
      firstCol.querySelector(".img-desc")?.classList.remove("d-none");
    });
  });
});





