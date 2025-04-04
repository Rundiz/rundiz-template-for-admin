# CSS functions

The CSS functions to use for replacement or alternative.

## `color-mix`
`color-mix(in srgb, #000000, transparent 40%);`  
`color-mix` can convert hex color to RGB alpha where `transparent 40%` is `0.6` in `rgb()` alpha. The code above is equal to `rgba(0, 0, 0, 0.6)`.

## Relative color syntax
`hsl(from var(--color-red) h s calc(l - 15))`  
The code above is equal to Sass function `darken($color-red, 15)`.  
To use Sass `lighten()` alternative, change `calc()` to `calc(l + 15)`.
