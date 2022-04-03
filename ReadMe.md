# Simple File Hosting
### A simple file hosting built with PHP Hypertext Preprosessor
---
A simple file hosting with PHP and MySQL as backend. By using this to your host, must create first a database and copy the name and paste on the db_name. Get the password and paste it as value of the db_pass, same with the username into the db_user. Create table named files with 6 columns

| Column name | Datatype (length) | Default Value |
| ----- | ----- | ----- |
| ID | INT (11) | Primary Key (Auto increment ) |
| filename | VARCHAR (1000) |  NULL |
| downloads | INT (11) | As Default (0) |
| description | LONGTEXT | As Default (blank) |
| fileencrypt | VARCHAR (1000) | NULL |
| date_added | VARCHAR (100) | CURRENT_TIMESAMP |

Then create a folder named mpop and use the chmod code (777) to allow access from the user into the host. Lastly, just modify the code for the design you want then upload.

Notice: Don't remove the credits, as respect to the owner of the code. You may exclude my name, or organization but not the respective people and platforms on my credits.

Credits:
1. TutorialsPoint (Files Download)
2. GeeksforGeeks (Files Upload)
3. W3schools (Documentations)
4. FreeWebHostingArea (Host)
5. John Roy Lapida Calimlim (Mysqli Real Escape String)