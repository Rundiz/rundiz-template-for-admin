## Start development

If there is no **node_modules** folder in the working project, then run `npm install`.
The node packages will be install in **node_modules** folder.

-----

## Modify

To start modify page, run `npm run watch` command. 
It will be build HTML from PHP, compile JS, SCSS while editing them.

### SCSS

To compile SCSS to CSS use the following command line:<br>
For compile a single file: `sass assets/scss/file.scss assets/css/file.css`.<br>
For compile the whole folders: `sass --update assets/scss:assets/css`.

For expand and nice syntax, append this command to the current command: `--style="expanded"`.<br>
For minimum space, append this command to the current command: `--style="compressed"`.

For no source map, append this command to the current command: `--sourcemap=none`.

For emit comments about line number from source, append this command to the current command: `--line-numbers`.

For force compile even CSS file is newer, append this command to the current command: `--force` (Old SCSS).

Please note that the SCSS files will be automatically compile and minified with source maps once `npm run build` command has been called.

-----

## Build

After finish development or editing the source code, these commands can help.

To build HTML from PHP, minify JS, compile SCSS, build JS packages, run `npm run build` command.

### Publish

To publish this package to node package manager please follow instruction.

1. Update the version number in package.json.
2. Run `npm run build` command.
3. Commit and push to Github.
4. run `npm publish` command.