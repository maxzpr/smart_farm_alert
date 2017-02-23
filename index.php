<?php
require "weather.php";
$w = new Weather;
$data = $w->getWeather("Chiangmai,th");
$weather = $data["item"]["forecast"];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Smart Farm</title>
        <link href="bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="page-header">
        </div>
        <div class="container-fluid">
            <div class="col-md-6" style="border-right:1px solid">
                <h1 align="center">Weather Forecast <br></h1>
                <h4 align="center">Location : <?= $data["location"]["city"] . "/" . $data["location"]["region"].",". $data["location"]["country"] ?></h4>
                <table class="table table-bordered">
                    <thead class="alert alert-info">
                        <tr>
                            <th>day</th>
                            <th>date</th>
                            <th>temp_high</th>
                            <th>temp_low</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($weather as $d) { ?>
                            <tr>
                                <td>
                                    <?= $d["day"]; ?>
                                </td>
                                <td>
                                    <?= $d["date"]; ?>
                                </td>
                                <td>
                                    <?= $d["high"]; ?>
                                </td>
                                <td>
                                    <?= $d["low"]; ?>
                                </td>
                                <td>
                                    <?= $d["text"]; ?>
                                </td>
                            <tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <h2 align="center">Line Bot</h2>
                <hr>
                <div class="col-md-3">
                    To:
                    <select class="btn btn-default">
                        <option>user</option>
                        <option>global</option>
                    </select>
                </div>
                <div class="col-md-7">
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-default">sent</button>
                </div>
            </div>
        </div>
    </body>
</html>
