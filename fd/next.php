<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php';
$id_cust = $_GET['id_cust'];

try{
$stmt = $conn->prepare("SELECT * FROM users WHERE id_cust = :id_cust");
$stmt->execute(['id_cust' => $id_cust]);
$id_cust = $stmt->fetch();
$customer = $id_cust['id_cust'];
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include 'includes/navbar.php'; ?>
<?php include 'includes/menubar.php'; ?>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>  
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

<script>
function printContent(el)
{
var restorepage=document.body.innerHTML;
var printcontent=document.getElementById(el).innerHTML;
document.body.innerHTML=printcontent;
window.print();
document.body.innerHTML=restorepage;
window.location.href='orders.php';
}
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<div class="tab">
<button class="tablinks" onClick="openTab(event, 'tab_services')">PET DETAILS</button>
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

<div class="box">
<div class="box-body">
<div class='box-header'>
<h3 class='box-title' style='color:#36bbbe;'><b><i class='fa fa-paw'></i> PET DETAILS</b></h3>
</div> 
<div class="table-responsive" ng-app="liveApp" ng-controller="liveController" ng-init="fetchData()">
<form name="testform" ng-submit="insertData()">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>Pet Name</th>
<th>Pet Type</th>
<th>Pet Breed</th>
<th>Pet Gender</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<tr>
<input type="hidden" ng-model="addData.id_cust" id="id_cust" name="id_cust" value="<?= $customer ?>">
<td><input type="text" ng-model="addData.pet_name" class="form-control" placeholder="Enter Pet Name" ng-required="true" /></td>

<script src="https://code.jquery.com/jquery-1.11.0.min.js" integrity="sha256-spTpc4lvj4dOkKjrGokIrHkJgNA0xMS98Pw9N7ir9oI=" crossorigin="anonymous"></script>
<style>
#pet_breed option{
display:none;
}

#pet_breed option.label{
display:block;
}
</style>
<td><select ng-model="addData.pet_type" id="pet_type" class="form-control" ng-required="true">
<option value="" disabled selected required>---Select---</option>
<option value="Cat">Cat</option>
<option value="Dog">Dog</option>
</select></td>
<td><select ng-model="addData.pet_breed" id="pet_breed" class="form-control" ng-required="true">
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
</script></td>
<td><select ng-model="addData.pet_gender" class="form-control" ng-required="true">
<option value="" disabled selected required>---Select---</option>
<option value="Female">Female</option>
<option value="Male">Male</option>
</select></td>
<td><button type="submit" class="btn btn-success btn-sm" ng-disabled="testform.$invalid">Add</button></td>
</tr>
<tr ng-repeat="data in namesData" ng-include="getTemplate(data)">
</tr>

</tbody>
</table>
</form>
<?php echo "<a href='transaction.php?customer=".$customer."'>";?><button type="submit" class="btn btn-success btn-sm btn-flat" name="next" style="width: 100%;"><i class="fa fa-arrow-right"></i> Next</button>
<?php echo "</a>"; ?>
<script src="https://code.jquery.com/jquery-1.11.0.min.js" integrity="sha256-spTpc4lvj4dOkKjrGokIrHkJgNA0xMS98Pw9N7ir9oI=" crossorigin="anonymous"></script>
<style>
#pet_breed option{
display:none;
}

#pet_breed option.label{
display:block;
}
</style>
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
<script type="text/ng-template" id="display">

<td>{{data.pet_name}}</td>
<td>{{data.pet_type}}</td>
<td>{{data.pet_breed}}</td>
<td>{{data.pet_gender}}</td>
<td>

<button type="button" class="btn btn-primary btn-sm" ng-click="showEdit(data)">Edit</button>
<button type="button" class="btn btn-danger btn-sm" ng-click="deleteData(data.id_pet)">Delete</button>
</td>
</script>
<script type="text/ng-template" id="edit">
<td><input type="text" ng-model="formData.pet_name" class="form-control"  /></td>
<td>

<select ng-model="formData.pet_type" class="form-control">
<option value="" disabled selected required>---Select---</option>
<option value="Cat">Cat</option>
<option value="Dog">Dog</option>
</select></td>
<td><select ng-model="formData.pet_breed" class="form-control">
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
</td>
<td><select ng-model="formData.pet_gender" class="form-control">
<option value="" disabled selected required>---Select---</option>
<option value="Female">Female</option>
<option value="Male">Male</option>
</select></td>
<td>

<input type="hidden" ng-model="formData.data.reservation_id" />
<button type="button" class="btn btn-info btn-sm" ng-click="editData()">Save</button>
<button type="button" class="btn btn-default btn-sm" ng-click="reset()">Cancel</button>
</td>
</script>         
</div>  
</div>
</body>  
</html>  
<script>
var app = angular.module('liveApp', []);

app.controller('liveController', function($scope, $http){

$scope.formData = {};
$scope.addData = {};
$scope.success = false;
$scope.addData.id_cust = "<?php echo $customer ?>";

$scope.getTemplate = function(data){
if (data.id_cust === $scope.formData.id_cust)
{
return 'edit';
}
else
{
return 'display';
}
};

$scope.fetchData = function(){
var id_cust = $('#id_cust').val();
$http({
method:"GET",
url:"select.php?id_cust="+id_cust,
// data:{'id_cust':id_cust}
}).success(function(data){
$scope.success = true;
$scope.namesData = data;
});
};

$scope.insertData = function(){
$http({
method:"POST",
url:"insert1.php",
data:$scope.addData,
}).success(function(data){
$scope.success = true;
$scope.successMessage = data.message;
$scope.fetchData();
$scope.addData = {}
window.location.href='';
});
};

$scope.showEdit = function(data) {
$scope.formData = angular.copy(data);
};

$scope.editData = function(){
$http({
method:"POST",
url:"edit.php",
data:$scope.formData,
}).success(function(data){
$scope.success = true;
$scope.successMessage = data.message;
$scope.fetchData();
$scope.formData = {};
});
};

$scope.reset = function(){
$scope.formData = {};
};

$scope.closeMsg = function(){
$scope.success = false;
};

$scope.deleteData = function(id_pet){
if(confirm("Are you sure you want to remove it?"))
{
$http({
method:"POST",
url:"delete.php",
data:{'id_pet':id_pet}
}).success(function(data){
$scope.success = true;
$scope.successMessage = data.message;
$scope.fetchData();
}); 
}
};

});

</script>
</div> 
</div>
</div>
<!-- ORDERS -->

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
