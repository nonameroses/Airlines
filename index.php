<?php

include  "ifSessionHeader.php";
 ?>

	<!-- Header -->
	<header id="head">

		<div class="container">
			<div class="row">
				<h1 class="lead">Penguin Airlines!</h1>
				<p class="tagline">Because Penguins can't fly, but we can ! <a href="http://www.gettemplate.com/?utm_source=progressus&amp;utm_medium=template&amp;utm_campaign=progressus"></a></p>
				<p><a class="btn btn-default btn-lg" href="searchFlights.php" <a class="btn btn-action btn-lg" role="button">BOOK NOW</a></p>
			</div>
		</div>
	</header>
	<!-- /Header -->

	<!-- Intro -->
    <style>
        .images{
            width: 318px;
            height: 200px;
            float: left;
            display: flex;
            flex: 33.33%;
            align-content: center;




        }
    </style>


<body>

<div class = "images">
    <img src = "assets/images/ibiza.jpg">
    <img sizes="200px" src = "assets/images/panama.webp">
    <img  src = "assets/images/paris.jpg">
    <img sizes="200px" src = "assets/images/madrid.webp">
    <img sizes="200px" src = "assets/images/spain.jpg">
    <br>

</div>

</body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
	<div class="container text-center">
		<br> <br>
		<h2 class="thin">The best place to tell book your holidays</h2>

        <h3 class="text-center thin">Reasons to use our airline</h3>

        <div class="row">
            <div class="col-md-3 col-sm-6 highlight">
                <div class="h-caption"><h4><i class="fa fa-cogs fa-5"></i>Latest planes technology</h4></div>
                <div class="h-body text-center">
                    <p>Get to your destinations as fast as it is possible!</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 highlight">
                <div class="h-caption"><h4><i class="fa fa-flash fa-5"></i>Something</h4></div>
                <div class="h-body text-center">
                    <p>Something about his! </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 highlight">
                <div class="h-caption"><h4><i class="fa fa-heart fa-5"></i>Nature-Friendly</h4></div>
                <div class="h-body text-center">
                    <p>Environmental Friendly. Our flights tries to minimize air pollution as much as we can!</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 highlight">
                <div class="h-caption"><h4><i class="fa fa-smile-o fa-5"></i>Support</h4></div>
                <div class="h-body text-center">
                    <p>Our customer service will reach you back in 24 hours </p>
                </div>
            </div>
        </div> <!-- /row  -->
	</div>
	<!-- /Intro-->
		
	<!-- Highlights - jumbotron -->

	<!-- /Highlights -->

	<!-- container -->
	<div class="container">

		<h2 class="text-center top-space">Frequently Asked Questions</h2>
		<br>

		<div class="row">
			<div class="col-sm-6">
				<h3>Which code editor would you recommend?</h3>
				<p>I'd highly recommend you <a href="http://www.sublimetext.com/">Sublime Text</a> - a free to try text editor which I'm using daily. Awesome tool!</p>
			</div>
			<div class="col-sm-6">
				<h3>Nice header. Where do I find more images like that one?</h3>
				<p>
					Well, there are thousands of stock art galleries, but personally, 
					I prefer to use photos from these sites: <a href="http://unsplash.com">Unsplash.com</a> 
					and <a href="http://www.flickr.com/creativecommons/by-2.0/tags/">Flickr - Creative Commons</a></p>
			</div>
		</div> <!-- /row -->

		<div class="row">
			<div class="col-sm-6">
				<h3>Can I use it to build a site for my client?</h3>
				<p>
					Yes, you can. You may use this template for any purpose, just don't forget about the <a href="http://creativecommons.org/licenses/by/3.0/">license</a>, 
					which says: "You must give appropriate credit", i.e. you must provide the name of the creator and a link to the original template in your work. 
				</p>
			</div>
			<div class="col-sm-6">
				<h3>Can you customize this template for me?</h3>
				<p>Yes, I can. Please drop me a line to sergey-at-pozhilov.com and describe your needs in details. Please note, my services are not cheap.</p>
			</div>
		</div> <!-- /row -->



</div>	<!-- /container -->
	
	<!-- Social links. @TODO: replace by link/instructions in template -->
	<section id="social">
		<div class="container">
			<div class="wrapper clearfix">
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_button_linkedin_counter"></a>
				<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
				</div>
				<!-- AddThis Button END -->
			</div>
		</div>
	</section>
	<!-- /social links -->


	<?php
	include "footer.php";
	?>