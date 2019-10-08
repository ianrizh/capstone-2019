<div class="modal fade" id="edit1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"><b>PET PROFILE</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="pet_edit.php">
                <input type="text" class="id_cust" name="id_cust">
                <div class="form-group">
                    <label for="edit_name" class="col-sm-3 control-label">Name</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_pet_name" name="pet_name" autofocus autocomplete="off">
                    </div>
                </div>
				<div class="form-group">
<label for="lastname" class="col-sm-3 control-label">Type</label>

<div class="col-sm-9">
<script src="https://code.jquery.com/jquery-1.11.0.min.js" integrity="sha256-spTpc4lvj4dOkKjrGokIrHkJgNA0xMS98Pw9N7ir9oI=" crossorigin="anonymous"></script>
<style>
#pet_breed option{
display:none;
}

#pet_breed option.label{
display:block;
}
</style>

<select id="edit_pet_type" name="pet_type" class="form-control" required>
<option value="" disabled selected required>---Select---</option>
<option value="Cat">Cat</option>
<option value="Dog">Dog</option>
</select>

</div>
</div>
<div class="form-group">
<label for="home" class="col-sm-3 control-label">Breed</label>

<div class="col-sm-9">
<select id="edit_pet_breed" name="pet_breed" class="form-control" disabled="disabled" required>
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

var $pet_type = $("#edit_pet_type"),
$pet_breed = $("#edit_pet_breed");

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
<label for="email" class="col-sm-3 control-label">Gender</label>

<div class="col-sm-9">
<select id="edit_pet_gender" name="pet_gender" class="form-control" required>
<option value="" disabled selected required>---Select---</option>
<option value="Female">Female</option>
<option value="Male">Male</option>
</select>
</div>
</div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>
