## Start development

To start development, please open the **readme.md** in **_builder** folder and follow instruction on clone section.

If there is no **node_modules** folder in the working project, then run `npm install`.
The node packages will be install in **node_modules** folder.

-----

## Modify

To start modify page, run `npm run phpmodify` command.

To build or compile JS, SCSS on editing, run `npm run watch` command.

### SCSS

To compile sass (or scss) to css use the following command line:<br>
For compile a single file: `sass assets/scss/file.scss assets/css/file.css`.<br>
For compile the whole folders: `sass --update assets/scss:assets/css`.

For expand and nice syntax, append this command to the current command: `--style="expanded"`.<br>
For minimum space, append this command to the current command: `--style="compressed"`.

For no source map, append this command to the current command: `--sourcemap=none`.

For emit comments about line number from source, append this command to the current command: `--line-numbers`.

For force compile even css file is newer, append this command to the current command: `--force` (Old Scss).

Please note that the sass files will be automatically compile and minified with source maps once `gulp` command has been called.

-----

## Build

After finish development or editing the source code, these commands can help.

To minify JS, compile SCSS, build JS packages, run `npm run build` or `gulp` command.

### Publish

To publish this package to node package manager please follow instruction.

1. Update the version number in package.json.
2. Run `gulp` command or run `npm run build` command.
3. Open **readme.md** in **_builder** folder and follow instruction on commit section. Or run `npm run phpbuild` command.
4. Commit and push to Github.
5. run `npm publish` command.