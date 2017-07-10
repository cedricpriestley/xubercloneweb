<?php

fbo_parse();

function fbo_parse() {
	ini_set('memory_limit','1536M'); // 1.5 GB
	ini_set('max_execution_time', 18000); // 5 hours

	$file = "./FBOFullXML.xml"; 
	$reader = new XMLReader();
	$reader->open($file);
	$fields = array("date", "zip", "classcod", "naics", "offadd", "subject", "solnbr", "respdate", "archdate", "contact", "desc", "link", "email", "links", "files", "setaside", "popaddress", "popzip", "popcountry", "recovery_act");
	$types = array("presol", "combine", "mod", "award", "ja", "srcsgt", "ssale", "snote", "fstd", "itb", "fairopp");

  $node_count = 1;
  $solnbr_count = 0;
  $record_count = 0;
  $archdate_count = 0;
  $contract_count = 0;

  $name_array = array();

	// instantiate node
	while(/*	$node_count <= 192 &&*/ $reader->read()) {

	  $name = strtolower($reader->name);

	  if (!in_array($name, $name_array)) {
	  	$name_array[] = $name;
		}

	  if (in_array($name, $types)) {

	    if ($reader->depth == 1) {

	      if ($reader->value == "") {

	      	if ($node_count > 1 && !empty($solnbr)) {
	      		//print "$solnbr\n";
	      		$record_count++;
	      		if (in_array($name, array("presol"))) {
	      			$contract_count++;
	      		}
	      		
    				$id = id_get($solnbr);
    				$sql = "";

						$created = date('Y-m-d H:i:s',time());
						$updated = $created;

    				if (!empty($id)) {
    					$sql = "UPDATE `service_types`\nSET `name` = '$solnbr',\n`updated_at` = '$updated',\n`subject` = '$subject',\n`agency` = '$agency',\n`office` = '$office',\n`location` = '$location',\n`type` = '$notice_type',\n`setaside` = '$setaside',\n`date` = '$date'\nWHERE `id` = $id;";
    				} else {

    					$sql = "INSERT INTO `service_types`(`name`, `created_at`, `updated_at`, `solnbr`, `subject`, `agency`, `office`, `location`, `type`, `setaside`, `date`)\nVALUES('$solnbr', '$created', '$updated', '$solnbr', '$subject', '$agency', '$office', '$location', '$notice_type', '$setaside', '$date' );";
    				}

    				//print $sql . "\n"; 
						if (empty($id)) {
						$pdo = new PDO('mysql:host=127.0.0.1;dbname=xubercloneweb', 'root', 'Secret!23');

						if($pdo->exec($sql) === false){
							print "Error saving contract: $solnbr.\n";
						} else {
							//print "Successfully saved contract: $solnbr\n";
						}
						}

						$solnbr = "";
						$date = "";
						$agency = "";
						$office = "";
						$zip = "";
						$classcod = "";
						$naics = "";
						$offadd = "";
						$subject = "";
						$respdate = "";
						$archdate = "";
						$contact = "";
						$link = "";
						$setaside = "";
						$recovery_act = "";
						$desc = "";
						$popcountry = "";
						$popaddress = "";
						$popzip = "";
						$email = "";
						$awdamt = "";
						$awdnbr = "";
						$awddate = "";
						$awardee = "";
						$linenbr = "";
						$stauth = "";
						$modnbr = "";
						$foja = "";
						$donr = "";
						$correction = "";						
	      	}

	      	$notice_type = $name;
	        $node_count++;
	      }
	    }
	  }

	  switch ($name) {
	    case "date":

	      $reader->read();
	      if ($reader->depth == 3) {
	      	$date = fbo_convert_date($reader->value);
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n";
				}

	      break;
	    case "solnbr":
	      $reader->read();
	      if ($reader->depth == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n";
	        $solnbr = $reader->value;
	        $solnbr_count++;
	      }
	      
	      break;
	    case "agency":
	      $reader->read();
	      if ($reader->depth == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n";
	      	$agency = $reader->value;
	      }

	      break;  
	    case "office":
	      $reader->read();
	      if ($reader->depth == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n";
	      	$office = $reader->value;
	      }
	           
	      break;
	    case "location":
	      $reader->read();
	      if ($reader->depth == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n";
	      	$location = $reader->value;
	      }
	           
	      break;
	    case "zip":
	      $reader->read();
	      if ($reader->depth == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n";
	      	$zip = $reader->value;
	      }
	           
	      break;
	    case "classcod":
	      $reader->read();
	      if ($reader->depth == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n";
	      	$classcod = $reader->value;
	      }
	      
	      break;           
	    case "naics":
	      $reader->read();
	      if ($reader->depth == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n";
	        $naics = $reader->value;
	      }

	      break;

	    case "offadd":
	      $reader->read();
	      if ($reader->depth == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n";
	      	$offadd = $reader->value;
	      }
	      
	      break;

	    case "subject":
	      $reader->read();
	      if ($reader->depth == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n";
	      	$subject = $reader->value;
	      }
	      
	      break;
	    case "respdate":
	      $reader->read();
	      if ($reader->depth == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n";
	      	$respdate = $reader->value;
	      }
	      
	      break;
	    case "archdate":
	      $reader->read();
	      if ($reader->depth == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n";
	      	$archdate = $reader->value;
	      	if (empty($archdate)) {
	      		$archdate_count++;
	      	}
	      }
	      
	      break;  
	    case "contact":
	      $reader->read();
	      if ($reader->depth == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n";
	      	$contact = $reader->value;
	      }
	      
	      break;
	    case "desc":
	      $reader->read();
	      if ($reader->depth == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n\n";
	      	$desc = $reader->value;
	      }
	      
	      break;  
	    case "link":
	      $reader->read();
	      if ($reader->depth == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n";
	      	$link = $reader->value;
	      }
	      
	      break;  
	    case "setaside":
	      $reader->read();
	      if ($reader->depth == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n\n";
	      	$setaside = $reader->value;
	      }
	      
	      break;
	    case "recovery_act":
	      $reader->read();
	      if ($reader->depth == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n\n";
	      	$recovery_act = $reader->value;
	      }
	      
	      break; 
	    case "document_packages":
	      $reader->read();
	      $reader->read();
	      //$reader->read();
	      //if ($reader->depth == 3) {
	      if ($reader->value != "") {
	        //print "solnbr: " . $solnbr . ", type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n\n";
	      }
	      
	      break;
	    case "popcountry":
	      $reader->read();
	      if ($reader->depth == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n\n";
	        $popcountry = $reader->value;
	      }

	      break;
	    case "popaddress":
	      $reader->read();
	      if ($reader->depth == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n\n";
	      	$popaddress = $reader->value;
	      }

	      break;  
	    case "popzip":
	      $reader->read();
	      if ($reader->depth == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n\n";
	      	$popzip = $reader->value;
	      }

	      break;     
	    case "package":
	      $reader->read();
	      //$reader->read();
	      if ($reader->depth == 6) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n\n";
	      }

	      break; 
	    case "changes":
	      $reader->read();
	      $reader->read();
	      $reader->read();
	      $reader->read();
	     // if ($reader->depth == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n\n";
	      //}

	      break;
	    case "email":
	      $reader->read();
	      $reader->read();
	      $reader->read();
	      if ($reader->depth == 4) {
	        //print  "solnbr: " . $solnbr . ", type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n\n";
	      	$email = $reader->value;
	      }

	      break;
	    case "address":
	      $reader->read();
	      $reader->read();
	      $reader->read();
	      if ($reader->depth == 4 || $reader->depth == 6) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n\n";
	      	$address = $reader->value;
	      }

	      break; 
	    case "awdnbr":
	      $reader->read();
	      //$reader->read();
	      //$reader->read();
	      if ($reader->nodeType == 4) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n\n";
	      	$awdnbr = $reader->value;
	      }

	      break;
	    case "awdamt":
	      $reader->read();
	      //$reader->read();
	      //$reader->read();
	      if ($reader->nodeType == 4) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n\n";
	        $awdamt = $reader->value;
	      }

	      break;
	    case "awddate":
	      $reader->read();
	      //$reader->read();
	      //$reader->read();
	      if ($reader->nodeType == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n\n";
	      	$awddate = fbo_convert_date($reader->value);
	      }

	      break;
	    case "awardee":
	      $reader->read();
	      //$reader->read();
	      //$reader->read();
	      if ($reader->nodeType == 4) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n\n";
	      	$awardee = $reader->value;
	      }

	      break;
	    case "linenbr":
	      $reader->read();
	      //$reader->read();
	      //$reader->read();
	      if ($reader->nodeType == 4) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n\n";
	      	$linenbr = $reader->value;
	      }

	      break;
	    case "stauth":
	      $reader->read();
	      //$reader->read();
	      //$reader->read();
	      if ($reader->nodeType == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n\n";
	      	$stauth =$reader->value;
	      }

	      break;
	    case "modnbr":
	      $reader->read();
	      //$reader->read();
	      //$reader->read();
	      if ($reader->nodeType == 4) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n\n";
	      	$modnbr = $reader->value;
	      }

	      break;    
	    case "foja":
	      $reader->read();
	      //$reader->read();
	      //$reader->read();
	      if ($reader->nodeType == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n\n";
	      	$foja = $reader->value;
	      }

	      break;
	    case "donbr":
	      $reader->read();
	      //$reader->read();
	      //$reader->read();
	      if ($reader->nodeType == 4) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n\n";
	      	$donbr = $reader->value;
	      }

	      break;
	    case "correction":
	      $reader->read();
	      //$reader->read();
	      //$reader->read();
	      if ($reader->nodeType == 3) {
	        //print "type: " . $notice_type . ", name: " . $name . ", value: " . $reader->value . ", type: " . $reader->nodeType . ", depth " . $reader->depth . "\n\n";
	      	$correction = $reader->value;
	      }

	      break;    

	    default:
	      break;
	  }
	}  

	print "non archdate_count: $archdate_count\n";
	print "solnbr_count: $solnbr_count\n";
	print "record_count: $record_count\n";
	print "contract_count: $contract_count\n";
	//print_r($name_array);
	print "\n";
}

function id_get($solnbr) {
	$pdo = new PDO('mysql:host=127.0.0.1;dbname=xubercloneweb', 'root', 'Secret!23');
	
	$sql = "
					SELECT `id` FROM `service_types`
					WHERE `name` = '$solnbr';\n";

	$statement = $pdo->query($sql);
	$row = $statement->fetch(PDO::FETCH_ASSOC);

	return $row['id'];
}

function fbo_convert_date($input) {
  return substr($input, 4, 4) . "-" . substr($input, 0, 2) . "-" .substr($input, 2, 2);
}