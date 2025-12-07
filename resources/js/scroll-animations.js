document.addEventListener("DOMContentLoaded", () => {

    const hero = document.querySelector(".scroll-hero");

    // Paksa hero animasi saat pertama kali halaman muncul
    if (hero) {
        setTimeout(() => {
            hero.classList.add("visible");
        }, 80);
    }

    // Observer untuk fade section lain
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("visible");
            } else {
                entry.target.classList.remove("visible");
            }
        });
    }, { threshold: 0.3 });

    // Observe semua elemen animasi
    document.querySelectorAll(".scroll-hero, .scroll-fade")
        .forEach(el => observer.observe(el));
});
