# Functionalities Theme Development Plan

## 1. Project Overview
**Theme Name**: Functionalities Theme
**Goal**: Create a pixel-perfect, WordPress Dashboard-inspired theme that is fast, accessible, and highly customizable.
**Current State**: Advanced Customizer integration, Context-aware headers, Single post layout improvements, Typography controls.

## 2. Architecture & Design System
-   **Type**: Classic WordPress Theme (PHP-based templates)
-   **Styling**: Vanilla CSS with CSS Variables (Design Tokens) for easy theming.
-   **JavaScript**: Vanilla JS (no heavy frameworks) for interactions.
-   **Iconography**: SVG-based system (`ft_icon` helper).

## 3. Implementation Status

### ✅ Completed
-   **Core Structure**: `style.css`, `functions.php`, `index.php` created.
-   **Header/Navigation**: Top bar (WP Admin style) and main sticky header designed.
-   **Context-Aware Headers**:
    -   replaced static Hero with `page-header.php` and `ft_get_header_context`.
    -   Customizer controls for showing/hiding headers per context (Home, Blog, Single, Page).
-   **Mobile Menu**: Responsive slide-down menu with accessibility support.
-   **CSS Variables**: Comprehensive token system for colors, spacing, and typography.
-   **Customizer Enhancements**:
    -   **Identity**: Controls for **Logo Width/Height**, **Site Title** (Show/Hide, Color, Size, Weight), **Tagline** (Show/Hide).
    -   **Typography**: Controls for Font Family (Inter/System/Serif), Weight, Base Size, **Line Height**.
    -   **Global Design**: Controls for Button Radius, Input Styles, Icon Stroke Width.
    -   **CSS Generation**: dynamic `customizer-css.php`.
-   **Single Post Layout**:
    -   Edge-to-Edge Featured Image (full width relative to card).
    -   Centered Content for Readability (`.ft-readable-content` max-width 680px).
-   **Responsive Upgrade**:
    -   Updated `style.css` with Modern CSS (`clamp`, `min`, `minmax`).
    -   Fluid typography and spacing.
-   **Interactions**: FAQ Accordion and Copy-to-Clipboard logic implemented in `main.js`.

### 🚧 In Progress / Next Up
1.  **Deep Customizer Refactor (Modular Architecture)**:
    -   Split `customizer.php` into `inc/customizer/` directory.
    -   **Global Options Panel**: Fonts, Colors, Typography, Layout.
    -   **Frontpage Options Panel**:
        -   Sections: Hero, Features, Latest Posts, Featured Posts, CTA, FAQ, Testimonials, Contact, Custom HTML.
        -   Controls: Toggle (Show/Hide), Priority (Sorting), Content.
    -   **Blog/Archive Options Panel**: Hero, Featured Posts, Category Filter, Custom HTML, Sidebar.
    -   **Single Post/Page/CPT Options Panel**:
        -   **Hero Layouts**: No Image, Left, Right, Top, Bottom, Overlay.
        -   **Meta**: Toggle individual meta items.
        -   Sections: Content, Author Box, Related Posts, Custom HTML.
    -   **Sorting Logic**: Implement priority-based rendering for these dynamic sections.
2.  **Accessibility & SEO**:
    -   Ensure all new sections use valid Schema markup.
    -   ARIA labels and roles.
3.  **theme.json Integration**:
    -   Sync new Global Options with `theme.json`.

## 5. Notes
-   **Fonts**: Inter is locally hosted and integrated via `inc/customizer.php` and `functions.php`.
-   **Icons**: Using feather-icons inspired SVG system.
