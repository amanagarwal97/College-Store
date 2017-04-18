Title : Project_2 - College Store

Description : An online marketplace for selling and buying products for college students.

Folder Details : 1) bin - contains script to fetch data of colleges from text file.
                 2) controllers - conatins all the controllers that selects which views to render based on users requests.
                 3) models - contains all the database interactions like insertion,select statements and deletion.
                 4) public - conatins all the files publicly accessible to user. Basically all files in public just contains a call to corresponding controller.
                 5) views - conatins HTML and basic design of the site that gets rendered through controlllers.
                 6) session_data - contains data of current session as required by the CS50 IDE.
                 
Explanation : When a user requests a page say index.php the requests goes to public/index.php from there it is transferred to the corresponding controller say store.php . 
              The controller then works on the request by interacting with the appropriate model and then rendering the appropriate view. In this way MVC is implemented 
              and user has only access to the public folder.
              Working of controllers :
              1) config.php , helpers.php : configuration and helpers function (can also be put in a seperate includes folder).
              2) dashboard.php : For users dashboard displaying user specific items(requires authentication).
              3) items.php : For displaying single item information
              4) login.php : For diplaying login form , submitting to the login form.
              5) postad.php : For displaying postad form , submitting to postad form.
              6) register.php : For displaying register form , submitting to register form.
              7) remove_item.php : For removing a item by user (requires authentication).
              8) search.php : For implementing search with the help of typeahead.
              9) store.php : For displaying store . Called by index.php .
              10) logout.php : Logs out user.
              
Instructions : 
              1) Start the web server : apache50 start ~/workspace/Project_2/public .
              2) Start MySQL server : mysql50 start .
              3) Copy the SQL code in Project_2.sql to the SQL tab in phpmyadmin.
              4) Go to Project_2/bin in command mode and type ./import to insert colleges in table.
              5) Open Web Server from CS50 IDE Tab .
                

