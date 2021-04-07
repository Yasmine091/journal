<?php
    header("Content-type: text/css; charset: UTF-8");
    require ('../core/config.php');
?>

/* Esto es para añadir fuentes descargadas :)
@font-face {
    font-family: 'Nombre';
    src: url('carpeta/archivo.eot');
    src: url('carpeta/archivo.ttf');
    src: url('carpeta/archivo.woff');
    src: url('carpeta/archivo.svg');
}
*/

/* cabeza de página */

#header-bg {
    border: 2px solid <?php echo $wbcnf['lay-color'] ?>;/* original color #69efaf */
    background-image: url(<?php echo $wbcnf['header-bg'] ?>); /* original bg https://wallpaperplay.com/walls/full/f/0/5/121414.jpg */
    height: 250px;
    width: auto;
    background-position: center;
    background-size: cover;
    background-clip: border-box;
    border-top-right-radius: 5px;
    border-top-left-radius: 5px;
    border-bottom-style: none;
    text-align: center;
    color: #fff;
    font-size: xx-large;
    line-height: 250px;
    /*max-width: 1080px;
    width: auto;*/
}

/* navegación */

#navbar {
    background-color: <?php echo $wbcnf['lay-color'] ?>;
    border: 2px solid <?php echo $wbcnf['lay-color'] ?>;;
    border-bottom-right-radius: 5px;
    border-bottom-left-radius: 5px;
    /*max-width: 1080px;
    width: auto;*/
    margin-bottom: 50px !important;
    margin: auto;
    box-shadow: 0px 5px 0px 0px #ffffff7a inset;
    /*! line-height: 15px; */
}

/* #menu {

} */

#menu li {
    list-style-type: none;
    display: inline-block;
    padding: 0px 10px 0px 10px;
}

#menu li:hover {
    color: #000000c0;
    display: inline-block;
}

/* cuerpo */

@font-face {
    font-family: 'bahnschrift';
    src: url('fonts/BAHNSCHRIFT.TTF');
}

body {
    font-family: bahnschrift !important;
    background-color: #303030 !important;
    /*background-image: url(https://wallpaperplay.com/walls/full/8/e/2/121471.jpg);
    background-attachment: fixed;
    background-size: cover;*/
}

#body {
    
    max-width: 1080px;
    display: flex;
    margin: auto;
}

a {
    text-decoration: none;
    color: inherit;
    cursor: pointer;
}

a:hover {
    text-decoration: none;
    color: inherit;
    cursor: pointer;
    opacity: 0.75;
}

a.otl-bt:hover {
    text-decoration: none;
    color: inherit;
    cursor: pointer;
    opacity: 1 !important;
}

.custom-shadow-1 {
    box-shadow: 3px 3px 4px 0px #0000005c;
}

/* sección por defecto */

#sec-def {
    width: 66%;
    min-width:700px;
    margin-right: 8px;
}

/* sección noticias */

.art-news {
    width: auto;
    height: 150px;
    border: 2px solid #e4e4e4;
    border-radius: 5px;
    background-color: #e4e4e4;
    border-left: 0px;
}

.art-img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    float: left;
    border: 2px solid #e4e4e4;
    margin-top: -2px;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
    margin-right: 5px;
}

.art-title {
    display: block;
    background-color: #2424244a;
    width: auto;
    height: 25px;
    padding-top: 5px;
}
.art-content {
    display: block;
    height: 60px;
    width: auto;
    margin-top: 10px;
    overflow: hidden;
}
.art-meta {
    display: inline-block;
    width: auto;
    background-color: #2424244a;
    border-radius: 5px;
    padding: 5px;
    font-size: small;
}

/* sección derecha */

#aside-def {
    width: 33%;
    min-width:320px;
    margin-left: 8px;
    font-size: small;
}

#box-title {
    text-align: center;
    background-color: <?php echo $wbcnf['lay-color'] ?>;
    box-shadow: 0px 5px 0px 0px #ffffff7a inset;
}

.shdw-crd-title {
    background-color: <?php echo $wbcnf['lay-color'] ?>;
    box-shadow: 0px 5px 0px 0px #ffffff2a inset;
}

.box-content {
    width: auto;
    padding: 10px;
    height: auto;
    border: 2px solid #e4e4e4;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    background-color: #e4e4e4;
}

/* pie de página */

#footer-def {
    text-align: center;
    background-color: <?php echo $wbcnf['lay-color'] ?>;
    height: 50px;
    border-top: solid 2px <?php echo $wbcnf['lay-color'] ?>;
    box-shadow: 0px 5px 0px 0px #ffffff7a inset;
    line-height: 50px;
    bottom: 0;
    margin-top: 10%;
}

.title-def {
    text-align: center;
    background-color: <?php echo $wbcnf['lay-color'] ?>;
    width: auto;
    border-top: solid 2px <?php echo $wbcnf['lay-color'] ?>;
    box-shadow: 0px 5px 0px 2px #ffffff7a inset;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    padding: 10px;
}

.content-def {
    width: auto;
    padding: 10px;
    height: auto;
    border: 2px solid #e4e4e4;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    background-color: #e4e4e4;
}

/* formularios */

/*input[type=text],[type=password] {
    border: 0px solid #fff0;
    border-radius: 5px;
    padding: 5px 0px 5px 0px;
    width: 100%;
    font-family: inherit;
    color: #0000008f;
    margin-left: -2px;
    border-left: 2px solid #fff0;
}*/

/* css pa botones
input[type=submit],[type=button] {
    border: 2px solid #7affaed9;
    border-radius: 5px;
    padding: 5px;
    width: auto;
     font-family: inherit;
    margin: auto;
    background-color: #7affaed9;
}
*/

/*input.login-box {
    border: 2px solid #7affaed9;
    border-radius: 5px;
    padding: 5px;
    width: 100%;
    font-family: inherit;
    margin: auto;
    background-color: #7affaed9;
}*/

/* alertas */

.success-warns {
    color: #fff;
    background-color: #00ff0a63;
    border-radius: 5px;
    border: solid 2px #fff0;
    width: auto;
    display: block;
    padding-top: 2px;
    padding-bottom: 2px;
    font-weight: bold;
}

.danger-warns {
    color: #fff;
    background-color: #ff000040;
    border-radius: 5px;
    border: solid 2px #fff0;
    width: auto;
    display: block;
    padding-top: 2px;
    padding-bottom: 2px;
    font-weight: bold;
}

div.card-body div.alert {
    position: fixed;
    top: 2%;
    z-index: 9999;
    width: 100%;
    max-width: 1040px;
    box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.5);
    font-size: 20px;
    text-align: center;
}

div.card-body div.alert button.close {
    margin-top: 2px;
}

/* preview de las noticias */

.nwpr-img {
    height: 170px;
    width: 170px;
    object-fit: cover;
    border-right: solid 0px #fff;
    border-radius: 2px 0px 0px 2px;
}

.nwpr-content {
    display: inline-block;
    height: 50px;
    overflow: hidden;
    /*max-width: 500px;
    display: -webkit-box;
    text-overflow: ellipsis;
    white-space: nowrap;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;*/
}

/* contenido de las noticias */

.nw-img {
    height: 170px;
    width: 170px;
    margin: 0px 0px 10px 15px;
    object-fit: cover;
}

/* comentarios de las noticias */

.nwcomm-img {
    height: 28px;
    width: 28px;
    object-fit: cover;
    margin: 1px 1px 1px 1px;
}

.nwcomm-txtarea {
    font-size: 14px;
    height: 100px;
    min-height: 100px;
    max-height: 100px;
    border-radius: 0px 0px 5px 5px;
    padding: 2px 0px 0px 6px;
}

.nwcomm-date {
    font-size: 14px;
    float: right;
    margin: 2px 5px 0px 0px;
}

.nwcomm-top {
    border-bottom: 0px;
    border-radius: 5px 5px 0px 0px;
}

.nwcomm-info {
    margin: 2px 0px 0px 5px;
    width: 100%;
}

/* ajustes de cuenta y/o perfil */

.sett-bio {
    min-height: 150px;
    font-size: smaller;
    max-height: 300px;
}

.sett-smol-input {
    margin-right: 5px;
    margin-left: 5px;
    width: 48%;
}

.sett-img-prev {
    width: 150px;
    height: 150px;
    object-fit: cover;
    margin-right: 10px;
}

.sett-bann-prev {
    width: max-content;
    height: 150px;
    object-fit: cover;
}

/* perfil del usuario */

.prof-bann {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.prof-img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    margin-right: 10px;
}

.prof-smol-input {
    margin-bottom: 5px;
    font-size: smaller;
}

.prof-bio {
    min-height: 150px;
    font-size: smaller;
    max-height: 300px;
    height: auto;
}

.prof-info-zone {
    width: 74%;
    margin-bottom: 0px;
    flex: auto;
    margin-left: 10px;
}

/* mensajes privados */

.mb-img {
    height: 50px;
    width: 50px;
    object-fit:
    cover; border-right:
    solid 1px #fff;
    border-radius: 2px 0px 0px 2px;
}

.mb-prev {
    margin: 2px 0px 0px 5px;
    width: 100%;
}

.mb-usr-lbl {
    margin: 0px;
    font-size: 16px;
    font-weight: bold;
    margin-right: 5px;
}

.mb-sento {
    margin: 0px;
    font-size: 16px;
    font-weight: bold;
    text-decoration: none;
}

.mb-seen-lbl {
    font-size: 14px;
    float: right;
    margin-right: 5px;
}

.mb-read-btn {
    width: auto;
    font-size: 14px;
    background: none;
    border: none;
    color: inherit;
    margin: 0px;
    padding: 0px;
}

.mb-sent-dte {
    font-size: 14px;
    float: right;
    margin-right: -58px;
}

.mb-snd-txt {
    font-size: 14px;
    height: 75%;
    min-height: 250px;
}

.mb-read-txt {
    font-size: 14px;
    height: 75%;
    min-height: 250px;
}

/* equipo administrativo */

.rnk-card {
    margin-bottom: 5px;
    width: 215px;
    display: inline-block;
}

.rnk-img {
    height: 40px;
    width: 40px;
    object-fit:
    cover; border-right:
    solid 1px #fff;
    border-radius: 2px 0px 0px 2px;
}

.rnk-usr-lbl {
    margin: 0px;
    font-size: 16px;
    font-weight: bold;
    margin-right: 5px;
    margin-top: 5px;
}