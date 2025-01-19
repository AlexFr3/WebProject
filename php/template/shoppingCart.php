<?php if(isset($templateParams["messaggiocarrello"])): ?>
            <div class="alert text-center <?php if(str_starts_with($templateParams["messaggiocarrello"], "L")){
                echo("alert-success");
             } else{
                echo("alert-danger");
             }?>" role="alert"><p class="fw-bold fs-2" ><?php echo $templateParams["messaggiocarrello"]; ?></p></div>
<?php endif; ?>