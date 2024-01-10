<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/homestyle.css">
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<h1 class="text-center fw-bold"> Galatasaray </h1>

<a href="/api/article">View the articles API endpoint</a><br>
<a href="/webshop">View the articles (webshop) page</a><br>
<a href="/tickets">View the articles (ticket) page</a><br>

<div class="container mt-5">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/galavsfener.jpg" class="d-block custom-carousel-image" alt="">
            <div class="carousel-caption d-none d-md-block">
                <h5>Galatasaray vs Fenerbahce</h5>
                <p>The upcoming clash between Galatasaray and Fenerbahce on Friday is anticipated to be one of the biggest matches in Turkey!</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/icardi.jpg" class="d-block custom-carousel-image" alt="">
            <div class="carousel-caption d-none d-md-block">
                <h5>New Topscorer</h5>
                <p>Player of Galatasaray, Mauro Icardi is the new topscorer in Turkey!</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/okanburuk.jpg" class="d-block custom-carousel-image" alt="">
            <div class="carousel-caption d-none d-md-block">
                <h5>The coach has decided to implement a new tactical approach against Fenerbahce.</h5>
                <p></p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<p id="welcomeText">
Welcome to Galatasaray Football Club! Explore the passion, glory, and rich history of one of Turkey's most iconic football clubs. Since 1905, Galatasaray has symbolized excellence, creating a legacy that goes beyond the pitch.
<br><br>
Discover the latest news, upcoming matches, and standings. Join us in celebrating the unique spirit of Galatasaray, where every match tells a story, and every fan is part of our proud legacy.
<br><br>
This platform is a digital hub for all Galatasaray enthusiasts. Whether you're a seasoned supporter or a new fan, be part of our vibrant community. Share your passion, connect with fellow fans, and witness Galatasaray's journey.
<br><br>
Thanks for being part of our online home. Together, let's continue writing the remarkable story of Galatasaray Football Club!
</p>

</div>


<div class="container-flex">
    <div class="row">
        <div class="col-xxl-6">
            <div class="standings-container">
                <div class="ptable">
                    <h1 class="heading">Standings</h1>                                                                     <table>
                        <tr class="col">
                            <th>#</th>
                            <th>Team</th>
                            <th>GP</th>
                            <th>W</th>
                            <th>D</th>
                            <th>L</th>
                            <th>GD</th>
                            <th>PTS</th>
                        </tr>
                        <tr class="cl">
                            <td>1</td>
                            <td>Fenerbahce FC</td>
                            <td>17</td>
                            <td>14</td>
                            <td>2</td>
                            <td>1</td>
                            <td>30</td>
                            <td>44</td>
                        </tr>
                        <tr class="cl">
                            <td>2</td>
                            <td>Galatasaray</td>
                            <td>17</td>
                            <td>14</td>
                            <td>2</td>
                            <td>1</td>
                            <td>23</td>
                            <td>44</td>
                        </tr>
                        <tr class="el">
                            <td>3</td>
                            <td>Trabzonspor</td>
                            <td>17</td>
                            <td>9</td>
                            <td>3</td>
                            <td>5</td>
                            <td>11</td>
                            <td>30</td>
                        </tr>
                        <tr class="confl">
                            <td>4</td>
                            <td>Kayserispor</td>
                            <td>17</td>
                            <td>8</td>
                            <td>5</td>
                            <td>4</td>
                            <td>4</td>
                            <td>29</td>
                        </tr>
                        <tr class="pos">
                            <td>5</td>
                            <td>Besiktas</td>
                            <td>17</td>
                            <td>9</td>
                            <td>2</td>
                            <td>6</td>
                            <td>2</td>
                            <td>29</td>
                        </tr>
                        <tr class="pos">
                            <td>6</td>
                            <td>Adana Demirspor</td>
                            <td>17</td>
                            <td>7</td>
                            <td>6</td>
                            <td>4</td>
                            <td>9</td>
                            <td>27</td>
                        </tr>
                        <tr class="pos">
                            <td>7</td>
                            <td>Caykur Rizespor</td>
                            <td>17</td>
                            <td>7</td>
                            <td>5</td>
                            <td>5</td>
                            <td>-1</td>
                            <td>26</td>
                        </tr>
                        <tr class="pos">
                            <td>8</td>
                            <td>Antalyaspor</td>
                            <td>17</td>
                            <td>6</td>
                            <td>6</td>
                            <td>5</td>
                            <td>4</td>
                            <td>24</td>
                        </tr>
                        <tr class="pos">
                            <td>9</td>
                            <td>Kasimpasa</td>
                            <td>17</td>
                            <td>6</td>
                            <td>5</td>
                            <td>6</td>
                            <td>-4</td>
                            <td>23</td>
                        </tr>
                        <tr class="pos">
                            <td>10</td>
                            <td>Sivasspor</td>
                            <td>17</td>
                            <td>5</td>
                            <td>6</td>
                            <td>6</td>
                            <td>-7</td>
                            <td>21</td>
                        </tr>
                        <tr class="pos">
                            <td>11</td>
                            <td>MKE Ankaragücü</td>
                            <td>17</td>
                            <td>4</td>
                            <td>8</td>
                            <td>5</td>
                            <td>0</td>
                            <td>20</td>
                        </tr>
                        <tr class="pos">
                            <td>12</td>
                            <td>Alanyaspor</td>
                            <td>17</td>
                            <td>5</td>
                            <td>5</td>
                            <td>7</td>
                            <td>-7</td>
                            <td>20</td>
                        </tr>
                        <tr class="pos">
                            <td>13</td>
                            <td>Basaksehir FK</td>
                            <td>17</td>
                            <td>5</td>
                            <td>4</td>
                            <td>8</td>
                            <td>-3</td>
                            <td>19</td>
                        </tr>
                        <tr class="pos">
                            <td>14</td>
                            <td>Hatayspor</td>
                            <td>17</td>
                            <td>4</td>
                            <td>7</td>
                            <td>6</td>
                            <td>1</td>
                            <td>19</td>
                        </tr>
                        <tr class="pos">
                            <td>15</td>
                            <td>Gaziantep FK</td>
                            <td>17</td>
                            <td>6</td>
                            <td>1</td>
                            <td>10</td>
                            <td>-7</td>
                            <td>19</td>
                        </tr>
                        <tr class="pos">
                            <td>16</td>
                            <td>Konyaspor</td>
                            <td>17</td>
                            <td>4</td>
                            <td>6</td>
                            <td>7</td>
                            <td>-4</td>
                            <td>18</td>
                        </tr>
                        <tr class="deg">
                            <td>17</td>
                            <td>Fatih Karagümrük</td>
                            <td>17</td>
                            <td>4</td>
                            <td>5</td>
                            <td>8</td>
                            <td>0</td>
                            <td>17</td>
                        </tr>
                        <tr class="deg">
                            <td>18</td>
                            <td>Samsunspor</td>
                            <td>17</td>
                            <td>4</td>
                            <td>3</td>
                            <td>10</td>
                            <td>-10</td>
                            <td>15</td>
                        </tr>
                        <tr class="deg">
                            <td>19</td>
                            <td>Pendikspor</td>
                            <td>17</td>
                            <td>3</td>
                            <td>5</td>
                            <td>9</td>
                            <td>-21</td>
                            <td>14</td>
                        </tr>
                        <tr class="deg">
                            <td>20</td>
                            <td>Istanbulspor</td>
                            <td>17</td>
                            <td>2</td>
                            <td>2</td>
                            <td>13</td>
                            <td>-20</td>
                            <td>5</td>
                        </tr>
                    </table>
                        <ul class="legend">
                            <li><span class="legend-text" style="color: #036ffc;">Champions League</span></li>
                            <li><span class="legend-text" style="color: #fca503;">Europa League</span></li>
                            <li><span class="legend-text" style="color: #77ff21;">Conference League</span></li>
                            <li><span class="legend-text" style="color: #ff7b21;">Relegation</span></li>        
                        </ul>    
                </div>
            </div>
        </div>

        <div class="col-xxl-6">
            <div class="cards-container">
                <div class="card">
                    <img src="images/awaykit.jpg" class="card-img">
                    <div class="card-img-overlay">
                        <h5 class="card-title">Galatasaray Away Kit 2023/2024</h5>
                        <p class="card-text">Get your Galatasaray Away Kit now!</p>
                        <a href="webshop" id="shopnowbutton" class="btn btn-primary">Shop now</a>
                    </div>
                </div>

                <div class="card">
                    <img src="images/gs-fb.jpg" class="card-img">
                    <div class="card-img-overlay">
                        <h5 class="card-title-white">Galatasaray vs Fenerbahce</h5>
                        <p class="card-text-white">Buy your tickets now!</p>
                        <a href="tickets" id="shopnowbutton" class="btn btn-primary">Shop now</a>
                    </div>
                </div>

                <div class="card">
                    <img src="images/aboutgs.jpg" class="card-img">
                    <div class="card-img-overlay">
                        <h5 class="card-title-white">About Galatasaray</h5>
                        <p class="card-text-white">Learn more about our beautiful club!</p>
                        <a href="about" id="shopnowbutton" class="btn btn-primary">About us</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>


<?php include 'footer.php'; ?>