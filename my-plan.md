Ok, so in Theme Options in customizer - it is possible either to customize whole site or just frontpage. I want you to divide it into sections like:

Theme Options
    Global Options
        - Fonts
        - Colors
        - Typography
        - Layout
    Frontpage Options
        - Hero Section with Image Background Support
        - Features or Modules Section
        - Latest Posts Section
        - Featured Posts Section (using a Tag)
        - Call to Action Section
        - FAQ Section
        - Testimonials Section
        - Contact Section
        - Allow user to add custom HTML sections
        - Each section should have a toggle option to show/hide
        - Each section should have a priority option to control the order
        - Option to show or hide sidebar
    Blog (Archive) Options
        - Blog Hero Section
        - Featured Posts Section (using a Tag)
        - Category Filter Section
        - Allow user to add custom HTML sections
        - Each section should have a toggle option to show/hide
        - Each section should have a priority option to control the order
        - And then the blog will show the recent posts as set in Reading Settings
        - Option to show or hide sidebar

    Single Post Options
        - Single Post Hero Section with various layout options like no-featured image, featured image on left, featured image on right, featured image on top, featured image on bottom, featured image Background with proper overlay
        - Proper meta information with options to add and remove certain meta.
        - Content Section
        - Author Box Section
        - Related Posts Section
        - Allow user to add custom HTML sections
        - Each section should have a toggle option to show/hide
        - Each section should have a priority option to control the order
        - Option to show or hide sidebar
    
    Archive Options
        - Same like Blog (Archive) Options
    Single Page Options
        - Same like Single Post Options
    Single CPT Options
        - Same like Single Post Options

All outputs should be accessibility first and optimize for SEO with proper schema markup.

Now reactor style.css so that generated global.css loads sitewide. style.css should only contain the CSS reset. For other pages separate CSS files should be generated. Like frontpage will have have frontpage.css and blog will have blog.css and single post will have single-post.css and so on.