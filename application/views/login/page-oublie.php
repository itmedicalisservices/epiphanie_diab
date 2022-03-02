<?php include(dirname(__FILE__) . '/includes/header.php'); ?>
<div class="container">
    <div class="card-top"></div>
    <div class="card">
		<h1 class="title"><div class="" style="width:100%;height:70px;background:url('<?php echo base_url('assets/images/ee.png');?>');background-repeat:no-repeat;background-size:contain"></div></h1>
        <h1 class="title" style="margin-top:-30px"><span><?php echo $info->str_sEnseigne; ?></span>Mot de passe oublié <span class="msg"><!--Renseigner votre adresse mail--></span></h1>
        <div class="col-md-12" style="margin-top:-25px">
            <form class='form-oublie' id="form-oublie">
                
                <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-account"></i> </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="email" placeholder="* Adresse Mail" >
                    </div>
                </div>
               
                <div>
                   
                    <div class="text-center">
                        <button type="submit" class="btn btn-raised waves-effect bg-blue-grey" id="oublie">Envoyer</a>
                    </div>
                    <div class="text-center"> Vous avez déjà un compte ? <a href="<?php echo site_url(); ?>">Se connecter</a></div>
                </div>
            </form>
        </div>
    </div>    
</div>
<?php include(dirname(__FILE__) . '/includes/footer.php'); ?>
