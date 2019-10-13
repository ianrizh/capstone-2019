<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php';?>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<!-- STYLING FOR TAB CONTAINER -->
<?php
$id_cust = $_GET['id_cust'];
$conn = $pdo->open();
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
<input type="text" ng-model="addData.id_cust" id="id_cust" name="id_cust">
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
<script>
var app = angular.module('liveApp', []);

app.controller('liveController', function($scope, $http){

$scope.formData = {};
$scope.addData = {};
$scope.success = false;
$scope.addData.id_cust = "<?php echo $customer; ?>";

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
method:"POST",
url:"select.php",
data:{'id_cust':id_cust}
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

<div class="table-responsive" ng-app="liveApp1" ng-controller="liveController1" ng-init="fetchDatas()">
<form name="testform1" ng-submit="insertDatas()">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>Pet Name</th>
<th>Service Type</th>
<th>Service Id</th>
<th>Time</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<tr>
<td><select ng-model="addDatas.pet_name" class="form-control" ng-required="true">
<option value="" disabled selected required>---Select---</option>
<?php 
$conn = $pdo->open();
try{
$stmt = $conn->prepare("SELECT * FROM pets");
$stmt->execute();
foreach($stmt as $crows){
$id_pet = $crows['id_pet'];
$pet_name = $crows['pet_name'];
echo "
<option value='$pet_name'>".$pet_name."</option>
";
}
}
catch(PDOException $e){
echo "There is some problem in connection: " . $e->getMessage();
}
$pdo->close();
?>
</select></td>
<td><select ng-model="addDatas.service_type" class="form-control" ng-required="true" onChange="java_script_:show1(this.options[this.selectedIndex].value)">
<option value="" disabled selected required>---Select---</option>
<option value="Clinic">Veterinary Health Care</option>
<option value="Boarding">Boarding</option>
<option value="Grooming">Grooming</option>
</select></td>
<td>
<input type="text" ng-model="addDatas.id_services" id="clinic3" ng-required="true" style="display: none">
<div id="time" class="form-group">
<div class="col-sm-8" id="grooming2" style="display:none; width:100%;">
<select class="form-control" ng-model="addData.id_services" ng-required="true">
<option value="" ng-model="addDatas.id_services" disabled selected required>---Select---</option>
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
<div id="time" class="form-group">
<div class="col-sm-8" id="boarding1" style="display:none; width:100%; margin-top: -15px;">
<select class="form-control" ng-model="addDatas.id_services" ng-required="true">
<option value="" ng-model="addDatas.id_services" disabled selected required>---Select---</option>
<?php 
$conn = $pdo->open();
try{
$stmt = $conn->prepare("select * from category where category = 'Boarding'");
$stmt->execute();
foreach($stmt as $row1){
$id_category = $row1['id_category'];
$stmt = $conn->prepare("SELECT * FROM services WHERE id_category = '$id_category' and deleted_date = '0000-00-00'");
$stmt->execute();
foreach($stmt as $row){
$id_services2 = $row['id_services'];
$names = $row['name'];
echo "
<option value='$id_services2'>".$names."</option>
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
</td>
<td>
<?php
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d');
$theday=date('l',strtotime($date));
if($theday == 'Sunday')
{
echo '
<div id="time" class="form-group">
<div class="col-sm-9" style="width:100%">
<select ng-model="addDatas.time_reservation" class="form-control" id="boarding2" style="display:none; width:100%" required>
<option value="" disabled selected required>---Select---</option>
<option value="12:00 p.m">12:00 p.m</option>
<option value="01:00 p.m">01:00 p.m</option>
<option value="02:00 p.m">02:00 p.m</option>
<option value="03:00 p.m">03:00 p.m</option>
<option value="04:00 p.m">04:00 p.m</option>
<option value="05:00 p.m">05:00 p.m</option>
</select>
</div>
</div>
';

}	
else
{
echo '
<div id="time" class="form-group">
<div class="col-sm-9" style="width:100%">
<select ng-model="addDatas.time_reservation" class="form-control" id="boarding2" style="display:none; width:100%" required>
<option value="" disabled selected required>---Select---</option>
<option value="09:00 a.m">09:00 a.m</option>
<option value="10:00 a.m">10:00 a.m</option>
<option value="11:00 a.m">11:00 a.m</option>
<option value="12:00 p.m">12:00 p.m</option>
<option value="01:00 p.m">01:00 p.m</option>
<option value="02:00 p.m">02:00 p.m</option>
<option value="03:00 p.m">03:00 p.m</option>
<option value="04:00 p.m">04:00 p.m</option>
<option value="05:00 p.m">05:00 p.m</option>
<option value="06:00 p.m">06:00 p.m</option>
<option value="07:00 p.m">07:00 p.m</option>
</select>
</div>
</div>
';
}
?>

<?php
$stmt = $conn->prepare("SELECT * FROM services");
$stmt->execute();
foreach($stmt as $crow){
$price = $crow['price'];
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d');
$theday=date('l',strtotime($date));
}
if($theday == 'Sunday')
{
echo '
<div id="time" class="form-group">
<input type="hidden" name="s_price" value="'.$price.'">
<div class="col-sm-8" style="width:100%;">
<select ng-model="addDatas.time_reservation" class="form-control" id="gtime1" style="display:none; margin-top-15px;" required>
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Services'");
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
$stmt = $conn->prepare("select *, Count(*)as numrows from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $sss);
$numrows=$sss['numrows'];
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
 $time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
if($date == $date2 && $time1 == $time && $numrows>=2 || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
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
<input type="hidden" name="s_price" value="'.$price.'">
<div class="col-sm-8" style="width:100%;">
<select ng-model="addDatas.time_reservation" class="form-control" id="gtime1" style="display:none; margin-top-15px;" required>
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Services'");
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
$stmt = $conn->prepare("select *, Count(*)as numrows from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $sss);
$numrows=$sss['numrows'];
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
 $time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
if($date == $date2 && $time1 == $time && $numrows>=2 || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
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
<input type="hidden" name="s_price" value="'.$price.'">
<div class="col-sm-8" style="width:100%;">
<select ng-model="addDatas.time_reservation" class="form-control" id="gtime1" style="display:none; margin-top-15px;" required>
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Services'");
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
$stmt = $conn->prepare("select *, Count(*)as numrows from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $sss);
$numrows=$sss['numrows'];
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
 $time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
if($date == $date2 && $time1 == $time && $numrows>=2 || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
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
<input type="hidden" name="s_price" value="'.$price.'">
<div class="col-sm-8" style="width:100%;">
<select ng-model="addDatas.time_reservation" class="form-control" id="gtime1" style="display:none; margin-top-15px;" required>
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Services'");
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
$stmt = $conn->prepare("select *, Count(*)as numrows from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $sss);
$numrows=$sss['numrows'];
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
 $time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
if($date == $date2 && $time1 == $time && $numrows>=2 || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
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
<input type="hidden" name="s_price" value="'.$price.'">
<div class="col-sm-8" style="width:100%; margin-top:-15px;">
<select ng-model="addDatas.time_reservation" class="form-control" id="gtime1" style="display:none; " required>
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Services'");
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
$stmt = $conn->prepare("select *, Count(*)as numrows from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $sss);
$numrows=$sss['numrows'];
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
 $time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
if($date == $date2 && $time1 == $time && $numrows>=2 || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
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
<input type="hidden" name="s_price" value="'.$price.'">
<div class="col-sm-8" style="width:100%;">
<select ng-model="addDatas.time_reservation" class="form-control" id="gtime1" style="display:none; margin-top-15px;" required>
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Services'");
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
$stmt = $conn->prepare("select *, Count(*)as numrows from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $sss);
$numrows=$sss['numrows'];
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
 $time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
if($date == $date2 && $time1 == $time && $numrows>=2 || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
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
<input type="hidden" name="s_price" value="'.$price.'">
<div class="col-sm-8" style="width:100%;">
<select ng-model="addData.time_reservation" class="form-control" id="gtime1" style="display:none; margin-top-15px;" required>
<option value="" disabled selected required>---Select---</option>';
$stmt = $conn->prepare("select * from type where type = 'Services'");
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
$stmt = $conn->prepare("select *, Count(*)as numrows from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $sss);
$numrows=$sss['numrows'];
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
 $time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
if($date == $date2 && $time1 == $time && $numrows>=2 || $time_id1 == $time_id && $date1 == $date && $status == 'Not Available'){
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
<?php
date_default_timezone_set('Asia/Manila');
$date=date('Y-m-d');
$theday=date('l',strtotime($date));
if($theday == 'Sunday')
{
echo '
<div id="time" class="form-group">
<input type="hidden" value="250.00" name="s_price" id="s_price" readonly>
<input type="hidden" value="0" name="id_services" id="id_services" readonly>
<div class="col-sm-8" id="clinic2" style="display:none; width:100%; margin-top:-15px;">
<select ng-model="addData.time_reservation" class="form-control" ng-required="true">
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
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
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
<input type="hidden" value="250.00" name="s_price" id="s_price" readonly>
<input type="hidden" value="0" name="id_services" id="id_services" readonly>
<div class="col-sm-8" id="clinic2" style="display:none; width:100%; margin-top:-15px;">
<select ng-model="addData.time_reservation" class="form-control" ng-required="true">
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
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
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
<input type="hidden" value="250.00" name="s_price" id="s_price" readonly>
<input type="hidden" value="0" name="id_services" id="id_services" readonly>
<div class="col-sm-8" id="clinic2" style="display:none; width:100%; margin-top:-15px;">
<select ng-model="addData.time_reservation" class="form-control" ng-required="true">
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
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
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
<input type="hidden" value="250.00" name="s_price" id="s_price" readonly>
<input type="hidden" value="0" name="id_services" id="id_services" readonly>
<div class="col-sm-8" id="clinic2" style="display:none; width:100%; margin-top:-15px;">
<select ng-model="addData.time_reservation" class="form-control" ng-required="true">
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
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
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
<input type="hidden" value="250.00" name="s_price" id="s_price" readonly>
<input type="hidden" value="0" name="id_services" id="id_services" readonly>
<div class="col-sm-8" id="clinic2" style="display:none; width:100%; margin-top:-15px;">
<select ng-model="addData.time_reservation" class="form-control" ng-required="true">
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
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
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
<input type="hidden" value="250.00" name="s_price" id="s_price" readonly>
<input type="hidden" value="0" name="id_services" id="id_services" readonly>
<div class="col-sm-8" id="clinic2" style="display:none; width:100%; margin-top:-15px;">
<select ng-model="addData.time_reservation" class="form-control" ng-required="true">
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
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
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
<input type="hidden" value="250.00" name="s_price" id="s_price" readonly>
<input type="hidden" value="0" name="id_services" id="id_services" readonly>
<div class="col-sm-8" id="clinic2" style="display:none; width:100%; margin-top:-15px;">
<select class="form-control" name="id_services" id="id_services" onChange="onSelect(this.value)">
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
$stmt = $conn->prepare("select * from reservation where thedate='$date' and time_reservation = '$time'");
$stmt->execute();
foreach($stmt as $rows1);
$time1 = $rows1['time_reservation'];
$date2 = $rows1['thedate'];
$stmt = $conn->prepare("select * from doctor where time_id = '$time_id'");
$stmt->execute();
foreach($stmt as $rows);
$doctor_id = $rows['doctor_id'];
$time_id1 = $rows['time_id'];
$date1 = $rows['date'];
$status = $rows['status'];
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


<script>
function show1(aval) {
if (aval == "Clinic") {
clinic2.style.display='inline-block';
clinic3.style.display='inline-block';
grooming2.style.display='none';
gtime1.style.display='none';
boarding1.style.display='none';
boarding2.style.display='none';
Form.fileURL.focus();
} 
if (aval == "Grooming") {
clinic2.style.display='none';
clinic3.style.display='none';
grooming2.style.display='inline-block';
gtime1.style.display='inline-block';
clinic2.style.display='none';
clinic3.style.display='none';
boarding1.style.display='none';
boarding2.style.display='none';
/*gtime2.style.display='none';
gtime22.style.display='none';
Form.fileURL.focus();
}*/
}   
if (aval == "Boarding") {
clinic2.style.display='none';
clinic3.style.display='none';
grooming2.style.display='none';
gtime1.style.display='none';
clinic2.style.display='none';
clinic3.style.display='none';
boarding1.style.display='inline-block';
boarding2.style.display='inline-block';
/*gtime2.style.display='none';
gtime22.style.display='none';
Form.fileURL.focus();
}*/
}   
}
</script>
</td>
<td><button type="submit" class="btn btn-success btn-sm">Add</button></td>
</tr>
<tr ng-repeat="data in namesData" ng-include="getTemplate(data)">
</tr>

</tbody>
</table>
</form>

<script type="text/ng-template" id="display1">
<td>{{data.pet_name}}</td>
<td>{{data.service_type}}</td>
<td>{{data.id_services}}</td>
<td>{{data.time_reservation}}</td>
<td>
<button type="button" class="btn btn-primary btn-sm" ng-click="showEdit(data)">Edit</button>
<button type="button" class="btn btn-danger btn-sm" ng-click="deleteData(data.pota_id)">Delete</button>
</td>
</script>
<script type="text/ng-template" id="edit1">
<td><input type="text" ng-model="formData.pet_name" class="form-control"  /></td>
<td><td>
<input type="hidden" ng-model="formData.data.pota_id" />
<button type="button" class="btn btn-info btn-sm" ng-click="editData()">Save</button>
<button type="button" class="btn btn-default btn-sm" ng-click="reset()">Cancel</button>
</td>
</script>         
</div>  
</div>
<script>
var app = angular.module('liveApp1', []);

app.controller('liveController1', function($scope, $http){

$scope.formDatas = {};
$scope.addDatas = {};
$scope.success = false;
$scope.addDatas.id_services = "0";

$scope.getTemplate = function(data){
if (data.pota_id === $scope.formDatas.pota_id)
{
return 'edit1';
}
else
{
return 'display1';
}
};

$scope.fetchDatas = function(){
$http.get('select1.php').success(function(data){
$scope.namesData = data;
});
};

$scope.insertDatas = function(){
$http({
method:"POST",
url:"insert.php",
data:$scope.addDatas,
}).success(function(data){
$scope.success = true;
$scope.successMessage = data.message;
$scope.fetchData();
$scope.addDatas = {};
window.location.href='';
});
};

$scope.showEdit = function(data) {
$scope.formDatas = angular.copy(data);
};

$scope.editData = function(){
$http({
method:"POST",
url:"edit.php",
data:$scope.formDatas,
}).success(function(data){
$scope.success = true;
$scope.successMessage = data.message;
$scope.fetchData();
$scope.formDatas = {};
});
};

$scope.reset = function(){
$scope.formDatas = {};
};

$scope.closeMsg = function(){
$scope.success = false;
};

$scope.deleteData = function(pota_id){
if(confirm("Are you sure you want to remove it?"))
{
$http({
method:"POST",
url:"delete.php",
data:{'pota_id':pota_id}
}).success(function(data){
$scope.success = true;
$scope.successMessage = data.message;
$scope.fetchDatas();
}); 
}
};

});

</script>
