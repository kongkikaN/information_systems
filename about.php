<?php
  session_start();
  include 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Science Archive</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script src="functions/functions.js"></script>
    <?php 
    if (isset($_SESSION["user_id"])){
      $user_id = $_SESSION["user_id"];
      if (isAdministrator($user_id)){
        echo '<div class="alert alert-danger" role="alert">
          Welcome admin,' . $_SESSION["first_name"].'. Click <a href = "users.php">HERE</a> to display users.
        </div>';
      }
    }
    ?>
</head>
<body>
  <!-- Header -->
<header class="banner">
  <span class="background"></span>
  <h1><a href="index.php"><img src="images/logo.png" width="500px"></a></h1>
</header>
<nav id="navigation">
    <ul style = "background-color: #080519;">
      <div style = "background-color: #080519;" class = "container">
        <li><a href="index.php">Home</a></li>
        <?php toggleLogInLogOut(); ?>
          
        <li><a href="about.php">About</a></li>
        <form method = 'get'>
          <li style="float:right"><input type="submit" value = "search" style = "margin-top : 11px; margin-right:88px;" name="search_bar" placeholder="Information Systems"></li>
          <li style="float:right"><input type="text" style = "margin-top : 11px; margin-right: 5px;" name="search_bar" placeholder="search"></li>
        </form>
    </div>
    </ul> 
</nav>
<main>
  <div class = "col-md-2"></div>
  <div class = "col-md-8">
    <h1>The Open University</h1>
    <p>
      Η εφαρμογή <i> The Open University</i> υλοποιήθηκε στα πλαίσια του μαθήματος '<b>Πληροφοριακά Συστήματα</b>'
      του τμήματος <b>Ψηφιακών Συστημάτων, Πανεπιστήμιο Πειραιά</b> από τους φοιτητές <b>Κονγκίκα Νίκος</b> και <b>Μαργαρίτης Γιώργος</b>.
    </p>
    <p>
    Στόχος της εργασίας αυτής είναι η μελέτη και η εφαρμογή γνώσεων που αφορούν την πραγμάτωση πληροφοριακών συστημάτων. Το θέμα που επιλέχθηκε στα πλαίσια της αυτού είναι η δημιουργία ηλεκτρονικής εφαρμογής που επιτρέπει στην επιστημονική κοινότητα του Πανεπιστημίου Πειραιώς να δημοσιεύει και να μοιράζεται άρθρα και εργασίες. Στη συνέχεια θα αναφερόμαστε στην εφαρμογή που αναπτύχθηκε ως ‘The Open University’.</p><p>
Η εφαρμογή <i>‘The Open University’</i> αξιοποιεί τεχνολογίες βάσεων δεδομένων και δυναμικού προγραμματισμού. Επιτρέπει στους χρήστες της να αναζητούν και να προβάλουν άρθρα και γενικότερα εκπαιδευτικό υλικό, να αξιολογήσουν τις αναρτήσεις ή και να δημιουργήσουν οι ίδιοι περιεχόμενο. Η εφαρμογή μας απευθύνεται σε καθηγητές, ερευνητές, φοιτητές ακόμη και σε εξωτερικούς του Πανεπιστημίου Πειραιώς – με περιορισμένη πρόσβαση – . Στόχος της είναι η υποστήριξη της κοινότητας στην ακαδημαϊκή εξέλιξη και διευκόλυνση σε ερευνητικά θέματα.</p><p>
Η βιβλιοθήκη του Πανεπιστημίου Πειραιώς αναπτύσσει παρόμοια αποθετήρια όπως τα <i>‘Ψηφιακό Αποθετήριο Ιδρύματος ΣΠΟΥΔΑΙ’, ‘Ιδρυματικό Αποθετήριο Διώνη’ και ‘ψηφιακό αποθετήριο των Κέντρων Ευρωπαϊκής Τεκμηρίωσης της Ελλάδος KETlib’</i>, όπου αναρτώνται σε ψηφιακή μορφή μεταπτυχιακές και διδακτορικές διατριβές καθώς και άρθρα των τμημάτων του ιδρύματος. Η εφαρμογή <i>‘The Open University’</i> αποτελεί μια γενίκευση των παραπάνω υπηρεσιών και προσφέρει σε φοιτητές, ερευνητές και καθηγητές του πανεπιστημίου να κοινοποιούν εκπαιδευτικό και επιστημονικό υλικό.</p>

  </div>
  <div class = "col-md-2"></div>
</main>
<?php   
  include 'login_modal.php';
  include 'register_modal.php'; 
?>
</body>
</html>