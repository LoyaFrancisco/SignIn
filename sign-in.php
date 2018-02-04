
<?php
    if (isset($_GET['eventid'])) {
        $mysqli          = new mysqli('localhost', 'memo', 'memo', 'USER');

        $event_id      = mysqli_real_escape_string($mysqli,  $_GET['eventid']);
        $sql                = "SELECT * FROM event WHERE id='$event_id'";
        $result           = mysqli_query($mysqli, $sql) or die("Bad Query: $sql");
        $row               = mysqli_fetch_array($result);
    }

 ?>

 <!DOCTYPE html>
 <html lang="en">

   <head>

     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">
     <!--Load the AJAX API-->
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <script type="text/javascript">

       // Load the Visualization API and the corechart package.
       google.charts.load('current', {'packages':['corechart']});

       // Set a callback to run when the Google Visualization API is loaded.
       google.charts.setOnLoadCallback(drawChart);

       // Callback that creates and populates a data table,
       // instantiates the pie chart, passes in the data and
       // draws it.
        function drawChart() {

         var data = new google.visualization.DataTable();
         data.addColumn('string', 'Topping');
         data.addColumn('number', 'Slices');
         data.addRows([
           ['Mushrooms', 3],
           ['Onions', 1],
           ['Olives', 1],
           ['Zucchini', 1],
           ['Pepperoni', 2]
         ]);

         // Set chart options
         var piechart_options = {title:'Pie Chart: <? echo $row['event_question']?>',
                        width:800,
                        height:600};

         var barchart_options = {title:'Barchart: <? echo $row['event_question']?>',
                        width:800,
                        height:600,
                        legend: 'none'};

         // Instantiate and draw our chart, passing in some options.
         var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
         piechart.draw(data, piechart_options);


         var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
         barchart.draw(data, barchart_options);
       }
     </script>

     <title>Simplified Event Planner</title>

     <!-- Bootstrap core CSS -->
     <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

     <!-- Custom fonts for this template -->
     <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
     <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
     <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
     <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

     <!-- Custom styles for this template -->
     <link href="css/agency.min.css" rel="stylesheet">

   </head>

   <body id="page-top">

     <!-- Navigation -->
     <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
       <div class="container">
         <a clfass="navbar-brand js-scroll-trigger" href="#page-top">Member Sign-In</a>
         <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
           Menu
           <i class="fa fa-bars"></i>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">
           <ul class="navbar-nav text-uppercase ml-auto">
             <li class="nav-item">
               <a class="nav-link js-scroll-trigger" href="#portfolio">Sign into Event</a>
             </li>
             <li class="nav-item">
               <a class="nav-link js-scroll-trigger" href="#about">Data visualization</a>
             </li>
           </ul>
         </div>
       </div>
     </nav>

     <!-- Header -->
     <header class="masthead" >
       <div class= "member">
       <div class="container">
         <div class="intro-text">
           <div class="intro-lead-in">Welcome to <? echo $row['event_title']?> </div>
           <div class="intro-heading text-uppercase"> <? echo $row['event_date']?></div>
           <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Instructions</a>
         </div>
       </div>
       </div>
     </header>

 <!-- Event sign in -->
     <section class="bg-light" id="portfolio">
       <div class="container">

         <div class="row">
           <div class="col-lg-12 text-center">
             <h2 class="section-heading text-uppercase">Sign in to <? echo $row['event_title']?></h2>
             <h3 class="section-subheading text-muted">Please use the form below to sign in, and make sure to answer the secret code</h3>
           </div>
         </div>
         <div class="row">
           <div class="formcontainer">
             <form id="new_event" action="" method="post">
               <h3>We've Been Waiting For You! But First...</h3>
               <h4>Please input the details below to sign in</h4>
               <fieldset>
                   <p class="muted-text"> Name</p>
                 <input placeholder="Name" name="name" type="text" required autofocus>
               </fieldset>
               <br>
               <fieldset>
                 <p>Gender</p>
                 <select name = "Gender">
                   <option value = "no_option"></option>
                   <option value = "male">Male</option>
                   <option value = "female">female</option>
                   <option value = "other">other</option>
                 </select>
               </fieldset>
               <br>
               <fieldset>
               <p><? echo $row['event_question']?></p>
                 <select name = "User_answers">
                   <option value = "no_option"></option>
                   <option value = "option1">Option1</option>
                   <option value = "option2">Option2</option>
                   <option value = "option3">Option3</option>
                 </select>
               </fieldset>
               <br>
               <fieldset>
                   <p> Secret Event Code</p>
                 <input placeholder="Secret Event Code" name="user_code" type="text" required autofocus>
               </fieldset>
               <fieldset>
                 <button name="submit" type="submit" id="newevent-submit" data-submit="...Sending">Submit</button>
               </fieldset>
         </div>
       </div>
     </section>

     <!-- Data Visualizaion -->
     <section id="about">
       <div class="container">
         <div class="row">
           <div class="col-lg-12 text-center">
             <h2 class="section-heading text-uppercase"> Live Statistics</h2>
             <h3 class="section-subheading text-muted">Current Data</h3>
           </div>
         </div>
         <div class="row">
           <div class = "col-md-6">
             <div id="piechart_div"></div>
           </div>
           <div class = "col-md-6">
             <div id="barchart_div"></div>
           </div>
         </div>
       </div>
     </section>

<?php
    require_once "templates/footer.html"
 ?>

     <!-- Bootstrap core JavaScript -->
     <script src="vendor/jquery/jquery.min.js"></script>
     <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

     <!-- Plugin JavaScript -->
     <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

     <!-- Contact form JavaScript -->
     <script src="js/jqBootstrapValidation.js"></script>
     <script src="js/contact_me.js"></script>

     <!-- Custom scripts for this template -->
     <script src="js/agency.min.js"></script>

   </body>

 </html>
