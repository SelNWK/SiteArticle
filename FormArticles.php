<form name="formMEDICAMENT" method="post" action="index.php?action=<?php echo medecin_Liste_Medicament ?>">

                <?php
                echo formSelectDepuisRecordset('Selection des articles :', 'Titre', getListFamilleMedicament(), 10, null);
                echo formBoutonSubmit('bouton', 'bouton', 'ok', 10);
                ?>
                </form>
                <?php
                break;