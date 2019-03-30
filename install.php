#!/usr/bin/php
<?php
  $db_host = "localhost:1433";
  $db_user = "root";
  $db_pw = "root";
  $db_name = "db_minishop";
  $db_link = mysqli_connect($db_host, $db_user, $db_pw);
  function query_table($link, $table_name, $query)
  {
    if (mysqli_query($link, $query))
      echo "Table '$table_name' queried successfully.\n";
    else
      die("Error querying table '$table_name'\n" . mysqli_error($link));
  }
  if (!$db_link)
    die("Cannot connect: " . mysqli_connect_error());
  echo "Connected to MySQL server successfully"."\n";
  if (mysqli_select_db($db_link, $db_name))
  {
    echo "db_minishop already exisits"."\n";
    exit();
  }
  $db_create = "CREATE DATABASE $db_name";
  if (mysqli_query($db_link, $db_create))
    echo "Database '$db_name' created successfully\n";
  else
    throw_mysqli_error($db_link);
  mysqli_select_db($db_link, $db_name);
  $create_table_products = "CREATE TABLE products
    (product_id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    product_cat INT, product_title VARCHAR(40) DEFAULT 'item' NOT NULL,
	  product_price INT NOT NULL, product_desc TEXT NOT NULL,
    product_image TEXT NOT NULL);";
  query_table($db_link, "products", $create_table_products);
  $create_table_categories = "CREATE TABLE categories
    (cat_id INT PRIMARY KEY NOT NULL,
    cat_title TEXT NOT NULL);";
  query_table($db_link, "categories", $create_table_categories);
  $insert_products = "INSERT INTO products (product_cat,
    product_title, product_price, product_desc, product_image) VALUES
    (1, 'Supreme Water Bottle', 50, '<p>A red water bottle with Supreme logo.</p>',
    'Supreme-Bottle.jpg'),
    (1, 'Supreme Teddy Bear', 75, '<p>A stuffed bear with Supreme logo.</p>',
    'Supreme-Bear.jpg'),
    (1, 'Supreme Soup Bowl', 50, '<p>A bowl and spoon with Supreme logo.</p>',
    'Supreme-Bowl.jpg'),
    (1, 'Supreme RC', 150, '<p>An RC car with Supreme logo.</p>',
    'Supreme-RC.jpg'),
    (1, 'Supreme Skateboard', 150, '<p>A skateboard with Supreme logo.</p>',
    'Supreme-Skateboard.jpeg'),
	(2, 'Logo Hooded Sweatshirt', 275, '<p>A warm sweatshirt with a signature logo.</p>',
	'Supreme-Sweatshirt.jpg'),
	(2, 'Empre State T-shirt', 100, '<p>A plain T-shirt with a photo of an Emprire State building</p>',
	'Empire-state.jpg'),
	(2, 'Color-Blocked Hoodie', 275, '<p>A bright color-blocked zip hoodie</p>',
	'Color-blocked.png'),
	(2, 'Fuck Love T-Shirt', 100, '<p>A white fuck love T-shirt</p>',
	'Fuck-love.jpg'),
	(2, 'Supreme Kiss Tee', 100, '<p>A pink T-shirt with kissing couples</p>',
	'kiss-tee.png'),
	(3, 'Adidas Yeezy 350 V2', 280, '<p>Purple Adidas sneakers</p>',
	'adidas.jpg'),
	(3, 'Vans SK-8-HI', 480, '<p>Blood and semen Vans</p>',
	'vans.jpg'),
	(3, 'The 10 Nike X OFF', 450, '<p>Tulip pink Nikes</p>',
	'nikes.png'),
	(3, 'Yeezy 350', 400, '<p>Frozen red sneakers</p>',
	'yeezy.jpg'),
	(3, 'Jordan Retro 11', 350, '<p>Retro black-and-white Jordans</p>',
	'jordans.jpg');";
  query_table($db_link, "products", $insert_products);

  $insert_categories = "INSERT INTO categories (cat_id, cat_title) VALUES
    (1, 'accessories'), (2, 'clothing'), (3, 'footwear');";
  query_table($db_link, "categories", $insert_categories);

  $create_table_customers = "CREATE TABLE customers
      (customer_id INT(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    customer_name TEXT NOT NULL,
      customer_email VARCHAR(100) NOT NULL,
    customer_pass VARCHAR(100) NOT NULL,
      customer_address TEXT NOT NULL);";
  query_table($db_link, "customers", $create_table_customers);

  $create_table_admins = "CREATE TABLE `admins`
      (`user_id` INT(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
      `user_email` VARCHAR(255) NOT NULL,
    `user_pass` VARCHAR(255) NOT NULL);";
  query_table($db_link, "admins", $create_table_admins);

  $create_table_cart = "CREATE TABLE cart
      (p_id INT(10) PRIMARY KEY NOT NULL,
      ip_add VARCHAR(255) NOT NULL,
      qty INT DEFAULT 0 NOT NULL);";
  query_table($db_link, "cart", $create_table_cart);

  $create_table_order = "CREATE TABLE `orders`
  (`order_id` int(100) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `p_id` int(100) NOT NULL,
  `c_id` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `order_date` date NOT NULL);";
query_table($db_link, "orders", $create_table_order);

$insert_admins = "INSERT INTO admins (
	`user_email`, `user_pass`) VALUES
    ('xwang@gmail.com', 'xwang'),
    ('rhayat@gmail.com', 'rhayat');";
  query_table($db_link, "admins", $insert_admins);

  $insert_customers = "INSERT INTO customers (customer_name, customer_email, customer_pass, customer_address) VALUES
  ('John', 'john@gmail.com', 'john1', '100 fremont ave'), ('tyler', 'tyler@gmail.com', 'tyler1', '200 Sillicon Vally');";
  query_table($db_link, "customers", $insert_customers);