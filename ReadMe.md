# Motley Fool GlobalTech Developer Interview Project
Hello! Thank you for taking the time to review this project. I tracked all of my time and what I did at each step, below is that development timeline.
* Setting up the site structure from a blank WP theme - Dec. 12th: 10:35 am - 11:18 am; 43 minutes
* Brainstorming the best way to build the site based on requirements - Dec. 13th: 11:00 am - 11:47 am; 47 minutes (Running total: 1hr 30min)
* Developing the site without styles - Dec. 13th: 12:13 pm - 4:45 pm; 4 hours 32 minutes (Running total: 6hrs 2min)
* Adding styles and further site structure - Dec. 14th: 10:13 am - 11:43 am; 1 hour 30 minutes (Running total:  7hrs 32min)
* Adding more styles - Dec. 14th: 4:01 pm - 4:57 pm; 56 minutes (Running total:  8hrs 28min)
* Adding _even more_ styles - Dec. 14th: 6:49 pm - 7:23 pm; 34 minutes (Running total:  9hrs 02min)
* Setting up site on WPEngine/Creating ReadMe - Dec. 14th: 7:29 pm - 8:25 pm; 58 minutes (Ending total: 9hrs 58min)
* Final push to GitHub - Dec. 15th: 9:04 am

To view the site I created, please visit https://stockadvisor.wpengine.com. Credentials to the admin have been sent through email.

## General Setup
1. First, install a fresh version of WordPress
2. Clone project from github repo - git@github.com:MFerger/Stock_Advisor.git
3. Overwrite the entire wp-content/ folder. Typically, images aren't included on Github, but I included them for ease of setup. There is also a database dump with the home/site url as "http://localhost:8888". A serialized find/replace will be needed if setup is on another domain/port.
4. If importing the DB is an option, the site should be populated, and the uploads folder will fill in the images for the site. If not, population will need to be done. Follow the steps below for site population.

###Population
1. First, activate the 4 plugins installed. Advanced Custom Fields PRO, Company, Recommendation, and Stock.
2. Select the "Foolish" theme from Appearance > Themes.
2. Create a company from the "Company" sidebar item that you are writing about or will be using on the site. Companies need to be created before Stocks and Recommendations.
  1. Add the Title, a description, a featured image (the single view's hero background), and a company logo to the "Logo" custom field. Publish company.
3. Create a stock from the "Stock" sidebar item that is related to the company you just created.
  1. Select the "Associated Company" at the bottom which pulls from the Company custom post type. Add in the ticker symbol for the stock (ex. NASDAQ:SBUX). Publish stock.
4. Create a recommended article from the "Recommendation" sidebar item.
  1. Add a title, the article contents, featured image, and select the "Associated Stock" at the bottom. Publish article.
5. Create a new page from the "Pages" sidebar item and give it a name "News". In "Page Attributes" in the right-hand column, select the "News Articles" page template. Publish page.
6. Create a menu for the header of the website and add the site's logo.
  1. Navigate to Appearance > Menus. Make sure in "Screen Options" at the top right of the screen has Pages, Posts, Company, Recommendation, and Custom Links checked.
  2. Name the menu and check the "Main Menu" box in the "Menu Settings" at the bottom of the screen.
  3. Add a custom link with the label "Recommendations" and url of "/". This will be the homepage of the site.
    1. (Optional) Add the recommended article you created nested below this item
  4. Add the "News" page under the previous menu item.
  5. Add a custom link with the label "Companies" and a url of "/company/". This will be the companies index page.
    1. (Optional) Add the company you created nested below this item.
  6. Save the menu.
7. Navigate to the "Theme Options" sidebar and select/upload a logo for the site's header.
8. Create a post from the "Posts" sidebar item. These are the News Articles of the site. If you are looking for pagination, you will need to create at least 11 posts.
