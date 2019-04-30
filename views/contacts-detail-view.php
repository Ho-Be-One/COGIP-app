<div class="container col-xl-6 ">
    <h4 class="pt-5 pb-5"><strong>Contact</strong> : <?= $value['last_name'].' '.$value['first_name']?></h4>
    <div class="card col-xl-4 mr-3 float-left">
        <div class="card-body">
            <h5 class="card-title"><?= $value['last_name'].' '.$value['first_name']?></h5>
            <p class="card-text"><i class="fa fa-building-o text-primary"></i> <?= $value['comp_name']?></p>
            <p class="card-text"><i class="fa fa-at text-primary"></i> <?= $value['mail']?></p>
            <p class="card-text"><i class="fa fa-phone text-primary"></i> <?= $value['Telephone']?></p>
        </div>
    </div>
    <div class="card col-xl-7 float-left">
        <table class="table table-hover col-xl-7 float-left">
            <thead>
                <tr>
                <th scope="col">##</th>
                <th scope="col">Facture</th>
                <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
            <?php
           
            foreach ($listContact as $key => $echoValue){
            $key +=1;    
            ?>
                <tr>
                <th><?= $key ?></th>
                <td><?= $echoValue['invoice_num'];?></td>
                <td><?= $echoValue = date('d-m-Y', strtotime($echoValue['invoiced_date']));?></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
         </table>
    </div>
</div> 