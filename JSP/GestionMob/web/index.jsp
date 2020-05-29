<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <%@page import="Modeles.Mobilite"%>
        <%@page import="Modeles.Contrat"%>
        <%@page import="Modeles.Diplome"%>
        <%@page import="Modeles.Etudiant"%>
        <%@page import="Modeles.Finance"%>
        <%@page import="Modeles.Programme"%>
        <%@page import="Modeles.Universite"%>
        <%@page import="java.util.Vector"%>
        <%@page contentType="text/html" pageEncoding="UTF-8"%>
        
        
        
        <title>Gestion mobilite</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <style>
            body{
                background-image:  url("https://images.pexels.com/photos/273222/pexels-photo-273222.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260");
                background-repeat: no-repeat;
            }
            #formulaire{
                margin-top: 5%;
                background-color: rgba(255,255,255,0.4);
            }
            select{
                margin-left: 1%;
            }
            #mob, #fi, #pro{
                width: 500px;
                margin-bottom: 15px;
                margin-left: 15px;
                margin-top: 15px;
                border:1px solid black;
                border-radius: 3%;
                background-color:ghostwhite;
            }
            
            .navbar-expand-lg .navbar-nav .dropdown-menu {
                position: absolute;
                width: 300px;
            }
            button{
                margin-left: 1%;
            }
            
            .a{
                margin: auto;
                width: 35%;
            }
            h5,h2{
                text-align: center;
            }
            .b{
                margin-left:  95%;
            }
            
        </style>
        
        
         <script>
           function supp(lettre){
               console.log(lettre);
            if(lettre === 'm'){
               if($("#supprime").html() == "Supprimer"){
                    $("#bouton").html("Voulez-vous vraiment supprimer ?");
                    $("input").val("supp");
                    $("#bouton").removeClass('btn btn-outline-dark').addClass('btn btn-outline-danger');
                    $("#supprime").html("Modifier");
                }else{
                    $("#bouton").html("Modifiez");
                    $("input").val("modif");
                    $("#bouton").removeClass('btn btn-outline-danger').addClass('btn btn-outline-dark');
                    $("#supprime").html("Supprimer");
                }
            }else{
                if($("#supprime").html() == "Supprimer"){
                    $("#bouton").html("Voulez-vous vraiment supprimer ?");
                    $("input").val("suppF");
                    $("#bouton").removeClass('btn btn-outline-dark').addClass('btn btn-outline-danger');
                    $("#supprime").html("Modifier");
                }else{
                    $("#bouton").html("Modifiez");
                    $("input").val("modif");
                    $("#bouton").removeClass('btn btn-outline-danger').addClass('btn btn-outline-dark');
                    $("#supprime").html("Supprimer");
                }
            }
           } 
        </script>
        
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.jsp">Gestion mobilit&eacute;</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Les demandes de mobilit&eacute;s 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <form method="post" action="LeControleur" >
                <input type="hidden" name="action" value="start" />
               <button type="submit" class="btn btn-outline-dark" >Consultez</button><br><br>
            </form>
            
            <form method="post" action="LeControleur" >
               <input type="hidden" name="action" value="checkout" />
               <button type="submit" class="btn btn-outline-dark" >Ajoutez</button><br><br>
            </form>
            
            <form method="post" action="LeControleur" >
               <input type="hidden" name="action" value="voirE" />
               <button type="submit" class="btn btn-outline-dark" >Consultez pour un etudiant</button><br><br>
            </form>
            
            <form method="post" action="LeControleur" >
                <input type="hidden" name="action" value="voirU" />
                <button type="submit" class="btn btn-outline-dark">Consultez pour une universit&eacute;</button><br><br>
            </form>
            
            <form method="post" action="LeControleur" >
                <input type="hidden" name="action" value="voirD" />
                
                <button type="submit" class="btn btn-outline-dark">Consultez pour un dipl&ocirc;me</button>
            </form>
        </div>

      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Les demandes financi&egrave;res 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            
            <form method="post" action="LeControleur" >
                <input type="hidden" name="action" value="startF" />
                <button type="submit" class="btn btn-outline-dark">Consultez</button><br><br>
            </form>

            <form method="post" action="LeControleur" >
                <input type="hidden" name="action" value="checkoutF" />
                <button type="submit" class="btn btn-outline-dark">Ajoutez</button><br><br>
            </form>
            
            <form method="post" action="LeControleur" >
                <input type="hidden" name="action" value="formFparC" />
                <button type="submit" class="btn btn-outline-dark" >Consultez par contrat</button><br><br>
            </form>
            
            <form method="post" action="LeControleur" >
                <input type="hidden" name="action" value="formFparP" />
                <button type="submit" class="btn btn-outline-dark" >Consultez par programme</button>
            </form>
        </div>

      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Les programmes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            
            <form method="post" action="LeControleur" >
                <input type="hidden" name="action" value="voirP" />
                <button type="submit" class="btn btn-outline-dark">Voir</button>
            </form>

            
        </div>

      </li>
    </ul>
  </div>
</nav>
 <div id="formulaire">
       

