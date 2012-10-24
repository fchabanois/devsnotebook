<? include('gzip-css.php'); ?>
/*
# -- BEGIN LICENSE BLOCK ----------------------------------
#
# This file is part of Dotclear 2.
#
# Copyright (c) 2003-2008 Olivier Meunier and contributors
# Licensed under the GPL version 2.0 license.
# See LICENSE file or
# http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
#
# Theme Name: Giacomo
# Version: 1.2
# Author: Kozlika - http://www.kozlika.org/
#
# -- END LICENSE BLOCK ------------------------------------
*/

/*
@import "custom.css";
*/

body {
	margin: 0;
	padding: 0;
	font-family: "Lucida grande",Verdana,Lucida,Helvetica,sans-serif;
	font-size: 84%;
	color: #111;
	background: #fff url(images/notebook2.jpg) no-repeat;    
}

p {
	margin: 1em 0;
}

img {
	border: none;
	margin: 0;
}

form {
	display: block;
	margin: 0;
	padding: 0;
}

h1 {
	font-size: 2.33em;
	margin: 0.67em 0;
	font-style: italic;
}

h2 {
	font-size: 1.5em;
	margin: 0.83em 0;
}

h3 {
	font-size: 1.17em;
	margin: 1em 0;
}

h4 {
	font-size: 1em;
	margin: 1.33em 0;
}

h5 {
	font-size: 0.83em;
	margin: 1.67em 0;
}

h6 {
	font-size: 0.67em;
	margin: 2.33em 0;
}

h1, h2 {
	font-family: Georgia,"Times New Roman","New York",serif;
}

h3, h4, h5, h6 {
	font-family: "Lucida grande",Verdana,Lucida,Helvetica,sans-serif;
	font-weight: bold;
	color: #666;
	margin-top: 2em;
}

code, pre {
	font-family: "Courier New",monospace;
	font-size: 1.1em;
	background: #f7f7f7;
}

pre {
	margin: 0 auto;
	margin-bottom: 1em;
	padding: 0.5em;
	text-align: left;
	white-space: normal;
	/* cach√© pour IE 5 Mac qui sait pas faire \*/
		white-space: pre;
		width: 90%;
		overflow: auto;
	/* End hack */
}

q { /* citations */
    font-style: italic;
	background: #f1f1f1;
	padding: 0 4px;
}

cite {
	font-style: italic;
}

blockquote {
	background: #f1f1f1;
	margin: 1em 1em 1em 2em;
	padding: 1em 2em 0.33em 1em;
	border-left: 3px solid #ddd;
}

a {
	color: maroon;
	text-decoration: none;
}

a:hover {
	color: #B8860B;
	text-decoration: underline;
}

#main a:link, #main a:visited {
	color: #B8860B;
}

#main .post-info a, #main .post-tags a, #main .post-info-co a {
	color: maroon;
}

#main a:hover {
	color: maroon;
}

#main a:active {
	font-weight: bold;
}

#main a:focus {
	text-decoration: underline;
}

#top a {
	background: transparent;
	text-decoration: none;
	font-weight: normal;
}

#top a:hover, #main .post-title a:hover {
	color: maroon;
}

a[hreflang]:after {
	content: "\0000a0[" attr(hreflang) "]";
	color: #CED6D9;
	background: transparent;
}

acronym, abbr {
	border-bottom: 1px dotted #999;
	cursor: help;
}

.footnotes {
	font-size: 0.9em;
	color: #666;
	border-top: 1px dashed #999;
	border-bottom: 1px dashed #999;
}

.footnotes h4 {
	margin: 0.5em 0;
}

ul {
	position: relative;
	/* pour eviter la disparition d'image aleatoire 
	au survol des liens */
}


/* Structure
-------------------------------------------------------- */

#page {
	width: 100%;
	background: transparent;
}

/* Prelude
-------------------------------------------------------- */

#prelude {
	position: absolute;
	top: 0;
	left: 17em;
	padding: 0;
	font-size: 0.85em;
}

/* Les trois lignes suivantes √† supprimer si vous souhaitez 
que le prelude soit visible */
#prelude, #prelude a {
	color: #fff;
}

/* Titre
-------------------------------------------------------- */

#top {
	background: transparent;
	font-family: Georgia,"Times New Roman","New York",serif;
	padding-left: 19em;
	text-align: left;
	height: 86px;
}

#top h1 {
	margin: 0;
	padding: 1em 1px;
	line-height: 2em;
}

/* conteneur des trois colonnes
------------------------------------------------------------------------ */

#wrapper {
	margin: 0;
	padding: 0;
}

/* Centre (partie des billets)
-------------------------------------------------------- */

#main {
	display: inline;
	float: left;
	width: 100%;
	margin: 0;
	padding: 0;
}

#content {
	font-family: Georgia,"Times New Roman","New York",serif;
	line-height: 140%;
	border-left: 1px dashed #ada095;
	margin: 0 16em;
	padding: 0 2em;
}

/* Calage des sidebar
-------------------------------------------------------- */

#sidebar {
	font-size: 0.86em;
	color: #333;
	width: 15em;
	float: left;
	margin: 0 0 0 -16em;
}

#sidebar div {
	margin: 0;
	padding: 0;
}

#blognav {
	margin-top: 2em;
}
#blogextra {
	width: 15em;
	position: absolute;
	top: 160px;
	left: 1em;
	text-align: right
}

/* content
-------------------------------------------------------------- */

#content-info, #content-info h2 {
	color: maroon;
	font-family: "Lucida grande",Verdana,Lucida,Helvetica,sans-serif;
	margin: 2em 0 0 0;
	padding: 0;
}

#content-info {
	font-size: 0.84em;
}

.day-date {
	padding-bottom: 4px;
	font-family: "Lucida grande",Verdana,Lucida,Helvetica,sans-serif;
	font-size: 1em;
	text-align: right;
	color: #ada095;
	border-top: 1px solid #933522;
	margin-top: 0;
	text-transform: lowercase;
}

.post {
	margin-top: 2em;
	padding-bottom: 1.5em;
}

.post-title {
	font-weight: normal;
	font-size: 1.4em;
	padding-left: 12px;
	margin: 0;
	color: #933522;

        /* ALBATOR
        ancienne version :
                background: transparent url(images/ico_entry.png) no-repeat 0 40%; */
        background-color: transparent;
        background-image: url("images/sprite.png");
        background-repeat: no-repeat;
        background-attachment: 0;
        background-position: -112px -41px;
/*        background-size: 8px 11px; Áa tombe en marche car c'est la derniere image... Mais avec, c'est tout cassÈ... */
}

.post-excerpt {
	margin-top: 1.33em;
}

.post-content {
	text-align: justify;
	margin-top: 1.33em;
}

.post-content p {
	margin-top: 0.66em;
	line-height: 120%;
}

.post-info {
	margin-bottom: 0;
	margin-top: .5em;
	color: #888;
}

.comment_count, .ping_count {
        /*              ALBATOR
	background: transparent url(images/ico_comments.png) no-repeat 0 40%;
	margin-top: 0;
	padding: 0 13px;
	*/
	background-color: transparent;
	background-image: url(images/sprite.png);
	background-repeat: no-repeat;
	background-attachment: 0;
/*	background-position: 40%;
	background-size: 10px 10px;                 */
        background-position: -112px -0px;

	margin-top: 0;
	padding: 0 13px;
}

.post blockquote {
	font-family: Tahoma, "Lucida Grande", "Trebuchet MS", sans-serif;
	margin: 2em;
	padding: 3px 2em;

	/* ALBATOR ancienne version sans sprite */
	background: #f5f5f5 url(images/quote.gif) no-repeat 4px 4px; 
/*
	background-color: #f5f5f5;
	background-image: url(images/sprite.png);
	background-repeat: no-repeat;
	background-attachment: 4px;
	background-position: -0px -0px;
	background-width:0px;
*/
}

.post blockquote p {
	margin-top: 1em;
}

.post-info-co span {
	background: transparent url(images/ico_tb.png) no-repeat 100% 40%;
	padding: 0 15px 0 0;
}

.post ul, .post ul li, .content-inner ul, .content-inner ul li {
	list-style: none;
	padding-left: 1em;
	margin: 0 0 0 0;
}

.post ul li {
	display: block;
	background: transparent url(images/ul.gif) no-repeat 0 4px;
	padding-left: 14px;
}

.post ul ul li {
	display: block;
	padding-left: 9px;
	background: transparent url(images/ulul.png) no-repeat 0 4px;

	/* ALBATOR */
        /* ancienne version 	background: transparent url(images/ulul.png) no-repeat 0 4px;
	background-color: transparent;
        background-image: url("images/sprite.png");
        background-repeat: no-repeat;
        background-attachment: 0;
        background-position: -112px -41px;
        */
}


ul.post-tags {
	padding-left: 0;
}

ul.post-tags li {
	display: inline;
	padding-left: 9px;
	padding-right: 14px;

	/* ALBATOR */
        /* ancienne version 	background: transparent url(images/ulul.png) no-repeat 0 4px; */
	background-color: transparent;
        background-image: url("images/sprite.png");
        background-repeat: no-repeat;
        background-attachment: 0;
        background-position: -112px -63px;
}

/* --------------------------------------------------------------------
	COMMENTAIRES
----------------------------------------------------------------------- */

#pings, #comments, #pr, #comment-form {
	margin: 0;
	font-family: "Lucida grande",Verdana,Lucida,Helvetica,sans-serif;
	font-size: 0.9em;
}

#comments .me {
	font-family: Georgia, "times new roman", serif;
	color: #333;
}

#comments dd.me {
	font-size: 1.1em;
}

#pings h3, #comments h3, #pr h3, #comment-form h3, #comments-feed {
	border-top: 1px solid #933522;
	font-size: 1em;
	margin: 2em 0 1em 0;
}

#pings dd, #comments dd, #pr dd {
	margin: 0 0 1em 2em;
	padding: 1px 1em;
	font-style: normal;
	color: #666;
}

#pings dt, #comments dt {
	margin: 0;
	padding: 0 0 0 18px;
}

#pings dt {
	background-image: url(images/ico_tb.png);
	background-position: 4px 60%;
	background-repeat: no-repeat;
}

#comments dt {
        /* ALBATOR */
        background-position: -112px -0px;
        background-image: url(images/sprite.png);
	background-repeat: no-repeat;

        /* version originale
	background-image: url(images/ico_comments.png);
	background-position: 4px 60%;
	background-repeat: no-repeat;
        */
}

.comment-number {
	font-family: Georgia,"Times New Roman","New York",serif;
	font-size: 1.8em;
}

.comment-number a {
	text-decoration: none;
}

#comments-feed {
	margin: 2em 0 1em 0;
	text-align: center;
	background: #933522;
	padding: 2px;
}

#comments-feed a:link {
	color: #fff;
	font-weight: bold;
	text-decoration: underline;
}

/* Error messages
-------------------------------------------------------- */

.error {
	border: 1px solid #c00;
	background: #fee;
	padding: 0.5em;
}

.error ul {
	padding-left: 20px;
}

.error li {
	list-style: square;
}

/* -------------------------------------------------------
	COLONNES LATERALES
---------------------------------------------------------- */

#sidebar a {
	text-decoration: none;
}

#sidebar h2 {
	font-weight: normal;
	color: #999;
	margin-top: 2em;
	font-size: 1.25em;
	background: #e6e6e6;
	-moz-border-radius: 3px;
	padding: 1px 6px;
}

#blognav h3, #blogextra h3 {
	font-size: 1.15em;
	color: #999;
	font-weight: normal;
	margin-bottom: 0.5em;
	margin-top: .66em;
}

/* Menu gauche
----------------------------------------------------------------- */

#blogextra ul {
	padding-left: 0;
	margin: 0 0 0 0;
	list-style: none;
}

#blogextra li {
	display: block;
	margin-top: 0.15em;
	padding-right: 15px;
/*	color: #e2d6ad;  plouf*/
        color: maroon;
        background: transparent url(images/fleche.png) no-repeat right 0.25em;
/*
        background-size: 10px 9px;
	background-color: transparent;
        background-image:url(images/sprite.png);
        background-attachment: right;
        background-repeat: no-repeat;
        background-position: -112px -21px;
        width: 10px;
        height: 9px;

 */
}

/* Menu droit
-------------------------------------------------------- */

#blognav ul {
	padding-left: 0;
	margin: 0 0 0 0;
	list-style: none;
}

#blognav li {
	display: block;
	margin-top: 0.15em;
	padding-left: 15px;
	color: #e2d6ad;
	background: transparent url(images/fleche.png) no-repeat 0 0.25em;
}

#topnav {
	font-size: 1.33em;
}

#topnav span {
	display: none;
}

/* Search form */

#sidebar #search {
	margin-bottom: 1.5em;
}

/* Footer
-------------------------------------------------------- */

#footer {
	clear: both;
	font-size: 0.9em;
	border-top: 1px solid #999;
	margin: 0 0 1em 0;
	padding: 0 2em;
	color: #666;
	text-align: right;
	line-height: 100%;
}

/* Error messages
-------------------------------------------------------- */

.error {
	border: 1px solid #c00;
	background: #fee;
	padding: 0.5em;
}

.error ul {
	padding-left: 20px;
}

.error li {
	list-style: square;
}

/* Formulaires
-------------------------------------------------------- */

fieldset {
	display: block;
	border: none;
	margin: 0;
	padding: 0;
}

input, textarea {
	font-family: Verdana,Arial,Geneva,Helvetica,sans-serif;
	font-size: 1em;
	border-width: 1px;
	border-color: #ccc;
}

input[type], textarea[name] {
	background: #f1f0ed;
}

input[type=submit], input[type=reset] {
	background: #ccc;
	color: #000;
}

input[type=submit]:hover {
	background: #598F9A;
	color: #fff;
}

textarea {
	width: 95%;
}

p.field {
	margin: 0.5em 0 0 0;
}

p.field label {
	display: block;
	font-weight: bold;
	font-size: 0.85em;
}

/* ---------------------------------------------------
    PAGES SPECIFIQUES
--------------------------------------------------- */

.dc-archive-month .day-date {
	text-align: left;
	margin: 1em 0 0 0;
}

.dc-archive-month .post-title {
	margin: .5em 0 0 0;
}

.dc-tags #main {
	margin-right: -1em;
}

.content-inner {
	padding: 3em;
	margin: 0;
}




ul.tags {
	font-size: 1.2em;
	line-height: 200%;
	margin: 0;
	padding: 0;
	text-align: left;
}

ul.tags li {
	margin: 0;
	padding: 0;
	display: inline;
}

ul.tags .tag0 {
	font-size: 90%;
}

ul.tags .tag10 {
	font-size: 95%;
}

ul.tags .tag30 {
	font-size: 105%;
}

ul.tags .tag40 {
	font-size: 110%;
}

ul.tags .tag50 {
	font-size: 120%;
}

ul.tags .tag60 {
	font-size: 125%;
}

ul.tags .tag70 {
	font-size: 130%;
}

ul.tags .tag80 {
	font-size: 135%;
}

ul.tags .tag90 {
	font-size: 140%;
}

ul.tags .tag100 {
	font-size: 150%;
}

/* ---------------------------------------------------
    NE PAS OUBLIER
--------------------------------------------------- */

/* les clearers */
.post, .post-excerpt, .post-content, .footnotes, .attachments, .post-info-co, #comments {
	clear: both;
}

/* un peu de m√©nage */
#wrapper:after {
	content: '[DO NOT LEAVE IT IS NOT REAL]';
	display: block;
	height: 0;
	clear: both;
	visibility: hidden;
}
#wrapper {
	display: inline-block;
}
/*\*/
* html #wrapper {
	height: 1%;
}
#wrapper {
	display: block;
}
/* */

/*
* ALBATOR : ancien custom.css
*/
/* ajoutez dans ce fichier vos personnalisations */


/* Calendrier
-------------------------------------------------------- */
#calendar {
}

#calendar h2 {
}

#calendar table {
	border-collapse : collapse;
	font-size : .9em;
	text-align:center;
	margin : 0;
	padding:0;
}

#calendar caption {
	margin : 0 auto;
	padding : 0 0 0.3em 0;
	font-size : 1.2em;
}

#calendar abbr {
	border : none;
}

#calendar th, .cal td {
	border : none;
	padding : 1px;
}
#calendar td {
	text-align : center;
}
#calendar td a {
	text-decoration : underline;
	}
#calendar td.active a {
	font-weight : bold;
	color : #933522;
}

/* 
* NUAGE DE TAGS 
*      VU SUR http://tips.dotaddict.org/fiche/Creer-un-nuage-de-tags
*/


#sidebar .tags ul { list-style-type : none;
}
.dc-tags ul.tags, #sidebar .tags ul, .dc-tags ul.tags li , #sidebar .tags ul  li { margin:0; padding:0; }
.dc-tags ul.tags li, #sidebar .tags ul li { display : inline; }
#sidebar .tags ul li a { padding-left:16px; }

.tags ul .tag0 {
	font-size: 80%;
}

.tags ul .tag10 {
	font-size: 90%;
}

.tags ul .tag30 {
	font-size: 100%;
}

.tags ul .tag40 {
	font-size: 110%;
}

.tags ul .tag50 {
	font-size: 120%;
}

.tags ul .tag60 {
	font-size: 130%;
}

.tags ul .tag70 {
	font-size: 140%;
}

.tags ul .tag80 {
	font-size: 150%;
}

.tags ul .tag90 {
	font-size: 160%;
}

.tags ul .tag100 {
	font-size: 170%;
}
/*
* date sous forme calendrier, 
        forme prise ici : http://open-time.net/post/2005/10/23/316-date-des-billets-facon-ical
        adaptation dc2 : http://open-time.net/post/2006/09/18/668-date-des-billets-facon-freshy
*/

.date { /* date */
        font-family: "Century Gothic", Verdana, Arial, Helvetica, sans-serif;
	border: 1px solid #A6A6A6;
	text-align: center;
	width: 70px;
	float: right;
	margin: 0 10px 5px 0;
        -moz-box-shadow: 5px 5px 5px #888;
        -webkit-box-shadow: 5px 5px 5px #888;
        box-shadow: 5px 5px 5px #888;
        border-radius: 5px;
        -moz-border-radius: 5px;

}

.date .date_day_name { /* jour */
	background-color: #AA3511;
	border-bottom: 1px solid #A6A6A6;
	color: #FFFFFF;
	font-size: smaller;
	font-weight: bolder;
	width: 100%;

}
.date .date_day_num { /* jour */
/*	border-bottom: 1px solid #A6A6A6; */
	font-size: xx-large;
	font-weight: bold;
	width: 100%;
        padding-top:3px;


}

.date .date_month { /* mois */
font-size: small       ;
	width: 100%;
	padding-top:3px;
	padding-bottom:2px;

}

/* ALBATOR news.google.fr pour twitter */
.icon-fc {
    background-image: url("http://www.gstatic.com/news/img/3845041549-news-icons-fc.png");
}
.share-icon-twitter {
    background-position: -16px -1px;
    height: 14px;
    width: 21px;
}
.nsg .nsg-share-bar-table .share-button {
    opacity: 0.4;
}
.nsg .nsg-share-bar-table .hover .share-button {
    opacity: 0.9999;
}

/* Pour les tablettes, on masque les menus */
@media screen and (min-width: 501px) and (max-width: 800px) {
  #blogextra {
    display:none;
  }
  #sidebar {
    display:none;
  }
  #content {
    margin: 0;
  }
}
/* Pour les mobiles, on masque les menus */
@media screen and (min-width: 100px) and (max-width: 500px)  {
  #blogextra {
    display:none;
  }
  #sidebar {
    display:none;
  }
  #content {
    margin: 0 1em;
  }
}

/* Sprites ALBATOR */
.sprite {
    background: url(images/sprite.png) no-repeat;
}
.sprite-rss-png{
    background: url(images/sprite.png) no-repeat;
    display:inline-block;
    width: 30px;
    height: 30px;
    background-position: -71px -41px;
}
.sprite-rss_comment-png {
    background: url(images/sprite.png) no-repeat;
    display:inline-block;
    width: 30px;
    height: 30px;
    background-position: -71px -0px;
}
/*

FIN CUSTOM.CSS
*/