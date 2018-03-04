<?php header("Content-type: text/css; charset: UTF-8"); ?>

@charset "utf-8";
/* CSS Document */

 @media only screen and (max-width: 380px){
    html{
    	margin-right : -50px;
    }
  }
  @media only screen and (max-width: 320px){
    html{
    	margin-right : -70px;
    }
  }

.errormsg{
	background-color: #f46060;
	color: #fff;
	font-size: 16px;
	padding-top: 20px;
	padding-bottom: 20px;
	padding-left: 20px;
	margin-bottom: 5px;
}

/************************ Header Section ************************/

#logo {
	float: left;
	height: 85px;
	margin-right: 10px;
	margin-bottom: -25px;
}
#navbar-toggle {
	display: none;
}
.main-nav ul {
	float: left;
	padding: 0px;
	list-style: none;
	padding-top: 20px;
}
.main-nav ul li {
	text-align: center;
	display: inline-block;
	border-right: solid 1px #ebebeb;
}
.main-nav ul li:last-child {
	border-right: none;
}
.main-nav ul li a {
	display: block;
	color: #404040;
	font-size: 14px;
	font-weight: 600;
	text-transform: uppercase;
	padding: 0px 20px 0px 20px;
}
.main-nav ul li a span {
	display: block;
	color: #979797;
	font-size: 12px;
	font-weight: 400;
	text-transform: lowercase;
}
.main-nav ul li a:hover {
	color: #46a0d2;
}
.main-nav ul li ul {
	padding: 0;
	width: 210px;
	display: none;
	list-style: none;
	background: #FFF;
	padding-top: 16px;
	position: absolute;
	margin: 0 0 0 -3px;
	z-index: 999999999;
	border-bottom: solid 1px #3398CC;
}
.main-nav ul li ul li ul {
	left: 100%;
	display: none;
	margin-left: 0px;
	padding-top: 0px;
	margin-top: -39px;
}
.main-nav ul li ul li {
	display: block;
	text-align: left;
	border-left: solid 1px #F5F5F5;
	border-right: solid 1px #F5F5F5;
}
.main-nav ul li ul li:last-child {
	border-right: solid 1px #F5F5F5;
}
.main-nav ul li ul li ul li {
	border-left: none;
}
.main-nav ul li ul li a {
	display: block;
	font-size: 12px;
	padding: 10px 12px;
	font-weight: normal;
	text-transform: none;
	transition: color 0s;
	-o-transition: all 0.3s;
	-ms-transition: all 0.3s;
	-moz-transition: all 0.3s;
	-webkit-transition: all 0.3s;
	border-top: solid 1px #ebebeb;
}
.main-nav ul li ul li a:hover {
	color: #FFF;
	background: #46a0d2;
}
.header-right {
	float: right;
}
.header-right-btns, .search-box {
	float: right;
}
.header-right-btns {
	padding-top: 20px;
	padding-left: 15px;
}
.header-right-btns ul {
	padding: 0px;
	list-style: none;
}
.header-right-btns ul li {
	font-weight: 600;
	display: inline-block;
	text-transform: uppercase;
}
.header-right-btns ul li.login-panel {
	top: 1px;
	position: relative;
}
.header-right-btns ul li a {
	color: #404040;
	font-size: 14px;
	font-weight: 400;
}
.header-right-btns ul li a:hover {
	color: #46a0d2;
}
.header-right-btns ul li span {
	color: #a6a6a6;
	font-size: 12px;
	padding: 0px 15px;
}
.dropdown-login {
	top: 63px;
	left: auto;
	right: -50px;
	display: none;
	width: 330px;
	z-index: 99999;
	background: #ecf0f1;
	text-align: left;
	position: absolute;
	padding: 5px 20px 15px;
}
.dropdown-login > .arrow {
	top: -20px;
	left: 50%;
	margin-left: -11px;
	border-top-color: #999;
	border-top-color: rgba(0,0,0,.25);
	border-bottom-width: 0;
	bottom: -11px;
}
.dropdown-login > .arrow:after {
	bottom: auto;
	border-color: transparent;
	margin-left: 189px;
	margin-top: -24px;
	border-top-color: #ecf0f1;
	border-bottom-width: 0;
	content: "";
	border-width: 10px;
	position: absolute;
	display: block;
	width: 0;
	height: 0;
	border-style: solid;
}
.dropdown-login > .reverse {
	top: -10px;
	left: 63%;
	margin-left: -20px;
	background: url("assets/images/icon-arrow-reverse.png");
	position: absolute;
	width: 45px;
	height: 15px;
}
.dropdown-login .box-reverse.left {
	background-color: #ecf0f1;
	width: 58%;
	height: 15px;
	position: absolute;
	top: -10px;
	left: 0px;
}
.dropdown-login .box-reverse.right {
	background-color: #ecf0f1;
	width: 32%;
	height: 15px;
	position: absolute;
	top: -10px;
	right: 0px;
}
.dropdown-login h3 {
	margin-top: 0px;
	font-size: 24px;
	font-weight: 400;
	margin-bottom: 25px;
	text-transform: capitalize;
}
.dropdown-login hr {
	width: 100%;
	margin: 0px;
	border: none;
	padding: 0px;
	background: none;
	border-bottom: solid 1px #ebebeb;
}
.dropdown-login form img {
	display: block;
	margin: 0 auto;
	margin-top: -7px;
}
.dropdown-login form input[type="text"], .dropdown-login form input[type="password"], .dropdown-login form input[type="email"], .dropdown-login form input[type="tel"] {
	color: #666;
	width: 290px;
	height: 40px;
	display: block;
	margin: 0 auto;
	font-size: 14px;
	max-width: 100%;
	padding: 0px 9px;
	margin-top: 15px;
	font-weight: 400;
	border-radius: 3px;
	background: #f7f7f7;
	border: solid 1px #dfdfdf;
}
.dropdown-login form .text-gray, .dropdown-login form a {
	color: #717171;
	font-size: 12px;
	font-weight: 300;
	text-transform: none;
}
.dropdown-login form .remember label {
	top: 2px;
	margin-left: 5px;
	font-weight: 300;
	position: relative;
}
.dropdown-login form .remember {
	float: right;
	clear: both;
	margin: 25px 0px;
	text-transform: none;
}
.dropdown-login form span {
	color: #a6a6a6;
	display: inline-block;
	padding: 0px 12px 0px 5px;
}
.dropdown-login form a {
	color: #3398ce !important;
	display: inline !important;
	font-size: 13px !important;
	font-weight: 300 !important;
	text-transform: none !important;
}
.search-box {
	height: 32px;
	margin-top: 14px;
	border-right: solid 1px transparent;
}
.search-box.border-right {
	border-right: solid 1px #ebebeb;
}
.search-box input[type="text"] {
	display: none;
	height: 32px;
	z-index: 999;
	width: 230px;
	color: #909090;
	font-size: 12px;
	margin-top: 0px;
	padding: 0px 10px;
	position: absolute;
	margin-left: -220px;
	border-radius: 50px;
	border: solid 1px #ebebeb;
}
.search-box span.icon {
	right: 12px;
	padding: 1px;
	z-index: 9999;
	cursor: pointer;
	font-size: 14px;
	line-height: 32px;
	position: relative;
}
.search-box span.icon:hover, .search-box span.icon.open {
	color: #46a0d2;
}
/************************ Revolution Slider Styles ************************/

.main-slider .tp-banner-container img {
	width: inherit;
	margin: 0 auto;
}
.main-slider .tp-banner-container h1, .main-slider .tp-banner-container h2 {
	color: #FFF;
	text-transform: uppercase;
}
.main-slider .tp-banner-container h2 {
	margin-top: 10px;
}
.main-slider .tp-banner-container h1 {
	margin-bottom: 15px;
}
.main-slider .tp-banner-container p {
	width: 80%;
	color: #FFF;
	margin: 0 auto;
	display: block;
	font-size: 13.4px;
	line-height: 20px;
}
.main-slider .tp-banner .progress-section {
	width: 945px;
	height: 148px;
	display: none;
	margin: 0 auto;
	margin-top: 50px;
}
.main-slider .tp-banner .progress-section {
	margin-top: 0px;
}
.main-slider .tp-banner .progress-section ul {
	margin-top: 2px;
}
.main-slider .tp-banner .progress-section img.funder-img, .main-slider img.funder-img {
	width: 65px;
	height: 65px;
	z-index: 999;
	margin: 85px 85px;
	position: absolute;
	-moz-border-radius: 50px;
	-webkit-border-radius: 50px;
	border-radius: 50px;
}
.main-slider .tp-bannertimer {
	visibility: hidden !important;
}
.main-slider .btn {
	display: none;
}
.main-slider li {
	list-style: none;
}
/************************ Slider Styles Start ************************/

.style_h_1, .style_h_2, .style_p_1 {
	color: #FFF;
	font-family: 'Open Sans', sans-serif;
}
.style_h_1 {
	text-transform: uppercase;
	font-size: 45px;
	font-weight: 600;
}
.style_h_2 {
	text-transform: uppercase;
	font-size: 44px;
	font-weight: 300;
}
.style_p_1 {
	font-size: 13.4px;
	line-height: 20px;
}
/************************ Slider Styles End ************************/

.main-slider .progress-section ul {
	float: left;
	list-style: none;
	padding: 45px 0px;
	text-transform: uppercase;
	margin: 9px 0px 0px !important;
}
.main-slider .progress-section ul li {
	color: #3d3d3d;
	font-size: 26px;
	font-weight: 700;
	text-align: center;
	display: inline-block;
	margin: 0px 45px 0px 0px;
	padding: 0px 45px 0px 0px;
	border-right: solid 1px #e5e5e5;
}
.main-slider .progress-section ul li span {
	display: block;
	font-size: 14px;
	font-weight: 400;
	margin-top: 10px !important;
}
.main-slider .progress-section ul li.last {
	border-right: none;
}
.main-slider svg {
	background: url("assets/images/circle-fill-top.png") no-repeat center center;
}
.main-slider .pie_progress__number, .main-slider .pie_progress__label {
	color: #fffffb;
}
.tp-banner .pie_progress__number {
	font-size: 26px;
}
.slider-caption {
	padding-top: 65px;
	text-align: center;
}

/************************ Home page intro section ************************/

#intor-section {
	text-align: center;
}
#intor-section h3 {
	font-size: 27px;
	line-height: 38px;
}
#intor-section ul {
	list-style: none;
	padding-top: 50px;
	padding-left: 0px;
}
#intor-section ul li {
	width: 250px;
	color: #606060;
	font-size: 12px;
	line-height: 20px;
	min-height: 120px;
	vertical-align: top;
	display: inline-block;
}
#intor-section ul li strong {
	color: #2b2c2e;
	display: block;
	font-weight: 400;
	font-size: 19.5px;
	padding-top: 30px;
	padding-bottom: 10px;
	text-transform: uppercase;
}
#intor-section ul li.plus-icon {
	width: 80px;
	background: url("assets/images/plus.png") no-repeat center center;
}
#intro-section.about-section {
	text-align: left;
}

/************************ About Section on home-2.html ************************/

.about-section h3 {
	margin-bottom: 15px;
}
.about-section p {
	text-align: justify;
}
.about-section a.btn {
	margin-top: 15px;
	margin-right: 15px;
}
.about-section .video-container {
	float: right;
	margin-top: -50px;
	margin-left: 30px;
	position: relative;
}

.video-container:before {
	z-index: 99;
	opacity: 0.5;
	content: "";
	width: 100%;
	height: 100%;
	display: block;
	position: absolute;
	background: rgba(51, 152, 204, 0.2);
	transition: all 0.3s linear;
	-moz-transition: all 0.3s linear;
	-webkit-transition: all 0.3s linear;
	-o-transition: all 0.3s linear;
}
.video-container:after {
	top: 38%;
	left: 42%;
	z-index: 999;
	display: block;
	font-size: 62px;
	position: absolute;
	color: rgba(255, 255, 255, 0.8);
}
.video-container:hover:before {
	opacity: 1;
	background: rgba(51, 152, 204, 0.3);
}
span.intro-icon {
	width: 116px;
	height: 116px;
	display: block;
	margin: 0 auto;
	line-height: 116px;
	border-radius: 150px;
	border: solid 1px #DE5434;
}
span.intro-icon i {
	width: 114px;
	height: 114px;
	color: #DE5434;
	display: block;
	font-size: 48px;
	line-height: 114px;
	text-align: center;
}
#intor-section.about-section {
	text-align: left;
}

/************************ Popular Projects ************************/

#popular h3 {
	line-height: 32px;
	text-align: center;
	padding-bottom: 50px;
}
#popular .pie_progress__number, #popular .pie_progress__label {
	color: #504f4f;
}
#popular svg {
	background: url("assets/images/circle-fill.png") no-repeat center center;
}
.popular-data.larg svg {
	background: url("assets/images/circle-fill-larg.png") no-repeat center center !important;
}
.project-desc {
	height: 130px;
	overflow: hidden;
	position: relative;
}
.project-desc h5 {
	text-align:center;
}
.line-red, .line-yellow, .line-blue, .line-green {
	display:block;
	margin:0 auto;
	margin-top:10px;
	padding:0px !important;
}

.contact-sec .line-red, .contact-sec .line-yellow, .contact-sec .line-blue, .contact-sec .line-green {
	margin-bottom:10px;
}

.upcoming-events > div > div h4 span, .line-red, .line-yellow, .line-blue, .line-green {
	/*width:25%;*/
	width:70px;
	height:1px;
}

.line-blue {border-bottom:solid 1px #3298c9;}
.line-green {border-bottom:solid 1px #32cc98;}
.line-yellow {border-bottom:solid 1px #f2d031;}
.line-red {border-bottom:solid 1px #ef6342;}

#popular .popular-item, .team .team-item, .blog-page .blog-item {
	margin: 0 auto;
	max-width: 100%;
	min-height: 50px;
	margin-bottom: 45px;
	border: solid 1px #efefef;
	transition: all 0.3s linear;
	-moz-transition: all 0.3s linear;
	-webkit-transition: all 0.3s linear;
	-o-transition: all 0.3s linear;
}
#popular .popular-item:hover, .team .team-item:hover, .blog-page .blog-item:hover {
	border: solid 1px #DFDFDF;
}
.popular-content, .team .team-content, .blog-page .blog-content {
	margin: 15px;
	color: #606060;
	margin-top:25px;
}
.popular-item .project-image, .blog-post .post-image, .team-item .team-image, .blog-page .blog-item .blog-image {
	width: 100%;
	overflow: hidden;
	max-height: 165px;
	position: relative;
	vertical-align: middle;
}
.team-item .team-image {
	max-height: 500px;
}
.team-item .team-image img {
	width: 100%;
}
.blog-page .blog-item .blog-image {
	max-height: 500px;
}

/************************ Projects, Blog and Team Boxes ************************/

.main .popular-item {
	background:#FFF;
}

.popular-item .project-image img {
	width: 100%;
}
.popular-item .project-image:before, .blog-post .post-image:before, .team-item .team-image:before, .blog-page .blog-item .blog-image:before {
	z-index: 99;
	opacity: 0;
	content: "";
	width: 100%;
	height: 100%;
	display: block;
	position: absolute;
	background: rgba(51, 152, 204, 0.5);
	transition: all 0.3s linear;
	-moz-transition: all 0.3s linear;
	-webkit-transition: all 0.3s linear;
	-o-transition: all 0.3s linear;
}
.popular-item:hover .project-image:before, .blog-post:hover .post-image:before, .team-item:hover .team-image:before, .blog-page .blog-item:hover .blog-image:before {
	opacity: 1;
}
.popular-item .project-image a, .blog-post .post-image a, .blog-page .blog-item .blog-image a {
	top: -45%;
	left: 28%;
	color: #FFF;
	z-index: 999;
	opacity: 0.9;
	padding: 8px 20px;
	font-size: 12px;
	position: absolute;
	text-align: center;
	background: #3398CC;
	border-radius: 50px;
	vertical-align: middle;
	transition: all 0.3s linear;
	-moz-transition: all 0.3s linear;
	-webkit-transition: all 0.3s linear;
	-o-transition: all 0.3s linear;
	border: solid 1px transparent;
}
.popular-item .project-image a:hover, .blog-post .post-image a:hover, .blog-page .blog-image a:hover {
	border: solid 1px rgba(255,255,255,0.5);
}
.blog-post .post-image a, .blog-page .blog-item .blog-image a {
	left: 40%;
	top: -70px;
}
.popular-item:hover .project-image a {
	top: 38%;
}
.blog-post:hover .post-image a {
	top: 40%;
}
.blog-page .blog-item:hover .blog-image a {
	top: 45%;
	left: 40%;
}
/*-----------------*/

.popular-content h5, .team-content h5 {
	color: #606060;
	padding-bottom: 8px;
	text-transform: uppercase;
}
.blog-item h5 {
	padding-bottom: 0px;
}
.popular-content h5 a, .team-content h5 a {
	color: #606060;
}
.popular-content h5 span, .team-content h5 span {
	display: block;
	font-size: 12px;
	padding-top: 6px;
	font-weight: normal;
	text-transform: none;
}
.team-content h5 {
	text-align: center;
}
.team-content h5 span {
	padding-top: 10px;
}
.popular-content p, .team-content p {
	color: #606060;
	font-size: 12px;
	margin-top: 5px;
	text-align:center;
}
.popular-data, .popular-details {
	float: left;
	padding-top: 20px;
}
.popular-data img {
	width: 50px;
	height: 50px;
	z-index: 999;
	margin: 93px 0px;
	position: absolute;
	-moz-border-radius: 50px;
	-webkit-border-radius: 50px;
	border-radius: 50px;
}

.profile-name{
	float : left;
	margin: 25px 0px 5px 5px;
}
.profile-menu {
	float: left;
	margin: 25px 5px 5px 0px;
}
.profile-menu img {
	border-radius: 50px;
}
.popular-data.larg img {
	width: 65px;
	height: 65px;
	margin: 100px 0px;
}
.popular-details {
	width: 97px;
	padding-bottom: 5px;
}
.projects-page .popular-details {
	width: 90px;
}
.popular-details ul {
	list-style: none;
	padding-left: 15px;
}
.popular-details ul li {
	color: #8f8f8f;
	margin-bottom: 8px;
	padding-bottom: 8px;
	text-transform: uppercase;
	border-bottom: solid 1px #cecece;
}
.popular-details ul li strong {
	color: #606060;
	display: block;
}
.popular-details ul li:last-child {
	margin-bottom: 0px;
	padding-bottom: 0px;
	border-bottom: none;
}
.gray .popular-btn a {
	background: #F7F7F7;
}
.popular-btn a:hover {
	color: #FFF;
	background: #DE5434;
}
#popular .bx-viewport {
	left: 0px;
	border: none;
	box-shadow: none;
	background: none;
}
#popular > .bx-wrapper > .bx-viewport {
	height: auto !important;
}
#popular.style-2 h3 {
	text-align: left;
}
#popular.style-2 h4 {
	margin-top: 30px;
	margin-bottom: 15px;
	text-transform: capitalize;
}
section.white #popular.style-2 .row {
	background: #F7F7F7;
}
section.gray #popular.style-2 .row {
	background: #FFF;
}
#popular.style-2 > .project-slider-cnt > .row > .project-slider {
	overflow: hidden;
	padding-left: 0px;
	max-height: 450px;
}
#popular.style-2 .support-btn-cnt {
	width: 96.5%;
	margin-top: -60px;
	position: absolute;
	text-align: center;
}
#popular.style-2 .pslider-btn-cnt {
	width: auto;
	float: right;
	margin-top: 5px;
	margin-right: 1px;
	text-align: center;
	border-radius: 50px;
	display: inline-block;
}
#popular.style-2 .pslider-btn-cnt > span {
	float: left;
	width: 45px;
	height: 30px;
	color: #E2E0E0;
	font-size: 20px;
	margin-top: -1px;
	text-align: center;
	border: solid 1px #E2E0E0;
}
#popular.style-2 .pslider-btn-cnt span i {
	display: block;
	margin: 0 auto;
	margin-top: 4px;
}
#popular.style-2 .pslider-btn-cnt > span:first-child {
	border-right: none;
	border-top-left-radius: 50px;
	border-bottom-left-radius: 50px;
}
#popular.style-2 .pslider-btn-cnt > span:last-child {
	border-top-right-radius: 50px;
	border-bottom-right-radius: 50px;
}
#popular.style-2 .pslider-btn-cnt > span:hover {
	background: #3398CC;
	border: solid 1px #3398CC;
}
#popular.style-2 .pslider-btn-cnt > span a {
	color: #E2E0E0;
}
#popular.style-2 .pslider-btn-cnt > span a:hover {
	color: #FFF;
}
#popular.style-2 .project-details ul {
	width: 100%;
	float: left;
	margin: 0px;
	padding: 0px;
	list-style: none;
	white-space: nowrap;
}
#popular.style-2 .project-details ul li {
	font-size: 20px;
	font-weight: 600;
	margin: 5px 20px;
	padding-top: 7px;
	text-align: center;
	display: inline-block;
}
#popular.style-2 .project-details ul li span {
	display: block;
	font-size: 12px;
	font-weight: 400;
	padding-top: 5px;
	text-transform: uppercase;
}
.project-details {
	width: 76%;
	height: 75px;
	float: left;
	margin-top: 47px;
	text-align: center;
	margin-left: -9px;
	background: #fdfcfc;
}
.project-details span.side-left {
	width: 17px;
	height: 75px;
	float: left;
	margin-left: -17px;
	background: url("assets/images/project-slider-bg.png") no-repeat center center;
}
.project-slider-content {
	padding-bottom: 25px;
}

/************************ Event Section ************************/

.parallax {
	color: #FFF;
	overflow: hidden;
	min-height: 300px;
	text-align: center;
	background: url("assets/images/parallax.jpg") 50% 50%;
}

.upcoming-events > div > div {
	padding:30px 20px;
	border-radius:1px;
	background:rgba(255, 255, 255, 1);
}

.upcoming-events > div > div h4 {
	margin-bottom:15px;
	text-transform:uppercase;
}

.upcoming-events > div > div h4 span {
	margin:0 auto;
	display:block;
	margin-top:15px;
	border-bottom:solid 1px #34CC99;
}

.upcoming-events > div > div.green h4 span {border-bottom:solid 1px #34CC99;}
.upcoming-events > div > div.yellow h4 span {border-bottom:solid 1px #F2D031;}
.upcoming-events > div > div.red h4 span {border-bottom:solid 1px #EF6342;}

.upcoming-events p {
	color: #606060;
	font-size: 12px;
	font-weight: 400;
	line-height: 22px;
	margin-bottom: 0px;
}

.upcoming-events > div > div.green .time-countdown {background:#34CC99;}
.upcoming-events > div > div.yellow .time-countdown {background:#F2D031;}
.upcoming-events > div > div.red .time-countdown {background:#EF6342;}


.upcoming-events .time-countdown {
	font-weight: 300;
	letter-spacing: 1px;
	border-radius: 50px;
	display: inline-block;
	background: #3298C9;
	margin-top:25px;
	width:95%;
}

.upcoming-events .time-countdown span.countdown-section {
	padding: 5px 15px;
	display: inline-block;
	border-right: dashed 1px rgba(255,255,255,0.25);
}
.upcoming-events .time-countdown span.countdown-section:last-child {
	border-right: none;
}
.upcoming-events .time-countdown span.countdown-section span.countdown-amount {
	font-size: 20px;
	font-weight:400;
}
.upcoming-events .time-countdown span.sec {
	border-right: none;
}
.upcoming-events .time-countdown span span {
	display: block;
	font-size: 12px;
	font-weight: 300;
	border-right: none;
	text-transform:uppercase;
}

.upcoming-events .event-data {
	float: left;
	text-align: left;
	text-align: center;
}
.upcoming-events .event-data .event-data-inner {
	padding: 15px;
	background: rgba(255,255,255,0.03);
	border: solid 4px rgba(255,255,255,0.08);
}

.parallax.events h3 {
	margin-bottom:50px;
}

.parallax.events {
	padding-bottom:80px;
}

/************************ Blog Section ************************/

.blog-btn-cnt {
	width: auto;
	float: right;
	margin-top: 5px;
	margin-right: 1px;
	text-align: center;
	border-radius: 50px;
	display: inline-block;
}
.blog-btn-cnt span {
	float: left;
	width: 45px;
	height: 30px;
	color: #E2E0E0;
	font-size: 20px;
	margin-top: -1px;
	text-align: center;
	border: solid 1px #E2E0E0;
}
.blog-btn-cnt span:first-child {
	border-right: none;
	border-top-left-radius: 50px;
	border-bottom-left-radius: 50px;
}
.blog-btn-cnt span:last-child {
	border-top-right-radius: 50px;
	border-bottom-right-radius: 50px;
}
.blog-btn-cnt span a {
	color: #E2E0E0;
}
.blog-btn-cnt span a i {
	display: block;
	margin: 0 auto;
	margin-top: 4px;
}
.blog-btn-cnt span:hover {
	background: #3398CC;
	border: solid 1px #3398CC;
}
.blog-btn-cnt span:hover a {
	color: #FFF;
}
.blog-post {
	float: left;
	width: 33.333333333333%;
}
.blog-posts h3 {
	margin-bottom: 30px;
}
.blog-posts .col-lg-4 .post-cnt {
	border: solid 1px #efefef;
}
.blog-posts .col-lg-4 .post-cnt .post-data {
	padding: 10px;
}
.blog-posts .post-image {
	max-height: 150px;
}
.blog-post .post-image img {
	width: 100%;
}
.blog-post .post-image span i {
	padding: 10px;
	font-size: 18px;
}
.blog-post:hover .post-image span i {
	margin-top: 25%;
}
.blog-post .post-dtl {
	color: #989898;
	font-size: 11px;
	margin: 0px 0px 15px 0px;
}
.blog-post .post-dtl span:last-child {
	float: right;
}
.blog-post h5 {
	text-transform: capitalize;
	margin: 15px 0px 10px 0px;
}
.blog-post h5 a {
	color: #606060;
}
.blog-posts .bx-viewport {
	left: auto !important;
	border: none !important;
	box-shadow: none !important;
}
.blog-posts .blog-post.slide {
	margin: 0px 15px;
	padding-left: 0px;
	padding-right: 0px;
}
.blog-posts .bx-wrapper {
	width: 100% !important;
	max-width: 100% !important;
}

.blog-page h3 {
	padding-bottom: 50px;
    text-align: center;
}

.blog-item h5 a {
	display:block;
	text-align:center;
	margin-bottom:15px;
}

/************************ Our Backers Section ************************/

#ourbakers {
	text-align: center;
}
#ourbakers .bx-wrapper {
	width: 100%;
	max-width: 100% !important;
	margin-top: 50px !important;
}
#ourbakers .bx-wrapper .bx-viewport {
	border: none;
	box-shadow: none;
}
#ourbakers .bx-wrapper .slide {
	opacity: 1;
	padding: 10px 5px;
	border: solid 1px #F7F7F7;
	transition: all 0.3s linear;
	-moz-transition: all 0.3s linear;
	-webkit-transition: all 0.3s linear;
	-o-transition: all 0.3s linear;
}
#ourbakers .bx-wrapper .slide:hover {
	opacity: 1;
	background: #FCFCFC;
	border: solid 1px #F0F0F0;
}

/************************ Map Section ************************/

section.map-container {
	padding: 0px;
}
#projects-map, #contact-map {
	height: 450px;
	width: 100%;
	border-top: solid 1px #EAEAEA;
}
#projects-map div, div #contact-map {
}
.gm-style-iw {
	max-width: none !important;
	min-width: none !important;
	max-height: none !important;
	min-height: none !important;
	overflow-y: hidden !important;
	overflow-x: hidden !important;
	line-height: normal !important;
	padding: 5px !important;
}
#map-desc {
	width: 100%;
	position: absolute;
	text-align: center;
}
#map-desc h3 {
	top: 70px;
	color: #FFF;
	z-index: 999;
	font-size: 17px;
	display: inline;
	position: relative;
	white-space: nowrap;
	text-align: center;
	padding: 15px 50px;
	border-radius: 50px;
	background: #34CC99;
	transition: all 0.3s linear;
	-moz-transition: all 0.3s linear;
	-webkit-transition: all 0.3s linear;
	-o-transition: all 0.3s linear;
}
.map-container:hover #map-desc h3 {
	background: #34CC99;
}
.gm-style img {
	max-width: inherit !important;
}
.map-info {
	max-width: 300px;
	padding-top: 5px;
	padding-bottom: 2px;
}
.map-info img, .map-info div {
	float: left;
}
.map-info img {
	max-width: 135px !important;
}
.map-info div {
	color: #606060;
	max-width: 155px;
	padding-left: 10px;
	line-height: 18px;
}
.map-info div a {
	color: #319bcb;
	display: block;
}
.map-info div strong {
	color: #606060;
	text-transform: uppercase;
}
.map-info div.clear {
	float: none;
}

/************************ Send Idea Section ************************/

.moveup {
	margin-top: -25px;
	position: relative;
}

/************************ Carousel Section ************************/

.logo-carousels img {
	filter: none;
	-webkit-filter: grayscale(0%);
	-ms-filter: grayscale(0%);
	-o-filter: grayscale(0%);
	transition: all 0.3s linear;
	-moz-transition: all 0.3s linear;
	-webkit-transition: all 0.3s linear;
	-o-transition: all 0.3s linear;
}
.logo-carousels img:hover {
	filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale"); /* Firefox 3.5+ */
	filter: gray;
	-webkit-filter: grayscale(100%);
	-ms-filter: grayscale(100%);
	-o-filter: grayscale(100%);
}
.backers-avatar {
	padding-bottom: 0px;
}
.backers-avatar h3 {
	text-align: center;
	margin-bottom: 50px;
}
.backers-avatar ul {
	margin: 0px;
	padding: 0px;
	list-style: none;
}
.backers-avatar ul li {
	float: left;
	width: 7.69%;
	opacity: 0.2;
	cursor: pointer;
	transition: all 0.3s linear;
	-moz-transition: all 0.3s linear;
	-webkit-transition: all 0.3s linear;
	-o-transition: all 0.3s linear;
}
.backers-avatar ul li img {
	width: 100%;
	border: none;
	height: auto;
	max-width: 100%;
	vertical-align: middle;
	filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale"); /* Firefox 3.5+ */
	filter: gray;
	-webkit-filter: grayscale(100%);
	-ms-filter: grayscale(100%);
	-o-filter: grayscale(100%);
}
.backers-avatar ul li:hover {
	opacity: 1;
}
.backers-avatar ul li:hover img {
	filter: none;
	-webkit-filter: grayscale(0%);
	-ms-filter: grayscale(0%);
	-o-filter: grayscale(0%);
}
.send-us {
	color: #FFF;
	text-align: center;
	background: #3398cc;
}
.send-us h3 {
	color: #FFF;
	padding: 0px 15px;
	margin-bottom: 40px;
}

/************************ Footer Section ************************/

footer {
	color: #919191;
	font-size: 12px;
	font-weight: 300;
	background: #1B2937;
}
footer a, footer p {
	color: #919191;
}
footer a:hover {
	color: #3398CC;
}
footer .footer-links {
	padding-top: 60px;
	padding-bottom: 40px;
}
footer .footer-links h5 {
	color: #B2B2B2;
	text-transform: capitalize;
}
footer .footer-links ul {
	list-style: none;
	padding-top: 15px;
	padding-left: 0px;
}
footer .footer-links ul li a, footer .footer-links ul.contact-info li {
	line-height: 30px;
}
footer .footer-links ul.contact-info li {
	line-height: 20px;
	padding: 5px 0px;
}
footer .footer-links ul.contact-info li span, footer .footer-links ul.contact-info li i {
	display: inline-block;
}
footer .footer-links ul.contact-info li span {
	padding-left: 7px;
}
footer .footer-links ul.contact-info li i {
	position: relative;
	vertical-align: top;
	margin-top: 4px;
}
footer .footer-links .footer-about p {
	margin: 10px 0px;
	line-height: 25px;
	padding-right: 15px;
}
footer .footer-links .footer-about ul {
	margin: 0px;
	padding: 0px;
	list-style: none;
	padding-top: 0px !important;
}
footer .footer-links .footer-about ul li {
	width: 40px;
	height: 40px;
	padding-top: 6px;
	padding-left: 0px;
	text-align: center;
	border-radius: 50px;
	display: inline-block;
	border: solid 1px transparent;
	transition: all 0.3s linear;
	-moz-transition: all 0.3s linear;
	-webkit-transition: all 0.3s linear;
	-o-transition: all 0.3s linear;
}
footer .footer-links .footer-about ul li:hover {
	border: solid 1px #919191;
}
footer .footer-links .footer-about ul li i {
	position: relative;
	vertical-align: top;
}
footer .footer-links .footer-about ul li:hover i {
	color: #919191;
}
footer .copyrights {
	padding: 25px 0px;
	border-top: solid 1px #263647;
}
footer .copyrights .copyright-text {
	padding-top: 10px;
	padding-left: 0px;
}
footer .copyrights .newsletter {
	text-align: right;
}
footer .copyrights .newsletter form {
	margin-left: 15px;
	display: inline-block;
}
footer .copyrights .newsletter form input[type="text"], footer .copyrights .newsletter form input[type="email"] {
	width: 235px;
	height: 32px;
	color: #919191;
	font-size: 12px;
	background: none;
	font-weight: 300;
	padding: 0px 15px;
	border-radius: 50px;
	border: solid 1px #263647;
	font-family: 'Open Sans', sans-serif;
}
footer .copyrights .newsletter form input[type="submit"], footer .copyrights .newsletter form button[type="submit"] {
	border: none;
	height: 32px;
	color: #919191;
	padding: 0px 15px;
	background: #263647;
	margin-left: -43px;
	border-top-right-radius: 50px;
	border-bottom-right-radius: 50px;
	transition: all 0.3s linear;
	-moz-transition: all 0.3s linear;
	-webkit-transition: all 0.3s linear;
	-o-transition: all 0.3s linear;
}
footer .copyrights .newsletter form input[type="submit"]:hover, footer .copyrights .newsletter form button[type="submit"]:hover {
	color: #CFCFCF;
	background: #3398CC;
}

/************************ SubPages Styles ************************/

/************************ Header Bottom Section ************************/

.header-bottom {
	padding: 0px;
	overflow: hidden;
	min-height: 80px;
	text-align: center;
	position: relative;
	background: url("assets/images/header-bottom.jpg") 0% 0% fixed;
	background-size: 100%;
}
.header-bottom article {
	width: 100%;
	height: 100%;
	position: absolute;
	background: #DE5434;
}
.header-bottom h3, .header-bottom h1 {
	color: #FFF;
	font-weight: 300;
	margin-top: 20px;
	position: relative;
	text-align: center;
}
.header-bottom h3 {
	font-size: 32px;
}
.header-bottom h3 span {
	font-weight: 300;
}
.header-bottom h1 {
	font-size: 32px;
	font-weight: 300;
	margin-top: 20px;
}
.breadcrumb {
	margin: 0px;
	list-style: none;
	padding: 16px 0px;
	border-radius: 0px;
	background: #DE5444;
}
.breadcrumb .row {
	position: relative;
}
.breadcrumb ul {
	margin: 0px;
	padding: 0px;
}
.breadcrumb ul li {
	color: #FFF;
	margin-right: 5px;
	display: inline-block;
	text-transform: capitalize;
}
.breadcrumb ul li a {
	color: #FFF;
}
.breadcrumb ul li a:hover {
	color: #8dd6fb;
}
.breadcrumb .align-right {
	text-align: right;
}
.breadcrumb .align-right ul li:last-child {
	margin-right: 0px;
}
.breadcrumb .sub-menu ul li {
	padding-right: 8px;
	border-right: solid 1px rgba(255,255,255,0.2);
}
.breadcrumb .sub-menu ul li:last-child {
	border-right: 0px;
	padding-right: 0px;
}
.breadcrumb .sub-menu ul li a strong {
	font-weight: 600;
	text-transform: uppercase;
}
.skills h3, .skills p {
	text-align: center;
}
.skills p {
	margin: 20px 0px;
	margin-top:30px;
}
.skills .row {
	margin-top: 25px;
}
.skills .row > div {
	margin-top: 25px;
}
.gray.skills svg {
	background: url("assets/images/skills-bg.png") no-repeat center center;
}
.white.skills svg {
	background: url("assets/images/skills-bgw.png") no-repeat center center;
}
section.team {
	padding-bottom: 30px;
}
.team h3 {
	text-align: center;
	padding-bottom: 50px;
}
.team h5 {
	padding-bottom: 0px;
}
.team-item {
	background: #FEFEFE;
}
.team-item:hover {
	background: #F7F7F7;
}
.team-social {
	padding: 10px 0px 20px 0px;
}
.team-social ul {
	margin: 0px;
	padding: 0px;
	list-style: none;
	text-align: center;
}
.team-social ul li {
	display: inline;
	margin: 0px 3px;
}
.team-social ul li a {
	width: 33px;
	height: 33px;
	color: #e4e4e4;
	background: #FFF;
	line-height: 33px;
	border-radius: 50px;
	display: inline-block;
	border: solid 1px #e4e4e4;
}
.team-item:hover .team-social ul li.yt a {
	background: #ef6342;
}
.team-item:hover .team-social ul li.fb a {
	background: #4b6297;
}
.team-item:hover .team-social ul li.tw a {
	background: #3ca8de;
}
.team-item:hover .team-social ul li.ln a {
	background: #006699;
}
.team-item:hover .team-social ul li a {
	border: solid 1px transparent;
	color: #FFF;
}
.team-social ul li a i {
	font-size: 15px;
	margin-top: 9px;
}
.team-social ul li a:hover {
	color: #FFF;
	background: #3398CC;
	border: solid 1px transparent;
}

/************************ Animated Numbers ************************/

.facts-figures, .facts-figures h3 {
	color: #FFF;
}
.facts-figures {
	min-height: 50px;
	padding: 30px 0px 60px 0px;
}
.facts-figures ul {
	margin: 0px;
	padding: 0px;
	list-style: none;
}
.facts-figures ul li {
	width: 24%;
	font-size: 16px;
	display: inline-block;
	margin: 30px 0px 0px 0px;
}
.facts-figures ul li span {
	display: block;
	font-size: 38px;
	font-weight: 700;
	padding-bottom: 5px;
}

/************************ Projects Page ************************/

.projects-page .popular-item, .blog-page .blog-item {
	background: #FFF;
}
.sidebar-container {
	padding: 0px;
}
.sidebar {
	background: #FFF;
}
.sidebar-item .w-title {
	color: #FFF;
	font-size: 15px;
	font-weight: 600;
	padding: 10px 15px;
	background: #DE5434;/*border-bottom:solid 1px #F7F7F7;*/
}
.sidebar-item .w-content {
	padding: 15px;
}
.form-group input, .form-group select {
	border-radius: 7px;
	box-shadow: none;
	font-size: 12px;
	height: 40px;
	border-color: #ECECEC;
}
.form-group label {
	font-weight: normal;
	font-size: 12px;
	text-transform: capitalize;
}
.form-group label strong {
	font-weight: 400;
	font-size: 12px;
	color: #444;
}
.radio-cnt {
	margin-bottom: 5px;
}
.radio-cnt label {
	top: 2px;
	font-size: 12px;
	cursor: pointer;
	margin-top: 3px;
	position: relative;
	padding-left: 5px;
	margin-right: 5px;
	display: inline-block;
}
.radio-inputs {
	margin-top: -10px;
}
.sidebar-item button.submit-filters {
	float: right;
	margin-top: -35px;
	padding: 5px 25px 5px 25px;
}
.success-stories.w-content {
	padding-bottom: 5px;
}
.success-stories .ssimg {
	width: 100px;
	height: 100px;
	margin: 0 auto;
	overflow: hidden;
	text-align: center;
	border-radius: 50px;
}
.success-stories .ssimg img {
	max-width: 100px;
}
.success-stories h5 {
	text-align: center;
	margin: 20px 0px 8px 0px;
}
.success-stories i {
	color: #D9DCDF;
	margin-right: 10px;
}
.success-stories p {
	margin-top: -6px;
	text-align: center;
}
.popular-categories ul {
	margin: 0px;
	padding: 0px;
	list-style: none;
}
.popular-categories li {
	width: 49%;
	float: left;
	padding: 6.9px 0px;
}
.popular-categories li a {
	color: #606060;
}
.popular-categories li a:hover {
	color: #3398cc;
}
.popular-categories li a span {
	width: 25px;
	height: 25px;
	margin-right: 5px;
	text-align: center;
	border-radius: 50px;
	background: #F9F9F9;
	display: inline-block;
	transition: all 0.3s linear;
	-moz-transition: all 0.3s linear;
	-webkit-transition: all 0.3s linear;
	-o-transition: all 0.3s linear;
}
.popular-categories li a i {
	font-size: 12px;
	line-height: 25px;
}
.popular-categories li a:hover span {
	background: #3398cc;
}
.popular-categories li a:hover i {
	color: #FFF;
}
section.filter {
	display: none;
	padding: 25px 0px 25px 0px;
}
section.filter .form-group {
	float: left;
	margin-right: 15px;
	margin-bottom: 5px;
}
.filter .form-group label {
	cursor: pointer;
	line-height: 30px;
}
.filter .form-group .sbHolder, .filter .form-group input[type='text'], .filter .form-group select {
	width: 165px;
}
.filter .radio-inputs {
	padding-top: 9px;
}
.filter .radio-inputs .form-group label {
	top: 2px;
	margin: 0px 5px;
	position: relative;
}
.filter-title {
	top: 3px;
	padding: 5px;
	color: #8E8E8E;
	display: block;
	font-size: 18px;
	max-width: 130px;
	font-weight: 600;
	text-align: center;
	position: relative;
	background: #FDFDFD;
	border: solid 4px #F4F4F4;
}
#filter-toggle {
	cursor: pointer;
}
#filter-toggle strong {
	font-weight: 400;
	text-transform: capitalize;
}
#filter-toggle i {
	top: 2px;
	font-size: 15px;
	margin-right: 8px;
	position: relative;
}
.about-project > div[class^="col-lg"] > div {
	background: #FFF;
}
.pslider img {
	border: solid 0px #FFF;
}
.pcontent {
	padding: 15px 30px;
}
.pcontent .tabpanel {
	padding-top: 15px;
}
.pcontent .nav-tabs>li.active>a, .pcontent .nav-tabs>li.active>a:focus, .pcontent .nav-tabs>li.active>a:hover, .pcontent .nav-tabs>li>a {
	border: none;
	padding: 0px;
	color: #606060;
	font-size: 14px;
	background: none;
}
.pcontent .nav-tabs>li {
	margin: 0px 30px 10px 0px;
}
.pcontent .nav-tabs {
	border-bottom: solid 1px #f0f0f0;
}
.pcontent .nav-tabs:after {
	top: 3px;
	width: 38px;
	height: 5px;
	position: relative;
}
.nav-tabs>li.active>a {
	font-weight: 600;
}
.pcontent .tab-content {
	padding: 30px 0px 0px 0px;
}
.costs-detail ul {
	margin: 0px;
	padding: 0px;
	list-style: none;
}
.costs-detail ul li {
	font-size: 14px;
	margin: 10px 0px;
	letter-spacing: 0.3px;
}
.costs-detail ul li i {
	width: 40px;
	height: 40px;
	margin-right: 15px;
	display: inline-block;
	vertical-align: middle;
	border-radius: 5px;
}
.costs-detail ul li span, .cost-total span {
	float: right;
	font-weight: 600;
}
.cost-total span {
	font-weight: 700;
}
.cost-total span span {
	font-weight: 300;
	padding-left: 5px;
}
.cost-total {
	font-size: 18px;
	margin-top: 15px;
	padding: 15px 0px 20px 0px;
	border-top: solid 1px #f0f0f0;
}
.popular-item figure figcaption::before, .popular-item figure figcaption::after, .team-item figure figcaption::before, .team-item figure figcaption::after, .blog-post figure figcaption::before, .blog-post figure figcaption::after, .blog-item figure figcaption::before, .blog-item figure figcaption::after {
	position: absolute;
	top: 10px;
	right: 10px;
	bottom: 10px;
	left: 10px;
	content: '';
	opacity: 0;
	-webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
	transition: opacity 0.35s, transform 0.35s;
}
.popular-item figure figcaption::before, .team-item figure figcaption::before, .blog-post figure figcaption::before, .blog-item figure figcaption::before {
	border-top: 1px solid #fff;
	border-bottom: 1px solid #fff;
	-webkit-transform: scale(0, 1);
	transform: scale(0, 1);
}
.popular-item figure figcaption::after, .team-item figure figcaption::after, .blog-post figure figcaption::after, .blog-item figure figcaption::after {
	border-right: 1px solid #fff;
	border-left: 1px solid #fff;
	-webkit-transform: scale(1, 0);
	transform: scale(1, 0);
}
.popular-item:hover figure figcaption::before, .popular-item:hover figure figcaption::after, .team-item:hover figure figcaption::before, .team-item:hover figure figcaption::after, .blog-post:hover figure figcaption::before, .blog-post:hover figure figcaption::after, .blog-item:hover figure figcaption::before, .blog-item:hover figure figcaption::after {
	opacity: 1;
	-webkit-transform: scale(1);
	transform: scale(1);
}
.accordion .collapse.in .accordion-inner {
	margin-bottom: 15px;
	border-bottom: solid 1px #f0f0f0;
}
.accordion a.accordion-toggle {
	color: #606060;
	display: block;
	font-weight: 600;
	margin-bottom: 15px;
	padding-bottom: 15px;
	border-bottom: solid 1px #f0f0f0;
}
.accordion a.accordion-toggle span.updown-cion {
	float: right;
	width: 20px;
	height: 20px;
	background: url("assets/images/accordation-arrows.png") no-repeat center bottom;
}
.accordion a.accordion-toggle.collapsed span.updown-cion {
	background: url("assets/images/accordation-arrows.png") no-repeat center top;
}
.accordion .accordion-inner {
	padding-bottom: 15px;
}
i.q-circle {
	width: 22px;
	height: 22px;
	padding-top: 2px;
	text-align: center;
	border-radius: 50px;
	border: solid 1px #606060;
}
.tab-content i {
	margin-right: 7px;
}
.tab-content h5 {
	color: #606060;
	font-size: 17px;
	font-weight: 700;
	margin-bottom: 20px;
	padding-bottom: 15px;
	border-bottom: solid 1px #f0f0f0;
}
.about-project .bx-prev {
	opacity: 0;
	background: url("assets/images/prev.png") no-repeat center center;
}
.about-project .bx-next {
	opacity: 0;
	background: url("assets/images/next.png") no-repeat center center;
}
.about-project .bx-wrapper .bx-next:hover {
	background-position: center center;
}
.about-project .bx-wrapper:hover .bx-prev, .about-project .bx-wrapper:hover .bx-next {
	opacity: 1;
}
.tabpanel ul.nav-tabs li a i {
	color: #FFF;
	width: 25px;
	height: 25px;
	font-size: 11px;
	padding-top: 4px;
	margin-left: 5px;
	font-style: normal;
	text-align: center;
	font-weight: normal;
	border-radius: 50px;
	background: #9a9a9a;
	display: inline-block;
}
.data-single {
	float: none;
	width: 128px;
	margin: 0 auto;
	padding-bottom: 20px;
}
.sidebar-item .popular-details {
	width: 100%;
}
.sidebar-item .popular-details ul li {
	float: left;
	text-align: center;
	border-bottom: none;
	width: 33.333333333%;
	border-right: solid 1px #cecece;
}
.sidebar-item .popular-details ul li:last-child {
	border-right: none;
}
.sidebar-item .popular-details ul li strong {
	font-size: 18px;
}
.list-info:before {
	bottom: auto;
	border-color: transparent;
	margin-left: 35px;
	margin-top: -16px;
	border-top-color: #FFF;
	border-bottom-width: 0;
	content: "";
	border-width: 12px;
	position: absolute;
	display: block;
	width: 0;
	height: 0;
	border-style: solid;
	z-index: 99999;
}
.list-info:after {
	bottom: auto;
	border-color: transparent;
	margin-left: 34px;
	margin-top: -74px;
	border-top-color: #f0f0f0;
	border-bottom-width: 0;
	content: "";
	border-width: 13px;
	position: absolute;
	display: block;
	width: 0;
	height: 0;
	border-style: solid;
	z-index: 999;
}
.list-info {
	padding-top: 15px;
	border-top: solid 1px #f0f0f0;
}
.list-info img {
	width: 50px;
	float: right;
	height: 50px;
	border-radius: 50px;
}
.list-info p {
	color: #34CC99;
	font-weight: 600;
	text-transform: uppercase;
}
.list-info p span {
	color: #606060;
	display: block;
	font-weight: normal;
	text-transform: none;
}
.side-box {
	padding: 20px;
	background: #FBFBFB;
}
.side-box label strong {
	cursor: pointer;
	font-weight: 600;
}
.side-box input[type="text"] {
	height: 35px;
}
.find-project {
	padding: 20px 15px;
}
.find-project ul {
	padding: 0px;
	text-align: center;
}
.find-project ul li {
	margin: 0px 5px;
	list-style: none;
	display: inline-block;
}
.find-project ul li a {
	color: #FFF;
	width: 40px;
	height: 40px;
	display: block;
	font-size: 24px;
	line-height: 40px;
	border-radius: 50px;
}
.find-project ul li a:hover {
	opacity: 0.7;
}
.find-project ul li a.fb {
	background: #4B6297;
}
.find-project ul li a.tw {
	background: #3CA8DE;
}
.find-project ul li a.yt {
	background: #EF6342;
}
.find-project ul li a.wb {
	background: #656565;
}
.actionBox .form-group {
	width: 100%;
	margin: 15px 0px;
}
.actionBox .form-group input {
	height: 35px;
}
.actionBox .form-group input[type="text"] {
	width: 50%;
}
.actionBox .form-group textarea {
	font-size: 12px;
	box-shadow: none;
	padding: 12px 10px;
	border-radius: 0px;
	border-color: #ECECEC;
	max-width: 100%;
	height: 150px;
	width: 100%;
}
.actionBox .form-group button {
	width: 200px;
	height: 38px;
}
.taskDescription {
	margin-top: 10px 0;
}
.commentList {
	padding: 0;
	list-style: none;
}
.commentList li {
	margin: 0;
	margin: 15px 0px;
	padding: 0 !important;
	background: none !important;
}
.commentList li ul {
	list-style: none;
	border-bottom: solid 1px #F9F9F9;
}
.commentList li > div {
	display: table-cell;
}
.commenterImage {
	width: 35px;
	height: 100%;
	float: left;
	margin-top: 4px;
	margin-right: 10px;
}
.commenterImage img {
	width: 100%;
	border-radius: 50%;
}
.commentText p {
	margin: 0;
}
.sub-text {
	color: #aaa;
	font-family: verdana;
	font-size: 11px;
}
.videoWrapper {
	position: relative;
	padding-bottom: 53.25%; /* 16:9 */
	/*padding-bottom: 56.25%;  16:9 */ /* Actula style */
	padding-top: 25px;
	height: 0;
}
.videoWrapper iframe {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
iframe {
	border: none;
}
.pcontent figure, .videoWrapper {
	margin: 30px 0px;
}
.tab-pane p {
	margin: 20px 0px;
}
.commentText p {
	margin: 0px;
}
.pcontent ul, .faqpage ul, .ul-content ul {
	list-style: none;
	padding-left: 0px;
	margin-bottom: 15px;
}
.pcontent ul li, .faqpage ul li, .ul-content ul li {
	padding: 5px 20px;
	background: url("assets/images/blue-li.png") no-repeat center left;
}
.tabpanel > ul {
	margin-bottom: 0px;
}
.tabpanel > ul li, .pcontent ul.commentList li, .pcontent .costs-detail ul li {
	padding: 0px;
	background: none;
}
.perk-wrapper {
	padding: 15px;
}
.perk-wrapper ul {
	margin: 0px;
	padding: 0px;
	list-style: none;
}
.perk-wrapper ul li {
	background: #FBFBFB;
	margin-bottom: 15px;
	border: solid 1px transparent;
}
.perk-wrapper ul li:hover {
	border: solid 1px #ECECEC;
}
.perk-wrapper ul li:last-child {
	margin-bottom: 0px;
}
.perk-wrapper ul li.perk-disabled {
	opacity: 0.5;
}
.perk-wrapper ul li.perk-disabled:hover {
	border: solid 1px transparent;
}
.perk-wrapper ul li.perk-disabled a {
	cursor: default;
}
.perk-wrapper ul li a, .perk-wrapper ul li a:hover {
	color: #606060;
}
.perk-wrapper ul li a {
	display: block;
	padding: 20px 15px;
}
.perk-wrapper ul li a span {
	display: block;
}
.perk-price {
	float: left;
	font-size: 12px;
}
.perk-price strong {
	font-size: 20px;
	font-weight: 700;
}
.perk-type {
	float: right;
	color: #34CC99;
	font-weight: bold;
}
.perk-title {
	font-size: 16px;
	margin: 15px 0px;
	font-weight: 700;
}
.perk-txt {
	line-height: 22px;
	margin-bottom: 15px;
	padding-bottom: 15px;
	border-bottom: solid 1px #FFF;
}
.perk-claimed {
	font-weight: bold;
	padding-bottom: 5px;
}
.project-progress {
	padding: 10px 0px;
}
/* ************************ Start Project ************************ */

.start-project {
	background: #FFF;
}
.start-project .title {
	padding: 50px 15px;
	text-align: center;
}
.start-project .title ul {
	margin: 0px;
	padding: 0px;
	list-style: none;
}
.start-project .title ul li {
	width: 200px;
	display: inline-block;
}
.start-project .title ul li a {
	color: #606060;
	display: block;
	cursor: default;
	font-weight: 700;
	position: relative;
}
.start-project .title ul li a i {
	width: 50px;
	height: 50px;
	margin: 0 auto;
	display: block;
	color: #a9a9a9;
	font-size: 20px;
	line-height: 50px;
	text-align: center;
	border-radius: 50px;
	margin-bottom: 10px;
	background-color: #eaeaea;
	border: 1px solid #d9d9d9;
}
.start-project .title ul li.done a i {
	background-color: #3298C9;
	border: 1px solid transparent;
	color: #FFF;
}
.start-project .title ul li.current a i {
	background-color: #EF6342;
	border: 1px solid transparent;
	color: #FFF;
}
.start-project .title ul li a:before, .start-project .title ul li a:after {
	position: absolute;
	background-color: #eaeaea;
	top: 30%;
	left: -2px;
	width: 78px;
	height: 5px;
	border-top: 1px solid #d9d9d9;
	border-bottom: 1px solid #d9d9d9;
	content: '';
}
.start-project .title ul li a:after {
	left: 124px;
}
.start-project .title ul li:first-child a:before {
	width: 0px;
}
.start-project .title ul li:last-child a:after {
	width: 0px;
}
.start-project .title ul li.done a:before, .start-project .title ul li.done a:after {
	background-color: #3298C9;
	border-color: #3298C9;
}
.start-project .title ul li.current a:before, .start-project .title ul li.current a:after {
	background-color: #EF6342;
	border-color: #EF6342;
}
.start-content .form-wizard {
	display: none;
}
.start-content .form-wizard.active {
	display: block;
}
.start-project .start-content {
	padding: 20px 100px;
}

.start-project .start-content.register {
	padding: 20px 350px;
}
.start-content .form-group input, .start-content .form-group .sbHolder, .form-ui .form-group input {
	height: 40px;
}
.start-content .form-group .sbHolder a, .form-ui .form-group .sbHolder a {
	line-height: 35px;
	background-position: 0 -113px;
}
.start-content .form-group .form-left, .start-content .form-group .form-right, .form-ui .form-group .form-left, .form-ui .form-group .form-right {
	width: 48%;
	float: left;
}
.start-content textarea, .form-ui textarea {
	width: 100%;
	height: 150px;
	max-width: 100%;
	box-shadow: none;
	font-size: 12px;
	border-radius: 7px;
	border-color: #ECECEC;
	padding: 10px 15px;
	line-height: 25px;
}

/* ************************ Star Project Form ************************ */

.form-group {
	margin: 35px 0px;
}
.start-content .form-group .form-right, .form-ui .form-group .form-right {
	float: right;
}
.form-ui {
	display: block;
	padding: 5px;
}
.form-ui button.default {
	padding: 8px 50px;
}
.next-btn {
	margin: 30px 0px;
	text-align: right;
}
.next-btn button {
	margin-left: 15px;
	padding: 7px 40px !important;
}
.add-perk-btn {
	float: left;
	margin-left: 0px !important;
}
.moreperks {
	margin-top: 30px;
	padding-top: 25px;
	border-top: solid 1px #EF6342;
}
.select-gallery-type ul {
	margin: 0px;
	padding: 0px;
	list-style: none;
	text-align: center;
	margin-bottom: 30px;
}
.select-gallery-type ul li {
	width: 100px;
	height: 35px;
	cursor: pointer;
	line-height: 35px;
	text-align: center;
	background: #F7F7F7;
	display: inline-block;
	border: solid 1px #ECECEC;
}
.select-gallery-type ul li:first-child {
	border-top-left-radius: 50px;
	border-bottom-left-radius: 50px;
}
.select-gallery-type ul li:last-child {
	border-left: none;
	margin-left: -4px;
	border-top-right-radius: 50px;
	border-bottom-right-radius: 50px;
}
.select-gallery-type ul li.active {
	color: #FFF;
	background: #34CC99;
	border: solid 1px #34CC99;
}
.imgORvid {
	display: none;
}
#video-inputs {
	display: block;
}
.imageUploadBtn {
	color: #FFF;
	float: right;
	border: none;
	height: 35px;
	padding: 0px 15px;
	margin-top: -35px;
	background: #34CC99;
}
.selectimage {
	cursor: pointer;
	width: 100% !important;
}
.selectimage input[type="text"] {
	cursor: pointer;
}
.selectimage input[type="file"] {
	visibility: hidden;
	width: 1px;
	height: 1px;
}
.add-imgbtn {
	margin-top: 35px;
}

/* ************************ Blog Page ************************ */

.blog-page .blog-desc h5 {
	margin: 15px 0px;
	margin-top: 30px;
}
.blog-byDate ul {
	margin: 0px;
	padding: 0px;
	list-style: none;
}
.blog-byDate ul li {
	float: left;
	padding: 20px 5px;
	text-align: center;
	width: 33.33333333333333%;
	border: solid 1px #efefef;
	border-left: none;
	border-bottom: none;
}
.blog-byDate ul li:last-child {
	border-right: none;
}
.blog-byDate ul li i {
	margin-right: 5px;
}
.blog-single {
	background: #FFF;
	margin-right: 15px;
}
.blog-single .blog-byDate ul li {
	border-bottom: solid 1px #efefef;
}
.blog-description {
	padding: 30px;
	padding-top: 10px;
}
.blog-single h3 {
	color: #606060;
	margin: 15px 0px;
	padding-top: 8px;
	margin-bottom: -10px;
	text-transform: capitalize;
	text-align: left !important;
}
h6 {
	color: #606060;
	margin-top: 25px;
	font-size: 14px;
	font-weight: 700;
	margin-bottom: 20px;
	padding-bottom: 15px;
	border-bottom: solid 1px #f0f0f0;
}

/* ************************ FAQ ************************ */

.accordion-heading a {
	font-size:13px;
}

.faqpage {
	background: #FFF;
}
.faqpage .accordion a.accordion-toggle, .faqpage .accordion-inner {
	padding: 25px;
}
.faqpage .accordion a.accordion-toggle {
	margin-bottom: 0px;
	transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	-webkit-transition: all 0.1s linear;
	-o-transition: all 0.1s linear;
}
.faqpage .accordion .collapse.in .accordion-inner {
	margin-bottom: 0px;
}
.faqpage .accordion a.accordion-toggle, .faqpage .accordion a.accordion-toggle.collapsed:hover {
	background: #FCFCFC;
}
.faqpage .accordion a.accordion-toggle.collapsed {
	background: #FFF;
}
ul.popular-cat-widget, ul.popular-posts-widget {
	margin: 0px;
	padding: 0px;
	list-style: none;
}
ul.popular-cat-widget li {
	width: 48%;
	padding: 5px;
	padding-left: 15px;
	display: inline-block;
	background: url("assets/images/blue-li.png") no-repeat center left;
}
ul.popular-posts-widget {
	margin: 10px 0px;
}
ul.popular-posts-widget li {
	display: block;
	margin-bottom: 30px;
	line-height: 20px;
}
ul.popular-posts-widget li img {
	float: left;
	width: 85px;
	margin-right: 12px;
}
ul.popular-posts-widget li:last-child {
	margin-bottom: 0px;
}
ul.popular-posts-widget li a {
	color: #606060;
	font-size: 12px;
	font-weight: 600;
}
ul.popular-posts-widget li span {
	display: block;
	margin-top: 5px;
	font-size: 11px;
	font-weight: normal;
}
.contactpage h3 {
	margin-bottom:10px;
}
.contactpage h3, .contactpage p, .contact-sec {
	text-align: center;
}
.contactpage p {
	margin: 20px;
}
.contactpage i.green {color:#32cc98;}
.contactpage i.yellow {color:#f2d031;}
.contactpage i.red {color:#ef6342;}
.contact-sec {
	margin: 30px 0px;
	line-height: 25px;
	margin-bottom: 0px;
}
.contact-sec i {
	display: block;
	font-size: 30px;
	margin-bottom: 15px;
}
.contactpage form .form-group:last-child {
	margin-bottom:0px;
}
.image-fld-add {
	margin-top: 30px;
}
.single-page {
	padding: 30px 15px;
}
.single-page h3 {
	margin-bottom: 20px;
}
.center {
	text-align: center;
}
.spacer {
	height: 50px;
}
.spacer2 {
	height: 30px;
}
.center .facts-figures {
	padding-bottom: 0px;
}
.parallax h3 {
	color: #FFF;
}
.button-styles button {
	margin: 0px 5px;
}
.sidebar-item .form-group {
	margin: 0 auto;
	margin-bottom: 15px;
}
.sidebar-item .form-group.radio-cnt {
	margin-bottom: 5px;
}
section.filter .form-group {
	margin-top: 0px;
	margin-bottom: 0px;
}

.alert.hide {
	display:none;
}


/* ************************ 404 Page ************************ */

.image-bg {
	background:url("assets/images/parallax.jpg") no-repeat center center;
	background-size:cover;
}

.page-404 {
	padding:80px 15px;
	text-align:center;
}

.page-404 img {
	margin-bottom:30px;
}

.page-404 p {
	color:#DE5434;
	font-size:24px;
	line-height:30px;
	text-transform:uppercase;
}

.page-404 p span {
	display:block;
	font-size:13px;
	text-transform:none;
}

