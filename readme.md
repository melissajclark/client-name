# WordPress Block Editor Starter Theme
**by [Melissa Clark](https://melissajclark.ca/)**

- This theme started from the [Full Site Editing theme generator](https://fullsiteediting.com/block-theme-generator/). 
- My version is meant to be cloned for my client projects. The theme is a starting point only.

## Theme.json
- It includes a `theme.json` file that turns off **a lot** of settings. I remove the default colour palette, font size, and font family controls. 
- I also disable the `core` block patterns in `functions.php`. I do this to simplify the editing experience for my clients.

## Sass and Gulp
- Sass is setup to compile `style.css`, `editor.css`, `login.css` and a file I call `block-editor-admin.css`. That file has some small adjustments for editor elements outside of the `.editor-styles-wrapper` that the `editor.css` file focuses on.
- The Sass is compiled with Gulp. I know there are cooler ways to do this now but it still works for me. :) 
- I use CSS Grid for my website layouts. The `_layout-grid.scss` file shows my setup. This is adjusted for every client project. 

## JavaScript files

- `block-variations.js` includes a few block variations for the Query block. I often need a custom variation and this is a good starting point. 
- `block-styles-and-types.js` includes blockTypes that I unregister (such as `core/verse`) and blockStyles I unregister such as `'core/separator', 'dots'`. It also includes registration of custom blockStyles.