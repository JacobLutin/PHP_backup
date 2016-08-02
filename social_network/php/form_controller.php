<?php 

class Form {

}

function form_for($data) {

	$location = "$_SERVER[REQUEST_URI]";

	include('php/form_template.html');

}

// function form_for($object, $data = null) {

// 	$location = "$_SERVER[REQUEST_URI]";

// 	unset($object->table);

// 	if (isset($data['labels'])) {
// 		$labels = $data['labels'];

// 		$fields = [];

// 		if (isset($data['columns'])) {
// 			$data = $data['columns'];
			
// 			foreach ($data as $key => $value) {
// 				$fields[$key] = $object->$value;
// 			}
// 		} else {
// 			foreach ($object as $key => $value) {
// 				$fields[$key] = $object->$value;
// 			}
// 		}

// 		print_r($fields)

// 		$columns = [];

// 		foreach ($fields as $column => $value) {

// 			array_push($columns, $column);
// 		}

// 		$data = array_combine($labels, $data);

// 		print_r($data);

// 	} else {
// 		$data = [];

// 		foreach ($fields as $key => $value) {
// 			$data[$key] = $key;
// 		}
// 	}

// 	include('php/form_template.html');
// }

?>