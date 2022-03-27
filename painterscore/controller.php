
<?php 
    $startDate = strtotime($_POST['startDate']);
    $endDate = strtotime($_POST['endDate']."23:59:59");

    $spreadsheet_url="https://docs.google.com/spreadsheets/d/e/2PACX-1vSt6f-okrtCHam6UsU5UGDxvDgJ3GD1JMO7Y9RV9BKMpNEN_38qvvE_wKNhyCS4TiqCBdtkyDnaXlEs/pub?output=csv";

    if(!ini_set('default_socket_timeout', 15)) echo "<!-- unable to change socket timeout -->";
    

    $dns = [];
    $key = 0;
    $nameArr = ['David','Wilmer','Felix','Milton','Miguel','Santiago','Ulises','Sergio','Estrella','Jairo','Isaias','Edgardo'];
    $davidScore = [];
    $wilmerScore = [];
    $felixScore = [];
    $miltonScore = [];
    $miguelScore = [];
    $santiagoScore = [];
    $ulisesScore = [];
    $sergioScore = [];
    $estrellaScore = [];
    $jairoScore = [];
    $isaiasScore = [];
    $edgardoScore = [];

    $totalScore = [];

    if (($handle = fopen($spreadsheet_url, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $spreadsheet_data[] = $data;
        }
        fclose($handle);
       
        for($i=1; $i<count($spreadsheet_data); $i++){
            if(strtotime($spreadsheet_data[$i][0])>=$startDate && strtotime($spreadsheet_data[$i][0])<=$endDate){
                // $dns[$i-1][0] = strtotime($spreadsheet_data[$i][0]);
                $dns[$key][0] = $spreadsheet_data[$i][2];
                // $dns=array('"'.$spreadsheet_data[$i][2].'"=>"'.$spreadsheet_data[$i][10].'"');
                $dns[$key][1] = $spreadsheet_data[$i][10];
                // $dns['"'.$spreadsheet_data[$i][2].'"']=$spreadsheet_data[$i][10];
                $key++;
            }
        }
       
        foreach($dns as $data){
            if(!$data[1]) 
              $data[1] = 0;
            switch ($data[0]) {
                case $nameArr[0]:
                    array_push($davidScore,$data[1]);
                    $totalScore['david'][0] = array_sum($davidScore);
                    $totalScore['david'][1] = array_sum($davidScore)/count($davidScore);
                    break;

                case $nameArr[1]:
                    array_push($wilmerScore,$data[1]);
                    $totalScore['wilmer'][0] = array_sum($wilmerScore);
                    $totalScore['wilmer'][1] = array_sum($wilmerScore)/count($wilmerScore);
                    break;

                case $nameArr[2]:
                    array_push($felixScore,$data[1]);
                    $totalScore['felix'][0] = array_sum($felixScore);
                    $totalScore['felix'][1] = array_sum($felixScore)/count($felixScore);
                    break;

                case $nameArr[3]:
                    array_push($miltonScore,$data[1]);
                    $totalScore['milton'][0] = array_sum($miltonScore);
                    $totalScore['milton'][1] = array_sum($miltonScore)/count($miltonScore);
                  break;

                case $nameArr[4]:
                    array_push($miguelScore,$data[1]);
                    $totalScore['miguel'][0] = array_sum($miguelScore);
                    $totalScore['miguel'][1] = array_sum($miguelScore)/count($miguelScore);
                    break;

                case $nameArr[5]:
                  array_push($santiagoScore,$data[1]);
                  $totalScore['santiago'][0] = array_sum($santiagoScore);
                  $totalScore['santiago'][1] = array_sum($santiagoScore)/count($santiagoScore);
                  break;

                case $nameArr[6]:
                  array_push($ulisesScore,$data[1]);
                  $totalScore['ulises'][0] = array_sum($ulisesScore);
                  $totalScore['ulises'][1] = array_sum($ulisesScore)/count($ulisesScore);
                  break;

                case $nameArr[7]:
                  array_push($sergioScore,$data[1]);
                  $totalScore['sergio'][0] = array_sum($sergioScore);
                  $totalScore['sergio'][1] = array_sum($sergioScore)/count($sergioScore);
                  break;

                case $nameArr[8]:
                  array_push($estrellaScore,$data[1]);
                  $totalScore['estrella'][0] = array_sum($estrellaScore);
                  $totalScore['estrella'][1] = array_sum($estrellaScore)/count($estrellaScore);
                  break;

                case $nameArr[9]:
                  array_push($jairoScore,$data[1]);
                  $totalScore['jairo'][0] = array_sum($jairoScore);
                  $totalScore['jairo'][1] = array_sum($jairoScore)/count($jairoScore);
                  break;

                case $nameArr[10]:
                  array_push($isaiasScore,$data[1]);
                  $totalScore['isaias'][0] = array_sum($isaiasScore);
                  $totalScore['isaias'][1] = array_sum($isaiasScore)/count($isaiasScore);
                  break;

                case $nameArr[11]:
                  array_push($edgardoScore,$data[1]);
                  $totalScore['edgardo'][0] = array_sum($edgardoScore);
                  $totalScore['edgardo'][1] = array_sum($edgardoScore)/count($edgardoScore);
                  break;
                      
                default:
                  echo "unregistered name!";
              }
        }
    }
    else
        die("Problem reading csv");
   header('Content-type: application/json');
   echo json_encode($totalScore);
?>

