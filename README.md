# example-simple-page

Some things to specify:

1. The example is very simple, there are products that belong to a category, the product is added to the cart and the user can start the flow to make the payment with paypal.
2. How to deploy:
  - create DB and execute sql file  "/example-simple-page/database/db_example_simple_page.sql", this file contains all the tables and data.
  - copy all files in the folder "/example-simple-page/project-to-deploy" to Webserver.
  - the DB settings is in file "/example-simple-page/project-to-deploy/config/app.php" line 220.
3. For the example I used:
  - MySql for DB.
  - php using CakePHP 3.2.12 framework.
  - Bootstrap, jQuery, CSS.
  - Some functions: login, manage entities(users, products, categories), show products by category, add product to cart, view/delete/addCount products in my cart.
  - Access to frontend: http://localhost/example-simple-page/frontend.
  - Access to backend: http://localhost/example-simple-page/users/login (User = "John", Password = "123456").
  - IDE: phpStorm 2016.
4. In order to see some examples for my code please go to the files:
  - CSS: "/example-simple-page/project-to-deploy/webroot/css/frontend.css" 
  - JS: "/example-simple-page/project-to-deploy/webroot/js/frontend.js"
  - PHP: "/example-simple-page/project-to-deploy/src/Controller/FrontendController.php"
  - HTML: "/example-simple-page/project-to-deploy/src/Template/Layout/frontend.ctp"
  - Also I did a reusable elements: "/example-simple-page/project-to-deploy/src/Template/Element"
5. Websites I worked on are visibles on Internet and the others are accessible only in Cuba. In all cases respecting the designer's proposal:

      . http://www.pensarencuba.cu/revista/
      . http://america-nuestra.cu/esp/site/home



