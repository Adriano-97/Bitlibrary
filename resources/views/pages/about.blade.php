<!DOCTYPE html>
<html>
    <head>
            <link rel="stylesheet" href="/css/bootstrap/css/bootstrap2.min.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
            <link rel="stylesheet" href="/css/fonts/font-awesome.min.css">
            <link rel="stylesheet" href="/css/css/untitled.css">
    </head>
    @include('inc.navbar')
<body>
    <header id ="pageHeader"class="masthead" style="background-image: url(&quot;/img/homeBackground.jpg&quot;);">
        <div class="overlay"></div>
        <div class="container" id="container2">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <div class="site-heading">
                        <h1 id="noH1">About</h1>
                        <img src="/img/profile.jpg"id ="profile"></div>
                </div>
            </div>
        </div>
    </header>
    <div class="container" id="container2">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto">
                <br>
                <br>
                <H5>A little bit about me:</H5>
                <p>My name is Adriano Herrera, I'm a CS major currently studying at FIU. I created this template of a Q&A website to showcase my abilities as a Full-Stack web
                    developer.</p>
                <H5>How was BitLibrary build:</H5>
                <p>BitLibrary is a simple website hosted in <b>AWS</b> using an <b>EC2</b> instance. The OS used was <b>Ubuntu Server 18.04 LTS</b> due to its compatibility with docker
                    containers. It also uses an <b>S3 bucket</b> to store and fetch the files uploaded by the users.</p>
                <p>The application was divided into three <b>containers:</b> "app" which was meant to host all files from the web application, "db" hosted the database) and
                    "webserver".</p>
                <p>The "app" container utilized the image  digitalocean.com/php from the <b>docker</b> repository. It was developed using <b>PHP's framework Laravel</b> since it
                     makes common development tasks easy, such as <b>routing</b> and <b>authentication</b>. All <b>routes</b> were designed utilizing <b>RESTful</b> practices for
                      the page <b>controllers.</b></p>
                <p>The <b>Front end</b> was designed using <b>"Bootstrap Studio"</b> to increment the compatibility in multiple device screens.</p>
                <p>I implemented a basic <b>pipeline</b> using two simple tools(<b>Docker-Compose</b> and <b>GitHub</b>). First, I developed the application in my local environment,
                     then when it was
                     ready to be <b>deployed</b> ill simply pushed to my master branch.  These changes were immediately available on the server and <b>docker-compose</b> reflected them to
                      my <b>containers</b>. <b>Laravel migrations</b> also facilitated this process since all the changes I did to my local database could be migrated to my db container.</p>
                <h5>The code is available at:</h5>
                <a href="https://github.com/Adriano-97/Bitlibrary">https://github.com/Adriano-97/Bitlibrary</a>
                <br>
                <br>
            </div>
        </div>
    </div>
    <hr>
    <div class="footer-basic">
            <footer id="myFooter">
                <p id="footer" class="copyright" style="opacity: 1;">Bitlord &nbsp;2019</p>
            </footer>
    </div>
    <script src="/js/bootstrapJs/jquery.min.js"></script>
    <script src="/js/bootstrapJs/bootstrap.min.js"></script>
</body>
</html>

