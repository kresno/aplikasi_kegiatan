<?php 
include 'frontend/config/koneksi.php';

$sql = "select id, nama from program";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row= mysqli_fetch_array($result)){
            $id = $row['id'];
            $nama = $row['nama'];
            $arr_program[] = array(
                "id" => $id,
                "text" => $nama,
                "parent_id" => 0
                // "children" =>[],
                // "data" => new StdClass()
            );
        }
    }
}

// print_r($arr_program);


$sql2 = "select id as id, nama, program_id as parent_id from kegiatan";
if($result = mysqli_query($con, $sql2)){
    if(mysqli_num_rows($result) > 0){
        while($row= mysqli_fetch_array($result)){
            $id = $row['id'];
            $nama = $row['nama'];
            $parent_id = $row['parent_id'];
            $arr_kegiatan[] = array(
                "id" => $id,
                "text" => $nama,
                "parent_id" => $parent_id
                // "children" =>[],
                // "data" => new StdClass()
            );
        }
    }
}

// echo "<br>";
// print_r($arr_kegiatan);

$data = array_merge($arr_program, $arr_kegiatan);
$itemsByReference = array();
 
// Build array of item references:
foreach($data as $key => &$item) {
   $itemsByReference[$item['id']] = &$item;
   // Children array:
   $itemsByReference[$item['id']]['children'] = array();
   // Empty data class (so that json_encode adds "data: {}" ) 
   $itemsByReference[$item['id']]['data'] = new StdClass();
}
echo json_encode($itemsByReference);

// //Set items as children of the relevant parent item.
// foreach($data as $key => &$item) {
//     if($item['parent_id'] == isset($itemsByReference[$item['parent_id']])) {
//     $itemsByReference [$item['parent_id']]['nodes'][] = &$item;
//     }
// }
// // echo json_encode($itemsByReference);
      
// // Remove items that were added to parents elsewhere:
// foreach($data as $key => &$item) {
//    if($item['parent_id'] && isset($itemsByReference[$item['parent_id']]))
//       unset($data[$key]);
// }
// // Encode:
// echo json_encode($data);

?>