Overview:
application directory is the web app’s directory;

framework directory is for the framework itself;

public directory is to store all the public static resources like html, css and js files.

index.php is the ‘entry-point’ file, the front controller.

Detail:
config - stores the app’s configuration files

controllers - this is for all app’s Controller classes

model - this is for all app’s Model classes

view - this is for all app’s View classes

core - it will store the framework’s core classes

database - database related classes, such as database driver classes

helpers - help/assistant functions

libraries - for class libraries

css - for css files

images - for images files

js - for javascript files

uploads - for uploaded files, such as uploaded images

.env - Using for hiding serect information (not commit this to git . it will in .gitignore) - Change env for different purpose