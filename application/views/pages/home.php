<?php if($this->session->userdata('logged_in')) : ?>
<div class="col-lg-12">
    
<h2><?= $title ?></h2>
     
   
            <h2><p> CodeIgniter application sample </p></h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card text-white bg-info mb-3" style="max-width: 20rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                      <h4 class="card-title">Info card title</h4>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card text-white bg-success mb-3" style="max-width: 20rem;">
                    <div class="card-header">Header</div>
                    <div class="card-body">
                      <h4 class="card-title">Success card title</h4>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                        <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                          <h4 class="card-title">Primary card title</h4>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-3">
                    <h3 class="card-header">Card header</h3>
                    <div class="card-body">
                      <h5 class="card-title">Special title treatment</h5>
                      <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                    </div>
                    <img style="height: 60%; width: 100%; display: block; " src="<?=base_url()?>assets/img/codeIgniter.jpg" alt="Card image">
                    <div class="card-body">
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div> 

                  </div>
                </div>
            </div>
     </div>
<?php else : redirect('users/login');?> 
<?php endif; ?>
      
     