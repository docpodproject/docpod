<?php require_once "menubar.html" ?>

<body>

    <section id="corp-de-page-in">
                <div id="titre-re">
                    <article>
                        <h1>Inscription à DOCPOD</h1>
                        <br />
                            <p>L’inscription à DOCPOD n’est pas obligatoire, il est possible de consulter et d’écouter les émissions disponibles sur le site sans y être inscrit.<br/>
                            Néanmoins, s’inscrire à DOCPOD permet de gérer votre compte d’avoir accès à vos historiques d’écoute et de s’abonner au flux audio de vos émissions préférées.</p><br/>
                            
                            
                    </article>
                </div>

                <div id="container-insc">

                <div class="accordion-insc">

                         <label for="insc" class="accordionitem"><h2>Inscription<!--  <span class="arrow">&raquo;</span> --></h2></label>

                            <input type="checkbox" id="insc"/>

                                <form class="hiddentext" action="" method="POST">

                                        <ol class="insc-formu">
                                            <p>Pour s'inscrire à DOCPOD remplisez les champs suivants et cliquez sur le bouton de confirmation.</p>
                                            <li><input type="text" name="username" placeholder="Username" required autofocus>
                                            </li>
                                            <li><input type="text" name="email" placeholder="Adresse Email" required>
                                            </li>
                                            <li><input type="password" name="password_first" placeholder="Password" required autofocus>
                                            </li>
                                            <li><input type="password" name="password_second" placeholder="Password repeated" required>
                                            </li>
                                            
                                            <li class=""><input type="submit" value="Register">
                                            </li>
                                        <ol>
                                    </form>
<p><?php echo $messageUser ?></p>
                    </div>
                    <div class="ph-des">
                    <p>Vous pouvez à tout moment vous <a href="Dashboard.html">désinscrire</a> et continuer à profiter des services proposés par DOCPOD.</p>
                    </div>
                </div>


                
                 
                
                
            </section>

<?php include_once "footer.php" ?>
</body>

</html>