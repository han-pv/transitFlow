document.addEventListener('DOMContentLoaded', function () {
    const testimonialElement = document.getElementById('testimonial');
    if (testimonialElement) {
        var splide = new Splide('#testimonial', {
            perPage: 2,
            type: "loop",
            autoplay: true,
            arrows: false,
            classes: {
                arrows: 'splide__arrows',
                arrow: 'splide__arrow',
                prev: 'splide__arrow--prev',
                next: 'splide__arrow--next',
            },
            interval: 3000,
            pauseOnHover: true,
            pagination: false,
            perMove: 1,
            gap: '0rem',
            breakpoints: {
                576: {
                    perPage: 1,
                },
                768: {
                    perPage: 1,
                },
                992: {
                    perPage: 2,
                },
            },
        });
        splide.mount();

        const prevBtn = document.getElementById("prevBtnForTestimonial");
        const nextBtn = document.getElementById("nextBtnForTestimonial");

        if (prevBtn) {
            prevBtn.addEventListener("click", () => splide.go("-1"));
        }
        if (nextBtn) {
            nextBtn.addEventListener("click", () => splide.go("+1"));
        }
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const transportersElement = document.getElementById('transporters');
    if (transportersElement) {
        const splide = new Splide('#transporters', {
            perPage: 3,
            type: "loop",
            autoplay: true,
            arrows: false,
            interval: 3000,
            pauseOnHover: true,
            pagination: false,
            perMove: 1,
            gap: '2rem',
            breakpoints: {
                576: {
                    perPage: 1,
                },
                768: {
                    perPage: 2,
                },
                992: {
                    perPage: 2,
                },
            },
        });
        splide.mount();
    }
});

document.addEventListener('DOMContentLoaded', function () {
    // wworking PureCounter
    new PureCounter();
});


// For show more blog button
document.addEventListener('DOMContentLoaded', function () {
    const loadMoreBtn = document.getElementById('load-more');

    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function () {
            const nextPage = this.dataset.nextPage;
            fetch(`?page=${nextPage}`)
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');

                    // New blog
                    const newItems = doc.querySelectorAll('#blog-container .blog-item');
                    const container = document.getElementById('blog-container');

                    newItems.forEach(item => {
                        container.appendChild(item);
                    });

                    const newButton = doc.querySelector('#load-more');
                    if (newButton) {
                        loadMoreBtn.dataset.nextPage = newButton.dataset.nextPage;
                    } else {
                        loadMoreBtn.remove();
                    }
                });
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const loadMoreBtn = document.getElementById('load-more');

    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function () {
            const nextPage = this.dataset.nextPage;
            fetch(`?page=${nextPage}`)
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');

                    // Select new team member items
                    const newItems = doc.querySelectorAll('.row-cols-1.row-cols-sm-2.row-cols-lg-3 .col');
                    const container = document.querySelector('.row-cols-1.row-cols-sm-2.row-cols-lg-3');

                    // Append new team members to the container
                    newItems.forEach(item => {
                        container.appendChild(item);
                    });

                    // Update or remove the "load more" button
                    const newButton = doc.querySelector('#load-more');
                    if (newButton) {
                        loadMoreBtn.dataset.nextPage = newButton.dataset.nextPage;
                    } else {
                        loadMoreBtn.remove();
                    }
                })
                .catch(error => {
                    console.error('Error fetching more team members:', error);
                });
        });
    }
});
