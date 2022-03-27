<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Painters'score</title>
        <style>
            #customers {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
                max-width: 100%;
            }

            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
                width: 33.333%;
                text-align: center;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {background-color: #ddd;}

            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
                background-color: #04AA6D;
                color: white;
            }
            .main-container{
                max-width: 600px;
                margin: 20px auto;
            }
            .nav-container form{
                display: flex;
                justify-content: space-between;
                margin: 20px 0 10px;
            }
            .nav-container input{
                max-width: 160px;
                height: 30px;
                font-size: 16px;
            }
            #startBtn{
                width: 100px;
            }
            #startBtn:hover{
                cursor: pointer;
            }
            .d-flex{
                display: flex;
            }
        </style>
    </head>
    <body>
       <div class="main-container">
            <div class="nav-container">
                <form action="" id="startForm">
                    <div class="d-flex">
                        <div>
                            start date: <input type="date" name="startDate" id="startDate" required />
                        </div>
                        <div>
                            &nbsp;&nbsp;&nbsp; end date: <input type="date" name="endDate" id="endDate" required />
                        </div>
                        
                    </div>
                    <button id="startBtn">Start</button>
                </form>
            </div>
            <div>
                <table id="customers">
                    <tr>
                        <th>Name</th>
                        <th>Total Score</th>
                        <th>Average Score</th>
                    </tr>
                    <tr>
                        <td>David</td>
                        <td id="david"></td>
                        <td id="davidAver"></td>
                    </tr>
                    <tr>
                        <td>Felix</td>
                        <td id="felix"></td>
                        <td id="felixAver"></td>
                    </tr>
                    <tr>
                        <td>Wilmer</td>
                        <td id="wilmer"></td>
                        <td id="wilmerAver"></td>
                    </tr>
                    <tr>
                        <td>Milton</td>
                        <td id="milton"></td>
                        <td id="miltonAver"></td>
                    </tr>
                    <tr>
                        <td>Miguel</td>
                        <td id="miguel"></td>
                        <td id="miguelAver"></td>
                    </tr>
                    <tr>
                        <td>Santiago</td>
                        <td id="santiago"></td>
                        <td id="santiagoAver"></td>
                    </tr>
                    <tr>
                        <td>Sergio</td>
                        <td id="sergio"></td>
                        <td id="sergioAver"></td>
                    </tr>
                    <tr>
                        <td>Estrella</td>
                        <td id="estrella"></td>
                        <td id="estrellaAver"></td>
                    </tr>
                    <tr>
                        <td>Jairo</td>
                        <td id="jairo"></td>
                        <td id="jairoAver"></td>
                    </tr>
                    <tr>
                        <td>Isaias</td>
                        <td id="isaias"></td>
                        <td id="isaiasAver"></td>
                    </tr>
                    <tr>
                        <td>Edgardo</td>
                        <td id="edgardo"></td>
                        <td id="edgardoAver"></td>
                    </tr>
                    <tr>
                        <td>Ulises</td>
                        <td id="ulises"></td>
                        <td id="ulisesAver"></td>
                    </tr>
                </table>
                
                
            </div>
           
       </div> 
        <script src="jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function(){
                var startBtn = $("#startBtn");

                $('form').on('submit', function (e) {
                    e.preventDefault();
                    var startDate = $("#startDate").val();
                    var endDate = $("#endDate").val();

                    var startTime = new Date(startDate);
                    var endTime = new Date(endDate);

                    if(endTime.getTime()>startTime){
                        $.ajax({
                            type:"post",
                            dataType:"json",
                            url: "controller.php",
                            data: {'startDate': startDate, 'endDate': endDate},
                            success: function(response){
                                if(response){
                                    if(response['david']){
                                        $("#david").html(response['david'][0]);
                                        $("#davidAver").html(response['david'][1]);
                                    }
                                    else{
                                        $("#david").html("0");
                                        $("#davidAver").html("0");
                                    }

                                    if(response['wilmer']){
                                        $("#wilmer").html(response['wilmer'][0]);
                                        $("#wilmerAver").html(response['wilmer'][1]);
                                    }
                                    else{
                                        $("#wilmer").html("0");
                                        $("#wilmerAver").html("0");
                                    }

                                    if(response['milton']){
                                        $("#milton").html(response['milton'][0]);
                                        $("#miltonAver").html(response['milton'][1]);
                                    }
                                    else{
                                        $("#milton").html("0");
                                        $("#miltonAver").html("0");
                                    }

                                    if(response['miguel']){
                                        $("#miguel").html(response['miguel'][0]);
                                        $("#miguelAver").html(response['miguel'][1]);
                                    }
                                    else{
                                        $("#miguel").html("0");
                                        $("#miguelAver").html("0");
                                    }
                                    if(response['santiago']){
                                        $("#santiago").html(response['santiago'][0]);
                                        $("#santiagoAver").html(response['santiago'][1]);
                                    }
                                    else{
                                        $("#santiago").html("0");
                                        $("#santiagoAver").html("0");
                                    }

                                    if(response['sergio']){
                                        $("#sergio").html(response['sergio'][0]);
                                        $("#sergioAver").html(response['sergio'][1]);
                                    }
                                    else{
                                        $("#sergio").html("0");
                                        $("#sergioAver").html("0");
                                    }

                                    if(response['estrella']){
                                        $("#estrella").html(response['estrella'][0]);
                                        $("#estrellaAver").html(response['estrella'][1]);
                                    }
                                    else{
                                        $("#estrella").html("0");
                                        $("#estrellaAver").html("0");
                                    }
                                        

                                    if(response['jairo']){
                                        $("#jairo").html(response['jairo'][0]);
                                        $("#jairoAver").html(response['jairo'][1]);
                                    }
                                    else{
                                        $("#jairo").html("0");
                                        $("#jairoAver").html("0");
                                    }
                                    if(response['isaias']){
                                        $("#isaias").html(response['isaias'][0]);
                                        $("#isaiasAver").html(response['isaias'][1]);
                                    }
                                    else{
                                        $("#isaias").html("0");
                                        $("#isaiasAver").html("0");
                                    }

                                    if(response['edgardo']){
                                        $("#edgardo").html(response['edgardo'][0]);
                                        $("#edgardoAver").html(response['edgardo'][1]);
                                    }
                                    else{
                                        $("#edgardo").html("0");
                                        $("#edgardoAver").html("0");
                                    }
                                        

                                    if(response['felix']){
                                        $("#felix").html(response['felix'][0]);
                                        $("#felixAver").html(response['felix'][1]);
                                    }
                                    else{
                                        $("#felix").html("0");
                                        $("#felixAver").html("0");
                                    }

                                    if(response['ulises']){
                                        $("#ulises").html(response['ulises'][0]);
                                        $("#ulisesAver").html(response['ulises'][1]);
                                    }
                                    else{
                                        $("#ulises").html("0");  
                                        $("#ulisesAver").html("0");   
                                    }
                                    alert("success!")
                                }
                            },
                            error: function(data) {
                                successmessage = 'Error';
                                alert("error")
                            },
                        })
                    }
                    else
                        alert("Input correct date");
                });
           
            })
        </script>
    </body>
</html>