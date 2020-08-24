INSTRUCTIONS:
Open visual studio and run a new terminal.

Use the cd command in the terminal to change the working directory to your "Ampps" "www" folder. (Example: cd "C:\Program Files\Ampps\www" (it is usually the default installation path, but please change it accordingly).

If you have cloned the project before, please delete the "CMS" folder in the "www" folder.

After making sure that you are in the "www" folder, clone the project with the following command: git clone https://github.com/eimantaspav/CMS.git

DATABASE IMPORT

Open Mysql Workbench software and create a new connection with the following information:

Connection name: cms
Hostname: 127.0.0.1 
Username: root

Now please connect with the password "mysql". Once connected, select "Server" -> "Data Import". 

Change the path of "Import from Dump Project Folder" to the cloned "mysqldb" folder (Example: C:\Program Files\Ampps\www\cms\mysqldb). 

Press the "Start Import" button at the bottom right.

Open your browser and enter the following page "http://localhost/CMS/" (without the quatation marks).
Please enter the "Admin Panel" and login using:

username: admin

password: password

To make sure that you are currently viewing the latest version of the project, please press Ctrl+f5 to clear the browser cache.

FEATURES:

1. Session authentication.
2. Create new articles.
3. Delete articles.
4. Switch between web preview and admin panel.
5. Go back button.