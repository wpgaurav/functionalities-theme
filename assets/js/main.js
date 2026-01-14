/**
 * Functionalities Theme - Main JavaScript
 *
 * @package Functionalities_Theme
 * @since 1.0.0
 */

(function () {
    'use strict';

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        const menuToggle = document.getElementById('menu-toggle');
        const mobileNav = document.getElementById('mobile-nav');

        if (!menuToggle || !mobileNav) return;

        const menuIcon = menuToggle.querySelector('.icon-menu');
        const closeIcon = menuToggle.querySelector('.icon-close');

        menuToggle.addEventListener('click', function () {
            const isOpen = mobileNav.classList.toggle('is-active');

            menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');

            if (menuIcon) menuIcon.style.display = isOpen ? 'none' : 'block';
            if (closeIcon) closeIcon.style.display = isOpen ? 'block' : 'none';

            // Prevent body scroll when menu is open
            document.body.style.overflow = isOpen ? 'hidden' : '';
        });

        // Close menu when clicking outside
        document.addEventListener('click', function (e) {
            if (!mobileNav.contains(e.target) && !menuToggle.contains(e.target)) {
                mobileNav.classList.remove('is-active');
                menuToggle.setAttribute('aria-expanded', 'false');
                if (menuIcon) menuIcon.style.display = 'block';
                if (closeIcon) closeIcon.style.display = 'none';
                document.body.style.overflow = '';
            }
        });

        // Close menu on escape key
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && mobileNav.classList.contains('is-active')) {
                mobileNav.classList.remove('is-active');
                menuToggle.setAttribute('aria-expanded', 'false');
                menuToggle.focus();
                if (menuIcon) menuIcon.style.display = 'block';
                if (closeIcon) closeIcon.style.display = 'none';
                document.body.style.overflow = '';
            }
        });
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    function initSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');

                if (href === '#' || href === '#primary') return;

                const target = document.querySelector(href);

                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

    /**
     * Handle Focus Visibility
     */
    function initFocusVisible() {
        // Add class for keyboard navigation
        document.body.addEventListener('keydown', function (e) {
            if (e.key === 'Tab') {
                document.body.classList.add('keyboard-nav');
            }
        });

        document.body.addEventListener('mousedown', function () {
            document.body.classList.remove('keyboard-nav');
        });
    }

    /**
     * Lazy Load Images
     */
    function initLazyLoad() {
        if ('loading' in HTMLImageElement.prototype) {
            // Native lazy loading supported
            document.querySelectorAll('img[loading="lazy"]').forEach(function (img) {
                img.src = img.dataset.src || img.src;
            });
        } else {
            // Fallback for older browsers
            const observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src || img.src;
                        observer.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(function (img) {
                observer.observe(img);
            });
        }
    }

    /**
     * FAQ Accordion
     */
    function initAccordion() {
        const faqItems = document.querySelectorAll('.faq-item');
        if (!faqItems.length) return;

        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            if (!question) return;

            question.addEventListener('click', () => {
                const isOpen = item.classList.contains('is-active');

                // Close all other items
                faqItems.forEach(otherItem => otherItem.classList.remove('is-active'));

                if (!isOpen) {
                    item.classList.add('is-active');
                }
            });
        });
    }

    /**
     * Copy to Clipboard
     */
    function initCopyButtons() {
        const copyButtons = document.querySelectorAll('.copy-btn');
        if (!copyButtons.length) return;

        copyButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                const targetId = this.dataset.copyTarget;
                const targetText = targetId ? document.getElementById(targetId)?.innerText : this.dataset.copyText;

                if (targetText) {
                    navigator.clipboard.writeText(targetText).then(() => {
                        const originalText = this.innerHTML;
                        this.innerHTML = '<svg xmlns="http://www.w3.org/2010/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg> Copied!';
                        setTimeout(() => {
                            this.innerHTML = originalText;
                        }, 2000);
                    });
                }
            });
        });
    }

    /**
     * Initialize
     */
    function init() {
        initMobileMenu();
        initSmoothScroll();
        initFocusVisible();
        initLazyLoad();
        initAccordion();
        initCopyButtons();
    }

    // Run on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

})();
