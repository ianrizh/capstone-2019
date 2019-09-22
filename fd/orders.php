<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>

<!-- STYLING FOR TAB CONTAINER -->
<style>
/* Style the tab */
.tab {
overflow: hidden;
border: 1px solid #ccc;
background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
background-color: inherit;
float: left;
border: none;
outline: none;
cursor: pointer;
padding: 14px 16px;
transition: 0.3s;
font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
display: none;
padding: 6px 12px;
border: 1px solid #ccc;
border-top: none;
border-bottom: none;
}

.tabcontent {
animation: fadeEffect 1s; /* Fading effect takes 1 second */
}

/* Go from zero to full opacity */
@keyframes fadeEffect {
from {opacity: 0;}
to {opacity: 1;}
}
</style>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="tab">
<button class="tablinks" onClick="openTab(event, 'tab_orders')" id="defaultOpen">ORDERS</button>
<button class="tablinks" onClick="openTab(event, 'tab_services')">NEW CUSTOMER</button>
<button class="tablinks" onClick="openTab(event, 'tab_services1')">OLD CUSTOMER</button>
</div>

<div class="content">
<?php
if(isset($_SESSION['error'])){
echo "
<div class='alert alert-danger alert-dismissible' style='width:80% margin-top:10px;'>
<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
<h4><i class='icon fa fa-warning'></i> Ooops!</h4>
".$_SESSION['error']."
</div>
";
unset($_SESSION['error']);
}
if(isset($_SESSION['success'])){
echo "
<div class='alert alert-success alert-dismissible' style='width:80% margin-top:10px;'>
<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
<h4><i class='icon fa fa-check'></i> Success!</h4>
".$_SESSION['success']."
</div>
";
unset($_SESSION['success']);
}
?>
<!-- ORDERS -->
<div id="tab_orders" class="tabcontent">
<div class="box">
<div class="box-body">	
<table class="table" id="tbl_orders">
<thead>
<tr>
<th style="text-align:center">PRODUCT</th>
<th style="text-align:center">QUANTITY</th>
<th style="text-align:center">PRICE</th>
<th style="text-align:center">AMOUNT</th>
<th style="text-align:center"></th>
</tr>
</thead>
<tbody>
<tr>
<td>
<div class="form-group">
<select class="form-control order_product">
<option value="" disabled selected required>---Select---</option>
<?php
$conn = $pdo->open();

try {
$stmt = $conn->prepare("SELECT * FROM products where deleted_date = '0000-00-00'");
$stmt->execute();
?>
<?php foreach($stmt as $row): ?>
<option value="<?= $row['id_products'] ?>" data-price="<?= $row['price'] ?>"><?= $row['name'] ?></option>
<?php endforeach; ?>
<?php
}
catch(PDOException $e){
echo $e->getMessage();
}

$pdo->close();
?>
</select>
</div>
</td>
<td>
<div class="form-group">
<input type="number"  class="form-control text-right order_quantity" oninput="this.value=Math.abs(this.value)" />
</div>
</td>
<td>
<div class="form-group">
<input type="number" class="form-control text-right order_price" readonly/>
</div>
</td>
<td>
<div class="form-group">
<input type="text" class="form-control text-right order_amount" readonly/>
</div>
</td>
<td>
<button class="btn btn-danger btn_deleterow">X</button>
</td>
</tr>
</tbody>
</table>
<button class="btn btn-primary" id="btn_addorder" style="margin-left:8px"><i class="fa fa-plus"></i> ADD ORDER</button>
<div class="row">
<div class="col-sm-6"></div>
<div class="col-sm-3" style="text-align:right">
<label>CASH</label>
</div>
<div class="col-sm-3">
<div class="form-group">
<input type="number" class="form-control text-right" id="order_cash" oninput="this.value=Math.abs(this.value)" />
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6"></div>
<div class="col-sm-3" class="col-sm-3" style="text-align:right">
<label>TOTAL AMOUNT</label>
</div>
<div class="col-sm-3">
<div class="form-group">
<input type="number" class="form-control text-right" id="order_total" readonly/>
</div>
</div>
</div>
<!--div class="row">
<div class="col-sm-6"></div>
<div class="col-sm-3">
<label>CHANGE</label>
</div>
<div class="col-sm-3">
<div class="form-group">
<input type="number" class="form-control text-right" id="order_change" readonly/>
</div>
</div>
</div-->
<div class="row" style="text-align:right;margin:20px 1px 0px 0px;">
<button type="button" id="btn_viewsummary" class="btn btn-success btn-flat"><i class="fa fa-check"></i> CHECK OUT</button>
</div>
</div>
</div>
</div>


<!-- SERVICES -->
<div id="tab_services" class="tabcontent">
<div class="box">
<div class="box-header with-border">
<h3 class="box-title" style="color:#36bbbe"><b><i class="fa fa-user"></i> CUSTOMER'S INFO</b></h3>
</div>
<div class="box-body">	
<form class="form-horizontal" method="POST" action="walk-in_add.php">
<div class="form-group">
<label for="name" class="col-sm-3 control-label">FIRST NAME</label>

<div class="col-sm-8">
<input type="text" class="form-control" id="firstname" name="firstname" autofocus autocomplete="off" required>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-3 control-label">LAST NAME</label>

<div class="col-sm-8">
<input type="text" class="form-control" id="lastname" name="lastname" autocomplete="off" required>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-3 control-label">CONTACT NUMBER</label>

<div class="col-sm-8">
<input type="text" class="form-control" id="contact" name="contact" autocomplete="off" required>
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-3 control-label">EMAIL ADDRESS</label>

<div class="col-sm-8">
<input type="text" class="form-control" id="email" name="email" autocomplete="off" required>
</div>
</div>
<div class="box-header with-border" style="margin-left:-10px;">
<h3 class="box-title" style="color:#36bbbe"><b><i class="fa fa-paw"></i> PET'S INFO</b></h3>
</div>
<div class="box-body">	
<form class="form-horizontal" method="POST" action="walkin_add.php">
<div class="form-group">
<label for="name" class="col-sm-3 control-label">PET NAME</label>

<div class="col-sm-8">
<input type="text" class="form-control" id="pet_name" name="pet_name" autofocus autocomplete="off" required>
</div>
</div>
<div class="form-group">
<label for="lastname" class="col-sm-3 control-label">PET TYPE</label>

<div class="col-sm-8">
<script src="https://code.jquery.com/jquery-1.11.0.min.js" integrity="sha256-spTpc4lvj4dOkKjrGokIrHkJgNA0xMS98Pw9N7ir9oI=" crossorigin="anonymous"></script>
<style>
#pet_breed option{
display:none;
}

#pet_breed option.label{
display:block;
}
</style>

<select id="pet_type" name="pet_type" class="form-control" required>
<option value="" disabled selected required>---Select---</option>
<option value="Cat">Cat</option>
<option value="Dog">Dog</option>
</select>

</div>
</div>
<div class="form-group">
<label for="home" class="col-sm-3 control-label">PET BREED</label>

<div class="col-sm-8">
<select id="pet_breed" name="pet_breed" class="form-control" disabled="disabled" required>
<option value="" disabled selected required>---Select---</option>
<option rel="Cat" value="Abyssinian">Abyssinian</option>
<option rel="Cat" value="American Bobtail">American Bobtail</option>
<option rel="Cat" value="American Curl">American Curl</option>
<option rel="Cat" value="American Shorthair">American Shorthair</option>
<option rel="Cat" value="American Wirehair">American Wirehair</option>
<option rel="Cat" value="Balinese">Balinese</option>
<option rel="Cat" value="Bengal">Bengal</option>
<option rel="Cat" value="Birman">Birman</option>
<option rel="Cat" value="Bombay">Bombay</option>
<option rel="Cat" value="British Shorthair">British Shorthair</option>
<option rel="Cat" value="Burmese">Burmese</option>
<option rel="Cat" value="Burmilla">Burmilla</option>
<option rel="Cat" value="Chartreux">Chartreux</option>
<option rel="Cat" value="Cornish Rex">Cornish Rex</option>
<option rel="Cat" value="Cymrix">Cymrix</option>
<option rel="Cat" value="Devon Rex">Devon Rex</option>
<option rel="Cat" value="Egyptian Mau">Egyptian Mau</option>
<option rel="Cat" value="Exotic Shorthair">Exotic Shorthair</option>
<option rel="Cat" value="Havana">Havana</option>
<option rel="Cat" value="Himalayan">Himalayan</option>
<option rel="Cat" value="Japanese Bobtail">Japanese Bobtail</option>
<option rel="Cat" value="Javanese">Javanese</option>
<option rel="Cat" value="Korat">Korat</option>
<option rel="Cat" value="LaPerm">LaPerm</option>
<option rel="Cat" value="Maine Coon">Maine Coon</option>
<option rel="Cat" value="Manx">Manx</option>
<option rel="Cat" value="Munchkin">Munchkin</option>
<option rel="Cat" value="Nebelung">Nebelung</option>
<option rel="Cat" value="Norwegian Forest Cat">Norwegian Forest Cat</option>
<option rel="Cat" value="Ocicat">Ocicat</option>
<option rel="Cat" value="Oriental Short Hair">Oriental Short Hair</option>
<option rel="Cat" value="Persian">Persian</option>
<option rel="Cat" value="Pixiebob">Pixiebob</option>
<option rel="Cat" value="Ragamuffin">Ragamuffin</option>
<option rel="Cat" value="Ragdoll">Ragdoll</option>
<option rel="Cat" value="Russian Blue">Russian Blue</option>
<option rel="Cat" value="Scottish Fold">Scottish Fold</option>
<option rel="Cat" value="Selkirk Rex">Selkirk Rex</option>
<option rel="Cat" value="Siamese">Siamese</option>
<option rel="Cat" value="Siberian">Siberian</option>
<option rel="Cat" value="Singapura">Singapura</option>
<option rel="Cat" value="Snowshoe">Snowshoe</option>
<option rel="Cat" value="Somali">Somali</option>
<option rel="Cat" value="Sphynx / Hairless Cat">Sphynx / Hairless Cat</option>
<option rel="Cat" value="Tonkinese">Tonkinese</option>
<option rel="Cat" value="Turkish Angora">Turkish Angora</option>
<option rel="Cat" value="Turkish Van">Turkish Van</option>
<option rel="Cat" value="York Chocolate">York Chocolate</option>
<option rel="Dog" value="Affenpinscher">Affenpinscher</option>
<option rel="Dog" value="Afghan Hound">Afghan Hound</option>
<option rel="Dog" value="Airedale Terrier">Airedale Terrier</option>
<option rel="Dog" value="Akita">Akita</option>
<option rel="Dog" value="Alaskan Klee Kai">Alaskan Klee Kai</option>
<option rel="Dog" value="Alaskan Malamute">Alaskan Malamute</option>
<option rel="Dog" value="American Bulldog">American Bulldog</option>
<option rel="Dog" value="American Cocker Spaniel">American Cocker Spaniel</option>
<option rel="Dog" value="American Eskimo Dog">American Eskimo Dog</option>
<option rel="Dog" value="American Foxhound">American Foxhound</option>
<option rel="Dog" value="American Hairless Terrier">American Hairless Terrier</option>
<option rel="Dog" value="American Staffordshire Terrier">American Staffordshire Terrier</option>
<option rel="Dog" value="American Water Spaniel">American Water Spaniel</option>
<option rel="Dog" value="Anatolian Shepherd">Anatolian Shepherd</option>
<option rel="Dog" value="Australian Cattle Dog">Australian Cattle Dog</option>
<option rel="Dog" value="Australian Shepherd">Australian Shepherd</option>
<option rel="Dog" value="Australian Terrier">Australian Terrier</option>
<option rel="Dog" value="Basenji">Basenji</option>
<option rel="Dog" value="Basset Hound">Basset Hound</option>
<option rel="Dog" value="Beagle">Beagle</option>
<option rel="Dog" value="Bearded Collie">Bearded Collie</option>
<option rel="Dog" value="Beauceron">Beauceron</option>
<option rel="Dog" value="Bedlington Terrier">Bedlington Terrier</option>
<option rel="Dog" value="Belgian Shepherd / Malinois">Belgian Shepherd / Malinois</option>
<option rel="Dog" value="Belgian Shepherd / Sheepdog">Belgian Shepherd / Sheepdog</option>
<option rel="Dog" value="Belgian Shepherd / Tervuren">Belgian Shepherd / Tervuren</option>
<option rel="Dog" value="Belgian Shepherd Dog">Belgian Shepherd Dog</option>
<option rel="Dog" value="Bernese Mountain Dog">Bernese Mountain Dog</option>
<option rel="Dog" value="Bichon Frise">Bichon Frise</option>
<option rel="Dog" value="Black and Tan Coonhound">Black and Tan Coonhound</option>
<option rel="Dog" value="Black Russian Terrier">Black Russian Terrier</option>
<option rel="Dog" value="Bloodhound">Bloodhound</option>
<option rel="Dog" value="Bluetick Coonhound">Bluetick Coonhound</option>
<option rel="Dog" value="Boerboel">Boerboel</option>
<option rel="Dog" value="Border Collie">Border Collie</option>
<option rel="Dog" value="Border Terrier">Border Terrier</option>
<option rel="Dog" value="Borzoi">Borzoi</option>
<option rel="Dog" value="Boston Terrier">Boston Terrier</option>
<option rel="Dog" value="Bouvier des Flandres">Bouvier des Flandres</option>
<option rel="Dog" value="Boxer">Boxer</option>
<option rel="Dog" value="Boykin Spaniel">Boykin Spaniel</option>
<option rel="Dog" value="Briard">Briard</option>
<option rel="Dog" value="Brittany Spaniel">Brittany Spaniel</option>
<option rel="Dog" value="Brussels Griffon">Brussels Griffon</option>
<option rel="Dog" value="Bull Terrier">Bull Terrier</option>
<option rel="Dog" value="Bullmastiff">Bullmastiff</option>
<option rel="Dog" value="Cairn Terrier">Cairn Terrier</option>
<option rel="Dog" value="Canaan Dog">Canaan Dog</option>
<option rel="Dog" value="Cane Corso">Cane Corso</option>
<option rel="Dog" value="Cardigan Welsh Corgi">Cardigan Welsh Corgi</option>
<option rel="Dog" value="Carolina Dog">Carolina Dog</option>
<option rel="Dog" value="Cavalier King Charles Spaniel">Cavalier King Charles Spaniel</option>
<option rel="Dog" value="Chesapeake Bay Retriever">Chesapeake Bay Retriever</option>
<option rel="Dog" value="Chihuahua">Chihuahua</option>
<option rel="Dog" value="Chiinese Crested Dog">Chiinese Crested Dog</option>
<option rel="Dog" value="Chinook">Chinook</option>
<option rel="Dog" value="Chow Chow">Chow Chow</option>
<option rel="Dog" value="Cirneco dell'Etna">Cirneco dell'Etna</option>
<option rel="Dog" value="Clumber Spaniel">Clumber Spaniel</option>
<option rel="Dog" value="Collie">Collie</option>
<option rel="Dog" value="Coton de Tulear">Coton de Tulear</option>
<option rel="Dog" value="Curly-Coated Retriever">Curly-Coated Retriever</option>
<option rel="Dog" value="Dachshund">Dachshund</option>
<option rel="Dog" value="Dalmatian">Dalmatian</option>
<option rel="Dog" value="Dandie Dinmont Terrier">Dandie Dinmont Terrier</option>
<option rel="Dog" value="Doberman Pinscher">Doberman Pinscher</option>
<option rel="Dog" value="Dogo Argentino">Dogo Argentino</option>
<option rel="Dog" value="Dogue de Bordeaux">Dogue de Bordeaux</option>
<option rel="Dog" value="Dutch Shepherd">Dutch Shepherd</option>
<option rel="Dog" value="English Bulldog">English Bulldog</option>
<option rel="Dog" value="English Cocker Spaniel">English Cocker Spaniel</option>
<option rel="Dog" value="English Coonhound">English Coonhound</option>
<option rel="Dog" value="English Foxhound">English Foxhound</option>
<option rel="Dog" value="English Pointer">English Pointer</option>
<option rel="Dog" value="English Setter">English Setter</option>
<option rel="Dog" value="English Shepherd">English Shepherd</option>
<option rel="Dog" value="English Springer Spaniel">English Springer Spaniel</option>
<option rel="Dog" value="English Toy Spaniel">English Toy Spaniel</option>
<option rel="Dog" value="Entlebucher Mountain Dog">Entlebucher Mountain Dog</option>
<option rel="Dog" value="Field Spaniel">Field Spaniel</option>
<option rel="Dog" value="Finnish Lapphund">Finnish Lapphund</option>
<option rel="Dog" value="Finnish Spitz">Finnish Spitz</option>
<option rel="Dog" value="Flat-Coated Retriever">Flat-Coated Retriever</option>
<option rel="Dog" value="French Bulldog">French Bulldog</option>
<option rel="Dog" value="German Pinscher">German Pinscher</option>
<option rel="Dog" value="German Shepherd Dog">German Shepherd Dog</option>
<option rel="Dog" value="German Shorthaired Pointer">German Shorthaired Pointer</option>
<option rel="Dog" value="Germain Wirehaired Pointer">Germain Wirehaired Pointer</option>
<option rel="Dog" value="Giant Schnauzer">Giant Schnauzer</option>
<option rel="Dog" value="Glen of Imaal Terrier">Glen of Imaal Terrier</option>
<option rel="Dog" value="Golden Retriever">Golden Retriever</option>
<option rel="Dog" value="Gordon Setter">Gordon Setter</option>
<option rel="Dog" value="Great Dane">Great Dane</option>
<option rel="Dog" value="Great Pyrenees">Great Pyrenees</option>
<option rel="Dog" value="Greater Swiss Mountain Dog">Greater Swiss Mountain Dog</option>
<option rel="Dog" value="Greyhound">Greyhound</option>
<option rel="Dog" value="Harrier">Harrier</option>
<option rel="Dog" value="Havanese">Havanese</option>
<option rel="Dog" value="Ibizan Hound">Ibizan Hound</option>
<option rel="Dog" value="Icelandic Sheepdog">Icelandic Sheepdog</option>
<option rel="Dog" value="Irish Setter">Irish Setter</option>
<option rel="Dog" value="Irish Terrier">Irish Terrier</option>
<option rel="Dog" value="Irish Water Spaniel">Irish Water Spaniel</option>
<option rel="Dog" value="Irish Wolfhound">Irish Wolfhound</option>
<option rel="Dog" value="Italian Greyhound">Italian Greyhound</option>
<option rel="Dog" value="Japanese Chin">Japanese Chin</option>
<option rel="Dog" value="Jindo">Jindo</option>
<option rel="Dog" value="Keeshond">Keeshond</option>
<option rel="Dog" value="Kerry Blue Terrier">Kerry Blue Terrier</option>
<option rel="Dog" value="Komondor">Komondor</option>
<option rel="Dog" value="Kuvasz">Kuvasz</option>
<option rel="Dog" value="Labrador Retriever">Labrador Retriever</option>
<option rel="Dog" value="Lakeland Terrier">Lakeland Terrier</option>
<option rel="Dog" value="Leon Berger">Leon Berger</option>
<option rel="Dog" value="Lhasa Apso">Lhasa Apso</option>
<option rel="Dog" value="Louisiana Catahoula Leopard Dog">Louisiana Catahoula Leopard Dog</option>
<option rel="Dog" value="Lowchen">Lowchen</option>
<option rel="Dog" value="Maltese">Maltese</option>
<option rel="Dog" value="Manchester Terrier">Manchester Terrier</option>
<option rel="Dog" value="Mastiff">Mastiff</option>
<option rel="Dog" value="Miniature Bull Terrier">Miniature Bull Terrier</option>
<option rel="Dog" value="Miniature Dachshund">Miniature Dachshund</option>
<option rel="Dog" value="Miniature Pinscher">Miniature Pinscher</option>
<option rel="Dog" value="Miniature Poodle">Miniature Poodle</option>
<option rel="Dog" value="Miniature Schnauzer">Miniature Schnauzer</option>
<option rel="Dog" value="Neapolitan Mastiff">Neapolitan Mastiff</option>
<option rel="Dog" value="Newfoundland Dog">Newfoundland Dog</option>
<option rel="Dog" value="Norfolk Terrier">Norfolk Terrier</option>
<option rel="Dog" value="Norwegian Buhund">Norwegian Buhund</option>
<option rel="Dog" value="Norwegian Elkhound">Norwegian Elkhound</option>
<option rel="Dog" value="Norwegian Lundehund">Norwegian Lundehund</option>
<option rel="Dog" value="Norwich Terrier">Norwich Terrier</option>
<option rel="Dog" value="Nova Scotia Duck Tolling Retriever">Nova Scotia Duck Tolling Retriever</option>
<option rel="Dog" value="Old English Sheepdog">Old English Sheepdog</option>
<option rel="Dog" value="Otterhound">Otterhound</option>
<option rel="Dog" value="Papillon">Papillon</option>
<option rel="Dog" value="Parson Russell Terrier">Parson Russell Terrier</option>
<option rel="Dog" value="Pekingese">Pekingese</option>
<option rel="Dog" value="Pembroke Welsh Corgi">Pembroke Welsh Corgi</option>
<option rel="Dog" value="Perro de Presa Canario">Perro de Presa Canario</option>
<option rel="Dog" value="Petit Bassett Griffon Vendeen">Petit Bassett Griffon Vendeen</option>
<option rel="Dog" value="Pharoah Hound">Pharoah Hound</option>
<option rel="Dog" value="Plott Hound">Plott Hound</option>
<option rel="Dog" value="Polish Lowland Sheepdog">Polish Lowland Sheepdog</option>
<option rel="Dog" value="Pomeranian">Pomeranian</option>
<option rel="Dog" value="Poodle">Poodle</option>
<option rel="Dog" value="Portuguese Podengo">Portuguese Podengo</option>
<option rel="Dog" value="Portuguese Water Dog">Portuguese Water Dog</option>
<option rel="Dog" value="Pug">Pug</option>
<option rel="Dog" value="Puli">Puli</option>
<option rel="Dog" value="Pyrenean Shepherd">Pyrenean Shepherd</option>
<option rel="Dog" value="Rat Terrier">Rat Terrier</option>
<option rel="Dog" value="Redbone Coonhound">Redbone Coonhound</option>
<option rel="Dog" value="Rhodesian Ridgeback">Rhodesian Ridgeback</option>
<option rel="Dog" value="Rottweiler">Rottweiler</option>
<option rel="Dog" value="Saint Bernard">Saint Bernard</option>
<option rel="Dog" value="Saluki">Saluki</option>
<option rel="Dog" value="Samoyed">Samoyed</option>
<option rel="Dog" value="Schipperke">Schipperke</option>
<option rel="Dog" value="Schnauzer">Schnauzer</option>
<option rel="Dog" value="Scottish Deerhound">Scottish Deerhound</option>
<option rel="Dog" value="Scottish Terrier">Scottish Terrier</option>
<option rel="Dog" value="Sealyham Terrier">Sealyham Terrier</option>
<option rel="Dog" value="Shar-Pei">Shar-Pei</option>
<option rel="Dog" value="Shetland Sheepdog / Sheltie">Shetland Sheepdog / Sheltie</option>
<option rel="Dog" value="Shiba Inu">Shiba Inu</option>
<option rel="Dog" value="Shih Tzu">Shih Tzu</option>
<option rel="Dog" value="Siberian Husky">Siberian Husky</option>
<option rel="Dog" value="Silky Terrier">Silky Terrier</option>
<option rel="Dog" value="Skye Terrier">Skye Terrier</option>
<option rel="Dog" value="Sloughi">Sloughi</option>
<option rel="Dog" value="Smooth Fox Terrier">Smooth Fox Terrier</option>
<option rel="Dog" value="Spanish Water Dog">Spanish Water Dog</option>
<option rel="Dog" value="Spinone Italiano">Spinone Italiano</option>
<option rel="Dog" value="Staffordshire Bull Terrier">Staffordshire Bull Terrier</option>
<option rel="Dog" value="Sussex Spaniel">Sussex Spaniel</option>
<option rel="Dog" value="Swedish Vallhund">Swedish Vallhund</option>
<option rel="Dog" value="Tibetan Mastiff">Tibetan Mastiff</option>
<option rel="Dog" value="Tibetan Spaniel">Tibetan Spaniel</option>
<option rel="Dog" value="Tibetan Terrier">Tibetan Terrier</option>
<option rel="Dog" value="Toy Fox Terrier">Toy Fox Terrier</option>
<option rel="Dog" value="Toy Manchester Terrier">Toy Manchester Terrier</option>
<option rel="Dog" value="Treeing Walker Coonhound">Treeing Walker Coonhound</option>
<option rel="Dog" value="Vizsla">Vizsla</option>
<option rel="Dog" value="Weimaraner">Weimaraner</option>
<option rel="Dog" value="Welsh Springer Spaniel">Welsh Springer Spaniel</option>
<option rel="Dog" value="Welsh Terrier">Welsh Terrier</option>
<option rel="Dog" value="West Highland White Terrier / Westie">West Highland White Terrier / Westie</option>
<option rel="Dog" value="Weaten Terrier">Weaten Terrier</option>
<option rel="Dog" value="Whippet">Whippet</option>
<option rel="Dog" value="Wire Fox Terrier">Wire Fox Terrier</option>
<option rel="Dog" value="Wirehaired Pointing Griffon">Wirehaired Pointing Griffon</option>
<option rel="Dog" value="Xoloitzcuintli / Mexican Hairless">Xoloitzcuintli / Mexican Hairless</option>
<option rel="Dog" value="Yorkshire Terrier">Yorkshire Terrier</option>
</select>

<script>
$(function(){

var $pet_type = $("#pet_type"),
$pet_breed = $("#pet_breed");

$pet_type.on("change",function(){
var _rel = $(this).val();
$pet_breed.find("option").attr("style","");
$pet_breed.val("");
if(!_rel) return $pet_breed.prop("disabled",true);
$pet_breed.find("[rel="+_rel+"]").show();
$pet_breed.prop("disabled",false);
});

});
</script>
</div>
</div>
<div class="form-group">
<label for="email" class="col-sm-3 control-label">PET GENDER</label>

<div class="col-sm-8">
<select id="pet_gender" name="pet_gender" class="form-control" required>
<option value="" disabled selected required>---Select---</option>
<option value="Female">Female</option>
<option value="Male">Male</option>
</select>
</div>
</div>

<div class="box-header with-border" style="margin-left:-20px;">
<h3 class="box-title" style="color:#36bbbe;"><b><i class="fa fa-calendar"></i> TRANSACTION DETAILS</b></h3>
</div>
<div class="box-body">	
<div class="form-group">
<label for="email" class="col-sm-3 control-label">SERVICE TYPE</label>

<div class="col-sm-8">
<select id="type" name="type" class="form-control" required onChange="java_script_:show(this.options[this.selectedIndex].value)">
<option value="" disabled selected required>---Select---</option>
<option value="Clinic">Veterinary Health Care</option>
<option value="Boarding">Boarding</option>
<option value="Grooming">Grooming</option>
</select>
</div>
</div>

<div class="form-group">
<label for="edit_name" class="col-sm-3 control-label">DATE</label>
<div class="col-sm-8">
<?php
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d');
?>
<input class="form-control" id="thedate" name="thedate" value="<?php echo "".date('M. d, Y', strtotime($date)).""; ?>" type="text" readonly/>
</div>
</div>

<?php
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d');
$theday=date('l',strtotime($date));
if($theday == 'Sunday')
{
echo '
<div id="time" class="form-group">
<input type="text" value="0" name="id_services" id="clinic2" style="display:none; background-color:white; border:0px; color:white" readonly>
<label for="edit_name" class="col-sm-3 control-label" id="clinic" style="display:none">TIME</label>
<div class="col-sm-8" id="clinic1" style="display:none">
<select class="form-control" id="time" name="time_reservation" style="margin-top:-20px;">
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Clinic'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Sunday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
$stmt = $conn->prepare("select * from reservation");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
if($date == $date2 && $time1 == $time || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}	
elseif($theday == 'Monday')
{
echo '
<div id="time" class="form-group">
<input type="text" value="0" name="id_services" id="clinic2" style="display:none; background-color:white; border:0px; color:white" readonly>
<label for="edit_name" class="col-sm-3 control-label" id="clinic" style="display:none">TIME</label>
<div class="col-sm-8" id="clinic1" style="display:none">
<select class="form-control" id="time" name="time_reservation" style="margin-top:-20px;">
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Clinic'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Monday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
$stmt = $conn->prepare("select * from reservation");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
if($date == $date2 && $time1 == $time || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
elseif($theday == 'Tuesday')
{
echo '
<div id="time" class="form-group">
<input type="text" value="0" name="id_services" id="clinic2" style="display:none; background-color:white; border:0px; color:white" readonly>
<label for="edit_name" class="col-sm-3 control-label" id="clinic" style="display:none">TIME</label>
<div class="col-sm-8" id="clinic1" style="display:none">
<select class="form-control" id="time" name="time_reservation" style="margin-top:-20px;">
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Clinic'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Tuesday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
$stmt = $conn->prepare("select * from reservation");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
if($date == $date2 && $time1 == $time || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
elseif($theday == 'Wednesday')
{
echo '
<div id="time" class="form-group">
<input type="text" value="0" name="id_services" id="clinic2" style="display:none; background-color:white; border:0px; color:white" readonly>
<label for="edit_name" class="col-sm-3 control-label" id="clinic" style="display:none">TIME</label>
<div class="col-sm-8" id="clinic1" style="display:none">
<select class="form-control" id="time" name="time_reservation" style="margin-top:-20px;">
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Clinic'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Wednesday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
$stmt = $conn->prepare("select * from reservation");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
if($date == $date2 && $time1 == $time || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
elseif($theday == 'Thursday')
{
echo '
<div id="time" class="form-group">
<input type="text" value="0" name="id_services" id="clinic2" style="display:none; background-color:white; border:0px; color:white" readonly>
<label for="edit_name" class="col-sm-3 control-label" id="clinic" style="display:none">TIME</label>
<div class="col-sm-8" id="clinic1" style="display:none">
<select class="form-control" id="time" name="time_reservation" style="margin-top:-20px;">
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Clinic'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Thursday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
$stmt = $conn->prepare("select * from reservation");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
if($date == $date2 && $time1 == $time || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
elseif($theday == 'Friday')
{
echo '
<div id="time" class="form-group">
<input type="text" value="0" name="id_services" id="clinic2" style="display:none; background-color:white; border:0px; color:white" readonly>
<label for="edit_name" class="col-sm-3 control-label" id="clinic" style="display:none">TIME</label>
<div class="col-sm-8" id="clinic1" style="display:none">
<select class="form-control" id="time" name="time_reservation" style="margin-top:-20px;">
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Clinic'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Friday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
$stmt = $conn->prepare("select * from reservation");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
if($date == $date2 && $time1 == $time || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
elseif($theday == 'Saturday')
{
echo '
<div id="time" class="form-group">
<input type="text" value="0" name="id_services" id="clinic2" style="display:none; background-color:white; border:0px; color:white" readonly>
<label for="edit_name" class="col-sm-3 control-label" id="clinic" style="display:none">TIME</label>
<div class="col-sm-8" id="clinic1" style="display:none">
<select class="form-control" id="time" name="time_reservation" style="margin-top:-20px;">
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Clinic'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Saturday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
$stmt = $conn->prepare("select * from reservation");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
if($date == $date2 && $time1 == $time || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
?>

<div class="form-group">
<label for="edit_name" class="col-sm-3 control-label" id="grooming2" style="display:none; margin-top:-15px;">GROOMING SERVICES</label>
<div class="col-sm-8" id="grooming1" style="display:none; margin-top:-13px;">
<select class="form-control" name="id_services" onChange="onSelect2(this.value)">
<option value="" disabled selected required>---Select---</option>
<?php 
$conn = $pdo->open();
try{
$stmt = $conn->prepare("select * from category where category = 'Grooming'");
$stmt->execute();
foreach($stmt as $row1){
$id_category = $row1['id_category'];
$stmt = $conn->prepare("SELECT * FROM services WHERE id_category = '$id_category' and deleted_date = '0000-00-00'");
$stmt->execute();
foreach($stmt as $row){
$id_services = $row['id_services'];
$name = $row['name'];
echo "
<option value='$id_services'>".$name."</option>
";
}
}
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}
$pdo->close();
?>
</select>
</div>
</div>
<div id="g_time">
</div>
<script>
 function onSelect2(str){
 	var a = new XMLHttpRequest
	a.onreadystatechange=function(){
		document.getElementById("g_time").innerHTML=this.responseText;
	}
	a.open('GET', "g_time.php?id_services="+str,true);
	a.send();
 }
</script>

<script>
function show(aval) {
if (aval == "Clinic") {
clinic.style.display='inline-block';
clinic1.style.display='inline-block';
clinic2.style.display='inline-block';
grooming1.style.display='none';
grooming2.style.display='none';
Form.fileURL.focus();
} 
else if (aval == "Boarding") {
clinic.style.display='none';
clinic1.style.display='none';
clinic2.style.display='none';
grooming1.style.display='none';
grooming2.style.display='none';
Form.fileURL.focus();
} 
else if (aval == "Grooming") {
clinic.style.display='none';
clinic1.style.display='none';
clinic2.style.display='none';
grooming1.style.display='inline-block';
grooming2.style.display='inline-block';
Form.fileURL.focus();
} 
}
</script>

</div>
</div>
<button type="submit" class="btn btn-success btn-flat" name="add" style="width:100%"><i class="fa fa-send"></i> Submit</button>
</form>
</div>
</div>
</div>


<div id="tab_services1" class="tabcontent">
<div class="box">
<div class="box-header with-border">
<h3 class="box-title" style="color:#36bbbe"><b><i class="fa fa-user"></i> CUSTOMER'S INFO</b></h3>
</div>
<form id="form1" action="walk-in_add1.php" class="form-horizontal" method="post">
<div class="box-body">
<div class="form-group">
<label for="edit_name" class="col-sm-3 control-label">CUSTOMER NAME</label>
<div class="col-sm-8">
<select class="form-control" onChange="onSelect1(this.value)" required>
<option value="" disabled selected required>---Select---</option>
<?php 
$conn = $pdo->open();
try{
$stmt = $conn->prepare("SELECT * FROM reservation WHERE r_type='Walkin' group by user_pets_id");
$stmt->execute();
foreach($stmt as $row){
$upi = $row['user_pets_id'];
$stmt = $conn->prepare("SELECT * FROM user_pets WHERE user_pets_id='$upi'");
$stmt->execute();
foreach($stmt as $crow){
$ic = $crow['id_cust'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id_cust='$ic'");
$stmt->execute();
foreach($stmt as $crows){
$fullname = $crows['firstname'] ." ". $crows['lastname'];
echo "
<option value='$upi'>".$fullname."</option>
";
}
}
}
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}
$pdo->close();
?>
</select>
</div>
</div>
<div id="details">
</div>
<script>
 function onSelect1(str){
 	var a = new XMLHttpRequest
	a.onreadystatechange=function(){
		document.getElementById("details").innerHTML=this.responseText;
	}
	a.open('GET', "details.php?upi="+str,true);
	a.send();
 }
</script>	
</div>


<script>
 function onSelect(str){
 	var a = new XMLHttpRequest
	a.onreadystatechange=function(){
		document.getElementById("details1").innerHTML=this.responseText;
	}
	a.open('GET', "details1.php?upi1="+str,true);
	a.send();
 }
</script>

<div class='box-header with-border'>
<h3 class='box-title' style='color:#36bbbe'><b><i class='fa fa-calendar'></i> TRANSACTION DETAILS</b></h3>
</div>
<div class="box-body">
<div class="form-group">
<label for="email" class="col-sm-3 control-label">SERVICE TYPE</label>

<div class="col-sm-8">
<select id="type" name="type" class="form-control" required onChange="java_script_:show1(this.options[this.selectedIndex].value)">
<option value="" disabled selected required>---Select---</option>
<option value="Clinic1">Veterinary Health Care</option>
<option value="Boarding1">Boarding</option>
<option value="Grooming1">Grooming</option>
</select>
</div>
</div>
<div class="form-group">
<label for="edit_name" class="col-sm-3 control-label">DATE</label>
<div class="col-sm-8">
<?php
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d');
?>
<input class="form-control" id="thedate" name="thedate" value="<?php echo "".date('M. d, Y', strtotime($date)).""; ?>" type="text" readonly/>
</div>
</div>

<?php
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d');
$theday=date('l',strtotime($date));
if($theday == 'Sunday')
{
echo '
<div id="time" class="form-group">
<input type="text" value="0" name="id_services" id="clinicc" style="display:none; background-color:white; border:0px; color:white" readonly>
<label for="edit_name" class="col-sm-3 control-label" id="clinica" style="display:none">Time</label>
<div class="col-sm-8" id="clinicb" style="display:none">
<select class="form-control" id="time" name="time_reservation" style="margin-top:-20px;">
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Clinic'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Sunday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
$stmt = $conn->prepare("select * from reservation");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
if($date == $date2 && $time1 == $time || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}	
elseif($theday == 'Monday')
{
echo '
<div id="time" class="form-group">
<input type="text" value="0" name="id_services" id="clinicc" style="display:none; background-color:white; border:0px; color:white" readonly>
<label for="edit_name" class="col-sm-3 control-label" id="clinica" style="display:none">Time</label>
<div class="col-sm-8" id="clinicb" style="display:none">
<select class="form-control" id="time" name="time_reservation" style="margin-top:-20px;">
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Clinic'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Monday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
$stmt = $conn->prepare("select * from reservation");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
if($date == $date2 && $time1 == $time || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
elseif($theday == 'Tuesday')
{
echo '
<div id="time" class="form-group">
<input type="text" value="0" name="id_services" id="clinicc" style="display:none; background-color:white; border:0px; color:white" readonly>
<label for="edit_name" class="col-sm-3 control-label" id="clinica" style="display:none">Time</label>
<div class="col-sm-8" id="clinicb" style="display:none">
<select class="form-control" id="time" name="time_reservation" style="margin-top:-20px;">
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Clinic'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Tuesday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
$stmt = $conn->prepare("select * from reservation");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
if($date == $date2 && $time1 == $time || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
elseif($theday == 'Wednesday')
{
echo '
<div id="time" class="form-group">
<input type="text" value="0" name="id_services" id="clinicc" style="display:none; background-color:white; border:0px; color:white" readonly>
<label for="edit_name" class="col-sm-3 control-label" id="clinica" style="display:none">Time</label>
<div class="col-sm-8" id="clinicb" style="display:none">
<select class="form-control" id="time" name="time_reservation" style="margin-top:-20px;">
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Clinic'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Wednesday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
$stmt = $conn->prepare("select * from reservation");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
if($date == $date2 && $time1 == $time || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
elseif($theday == 'Thursday')
{
echo '
<div id="time" class="form-group">
<input type="text" value="0" name="id_services" id="clinicc" style="display:none; background-color:white; border:0px; color:white" readonly>
<label for="edit_name" class="col-sm-3 control-label" id="clinica" style="display:none">Time</label>
<div class="col-sm-8" id="clinicb" style="display:none">
<select class="form-control" id="time" name="time_reservation" style="margin-top:-20px;">
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Clinic'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Thursday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
$stmt = $conn->prepare("select * from reservation");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
if($date == $date2 && $time1 == $time || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
elseif($theday == 'Friday')
{
echo '
<div id="time" class="form-group">
<input type="text" value="0" name="id_services" id="clinicc" style="display:none; background-color:white; border:0px; color:white" readonly>
<label for="edit_name" class="col-sm-3 control-label" id="clinica" style="display:none">Time</label>
<div class="col-sm-8" id="clinicb" style="display:none">
<select class="form-control" id="time" name="time_reservation" style="margin-top:-20px;">
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Clinic'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Friday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
$stmt = $conn->prepare("select * from reservation");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
if($date == $date2 && $time1 == $time || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
elseif($theday == 'Saturday')
{
echo '
<div id="time" class="form-group">
<input type="text" value="0" name="id_services" id="clinicc" style="display:none; background-color:white; border:0px; color:white" readonly>
<label for="edit_name" class="col-sm-3 control-label" id="clinica" style="display:none">Time</label>
<div class="col-sm-8" id="clinicb" style="display:none">
<select class="form-control" id="time" name="time_reservation" style="margin-top:-20px;">
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Clinic'");
$stmt->execute();
foreach($stmt as $r){
$id_type = $r['id_type'];
$stmt = $conn->prepare("select * from schedule where id_type = '$id_type' and day = 'Saturday'");
$stmt->execute();
foreach($stmt as $ro){
$schedule_id = $ro['schedule_id'];
$stmt = $conn->prepare("select * from time where schedule_id='$schedule_id'");
$stmt->execute();
foreach($stmt as $row){
$time_id = $row['time_id'];
$time = $row['time_reservation'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
$stmt = $conn->prepare("select * from reservation");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
if($date == $date2 && $time1 == $time || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
echo'<option value="'.$time.'" hidden>'.$time.'</option>';
}
else{
echo'<option value="'.$time.'">'.$time.'</option>';
}
}
}
}
echo'
</select>
</div>
</div>
';
}
?>

<div class="form-group">
<label for="edit_name" class="col-sm-3 control-label" id="groominga" style="display:none; margin-top:-15px;">GROOMING SERVICES</label>
<div class="col-sm-8" id="groomingb" style="display:none; margin-top:-13px;">
<select class="form-control" name="id_services" onChange="onSelect3(this.value)">
<option value="" disabled selected required>---Select---</option>
<?php 
$conn = $pdo->open();
try{
$stmt = $conn->prepare("select * from category where category = 'Grooming'");
$stmt->execute();
foreach($stmt as $row1){
$id_category = $row1['id_category'];
$stmt = $conn->prepare("SELECT * FROM services WHERE id_category = '$id_category' and deleted_date = '0000-00-00'");
$stmt->execute();
foreach($stmt as $row){
$id_services1 = $row['id_services'];
$name = $row['name'];
echo "
<option value='$id_services1'>".$name."</option>
";
}
}
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}
$pdo->close();
?>
</select>
</div>
</div>
<div id="g_time1">
</div>
<script>
 function onSelect3(str){
 	var a = new XMLHttpRequest
	a.onreadystatechange=function(){
		document.getElementById("g_time1").innerHTML=this.responseText;
	}
	a.open('GET', "g_time1.php?id_services1="+str,true);
	a.send();
 }
</script>


<script>
function show1(aval) {
if (aval == "Clinic1") {
clinica.style.display='inline-block';
clinicb.style.display='inline-block';
clinicc.style.display='inline-block';
groominga.style.display='none';
groomingb.style.display='none';
Form.fileURL.focus();
} 
else if (aval == "Boarding1") {
clinica.style.display='none';
clinicb.style.display='none';
clinicc.style.display='none';
groominga.style.display='none';
groomingb.style.display='none';
Form.fileURL.focus();
} 
else if (aval == "Grooming1") {
clinica.style.display='none';
clinicb.style.display='none';
clinicc.style.display='none';
groominga.style.display='inline-block';
groomingb.style.display='inline-block';
Form.fileURL.focus();
} 
}
</script>

<button type="submit" class="btn btn-success btn-flat" name="add" style="width:100%"><i class="fa fa-send"></i> Submit</button>
</div>
</form>
</div>
</div>
</div>

</div>

<!-- SCRIPT FOR TAB CONTAINER -->
<script type="text/javascript">
function openTab(evt, tab_id) {
var i, tabcontent, tablinks;
tabcontent = document.getElementsByClassName("tabcontent");
for (i = 0; i < tabcontent.length; i++) {
tabcontent[i].style.display = "none";
}
tablinks = document.getElementsByClassName("tablinks");
for (i = 0; i < tablinks.length; i++) {
tablinks[i].className = tablinks[i].className.replace(" active", "");
}
document.getElementById(tab_id).style.display = "block";
evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/orders_modal.php'; ?>
</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>
$(window).on('load',function(){
$('#mdl_addorder').modal('show');
});
$(function(){
$(document).on('click', '.edit', function(e){
e.preventDefault();
$('#edit').modal('show');
var id_emp = $(this).data('id');
getRow(id_emp);
});

$(document).on('click', '.photo', function(e){
e.preventDefault();
var id_emp = $(this).data('id');
getRow(id_emp);
});

});

function getRow(id_emp){
$.ajax({
type: 'POST',
url: 'employees_row.php',
data: {id_emp:id_emp},
dataType: 'json',
success: function(response){
$('.id_emp').val(response.id_emp);
$('#edit_email').val(response.email);
$('#edit_firstname').val(response.firstname);
$('#edit_lastname').val(response.lastname);
$('#edit_home').val(response.home);
$('#edit_id_position').val(response.id_position);
$('#catselected').val(response.id_position).html(response.position);
$('#edit_contact').val(response.contact);
$('#edit_fullname').val(response.firstname+' '+response.lastname);
$('.fullname').html(response.firstname+' '+response.lastname);
getCategory();
}
});

}
</script>
</body>
</html>
