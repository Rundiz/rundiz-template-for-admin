Task for any developers who want to modify this project and commit to Github.<br>
If you want the files in this project to use in your project then this folder or this command is no need. You can safely delete it.

# Task for working with this project

There are 2 methods to working with this project.<br>
1 is **separate folders** means separate working folder and commit folder.<br>
2 is using the **same folder**.

## Separate folders
There are 2 type of folders

1 is working folder for modify things, views via web browser.<br>
2 is commit folder for commit to Github.

Example:<br>
    Working folder maybe in C:\wwwroot\my-project<br>
    Commit folder maybe in C:\wwwroot\github\my-project

### Clone

* Clone the repository to commit folder.
* Copy all files from commit folder to working folder except **.git** folder.
* Delete all **.html** file except **xhr-page.html** in the main working folder.
* Move everything inside **_original-source-php** to the main working folder.
* Make changes to the project and view it via web browser. Example: http://localhost/my-project

### Commit

Once you finished editing the project, open command line tool and go to working folder.

* Run the command `php _builder/build.php build ../github/my-project`. Please note that **../github/my-project** is related folder from working folder to commit folder by example. You have to change yours.
* This command will works on clear target folder, copy source folder, convert PHP to HTML, compile SCSS to CSS with minified. All tasks in one.
* Wait until completed message appears and then you can commit the project repository inside the commit folder.


## Same folder

This method use the same folder for edit, modify, made changes, and commit the repository.

### Clone

* Clone the repository to the folder. Example C:\wwwroot\my-project
* Run the command `php _builder/build.php modify` and you are ready for editing.

### Commit

Once you finished editing the project, open command line tool in the project's root folder.

* Run the command `php _builder/build.php build self`
* This command will works on convert PHP to HTML, compile SCSS to CSS with minified. All tasks in one.
* Wait until completed message appears and then you can commit the project repository here.