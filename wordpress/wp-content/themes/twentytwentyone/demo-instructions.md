# News Layout Demo Instructions

## Overview
This WordPress theme has been customized to display news/blog posts in a card layout that matches the design shown in the reference image.

## Features Implemented

### 1. Card Layout
- Each post is displayed as a card with an image on the left and content on the right
- Clean white background with subtle shadows
- Hover effects for better user interaction

### 2. Date Display
- Large blue date number (day of month)
- Month and year displayed below in smaller text
- Matches the design from the reference image

### 3. Special Overlay Feature
- Posts can have a special blue diagonal overlay
- Overlay appears on hover
- Contains promotional text and call-to-action elements
- Can be enabled per post using the custom meta box

### 4. Responsive Design
- Mobile-friendly layout
- Cards stack vertically on smaller screens
- Maintains readability across all devices

## How to Use

### For Regular Posts
1. Create a new post
2. Add a featured image
3. Write your content
4. The post will automatically display in the new card layout

### For Posts with Special Overlay
1. Create a new post
2. Add a featured image
3. In the post editor, look for the "News Overlay Settings" meta box in the sidebar
4. Check "Enable special overlay for this post"
5. Save the post

### Viewing the Layout
- Visit your blog page or archive pages to see the new layout
- The layout will be applied to all post listings (home, archive, search results)

## Files Modified
- `template-parts/content/content-excerpt.php` - Main template for post display
- `assets/css/news-layout.css` - Custom styles for the layout
- `functions.php` - Added CSS enqueue and meta box functionality
- `archive.php` - Updated to use the new template
- `index.php` - Updated to use the new template

## Customization
You can modify the overlay text and styling by editing:
- The overlay content in `content-excerpt.php`
- The CSS styles in `news-layout.css`
- The meta box functionality in `functions.php`
